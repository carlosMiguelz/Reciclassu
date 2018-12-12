@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    <h3 style="text-align: center">Detalhes do agendamento</h3><br/>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <!-- {{$scheduling->name}} -->
    <table class="table table-striped" style="text-align: center;">
      
      <tr>
        <th>Nome do Reciclador</th>
        <td>{{$scheduling->name}}</td>
      </tr>
      <tr>
        <th>Telefone</th>
        <td>{{$scheduling->telefone}}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{$scheduling->email}}</td>
      </tr>
      <tr>
        <th>ID Agendamento</th>
        <td>{{$scheduling->id}}</td>
      </tr>
      <tr>
        <th>Local</th>
        <td>{{$scheduling->local_coleta}}</td>
      </tr>
      <tr>
        <th>Data</th>
        <td>{{$scheduling->data_coleta}}</td>
      </tr>
      <tr>
        <th>Horário</th>
        <td>{{$scheduling->horario_coleta}}</td>
      </tr>
    </table>
    <br><br><br>
    <div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      @if ($scheduling->status_agendamento == 'Aguardando confirmação do doador')
      <a href="{{action('ReciclassuController@aceitar', $scheduling->id)}}" class="btn btn-success" onclick="return confirm('Ao aceitar a coleta, você se compromete a ficar disponível no local, data e hora agendados para descartar o resíduo. Confirma?')">Aceitar Coleta</a>
      <a href="{{action('ReciclassuController@cancelar', $scheduling->id)}}" class="btn btn-danger" onclick="return confirm('Ao recusar a coleta, o resíduo volta a ficar disponível até que alguém tenha interesse. Tem certeza que quer recusar?')">Recusar Coleta</a>
      @else
      <a href="{{action('ReciclassuController@finalizar', $scheduling->id)}}" class="btn btn-success" onclick="return confirm('Ao encerrar a coleta, você confirma que descartou o resíduo e ele será excluído do sistema. Confirma?')">Encerrar Descarte</a>
      <a href="{{action('ReciclassuController@cancelar', $scheduling->id)}}" class="btn btn-danger" onclick="return confirm('Ao cancelar a coleta, você afirma que não descartou o resíduo e ele volta a ficar disponível até que alguém tenha interesse. Confirma?')">Cancelar Coleta</a>
      @endif
    </div>
  </div>
  </div>
@endsection