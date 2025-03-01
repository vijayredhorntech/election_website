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
        // dd($request->type);
        $type = $request->type ?? '';
        $model = $request->type == 'titles' ? Title::class : ($request->type == 'countries' ? Country::class : ($request->type == 'counties' ? County::class : ($request->type == 'constituencies' ? Constituency::class : ($request->type == 'professions' ? Profession::class : ($request->type == 'educations' ? Education::class : '')))));
        $tableType = strtolower(class_basename($model));
        $perPage = $request->get("per_page_{$tableType}") ?? 10;
        $query = function ($model) use ($request) {
            // $model = $request->type == 'titles' ? Title::class : ($request->type == 'countries' ? Country::class : ($request->type == 'counties' ? County::class : ($request->type == 'constituencies' ? Constituency::class : ($request->type == 'professions' ? Profession::class : ($request->type == 'educations' ? Education::class : '')))));
            $tableType = strtolower(class_basename($model));
            $perPage = $request->get("per_page_{$tableType}") ?? 10;

            return $model->when($request->get("search_{$tableType}"), function ($query) use ($request, $tableType) {
                return $query->where('name', 'like', '%' . $request->get("search_{$tableType}") . '%');
            })
                ->when($request->get("sort_{$tableType}"), function ($query) use ($request, $tableType) {
                    $sort = explode('_', $request->get("sort_{$tableType}"));
                    $column = $sort[0] ?? 'name';
                    $direction = $sort[1] ?? 'asc';
                    return $query->orderBy($column, $direction);
                }, function ($query) {
                    return $query->orderBy('name', 'asc');
                });
        };

        $data = [
            'titles' => $query(Title::query())->paginate($request->get('per_page_titles') ?? 10, ['*'], 'page_titles'),
            'countries' => $query(Country::query())->paginate($request->get('per_page_countries') ?? 10, ['*'], 'page_countries'),
            'counties' => $query(County::with('country'))->paginate($request->get('per_page_counties') ?? 10, ['*'], 'page_counties'),
            'constituencies' => $query(Constituency::with(['country', 'county']))->paginate($request->get('per_page_constituencies') ?? 10, ['*'], 'page_constituencies'),
            'professions' => $query(Profession::query())->paginate($perPage, ['*'], 'page_professions'),
            'educations' => $query(Education::query())->paginate($perPage, ['*'], 'page_educations'),
            'expenseCategories' => $query(ExpenseCategory::query())->paginate($perPage, ['*'], 'page_expenses'),
            'type' => $type,
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
