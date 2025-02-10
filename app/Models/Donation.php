<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_name',
        'email',
        'constituency_id',
        'amount',
        'donation_date',
        'status',
    ];

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }
}
