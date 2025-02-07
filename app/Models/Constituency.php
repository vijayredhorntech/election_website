<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = ['name', 'code'];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
