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

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function constituencies()
    {
        return $this->hasMany(Constituency::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
