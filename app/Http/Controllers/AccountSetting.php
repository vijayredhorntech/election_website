<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Http\Controllers\ConstituencyController;
use App\Models\Constituency;
use App\Facades\CustomLog;

class AccountSetting extends Controller
{
    /**
     * Display a listing of the setting page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
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

            CustomLog::info('Expense categories fetched successfully');

            return view('admin.account-setting.index')
                ->with('expenseCategories', $expenseCategories)
                ->with('constituencies', $constituencies->data)
                ->with('formData', $formData);
        } catch (\Exception $e) {
            CustomLog::error('Error in AccountSetting@index: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            session()->flash('error', 'An error occurred while loading the settings page.');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified expense category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editExpenseCategory($id)
    {
        try {
            $expense = ExpenseCategory::find($id);
            $expenses = ExpenseCategory::orderBy('created_at', 'desc')->get();

            $formData = [
                'type' => 'Update',
                'method' => 'POST',
                'url' => route('expense.update', $id)
            ];

            CustomLog::info('Expense category fetched successfully');

            return view('admin.account-setting.index')->with('expenses', $expenses)->with('expense', $expense)->with('formData', $formData);
        } catch (\Exception $e) {
            CustomLog::error('Error in AccountSetting@editExpenseCategory: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            session()->flash('error', 'An error occurred while loading the settings page.');
            return redirect()->back();
        }
    }
}
