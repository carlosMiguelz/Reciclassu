<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class RecyclingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recyclings=\App\Recycling::all();
        return view('index_recycling',compact('recyclings'));
    }

    public function residues_list()
    {
        $recyclings=\App\Recycling::all();
        return view('residues',compact('recyclings'));   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_recycling');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->get('nome_residuo')))
        {
            return view('create_recycling');
        }
        $recycling= new \App\Recycling;
        $recycling->id_user=Auth::id();
        $recycling->nome_residuo=$request->get('nome_residuo');
        $recycling->descricao_residuo=$request->get('descricao_residuo');
        $recycling->quantidade_residuo=$request->get('quantidade_residuo');
        $recycling->cep_retirada=$request->get('cep');
        $recycling->rua_retirada=$request->get('rua');
        $recycling->numero_retirada=$request->get('numero');
        $recycling->bairro_retirada=$request->get('bairro');
        $recycling->cidade_retirada=$request->get('cidade');
        $recycling->estado_retirada=$request->get('estado');
        $recycling->valor=$request->get('valor');
        $recycling->status="disponivel";
        $recycling->save();
        
        return redirect('/home')->with('success', 'Resíduo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *endereco_retirada
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
        $recycling = \App\Recycling::find($id);
        return view('edit_recycling',compact('recycling','id'));
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
        $recycling= \App\Recycling::find($id);
        $recycling->nome_residuo=$request->get('nome_residuo');
        $recycling->descricao_residuo=$request->get('descricao_residuo');
        $recycling->quantidade_residuo=$request->get('quantidade_residuo');
        $recycling->cep_retirada=$request->get('cep');
        $recycling->rua_retirada=$request->get('rua');
        $recycling->numero_retirada=$request->get('numero');
        $recycling->bairro_retirada=$request->get('bairro');
        $recycling->cidade_retirada=$request->get('cidade');
        $recycling->estado_retirada=$request->get('estado');
        $recycling->valor=$request->get('valor');
        $recycling->save();
        return redirect('recyclings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recycling = \App\Recycling::find($id);
        $recycling->delete();
        return redirect('/home')->with('success','Resíduo excluído com sucesso!');
    }
}
