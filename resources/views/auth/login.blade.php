@extends('layouts.login')

@section('content')
        <!-- Login Formular -->
<form class="form-vertical login-form" method="post">
    {{ csrf_field() }}
            <!-- Title -->
    <h3 class="form-title">Masukkan email dan password</h3>

    @if($errors->has('email'))
    <!-- Error Message -->
    <div class="alert fade in alert-danger">
        <i class="icon-remove close" data-dismiss="alert"></i>
        {{ $errors->first('email') }}
    </div>
    @endif

    <!-- Input Fields -->
    <div class="form-group">
        <!--<label for="username">Username:</label>-->
        <div class="input-icon">
            <i class="icon-user"></i>
            <input type="text" name="email" class="form-control" placeholder="Email" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username." />
            @if ($errors->has('email'))
                <!--<span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>-->
            @endif
        </div>
    </div>
    <div class="form-group">
        <!--<label for="password">Password:</label>-->
        <div class="input-icon">
            <i class="icon-lock"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" data-rule-required="true" data-msg-required="Please enter your password." />
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <!-- /Input Fields -->

    <!-- Form Actions -->
    <div class="form-actions">
        <label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember me</label>
        <button type="submit" class="submit btn btn-primary pull-right">
            Login <i class="icon-angle-right"></i>
        </button>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a href="/forgot_password" class="pull-left" data-toggle="popover">Lupa Password</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="/register" class="pull-left" data-toggle="popover">Daftar Anggota</a>
        </div>
    </div>
</form>
<!-- /Login Formular -->
@endsection