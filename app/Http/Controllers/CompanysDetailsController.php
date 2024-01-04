<?php

namespace App\Http\Controllers;

use App\companys;
use App\companys_attachments;
use App\companys_details;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CompanysDetailsController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\companys_details $companys_details
     * @return \Illuminate\Http\Response
     */
    public function show(companys_details $companys_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\companys_details $companys_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companys = companys::where('id', $id)->first();

        $attachments = companys_attachments::where('company_id', $id)->get();

        return view('companys.detils_companys', compact('companys', 'attachments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\companys_details $companys_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, companys_details $companys_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\companys_details $companys_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoices = companys_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->company_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }
    public function get_file($company_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($company_number.'/'.$file_name);
        return response()->download( $contents);
    }

    public function open_file($company_number, $file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($company_number . '/' . $file_name);
        return response()->file($files);
    }
}
