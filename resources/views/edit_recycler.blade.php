@extends('layouts.app')

@section('content')
    <div class="container"><br>
      <h3 style="text-align: center">Editar Dados</h3><br  />
        <form method="get" action="{{action('HomeController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="telefone">Telefone:</label>
              <input type="text" class="form-control" name="telefone" value="{{ Auth::user()->telefone }}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" name="endereco" value="{{ Auth::user()->endereco }}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:30px">
            <button type="submit" class="btn btn-success" style="margin-left:120px">Atualizar</button>
          </div>
        </div>
      </form>
    </div>
@endsection