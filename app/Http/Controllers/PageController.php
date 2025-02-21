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


    public function whatIsMembership()
    {
         return view('front.what-is-membership');
    }

}
