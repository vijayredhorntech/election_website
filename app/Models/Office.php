<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        // Office Information
        'name',
        'description',

        // Address Information
        'postcode',
        'house_name_number',
        'street',
        'town_city',
        'country_id',
        'county_id',
        'region_id',
        'constituency_id',
    ];

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }

    public function constituencies()
    {
        return $this->belongsToMany(Constituency::class, 'offices_constituencies');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
