@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">KlasifikasiArsip {{ $klasifikasiarsip->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/admin/klasifikasi-arsip') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/klasifikasi-arsip/' . $klasifikasiarsip->id . '/edit') }}" title="Edit KlasifikasiArsip"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete KlasifikasiArsip',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $klasifikasiarsip->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['admin/klasifikasi-arsip', $klasifikasiarsip->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $klasifikasiarsip->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $klasifikasiarsip->id }}</td>
                            </tr>
                            <tr><th> Nomor </th><td> {{ $klasifikasiarsip->nomor }} </td></tr><tr><th> Nama </th><td> {{ $klasifikasiarsip->nama }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
