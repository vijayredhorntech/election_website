<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use App\Models\Office;
use App\Models\User;
use App\Models\Event;
use App\Models\Constituency;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'member') {
            return redirect()->route('memberProfile');
        }

        $officeCount = Office::count();
        $employeeCount = User::where('role', 'employee')->count();
        $memberCount = User::where('role', 'member')->count();
        $events = Event::latest()->get();
        $officeData = Office::withCount('employees')->get();

        $topConstituencies = Constituency::withCount('members')
            ->orderByDesc('members_count')
            ->limit(14)
            ->get();

        $topUsers = User::withCount('referredMembers')
            ->orderByDesc('referred_members_count')
            ->take(10) // Fetch top 10 users
            ->get();

        return view('admin.dashboard')
            ->with('officeCount', $officeCount)
            ->with('employeeCount', $employeeCount)
            ->with('memberCount', $memberCount)
            ->with('events', $events)
            ->with('topConstituencies', $topConstituencies)
            ->with('officeData', $officeData)
            ->with('topUsers', $topUsers);
    }
    public function setFinancialYear(Request $request)
    {
        FinancialYear::where('active', 1)->update(['active' => 0]);

        FinancialYear::where('id', $request->id)->update(['active' => 1]);

        return redirect()->route('dashboard')->with('success', 'Financial Year Set Successfully!');
    }
}
