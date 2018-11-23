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
    <h3 style="text-align: center">Resíduos disponíveis para coleta</h3><br>
    <h4 style="text-align: center">Se quiser algum dos resíduos, faça login ou cadastre-se agora</h4>
    <a style="margin-left: 45%" href="{{action('HomeController@index')}}" class="btn btn-success">Clique Aqui</a><br>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br>
     @endif
     <br>
    <table class="table table-striped" style="text-align: center;">
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
      
      @foreach($recyclings as $recycling)
      
      <tr>
        <td>{{$recycling['nome_residuo']}}</td>
        <td>{{$recycling['descricao_residuo']}}</td>
        <td>{{$recycling['quantidade_residuo']}}</td>
        <td>{{$recycling['endereco_retirada']}}</td>
        <td>{{$recycling['valor']}}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>