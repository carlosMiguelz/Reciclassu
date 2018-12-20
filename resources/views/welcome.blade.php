@extends('layouts.app')

@section('content')

  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(/images/teste.jpg)">
          <div class="container">
            <div class="row slide-margin">
              <div class="col-sm-6">
                <div class="carousel-content">
                  <h2 class="animation animated-item-1">Bem Vindo ao Reciclassu<span></span></h2>
                  <p class="animation animated-item-2">O portal do descarte correto!</p>
                  <a class="btn-slide animation animated-item-3" href="{{ route('register') }}">Descarte ou recolha resíduos</a>
                </div>
              </div>

              <div class="col-sm-6 hidden-xs animation animated-item-4">
                <div class="slider-img">
                </div>
              </div>

            </div>
          </div>
        </div>
        <!--/.item-->
      </div>
      <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
  </section>
  <!--/#main-slider-->

  <div class="feature">
    <div class="container">
      <div class="text-center">
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <i class="glyphicon glyphicon-log-in"></i>
            <h2>Entrar</h2>
            <p>Acessar o sistema.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <i class="glyphicon glyphicon-log-out"></i>
            <h2>Sair</h2>
            <p>Se você já fez uso das funcionalidades do site e não quer mais usá-lo, pode se deslogar.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <i class="glyphicon glyphicon-edit"></i>
            <h2>Registrar</h2>
            <p>Não faz parte da aplicação? Registre.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
            <i class="fa fa-heart-o"></i>
            <h2>Eu quero</h2>
            <p>Função para confirma o recolhimento do material.</p>
          </div>
        </div>
      </div>
      </div>
      </div>
  <div class="feature">
    <div class="container">
      <div class="text-center">
        <div class="col-md-3">
          <div class="hi-icon-wrap wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <i class="glyphicon glyphicon-list-alt"></i>
            <h2>Listar</h2>
            <p>Listagem de materiais.</p>
          </div>
        </div>
        
        <div class="col-md-3">
          <div class="hi-icon-wrap wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <i class="glyphicon glyphicon-arrow-up"></i>
            <h2>Descartar</h2>
            <p>Aqui você pode descartar o resíduo.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <i class="glyphicon glyphicon-arrow-down"></i>
            <h2>Recolher</h2>
            <p>Recolhimento do residuo.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="hi-icon-wrap wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <i class="glyphicon glyphicon-user"></i>
            <h2>Acessar Conta</h2>
            <p>Aqui você pode entrar na sua conta.</p>
          </div>
        </div>
      </div>  
    </div>
  </div>

<!--   <div class="about">
    <div class="container">
      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h2>about us</h2>
        <img src="images/6.jpg" class="img-responsive" />
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
          pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
        </p>
      </div>

      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <h2>Template built with Twitter Bootstrap</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
          pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
          </p>
      </div>
    </div>
  </div> -->

  <!-- <div class="lates">
    <div class="container">
      <div class="text-center">
        <h2>Lates News</h2>
      </div>
      <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="images/4.jpg" class="img-responsive" />
        <h3>Template built with Twitter Bootstrap</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
          pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
        </p>
      </div> -->

      <!-- <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <img src="images/4.jpg" class="img-responsive" />
        <h3>Template built with Twitter Bootstrap</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
          pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
        </p>
      </div> -->

     <!--  <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
        <img src="images/4.jpg" class="img-responsive" />
        <h3>Template built with Twitter Bootstrap</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
          pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
        </p>
      </div>
    </div>
  </div> -->

  <section id="partner">
    <div class="container">
      <div class="center wow fadeInDown">
        <h2>Sobre</h2>
        <p>Essa aplicação foi desenvolvida pelos alunos Carlos Miguel, Lucielly Fernanda e Tarcísio Marques. Estudantes do 3º Período do Curso Técnico em Informática para Internet no Campus Igarassu do IFPE</p>
      </div>
<!-- 
      <div class="partners">
        <ul>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/partners/partner1.png"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/partners/partner2.png"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/partners/partner3.png"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="images/partners/partner4.png"></a></li> -->
          <!-- <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="images/partners/partnerifpe.png"></a></li>
        </ul>
      </div> -->
    </div>
    <!--/.container-->
  </section>
  <!--/#partner-->

  <!-- <section id="conatcat-info">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="pull-left">
              <i class="fa fa-phone"></i>
            </div>
            <div class="media-body">
              <h2>Have a question or need a custom quote?</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation +0123 456 70 80</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    /.container
  </section> -->
  <!--/#conatcat-info-->

  <footer>
    <div class="footer">
      <div class="container">
        <div class="social-icon">
          <div class="col-md-4">
            <ul class="social-network">
              <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-4 col-md-offset-4">
          <div style="color: white;" class="copyright">
            &copy;Reciclassu Company.
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
            <!--   Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a></div> -->
          </div>
        </div>
      </div>

      <div class="pull-right">
        <a style="color: white;" href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>


@endsection
