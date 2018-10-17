<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Donors</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    <h1>Recicladores</h1>
    <a class="btn btn-primary" href="{{action('RecyclerController@create')}}">Cadastrar novo reciclador</a>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>CPF</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($recyclers as $recycler)

      <tr>
        <td>{{$recycler['id']}}</td>
        <td>{{$recycler['name_recycler']}}</td>
        <td>{{$recycler['phone_recycler']}}</td>
        <td>{{$recycler['cpf_recycler']}}</td>
        
        <td><a href="{{action('RecyclerController@edit', $recycler['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('RecyclerController@destroy', $recycler['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>