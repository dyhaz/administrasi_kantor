@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">SuratKeluar {{ $suratkeluar->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/surat-keluar') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/surat-keluar/' . $suratkeluar->id . '/edit') }}" title="Edit SuratKeluar"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete SuratKeluar',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $suratkeluar->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['surat-keluar/suratkeluar', $suratkeluar->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $suratkeluar->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $suratkeluar->id }}</td>
                            </tr>
                            <tr>
                                <th> Nomor </th>
                                <td> {{ $suratkeluar->nomor }} </td>
                            </tr>
                            <tr>
                                <th> Masalah Surat </th>
                                <td> {{ @$kegiatansurat->klasifikasi_arsip->nama }} </td>
                            </tr>
                            <tr>
                                <th> Kegiatan Surat </th>
                                <td> {{ @$kegiatansurat->kegiatan->nama }} </td>
                            </tr>
                            <tr>
                                <th> Id Instansi </th>
                                <td> {{ @$suratkeluar->instansi->nama }} </td>
                            </tr>
                            <tr>
                                <th> Perihal </th>
                                <td> {{ $suratkeluar->perihal }} </td>
                            </tr>
                            <tr>
                                <th> Isi </th>
                                <td> <button onclick="window.location='/surat-keluar/pdf/{{ $suratkeluar->id }}'" class="btn btn-sm"><i class="icol-doc-pdf"></i> Download</button> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
