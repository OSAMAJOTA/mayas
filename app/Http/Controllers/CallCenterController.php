<?php

namespace App\Http\Controllers;

use App\agents;
use App\agents_details;
use App\call_center;
use App\companys;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CallCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       // return $request;
     if($request->yes_btn=="1")
     {

         $call_center =  new call_center();

        $call_center->call_id = $request->agents_id;

        if($request->dont_call_check=="0"){
            $call_center->dont_call_check ="1";
        }else
        {
            $call_center->dont_call_check ="0";
        }




        if($request->emp_check=="0") {
            $call_center->emp_check ="1";
        }else
        {
            $call_center->emp_check ="0";
        }




        if($request->tailor_check=="0") {
            $call_center->tailor_check ="1";
        }else
        {
            $call_center->tailor_check ="0";
        }






        if($request->time_check=="0") {
            $call_center->time_check ="1";
        }else
        {
            $call_center->time_check ="0";
        }





        if($request->loc_check=="0") {
            $call_center->loc_check ="1";
        }else
        {
            $call_center->loc_check ="0";
        }




        if($request->price_check=="0") {
            $call_center->price_check ="1";
        }else
        {
            $call_center->price_check ="0";
        }






        if($request->other_check=="0") {
            $call_center->other_check ="1";
        }else
        {
            $call_center->other_check ="0";
        }

        if($request->vist_check=="0") {
            $call_center->vist_check ="1";
            $call_center->vist_time = $request->vist_time;
        }else
        {
            $call_center->vist_check ="0";
        }


        $call_center->call_comment = $request->call_comment;

        $call_center->Created_by = Auth::user()->name;
        $call_center->save();

         $agents = agents::findOrFail($request->agents_id);
         $agents->update([


             'Status' => 'تم التواصل معه',
             'Status_id' =>3,
             'employees_name' =>Auth::user()->name,


         ]);

         $agents_details = new agents_details();
         $agents_details->type ='تم التواصل معه';
         $agents_details->agents_id =$request->agents_id;
         $agents_details->emp_name =Auth::user()->name;
         $agents_details->Created_by = Auth::user()->name;

         $agents_details->save();


          session()->flash('Add', 'تم ارسال نتيجة الاتصال بنجاح');
          return redirect('/contact_agent');
    }
      else{


          $agents = agents::findOrFail($request->agents_id);
          $agents->update([


              'Status' => 'طلب  معاودة الاتصال في وقت لاحق',
              'Status_id' =>1,
              'employees_name' => '',
              'call_later' => $request->call_later,

          ]);

          $agents_details = new agents_details();
          $agents_details->type ='طلب  معاودة الاتصال في وقت لاحق';
          $agents_details->call_later =$request->call_later;
          $agents_details->agents_id =$request->agents_id;
          $agents_details->emp_name =Auth::user()->name;
          $agents_details->Created_by = Auth::user()->name;

          $agents_details->save();






          session()->flash('Add', 'تم تحويل الموظف الي اعادة التوجيه ');
          return redirect('/contact_agent');








     }
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function show(call_center $call_center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companys=companys::all();
        $agents = agents::where('id', $id)->first();
      return view('agents.call_center',compact('agents','companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, call_center $call_center)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\call_center  $call_center
     * @return \Illuminate\Http\Response
     */
    public function destroy(call_center $call_center)
    {
        //
    }
}
