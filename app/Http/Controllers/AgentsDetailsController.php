<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\agents;
use App\agents_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\User;
use Illuminate\Support\Facades\DB;
class AgentsDetailsController extends Controller
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
     * @param  \App\agents_details  $agents_details
     * @return \Illuminate\Http\Response
     */
    public function show(agents_details $agents_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agents_details  $agents_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $agents_details = agents_details::where('agents_id', $id)->get();
     $agents = agents::where('id', $id)->first();
      return view('agents.agents_detils', compact('agents','agents_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agents_details  $agents_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agents_details $agents_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agents_details  $agents_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(agents_details $agents_details)
    {
        //
    }

    public function ReadNotification($id)
    {





        $agents_details = agents_details::where('agents_id', $id)->get();
        $agents = agents::where('id', $id)->first();
        return view('agents.agents_detils', compact('agents','agents_details'));
    }


}
