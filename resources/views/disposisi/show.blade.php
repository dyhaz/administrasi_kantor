@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">Disposisi {{ $disposisi->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/disposisi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/disposisi/' . $disposisi->id . '/edit') }}" title="Edit Disposisi"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Disposisi',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $disposisi->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['disposisi', $disposisi->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $disposisi->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $disposisi->id }}</td>
                            </tr>
                            <tr>
                                <th> Nomor </th>
                                <td> {{ $disposisi->nomor }} </td>
                            </tr>
                            <tr>
                                <th> Nomor Surat Masuk </th>
                                <td> {{ @$disposisi->surat_masuk->nomor }} </td>
                            </tr>
                            <tr>
                                <th> Isi Disposisi </th>
                                <td>
                                    {{ $disposisi->__isi_disposisi() }}
                                </td>
                            </tr>
                            <tr>
                                <th> Status </th>
                                <td>
                                    {{ $disposisi->__status() }}
                                </td>
                            </tr>
                            <tr>
                                <th> Keterangan </th>
                                <td> {{ $disposisi->keterangan }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">Tujuan Disposisi</div>
                <div class="widget-content">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    <script type="text/javascript" src="/theme/plugins/nprogress/nprogress.js"></script>
    {!! $dataTable->scripts() !!}
@append