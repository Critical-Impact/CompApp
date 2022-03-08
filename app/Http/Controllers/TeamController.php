<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Club;
use App\Models\Team;
use Database\Factories\ClubFactory;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('team.list', [
            'teams' => Team::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = new Team();
        $clubs = Club::all();
        return view('team.upsert', ['clubs' => $clubs, 'team' => $team]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $newTeam = new Team();
        $newTeam->name = $request->get("name");
        $newTeam->description = $request->get("description");
        $newTeam->seed_time = $request->get("seed_time", "");
        $newTeam->best_time = $request->get("best_time", "");
        $newTeam->club_id = $request->get("club_id");
        $newTeam->save();
        return redirect(route("team.index"))->with('success', 'Team has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('team.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $clubs = Club::all();
        return view('team.upsert',['team' => $team, 'clubs' => $clubs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        $team->name = $request->get("name");
        $team->description = $request->get("description");
        $team->seed_time = $request->get("seed_time", "");
        $team->best_time = $request->get("best_time", "");
        $team->club_id = $request->get("club_id");
        $team->save();
        return redirect(route("team.index"))->with('success', 'Team has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect(route("team.index"))->with('success', 'Team has been deleted');
    }
}
