<?php

namespace App\Http\Controllers;

use App\emp_groups;
use App\employees;
use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups=emp_groups::all();
       return view('emp_groups.emp_groups',compact('groups'));
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
            'groups_name' => 'required|unique:emp_groups|max:255',

        ],[
            'sections_name.required' =>'الرجاء ادخال اسم المجموعة',
            'sections_name.unique' =>'اسم المجموعة مسجل مسبقآ',


        ]);

        emp_groups::create([
            'groups_name' => $request->groups_name,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة مجموعة بنجاح ');
        return redirect('/emp_groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\emp_groups  $emp_groups
     * @return \Illuminate\Http\Response
     */
    public function show(emp_groups $emp_groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\emp_groups  $emp_groups
     * @return \Illuminate\Http\Response
     */
    public function edit(emp_groups $emp_groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\emp_groups  $emp_groups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, emp_groups $emp_groups)
    {
        $id = $request->id;

        $this->validate($request, [

            'groups_name' => 'required|unique:emp_groups|max:255',

        ],[

            'groups_name.required' =>'الرجاء ادخال اسم المجموعة',
            'groups_name.unique' =>'اسم المجموعة مسجل مسبقآ',

        ]);

        $emp_groups = emp_groups::find($id);
        $emp_groups->update([
            'groups_name' => $request->groups_name,

        ]);

        session()->flash('edit','تم تعديل المجموعة بنجاج');
        return redirect('/emp_groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\emp_groups  $emp_groups
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,emp_groups $emp_groups)
    {
        $id = $request->id;
        emp_groups::find($id)->delete();
        session()->flash('delete','تم حذف المجموعة بنجاح');
        return redirect('/emp_groups');
    }
}
