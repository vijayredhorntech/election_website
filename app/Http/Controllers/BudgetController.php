<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\FinancialYear;
use App\Models\Office;
use App\Facades\CustomLog;

class BudgetController extends Controller
{
    public function index()
    {
        try {
            $formData = [
                'type' => 'Create',
                'method' => 'POST',
                'url' => route('budget.allot')
            ];

            $offices = Office::with('budgets')->get();
            $financialYears = FinancialYear::all();
            $budegts = Budget::all();

            CustomLog::info('Budget page loaded successfully');

            return view('admin.budget.index')->with('formData', $formData)->with('offices', $offices)->with('financialYears', $financialYears)->with('budegts', $budegts);
        } catch (\Exception $e) {
            CustomLog::error('Error in BudgetController@index: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while loading the budget page.');
        }
    }

    public function allotBudget(Request $request)
    {
        // dd($request->all());
        try {
            $validatedData = $request->validate([
                'office_id' => 'required|exists:offices,id',
                'amount' => 'required|numeric|min:0|max:99999999',
                'financial_year' => 'required|exists:financial_years,year',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'type' => 'required|in:credit,debit',
                'status' => 'required|in:Pending,Approved,Rejected',
            ]);

            Budget::create(
                [
                    'office_id' => $validatedData['office_id'],
                    'amount' => $validatedData['amount'],
                    'financial_year_id' => FinancialYear::where('year', $validatedData['financial_year'])->first()->id,
                    'start_date' => $validatedData['start_date'],
                    'end_date' => $validatedData['end_date'],
                    'type' => $validatedData['type'],
                    'status' => $validatedData['status'],
                ]
            );

            CustomLog::info('Budget allotted successfully');

            return redirect()->route('budget.index')->with('success', 'Budget allotted successfully!');
        } catch (\Exception $e) {
            CustomLog::error('Error in BudgetController@allotBudget: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while allotting the budget.');
        }
    }

    public function edit($id)
    {
        try {
            $budget = Budget::find($id);
            $financial_year = FinancialYear::where('id', $id)->first();
            $formData = [
                'type' => 'Update',
                'method' => 'POST',
                'url' => route('budget.update', ['id' => $budget->id])
            ];

            $budegts = Budget::all();
            $financialYears = FinancialYear::all();
            $offices = Office::all();

            return view('admin.budget.index')->with('budget', $budget)->with('formData', $formData)->with('budegts', $budegts)->with('financialYears', $financialYears)->with('financial_year', $financial_year)->with('offices', $offices);
        } catch (\Exception $e) {
            CustomLog::error('Error in BudgetController@edit: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while editing the budget.');
        }
    }

    public function delete($id)
    {
        try {
            $budget = Budget::find($id);
            $budget->delete();
            return redirect()->route('budget.index')->with('success', 'Budget deleted successfully!');
        } catch (\Exception $e) {
            CustomLog::error('Error in BudgetController@delete: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while deleting the budget.');
        }
    }
}
