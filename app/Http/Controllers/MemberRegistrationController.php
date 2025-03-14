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
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

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
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'termsAndConditionCheckbox' => 'required',
            'hasReferralCode' => 'nullable',
            'referral_code' => 'nullable|regex:/^ONR[A-Z0-9]{4}$/',
        ]);
        session()->forget('referrer_id');
        if ($request->hasReferralCode != null) {
            if ($request->referral_code != null) {
                $user = User::where('referral_code', $request->referral_code)->first();
                if (!$user) {
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
                session(['referrer_id' => $user->id]);
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
            session(['first_name' => $request->first_name]);
            session(['last_name' => $request->last_name]);
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
        return view('front.join-us')->with('formData', $formData)->with('email', $request->email)->with('first_name', $request->first_name)->with('last_name', $request->last_name);
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
        return view('front.join-us')->with('formData', $formData)->with('email', session('email'))->with('first_name', session('first_name'))->with('last_name', session('last_name'));
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

    public function paymentGateway(Request $request)
    {
        $memberShipPlans = [
            'id' => '1',
            'type' => 'Standard Plan',
            'amount' => '1',
            'label' => 'Membership 1',
        ];

        $request->validate([
            'memberShip' => 'required',
            'acceptTerms' => 'required',

        ]);
        $email = session('email');
        return view('front.membership-payment')->with('memberShip', $memberShipPlans)->with('email', $email);
    }


    public function memberBasicInformation($update = 0)
    {

        return view('front.member-basic-information')->with('update', $update);
    }
    public function storeMemberBasicInformation(Request $request, $update)
    {
        $member = Member::where('user_id', auth()->user()->id)->first();

        if (!$member) {
            return back()->with('error', 'Member not found');
        }

        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'title' => 'required|in:MR.,MRS.,MISS,DR.,MS.,PROF.,OTHER',
            'dob' => 'required|date|before:16 years ago',
            'gender' => 'required|in:MALE,FEMALE,OTHER',
            'marital_status' => 'required|in:SINGLE,MARRIED,DIVORCED,WIDOWED,OTHER',
            'qualification' => 'required|in:PRIMARY,SECONDARY,HIGHER SECONDARY,GRADUATE,POST GRADUATE,DOCTORATE,OTHER',
            'profession' => 'required|string|in:STUDENT,EMPLOYEE,BUSINESS,SELF EMPLOYED,HOUSEWIFE,RETIRED,LAWYER,DOCTOR,TEACHER,OTHER',
            // 'national_insurance_number' => [
            //     'required',
            //     'regex:/^\s*[a-zA-Z]{2}(?:\s*\d\s*){6}[a-zA-Z]?\s*$/',
            //     Rule::unique('members', 'national_insurance_number')->ignore($member->id),
            // ],
            'primary_country_code' => 'required|string|max:255',
            'primary_mobile_number' => [
                'required',
                'numeric',
                'digits_between:10,15',
                Rule::unique('members', 'primary_mobile_number')->ignore($member->id),
            ],
            'alternate_country_code' => 'nullable|string|max:255',
            'alternate_mobile_number' => 'nullable|numeric|digits:10|unique:members,alternate_mobile_number',
        ]);

        try {
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
                // 'national_insurance_number' => $request->national_insurance_number,
                'primary_mobile_number' => $request->primary_mobile_number,
                'alternate_mobile_number' => $request->alternate_mobile_number,
                'primary_country_code' => $request->primary_country_code,
                'alternate_country_code' => $request->alternate_country_code,
            ]);

            if ($request->hasFile('profile_photo')) {
                $file = $request->file('profile_photo');
                $filePath = $file->store('membersPhotos', 'public');
                $member->update(['profile_photo' => $filePath]);
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
        $formData = [
            'url' => route('sendOtp'),
            'method' => 'GET',
            'type' => 'verify',
            // 'hasReferralCode' => 'false',
            // 'referral_code' => '',
        ];

        return view('front.become-core-member')->with('formData', $formData);
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
        ]);

        // Rate limiting for OTP sending - 3 attempts per 5 minutes per IP and member_id combination
        $ipKey = 'send_otp_ip_' . $request->ip();
        $memberKey = 'send_otp_member_' . $request->member_id;

        if (RateLimiter::tooManyAttempts($ipKey, 3)) {
            $seconds = RateLimiter::availableIn($ipKey);
            return back()->with('error', "Too many attempts. Please try again in {$seconds} seconds.");
        }

        if (RateLimiter::tooManyAttempts($memberKey, 3)) {
            $seconds = RateLimiter::availableIn($memberKey);
            return back()->with('error', "Too many OTP requests for this member. Please try again in {$seconds} seconds.");
        }

        $member = Member::where('custom_id', $request->member_id)->first();
        if (!$member) {
            return back()->with('error', 'No member found with the provided ID');
        }

        $otp = rand(100000, 999999);

        try {
            Mail::to($member->user->email)->queue(new OtpMail($otp));

            // Store OTP with expiry time (10 minutes)
            session([
                'otp' => $otp,
                'otp_expiry' => now()->addMinutes(10)->timestamp,
                'member_id' => $member->custom_id
            ]);

            // Hit rate limiters
            RateLimiter::hit($ipKey, 300); // 5 minutes decay
            RateLimiter::hit($memberKey, 300);

            $formData = [
                'url' => route('validateOtp'),
                'method' => 'GET',
                'type' => 'validate',
                'member_id' => $member->custom_id,
            ];

            return view('front.become-core-member')
                ->with('formData', $formData)
                ->with('member_id', $member->custom_id);
        } catch (\Exception $e) {
            Log::error('Failed to send OTP: ' . $e->getMessage());
            return back()->with('error', 'Failed to send OTP');
        }
    }

    public function validateOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric|digits:6',
        ]);

        // Rate limiting for OTP verification - 5 attempts per 15 minutes per IP
        $key = 'verify_otp_' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            return back()->with('error', "Too many verification attempts. Please try again in {$seconds} seconds.");
        }

        // Check if OTP is expired
        if (!session('otp_expiry') || now()->timestamp > session('otp_expiry')) {
            return back()->with('error', 'OTP has expired. Please request a new one.');
        }

        // Verify OTP
        if ($request->otp != session('otp')) {
            RateLimiter::hit($key, 900); // 15 minutes decay
            return back()->with('error', 'Invalid OTP');
        }

        // Clear OTP session data after successful verification
        session()->forget(['otp', 'otp_expiry']);

        session()->put('is_verified', true);

        return redirect()->route('verify_member');
    }

    public function verify_member(Request $request)
    {
        if (!session('is_verified')) {
            return redirect()->route('become_core_member')->with('error', 'Please verify your OTP first');
        }

        $member_id = session('member_id');
        $member = Member::where('custom_id', $member_id)->first();

        if (!$member) {
            return back()->with('error', 'No member found with the provided ID');
        }

        $core_member = Core_member::where('user_id', $member->user->id)->first();
        if ($core_member) {
            return back()->with('error', 'We\'ve received your core membership request, and it\'s under review. No further submissions are needed at this time.');
        }



        return view('front.core-member-form')->with('member', $member);
    }
    public function core_member_form(Request $request, $id)
    {
        // dd($request->all());
        if ($request->declaration != 'on') {
            return back()->with('error', 'Please accept the declaration');
        }

        $validatedData = Validator::make($request->all(), [
            'primary_mobile_number' => 'required|numeric|digits_between:10,15',
            'nationality' => 'required|string',
            'profession' => 'required|string',
            'employer' => 'nullable|string',
            'relevant_experience' => 'required|string',
            'why_join' => 'required|string',
            'experience_in_political_campaigns' => 'required|boolean',
            'experience_in_political_campaigns_details' => 'required_if:experience_in_political_campaigns,true',
            'member_of_other_political_party' => 'required|boolean',
            'reference_1' => 'nullable|string',
            'reference_2' => 'nullable|string',
            'date_of_application' => 'required|date',
            'reviewed_by' => 'nullable|string',
            'position_assigned' => 'nullable|string',
            'date_of_review' => 'nullable|date',
            'skills_expertise' => 'required|array',
            'key_areas' => 'required|array',
            'willing_to_travel' => 'required|boolean',
            'signature' => 'required|file|max:2048',
        ]);

        if ($validatedData->fails()) {
            // dd($validatedData->errors());
            return back()->withErrors($validatedData)->withInput();
        }

        // dd($request->all());

        $requestData = $request->except(['signature']);
        $requestData['user_id'] = $id;

        // Convert arrays to JSON for storage
        $requestData['skills_expertise'] = json_encode($request->input('skills_expertise', []));
        $requestData['key_areas'] = json_encode($request->input('key_areas', []));
        // dd($requestData);
        // Create Core Member record
        $core_member = Core_member::create($requestData);
        // dd($core_member);
        // Handle signature file upload
        if ($request->hasFile('signature')) {
            $file = $request->file('signature');
            $filePath = $file->store('coreMemberSignatures', 'public');
            $core_member->update([
                'signature' => $filePath,
            ]);
        }

        return redirect()->route('become_core_member')->with('success', 'Request to Become a Core Member Submitted. Thank you for your interest in joining One Nation\'s Core Team. Your request has been received and is under review.');
    }
}
