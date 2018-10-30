<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $locals=\App\Local::all();
        return view('index_local',compact('locals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_local');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $local= new \App\Local;
        $local->NameOfLocal=$request->get('NameOfLocal');
        $local->street=$request->get('street');
        $local->burgh=$request->get('burgh');
        $local->city=$request->get('city');
        $local->state=$request->get('state');
        $local->cep=$request->get('cep');
        $local->reference=$request->get('reference');
        $local->filename=$name;
        $local->save();
        
        return redirect('locals')->with('success', 'Information has been added');
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
        $local = \App\Local::find($id);
        return view('edit_local',compact('local','id'));
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
        $local= \App\Local::find($id);
        $local->NameOfLocal=$request->get('NameOfLocal');
        $local->street=$request->get('street');
        $local->burgh=$request->get('burgh');
        $local->city=$request->get('city');
        $local->state=$request->get('state');
        $local->cep=$request->get('cep');
        $local->reference=$request->get('reference');
        // $local->filename=$name;
        $local->save();
        return redirect('locals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $local = \App\Local::find($id);
        $local->delete();
        return redirect('locals')->with('success','Information has been  deleted');
    }
}