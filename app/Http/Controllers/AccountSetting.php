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
    public function index(Request $request)
    {
        $query = function ($model) use ($request) {
            return $model->when($request->search, function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            })
                ->when($request->sort, function ($query) use ($request) {
                    $sort = explode('_', $request->sort);
                    $column = $sort[0] ?? 'name';
                    $direction = $sort[1] ?? 'asc';
                    return $query->orderBy($column, $direction);
                }, function ($query) {
                    return $query->orderBy('name', 'asc');
                });
        };

        $perPage = $request->per_page ?? 10;

        $data = [
            'titles' => $query(Title::query())->paginate($perPage),
            'countries' => $query(Country::query())->paginate($perPage),
            'counties' => $query(County::with('country'))->paginate($perPage),
            'constituencies' => $query(Constituency::with(['country', 'county']))->paginate($perPage),
            'professions' => $query(Profession::query())->paginate($perPage),
            'educations' => $query(Education::query())->paginate($perPage),
            'expenseCategories' => $query(ExpenseCategory::query())->paginate($perPage),
        ];

        // If type filter is applied, only return that specific data
        if ($request->type && isset($data[$request->type])) {
            $filteredData = [$request->type => $data[$request->type]];
            $data = array_merge($data, $filteredData);
        }

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
