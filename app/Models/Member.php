<?php

namespace App\Models;

use App\Traits\HasCustomId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class Member extends Model
{
    use HasCustomId;

    protected $fillable = [
        'user_id',
        'custom_id',
        // 'member_id',
        'referrer_id',
        'status',
        'enrollment_date',
        'title',
        'first_name',
        'last_name',
        'primary_mobile_number',
        'primary_country_code',
        'alternate_mobile_number',
        'alternate_country_code',
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
        'national_insurance_number',
        'profile_photo',
        'profile_status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($member) {
            // Update user's referral code after member is created
            $updatedCustomId = str_replace('ONM', 'ONRM', $member->custom_id);
            $member->user->referral_code = $updatedCustomId;
            $member->user->save();
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

    public function getCustomIdPrefix(): string
    {
        return 'ONM';
    }
}
