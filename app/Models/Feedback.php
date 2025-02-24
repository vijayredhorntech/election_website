<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'constituency_id',
        'member_id',
        'feedback_type',
        'status',
        'priority'
    ];

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}