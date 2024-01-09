<?php

namespace App\Http\Controllers;

use App\agents;
use App\companys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys=companys::all();
        $agents=agents::all();
  return  view('agents.agents',compact('companys','agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.add_agents');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        agents::create([

            'agents_name' => $request->agents_name,
            'companys_id' => $request->companys_id,
            'agents_phone' => $request->agents_phone,
            'tailor_num' => $request->tailor_num,
            'first_tailor' => $request->first_tailor,
            'end_tailor' => $request->end_tailor,
            'rset' => $request->rset,
            'Status' => 'بانتظارالتوجيه',
            'Status_id' =>1,
            'man_note' => $request->man_note,
            'Created_by' => Auth::user()->name,

        ]);

        session()->flash('Add', 'تم اضافة عميل بنجاح');
        return redirect('/agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show(agents $agents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit(agents $agents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agents $agents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy(agents $agents)
    {
        //
    }
}
