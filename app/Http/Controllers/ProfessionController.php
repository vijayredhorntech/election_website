<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::all();
        return view('admin.settings.professions.index', compact('professions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:professions',
        ]);

        Profession::create($request->all());
        return redirect()->back()->with('success', 'Profession added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:professions,name,' . $id,
        ]);

        $profession = Profession::findOrFail($id);
        $profession->update($request->all());
        return redirect()->back()->with('success', 'Profession updated successfully');
    }

    public function destroy($id)
    {
        $profession = Profession::findOrFail($id);
        $profession->delete();
        return redirect()->back()->with('success', 'Profession deleted successfully');
    }
} 