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
            
            function mCPF(cpf){
                cpf=cpf.replace(/\D/g,"")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
                return cpf
            }
        </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Cpf" class="col-md-4 col-form-label text-md-right">{{ __('Cpf') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14"required autofocus>

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
                                <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ old('telefone') }}" onkeydown="javascript: fMasc( this, mTel);"  maxlength="13"
                                 required autofocus>

                                @if ($errors->has('telefone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Endereco" class="col-md-4 col-form-label text-md-right">{{ __('Endereco') }}</label>

                            <div class="col-md-6">
                                <input id="endereco" type="text" class="form-control{{ $errors->has('endereço') ? ' is-invalid' : '' }}" name="endereco" value="{{ old('endereco') }}" required autofocus>

                                @if ($errors->has('endereço'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('endereco') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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