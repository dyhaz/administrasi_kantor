<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.head')
    <title>Administrasi Kantor | @yield('title')</title>

</head>

<body>

<!-- Header -->
<header class="header navbar navbar-fixed-top" role="banner">
    @include('includes.navbar')
</header> <!-- /.header -->

<div id="container">
    @include('includes.sidebar')

    <div id="content">
        <div class="container">
            @include('includes.page-header')
            @yield('content')
        </div>
        <!-- /.container -->
    </div>
</div>
@yield('js')
</body>
</html>