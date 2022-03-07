<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHeatResultRequest;
use App\Http\Requests\UpdateHeatResultRequest;
use App\Models\HeatResult;

class HeatResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHeatResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHeatResultRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeatResult  $heatResult
     * @return \Illuminate\Http\Response
     */
    public function show(HeatResult $heatResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeatResult  $heatResult
     * @return \Illuminate\Http\Response
     */
    public function edit(HeatResult $heatResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHeatResultRequest  $request
     * @param  \App\Models\HeatResult  $heatResult
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHeatResultRequest $request, HeatResult $heatResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeatResult  $heatResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeatResult $heatResult)
    {
        //
    }
}
