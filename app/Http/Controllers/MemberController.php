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
use Illuminate\Validation\ValidationException;
use App\Http\Requests\MemberUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $formData = [
            'url' => route('member.store'),
            'method' => 'POST',
            'type' => 'Create',
        ];


        // fetch all user with role of member
        $users = User::where('role', 'member')->orWhere('role', 'employee')->get();

        $countries = Country::all();

        return view('admin.member.index')->with('formData', $formData)->with('users', $users)->with('countries', $countries);
    }

    public function store(MemberRequest $request)
    {
        $validatedData = $request->validated();

        if ($validatedData['referrer_code']) {
            $referrer = User::where('referral_code', $validatedData['referrer_code'])->first();
            if (!$referrer) {
                throw ValidationException::withMessages(['referrer_code' => 'Invalid Referral Code.']);
            }
            $validatedData['referrer_id'] = $referrer->id;
        }

        try {

            // dd($validatedData['address']);
            return DB::transaction(function () use ($validatedData) {
                // Create user first
                $user = User::create([
                    'name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
                    'email' => $validatedData['email'],
                    'password' => Hash::make('password'),
                ]);

                $country = Country::where('code', $validatedData['country'])->first();
                $county = County::where('code', $validatedData['county'])->first();
                $constituency = Constituency::where('name', $validatedData['constituency'])->first();

                $member = Member::create([
                    'user_id' => $user->id,
                    'referrer_id' => $validatedData['referrer_id'] ?? null,
                    'enrollment_date' => now(),
                    'title' => $validatedData['title'],
                    'first_name' => $validatedData['first_name'],
                    'last_name' => $validatedData['last_name'],
                    'primary_mobile_number' => $validatedData['primary_mobile_number'],
                    'alternate_mobile_number' => $validatedData['alternate_mobile_number'],
                    'email' => $validatedData['email'],
                    'postcode' => $validatedData['postcode'],
                    'address' => $validatedData['address'],
                    'country_id' => $country->id,
                    'county_id' => $county->id,
                    'city' => $validatedData['town_city'],
                    'constituency_id' => $constituency->id,
                    'date_of_birth' => $validatedData['date_of_birth'],
                    'gender' => $validatedData['gender'],
                    'marital_status' => $validatedData['marital_status'],
                    'qualification' => $validatedData['qualification'],
                    'profession' => $validatedData['profession'],
                    'national_insurance_number' => $validatedData['national_insurance_number'],
                ]);

                return redirect()->route('member.index')->with('success', 'Member created successfully');
            });
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('member.index')->with('error', 'An error occurred while creating the member');
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

        if (!$member) {
            return back()->with('error', 'Member not found');
        }

        return view('admin.member.index')->with('member', $member)->with('formData', $formData)->with('members', $Members);
    }

    public function view($id)
    {
        $member = Member::find($id);

        if (!$member) {
            return back()->with('error', 'Member not found');
        }

        return view('admin.member.view')->with('memberDetails', $member);
    }

    public function update(MemberUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();

        try {
            $member = Member::findOrFail($id);
            $updateData = [
                'title' => $validatedData['title'],
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'postcode' => $validatedData['postcode'],
                'address' => $validatedData['address'],
                'country_id' => Country::where('code', $validatedData['country'])->first()->id,
                'county_id' => County::where('code', $validatedData['county'])->first()->id,
                'city' => $validatedData['city'],
                'constituency_id' => Constituency::where('name', $validatedData['constituency'])->first()->id,
                'date_of_birth' => $validatedData['date_of_birth'],
                'gender' => $validatedData['gender'],
                'marital_status' => $validatedData['marital_status'],
                'qualification' => $validatedData['qualification'],
                'profession' => $validatedData['profession'],
                'profile_status' => 'active',
            ];

            $member->update($updateData);
            return redirect()->route('member.index')->with('success', 'Member updated successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'An error occurred while updating the member');
        }
    }

    public function delete($id)
    {
        try {
            $member = Member::find($id);

            if (!$member) {
                return back()->with('error', 'Member not found');
            }

            $member->delete();
            return back()->with('success', 'Member deleted successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'An error occurred while deleting the member');
        }
    }

    public function referred($id)
    {
        $member = Member::find($id);
        $data = $member->referredMembers()->orderBy('created_at', 'desc')->get();
        $routes = [
            [
                'label' => 'Edit',
                'route' => 'member.edit',
                'params' => ['id' => 'row->id'],
                'class' => 'bg-info text-white px-3 py-1 rounded-[3px]',
                'icon' => 'fa fa-edit',
            ],
            [
                'label' => 'View',
                'route' => 'member.view',
                'params' => ['id' => 'row->id'],
                'class' => 'bg-success text-white px-3 py-1 rounded-[3px] ml-0.5',
                'icon' => 'fa fa-eye',
            ],
        ];

        $columns = [
            [
                'label' => 'Sr. No.',
                'expression' => 'index + 1',
            ],
            [
                'label' => 'Name',
                'expression' => 'row->title . " " . row->first_name . " " . row->last_name',
            ],
            [
                'label' => 'Email Id',
                'expression' => 'row->email',
            ],
            [
                'label' => 'Phone',
                'expression' => 'row->primary_mobile_number',
            ],
            [
                'label' => 'Referral Code',
                'expression' => 'row->user->referral_code',
            ],
            [
                'label' => 'Referred By',
                'expression' => 'row->referrer->name',
            ],
            [
                'label' => 'Constituency',
                'expression' => 'row->constituency->name',
            ],
            [
                'label' => 'Members Added',
                'expression' => 'row->referredMembers()->count()',
            ],

        ];

        return view('admin.member.view-all')->with('member', $member)->with('data', $data)->with('columns', $columns)->with('routes', $routes);
    }

    public function donations($id)
    {
        $member = Member::find($id);

        // TODO: Get the donations for the member

        $data = $member->referredMembers()->orderBy('created_at', 'desc')->get();

        $routes = [
            [
                'label' => 'Download Invoice',
                'route' => 'member.edit',
                'params' => ['id' => 'row->id'],
                'class' => 'bg-info text-white px-3 py-1 rounded-[3px]',
                'icon' => 'fa fa-download',
            ],
            [
                'label' => 'View Invoice',
                'route' => 'member.view',
                'params' => ['id' => 'row->id'],
                'class' => 'bg-success text-white px-3 py-1 rounded-[3px] ml-0.5',
                'icon' => 'fa fa-eye',
            ],
        ];

        $columns = [
            [
                'label' => 'Sr. No.',
                'expression' => 'index + 1',
            ],
            [
                'label' => 'Donor Name',
                'expression' => 'row->donor_name',
            ],
            [
                'label' => 'Email',
                'expression' => 'row->email',
            ],
            [
                'label' => 'Constituency',
                'expression' => 'row->constituency_id',
            ],
            [
                'label' => 'Amount',
                'expression' => 'row->amount',
            ],
            [
                'label' => 'Donation Date',
                'expression' => 'row->donation_date',
            ],
            [
                'label' => 'Status',
                'expression' => 'row->status',
            ],
        ];

        return view('admin.member.view-all')->with('member', $member)->with('data', $data)->with('columns', $columns)->with('routes', $routes);
    }

    public function memberProfile()
    {

        if (auth()->user()->member->profile_status === 'active') {
            $memberDetails = auth()->user()->member;
            return view('front.member-profile')->with('memberDetails', $memberDetails);
        } else {
            return redirect()->route('memberBasicInformation');
        }
    }

    public function securityInfoUpdate(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('memberProfile')->with('success', 'Password updated successfully');
    }

    // public function downloadId()
    // {
    //     $user = auth()->user();
    //     $member = $user->member;

    //     $data = [
    //         'name' => $member->title . ' ' . $user->name,
    //         'issue_date' => Carbon::now()->format('d-m-Y'),
    //         'constituency' => $member->constituency->name,
    //         'profile_photo' => $member->profile_photo
    //             ? asset('storage/' . $member->profile_photo)
    //             : asset('assets/images/default-profile.png'),
    //         'member_id' => $member->custom_id
    //     ];

    //     $pdf = PDF::loadView('id_card.template', $data);

    //     return $pdf->download('member_id_' . $member->custom_id . '.pdf');
    // }

    public function downloadId()
    {
        $user = auth()->user();
        $member = $user->member;

        $data = [
            'name' => $member->title . ' ' . $user->name,
            'issue_date' => $member->enrollment_date,
            'constituency' => $member->constituency->name,
            'website' => route('index'),
            'profile_photo' => $member->profile_photo
                ? asset('storage/' . $member->profile_photo)
                : asset('assets/images/default-profile.png'),
            'contact_number' => $member->primary_country_code . ' ' . $member->primary_mobile_number,
            'member_id' => $member->custom_id,
            'referral_code' => $user->referral_code
        ];

        // $pdf = PDF::loadView('id_card.template', $data);

        // return $pdf->download('member_id_' . $member->custom_id . '.pdf');
        return view('id_card.template')->with('data', $data);
    }
}
