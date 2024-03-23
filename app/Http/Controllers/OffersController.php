<?php

namespace App\Http\Controllers;

use App\careers;
use App\Durations;
use App\nationalities;
use App\offers;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    return view('offers.offers');
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

    public function addoffer()
    {
        $Durations=Durations::all();
        $nationalities=nationalities::all();
        $career=careers::all();
        return view('offers.add_offers',compact('career','nationalities','Durations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function show(offers $offers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit(offers $offers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, offers $offers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function destroy(offers $offers)
    {
        //
    }
}
