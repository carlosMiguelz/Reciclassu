@extends('layouts.app')

@section('content')
  <link rel="shortcut icon" href="images/reciclagem2.jpg" >
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
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";
        }
    }
    function mask(e, id, mask){
      var tecla=(window.event)?event.keyCode:e.which;   
      if((tecla>47 && tecla<58)){
          mascara(id, mask);
          return true;
      } 
      else{
          if (tecla==11 || tecla==0){
              mascara(id, mask);
              return true;
          } 
          else  return false;
      }
    }
    function validar(dom,tipo){
      switch(tipo){
          case'num':var regex=/[A-Za-z]/g;break;
          case'text':var regex=/\d/g;break;
      }
      dom.value=dom.value.replace(regex,'');    
    }
    function limpa_formulário_cep() {
      //Limpa valores do formulário de cep.
      document.getElementById('cep').value=("");
      document.getElementById('rua').value=("");
      document.getElementById('bairro').value=("");
      document.getElementById('cidade').value=("");
      document.getElementById('uf').value=("");
      // document.getElementById('ibge').value=("");
    }
    function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('rua').value=(conteudo.logradouro);
          document.getElementById('bairro').value=(conteudo.bairro);
          document.getElementById('cidade').value=(conteudo.localidade);
          document.getElementById('uf').value=(conteudo.uf);
          // document.getElementById('ibge').value=(conteudo.ibge);
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
      }
    }
        
    function pesquisacep(valor) {
      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');
      //Verifica se campo cep possui valor informado.
      if (cep != "") {
        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
        if(validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value="...";
            document.getElementById('bairro').value="...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";
            // document.getElementById('ibge').value="...";
            //Cria um elemento javascript.
            var script = document.createElement('script');
            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
      } //end if.
      else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
      }
    };
  </script>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <h3>Descartar resíduo</h3><br/>
              <form method="post" action="{{url('recyclings')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="Nome_residuo" class="col-md-4 col-form-label text-md-right">Tipo de Residuo:</label>
                  <div class="col-md-6">
                    <select name="nome_residuo">
                      <option value="Papel">Papel</option>
                      <option value="Plástico">Plástico</option>
                      <option value="Metal">Metal</option>
                      <option value="Alumínio">Alumínio</option>
                      <option value="Vidro">Vidro</option>
                      <option value="Borracha">Borracha</option>
                      <option value="Outros">Outros</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Descricao_residuo" class="col-md-4 col-form-label text-md-right">Descrição:</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="descricao_residuo" placeholder="Digite aqui detalhes do resíduo" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Quantidade_residuo" class="col-md-4 col-form-label text-md-right">Quantidade:</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="quantidade_residuo" placeholder="Quantidade, Peso, etc" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Valor" class="col-md-4 col-form-label text-md-right">Valor(Opcional):</label>
                  <div class="col-md-6">
                    <input type="text" pattern="^\d+(\.|\,)\d{2}$" class="form-control" name="valor" value="0.00" maxlength="5" onkeyup="somenteNumeros(this)" placeholder="" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Endereço" class="col-md-4 col-form-label text-md-right">Local para retirada</label>
                </div>
                <div class="form-group row">
                  <label for="Street" class="col-md-4 col-form-label text-md-right">CEP</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);" maxlength="9" onkeypress="return mask(event, this, '#####-###')" placeholder="Digite apenas os números" value="{{ Auth::user()->cep }}" required="">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="Street" class="col-md-4 col-form-label text-md-right">Rua</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="rua" id="rua" value="{{ Auth::user()->rua }}" placeholder="Rua, Avenida, etc">
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="Number" class="col-md-4 col-form-label text-md-right">Número</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="numero" id="numero" value="{{ Auth::user()->numero}}" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Burgh" class="col-md-4 col-form-label text-md-right">Bairro</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="bairro" id="bairro" value="{{ Auth::user()->bairro}}" required="">
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="City" class="col-md-4 col-form-label text-md-right">Cidade</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cidade" id="cidade" value="{{ Auth::user()->cidade}}" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="State" class="col-md-4 col-form-label text-md-right">Estado</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="estado" id="uf" value="{{ Auth::user()->estado}}" required="">
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Cadastrar</button>
                    <a href="{{action('HomeController@index')}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>
  
@endsection
