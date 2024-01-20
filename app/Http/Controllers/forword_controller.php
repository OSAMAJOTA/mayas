<?php

namespace App\Http\Controllers;

use App\agents;
use App\agents_details;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class forword_controller extends Controller
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
    public function update(Request $request)
    {
        $agents = agents::findOrFail($request->id);
        $usernam=User::findOrFail($request->employees_id);
        $agents->update([
            'employees_id' => $request->employees_id,
            'employees_name'=>$usernam->name,
            'Status' => 'بانتظار التواصل معه',
            'Status_id' =>2,


        ]);

        $agents_details = new agents_details();
        $agents_details->type ='تم توجيه العميل الي الموظف ';
        $agents_details->agents_id =$request->id;
        $agents_details->Created_by = Auth::user()->name;

        $agents_details->save();






        session()->flash('edit', 'تم توجيه العميل بنجاح');
        return redirect('/wait_forword');
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
