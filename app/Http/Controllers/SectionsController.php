<?php

namespace App\Http\Controllers;

use App\items;
use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=sections::all();
    return view('sections.sections',compact('sections'));
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
            'sections_name' => 'required|unique:sections|max:255',

        ],[
            'sections_name.required' =>'الرجاء ادخال اسم القسم',
            'sections_name.unique' =>'اسم القسم مسجل مسبقآ',


        ]);

        sections::create([
            'sections_name' => $request->sections_name,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة القسم بنجاح ');
        return redirect('/sections');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function show(sections $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(sections $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sections $sections)
    {
        $id = $request->id;

        $this->validate($request, [

            'sections_name' => 'required|unique:sections|max:255',

        ],[

            'sections_name.required' =>'الرجاء ادخال اسم القسم',
            'sections_name.unique' =>'اسم القسم مسجل مسبقآ',

        ]);

        $sections = sections::find($id);
        $sections->update([
            'sections_name' => $request->sections_name,

        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sections  $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,sections $sections)
    {
        $id = $request->id;
        sections::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/sections');
    }
}
