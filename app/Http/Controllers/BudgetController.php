<?php

namespace App\Http\Controllers;

class BudgetController extends Controller
{
    public function index()
    {
        $formData = [
            'type' => 'Create',
            'method' => 'POST',
            'url' => route('office.store')
        ];
        return view('admin.budget.index') ->with('formData', $formData);
    }
}
