<?php

namespace App\Http\Controllers;

use App\Models\Donation;

class DonationController extends Controller
{
    public function index()
    {

        $donations = Donation::get()->all();

        return view('admin.donations.index')->with('donations', $donations);
    }

    public function printReceipt($id)
    {
        $donation = Donation::find($id);
        return view('admin.donations.receipt')->with('donation', $donation);

    }
}
