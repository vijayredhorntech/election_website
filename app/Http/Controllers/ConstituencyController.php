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
}
