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
            <input type="text" name="email" autocomplete="off" class="form-control" placeholder="Email" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username." />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
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
        <div class="row">
            <div class="col-md-8">
                <div class="row"  style="height: 32px; display:flex; align-items: center">
                    <div class="col-md-5" style="padding-right: 0px;width: inherit">
                        <a href="/password/reset" class="pull-left" data-toggle="popover">Lupa Password</a>
                    </div>
                    <div class="col-sm-1" style="padding-left: 0px; padding-right: 0px;width: inherit">
                        |
                    </div>
                    <div class="col-md-5" style="padding-left: 0px">
                        <a href="/register" class="pull-left" data-toggle="popover">Daftar Anggota</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="submit btn btn-primary pull-right">
                    Login <i class="icon-angle-right"></i>
                </button>
            </div>
        </div>
        {{--<label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember me</label>--}}

    </div>
</form>
<!-- /Login Formular -->
@endsection