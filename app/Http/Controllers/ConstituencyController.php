<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Facades\CustomLog;

class ConstituencyController extends Controller
{
    public function index()
    {
        try {
            $constituencies = Constituency::all();

            CustomLog::info('Constituency page loaded successfully');

            return response()->json($constituencies);
        } catch (\Exception $e) {
            CustomLog::error('Error in ConstituencyController@index: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while loading the constituency page.');
        }
    }

    public function getPaginatedConstituency(Request $request)
    {
        try {
            $limit = $request->query('limit', 10);
            $page = $request->query('page', 1);

            $constituencies = Constituency::orderBy('created_at', 'desc')
                ->paginate($limit, ['*'], 'page', $page);

            CustomLog::info('Constituency page loaded successfully');

            return response()->json($constituencies);
        } catch (\Exception $e) {
            CustomLog::error('Error in ConstituencyController@getPaginatedConstituency: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while loading the constituency page.');
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|unique:constituencies,code',
            ]);

            Constituency::create($request->all());

            CustomLog::info('Constituency created successfully');

            return redirect()->back()->with('success', 'Constituency created successfully');
        } catch (\Exception $e) {
            CustomLog::error('Error in ConstituencyController@store: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while creating the constituency.');
        }
    }

    public function getConstituenciesByCountryCode($countryCode)
    {
        // dd($countryCode);
        // Log::info($countryCode);
        $country = Country::where('code', $countryCode)->first();
        $constituencies = Constituency::where('country_id', $country->id)->get();
        return response()->json($constituencies);
    }
}
