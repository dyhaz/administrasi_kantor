<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Login</title>

    @include('includes.head')
    <link href="/theme/assets/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body class="login">
<!-- Logo -->
<div class="logo">
    <img src="/theme/assets/img/logo.png" alt="logo" />
    <strong>ME</strong>LON
</div>
<!-- /Logo -->

<!-- Login Box -->
<div class="box">
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>