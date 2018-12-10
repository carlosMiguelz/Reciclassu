@extends('layouts.app')

@section('content')
  <script type="text/javascript">
            function fMasc(objeto,mascara) {
                obj=objeto
                masc=mascara
                setTimeout("fMascEx()",1)
            }
            function fMascEx() {
                obj.value=masc(obj.value)
            }
            
            function mNum(num){
                num=num.replace(/\D/g,"")
                return num
            }
        </script>
  
    <div class="container">
      <h3 style="text-align: center">Descartar resíduo</h3><br/>
      <form method="post" action="{{url('recyclings')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
           <label for="Nome_residuo">Tipo de Residuo:</label>
           <class="form-control" name="nome_residuo">
           <br>
            <select name="nome_residuo">
            <option value="Papel">Papel</option>
            <option value="Plástico">Plástico</option>
            <option value="Metal">Metal</option>
            <option value="Alumínio">Alumínio</option>
            <option value="Vidro">Vidro</option>
            <option value="Borracha">Borracha</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Descricao_residuo">Descrição:</label>
              <input type="text" class="form-control" name="descricao_residuo" required oninvalid="this.setCustomValidity('Digite a descrição corretamente')">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Quantidade_residuo">Quantidade:</label>
              <input type="text" class="form-control" name="quantidade_residuo"onkeydown="javascript: fMasc( this, mNum );" maxlength="3" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Endereco_retirada">Endereço de Retirada:</label>
              <input type="text" class="form-control" name="endereco_retirada" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Valor">Valor(Opcional):</label>
              <input type="text" class="form-control" name="valor" value="0"onkeydown="javascript: fMasc( this, mNum );" maxlength="5" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Cadastrar</button>
            <a href="{{action('HomeController@index')}}" class="btn btn-danger">Minha Página</a>
          </div>
        </div>
      </form>
    </div>
  
@endsection
