<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
         return view('front.index');
    }
    public function donate()
    {
         return view('front.donate');
    }
    public function donnerDetails()
    {
         return view('front.donner-details');
    }
    public function paymentMethod()
    {
         return view('front.payment-method');
    }

    public function joinUs()
    {
         return view('front.join-us');
    }
    public function otpVerification()
    {
         return view('front.otp_verification');
    }

    public function membershipPlans()
    {
         return view('front.membership-plans');
    }

    public function memberBasicInfo()
    {
         return view('front.member-basic-info');
    }

    public function memberAddressInfo()
    {
         return view('front.member-address-info');
    }
    public function donationSection()
    {
            return view('front.donation-section');
    }

    public function paymentSection()
    {
            return view('front.payment-section');
    }
}
