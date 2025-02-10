<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $officeCount = Office::count();
        $employeeCount = User::where('role', 'employee')->count();
        $memberCount = User::where('role', 'member')->count();
        return view('admin.dashboard')
            ->with('officeCount', $officeCount)
            ->with('employeeCount', $employeeCount)
            ->with('memberCount', $memberCount);
    }
    public function setFinancialYear(Request $request)
    {
        FinancialYear::where('active', 1)->update(['active' => 0]);

        FinancialYear::where('id', $request->id)->update(['active' => 1]);

        return redirect()->route('dashboard')->with('success', 'Financial Year Set Successfully!');
    }
}
