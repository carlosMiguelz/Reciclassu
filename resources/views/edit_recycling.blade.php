@extends('layouts.app')

@section('content')
  
  
    <div class="container">
      <h3 style="text-align: center">Editar o resíduo</h3><br  />
        <form method="post" action="{{action('RecyclingController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="nome_residuo">Tipo de Resíduo:</label>
            <input type="text" class="form-control" name="nome_residuo" value="{{$recycling->nome_residuo}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="descricao_residuo">Email</label>
              <input type="text" class="form-control" name="descricao_residuo" value="{{$recycling->descricao_residuo}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="quantidade_residuo">Quantidade:</label>
              <input type="text" class="form-control" name="quantidade_residuo" value="{{$recycling->quantidade_residuo}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="endereco_retirada">Local para retirada:</label>
              <input type="text" class="form-control" name="endereco_retirada" value="{{$recycling->endereco_retirada}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="valor">Valor(Opcional):</label>
              <input type="text" class="form-control" name="valor" value="{{$recycling->valor}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Atualizar</button>
          </div>
        </div>
      </form>
    </div>
@endsection