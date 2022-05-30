<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    public function championship()
    {
        return $this->belongsTo('App\Models\Championship');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
