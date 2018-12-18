<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Mobiacess</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/iconi.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
  </head>

  <body data-spy="scroll" data-target="#navbar-example">

    <div id="preloader"></div>

    <header>
      <!-- header-area start -->
      <div id="sticker" class="header-area">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12">

              <!-- Navigation -->
              <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <!-- Brand -->
                  <a class="navbar-brand page-scroll sticky-logo" href="index.php">
                    <h1><span>M</span>obiacess</h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <img src="img/logo.png" alt="" title=""> -->
                  </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                      <a class="page-scroll" href="{{action('LocalController@loadmap')}}">Acessar Mapa</a>
                    </li>
                    <li>
                     <a class="page-scroll" href="#about">Sobre</a>
                   </li>
                   <li>
                     <a class="page-scroll" href="#team">Equipe</a>
                   </li>
                   <!-- <li>        
                    <a class="page-scroll" href="#portfolio">Portfolio</a>
                  </li> -->
                  <li>
                    <a class="page-scroll" href="#contact">Contatos</a>
                  </li>
                  @guest
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Acessar<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="{{ route('login') }}">Entrar</a></li>
                      <li><a href="{{ route('register') }}">Cadastre-se</a></li>
                    </ul> 
                  </li>
                  @else
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="page-scroll dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      <i class="fa fa-street-view" style="font-size:20;"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" style="background-color:#000000;" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Sair') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
                @endguest
              </ul>
            </div>
            <!-- navbar-collapse -->
          </nav>
          <!-- END: Navigation -->
        </div>
      </div>
    </div>
  </div>
  <!-- header-area end -->
</header>
<!-- header end -->

<!-- Start Slider Area -->
<div id="home" class="slider-area">
  <div class="bend niceties preview-2">
    <div id="ensign-nivoslider" class="slides">
      <img src="img/slider/cadeirantess.jpg" alt="" title="#slider-direction-1" />
      <img src="img/slider/cadeirante2.jpg" alt="" title="#slider-direction-2" />
      <img src="img/slider/prefeitura.jpg" alt="" title="#slider-direction-3" />
    </div>

    <!-- direction 1 -->
    <div id="slider-direction-1" class="slider-direction slider-one">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content">
              <!-- layer 1 -->
              <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="title1">Seja Bem-vindo ao Mobiacess</h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">Pegue o melhor caminho todos os dias e facilite sua locomoção</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn page-scroll" href="#team">Equipe</a>
                <a class="ready-btn page-scroll" href="#about">Sobre</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- direction 2 -->
    <div id="slider-direction-2" class="slider-direction slider-two">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <!-- layer 1 -->
              <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <h2 class="title1">Informações do Mobiacess</h2>
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">Mobiacess é uma aplicação que vai ajudar na locomoção dos cadeirantes, mostrando no mapa os pontos e seus tipos de acessibilidade</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn page-scroll" href="#team">Equipe</a>
                <a class="ready-btn page-scroll" href="#about">Sobre</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- direction 3 -->
    <div id="slider-direction-3" class="slider-direction slider-two">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content">
              <!-- layer 1 -->
              <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
              </div>
              <!-- layer 2 -->
              <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <h1 class="title2">Mobiacess é uma aplicação que vai ajudar na locomoção dos cadeirantes</h1>
              </div>
              <!-- layer 3 -->
              <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                <a class="ready-btn page-scroll" href="#team">Equipe</a>
                <a class="ready-btn page-scroll" href="#about">Sobre</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Slider Area -->

<!-- Start About area -->
<div id="about" class="about-area area-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="section-headline text-center">
          <h2>Sobre Mobiacess</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- single-well start-->
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="well-left">
          <div class="single-well">
            <a href="#">
              <img src="img/about/cadeirantess.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
      <!-- single-well end-->
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="well-middle">
          <div class="single-well">
            <a href="#">
              <h4 class="sec-head">Nosso Projeto</h4>
            </a>
            <p>
              Mobiacess é uma aplicação que vai ajudar na locomoção dos cadeirantes, mostrando no mapa os pontos e seus tipos de acessibilidade.
            </p>
            <ul>
              <li>
                <i class="fa fa-check"></i> Cadastro de Usuário
              </li>
              <li>
                <i class="fa fa-check"></i> Cadastro de Local
              </li>
              <li>
                <i class="fa fa-check"></i> Mapa
              </li>
              <li>
                <i class="fa fa-check"></i> Marcação de Pontos 
              </li>
              <li>
                <i class="fa fa-check"></i> Locais Acessíveis ou Não
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End col-->
    </div>
  </div>
</div>
<!-- End Wellcome Area -->

<!-- Start team Area -->
<div id="team" class="our-team-area area-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="section-headline text-center">
          <h2>Nossa equipe</h2>
        </div>
      </div>
    </div>
    <!-- End column -->
    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="single-team-member">
        <div class="team-img">
          <a href="#">
            <img src="img/team/2.jpg" alt="">
          </a>
          <div class="team-social-icon text-center">
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="team-content text-center">
          <h4>Leonardo</h4>
          <p>Desenvolvedor Web</p>
        </div>
      </div>
    </div>
    <!-- End column -->
    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="single-team-member">
        <div class="team-img">
          <a href="#">
            <img src="img/team/3.jpg" alt="">
          </a>
          <div class="team-social-icon text-center">
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="team-content text-center">
          <h4>Camila</h4>
          <p>Desenvolvedor Web</p>
        </div>
      </div>
    </div>
    <!-- End column -->
    <div class="col-md-3 col-sm-3 col-xs-12">
      <div class="single-team-member">
        <div class="team-img">
          <a href="#">
            <img src="img/team/4.jpg" alt="">
          </a>
          <div class="team-social-icon text-center">
            <ul>
              <li>
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="team-content text-center">
          <h4>Tuanno</h4>
          <p>Desenvolvedor Web</p>
        </div>
      </div>
    </div>
    <!-- End column -->
  </div>
</div>
</div>
</div>

<!-- <div id="portfolio" class="portfolio-area area-padding fix">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="section-headline text-center">
          <h2>Nosso Portifolio</h2>
        </div>
      </div>
    </div>
    <div class="row">
   
      <div class="awesome-project-1 fix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="awesome-menu ">
            <ul class="project-menu">
              <li>
                <a href="#" class="active" data-filter="*">Todos</a>
              </li>
              <li>
                <a href="#" data-filter=".development">Desenvolvimento</a>
              </li>
              <li>
                <a href="#" data-filter=".design">Design</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="awesome-project-content">
  
        <div class="col-md-4 col-sm-4 col-xs-12 design">
          <div class="single-awesome-project">
            <div class="awesome-img">
              <a href="#"><img src="img/portfolio/1.jpg" alt="" /></a>
              <div class="add-actions text-center">
                <div class="project-dec">
                  <a class="venobox" data-gall="myGallery" href="img/portfolio/1.jpg">
                    <h4>Ótimo Designer</h4>
                    <span>Desenvolvimento Web</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 col-sm-4 col-xs-12 photo development">
          <div class="single-awesome-project">
            <div class="awesome-img">
              <a href="#"><img src="img/portfolio/2.jpg" alt="" /></a>
              <div class="add-actions text-center">
                <div class="project-dec">
                  <a class="venobox" data-gall="myGallery" href="img/portfolio/2.jpg">
                    <h4>Site Funcional</h4>
                    <span>Desenvolvimento Web</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-4 col-sm-4 col-xs-12 development">
          <div class="single-awesome-project">
            <div class="awesome-img">
              <a href="#"><img src="img/portfolio/3.jpg" alt="" /></a>
              <div class="add-actions text-center">
                <div class="project-dec">
                  <a class="venobox" data-gall="myGallery" href="img/portfolio/3.jpg">
                    <h4>Protótipo para o Cliente</h4>
                    <span>Desenvolvimento Web</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        <div class="col-md-4 col-sm-4 col-xs-12 photo development">
          <div class="single-awesome-project">
            <div class="awesome-img">
              <a href="#"><img src="img/portfolio/4.jpg" alt="" /></a>
              <div class="add-actions text-center">
                <div class="project-dec">
                  <a class="venobox" data-gall="myGallery" href="img/portfolio/4.jpg">
                    <h4>Time Criativo</h4>
                    <span>Desenvolvimento Web</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
</div> -->
<!-- End Blog -->
<!-- Start Suscrive Area -->
<div class="suscribe-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
        <div class="suscribe-text text-center">
          <h3></h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Suscrive Area -->
<!-- Start contact Area -->
<div id="contact" class="contact-area">
  <div class="contact-inner area-padding">
    <div class="contact-overly"></div>
    <div class="container ">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Nosso Contato</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="fa fa-mobile"></i>
              <p>
                <span>Segunda-Sexta(9:00-17:00)</span>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="fa fa-envelope-o"></i>
              <p>
                Email: leonardo.alves779@gmail.com<br>
              </p>
              <p>
                Email: tuannodanyllo26@gmail.com<br>
              </p>
              <p>
                Email: camila.rs122@gmail.com<br>
              </p>
            </div>
          </div>
        </div>
        <!-- Start contact icon column -->
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="contact-icon text-center">
            <div class="single-icon">
              <i class="fa fa-map-marker"></i>
              <p>
                Localização:Instituto Federal De Pernambuco<br>
                <span>IFPE</span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- End Contact Area -->

      <!-- Start Footer bottom Area -->
      <footer>
        <div class="footer-area">
          <div class="container">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="footer-content">
                  <div class="footer-head">
                    <div class="footer-logo">
                      <h2><span>M</span>obiacess</h2>
                    </div>

                    <p>Mobiacess é uma aplicação que vai ajudar na locomoção dos cadeirantes,mostrando no mapa as melhores pontos e seus tipos de acessibilidade.</p>
                    <div class="footer-icons">
                      <ul>
                        <li>
                          <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-google"></i></a>
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end single footer -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="footer-content">
                  <div class="footer-head">
                    <h4>Informações</h4>
                    <div class="footer-contacts">
                      <p><span>Email: </span>mobiacess2018@gmail.com</p>
                      <p><span>Horas de Trabalho: </span>09:00 - 17:00</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end single footer -->
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="footer-content">
                  <div class="footer-head">
                    <h4>Instagram</h4>
                    <div class="flicker-img">
                      <img src="img/portfolio/1.jpg" width="40%", height="30%">
                      <img src="img/portfolio/2.jpg" width="40%", height="30%">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

      <!-- JavaScript Libraries -->
      <script src="lib/jquery/jquery.min.js"></script>
      <script src="lib/bootstrap/js/bootstrap.min.js"></script>
      <script src="lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="lib/venobox/venobox.min.js"></script>
      <script src="lib/knob/jquery.knob.js"></script>
      <script src="lib/wow/wow.min.js"></script>
      <script src="lib/parallax/parallax.js"></script>
      <script src="lib/easing/easing.min.js"></script>
      <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
      <script src="lib/appear/jquery.appear.js"></script>
      <script src="lib/isotope/isotope.pkgd.min.js"></script>

      <!-- Contact Form JavaScript File -->
      <script src="contactform/contactform.js"></script>

      <script src="js/main.js"></script>
    </body>

    </html>
