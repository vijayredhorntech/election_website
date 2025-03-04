<?php

namespace App\Http\Controllers;

use App\Models\Core_member;

class CoreMemberController extends Controller
{
    public function index()
    {
        $members = Core_member:: all();
        return view('admin.core_members.index', compact('members'));
    }
}
