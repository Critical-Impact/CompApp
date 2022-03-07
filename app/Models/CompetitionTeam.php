<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionTeam extends Model
{
    use HasFactory;

    public function competition()
    {
        return $this->belongsTo('App\Models\Competition');
    }

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function points()
    {
        $totalTeamOneWins = HeatResult::whereTeamOneId($this->team_id)->join("teams", "heat_results.team_one_id", "=", "teams.id")
            ->where("heat_results.team_one_status", "WIN")
            ->count();
        $totalTeamTwoWins = HeatResult::whereTeamTwoId($this->team_id)->join("teams", "heat_results.team_two_id", "=", "teams.id")
            ->where("heat_results.team_two_status", "WIN")
            ->count();
        return ($totalTeamOneWins + $totalTeamTwoWins) * 2;
    }

    public function best_time()
    {
        $bestTimeOne = HeatResult::whereTeamOneId($this->team_id)->min("team_one_seconds");
        $bestTimeTwo = HeatResult::whereTeamTwoId($this->team_id)->min("team_two_seconds");
        print_r($bestTimeOne);
        exit;
        if($bestTimeOne === null && $bestTimeTwo === null)
        {
            return "N/A";
        }
        else if($bestTimeOne === null)
        {
            return $bestTimeTwo;
        }
        else if($bestTimeTwo === null)
        {
            return $bestTimeOne;
        }
        return min($bestTimeOne, $bestTimeTwo);
    }
}
