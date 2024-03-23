<?php

namespace App\Http\Controllers;

use App\wakel;
use Illuminate\Http\Request;

class WakelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return view('wakel.wakel');
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
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function show(wakel $wakel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function edit(wakel $wakel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wakel $wakel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\wakel  $wakel
     * @return \Illuminate\Http\Response
     */
    public function destroy(wakel $wakel)
    {
        //
    }
}
