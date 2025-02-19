<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConstituencyController extends Controller
{
    public function index()
    {
        $constituencies = Constituency::all();
        return response()->json($constituencies);
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

    public function getConstituenciesByCountryCode($countryCode)
    {
        // dd($countryCode);
        Log::info($countryCode);
        $country = Country::where('code', $countryCode)->first();
        $constituencies = Constituency::where('country_id', $country->id)->get();
        return response()->json($constituencies);
    }
}
