<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'primary_mobile_number',
        'alternate_mobile_number',
        'email',
        'code',
        'address',
        'country',
        'county',
        'city',
        'constituency',
        'referral_code',
    ];
}
