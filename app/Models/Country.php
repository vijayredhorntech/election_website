<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'code'];

    public function counties()
    {
        return $this->hasMany(County::class);
    }
}
