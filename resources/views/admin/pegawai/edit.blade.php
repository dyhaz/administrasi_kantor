@extends('layouts.master')

@section('content')
        <div class="row">

            <div class="col-md-12">
                <div class="widget box">
                    <div class="widget-header">Edit Pegawai #{{ $pegawai->id }}</div>
                    <div class="widget-content">
                        <a href="{{ url('/admin/pegawai') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($pegawai, [
                            'method' => 'PATCH',
                            'url' => ['/admin/pegawai', $pegawai->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.pegawai.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
@endsection
