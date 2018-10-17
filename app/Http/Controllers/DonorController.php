<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors=\App\Donor::all();
        return view('index_donor',compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_donor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donor= new \App\Donor;
        $donor->name_donor=$request->get('name_donor');
        $donor->phone_donor=$request->get('phone_donor');
        $donor->cpf_donor=$request->get('cpf_donor');
        $donor->save();
        
        return redirect('donors')->with('success', 'Cadastrado com sucesso!');
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
        $donor = \App\Donor::find($id);
        return view('edit_donor',compact('donor','id'));
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
        $donor= \App\Donor::find($id);
        $donor->name_donor=$request->get('name_donor');
        $donor->phone_donor=$request->get('phone_donor');
        $donor->cpf_donor=$request->get('cpf_donor');
        $donor->save();
        return redirect('donors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donor = \App\Donor::find($id);
        $donor->delete();
        return redirect('donors')->with('success','Information has been  deleted');
    }
}
