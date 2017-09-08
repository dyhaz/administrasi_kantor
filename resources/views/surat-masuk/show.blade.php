@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">SuratMasuk {{ $suratmasuk->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/surat-masuk') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/surat-masuk/' . $suratmasuk->id . '/edit') }}" title="Edit SuratMasuk"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete SuratMasuk',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $suratmasuk->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['surat-masuk', $suratmasuk->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $suratmasuk->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $suratmasuk->id }}</td>
                            </tr>
                            <tr>
                                <th> Nomor </th><td> {{ $suratmasuk->nomor }} </td>
                            </tr>
                            <tr>
                                <th> Tanggal Terima </th><td> {{ $suratmasuk->tanggal_terima }} </td>
                            </tr>
                            <tr>
                                <th> Nomor Naskah Dinas </th><td> {{ $suratmasuk->nomor_naskah_dinas }} </td>
                            </tr>
                            <tr>
                                <th> Sifat </th><td> {{ @$suratmasuk->sifat_surat->nama }} </td>
                            </tr>
                            <tr>
                                <th> Perihal </th><td> {{ $suratmasuk->perihal }} </td>
                            </tr>
                            <tr>
                                <th> Isi Ringkas </th><td> {{ $suratmasuk->isi_ringkas }} </td>
                            </tr>
                            <tr>
                                <th> Instansi </th><td> {{ @$suratmasuk->instansi->nama }} </td>
                            </tr>
                            <tr>
                                <th> Status </th><td> {{ $suratmasuk->__status() }} </td>
                            </tr>
                            <tr>
                                <th> File Surat </th><td> <button class="btn btn-primary btn-sm" onclick="window.location='{{ route('file', ['id' => $suratmasuk->id]) }}'"><i class="icon-download"></i> Download</button> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
