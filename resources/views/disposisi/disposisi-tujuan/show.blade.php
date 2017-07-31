@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">DisposisiTujuan {{ $disposisitujuan->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/disposisi/disposisi-tujuan') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/disposisi/disposisi-tujuan/' . $disposisitujuan->id . '/edit') }}" title="Edit DisposisiTujuan"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete DisposisiTujuan',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $disposisitujuan->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['disposisi/disposisitujuan', $disposisitujuan->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $disposisitujuan->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $disposisitujuan->id }}</td>
                            </tr>
                            <tr><th> Id Disposisi </th><td> {{ $disposisitujuan->id_disposisi }} </td></tr><tr><th> Id Divisi </th><td> {{ $disposisitujuan->id_divisi }} </td></tr><tr><th> Id Jabatan </th><td> {{ $disposisitujuan->id_jabatan }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
