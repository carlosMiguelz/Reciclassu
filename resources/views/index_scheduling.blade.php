<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Resíduos</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    <h3 style="text-align: center">Detalhes do agendamento</h3><br/>
    <a style="margin-left: 89%; margin-top: -7.8%" href="{{action('HomeController@index')}}" class="btn btn-success">Minha Página</a>
    <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Sair</a>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped" style="text-align: center;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Local</th>
        <th>Data</th>
        <th>Horário</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$scheduling['id']}}</td>
        <td>{{$scheduling['local_coleta']}}</td>
        <td>{{$scheduling['data_coleta']}}</td>
        <td>{{$scheduling['horario_coleta']}}</td>
        <td><a href="{{action('ReciclassuController@show_recycler', $scheduling['id_recycler'])}}" class="btn btn-primary">Detahes Reciclador</a></td>
      </tr>
    </tbody>
  </table>
  <br><br><br>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      @if ($scheduling['status_agendamento'] == 'Aguardando confirmação do doador')
      <a href="{{action('ReciclassuController@aceitar', $scheduling['id'])}}" class="btn btn-success" onclick="return confirm('Ao aceitar a coleta, você se compromete a ficar disponível no local, data e hora agendados para descartar o resíduo. Confirma?')">Aceitar Coleta</a>
      <a href="{{action('ReciclassuController@cancelar', $scheduling['id'])}}" class="btn btn-danger" onclick="return confirm('Ao recusar a coleta, o resíduo volta a ficar disponível até que alguém tenha interesse. Tem certeza que quer recusar?')">Recusar Coleta</a>
      @else
      <a href="{{action('ReciclassuController@finalizar', $scheduling['id'])}}" class="btn btn-success" onclick="return confirm('Ao encerrar a coleta, você confirma que descartou o resíduo e ele será excluído do sistema. Confirma?')">Encerrar Descarte</a>
      <a href="{{action('ReciclassuController@cancelar', $scheduling['id'])}}" class="btn btn-danger" onclick="return confirm('Ao cancelar a coleta, você afirma que não descartou o resíduo e ele volta a ficar disponível até que alguém tenha interesse. Confirma?')">Cancelar Coleta</a>
      @endif
    </div>
  </div>
  </div>
  </body>
</html>
