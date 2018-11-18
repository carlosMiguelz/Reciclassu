<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Agendamento </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <br>
      <h3 style="text-align: center">Editar agendamento</h3><br  />
        <form method="get" action="{{action('ReciclassuController@update')}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="id_recycling">ID Agendamento:</label>
              <input type="text" class="form-control" name="id_scheduling" value="{{$scheduling['id']}}" readonly="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="local_coleta">Local:</label>
            <input type="text" class="form-control" name="local_coleta" value="{{$scheduling->local_coleta}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="data_coleta">Data:</label>
              <input type="text" class="form-control" name="data_coleta" value="{{$scheduling->data_coleta}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="horario_coleta">Horário:</label>
              <input type="text" class="form-control" name="horario_coleta" value="{{$scheduling->horario_coleta}}">
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
  </body>
</html>