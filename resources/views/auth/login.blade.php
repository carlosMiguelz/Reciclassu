@extends('layouts.app')

@section('content')
<style>
   
.login-box{
    width: 500px;
    height: 500px;
  margin-left:150px;
    color: black;
    margin-top: 200px;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}

h2{
    margin: 0;
    padding: 0 0 20px;
    margin-left: 36px;
    text-align: left;
    color: black;
    font-size: 30px;
}
.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
    margin-left: -90px;
    color: black;
}
.login-box input{
    width: 100%;
    margin-bottom: 20px;
    color: black;
}
.login-box input[type="email"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid black;
    background: transparent;
    outline: none;
    height: 40px;
    color: black;
    font-size: 16px;
}
.login-box input[type="password"]{
      border-bottom: 1px solid black;
}

.login-box a{
    text-decoration: none;
    order-bottom: 1px solid black;
    font-size: 14px;
    color: black;
    margin-left: 50px;
}
.login-box a:hover
{
    color: #39dc79;
    margin-top: 10px;
}
.login-box input[type="submit"]:hover
{
    cursor: pointer;
    background: black;
    color: black;





</style>
<br>
<br>
<br>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                  <div class="login-box">
               <h2>{{ __('Acessar o sistema') }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <br>
                        <br>

                        <div class="form-group row">
                          <p>  <label for="email" style="margin-left: 100px;" class="col-sm-2 col-form-label ">{{ __('E-Mail:') }} </label> </p>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                           <p> <label for="password"style="margin-left: 100px;" class="col-md-2 col-form-label text-md-right" >{{ __('Senha:') }}</label> </p>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>

                        <div class="form-group row col-md-12">
                            <div class="col-md-6 offset-md-4">
                                <!-- <div class="form-check">
                                    <input class="form-check-input"style="margin-left:40px" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember"style="margin-left:40px">
                                        {{ __('Lembrar meus dados') }}
                                    </label>
                                </div> -->
                            </div>
                   
                           
                                <button type="submit" class="btn btn-primary" style="margin-left: 180px;">
                                    {{ __('Entrar') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}" style="margin-top: -25px; margin-left: 15px;">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
