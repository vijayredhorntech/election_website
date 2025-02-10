<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\FinancialYear;

class BudgetController extends Controller
{
    public function index()
    {
        $formData = [
            'type' => 'Create',
            'method' => 'POST',
            'url' => route('office.store')
        ];
        return view('admin.budget.index')->with('formData', $formData);
    }

    public function allotBudget(Request $request)
    {
        $validatedData = $request->validate([
            'office_id' => 'required|exists:offices,id',
            'amount' => 'required|numeric|min:0',
            'fiscal_year' => 'required|exists:financial_years,year',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'type' => 'required|in:Create,Update,Delete',
            'status' => 'required|in:Pending,Approved,Rejected',
        ]);

        $budget = Budget::create();

        $budget->office_id = $validatedData['office_id'];
        $budget->amount = $validatedData['amount'];
        $budget->financial_year_id = FinancialYear::where('year', $validatedData['fiscal_year'])->first()->id;
        $budget->start_date = $validatedData['start_date'] ?? null;
        $budget->end_date = $validatedData['end_date'] ?? null;
        $budget->type = $validatedData['type'];
        $budget->status = $validatedData['status'];

        $budget->save();

        return redirect()->route('admin.budget.index')->with('success', 'Budget allotted successfully!');
    }
}
