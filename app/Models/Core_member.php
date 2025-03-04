<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Core_member extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
