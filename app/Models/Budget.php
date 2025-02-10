<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'office_id',
        'amount',
        'financial_year_id',
        'start_date',
        'end_date',
        'type',
        'status'
    ];

    protected $casts = [
        'updated_at' => 'timestamp',
        'created_at' => 'timestamp',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class);
    }
}
