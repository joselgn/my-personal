<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('css/templateown/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templateown/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templateown/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templateown/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templateown/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/templateown/css/magnific-popup.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/templateown/css/templatemo-style.css') }}">

    <!-- PAGE TITLE -->
    <title>@yield('title_txt')</title>
</head>
<body>

    <!-- PRE LOADER -->
    <section class="preloader">
        <div class="spinner">

            <span class="spinner-rotate"></span>

        </div>
    </section>


    <!-- MENU -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>

                <!-- lOGO TEXT HERE -->
                <a href="{{ url('/') }}" class="navbar-brand">J.Fernandes <span>.</span> Developer</a>
            </div>

            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-nav-first">
                    <li><a href="{{ url('/#about') }}" class="smoothScroll">About</a></li>
                    <li><a href="{{ url('/#team') }}" class="smoothScroll">Chef</a></li>
                    <li><a href="{{ url('/#menu') }}" class="smoothScroll">Menu</a></li>
                    <li><a href="{{ url('/#contact') }}" class="smoothScroll">Contact</a></li>
                    <li><a href="{{ url('meu-login/#content') }}" class="smoothScroll"><i class="fa fa-user"></i> Login</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#"><i class="fa fa-phone"></i> 010 020 0340</a></li> -->
                    <a href="#footer" class="section-btn">
                        Entre em Contato !
                    </a>
                </ul>
            </div>
        </div>
    </section>

    <!-- HOME - SLIDE -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="row">

            <div class="owl-carousel owl-theme">
                <div class="item item-first">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-8 col-sm-12">
                                <h3>Eatery Cafe &amp; Restaurant</h3>
                                <h1>Our mission is to provide an unforgettable experience</h1>
                                <a href="#team" class="section-btn btn btn-default smoothScroll">Meet our chef</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-second">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-8 col-sm-12">
                                <h3>Your Perfect Breakfast</h3>
                                <h1>The best dinning quality can be here too!</h1>
                                <a href="#menu" class="section-btn btn btn-default smoothScroll">Discover menu</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item item-third">
                    <div class="caption">
                        <div class="container">
                            <div class="col-md-8 col-sm-12">
                                <h3>New Restaurant in Town</h3>
                                <h1>Enjoy our special menus every Sunday and Friday</h1>
                                <a href="#contact" class="section-btn btn btn-default smoothScroll">Reservation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- DINAMIC CONTENT -->
    <section id="content" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer id="footer" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-8">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Find us</h2>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>123 nulla a cursus rhoncus,<br> augue sem viverra 10870<br>id ultricies sapien</p>
                        </address>
                    </div>
                </div>

                <div class="col-md-3 col-sm-8">
                    <div class="footer-info">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Reservation</h2>
                        </div>
                        <address class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>090-080-0650 | 090-070-0430</p>
                            <p><a href="mailto:info@company.com">info@company.com</a></p>
                            <p>LINE: eatery247 </p>
                        </address>
                    </div>
                </div>

                <div class="col-md-4 col-sm-8">
                    <div class="footer-info footer-open-hour">
                        <div class="section-title">
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">Open Hours</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.4s">
                            <p>Monday: Closed</p>
                            <div>
                                <strong>Tuesday to Friday</strong>
                                <p>7:00 AM - 9:00 PM</p>
                            </div>
                            <div>
                                <strong>Saturday - Sunday</strong>
                                <p>11:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-4">
                    <ul class="wow fadeInUp social-icon" data-wow-delay="0.4s">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-google"></a></li>
                    </ul>

                    <div class="wow fadeInUp copyright-text" data-wow-delay="0.8s">
                        <p><br>Copyright &copy; 2018 <br>Your Company Name

                            <br><br>Design: <a rel="nofollow" href="http://templatemo.com" target="_parent">TemplateMo</a>
                            <br><br>Distribution: <a href="http://themewagon.com" target="_parent">ThemeWagon</a></p>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="{{ asset('js/templateown/js/jquery.js') }}"></script>
    <script src="{{ asset('js/templateown/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/templateown/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/templateown/js/wow.min.js') }}"></script>
    <script src="{{ asset('js/templateown/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/templateown/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/templateown/js/smoothscroll.js') }}"></script>
    <script src="{{ asset('js/templateown/js/custom.js') }}"></script>

</body>
</html>
