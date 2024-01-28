<?php

namespace App\Http\Controllers;

use App\agents;
use App\agents_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class unblock extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agents = agents::findOrFail($request->id);
        $agents->update([

            'Status' => 'بانتظار التوجية **',
            'Status_id' =>1,


        ]);

        $agents_details = new agents_details();
        $agents_details->type ='تم إلغاء حظر العميل ';
        $agents_details->agents_id =$request->id;

        $agents_details->Created_by = Auth::user()->name;

        $agents_details->save();






        session()->flash('Add', '  تم إلغاء حظر العميل بنجاح وتحويلة لقسم التوجيه');
        return redirect('/agents_block');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
