<?php

namespace App\Http\Controllers;

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
}
