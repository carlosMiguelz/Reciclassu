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
    <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Logout</a>
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
      </tr>
    </tbody>
  </table>
  <br><br><br>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      @if ($scheduling['status_agendamento'] == 'Aguardando confirmação do doador')
      <a href="{{action('ReciclassuController@aceitar', $scheduling['id'])}}" class="btn btn-success">Aceitar Coleta</a>
      <a href="{{action('ReciclassuController@cancelar', $scheduling['id'])}}" class="btn btn-danger">Recusar Coleta</a>
      @else
      <a href="{{action('ReciclassuController@finalizar', $scheduling['id'])}}" class="btn btn-success">Encerrar Descarte</a>
      <a href="{{action('ReciclassuController@cancelar', $scheduling['id'])}}" class="btn btn-danger">Cancelar Coleta</a>
      @endif
    </div>
  </div>
  </div>
  </body>
</html>