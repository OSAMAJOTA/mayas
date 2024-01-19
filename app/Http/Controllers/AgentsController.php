<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\agents;
use App\companys;
use App\employees;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AgentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $res= Auth::user()->roles_name;
        $adm=$res[0];

        if($adm=='owner'){
            $User=User::all();
            $companys=companys::all();
            $agents=agents::all();
            return  view('agents.agents',compact('companys','agents','User'));


        }else {
            $emp_id = Auth::user()->id;


            $companys = companys::all();
            $agents = agents::where('employees_id', $emp_id)->get();
            return view('agents.agents', compact('companys', 'agents'));

        }

        }
    public function forword()
    {
        $User=User::all();
        $employees=employees::all();
        $companys=companys::all();
        $agents=agents::where('Status_id', 1)->get();
        return  view('agents.agents_forword',compact('companys','agents','employees','User'));
    }


    public function contact()
    {


    $res= Auth::user()->roles_name;
    $adm=$res[0];

if($adm=='owner'){

    $companys=companys::all();
    $agents=agents::where('Status_id', 2)->get();
    return  view('agents.agents_contact',compact('companys','agents'));


}else{
$emp_id=Auth::user()->id;


    $companys=companys::all();
    $agents=agents::where('Status_id', 2)->where('employees_id', $emp_id)->get();
    return  view('agents.agents_contact',compact('companys','agents'));



}


    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agents.add_agents');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        agents::create([

            'agents_name' => $request->agents_name,
            'companys_id' => $request->companys_id,
            'agents_phone' => $request->agents_phone,
            'tailor_num' => $request->tailor_num,
            'first_tailor' => $request->first_tailor,
            'end_tailor' => $request->end_tailor,
            'rset' => $request->rset,
            'Status' => 'بانتظارالتوجيه',
            'Status_id' =>1,
            'man_note' => $request->man_note,
            'Created_by' => Auth::user()->name,

        ]);
        $user = User::get();
        $agents_id = agents::latest()->first();
        Notification::send($user, new \App\Notifications\add_new_agents($agents_id));



        session()->flash('Add', 'تم اضافة عميل بنجاح');
        return redirect('/agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show(agents $agents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $companys=companys::all();
        $agents = agents::where('id', $id)->first();
        return view('agents.edit_agents', compact('agents','companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agents $agents)
    {
        $agents = agents::findOrFail($request->agents_id);
        $agents->update([
            'agents_name' => $request->agents_name,
            'companys_id' => $request->companys_id,
            'agents_phone' => $request->agents_phone,
            'tailor_num' => $request->tailor_num,
            'first_tailor' => $request->first_tailor,
            'end_tailor' => $request->end_tailor,
            'rset' => $request->rset,
            'man_note' => $request->man_note,

        ]);

        session()->flash('edit', 'تم تعديل بيانات العميل بنجاح');
        return redirect('/agents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,agents $agents)
    {
        $id = $request->id;
        agents::find($id)->delete();
        session()->flash('delete','تم حذف العميل بنجاح');
        return redirect('/agents');
    }
    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */

    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }

}
