@extends('layouts.login')

@section('content')
        <!-- Login Formular -->
<form class="form-vertical login-form" method="post">
    {{ csrf_field() }}
            <!-- Title -->
    <h3 class="form-title">Sign In to your Account</h3>

    <!-- Error Message -->
    <div class="alert fade in alert-danger" style="display: none;">
        <i class="icon-remove close" data-dismiss="alert"></i>
        Enter any username and password.
    </div>

    <!-- Input Fields -->
    <div class="form-group">
        <!--<label for="username">Username:</label>-->
        <div class="input-icon">
            <i class="icon-user"></i>
            <input type="text" name="email" class="form-control" placeholder="Email" autofocus="autofocus" data-rule-required="true" data-msg-required="Please enter your username." />
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
        <label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember me</label>
        <button type="submit" class="submit btn btn-primary pull-right">
            Sign In <i class="icon-angle-right"></i>
        </button>
    </div>
</form>
<!-- /Login Formular -->

<!-- Register Formular (hidden by default) -->
<form class="form-vertical register-form" method="post" style="display: none;">
    <!-- Title -->
    <h3 class="form-title">Sign Up for Free</h3>

    <!-- Input Fields -->
    <div class="form-group">
        <div class="input-icon">
            <i class="icon-user"></i>
            <input type="text" name="username" class="form-control" placeholder="Username" autofocus="autofocus" data-rule-required="true" />
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="input-icon">
            <i class="icon-lock"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" id="register_password" data-rule-required="true" />
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="input-icon">
            <i class="icon-ok"></i>
            <input type="password" name="password_confirm" class="form-control" placeholder="Confirm Password" data-rule-required="true" data-rule-equalTo="#register_password" />
        </div>
    </div>
    <div class="form-group">
        <div class="input-icon">
            <i class="icon-envelope"></i>
            <input type="text" name="Email" class="form-control" placeholder="Email address" data-rule-required="true" data-rule-email="true" />
        </div>
    </div>
    <div class="form-group spacing-top">
        <label class="checkbox"><input type="checkbox" class="uniform" name="remember" data-rule-required="true" data-msg-required="Please accept ToS first."> I agree to the <a href="javascript:void(0);">Terms of Service</a></label>
        <label for="remember" class="has-error help-block" generated="true" style="display:none;"></label>
    </div>
    <!-- /Input Fields -->

    <!-- Form Actions -->
    <div class="form-actions">
        <button type="button" class="back btn btn-default pull-left">
            <i class="icon-angle-left"></i> Back</i>
        </button>
        <button type="submit" class="submit btn btn-primary pull-right">
            Sign Up <i class="icon-angle-right"></i>
        </button>
    </div>
</form>
<!-- /Register Formular -->

@endsection