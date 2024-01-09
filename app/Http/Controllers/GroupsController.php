<?php

namespace App\Http\Controllers;
use App\employees;
use App\groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$groups_name)
    {

        $employees=employees::all();
        $groups = groups::where('groups_id', $id)->get();
        $groups_id=$id;
        return view('emp_groups.detils_groups',compact('groups','groups_name','employees','groups_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'emp_name' => 'required|unique:groups|max:255',

        ],[
            'emp_name.required' =>'الرجاء ادخال اسم الموظف',
            'emp_name.unique' =>' اسم الموظف مسجل مسبقآ في الجموعة او موجود في مجموعة اخرى',


        ]);

        groups::create([
            'emp_name' => $request->emp_name,
            'groups_id' => $request->groups_id,


        ]);
        session()->flash('Add', 'تم الموظف للمجموعة بنجاح ');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function show(groups $groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function edit(groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, groups $groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\groups  $groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,groups $groups)
    {
        $id = $request->id;
        groups::find($id)->delete();
        session()->flash('delete','تم حذف الموظف من المجموعة بنجاح');
        return redirect()->back();
    }
}
