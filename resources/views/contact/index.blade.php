@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="panel">
            <div class="panel-body">
                <div class="col-lg-12">
                    {!! Form::open(['url' => 'contact', 'method' => 'post', 'role' => 'form']) !!}
                    <div class="row">
                        {!! Form::control('text', 12, 'name', $errors, 'Nama') !!}
                        {!! Form::control('email', 12, 'email', $errors, 'Email') !!}
                        {!! Form::control('textarea', 12, 'message', $errors, 'Pesan') !!}
                        <div class="col-lg-12">
                            {!! Form::submit('Kirim', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection