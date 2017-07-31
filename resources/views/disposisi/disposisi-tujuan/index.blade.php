@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Disposisitujuan</div>
                <div class="widget-content">
                    <a href="{{ url('/disposisi/disposisi-tujuan/create') }}" class="btn btn-success btn-sm" title="Add New DisposisiTujuan">
                        <i class="icon-plus" aria-hidden="true"></i> Add New
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => '/disposisi/disposisi-tujuan', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>ID</th><th>Id Disposisi</th><th>Id Divisi</th><th>Id Jabatan</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($disposisitujuan as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->id_disposisi }}</td><td>{{ $item->id_divisi }}</td><td>{{ $item->id_jabatan }}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                                <button onclick="window.location = '{{ url('/disposisi/disposisi-tujuan/' . $item->id) }}'" title="View DisposisiTujuan" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>
                                                <button onclick="window.location = '{{ url('/disposisi/disposisi-tujuan/' . $item->id . '/edit') }}'" title="Edit DisposisiTujuan" class="btn btn-primary btn-xs"><i class="icon-edit" aria-hidden="true"></i> Edit</button>
                                                {!! Form::button('<i class="icon-trash" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete DisposisiTujuan',
                                                        'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-'.$item->id.'").submit() })'
                                                )) !!}
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/disposisi/disposisi-tujuan', $item->id],
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
                        <div class="pagination-wrapper"> {!! $disposisitujuan->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
