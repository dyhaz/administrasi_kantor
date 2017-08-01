@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">KegiatanSurat {{ $kegiatansurat->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/admin/kegiatan-surat') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/kegiatan-surat/' . $kegiatansurat->id . '/edit') }}" title="Edit KegiatanSurat"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete KegiatanSurat',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $kegiatansurat->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['surat-keluar/kegiatansurat', $kegiatansurat->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $kegiatansurat->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $kegiatansurat->id }}</td>
                            </tr>
                            <tr>
                                <th> Klasifikasi Arsip </th>
                                <td> {{ @$kegiatansurat->klasifikasi_arsip->nama }} </td>
                            </tr>
                            <tr>
                                <th> Kegiatan </th>
                                <td> {{ @$kegiatansurat->kegiatan->nama }} </td>
                            </tr>
                            <tr>
                                <th> Nomor </th>
                                <td> {{ @$kegiatansurat->nomor }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
