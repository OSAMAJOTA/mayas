<?php

namespace App\Http\Controllers;

use App\agents;
use App\call_center;
use App\companys;
use Illuminate\Http\Request;

class CallCenterController extends Controller
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
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function show(call_center $call_center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companys=companys::all();
        $agents = agents::where('id', $id)->first();
      return view('agents.call_center',compact('agents','companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, call_center $call_center)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function destroy(call_center $call_center)
    {
        //
    }
}
