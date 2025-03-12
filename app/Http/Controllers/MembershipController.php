<?php

namespace App\Http\Controllers;

use App\Models\Membership;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('admin.membership.index', compact('memberships'));
    }

    public function printReceipt($id)
    {
        $membership = Membership::find($id);
        return view('admin.membership.receipt')->with('membership', $membership)->with('description', 'Membership Receipt');
    }
}
