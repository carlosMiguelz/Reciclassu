<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar cadastro </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Editar cadastro</h2><br  />
        <form method="post" action="{{action('DonorController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name_donor">Nome Completo:</label>
            <input type="text" class="form-control" name="name_donor" value="{{$donor->name_donor}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Phone_donor">Telefone:</label>
              <input type="text" class="form-control" name="phone_donor" value="{{$donor->phone_donor}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Cpf_donor">CPF:</label>
              <input type="text" class="form-control" name="cpf_donor" value="{{$donor->cpf_donor}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>