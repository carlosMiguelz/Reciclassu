<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Minha Página</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    <h2 style="text-align: center">Bem vindo ao Reciclassu</h2>
    <a style="margin-left: 68.6%; margin-top: -3.6%" href="{{action('RecyclingController@index')}}" class="btn btn-success">Ver resíduos disponíveis</a>
    <a style="margin-left: 86%; margin-top: -7.8%" href="{{action('RecyclingController@create')}}" class="btn btn-success">Descartar Resíduo</a>
    <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Logout</a>
    <br>
    <h4>Dados Pessoais</h4>
        <?php $id = Auth::user()->id ?>
    <a style="margin-left: 60%; margin-top: -5%" href="{{action('HomeController@edit', $id)}}" class="btn btn-warning">Editar</a>
    <a href=""></a>
    <a style="margin-left: 82%; margin-top: -9.2%" href="{{action('ReciclassuController@show')}}" class="btn btn-primary">Status coletas agendadas</a>
    <a href=""></a>
    <br>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <td style="font-weight: bold">Nome</td>
        <td>{{ Auth::user()->name }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">Telefone</td>
        <td>{{ Auth::user()->telefone }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">Endereço</td>
        <td>{{ Auth::user()->endereco }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">CPF</td>
        <td>{{ Auth::user()->cpf }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">Email</td>
        <td>{{ Auth::user()->email }}</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </thead>
  </table>
  <h4>Meus resíduos</h4>
  <br>
  <table class="table table-striped" style="text-align: center;">
    <thead>
      <tr>
        <th>Resíduo</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Local de Retirada</th>
        <th>Valor</th>
        <th colspan="2">Opções</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($recyclings as $recycling)
      @if ($recycling['id_user'] == Auth::user()->id)

      <tr>
        <td>{{$recycling['nome_residuo']}}</td>
        <td>{{$recycling['descricao_residuo']}}</td>
        <td>{{$recycling['quantidade_residuo']}}</td>
        <td>{{$recycling['endereco_retirada']}}</td>
        <td>{{$recycling['valor']}}</td>
        @if ($recycling['status'] == "disponivel")
        <td>
        <a href="{{action('RecyclingController@edit', $recycling['id'])}}" class="btn btn-warning">Editar</a></td>
        <td>
          <form action="{{action('RecyclingController@destroy', $recycling['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Deletar</button>
          </form>
        </td>
        @endif
        @if ($recycling['status'] == "em_coleta")
        <td><td><a href="{{action('ReciclassuController@index', $recycling['id'])}}" class="btn btn-primary">Em coleta (Concluir/Cancelar)</a></td></td>
        @endif
        @if ($recycling['status'] == "reservado")
        <td><td><a href="{{action('ReciclassuController@index', $recycling['id'])}}" class="btn btn-primary">Reservado (Aceitar/Recusar)</a></td></td>
        @endif
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>