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
                        'url' => ['disposisi/disposisi', $disposisi->id],
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
                            <tr><th> Nomor </th><td> {{ $disposisi->nomor }} </td></tr><tr><th> Id Surat Masuk </th><td> {{ $disposisi->id_surat_masuk }} </td></tr><tr><th> Keterangan </th><td> {{ $disposisi->keterangan }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
