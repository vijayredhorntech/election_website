<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
        'user_id',
        'membership_type',
        'start_date',
        'end_date',
        'status',
        'payment_status',
        'payment_amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
