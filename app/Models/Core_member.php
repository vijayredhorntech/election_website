<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Core_member extends Model
{
    protected $fillable = [
        'user_id',
        'profession',
        'employer',
        'relevant_experience',
        'skills_expertise',
        'why_join',
        'nationality',
        'primary_mobile_number',
        'experience_in_political_campaigns',
        'experience_in_political_campaigns_details',
        'key_areas',
        'willing_to_travel',
        'member_of_other_political_party',
        'reference_1',
        'reference_2',
        'date_of_application',
        'reviewed_by',
        'position_assigned',
        'date_of_review',
        'signature',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
