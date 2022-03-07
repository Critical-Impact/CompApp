<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Race extends Model
{
    use HasFactory;

    public function team_one()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function team_two()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function team_one_points()
    {
        $totalTeamOneWins = HeatResult::whereTeamOneId($this->team_one_id)->join("teams", "heat_results.team_one_id", "=", "teams.id")
            ->where("heat_results.team_one_status", "WIN")
            ->count();
        $totalTeamTwoWins = HeatResult::whereTeamTwoId($this->team_one_id)->join("teams", "heat_results.team_two_id", "=", "teams.id")
            ->where("heat_results.team_two_status", "WIN")
            ->count();
        return ($totalTeamOneWins + $totalTeamTwoWins) * 2;
    }

    public function team_two_points()
    {
        $totalTeamOneWins = HeatResult::whereTeamOneId($this->team_two_id)->join("teams", "heat_results.team_one_id", "=", "teams.id")
            ->where("heat_results.team_one_status", "WIN")
            ->count();
        $totalTeamTwoWins = HeatResult::whereTeamTwoId($this->team_two_id)->join("teams", "heat_results.team_two_id", "=", "teams.id")
            ->where("heat_results.team_two_status", "WIN")
            ->count();
        return ($totalTeamOneWins + $totalTeamTwoWins) * 2;
    }

    public function best_time_team_one()
    {
        $bestTimeOne = HeatResult::whereTeamOneId($this->team_one_id)->min("team_one_seconds");
        $bestTimeTwo = HeatResult::whereTeamTwoId($this->team_one_id)->min("team_two_seconds");
        $bestTime = null;
        if($bestTimeOne === null && $bestTimeTwo === null)
        {
            return "N/A";
        }
        else if($bestTimeOne === null)
        {
            $bestTime = $bestTimeTwo;
        }
        else if($bestTimeTwo === null)
        {
            $bestTime = $bestTimeOne;
        }
        else {
            $bestTime = min($bestTimeOne, $bestTimeTwo);
        }
        $interval = CarbonInterval::seconds($bestTime)->cascade();
        return ((string)$interval->minutes).".".((string)$interval->totalSeconds);
    }

    public function best_time_team_two()
    {
        $bestTimeOne = HeatResult::whereTeamOneId($this->team_two_id)->min("team_one_seconds");
        $bestTimeTwo = HeatResult::whereTeamTwoId($this->team_two_id)->min("team_two_seconds");
        $bestTime = null;
        if($bestTimeOne === null && $bestTimeTwo === null)
        {
            return "N/A";
        }
        else if($bestTimeOne === null)
        {
            $bestTime = $bestTimeTwo;
        }
        else if($bestTimeTwo === null)
        {
            $bestTime = $bestTimeOne;
        }
        else {
            $bestTime = min($bestTimeOne, $bestTimeTwo);
        }
        $interval = CarbonInterval::seconds($bestTime)->cascade();
        return ((string)$interval->minutes).".".((string)$interval->totalSeconds);
    }

    public function competition()
    {
        return $this->belongsTo('App\Models\Competition');
    }
}
