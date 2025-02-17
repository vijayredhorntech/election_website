<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
     * Get the expenses for the expense category.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
