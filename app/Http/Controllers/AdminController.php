<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
           return view('admin.dashboard');
    }
    public function setFinancialYear(Request $request)
    {
            FinancialYear::where('active', 1)->update(['active' => 0]);

            FinancialYear::where('id', $request->id)->update(['active' => 1]);

        return redirect()->route('dashboard')->with('success', 'Financial Year Set Successfully!');
    }



}
