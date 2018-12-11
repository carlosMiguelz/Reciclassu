<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reciclassu</title>

  <!-- Bootstrap -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/animate.css">
  <link href="/css/prettyPhoto.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet" />
  <!-- =======================================================
    Theme Name: Company
    Theme URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
        <!-- <ul class="navbar navbar-default navbar-fixed-top" role="navigation"> -->
          <div class="navigation">
            <div class="container">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand">
                <a href="/"><h1><span>Recicla</span>ssu</h1></a>
              </div>
              <div class="menu">
                <ul class="nav nav-tabs" role="tablist">
                        <!-- Authentication Links -->
                        @guest
                        <li role="presentation"><a href="/">Início</a></li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">{{ __('Cadastrar-se') }}</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a  href="{{ route('login') }}" >{{ __('Acessar o sistema') }}</a>
                        </li>   
                        @else
                        <li role="presentation"><a href="/">Início</a></li>
                        <li class="nav-item">
                            <a id="" class="" href="/home" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class=""></span>
                            </a>
                        </li>
                            <li class="nav-item"> 
                                <!-- <div class="" aria-labelledby=""> -->
                                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                <!-- </div> -->
                            </li>
                        @endguest
                    </ul>
    </div>
    </div>
  </div>
  </ul>
    <main class="py-4">
            @yield('content')
        </main>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.prettyPhoto.js"></script>
  <script src="/js/jquery.isotope.min.js"></script>
  <script src="/js/wow.min.js"></script>
  <script src="/js/functions.js"></script>
</body>
</html>