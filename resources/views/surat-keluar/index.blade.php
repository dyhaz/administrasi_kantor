@extends('layouts.master')

@section('content')
    @if(Auth::user()->hasAnyRole(['su', 'staf_subbag_tu', 'staf_seksi_pengujian_dan_pengendalian_mutu']))
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('/surat-keluar/create') }}" class="btn btn-success btn-sm" title="Add New SuratKeluar">
                    <i class="icon-plus" aria-hidden="true"></i> Add New
                </a>
            </div>
        </div>
        <br />
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Suratkeluar</div>
                <div class="widget-content">
                    {!! Form::open(['method' => 'GET', 'url' => '/surat-keluar', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>ID</th><th>Nomor</th><th>Instansi</th><th>Perihal</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suratkeluar as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nomor }}</td><td>{{ @$item->instansi->nama }}</td><td>{{ $item->perihal }}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                                <button onclick="window.location = '{{ url('/surat-keluar/' . $item->id) }}'" title="View SuratKeluar" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>
                                                @if(Auth::user()->hasAnyRole(['su', 'staf_subbag_tu', 'staf_seksi_pengujian_dan_pengendalian_mutu',]))
                                                    <button onclick="window.location = '{{ url('/surat-keluar/' . $item->id . '/edit') }}'" title="Edit SuratKeluar" class="btn btn-primary btn-xs"><i class="icon-edit" aria-hidden="true"></i> Edit</button>
                                                    {!! Form::button('<i class="icon-trash" aria-hidden="true"></i> Delete', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-xs',
                                                            'title' => 'Delete SuratKeluar',
                                                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-'.$item->id.'").submit() })'
                                                    )) !!}
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => ['/surat-keluar', $item->id],
                                                        'style' => 'display:inline',
                                                        'id' => 'delete-'.$item->id,
                                                    ]) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $suratkeluar->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
