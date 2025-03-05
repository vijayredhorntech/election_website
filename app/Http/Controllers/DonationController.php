<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Constituency;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {

        $donations = Donation::get()->all();

        return view('admin.donations.index')->with('donations', $donations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'email' => 'required|email|unique:donations,email',
            'constituency' => 'required|exists:constituencies,name',
            'amount' => 'required|numeric|min:1',
            // 'donation_date' => 'required|date',
            // 'status' => 'required|in:pending,approved,rejected',
        ]);

        $donation = new Donation();

        $donation->donor_name = $request->donor_name;
        $donation->email = $request->email;
        $donation->amount = $request->amount;
        $donation->constituency_id = Constituency::where('name', $request->constituency)->first()->id;
        $donation->donation_date = now();
        $donation->status = 'pending';

        $donation->save();

        // Donation::create($request->all());

        return redirect()->route('donation.index')->with('success', 'Donation added successfully.');
    }

    public function show(Donation $donation)
    {
        return view('donation.show', compact('donation'));
    }

    public function edit($id)
    {

        $formData = [
            'type' => 'Update',
            'method' => 'POST',
            'url' => route('donation.update', ['id' => $id])
        ];

        $donation = Donation::findOrFail($id);
        $donations = Donation::get()->all();

        return view('admin.donations.index')->with('formData', $formData)->with('donation', $donation)->with('donations', $donations);
    }

    public function update(Request $request, Donation $donation)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'email' => 'required|email|unique:donations,email,' . $donation->id,
            'constituency_id' => 'required|exists:constituencies,id',
            'amount' => 'required|numeric|min:1',
            'donation_date' => 'required|date',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $donation->update($request->all());

        return redirect()->route('donation.index')->with('success', 'Donation updated successfully.');
    }

    public function destroy(Donation $donation)
    {
        $donation->delete();
        return redirect()->route('donation.index')->with('success', 'Donation deleted successfully.');
    }
}
