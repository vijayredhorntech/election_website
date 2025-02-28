<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group'];

    public function scopeRegistration($query)
    {
        return $query->where('group', 'registration');
    }
}
