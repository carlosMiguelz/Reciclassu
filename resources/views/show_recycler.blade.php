@extends('layouts.app')
@section('content')
    <div class="container">
    <br />
    <h3 style="text-align: center">Detalhes do reciclador</h3><br/>
    <a style="margin-left: 89%; margin-top: -7.8%" href="{{action('HomeController@index')}}" class="btn btn-success">Minha Página</a>
    <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Sair</a>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped" style="text-align: center">
      <tr>
        <th>Nome</th>
        <td>{{$recycler['name']}}</td>
      </tr>
      <tr>
        <th>Email</th>
        <td>{{$recycler['email']}}</td>
      </tr>
      <tr>
        <th>Telefone</th>
        <td>{{$recycler['telefone']}}</td>
      </tr>
  </table>
  <br><br>
  <td><a style="float: right;" href="{{action('HomeController@index')}}" class="btn btn-danger">Voltar</a></td>
  </div>



@endsection
