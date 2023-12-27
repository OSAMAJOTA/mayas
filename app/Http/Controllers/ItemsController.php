<?php

namespace App\Http\Controllers;

use App\items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=items::all();
        return view('items.items',compact('items'));
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
            'items_name' => 'required|unique:items|max:255',
            'price' => 'required',
        ],[
            'items_name.required' =>'الرجاء ادخال اسم الصنف',
            'items_name.unique' =>'اسم الصنف مسجل مسبقآ',
            'price.required' =>' الرجاء ادخال سعر الصنف ',

        ]);

        items::create([
            'items_name' => $request->items_name,
            'price' => $request->price,
            'Created_by' => (Auth::user()->name),

        ]);
        session()->flash('Add', 'تم اضافة الصنف بنجاح ');
        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, items $items)
    {
        $id = $request->id;

        $this->validate($request, [

            'items_name' => 'required|unique:items|max:255',
            'price' => 'required',
        ],[

            'items_name.required' =>'الرجاء ادخال اسم الصنف',
            'items_name.unique' =>'اسم الصنف مسجل مسبقآ',
            'price.required' =>' الرجاء ادخال سعر الصنف ',

        ]);

        $items = items::find($id);
        $items->update([
            'items_name' => $request->items_name,
            'price' => $request->price,
        ]);

        session()->flash('edit','تم تعديل الصنف بنجاج');
        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,items $items)
    {
        $id = $request->id;
        items::find($id)->delete();
        session()->flash('delete','تم حذف الصنف بنجاح');
        return redirect('/items');
    }
}
