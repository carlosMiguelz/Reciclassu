<!DOCTYPE html>  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
              <a href="/"><h1><span>Reci</span>classu</h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
              <!--   <li role="presentation"><a href="/" class="active">Início</a></li> -->
                @if (Route::has('login'))
                  @auth      
                @else
                <li role="presentation"><a href="{{route('register')}}">Cadastra-se</a></li>
                <li role="presentation"><a href="{{route('login')}}">Login</a></li>
                @endauth
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
<html>
  <head>
    <meta charset="utf-8">
    <title>Descartar Resíduo  </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
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
  </head>
  <body>
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
  </body>
</html>