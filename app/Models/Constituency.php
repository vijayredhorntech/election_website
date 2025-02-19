<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $fillable = [
        'name',
        'code',
        'office_id',
        'region_id',
        'country_id'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
