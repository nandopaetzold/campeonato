<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamsInChampionship extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function championship()
    {
        return $this->belongsTo('App\Models\Championship');
    }
}

