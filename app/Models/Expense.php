<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'user_id',
        'expense_category_id',
        'office_id',
        'amount',
        'date',
        'description',
        'bill',
    ];

    /**
     * Get the expense category associated with the expense.
     */
    public function expenseCategory()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }

    /**
     * Get the office associated with the expense.
     */
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
