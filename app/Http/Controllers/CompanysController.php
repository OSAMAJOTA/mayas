<?php

namespace App\Http\Controllers;

use App\companys;
use Illuminate\Http\Request;

class CompanysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companys.companys');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companys.add_companys');
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
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function show(companys $companys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function edit(companys $companys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companys $companys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function destroy(companys $companys)
    {
        //
    }
}
