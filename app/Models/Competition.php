<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    public function competition_teams()
    {
        return $this->hasMany('App\Models\CompetitionTeam');
    }

    public function races()
    {
        return $this->hasMany('App\Models\Race');
    }

    public function active_race()
    {
        return $this->belongsTo('App\Models\Race');
    }
}
