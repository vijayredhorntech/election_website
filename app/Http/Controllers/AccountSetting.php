<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Http\Controllers\ConstituencyController;
use App\Models\Constituency;
use App\Facades\CustomLog;
use App\Models\Title;
use App\Models\Country;
use App\Models\County;
use App\Models\Profession;
use App\Models\Education;

class AccountSetting extends Controller
{
    /**
     * Display a listing of the setting page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'titles' => Title::all(),
            'countries' => Country::all(),
            'counties' => County::with('country')->get(),
            'constituencies' => Constituency::with(['country', 'county'])->get(),
            'professions' => Profession::all(),
            'educations' => Education::all(),
            'expenseCategories' => ExpenseCategory::all(),
        ];

        return view('admin.settings.index', $data);
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
