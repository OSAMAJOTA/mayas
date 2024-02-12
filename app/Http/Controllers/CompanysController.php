<?php

namespace App\Http\Controllers;

use App\companys;
use App\companys_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $companys = companys::all();
        return view('companys.companys',compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companys.add_companys');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        companys::create([
            'companys_name' => $request->companys_name,
            'registration_num' => $request->registration_num,
            'vat_num' => $request->vat_num,
            'city' => $request->city,
            'build_num' => $request->build_num,
            'postal_code' => $request->postal_code,
            'extra_num' => $request->extra_num,
            'road_nam' => $request->road_nam,
            'neigh_nam' => $request->neigh_nam,
            'branch_num' => $request->branch_num,
            'com_phone' => $request->com_phone,
            'Status' => 'نشط',
            'com_email' => $request->com_email,
            'authorized_nam' => $request->authorized_nam,
            'authorized_phone' => $request->authorized_phone,

            'authorized_email' => $request->authorized_email,
            'note' => $request->note,

        ]);
        if ($request->hasFile('pic')) {

            $companys_id = companys::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $company_number = companys::latest()->first()->id;

            $attachments = new companys_attachments();
            $attachments->file_name = $file_name;
            $attachments->companys_number = companys::latest()->first()->id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->company_id = $companys_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $company_number), $imageName);
        }
        session()->flash('Add', 'تم  اضافة البيانات بنجاح  ');
        return redirect('/companys');

    }

    /**
     *
     *
     * Display the specified resource.
     *
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function show(companys $companys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $companys = companys::where('id', $id)->first();
        return view('companys.edit_companys', compact('companys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companys $companys)
    {
        $companys = companys::findOrFail($request->companys_id);
        $companys->update([
            'companys_name' => $request->companys_name,
            'registration_num' => $request->registration_num,
            'vat_num' => $request->vat_num,
            'city' => $request->city,
            'build_num' => $request->build_num,
            'postal_code' => $request->postal_code,
            'extra_num' => $request->extra_num,
            'road_nam' => $request->road_nam,
            'neigh_nam' => $request->neigh_nam,
            'branch_num' => $request->branch_num,
            'com_phone' => $request->com_phone,
            'com_email' => $request->com_email,
            'authorized_nam' => $request->authorized_nam,
            'authorized_phone' => $request->authorized_phone,
            'authorized_email' => $request->authorized_email,
            'note' => $request->note,
            'Status' => $request->Status,
        ]);

        session()->flash('edit', 'تم تعديل بيانات الفرع بنجاح');
        return redirect('/companys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\companys  $companys
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request,companys $companys)
    {
        $id = $request->id;
        companys::find($id)->delete();
        session()->flash('delete','تم حذف الفرع بنجاح');
        return redirect('/companys');
    }
}
