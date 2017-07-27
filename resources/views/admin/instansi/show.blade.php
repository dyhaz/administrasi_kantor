@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">Instansi {{ $instansi->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/admin/instansi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/instansi/' . $instansi->id . '/edit') }}" title="Edit Instansi"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Instansi',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $instansi->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/instansi', $instansi->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $instansi->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $instansi->id }}</td>
                            </tr>
                            <tr><th> Nama </th><td> {{ $instansi->nama }} </td></tr><tr><th> Kota </th><td> {{ $instansi->kota->nama }} </td></tr><tr><th> No Telp </th><td> {{ $instansi->no_telp }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
