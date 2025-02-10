<?php

namespace App\Http\Controllers;

// use App\Models\Employee;
// use Illuminate\Http\Request;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\Member;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $formData = [
            'url' => route('employees.store'),
            'method' => 'POST',
            'type' => 'Create',
        ];

        $offices = Office::get()->all();
        $designations = Designation::get()->all();
        $members =  User::where('role', 'member')->get();;
        $employees = User::where('role', 'employee')->get();

        return view('admin.employees.index')
            ->with('offices', $offices)
            ->with('designations', $designations)
            ->with('members', $members)
            ->with('formData', $formData)
            ->with('employees', $employees);
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'office_id' => 'required|integer',
            'designation_id' => 'required|integer',
            'joining_date' => 'required|date',
        ]);

        // first fetch the user with id of $request->user_id, and make the role to employee and save it after that save the rest of data in employee table
        $user = User::findOrFail($request->user_id);
        $user->role = 'employee';
        $user->save();

        Employee::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Employee Created Successfully!');

    }

    public function status($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->status = !$employee->status;
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee status updated successfully!');
    }


    // public function store(Request $request)
    // {
    //     $validatedData =  $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'address' => 'required|string',
    //         'city' => 'required|string',
    //         'code' => 'required|string',
    //         'constituency' => 'required|string',
    //         'country' => 'required|string',
    //     ]);
    //     Office::create($validatedData);

    //     return redirect()->route('office.index')->with('success', 'Office Created Successfully!');
    // }
    // public function edit($id)
    // {
    //     $formData = [
    //         'type' => 'Update',
    //         'method' => 'POST',
    //         'url' => route('office.update', ['id' => $id])
    //     ];
    //     $office = Office::findOrFail($id);
    //     $offices = Office::get()->all();
    //     return view('admin.office.index')->with('formData', $formData)->with('office', $office)->with('offices', $offices);
    // }

    // public function update(Request $request, $id)
    // {
    //     $validatedData =  $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'address' => 'required|string',
    //         'city' => 'required|string',
    //         'code' => 'required|string',
    //         'constituency' => 'required|string',
    //         'country' => 'required|string',
    //     ]);

    //     $office = Office::findOrFail($id);

    //     $office->update($validatedData);

    //     return redirect()->route('office.index')->with('success', 'Office updated successfully!');
    // }

    // public function status($id)
    // {
    //     $office = Office::findOrFail($id);
    //     $office->status = !$office->status;
    //     $office->save();

    //     return redirect()->route('office.index')->with('success', 'Office status updated successfully!');
    // }

    // public function delete($id)
    // {
    //     $office = Office::findOrFail($id);
    //     $office->delete();

    //     return redirect()->route('office.index')->with('success', 'Office deleted successfully!');
    // }

    public function view()
    {
        return view('admin.employees.view');
    }
}
