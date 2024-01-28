<?php

namespace App\Http\Controllers;

use App\agents;
use App\companys;
use App\cr;
use App\employees;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vist_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $res= Auth::user()->roles_name;
        $adm=$res[0];

        if($adm=='owner'){
            $User=User::all();
            $employees=employees::all();
            $companys=companys::all();
            $agents=agents::where('Status_id', 4)->get()->sortByDesc("id");
            return  view('agents.agents_vist',compact('companys','agents','employees','User'));


        }else{
            $emp_id=Auth::user()->id;
            $emp_nam=Auth::user()->name;
            $User=User::all();
            $employees=employees::all();
            $companys=companys::all();
            $agents=agents::where('Status_id', 4)->where('employees_name', $emp_nam)->get()->sortByDesc("id");
            return  view('agents.agents_vist',compact('companys','agents','employees','User'));



        }





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
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}
