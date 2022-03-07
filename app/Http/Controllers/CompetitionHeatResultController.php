<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompetitionHeatRequest;
use App\Http\Requests\UpdateHeatResultRequest;
use App\Models\Competition;
use App\Models\HeatResult;
use App\Models\Race;
use Illuminate\Http\Request;

class CompetitionHeatResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function edit(Competition $competition, Race $race, $heat)
    {
        $teamOneHeatResults = [];
        $teamTwoHeatResults = [];

        $teamOne = $race->team_one;
        $teamTwo = $race->team_two;

        $heatResult = HeatResult::whereRaceId($race->id)->whereHeat($heat)->firstOrNew();
        $heatResult->race_id = $race->id;
        $heatResult->heat = $heat;
        $heatResult->team_one_id = $race->team_one_id;
        $heatResult->team_two_id = $race->team_two_id;


        return view('competition_results.edit', [ 'heat_result' => $heatResult,
            'competition' => $competition, 'race' => $race, 'heat' => $heat, 'team_one' => $teamOne, 'team_two' => $teamTwo
        ]);
    }

    public function update(UpdateCompetitionHeatRequest $request, Competition $competition, Race $race, $heat)
    {
        $heatResult = HeatResult::whereRaceId($race->id)->whereHeat($heat)->firstOrNew();
        $heatResult->race_id = $race->id;
        $heatResult->heat = $heat;
        $heatResult->team_one_id = $race->team_one_id;
        $heatResult->team_two_id = $race->team_two_id;

        $heatResult->team_one_seconds = $request->get('team_one_seconds');
        $heatResult->team_two_seconds = $request->get('team_two_seconds');

        $heatResult->team_one_status = $request->get('team_one_status');
        $heatResult->team_two_status = $request->get('team_two_status');

        $heatResult->save();

        return redirect(route("competition.competition_races.index", ["competition" => $competition, "race" => $race]))->with('success', 'Heat has been edited');
    }
}
