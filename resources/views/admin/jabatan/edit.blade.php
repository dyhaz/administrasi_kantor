@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Edit Jabatan #{{ $jabatan->id }}</div>
                <div class="widget-content">
                    <a href="{{ url('/admin/jabatan') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
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

                    {!! Form::model($jabatan, [
                        'method' => 'PATCH',
                        'url' => ['/admin/jabatan', $jabatan->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('admin.jabatan.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection