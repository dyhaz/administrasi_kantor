@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">Jabatan {{ $jabatan->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/admin/jabatan') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/jabatan/' . $jabatan->id . '/edit') }}" title="Edit Jabatan"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete Jabatan',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $jabatan->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/jabatan', $jabatan->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $jabatan->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $jabatan->id }}</td>
                            </tr>
                            <tr><th> Nama </th><td> {{ $jabatan->nama }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection