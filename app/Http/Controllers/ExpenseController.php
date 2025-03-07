<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Facades\CustomLog;

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
            'bill' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,xls,xlsx|max:2048',
        ]);

        try {
            if ($request->hasFile('bill')) {
                $file = $request->file('bill');
                $filePath = $file->store('bills', 'private');
            }
            $bill = $filePath ?? null;

            Expense::create(
                [
                    'user_id' => auth()->user()->id,
                    'expense_category_id' => ExpenseCategory::find($request->category)->id,
                    'amount' => $request->amount,
                    'date' => $request->date,
                    'description' => $request->description,
                    'office_id' => $request->office_id,
                    'bill' => $bill,
                ]
            );

            return redirect()->back()->with('success', 'Expense Created Successfully');
        } catch (\Exception $e) {
            CustomLog::error(
                'Expense Creation Failed: ' . $e->getMessage(),
                [
                    'user_id' => auth()->user()->id,
                    'request' => $request->all(),
                ]
            );

            return redirect()->back()->with('error', 'Failed to create expense')->withInput();
        }
    }

    public function download($filename)
    {
        $filePath = "bills/{$filename}";

        if (!Storage::disk('private')->exists($filePath)) {
            abort(404);
        }

        return response()->download(storage_path("app/private/{$filePath}"));
    }
}
