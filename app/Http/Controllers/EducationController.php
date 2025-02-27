<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('admin.settings.education.index', compact('educations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:education',
        ]);

        Education::create($request->all());
        return redirect()->back()->with('success', 'Education level added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:education,name,' . $id,
        ]);

        $education = Education::findOrFail($id);
        $education->update($request->all());
        return redirect()->back()->with('success', 'Education level updated successfully');
    }

    public function destroy($id)
    {
        $education = Education::findOrFail($id);
        $education->delete();
        return redirect()->back()->with('success', 'Education level deleted successfully');
    }
} 