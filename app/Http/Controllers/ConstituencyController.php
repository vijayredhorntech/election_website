<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\Country;
use App\Models\County;
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

    public function adminIndex()
    {
        $constituencies = Constituency::with(['country', 'county'])->get();
        $countries = Country::all();
        $counties = County::all();
        return view('admin.settings.constituencies.index', compact('constituencies', 'countries', 'counties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'county_id' => 'required|exists:counties,id',
        ]);

        Constituency::create($request->all());
        return redirect()->back()->with('success', 'Constituency added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'county_id' => 'required|exists:counties,id',
        ]);

        $constituency = Constituency::findOrFail($id);
        $constituency->update($request->all());
        return redirect()->back()->with('success', 'Constituency updated successfully');
    }

    public function destroy($id)
    {
        $constituency = Constituency::findOrFail($id);
        $constituency->delete();
        return redirect()->back()->with('success', 'Constituency deleted successfully');
    }

    public function getConstituenciesByCountryCode($countryCode)
    {
        $constituencies = Constituency::whereHas('country', function($query) use ($countryCode) {
            $query->where('code', $countryCode);
        })->get();
        
        return response()->json($constituencies);
    }
}
