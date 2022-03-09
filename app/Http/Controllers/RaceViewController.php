<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Race;
use Illuminate\Http\Request;

class RaceViewController extends Controller
{
    public function dogs(Request $request, Race $race, $heat)
    {
        return view('race_view.teams_intro', ["race" => $race, "heat" => $heat]);
    }

    public function scores(Request $request, Race $race, $heat)
    {
        return view('race_view.scores', ["race" => $race, "heat" => $heat]);
    }

    public function competition(Request $request, Competition $competition)
    {
        return view('race_view.competition', ["competition" => $competition]);
    }

    public function competitionDetails(Request $request, Competition $competition)
    {
        return response()->json([
            'active_race_id' => $competition->active_race_id,
            'active_heat' => $competition->active_heat,
            'active_screen' => $competition->active_screen
        ]);
    }
}
