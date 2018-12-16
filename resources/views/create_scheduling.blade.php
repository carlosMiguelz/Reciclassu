@extends('layouts.app')

@section('content')
  <script type="text/javascript">
    function mascaraData( campo, e ){
      var kC = (document.all) ? event.keyCode : e.keyCode;
      var data = campo.value;
      
      if( kC!=8 && kC!=46 )
      {
        if( data.length==2 )
        {
          campo.value = data += '/';
        }
        else if( data.length==5 )
        {
          campo.value = data += '/';
        }
        else
          campo.value = data;
      }
    }

    function valida_horas(edit){

      if(event.keyCode<48 || event.keyCode>57){

        event.returnValue=false;

      }

      if(edit.value.length==2 || edit.value.length==5){

        edit.value+=":";}

    }
    
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
      <br />
      <h3 style="text-align: center">Cadastrar agendamento da coleta</h3>
      <!-- <a style="margin-left: 89%; margin-top: -7.8%" href="{{action('HomeController@index')}}" class="btn btn-success">Minha Página</a>
      <a style="margin-left: 100%; margin-top: -12%" href="{{action('HomeController@logout')}}" class="btn btn-secondary">Sair</a> -->
      @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
       @endif
      <table class="table table-striped" style="text-align: center;">
        <h4 style="text-align: center">Resíduo selecionado</h4>
        <thead>
          <tr>
            <th>Resíduo</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Local de Retirada</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$recycling['nome_residuo']}}</td>
            <td>{{$recycling['descricao_residuo']}}</td>
            <td>{{$recycling['quantidade_residuo']}}</td>
            <td>{{$recycling['endereco_retirada']}}</td>
            <td>{{$recycling['valor']}}</td>
          </tr>
        </tbody>
      </table>
      <br>
      <h4 style="text-align: center">Cadastre os dados do agendamento</h4><br>
      <form method="post" action="{{url('reciclassu')}}" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="data_coleta">Data:</label>
              <br>
              <input type="text" class="form-control" name="data_coleta" placeholder="Data para retirada" maxlength="10" onkeypress="mascaraData( this, event )" >
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="horario_coleta">Horário:</label>
              <br>
              <input type="text" class="form-control" name="horario_coleta" placeholder="Horário para retirada" maxlength="8" onkeypress="valida_horas(this)" required="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="endereco_coleta">Vocè deve realizar a coleta do resíduo no local indicado pelo doador, mas caso queira pode sugerir um local no formulário abaixo e aguardar uma confirmação do doador</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="cep_coleta">CEP:</label>
            <input type="text" class="form-control" name="cep_coleta" id="cep" onblur="pesquisacep(this.value);" maxlength="9" onkeypress="return mask(event, this, '#####-###')" placeholder="Digite apenas os números" value="{{ $recycling->cep_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="rua_coleta">Rua:</label>
            <input type="text" class="form-control" name="rua_coleta" id="rua" value="{{ $recycling->rua_retirada }}" placeholder="Rua, Avenida, etc" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="numero_coleta">Número:</label>
            <input type="text" class="form-control" name="numero_coleta" id="numero" value="{{ $recycling->numero_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="bairro_coleta">Bairro:</label>
            <input type="text" class="form-control" name="bairro_coleta" id="bairro" value="{{ $recycling->bairro_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="cidade_coleta">Cidade:</label>
            <input type="text" class="form-control" name="cidade_coleta" id="cidade" value="{{ $recycling->cidade_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="estado_coleta">Estado:</label>
            <input type="text" class="form-control" name="estado_coleta" id="uf" value="{{ $recycling->estado_retirada }}" required="">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <input type="hidden" class="form-control" name="id_user" value="{{$recycling['id_user']}}" readonly="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <input type="hidden" class="form-control" name="id_recycling" value="{{$recycling['id']}}" readonly="">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <input type="hidden" class="form-control" name="descricao_residuo" value="{{$recycling['descricao_residuo']}}" readonly="">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success">Agendar</button>
            <a href="{{action('RecyclingController@index')}}" class="btn btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
@endsection