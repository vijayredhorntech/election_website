<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Facades\CustomLog;

class ExpenseCategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            ExpenseCategory::create($request->all() + ['user_id' => auth()->user()->id]);

            CustomLog::info('Expense category created successfully');

            return back()->with('success', 'Expense Category Created Successfully');
        } catch (\Exception $e) {
            CustomLog::error('Error in ExpenseCategoryController@store: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while creating the expense category.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $expense = ExpenseCategory::find($id);
            $expense->update($request->all());

            CustomLog::info('Expense category updated successfully');

            return back()->with('success', 'Expense Category Updated Successfully');
        } catch (\Exception $e) {
            CustomLog::error('Error in ExpenseCategoryController@update: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while updating the expense category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $expenseCategory = ExpenseCategory::find($id);
            $expenseCategory->delete();

            CustomLog::info('Expense category deleted successfully');

            return back()->with('success', 'Expense Category Deleted Successfully');
        } catch (\Exception $e) {
            CustomLog::error('Error in ExpenseCategoryController@destroy: ' . $e->getMessage(), [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return back()->with('error', 'An error occurred while deleting the expense category.');
        }
    }
}
