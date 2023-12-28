<?php

namespace App\Http\Controllers;

use App\nationalities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NationalitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities=nationalities::all();
        return view('nationality.nationality',compact('nationalities'));
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
        $validatedData = $request->validate([
            'nationalities_name' => 'required|unique:nationalities|max:255',

        ],[
            'nationalities_name.required' =>'الرجاء ادخال اسم الجنسية',
            'nationalities_name.unique' =>'اسم الجنسية مسجل مسبقآ',


        ]);

        nationalities::create([
            'nationalities_name' => $request->nationalities_name,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة جنسية بنجاح ');
        return redirect('/nationality');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nationalities  $nationalities
     * @return \Illuminate\Http\Response
     */
    public function show(nationalities $nationalities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nationalities  $nationalities
     * @return \Illuminate\Http\Response
     */
    public function edit(nationalities $nationalities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nationalities  $nationalities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nationalities $nationalities)
    {
        $id = $request->id;

        $this->validate($request, [

            'nationalities_name' => 'required|unique:nationalities|max:255',

        ],[

            'nationalities_name.required' =>'الرجاء ادخال اسم الجنسية',
            'nationalities_name.unique' =>'اسم الجنسية مسجل مسبقآ',

        ]);

        $nationalities = nationalities::find($id);
        $nationalities->update([
            'nationalities_name' => $request->nationalities_name,

        ]);

        session()->flash('edit','تم تعديل الجنسية بنجاج');
        return redirect('/nationality');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nationalities  $nationalities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,nationalities $nationalities)
    {
        $id = $request->id;
        nationalities::find($id)->delete();
        session()->flash('delete','تم حذف الجنسة بنجاح');
        return redirect('/nationality');
    }
}
