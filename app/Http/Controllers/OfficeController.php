<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\County;
use App\Models\Constituency;
use App\Models\ExpenseCategory;
use App\Models\Expense;

class OfficeController extends Controller
{
    public function index()
    {
        $formData = [
            'type' => 'Create',
            'method' => 'POST',
            'url' => route('office.store')
        ];
        $offices = Office::get()->all();

        return view('admin.office.index')->with('formData', $formData)->with('offices', $offices);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'postcode' => [
                'required',
                'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]?) ?([0-9][A-Z]{2})$/i'
            ],
            'address' => 'required',
            'house_name_number' => 'required',
            'street' => 'required',
            'town_city' => 'required',
            'country' => 'required|exists:countries,code',
            'county' => 'required|exists:counties,code',
            'constituency' => 'required|exists:constituencies,code',
        ]);

        $office = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'postcode' => $validatedData['postcode'],
            'address' => $validatedData['address'],
            'country_id' => Country::where('code', $validatedData['country'])->first()->id,
            'county_id' => County::where('code', $validatedData['county'])->first()->id,
            'city' => $validatedData['town_city'],
            'constituency_id' => Constituency::where('code', $validatedData['constituency'])->first()->id,
        ];

        Office::create($office);

        return redirect()->route('office.index')->with('success', 'Office Created Successfully!');
    }
    public function edit($id)
    {
        $formData = [
            'type' => 'Update',
            'method' => 'POST',
            'url' => route('office.update', ['id' => $id])
        ];
        $office = Office::findOrFail($id);
        $offices = Office::get()->all();
        return view('admin.office.index')->with('formData', $formData)->with('office', $office)->with('offices', $offices);
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
        $validatedData =  $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'postcode' => [
                'required',
                'regex:/^([A-Z]{1,2}[0-9][0-9A-Z]?) ?([0-9][A-Z]{2})$/i'
            ],
            'address' => 'required',
            'country' => 'required|exists:countries,code',
            'county' => 'required|exists:counties,code',
            'city' => 'required',
            'constituency' => 'required|exists:constituencies,code',
        ]);

        $office = Office::findOrFail($id);

        $newOffice = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'postcode' => $validatedData['postcode'],
            'address' => $validatedData['address'],
            'country_id' => Country::where('code', $validatedData['country'])->first()->id,
            'county_id' => County::where('code', $validatedData['county'])->first()->id,
            'city' => $validatedData['city'],
            'constituency_id' => Constituency::where('code', $validatedData['constituency'])->first()->id,
        ];

        $office->update($newOffice);

        return redirect()->route('office.index')->with('success', 'Office updated successfully!');
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
