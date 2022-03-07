<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDogRequest;
use App\Http\Requests\UpdateDogRequest;
use App\Models\Dog;
use App\Models\Team;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dog.list', [
            'dogs' => Dog::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $dog = new Dog();
        return view('dog.upsert', ['dog' => $dog, 'teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDogRequest $request)
    {
        $newDog = new Dog();
        $newDog->crn = $request->get('crn');
        $newDog->breed = $request->get('breed');
        $newDog->name = $request->get('name');
        $newDog->title = $request->get('title');
        $newDog->team_id = $request->get('team_id');
        $newDog->save();
        return redirect(route("dog.index"))->with('success', 'Dog has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
        return view('dog.upsert');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog)
    {
        $teams = Team::all();
        return view('dog.upsert',['dog' => $dog, 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDogRequest  $request
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDogRequest $request, Dog $dog)
    {
        $dog->name = $request->get('name');
        $dog->crn = $request->get('crn');
        $dog->breed = $request->get('breed');
        $dog->name = $request->get('name');
        $dog->title = $request->get('title');
        $dog->team_id = $request->get('team_id');
        $dog->save();
        return redirect(route("dog.index"))->with('success', 'Dog has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        $dog->delete();
        return redirect(route("dog.index"))->with('success', 'Dog has been deleted');
    }
}
