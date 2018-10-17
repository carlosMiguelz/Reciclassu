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
    <h1>Doadores de resíduos</h1>
    <a class="btn btn-primary" href="{{action('DonorController@create')}}">Cadastrar novo morador</a>
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
      
      @foreach($donors as $donor)

      <tr>
        <td>{{$donor['id']}}</td>
        <td>{{$donor['name_donor']}}</td>
        <td>{{$donor['phone_donor']}}</td>
        <td>{{$donor['cpf_donor']}}</td>
        
        <td><a href="{{action('DonorController@edit', $donor['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('DonorController@destroy', $donor['id'])}}" method="post">
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