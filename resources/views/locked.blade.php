<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Lockscreen | Klorofil - Free Bootstrap Dashboard Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="http://demo.cssmoban.com/cssthemes4/tid_5_klorofil/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://demo.cssmoban.com/cssthemes4/tid_5_klorofil/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://demo.cssmoban.com/cssthemes4/tid_5_klorofil/assets/vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="http://demo.cssmoban.com/cssthemes4/tid_5_klorofil/assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="http://demo.cssmoban.com/cssthemes4/tid_5_klorofil/assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="http://demo.cssmoban.com/cssthemes4/tid_5_klorofil/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="http://demo.cssmoban.com/cssthemes4/tid_5_klorofil/assets/img/favicon.png">
</head>
<body>

<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box lockscreen clearfix">
                <div class="content">
                    <h1 class="sr-only">Klorofil - Free Bootstrap dashboard</h1>
                    <div class="logo text-center"><img src="http://wiraharja.com/assets/imgs/logo.png" alt="Wiraharja Graha Software Logo"></div>
                    <div class="user text-center">
                        <img width="90" height="90" src="storage/{{ @Auth::user()->pegawai->foto }}" class="img-circle" alt="Avatar">
                        <h2 class="name">{{ @Auth::user()->name }}</h2>
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger fade in">
                                <i class="icon-remove close" data-dismiss="alert"></i>
                                <strong>Error!</strong> {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    {!! Form::open() !!}
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Enter your password ...">
                            <span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>

</html>
