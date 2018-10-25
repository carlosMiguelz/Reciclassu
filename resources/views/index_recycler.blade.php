<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>CPF</th>
        <th>Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ Auth::user()->name }}</td>
        <td>{{ Auth::user()->telefone }}</td>
        <td>{{ Auth::user()->endereco }}</td>
        <td>{{ Auth::user()->cpf }}</td>
        <td>{{ Auth::user()->email }}</td>
        <?php $id = Auth::user()->id ?>
        <td><a href="{{action('HomeController@edit', $id)}}" class="btn btn-warning">Edit</a></td>
      </tr>
    </tbody>
  </table>
  </div>
  </body>
</html>