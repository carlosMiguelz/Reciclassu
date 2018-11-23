<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class ReciclassuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_recycling = $id;
        $s = DB::table('reciclassus')->where('id_recycling', $id_recycling)->where('status_agendamento', 'Aguardando confirmação do doador')->first();
        if ($s == null) {
            $s = DB::table('reciclassus')->where('id_recycling', $id_recycling)->where('status_agendamento', 'Confirmado. Faça a coleta conforme agendado!')->first();
        }
        $id = $s->id;
        $scheduling = \App\Reciclassu::find($id);
        return view('index_scheduling',compact('scheduling','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $recycling = \App\Recycling::find($id);
        return view('create_scheduling',compact('recycling','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id_user');
        $recycling = \App\Recycling::find($request->get('id_recycling'));
        $recycling->status="reservado";
        $recycling->save();
        $reciclassu= new \App\Reciclassu;
        $reciclassu->id_donor=$id;
        $reciclassu->id_recycler=Auth::id();
        $reciclassu->id_recycling=$request->get('id_recycling');
        $reciclassu->local_coleta=$request->get('local_coleta');
        $reciclassu->data_coleta=$request->get('data_coleta');
        $reciclassu->horario_coleta=$request->get('horario_coleta');
        $reciclassu->descricao_residuo=$request->get('descricao_residuo');
        $reciclassu->status_agendamento="Aguardando confirmação do doador";
        $reciclassu->save();

        return redirect('show')->with('success', 'Agendamento realizado com sucesso!');
    }


    public function aceitar($id)
    {
        $scheduling = \App\Reciclassu::find($id);
        $id = $scheduling->id_recycling;
        $scheduling->status_agendamento="Confirmado. Faça a coleta conforme agendado!";
        $scheduling->save();
        $recycling = \App\Recycling::find($id);
        $recycling->status="em_coleta";
        $recycling->save();

        return redirect('/home')->with('success','Coleta aceita com sucesso!');
    }

    public function finalizar($id)
    {
        $scheduling = \App\Reciclassu::find($id);
        $id = $scheduling->id_recycling;
        $scheduling->status_agendamento="Coleta concluída";
        $scheduling->save();
        $recycling = \App\Recycling::find($id);
        $recycling->status="descartado";
        $recycling->save();

        return redirect('/home')->with('success','Descarte finalizado com sucesso!');
    }

    public function cancelar($id)
    {
        $scheduling = \App\Reciclassu::find($id);
        $id_recycling = $scheduling->id_recycling;
        $scheduling->status_agendamento="Canceladoo pelo doador";
        $scheduling->save();
        $id = $id_recycling;
        $recycling = \App\Recycling::find($id);
        $recycling->status = "disponivel";
        $recycling->save();

        return redirect('/home')->with('success','Agendamento cancelado com sucesso!');
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
        $schedulings = \App\Reciclassu::where('id_recycler', $id)->get();
        return view('index_schedulings', compact('schedulings'));
    }


    public function show_recycler($id)
    {
        $recycler=\App\User::find($id);
        return view('show_recycler',compact('recycler'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduling = \App\Reciclassu::find($id);
        return view('edit_scheduling',compact('scheduling','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id_scheduling');
        $reciclassu= \App\Reciclassu::find($id);
        $reciclassu->local_coleta=$request->get('local_coleta');
        $reciclassu->data_coleta=$request->get('data_coleta');
        $reciclassu->horario_coleta=$request->get('horario_coleta');
        $reciclassu->save();
        return redirect('show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scheduling = \App\Reciclassu::find($id);
        $id = $scheduling->id_recycling;
        $scheduling->delete();
        $recycling = \App\Recycling::find($id);
        $recycling->status="disponivel";
        $recycling->save();
        return redirect('/home')->with('success','Agendamento cancelado com sucesso!');
    }
}
