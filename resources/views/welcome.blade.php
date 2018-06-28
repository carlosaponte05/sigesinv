<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Copy Rapid Express</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('css/bootstrap-responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="color/default.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
    <!-- =======================================================
    Theme Name: Maxim
    Theme URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>
    <!-- navbar -->
    <div class="navbar-wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <!-- Responsive navbar -->
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </a>
                    <h1 class="brand">Copy Rapid Express C.A.</h1>
                    <!-- navigation -->
                    <nav class="pull-right nav-collapse collapse">
                        <ul id="menu-main" class="nav">
                            <li><a title="team" href="#about">Nosotros</a></li>
                            <li><a title="services" href="#services">Servicios</a></li>
                            <!-- <li><a title="works" href="#works">Equipo</a></li>
                            <li><a title="blog" href="#blog">Blog</a></li>
                            <li><a title="contact" href="#contact">Contactos</a></li> -->
                            <li><a href="{{ url('admin/login') }}">Entrar</a></li>
                            <li><a href="{{ url('user/register') }}">Registrarse</a></li>
                            @if (Route::has('login'))
                                <li><a href="{{ url('admin/login') }}">Entrar</a></li>
                            <li><a href="{{ url('user/register') }}">Registrarse</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header area -->
    <div id="header-wrapper" class="header-slider">
        <header class="clearfix">
            <div class="logo">
                <img src="{{ asset('img/logo-image.png') }}" alt="" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div id="main-flexslider" class="flexslider">
                            <ul class="slides">
                                <li>
                                    <p class="home-slide-content">
                                        <strong>Rapido</strong> y dinamico
                                    </p>
                                </li>
                                <li>
                                    <p class="home-slide-content">
                                        Haciendo tu dia <strong>mas corto</strong>
                                    </p>
                                </li>
                                <li>
                                    <p class="home-slide-content">
                                        Con calidad<strong> en todo!!</strong>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <!-- end slider -->
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- spacer section -->
    <section class="spacer green">
        <div class="container">
            <div class="row">
                <div class="span6 alignright flyLeft">
                    <blockquote class="large">
                        Lo que separa a los emprendedores exitosos de los no exitosos es la perseverancia <cite>Steve Jobs - Fundador de Apple</cite>
                    </blockquote>
                </div>
                <div class="span6 aligncenter flyRight">
                    <i class="icon-coffee icon-10x"></i>
                </div>
            </div>
        </div>
    </section>
    <!-- end spacer section -->
    <!-- section: team -->
    <section id="about" class="section">
        <div class="container">
            <h4>Quienes Somos</h4>
            <div class="row">
                <div class="span4 offset1">
                    <div>
                        <h2>Trabajamos para <strong>Usted</strong></h2>
                        <p>
                            Somos una empresa que vende materiales escolares, de oficina, entre otros. Ofrecemos copias en negro de calidad en imagen, además fondo negros de títulos, Notas certificadas, y demás. plastificaciones, encuadernados, y muchos más servicios.
                        </p>
                    </div>
                </div>
                <div class="span6">
                    <div class="aligncenter">
                        <img src="{{ asset('img/icons/creativity3.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span2 offset1 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="{{ asset('img/team/img-1.jpg') }}" alt="" />
                        <h3>Carlos Aponte</h3>
                        <p>
                            Gerente
                        </p>
                    </div>
                </div>
                <div class="span2 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="{{ asset('img/team/img-3.jpg') }}" alt="" />
                        <h3>Tatiana Buendia</h3>
                        <p>
                            Sub-Gerente
                        </p>
                    </div>
                </div>
                <div class="span2 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="{{ asset('img/team/img-2.jpg') }}" alt="" />
                        <h3>Saúl Mora</h3>
                        <p>
                            Atención al público
                        </p>
                    </div>
                </div>
                <div class="span2 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="{{ asset('img/team/img-4.jpg') }}" alt="" />
                        <h3>Marta Sanchez</h3>
                        <p>
                            Jefe Almacén
                        </p>
                    </div>
                </div>
                <div class="span2 flyIn">
                    <div class="people">
                        <img class="team-thumb img-circle" src="{{ asset('img/team/img-5.jpg') }}" alt="" />
                        <h3>Joe Quintero</h3>
                        <p>
                            Ventas
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- end section: team -->
    <!-- section: services -->
    <section id="services" class="section orange">
        <div class="container">
            <h4>Servicios</h4>
            <!-- Four columns -->
            <div class="row">
                <div class="span3 animated-fast flyIn">
                    <div class="service-box">
                        <img src="{{ asset('img/icons/fotocopiadora.png') }}" alt="" />
                        <h2>Fotocopiado</h2>
                        <p>
                            fotocopias en negro
                        </p>
                    </div>
                </div>
                <div class="span3 animated flyIn">
                    <div class="service-box">
                        <img src="{{ asset('img/icons/fondo_negro.png') }}" alt="" />
                        <h2>Fondos Negros</h2>
                        <p>
                            Para títulos, notas certificadas, y otros.
                        </p>
                    </div>
                </div>
                <div class="span3 animated-fast flyIn">
                    <div class="service-box">
                        <img src="{{ asset('img/icons/sello.png') }}" alt="" />
                        <h2>Sellos</h2>
                        <p>
                            Creación de sellos personalizados
                        </p>
                    </div>
                </div>
                <div class="span3 animated-slow flyIn">
                    <div class="service-box">
                        <img src="{{ asset('img/icons/basket.png') }}" alt="" />
                        <h2>Venta</h2>
                        <p>
                            Materiales escolares y de oficinas
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section: services -->
        <footer>
        <div class="container">
            <div class="row">
                <div class="span6 offset3">
                    <ul class="social-networks">
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
                        <li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
                    </ul>
                    <p class="copyright">
                        &copy; Maxim Theme. All rights reserved.
                        <div class="credits">
                            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maxim
              -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        <!-- ./container -->
    </footer>
    <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('js/jquery.nav.js') }}"></script>
    <script src="{{ asset('js/jquery.localScroll.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/isotope.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('js/inview.js') }}"></script>
    <script src="{{ asset('js/animate.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('contactform/contactform.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('sweet::alert') 
</body>

</html>
