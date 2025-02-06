<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $formData = [
            'type'=>'Create',
            'method'=>'POST',
            'url'=>route('designations.store')
        ];
        $designations = Designation::get()->all();

        return view('admin.designations.index')->with('formData',$formData)->with('designations', $designations);
    }

    public function store(Request $request)
    {
        $validatedData=  $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Designation::create($validatedData);
        return redirect()->route('designations.index')->with('success', 'Designation Created Successfully!');
    }
    public function edit($id)
    {
        $formData = [
            'type'=>'Update',
            'method'=>'POST',
            'url'=>route('designations.update',['id'=>$id])
        ];
        $designation = Designation::findOrFail($id);
        $designations = Designation::get()->all();
        return view('admin.designations.index')->with('formData',$formData)->with('designation', $designation)->with('designations', $designations);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $designation = Designation::findOrFail($id);

        $designation->update($validatedData);

        return redirect()->route('designations.index')->with('success', 'Designation updated successfully!');
    }


    public function delete($id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();

        return redirect()->route('designations.index')->with('success', 'Designation deleted successfully!');
    }

}
