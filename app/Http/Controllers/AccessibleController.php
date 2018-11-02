<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessibles=\App\Accessible::all();
        return view('accessible/index_accessible',compact('accessibles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accessible/create_accessible');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accessible= new \App\Accessible;
        $accessible->id=$request->get('id');
        $accessible->titulo=$request->get('titulo');
        $accessible->descricao=$request->get('descricao');
        $accessible->save();
        
        return redirect('accessibles')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accessible = \App\Accessible::find($id);
        return view('accessible/edit_accessible',compact('accessible','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accessible= \App\Accessible::find($id);
        $accessible->id=$request->get('id');
        $accessible->titulo=$request->get('titulo');
        $accessible->descricao=$request->get('descricao');
        $accessible->save();
        return redirect('accessibles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessible = \App\Accessible::find($id);
        $accessible->delete();
        return redirect('accessibles')->with('success','Information has been  deleted');
    }
}
