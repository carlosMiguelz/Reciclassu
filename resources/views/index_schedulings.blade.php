<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agendamentos</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    <h3 style="text-align: center">Minhas coletas agendadas</h3><br/>
    <a style="margin-left: 89%; margin-top: -7.8%" href="{{action('HomeController@index')}}" class="btn btn-success">Minha Página</a>
    <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Sair</a>
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
        <td>{{$scheduling['local_coleta']}}</td>
        <td>{{$scheduling['data_coleta']}}</td>
        <td>{{$scheduling['horario_coleta']}}</td>
        <td>{{$scheduling['status_agendamento']}}</td>
        @if ($scheduling['status_agendamento'] == "Aguardando confirmação do doador")
        <td><a href="{{action('ReciclassuController@edit', $scheduling['id'])}}" class="btn btn-warning">Editar agendamento</a></td>
        <td><a href="{{action('ReciclassuController@destroy', $scheduling['id'])}}" class="btn btn-danger"onclick="return confirm('Ao desistir de coletar, o resíduo volta a ficar disponível e pode ser reservado por outra pessoa. Tem certeza que quer desistir?')">Desistir de coletar</a></td>
        @else
        <td>-</td>
        <td>-</td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>