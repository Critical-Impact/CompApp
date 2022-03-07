<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function club()
    {
        return $this->belongsTo('App\Models\Club');
    }

    public function competition_team()
    {
        return $this->belongsTo('App\Models\CompetitionTeam');
    }

    public function dogs()
    {
        return $this->hasMany('App\Models\Dog');
    }
}
