<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Core_member extends Model
{

    protected $fillable = [
        'user_id',
        'annual_income',
        'any_business',
        'any_criminal_record',
        'participated_in_social_movement',
        'comfortable_with_public_speaking',
        'willing_to_relocate',
        'how_much_time_for_party',
        'political_ideology',
        'political_issue_care',
        'leadership_experience',
        'experience_in_media_interaction',
        'communication_skill',
        'area_of_interest',
        'who_inspired',
        'expectations_from_party',
        'contribution_to_party',
        'have_social_media_presence',
        'have_network_of_volunteers',
        'willing_to_fundraise',
        'photo',
        'id_proof',
        'other_document',

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
