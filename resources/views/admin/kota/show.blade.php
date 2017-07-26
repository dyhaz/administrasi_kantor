@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">Kotum {{ $kotum->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/admin/kota') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/kota/' . $kotum->id . '/edit') }}" title="Edit Kotum"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Kotum',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $kotum->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/kota', $kotum->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $kotum->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $kotum->id }}</td>
                            </tr>
                            <tr><th> Nama </th><td> {{ $kotum->nama }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
