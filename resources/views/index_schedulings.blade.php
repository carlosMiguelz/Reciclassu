@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    <h3 style="text-align: center">Minhas coletas agendadas</h3><br/>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped" style="text-align: center">
    <thead>
      <tr>
        <th>ID</th>
        <th>Resíduo</th>
        <th>Local</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Status</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($schedulings as $scheduling)
      
      <tr>
        <td>{{$scheduling['id']}}</td>
        <td>{{$scheduling['descricao_residuo']}}</td>
        <td>{{$scheduling['rua_coleta']}}, {{$scheduling['numero_coleta']}} - {{$scheduling['bairro_coleta']}} - {{$scheduling['cidade_coleta']}} - {{$scheduling['estado_coleta']}}</td>
        <td>{{$scheduling['data_coleta']}}</td>
        <td>{{$scheduling['horario_coleta']}}</td>
        <td>{{$scheduling['status_agendamento']}}</td>
        @if ($scheduling['status_agendamento'] == "Aguardando confirmação do doador")
        <td><a href="{{action('ReciclassuController@edit', $scheduling['id'])}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar agendamento</a></td>
        <td><a href="{{action('ReciclassuController@destroy', $scheduling['id'])}}" class="btn btn-danger"onclick="return confirm('Ao desistir de coletar, o resíduo volta a ficar disponível e pode ser reservado por outra pessoa. Tem certeza que quer desistir?')"><span class="glyphicon glyphicon-trash"></span> Desistir de coletar</a></td>
        @else
        <td>-</td>
        <td>-</td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
 @endsection