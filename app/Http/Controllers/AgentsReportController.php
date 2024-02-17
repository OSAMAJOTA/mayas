<?php

namespace App\Http\Controllers;
use App\employees;
use App\agents;
use App\cr;
use Illuminate\Http\Request;

class AgentsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=employees::all();
        return  view('agents.agents_report',compact('employees'));
    }

    public function Search_report(Request $request){

        $rdio = $request->rdio;


        // في حالة البحث حالة العميل

        if ($rdio == 1) {

            if ($request->status_id && $request->start_at =='' && $request->end_at =='') {

                if($request->status_id=='الكل'){
                    $employees=employees::all();
                    $agents = agents::all();
                    $status_id = $request->status_id;
                    return view('agents.agents_report',compact('status_id','employees'))->withDetails($agents);
                }else
                    $employees=employees::all();
                $agents = agents::select('*')->where('Status','=',$request->status_id)->get();
                $status_id = $request->status_id;
                return view('agents.agents_report',compact('status_id','employees'))->withDetails($agents);
            }

            // في حالة تحديد تاريخ استحقاق
            elseif ($request->status_id && $request->start_at && $request->end_at ==''){
if($request->status_id=='الكل'){
    $employees=employees::all();
    $start_at = date($request->start_at);

    $status_id = $request->status_id;

    $agents = agents::select('*')->where('agents_date','=',$request->start_at)->get();
    return view('agents.agents_report',compact('status_id','start_at','employees'))->withDetails($agents);


}else
                $employees=employees::all();
                $start_at = date($request->start_at);

                $status_id = $request->status_id;

                $agents = agents::select('*')->where('agents_date','=',$request->start_at)->where('Status','=',$request->status_id)->get();
                return view('agents.agents_report',compact('status_id','start_at','employees'))->withDetails($agents);

            }
            elseif($request->status_id && $request->start_at && $request->end_at){
                if($request->status_id=='الكل'){
                    $start_at = date($request->start_at);
                    $end_at = date($request->end_at);
                    $status_id = $request->status_id;
                    $employees=employees::all();
                    $agents = agents::select('*')->whereBetween('created_at',[$start_at,$end_at])->get();
                    return view('agents.agents_report',compact('status_id','start_at','end_at','employees'))->withDetails($agents);

                }else



                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $status_id = $request->status_id;
                $employees=employees::all();
                $agents = agents::whereBetween('created_at',[$start_at,$end_at])->where('Status','=',$request->status_id)->get();
                return view('agents.agents_report',compact('status_id','start_at','end_at','employees'))->withDetails($agents);
            }


        }

        elseif($rdio == 3){

            $status_id=$request->employees_name;
            $employees=employees::all();
            $agents = agents::select('*')->where('agents_phone','=',$request->employees_phone)->get();
            return view('agents.agents_report',compact('employees','status_id'))->withDetails($agents);

        }

//====================================================================

// في البحث برقم العميل



        else {
$status_id=$request->employees_name;
            $employees=employees::all();
             $agents = agents::select('*')->where('employees_name','=',$request->employees_name)->get();
                return view('agents.agents_report',compact('employees','status_id'))->withDetails($agents);

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
