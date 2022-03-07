<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionTeamRequest;
use App\Http\Requests\UpdateCompetitionTeamRequest;
use App\Models\Club;
use App\Models\Competition;
use App\Models\CompetitionTeam;
use App\Models\Team;
use Database\Factories\ClubFactory;
use Illuminate\Http\Request;

class CompetitionTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competition $competition)
    {
        $teams = Team::all();

        return view('competition_team.list', [
            'competition' => $competition, 'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompetitionTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, Competition $competition)
    {
        $competitionTeam = new CompetitionTeam();
        $competitionTeam->competition_id = $competition->id;
        $competitionTeam->team_id = $request->get("id");
        $competitionTeam->save();
        return redirect(route("competition.competition_teams.index", ["competition" => $competition->id]))->with('success', 'Competition team has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompetitionTeam  $competition_team
     * @return \Illuminate\Http\Response
     */
    public function show(CompetitionTeam $competition_team)
    {
        return view('competition_team.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompetitionTeam  $competition_team
     * @return \Illuminate\Http\Response
     */
    public function edit(CompetitionTeam $competition_team)
    {
        $clubs = Club::all();
        return view('competition_team.upsert',['competition_team' => $competition_team, 'clubs' => $clubs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompetitionTeam  $competition_team
     * @return \Illuminate\Http\Response
     */
    public function teams(CompetitionTeam $competition_team)
    {
        return view('competition_team.teams', ['competition_team' => $competition_team]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompetitionTeamRequest  $request
     * @param  \App\Models\CompetitionTeam  $competition_team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompetitionTeamRequest $request, CompetitionTeam $competition_team)
    {
        $competition_team->name = $request->get("name");
        $competition_team->total_races = $request->get("total_races");
        $image = $request->file('logo_url');
        if($image !== null) {
            $newPath = $image->store("public");
            $competition_team->logo_url = $newPath;
        }
        $competition_team->save();
        return redirect(route("competition_team.index"))->with('success', 'CompetitionTeam has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompetitionTeam  $competition_team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition, CompetitionTeam $competition_team)
    {
        $competition_team->delete();
        return redirect(route("competition.competition_teams.index", ["competition" => $competition->id]))->with('success', 'Competition team has been removed.');
    }
}
