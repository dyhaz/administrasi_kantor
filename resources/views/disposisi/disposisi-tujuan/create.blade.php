@extends('layouts.master')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New DisposisiTujuan</div>
                    <div class="panel-body">
                        <a href="{{ url('/disposisi/disposisi-tujuan') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger fade in">
                                    <i class="icon-remove close" data-dismiss="alert"></i>
                                    <strong>Error!</strong> {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        {!! Form::open(['url' => '/disposisi/disposisi-tujuan', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('disposisi.disposisi-tujuan.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection
