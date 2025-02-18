<?php

namespace App\Http\Controllers;

use App\Mail\MemberShipMail;
use App\Mail\OtpMail;
use App\Models\Member;
use App\Models\Country;
use App\Models\County;
use App\Models\Constituency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MemberRegistrationController extends Controller
{
    public function index()
    {
        $formData = [
            'url' => route('sendEmailVerificationOtp'),
            'method' => 'get',
            'type' => 'register',
        ];
        return view('front.join-us')->with('formData', $formData);
    }

    public function sendEmailVerificationOtp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'termsAndConditionCheckbox' => 'required',
        ]);

        if (User::where('email', $request->email)->exists()) {
            return back()->with('error', 'Email already exists');
        }
        $otp = rand(100000, 999999);
        session(['otp' => $otp]);

        try {
            Mail::to($request->email)->send(new OtpMail($otp));
            session()->flash('success', 'OTP sent successfully');
            session(['email' => $request->email]);
            session(['name' => $request->name]);
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send OTP');
        }


        $formData = [
            'url' => route('verifyOtp'),
            'method' => 'POST',
            'type' => 'validate',
        ];
        return view('front.join-us')->with('formData', $formData)->with('email', $request->email)->with('userName', $request->name);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        if ($request->otp == session('otp')) {
            session()->forget('otp');
            return redirect()->route('selectMemberShipPlan');
        } else {
            session()->forget('success');
            return back()->with('error', 'Invalid OTP');
        }
    }

    public function selectMemberShipPlan()
    {
        $email = session('email');

        return view('front.select-membership-plan')->with('email', $email);
    }

    public function memberShipPayment(Request $request)
    {
        $memberShipPlans = [
            [
                'id' => '1',
                'type' => 'Standard Plan',
                'amount' => '5.88',
                'label' => 'Membership 1',
            ],
            [
                'id' => '2',
                'type' => 'Premium Plan',
                'amount' => '10.88',
                'label' => 'Membership 2',
            ],
            [
                'id' => '3',
                'type' => 'Ultimate Plan',
                'amount' => '15.88',
                'label' => 'Membership 3',
            ],

        ];

        $request->validate([
            'memberShip' => 'required',
        ]);
        $email = session('email');
        $memberShip = collect($memberShipPlans)->where('id', $request->memberShip)->first();
        return view('front.membership-payment')->with('memberShip', $memberShip)->with('email', $email);
    }

    public function paymentGateway($email, $id)
    {
        $memberShipPlans = [
            [
                'id' => '1',
                'type' => 'Standard Plan',
                'amount' => '5.88',
                'label' => 'Membership 1',
            ],
            [
                'id' => '2',
                'type' => 'Premium Plan',
                'amount' => '10.88',
                'label' => 'Membership 2',
            ],
            [
                'id' => '3',
                'type' => 'Ultimate Plan',
                'amount' => '15.88',
                'label' => 'Membership 3',
            ],

        ];
        $memberShip = collect($memberShipPlans)->where('id', $id)->first(); {
            try {
                Mail::to($email)->send(new MemberShipMail($memberShip));
            } catch (\Exception $e) {
            }
            $otp = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
            $user = User::create([
                'name' => session('name'),
                'email' => $email,
                'password' => bcrypt($otp),
            ]);
            if ($user) {
                Member::create([
                    'user_id' => $user->id,
                    'enrollment_date' => now(),
                    'first_name' => session('name'),
                    'email' => $email,
                    'profile_status' => 'inActive',
                ]);

                try {
                    Mail::to($email)->send(new OtpMail($otp));
                } catch (\Exception $e) {
                }
                session()->forget('name');
                session()->forget('email');

                auth()->login($user);
                return redirect()->route('memberBasicInformation')->with('success', 'Your account has been created successfully. Please complete your profile.');
            } else {
                return redirect()->route('memberShipPayment')->with('error', 'Something went wrong. Please try again later.');
            }
        }
    }


    public function memberBasicInformation()
    {
        return view('front.member-basic-information');
    }

    public function storeMemberBasicInformation(Request $request)
    {

        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'primary_mobile_number' => 'required',
            'alternate_mobile_number' => 'required',
        ]);
        $member = Member::where('user_id', auth()->user()->id)->first();

        $dateOfBirth = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dob)->format('Y-m-d');

        $member->update([
            'title' => $request->title,
            'date_of_birth' => $dateOfBirth,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'qualification' => $request->qualification,
            'profession' => $request->profession,
            'primary_mobile_number' => $request->primary_mobile_number,
            'alternate_mobile_number' => $request->alternate_mobile_number,
            'profile_status' => 'inActive',
        ]);

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('membersPhotos', 'public');
            $member->update([
                'profile_photo' => $filePath,
            ]);
        }

        session()->flash('success', 'Basic information saved successfully');
        return redirect()->route('memberAddressInformation');
    }

    public function storeMemberAddressInformation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
            'county_id' => 'required',
            'constituency_id' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'house_name_number' => 'required',
            'street' => 'required',
            'town_city' => 'required',
        ]);

        if ($validator->fails()) {
            // Print the errors in the console or log for debugging
            // dd($validator->errors()); // This will dump all the error messages

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $member = Member::where('user_id', auth()->user()->id)->first();

        $member->update([
            'country_id' => Country::where('code', $request->country_id)->first()->id,
            'county_id' => County::where('code', $request->county_id)->first()->id,
            'constituency_id' => Constituency::where('code', $request->constituency_id)->first()->id,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'city' => $request->town_city,
            'profile_status' => 'active',
        ]);

        session()->flash('success', 'Address information saved successfully');
        return redirect()->route('memberProfile');
    }

    public function memberAddressInformation()
    {
        return view('front.member-address-information');
    }
}
