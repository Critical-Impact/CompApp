<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('club.list', [
            'clubs' => Club::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club = new Club();
        return view('club.upsert', ['club' => $club]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClubRequest $request)
    {
        $newClub = new Club();
        $newClub->name = $request->get('name');
        $newClub->color_one = $request->get('color_one');
        $newClub->color_two = $request->get('color_two');
        $image = $request->file('image');
        $newPath = $image->store("public");
        $newClub->url = $newPath;
        $newClub->save();
        return redirect(route("club.index"))->with('success', 'Club has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        return view('club.upsert');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        return view('club.upsert',['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClubRequest  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClubRequest $request, Club $club)
    {
        $club->name = $request->get('name');
        $club->color_one = $request->get('color_one');
        $club->color_two = $request->get('color_two');
        $image = $request->file('image');
        if($image !== null) {
            $newPath = $image->store("public");
            $club->url = $newPath;
        }
        $club->save();
        return redirect(route("club.index"))->with('success', 'Club has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        $club->delete();
        return redirect(route("club.index"))->with('success', 'Club has been deleted');
    }
}
