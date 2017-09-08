@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="widget body">
                <div class="widget-header">IsiDisposisi {{ $isidisposisi->id }}</div>
                <div class="widget-content">

                    <a href="{{ url('/disposisi/isi-disposisi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/disposisi/isi-disposisi/' . $isidisposisi->id . '/edit') }}" title="Edit IsiDisposisi"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Delete IsiDisposisi',
                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-' . $isidisposisi->id . '").submit() })'
                    ))!!}
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['disposisi/isi-disposisi', $isidisposisi->id],
                        'style' => 'display:inline',
                        'id' => 'delete-' . $isidisposisi->id
                    ]) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>ID</th><td>{{ $isidisposisi->id }}</td>
                            </tr>
                            <tr><th> Isi </th><td> {{ $isidisposisi->isi }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
