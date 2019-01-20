@extends('layouts.app')

@section('content')
    <script type="text/javascript" src="/theme/assets/js/libs/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/theme/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
    <!-- jQuery UI -->
    <link href="/theme/plugins/jquery-ui/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/theme/plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
    <![endif]-->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Register</h4></div>
                    {{--<div class="widget-header">Register</div>--}}
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
                                {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('jenis_kelamin', ['Laki-laki', 'Perempuan'], null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('no_telp') ? 'has-error' : ''}}">
                                {!! Form::label('no_telp', 'No Telp', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('no_telp', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('no_telp', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : ''}}">
                                {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::text('tanggal_lahir', null, ['class' => 'form-control datepicker']) !!}
                                    {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
                                {!! Form::label('alamat', 'Alamat', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => 2]) !!}
                                    {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('id_divisi') ? 'has-error' : ''}}">
                                {!! Form::label('id_divisi', 'Divisi', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('id_divisi', $list_divisi, null, array('class' => 'form-control')) !!}
                                    {!! $errors->first('id_divisi', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('id_jabatan') ? 'has-error' : ''}}">
                                {!! Form::label('id_jabatan', 'Id Jabatan', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('id_jabatan', $list_jabatan, null, array('class' => 'form-control')) !!}
                                    {!! $errors->first('id_jabatan', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('id_kota') ? 'has-error' : ''}}">
                                {!! Form::label('id_kota', 'Kota', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::select('id_kota', $list_kota, null, array('class' => 'form-control')) !!}
                                    {!! $errors->first('id_kota', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var date = new Date("{{ date('Y-m-d') }}");
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();
        var maxDate = new Date(currentYear, currentMonth, currentDate);

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: maxDate
        });
    </script>
@endsection