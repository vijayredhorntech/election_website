<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountyController extends Controller
{
    public function index()
    {
        $counties = County::all();
        return response()->json($counties);
    }

    public function getCountiesByCountryCode($countryCode)
    {
        $country = Country::where('code', $countryCode)->first();
        Log::info($country);
        $counties = $country->counties;
        Log::info($counties);
        return response()->json($counties);
    }
}
