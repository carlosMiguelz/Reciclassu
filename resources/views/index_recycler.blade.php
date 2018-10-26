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
    <a style="margin-left: 86%; margin-top: -7.8%" href="{{action('HomeController@logout')}}" class="btn btn-success">Cadastrar Resíduo</a>
    <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Logout</a>
    <br>
    <h4>Dados Pessoais</h4>
        <?php $id = Auth::user()->id ?>
    <a style="margin-left: 75%; margin-top: -5%" href="{{action('HomeController@edit', $id)}}" class="btn btn-warning">Editar</a>
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
  </div>
  </body>
</html>