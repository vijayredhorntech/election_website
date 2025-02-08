<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use App\Models\Country;
use App\Models\County;
use App\Models\Constituency;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index()
    {
        $formData = [
            'url' => route('member.store'),
            'method' => 'POST',
            'type' => 'Create',
        ];

        $Members = Member::all();
        $countries = Country::all();

        return view('admin.members.index')->with('formData', $formData)->with('members', $Members)->with('countries', $countries);
    }


    public function store(MemberRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $member = [];

            if ($validatedData['referrer_code']) {
                $referrer = User::where('referral_code', $validatedData['referrer_code'])->first();

                if (!$referrer) {
                    return redirect()->route('members.index')->with('error', 'Invalid Referral Code');
                }
                $validatedData['referrer_id'] = $referrer->id;
            }

            $member['referrer_id'] = $validatedData['referrer_id'];
            $member['enrollment_date'] = now();
            $member['title'] = $validatedData['title'];
            $member['first_name'] = $validatedData['first_name'];
            $member['last_name'] = $validatedData['last_name'];
            $member['primary_mobile_number'] = $validatedData['primary_mobile_number'];
            $member['alternate_mobile_number'] = $validatedData['alternate_mobile_number'];
            $member['email'] = $validatedData['email'];
            $member['postcode'] = $validatedData['postcode'];
            $member['address'] = $validatedData['address'];
            $member['country_id'] = Country::where('code', $validatedData['country'])->first()->id;
            $member['county_id'] = County::where('code', $validatedData['county'])->first()->id;
            $member['city'] = $validatedData['city'];
            $member['constituency_id'] = Constituency::where('name', $validatedData['constituency'])->first()->id;

            Member::create($member);
            return redirect()->route('members.index')->with('success', 'Member created successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('members.index')->with('error', 'An error occurred while creating the member');
        }
    }

    public function edit($id)
    {
        $formData = [
            'url' => route('member.update', ['id' => $id]),
            'method' => 'POST',
            'type' => 'Update',
        ];

        $Members = Member::all();
        $member = Member::find($id);
        return view('admin.members.index')->with('member', $member)->with('formData', $formData)->with('members', $Members);
    }

    public function view($id)
    {
        $member = Member::find($id);
        return view('admin.members.view')->with('member', $member);
    }


    public function update(MemberRequest $request, $id)
    {
        $validatedData = $request->validated();
        $member = Member::find($id);
        $member->update($validatedData);
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    public function delete($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }
}
