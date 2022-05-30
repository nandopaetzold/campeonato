<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    public function teamsinchampionship()
    {
        return $this->hasMany('App\Models\TeamsInChampionship');
    }

    public function games(){
        return $this->hasMany('App\Models\Games');
    }
}
