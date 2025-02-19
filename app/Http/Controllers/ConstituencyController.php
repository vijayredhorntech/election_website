<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use Illuminate\Http\Request;

class ConstituencyController extends Controller
{
    public function index()
    {
        $constituencies = Constituency::all();
        return response()->json($constituencies);
    }

    public function getConstituencyByName($name)
    {
        $constituency = Constituency::where('name', 'like', '%' . $name . '%')->get();
        return response()->json($constituency);
    }

    public function getPaginatedConstituency(Request $request)
    {
        // dd($request);
        $limit = $request->query('limit', 10);
        $page = $request->query('page', 1);

        $constituencies = Constituency::orderBy('created_at', 'desc')
            ->paginate($limit, ['*'], 'page', $page);

        return response()->json($constituencies);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|unique:constituencies,code',
        ]);
        // dd($request->all());
        Constituency::create($request->all());
        return redirect()->back()->with('success', 'Constituency created successfully');
    }
}
