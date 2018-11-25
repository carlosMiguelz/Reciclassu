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
    <h3 style="text-align: center">Resíduos disponíveis para coleta</h3><br/>
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
        <th>Tipo de Resíduo</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Local de Retirada</th>
        <th>Valor</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($recyclings as $recycling)
      
      <tr>
        <td>{{$recycling['id']}}</td>
        <td>{{$recycling['nome_residuo']}}</td>
        <td>{{$recycling['descricao_residuo']}}</td>
        <td>{{$recycling['quantidade_residuo']}}</td>
        <td>{{$recycling['endereco_retirada']}}</td>
        <td>
          <?php 
              if($recycling['valor'] == 0){
                echo "Grátis";
              }else{
                echo $recycling['valor'];
              }
          ?>
        </td>

      @if ($recycling['status'] == "disponivel")
        @if ($recycling['id_user'] == Auth::user()->id)
        <td><a href="{{action('RecyclingController@edit', $recycling['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('RecyclingController@destroy', $recycling['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
        @else
        <td><a href="{{action('ReciclassuController@create', $recycling['id'])}}" class="btn btn-success">Eu Quero</a></td>
        <td>
        </td>
        @endif
      @else
      <td style="font-weight: bold">Reservado</td>
      <td></td>
      @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>