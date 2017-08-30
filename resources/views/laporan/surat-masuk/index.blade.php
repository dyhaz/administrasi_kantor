@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cetak Laporan</div>
                <div class="panel-body">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger fade in">
                                <i class="icon-remove close" data-dismiss="alert"></i>
                                <strong>Error!</strong> {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    {!! Form::open(['url' => '/laporan/surat-masuk/pdf', 'class' => 'form-horizontal', 'files' => true, 'method' => 'GET']) !!}

                    @include ('laporan.surat-masuk.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
