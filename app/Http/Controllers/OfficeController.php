<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\County;
use App\Models\Constituency;
use App\Models\Region;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Facades\CustomLog;
use Illuminate\Support\Facades\Auth;

class OfficeController extends Controller
{
    public function index()
    {
        $formData = [
            'type' => 'Create',
            'method' => 'POST',
            'url' => route('office.store')
        ];

        try {
            $offices = Office::with(['constituencies' => function ($query) {
                $query->withCount('members'); // Count members for each constituency
                $query->orderBy('members_count', 'desc');
            }])->get();

            // Add members count for each office
            $offices->each(function ($office) {
                $employees = Employee::where('office_id', $office->id)->whereRelation('designation', 'name', 'In Charge')->first();
                $office->total_members = $office->constituencies->sum('members_count');
                $office->in_charge = $employees ? $employees->user->name : 'No In Charge';
            });

            $constituencies = Constituency::get()->all();

            return view('admin.office.index')->with('formData', $formData)->with('offices', $offices)->with('constituencies', $constituencies);
        } catch (\Exception $e) {
            CustomLog::error(
                $e->getMessage(),
                [
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTraceAsString()
                ]
            );
            return back()->with('error', 'Error fetching offices');
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'postcode' => [
                'required',
                'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]?) ?([0-9][A-Z]{2})$/i'
            ],
            'house_name_number' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'town_city' => 'required|string|max:255',
            'country_code' => 'required|exists:countries,code',
            'county_code' => 'required|exists:counties,code',
            'region_code' => 'nullable|exists:regions,code',
            'constituency_code' => 'required|exists:constituencies,code',
            'constituencies' => 'nullable|array',
            'constituencies.*' => 'exists:constituencies,code',
        ]);

        // Add conditional validation for region_code when country_code is ENG
        // For england, region is required
        if ($request->input('country_code') === 'ENG') {
            $validator->sometimes('region_code', 'required', function ($input) {
                return $input->country_code === 'ENG';
            });
        }

        if ($validator->fails()) {
            CustomLog::warning('Office creation validation failed', [
                'errors' => $validator->errors()->toArray(),
                'input_data' => $request->except(['_token'])
            ]);

            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $officeData = [
                'name' => $request->name,
                'description' => $request->description,
                'postcode' => $request->postcode,
                'house_name_number' => $request->house_name_number,
                'street' => $request->street,
                'town_city' => $request->town_city,
                'country_id' => Country::where('code', $request->country_code)->first()->id,
                'county_id' => County::where('code', $request->county_code)->first()->id,
                'region_id' => Region::where('code', $request->region_code)->first()?->id,
                'constituency_id' => Constituency::where('code', $request->constituency_code)->first()->id,
            ];

            $office = Office::create($officeData);

            CustomLog::info('Office created successfully', $office->id, [
                'office_data' => $officeData
            ]);

            if ($request->constituencies) {
                $timestamp = now(); // Current timestamp

                $constituencies = Constituency::whereIn('code', $request->constituencies)
                    ->pluck('id')
                    ->mapWithKeys(fn($id) => [$id => ['created_at' => $timestamp, 'updated_at' => $timestamp]])
                    ->toArray();

                $office->constituencies()->attach($constituencies);

                CustomLog::info('Office constituencies attached', $office->id, [
                    'constituency_codes' => $request->constituencies,
                    'constituency_ids' => array_keys($constituencies)
                ]);
            }

            DB::commit();

            CustomLog::info('Office creation transaction completed', $office->id);

            return redirect()->route('office.index')->with('success', 'Office Created Successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            CustomLog::error('Office creation failed', null, [
                'exception' => $e,
                'input_data' => $request->except(['_token'])
            ]);

            return back()->with('error', 'An error occurred while creating the office')->withInput();
        }
    }

    public function edit($id)
    {
        $formData = [
            'type' => 'Update',
            'method' => 'POST',
            'url' => route('office.update', ['id' => $id])
        ];

        $office = Office::findOrFail($id);
        $offices = Office::all();
        $constituencies = Constituency::all();

        $selectedConstituencies = $office->constituencies->map(function ($c) {
            return ['id' => $c->id, 'name' => $c->name, 'code' => $c->code];
        })->values()->toJson();

        // Fetch related codes based on IDs
        $office->country_code = optional(Country::find($office->country_id))->code;
        $office->county_code = optional(County::find($office->county_id))->code;
        $office->region_code = optional(Region::find($office->region_id))->code;
        $office->constituency_code = optional(Constituency::find($office->constituency_id))->code;

        return view('admin.office.index', compact('formData', 'office', 'offices', 'constituencies', 'selectedConstituencies'));
    }


    public function view($id)
    {
        $office = Office::findOrFail($id);
        $officeEmployees = $office->employees()->get();
        $officeExpenses = Expense::where('office_id', $id)->orderBy('created_at', 'desc')->get();
        $officeExpenseCategories = ExpenseCategory::orderBy('created_at', 'desc')->get();
        return view('admin.office.view')
            ->with('office', $office)
            ->with('officeEmployees', $officeEmployees)
            ->with('officeExpenseCategories', $officeExpenseCategories)
            ->with('officeExpenses', $officeExpenses);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'postcode' => [
                'required',
                'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]?) ?([0-9][A-Z]{2})$/i'
            ],
            'house_name_number' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'town_city' => 'required|string|max:255',
            'country_code' => 'required|exists:countries,code',
            'county_code' => 'required|exists:counties,code',
            'region_code' => 'nullable|exists:regions,code',
            'constituency_code' => 'required|exists:constituencies,code',
            'constituencies' => 'nullable|array',
            'constituencies.*' => 'exists:constituencies,code',
        ]);

        // Add conditional validation for region_code when country_code is ENG
        // For england, region is required
        if ($request->input('country_code') === 'ENG') {
            $validator->sometimes('region_code', 'required', function ($input) {
                return $input->country_code === 'ENG';
            });
        }

        if ($validator->fails()) {
            CustomLog::warning('Office update validation failed', [
                'errors' => $validator->errors()->toArray(),
                'input_data' => $request->except(['_token'])
            ]);

            return back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $office = Office::findOrFail($id);

            $newOffice = [
                'name' => $request->name,
                'description' => $request->description,
                'postcode' => $request->postcode,
                'house_name_number' => $request->house_name_number,
                'street' => $request->street,
                'town_city' => $request->town_city,
                'country_id' => Country::where('code', $request->country_code)->first()->id,
                'county_id' => County::where('code', $request->county_code)->first()->id,
                'region_id' => Region::where('code', $request->region_code)->first()?->id,
                'constituency_id' => Constituency::where('code', $request->constituency_code)->first()->id,
            ];

            $office->update($newOffice);

            if ($request->constituencies) {
                $timestamp = now(); // Current timestamp

                $constituencies = Constituency::whereIn('code', $request->constituencies)
                    ->pluck('id')
                    ->mapWithKeys(fn($id) => [$id => ['updated_at' => $timestamp]])
                    ->toArray();

                $office->constituencies()->sync($constituencies);
            } else {
                $office->constituencies()->detach();
            }

            DB::commit();
            return redirect()->route('office.index')->with('success', 'Office updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            CustomLog::error(
                'message: ' . $e->getMessage(),
                'customId: ' . Auth::user()->id,
                [
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTraceAsString()
                ]
            );
            return back()->with('error', 'Error updating office')->withInput();
        }
    }

    public function status($id)
    {
        $office = Office::findOrFail($id);
        $office->status = !$office->status;
        $office->save();

        return redirect()->route('office.index')->with('success', 'Office status updated successfully!');
    }

    public function delete($id)
    {
        // check if there are no related entries in any table

        $office = Office::findOrFail($id);
        $employeesCount = $office->employees()->count();

        if ($employeesCount > 0) {
            return redirect()->route('office.index')->with('error', 'Office cannot be deleted as it has employees!');
        } else {
            $office->delete();
            return redirect()->route('office.index')->with('success', 'Office deleted successfully!');
        }
    }
}
