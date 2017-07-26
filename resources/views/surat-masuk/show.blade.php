@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="widget box">
                    <div class="widget-header">SuratMasuk {{ $suratmasuk->id }}</div>
                    <div class="widget-content">

                        <a href="{{ url('/surat-masuk') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/surat-masuk/' . $suratmasuk->id . '/edit') }}" title="Edit SuratMasuk"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['surat_masuk/suratmasuk', $suratmasuk->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete SuratMasuk',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $suratmasuk->id }}</td>
                                    </tr>
                                    <tr><th> Nomor </th><td> {{ $suratmasuk->nomor }} </td></tr><tr><th> Tanggal Terima </th><td> {{ $suratmasuk->tanggal_terima }} </td></tr><tr><th> Nomor Naskah Dinas </th><td> {{ $suratmasuk->nomor_naskah_dinas }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
