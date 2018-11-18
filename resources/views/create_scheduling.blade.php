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
      <h3 style="text-align: center">Cadastrar agendamento da coleta</h3>
      <a style="margin-left: 89%; margin-top: -7.8%" href="{{action('HomeController@index')}}" class="btn btn-success">Minha Página</a>
      <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Logout</a>
      @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif
      <table class="table table-striped" style="text-align: center;">
        <h4 style="text-align: center">Resíduo selecionado</h4>
        <thead>
          <tr>
            <th>Resíduo</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Local de Retirada</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$recycling['nome_residuo']}}</td>
            <td>{{$recycling['descricao_residuo']}}</td>
            <td>{{$recycling['quantidade_residuo']}}</td>
            <td>{{$recycling['endereco_retirada']}}</td>
            <td>{{$recycling['valor']}}</td>
          </tr>
        </tbody>
      </table>
      <br>
      <h4 style="text-align: center">Cadastre os dados do agendamento</h4><br>
      <form method="post" action="{{url('reciclassu')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="local_coleta">Local:</label>
              <input type="text" class="form-control" name="local_coleta" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="data_coleta">Data:</label>
              <input type="text" class="form-control" name="data_coleta" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="horario_coleta">Horário:</label>
              <input type="text" class="form-control" name="horario_coleta" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="id_user">ID Usuário:</label>
              <input type="text" class="form-control" name="id_user" value="{{$recycling['id_user']}}" readonly="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="id_recycling">ID Resíduo:</label>
              <input type="text" class="form-control" name="id_recycling" value="{{$recycling['id']}}" readonly="">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="descricao_residuo">Descrição do Resíduo:</label>
              <input type="text" class="form-control" name="descricao_residuo" value="{{$recycling['descricao_residuo']}}" readonly="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Agendar</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>