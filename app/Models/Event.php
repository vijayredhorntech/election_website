<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'office_id',
        'creator_id',
        'title',
        'description',
        'start_datetime',
        'end_datetime',
        'location',
        'status',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
