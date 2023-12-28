<?php

namespace App\Http\Controllers;
use App\sections;
use App\careers;
use App\nationalities;
use App\employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=employees::all();
        $section=sections::all();
        $career=careers::all();
        return view('employees.employees',compact('employees','section','career'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities=nationalities::all();
        $career=careers::all();
        $sections = sections::all();
        return view('employees.add_employees', compact('sections','career','nationalities'));
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
            'employees_igama' => 'required|unique:employees|max:255',

        ],[

            'employees_igama.unique' =>'هوية الموظف مسجل مسبقآ',
            'employees_igama.required' =>'رقم الهوية مطلوب ',

        ]);
        employees::create([

            'section_id' => $request->section_id,
            'employees_name' => $request->employees_name,
            'careers_id' => $request->careers_id,
            'employees_igama' => $request->employees_igama,
            'phone' => $request->phone,
            'email' => $request->email,
            'nationality' => $request->nationalities_name,
            'tasks' => $request->tasks,
            'comment' => $request->note,

        ]);

        session()->flash('Add', 'تم اضافة موظف بنجاح');
        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees $employees)
    {
        //
    }
}
