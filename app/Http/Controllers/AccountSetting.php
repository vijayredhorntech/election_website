<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class AccountSetting extends Controller
{
    /**
     * Display a listing of the setting page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formData = [
            'type' => 'Create',
            'method' => 'POST',
            'url' => route('expense.category.store')
        ];

        $expenses = ExpenseCategory::orderBy('created_at', 'desc')->get();
        return view('admin.account-setting.index')->with('expenses', $expenses)->with('formData', $formData);
    }

    /**
     * Show the form for editing the specified expense category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editExpenseCategory($id)
    {
        $expense = ExpenseCategory::find($id);
        $expenses = ExpenseCategory::orderBy('created_at', 'desc')->get();

        $formData = [
            'type' => 'Update',
            'method' => 'POST',
            'url' => route('expense.update', $id)
        ];

        return view('admin.account-setting.index')->with('expenses', $expenses)->with('expense', $expense)->with('formData', $formData);
    }
}
