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
    function mTel(tel) {
        tel=tel.replace(/\D/g,"")
        tel=tel.replace(/^(\d)/,"($1")
        tel=tel.replace(/(.{3})(\d)/,"$1)$2")
        if(tel.length == 9) {
            tel=tel.replace(/(.{1})$/,"-$1")
        } else if (tel.length == 10) {
            tel=tel.replace(/(.{2})$/,"-$1")
        } else if (tel.length == 11) {
            tel=tel.replace(/(.{3})$/,"-$1")
        } else if (tel.length == 12) {
            tel=tel.replace(/(.{4})$/,"-$1")
        } else if (tel.length > 12) {
            tel=tel.replace(/(.{4})$/,"-$1")
        }
        return tel;
    }

    function _cpf(cpf) {
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf == '') return false;
        if (cpf.length != 11 ||
            cpf == "00000000000" ||
            cpf == "11111111111" ||
            cpf == "22222222222" ||
            cpf == "33333333333" ||
            cpf == "44444444444" ||
            cpf == "55555555555" ||
            cpf == "66666666666" ||
            cpf == "77777777777" ||
            cpf == "88888888888" ||
            cpf == "99999999999")
            return false;
        add = 0;
        for (i = 0; i < 9; i++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return false;
        add = 0;
        for (i = 0; i < 10; i++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return false;
        return true;

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
    function mascara(id, mask){
        var i = id.value.length;
        var carac = mask.substring(i, i+1);
        var prox_char = mask.substring(i+1, i+2);
        if(i == 0 && carac != '#'){
            insereCaracter(id, carac);
            if(prox_char != '#')insereCaracter(id, prox_char);
        }
        else if(carac != '#'){
            insereCaracter(id, carac);
            if(prox_char != '#')insereCaracter(id, prox_char);
        }
        function insereCaracter(id, char){
            id.value += char;
        }
    }

    function validarCPF(el){
      if( !_cpf(el.value) ){
     
        alert("CPF "+ el.value+" inválido!");
     
        // apaga o valor
        el.value = "";
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
                <h2><div class="card-header col-md-8">{{ __('Cadastre-se') }}</div></h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        <br>
                        <br>
                        <br>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" >{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" onkeyup="validar(this,'text');" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sobrenome" class="col-md-4 col-form-label text-md-right" >{{ __('Sobrenome') }}</label>

                            <div class="col-md-6">
                                <input id="sobrenome" type="text" class="form-control{{ $errors->has('sobrenome') ? ' is-invalid' : '' }}" name="sobrenome" value="{{ old('sobrenome') }}" onkeyup="validar(this,'text');" required autofocus>

                                @if ($errors->has('sobrenome'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('sobrenome') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Cpf" class="col-md-4 col-form-label text-md-right">{{ __('Cpf') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" placeholder="Digite apenas os números" value="{{ old('cpf') }}" onblur="validarCPF(this)" onkeypress="return mask(event,this,'###.###.###-##')" maxlength="14"required autofocus>

                                @if ($errors->has('cpf'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ old('telefone') }}" pattern=".{13,14}" onkeydown="javascript: fMasc( this, mTel);"  maxlength="14" placeholder="DDD + Número" required autofocus>

                                @if ($errors->has('telefone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Cep" class="col-md-4 col-form-label text-md-right">CEP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cep" id="cep" onblur="pesquisacep(this.value);" maxlength="9" onkeypress="return mask(event, this, '#####-###')" placeholder="Digite apenas os números" required="">
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Street" class="col-md-4 col-form-label text-md-right">Rua</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rua" id="rua" placeholder="Rua, Avenida, etc" required="">
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="Number" class="col-md-4 col-form-label text-md-right">Número</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="numero" id="numero" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Burgh" class="col-md-4 col-form-label text-md-right">Bairro</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="bairro" id="bairro" required="">
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="City" class="col-md-4 col-form-label text-md-right">Cidade</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cidade" id="cidade" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="State" class="col-md-4 col-form-label text-md-right">Estado</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="estado" id="uf" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="xxxxxxx@xxxxx.xxx" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="No mínimo seis dígitos" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Digite a senha novamente" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="form-group row mb-0" >
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn-primary" style="margin-left:400px">
                                    {{ __('Cadastra') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection