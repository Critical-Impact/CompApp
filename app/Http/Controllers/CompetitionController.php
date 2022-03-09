<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Requests\UpdateRaceViewsRequest;
use App\Models\Club;
use App\Models\Competition;
use App\Models\Race;
use Database\Factories\ClubFactory;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('competition.list', [
            'competitions' => Competition::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $competition = new Competition();
        $clubs = Club::all();
        return view('competition.upsert', ['clubs' => $clubs, 'competition' => $competition]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompetitionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompetitionRequest $request)
    {
        $newCompetition = new Competition();
        $newCompetition->name = $request->get("name");
        $newCompetition->total_races = $request->get("total_races");
        $image = $request->file('logo_url');
        $newPath = $image->store("public");
        $newCompetition->logo_url = $newPath;
        $newCompetition->address = $request->get("address");
        $newCompetition->save();
        return redirect(route("competition.index"))->with('success', 'Competition has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        return view('competition.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        $clubs = Club::all();
        return view('competition.upsert',['competition' => $competition, 'clubs' => $clubs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function teams(Competition $competition)
    {
        return view('competition.teams', ['competition' => $competition]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompetitionRequest  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompetitionRequest $request, Competition $competition)
    {
        $competition->name = $request->get("name");
        $competition->total_races = $request->get("total_races");
        $image = $request->file('logo_url');
        if($image !== null) {
            $newPath = $image->store("public");
            $competition->logo_url = $newPath;
        }
        $competition->address = $request->get("address");
        $competition->save();
        return redirect(route("competition.index"))->with('success', 'Competition has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect(route("competition.index"))->with('success', 'Competition has been deleted');
    }

    /**
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function editRaceViews(Competition $competition)
    {
        $races = Race::whereCompetitionId($competition->id)->get();
        return view('competition.race-views', ['races' => $races, 'competition' => $competition]);
    }

    /**
     * @param  \App\Http\Requests\UpdateRaceViewsRequest  $request
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function updateRaceViews(UpdateRaceViewsRequest $request, Competition $competition)
    {
        $activeRaceId = $request->get("active_race_id");
        $activeHeat = $request->get("active_heat");
        $activeScreen = $request->get("active_screen");
        $activeRaceId = $activeRaceId === "" ? null : $activeRaceId;
        $activeHeat = $activeHeat === "" ? null : $activeHeat;
        $activeScreen = $activeScreen === "" ? null : $activeScreen;
        $competition->active_race_id = $activeRaceId;
        $competition->active_heat = $activeHeat;
        $competition->active_screen = $activeScreen;
        $competition->save();
        return redirect(action([CompetitionController::class, "editRaceViews"], ["competition" => $competition->id]))->with('success', 'Competition race view has been updated.');
    }
}
