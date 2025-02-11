<?php

namespace App\Models;

use App\Traits\HasCustomId;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasCustomId;

    protected $fillable = [
        'user_id',
        'custom_id',
        'office_id',
        'designation_id',
        'joining_date',
        'status',
    ];

    public function getCustomIdPrefix(): string
    {
        return 'ONE0';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }
}
