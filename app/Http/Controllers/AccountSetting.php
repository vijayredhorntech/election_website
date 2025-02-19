<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Http\Controllers\ConstituencyController;
use App\Models\Constituency;

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

        $expenseCategories = ExpenseCategory::orderBy('created_at', 'desc')->get();

        // Create a request instance to use with getPaginatedConstituency
        $request = new Request([
            'limit' => 10,
            'page' => 1
        ]);

        $constituencies = app(ConstituencyController::class)->getPaginatedConstituency($request);
        $constituencies = json_decode($constituencies->getContent());

        return view('admin.account-setting.index')
            ->with('expenseCategories', $expenseCategories)
            ->with('constituencies', $constituencies->data)
            ->with('formData', $formData);
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
