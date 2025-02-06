<?php

namespace App\Http\Controllers;

// use App\Models\Employee;
// use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employees.index');
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
}
