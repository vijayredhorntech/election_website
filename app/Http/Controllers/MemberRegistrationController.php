<?php

namespace App\Http\Controllers;

use App\Facades\CustomLog;
use App\Mail\MemberShipMail;
use App\Mail\OtpMail;
use App\Models\Core_member;
use App\Models\Member;
use App\Models\Country;
use App\Models\County;
use App\Models\Constituency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Models\Membership;

class MemberRegistrationController extends Controller
{
    public function index()
    {
        $formData = [
            'url' => route('sendEmailVerificationOtp'),
            'method' => 'get',
            'type' => 'register',
            'hasReferralCode' => 'false',
            'referral_code' => '',
        ];
        return view('front.join-us')->with('formData', $formData);
    }

    public function sendEmailVerificationOtp(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'termsAndConditionCheckbox' => 'required',
            'hasReferralCode' => 'nullable',
            'referral_code' => 'nullable|regex:/^ONR[A-Z0-9]{4}$/',
        ]);
        session()->forget('request_referral_code');
        if ($request->hasReferralCode != null) {
            if ($request->referral_code != null) {
                $referral = User::where('referral_code', $request->referral_code)->first();
                if (!$referral) {
                    $formData = [
                        'url' => route('sendEmailVerificationOtp'),
                        'method' => 'get',
                        'type' => 'register',
                        'hasReferralCode' => 'true',
                        'referral_code' => '',
                    ];
                    session()->flash('error', 'Invalid referral code');

                    return view('front.join-us')->with('formData', $formData);
                }
                session(['request_referral_code' => $request->referral_code]);
            }
        }
        if (User::where('email', $request->email)->exists()) {
            return back()->with('error', 'Email already exists');
        }

        $otp = rand(100000, 999999);
        session(['otp' => $otp]);

        try {
            Mail::to($request->email)->queue(new OtpMail($otp));
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
            'hasReferralCode' => 'false',
            'referral_code' => '',
        ];
        return view('front.join-us')->with('formData', $formData)->with('email', $request->email)->with('userName', $request->name);
    }

    public function resetOTP()
    {
        session()->forget('otp');
        $otp = rand(100000, 999999);
        session(['otp' => $otp]);

        try {
            Mail::to(session('email'))->queue(new OtpMail($otp));
            session()->flash('success', 'OTP sent successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send OTP');
        }



        $formData = [
            'url' => route('verifyOtp'),
            'method' => 'POST',
            'type' => 'validate',
            'hasReferralCode' => 'false',
            'referral_code' => '',
        ];
        return view('front.join-us')->with('formData', $formData)->with('email', session('email'))->with('userName', session('name'));
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

        $memberShip = collect($memberShipPlans)->where('id', $id)->first();

        DB::beginTransaction();
        try {
            // Generate referral code
            $otp = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
            $referrar = User::where('referral_code', session('request_referral_code'))->first();

            // Create user
            $user = User::create([
                'name' => strtoupper(session('name')),
                'email' => $email,
                'password' => bcrypt($otp),
            ]);

            if (!$user) {
                throw new \Exception('Failed to create user account');
            }

            // Create member
            $member = Member::create([
                'user_id' => $user->id,
                'enrollment_date' => now(),
                'first_name' => strtoupper(session('name')),
                'email' => $email,
                'profile_status' => 'inActive',
                'referrer_id' => $referrar?->id,
            ]);

            // Create membership
            Membership::create([
                'user_id' => $user->id,
                'membership_type' => 'Standard Plan',
                'payment_amount' => 36,
                'payment_status' => 'success',
                'start_date' => now(),
                'end_date' => now()->addDays(365),
                'status' => 'active',
            ]);

            if (!$member) {
                throw new \Exception('Failed to create member profile');
            }

            // Queue OTP email
            // Mail::to($email)->queue(new OtpMail($otp));

            $data = [
                'email' => $email,
                'password' => $otp,
            ];

            // Queue membership email
            Mail::to($email)->queue(new MemberShipMail($data));

            // Clear session data
            session()->forget([
                'request_referral_code',
                'name',
                'email'
            ]);

            // Commit transaction
            DB::commit();

            // Login user
            auth()->login($user);

            return redirect()
                ->route('memberBasicInformation')
                ->with('success', 'Your account has been created successfully. Please complete your profile.');
        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollBack();

            // Log the error
            CustomLog::error('Payment gateway error', [
                'email' => $email,
                'membership_id' => $id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            session()->flash('error', 'Registration failed. Please try again later. If the problem persists, contact support.');
            // Return error response
            return redirect()
                ->route('selectMemberShipPlan')
                ->with('error', 'Registration failed. Please try again later. If the problem persists, contact support.');
        }
    }


    public function memberBasicInformation($update= 0)
    {

        return view('front.member-basic-information')->with('update', $update);
    }

    public function storeMemberBasicInformation(Request $request, $update)
    {
        if($update) {
            $request->validate([
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'title' => 'required|in:MR.,MRS.,MISS,DR.,MS.,PROF.,OTHER',
                'dob' => 'required|date|before:16 years ago',
                'gender' => 'required|in:MALE,FEMALE,OTHER',
                'marital_status' => 'nullable|in:SINGLE,MARRIED,DIVORCED,WIDOWED,OTHER',
                'qualification' => 'nullable|in:PRIMARY,SECONDARY,HIGHER SECONDARY,GRADUATE,POST GRADUATE,DOCTORATE,OTHER',
                'profession' => 'nullable|string|in:STUDENT,EMPLOYEE,BUSINESS,SELF EMPLOYED,HOUSEWIFE,RETIRED,LAWYER,DOCTOR,TEACHER,OTHER',
                'national_insurance_number' => 'required|unique:members,national_insurance_number|regex:/^\s*[a-zA-Z]{2}(?:\s*\d\s*){6}[a-zA-Z]?\s*$/',
                'primary_country_code' => 'required|string|max:255',
                'primary_mobile_number' => 'required|numeric|digits:10|unique:members,primary_mobile_number',
                'alternate_country_code' => 'nullable|string|max:255',
                'alternate_mobile_number' => 'nullable|numeric|digits:10|unique:members,alternate_mobile_number',
            ]);
        }
        else {
            $request->validate([
                'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'dob' => 'required|date|before:16 years ago',
            ]);

        }

        try {
            $member = Member::where('user_id', auth()->user()->id)->first();

            if (!$member) {
                return back()->with('error', 'Member not found');
            }

            $dateOfBirth = \Carbon\Carbon::createFromFormat('Y-m-d', $request->dob)->format('Y-m-d');

            $member->update([
                'title' => $request->title,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $dateOfBirth,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'qualification' => $request->qualification,
                'profession' => $request->profession,
                'national_insurance_number' => $request->national_insurance_number,
                'primary_mobile_number' => $request->primary_mobile_number,
                'alternate_mobile_number' => $request->alternate_mobile_number,
                'primary_country_code' => $request->primary_country_code,
                'alternate_country_code' => $request->alternate_country_code,
                'profile_status' => 'inActive',
            ]);
            if($update)
            {
                $member->update([
                    'profile_status' => 'inActive',
                ]);
            }
            else {
                $member->update([
                    'profile_status' => 'active',
                ]);
            }

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
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'An error occurred while saving the basic information');
        }
    }

    public function storeMemberAddressInformation(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'country_code' => 'required|exists:countries,code',
                'county_code' => 'required|exists:counties,code',
                'region_code' => 'nullable|exists:regions,code',
                'constituency_code' => 'required|exists:constituencies,code',
                'postcode' => 'required|string|regex:/^[A-Z]{1,2}\d[A-Z\d]? ?\d[A-Z]{2}$/',
                'house_name_number' => 'required|string|max:255',
                'town_city' => 'required|string|max:255',
            ]);


        // Add conditional validation for region_code when country_code is ENG
        if ($request->input('country_code') === 'ENG') {
            $validator->sometimes('region_code', 'required', function ($input) {
                return $input->country_code === 'ENG';
            });
        }

        if ($validator->fails()) {
            // Print the errors in the console or log for debugging
            // dd($validator->errors()); // This will dump all the error messages

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $member = Member::where('user_id', auth()->user()->id)->first();

            if (!$member) {
                session()->flash('error', 'Member not found');
                return redirect()->back();
            }

            $member->update([
                'country_id' => Country::where('code', $request->country_code)->first()->id,
                'county_id' => County::where('code', $request->county_code)->first()->id,
                'region_id' => Region::where('code', $request->region_code)->first()?->id,
                'constituency_id' => Constituency::where('code', $request->constituency_code)->first()->id,
                'postcode' => $request->postcode,
                'house_name_number' => $request->house_name_number,
                'street' => $request->street,
                'town_city' => $request->town_city,
                'profile_status' => 'active',
            ]);

            session()->flash('success', 'Address information saved successfully');
            return redirect()->route('memberProfile');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'An error occurred while saving the address information');
        }
    }

    public function memberAddressInformation()
    {
        $countries = Country::all();

        return view('front.member-address-information')->with('countries', $countries);
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $exists = User::where('email', $email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkPrimaryMobileNumber(Request $request)
    {
        $mobileNumber = $request->input('mobile_number');
        $exists = Member::where('primary_mobile_number', $mobileNumber)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkAlternateMobileNumber(Request $request)
    {
        $mobileNumber = $request->input('mobile_number');
        $exists = Member::where('alternate_mobile_number', $mobileNumber)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function resendOtp(Request $request)
    {
        $email = $request->query('email');
        $name = $request->query('name');

        if (!$email || !$name) {
            return response()->json([
                'success' => false,
                'message' => 'Email and name are required'
            ]);
        }

        $otp = rand(100000, 999999);
        session(['otp' => $otp]);

        try {
            Mail::to($email)->queue(new OtpMail($otp));
            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to resend OTP: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to send OTP'
            ]);
        }
    }

    public function referral($code)
    {
        // check if the code is valid
        $referral = User::where('referral_code', $code)->first();
        if (!$referral) {
            return redirect()->route('joinUs')->with('error', 'Invalid referral code');
        }
        $formData = [
            'url' => route('sendEmailVerificationOtp'),
            'method' => 'get',
            'type' => 'register',
            'hasReferralCode' => 'true',
            'referral_code' => $code,
        ];
        return view('front.join-us')->with('formData', $formData);
    }

    public function become_core_member()
    {
        return view('front.become-core-member');
    }
    public function verify_member(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
        ]);
        $member = Member::where('custom_id', $request->member_id)->first();
        if (!$member) {
            return back()->with('error', 'No member found with the provided ID');
        }
        else
        {

            $core_member = Core_member::where('user_id', $member->user->id)->first();

            if ($core_member != null) {
                return back()->with('error', 'We\'ve received your core membership request, and it\'s under review. No further submissions are needed at this time.');
            }

            return view('front.core-member-form')->with('member', $member);
        }
    }

    public function core_member_form(Request $request, $id)
    {


         if ($request->declaration != 'on') {
            return back()->with('error', 'Please accept the declaration');
         }
            $request->validate([
                'annual_income' => 'required',
                'participated_in_social_movement' => 'required|boolean',
                'comfortable_with_public_speaking' => 'required|boolean',
                'willing_to_relocate' => 'required|boolean',
                'how_much_time_for_party' => 'required',
                'political_ideology' => 'required',
                'leadership_experience' => 'required|boolean',
                'experience_in_media_interaction' => 'required|boolean',
                'communication_skill' => 'required',
                'area_of_interest' => 'required',
                'photo' => 'required|max:2048',
                'id_proof' => 'required|max:2048',
                'other_document' => 'max:2048',
         ]);

        $requestData = $request->except(['user_id', 'photo', 'id_proof', 'other_document']);
        $requestData['user_id'] = $id;
        $requestData['area_of_interest'] = json_encode($request->input('area_of_interest', []));
        $requestData['political_issue_care'] = json_encode($request->input('political_issue_care', []));

// Handle radio buttons (set 1 if checked, 0 if unchecked)
        $requestData['any_business'] = $request->has('any_business') ? 1 : 0;
        $requestData['associated_with_other_party'] = $request->has('associated_with_other_party') ? 1 : 0;
        $requestData['any_criminal_record'] = $request->has('any_criminal_record') ? 1 : 0;
        $requestData['communication_skill'] = $request->input('communication_skill', 0); // Default to 0


        // Create Core Member record
        $core_member = Core_member::create($requestData);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('coreMemberPhoto', 'public');
            $core_member->update([
                'photo' => $filePath,
            ]);
        }
        if ($request->hasFile('id_proof')) {
            $file = $request->file('id_proof');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('coreMemberIdProof', 'public');
            $core_member->update([
                'id_proof' => $filePath,
            ]);
        }
        if ($request->hasFile('other_document')) {
            $file = $request->file('other_document');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('coreMemberOtherDocuments', 'public');
            $core_member->update([
                'other_document' => $filePath,
            ]);
        }
        return redirect()->route('become_core_member')->with('success', 'Request to Become a Core Member Submitted

Thank you for your interest in joining One Nation’s Core Team. Your request has been received and is under review.
');



    }

}
