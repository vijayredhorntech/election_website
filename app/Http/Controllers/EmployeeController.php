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

    public function view($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.view')->with('employee', $employee);
    }
}
