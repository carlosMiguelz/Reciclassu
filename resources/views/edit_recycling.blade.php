@extends('layouts.app')

@section('content')
  
  <script type="text/javascript">

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
            <label for="Cep">Dados do Local de Retirada</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Cep">CEP:</label>
            <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);" maxlength="9" onkeypress="return mask(event, this, '#####-###')" value="{{ $recycling->cep_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Rua">Rua:</label>
            <input type="text" class="form-control" name="rua" id="rua" value="{{ $recycling->rua_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Numero">Numero:</label>
            <input type="text" class="form-control" name="numero" id="numero" value="{{ $recycling->numero_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Bairro">Bairro:</label>
            <input type="text" class="form-control" name="bairro" id="bairro" value="{{ $recycling->bairro_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Cidade">Cidade:</label>
            <input type="text" class="form-control" name="cidade" id="cidade" value="{{ $recycling->cidade_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Estado">Estado:</label>
            <input type="text" class="form-control" name="estado" id="uf" value="{{ $recycling->estado_retirada }}">
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