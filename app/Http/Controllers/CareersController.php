<?php

namespace App\Http\Controllers;

use App\careers;
use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers=careers::all();
        return view('careers.careers',compact('careers'));
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
            'careers_name' => 'required|unique:careers|max:255',

        ],[
            'careers_name.required' =>'الرجاء ادخال اسم الوظيفة',
            'careers_name.unique' =>'اسم الوظيفة مسجل مسبقآ',


        ]);

        careers::create([
            'careers_name' => $request->careers_name,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة وظيفة بنجاح ');
        return redirect('/careers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function show(careers $careers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function edit(careers $careers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, careers $careers)
    {
        $id = $request->id;

        $this->validate($request, [

            'careers_name' => 'required|unique:careers|max:255',

        ],[

            'careers_name.required' =>'الرجاء ادخال اسم الوظيفة',
            'careers_name.unique' =>'اسم الوظيفة مسجل مسبقآ',

        ]);

        $careers = careers::find($id);
        $careers->update([
            'careers_name' => $request->careers_name,

        ]);

        session()->flash('edit','تم تعديل الوظيفة بنجاج');
        return redirect('/careers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\careers  $careers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,careers $careers)
    {
        $id = $request->id;
        careers::find($id)->delete();
        session()->flash('delete','تم حذف الوظيفة بنجاح');
        return redirect('/careers');
    }
}
