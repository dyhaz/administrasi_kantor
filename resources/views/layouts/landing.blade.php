<!DOCTYPE html>
<html lang="en">
<head>

    <!--=== CSS ===-->

    <!-- Bootstrap -->
    <link href="/theme/minimal/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- jQuery UI -->
    <!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/theme/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
    <![endif]-->

    <!-- Theme -->
    <link href="/theme/minimal/assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/theme/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/theme/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="/theme/assets/css/icons.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="/theme/minimal/assets/css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="/theme/assets/css/fontawesome/font-awesome-ie7.min.css">
    <![endif]-->

    <!--=== JavaScript ===-->
    <script type="text/javascript" src="/theme/assets/js/libs/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/theme/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

    @yield('css')
    <title>
        Administrasi Kantor | @if(View::hasSection('title')) @yield('title') @else Laravel @endif
    </title>

</head>

<body data-spy="scroll" data-offset="0" data-target="#theMenu">

    <!-- Menu -->
    <nav class="menu" id="theMenu">
        <div class="menu-wrap">
            <h1 class="logo"><a href="/#home">MENU</a></h1>
            <i class="icon-remove menu-close"></i>
            @if(Auth::user())
                <a href="{{ url('/home') }}" class="smoothScroll">Home</a>
            @else
                <a href="{{ url('/login') }}" class="smoothScroll">Login</a>
                <a href="{{ url('/register') }}" class="smoothScroll">Register</a>
            @endif
            <a href="#"><i class="icon-facebook"></i></a>
            <a href="#"><i class="icon-twitter"></i></a>
            <a href="#"><i class="icon-dribbble"></i></a>
            <a href="#"><i class="icon-envelope"></i></a>
        </div>

        <!-- Menu button -->
        <div id="menuToggle"><i class="icon-reorder"></i></div>
    </nav>



    <!-- ========== HEADER SECTION ========== -->
    <section id="home" name="home"></section>
    <div id="headerwrap">
        <div class="container">
            <div class="logo">
                <img src="/theme/minimal/assets/img/logo.png">
            </div>
            <br>
            <div class="row">
                <h1>ADMINISTRASI KANTOR</h1>
                <br>
                <h3>Hello, I'm Carlos. I love design.</h3>
                <br>
                <br>
                <div class="col-lg-6 col-lg-offset-3">
                </div>
            </div>
        </div><!-- /container -->
    </div><!-- /headerwrap -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/theme/minimal/assets/js/classie.js"></script>
    <script src="/theme/minimal/assets/js/bootstrap.min.js"></script>
    <script src="/theme/minimal/assets/js/smoothscroll.js"></script>
    <script src="/theme/minimal/assets/js/main.js"></script>
</body>
</html>