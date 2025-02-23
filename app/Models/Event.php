<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime'
    ];

    // Define the upcoming scope
    public function scopeUpcoming(Builder $query)
    {
        return $query->where('start_datetime', '>', now())
                    ->where('status', 'upcoming')
                    ->orderBy('start_datetime', 'asc');
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
