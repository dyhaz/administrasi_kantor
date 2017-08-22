@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Klasifikasiarsip</div>
                <div class="widget-content">
                    <a href="{{ url('/admin/klasifikasi-arsip/create') }}" class="btn btn-success btn-sm" title="Add New KlasifikasiArsip">
                        <i class="icon-plus" aria-hidden="true"></i> Add New
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/admin/klasifikasi-arsip', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="icon-search"></i>
                                </button>
                            </span>
                    </div>
                    {!! Form::close() !!}

                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>ID</th><th>Nomor</th><th>Nama</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($klasifikasiarsip as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nomor }}</td><td>{{ $item->nama }}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                                <!--<button onclick="window.location = '{{ url('/admin/klasifikasi-arsip/' . $item->id) }}'" title="View KlasifikasiArsip" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>-->
                                                <button onclick="window.location = '{{ url('/admin/klasifikasi-arsip/' . $item->id . '/edit') }}'" title="Edit KlasifikasiArsip" class="btn btn-primary btn-xs"><i class="icon-edit" aria-hidden="true"></i> Edit</button>
                                                {!! Form::button('<i class="icon-trash" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete KlasifikasiArsip',
                                                        'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-'.$item->id.'").submit() })'
                                                )) !!}
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/admin/klasifikasi-arsip', $item->id],
                                                    'style' => 'display:inline',
                                                    'id' => 'delete-'.$item->id,
                                                ]) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $klasifikasiarsip->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection