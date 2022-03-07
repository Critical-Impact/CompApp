<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionRaceRequest;
use App\Http\Requests\UpdateCompetitionRaceRequest;
use App\Models\Club;
use App\Models\Competition;
use App\Models\CompetitionRace;
use App\Models\Race;
use Database\Factories\ClubFactory;
use Illuminate\Http\Request;

class CompetitionRaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Competition $competition)
    {

        return view('competition_race.list', [
            'competition' => $competition
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competition $competition)
    {
        $race = new Race();
        $race->competition_id = $competition->id;
        $comp_teams = $competition->competition_teams;
        $teams = [];
        foreach($comp_teams as $comp_team)
        {
            $teams[] = $comp_team->team;
        }
        return view('competition_race.upsert', ['race' => $race, 'competition' => $competition, 'teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompetitionRaceRequest  $request
     */
    public function store(Request $request, Competition $competition)
    {
        $competitionRace = new Race();
        $competitionRace->competition_id = $competition->id;
        $competitionRace->team_one_id = $request->get("team_one_id");
        $competitionRace->team_two_id = $request->get("team_two_id");
        $competitionRace->race_no = $request->get("race_no");
        $competitionRace->division = $request->get("division");
        $competitionRace->total_heats = $request->get("total_heats");
        $competitionRace->save();
        return redirect(route("competition.competition_races.index", ["competition" => $competition->id]))->with('success', 'Competition race has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Race  $competition_race
     */
    public function show(Race $competition_race)
    {
        return view('competition_race.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @param  \App\Models\Race  $competition_race
     */
    public function edit(Competition $competition, Race $competition_race)
    {
        $competition_race->competition_id = $competition->id;
        $comp_teams = $competition->competition_teams;
        $teams = [];
        foreach($comp_teams as $comp_team)
        {
            $teams[] = $comp_team->team;
        }
        return view('competition_race.upsert', ['race' => $competition_race, 'competition' => $competition, 'teams' => $teams]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Race  $competition_race
     */
    public function teams(Race $competition_race)
    {
        return view('competition_race.teams', ['competition_race' => $competition_race]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompetitionRaceRequest  $request
     * @param  \App\Models\Race  $competition_race
     */
    public function update(UpdateCompetitionRaceRequest $request, Competition $competition, Race $competition_race)
    {
        $competition_race->team_one_id = $request->get("team_one_id");
        $competition_race->team_two_id = $request->get("team_two_id");
        $competition_race->race_no = $request->get("race_no");
        $competition_race->division = $request->get("division");
        $competition_race->total_heats = $request->get("total_heats");
        $competition_race->save();
        return redirect(route("competition.competition_races.index", ["competition" => $competition_race->competition_id]))->with('success', 'Competition race has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Race  $competition_race
     */
    public function destroy(Competition $competition, Race $competition_race)
    {
        $competition_race->delete();
        return redirect(route("competition.competition_races.index", ["competition" => $competition->id]))->with('success', 'Competition team has been removed.');
    }
}
