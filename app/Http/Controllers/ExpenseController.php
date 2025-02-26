<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Store a newly created expense in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0|max:99999999',
            'category' => 'required|exists:expense_categories,id',
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'office_id' => 'required|exists:offices,id',
        ]);

        Expense::create(
            [
                'user_id' => auth()->user()->id,
                'expense_category_id' => ExpenseCategory::find($request->category)->id,
                'amount' => $request->amount,
                'date' => $request->date,
                'description' => $request->description,
                'office_id' => $request->office_id,
            ]
        );

        return redirect()->back()->with('success', 'Expense Created Successfully');
    }
}
