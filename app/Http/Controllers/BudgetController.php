<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\FinancialYear;
use App\Models\Office;

class BudgetController extends Controller
{
    public function index()
    {
        $formData = [
            'type' => 'Create',
            'method' => 'POST',
            'url' => route('budget.allot')
        ];

        $offices = Office::with('budgets')->get();
        $financialYears = FinancialYear::all();
        return view('admin.budget.index')->with('formData', $formData)->with('offices', $offices)->with('financialYears', $financialYears);
    }

    public function allotBudget(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'office_id' => 'required|exists:offices,id',
            'amount' => 'required|numeric|min:0',
            'financial_year' => 'required|exists:financial_years,year',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'type' => 'required|in:Create,Update,Delete',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);
        // dd($validatedData);
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

        return redirect()->route('budget.index')->with('success', 'Budget allotted successfully!');
    }
}
