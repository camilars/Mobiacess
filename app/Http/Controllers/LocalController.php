<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $locals = \App\Local::where('id_user',$id)->get();
        //return view ('home' , compact('userslocal'));
        return view('local/index_local',compact('locals'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('local/create_local');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('foto'))
         {
            $file = $request->file('foto');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
         $acessibilidade = '';

        $local= new \App\Local;
        $local->id_user=Auth::user()->id;
        $local->NameOfLocal=$request->get('NameOfLocal');
        $local->street=$request->get('street');
        $local->burgh=$request->get('burgh');
        $local->city=$request->get('city');
        $local->state=$request->get('state');
        $local->cep=$request->get('cep');

        $local->latitude=$request->get('latitude');
        $local->longitude=$request->get('longitude');
        if (!empty($request->get('rampa'))) {
            $acessibilidade .= $request->get('rampa').', ';
        }
        if (!empty($request->get('corrimao'))) {
            $acessibilidade .= $request->get('corrimao').', ';
        }
        if (!empty($request->get('elevador'))) {
            $acessibilidade .= $request->get('elevador').', ';
        }
        if (!empty($request->get('nenhuma'))) {
            $acessibilidade = $request->get('nenhuma');
        }
        $local->acessibilidade = $acessibilidade;
        $local->reference=$request->get('reference');
        $local->foto=$name;
        $local->save();
        
        return redirect('mapa')->with('success', 'Local Cadastrado Com Sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::id();
        $userslocal = \App\Users::where('id',$id)->get();
        return view ('locals' , compact('userslocal'));
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
        return view('local/edit_local',compact('local','id'));
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
        if($request->hasfile('foto'))
         {
            $file = $request->file('foto');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $local= \App\Local::find($id);
        $local->NameOfLocal=$request->get('NameOfLocal');
        $local->street=$request->get('street');
        $local->burgh=$request->get('burgh');
        $local->city=$request->get('city');
        $local->state=$request->get('state');
        $local->cep=$request->get('cep');
        $local->reference=$request->get('reference');
        if (isset ($name)) {
            
            $local->foto=$name;

        }
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
        return redirect('locals')->with('success','Local Excluido Com Sucesso');
    }


    public function loadmap()
    {

        $locals=\App\Local::all();
        return view('mapa',compact('locals'));
    }


}
