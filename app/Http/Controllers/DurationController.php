<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Durations;
use App\nationalities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Durations=Durations::all();
        return view('Duration.Duration',compact('Durations'));
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
            'Duration_name' => 'required|unique:Durations|max:255',

        ],[
            'Duration_name.required' =>'الرجاء ادخال اسم المدة',
            'Duration_name.unique' =>'اسم المدة مسجل مسبقآ',


        ]);

        Durations::create([
            'Duration_name' => $request->Duration_name,
            'counts' => $request->counts,
            'Duration_tybe' => $request->Duration_tybe,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة مدة تشغيل بنجاح ');
        return redirect('/Durations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Durations  $duration
     * @return \Illuminate\Http\Response
     */
    public function show(Duration $duration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Durations  $duration
     * @return \Illuminate\Http\Response
     */
    public function edit(Duration $duration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Durations  $duration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Duration $duration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Durations  $duration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duration $duration)
    {
        //
    }


    public function getcost($id)
    {
        $products = DB::table("durations")->where("id", $id)->pluck("counts", "id");
        return json_encode($products);
    }
}
