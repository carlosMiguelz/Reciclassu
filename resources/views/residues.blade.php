<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Resíduos</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
      .top-right {
          position: absolute;
          right: 10px;
          top: 18px;
      }

      .links > a {
          color: #636b6f;
          padding: 0 25px;
          font-size: 12px;
          font-weight: 600;
          letter-spacing: .1rem;
          text-decoration: none;
          text-transform: uppercase;
      }
    </style>
  </head>
  <body>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Minha Conta</a>
            @else
                <a href="{{ route('login') }}">Acessar o sistema</a>
                <a href="{{ route('register') }}">Cadastrar-se</a>
            @endauth
        </div>
    @endif
    <div class="container">
    <br />
    <h3 style="text-align: center">Resíduos disponíveis para coleta</h3><br>
    <h4 style="text-align: center">Se quiser algum dos resíduos, acesse a sua conta ou cadastre-se agora</h4>
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
        <td>
          <?php 
              if($recycling['valor'] == 0){
                echo "Grátis";
              }else{
                echo $recycling['valor'];
              }
          ?>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>