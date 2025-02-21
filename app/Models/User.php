<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'referral_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            if ($user->member) {
                $membershipId = $user->member->custom_id;
                $numericPart = substr($membershipId, -3); // Get last 3 digits
                $user->referral_code = 'ONR' . 'M' . $numericPart;
                $user->save();
            }
        });
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }

    public function referredMembers()
    {
        return $this->hasMany(Member::class, 'referrer_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
