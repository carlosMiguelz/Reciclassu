<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecyclerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recyclers=\App\Recycler::all();
        return view('index_recycler',compact('recyclers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_recycler');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recycler= new \App\Recycler;
        $recycler->name_recycler=$request->get('name_recycler');
        $recycler->phone_recycler=$request->get('phone_recycler');
        $recycler->cpf_recycler=$request->get('cpf_recycler');
        $recycler->save();

        return redirect('recyclers')->with('success', 'Cadastrado com sucesso!');
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
        $recycler = \App\Recycler::find($id);
        return view('edit_recycler',compact('recycler','id'));
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
        $recycler= \App\Recycler::find($id);
        $recycler->name_recycler=$request->get('name_recycler');
        $recycler->phone_recycler=$request->get('phone_recycler');
        $recycler->cpf_recycler=$request->get('cpf_recycler');
        $recycler->save();
        return redirect('recyclers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recycler = \App\Recycler::find($id);
        $recycler->delete();
        return redirect('recyclers')->with('success','Information has been  deleted');
    }
}
