<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contact::orderBy('created_at', 'desc')->get();
            return view('admin.contact.index', compact('contacts'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching contacts: ' . $e->getMessage());
        }
    }
}
