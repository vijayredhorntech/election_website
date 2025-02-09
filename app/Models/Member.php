<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        // 'member_id',
        'referrer_id',
        'status',
        'enrollment_date',
        'title',
        'first_name',
        'last_name',
        'primary_mobile_number',
        'alternate_mobile_number',
        'email',
        'postcode',
        'address',
        'country_id',
        'county_id',
        'city',
        'constituency_id',
        'date_of_birth',
        'gender',
        'marital_status',
        'qualification',
        'profession',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($member) {
            $member->user_id = User::create([
                'name' => $member->first_name . ' ' . $member->last_name,
                'email' => $member->email,
                'password' => Hash::make('password'),
            ])->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referredMembers()
    {
        return $this->hasMany(Member::class, 'referrer_id', 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function constituency()
    {
        return $this->belongsTo(Constituency::class);
    }
}
