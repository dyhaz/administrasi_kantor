@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Suratmasuk</div>
                <div class="widget-content">
                    @if(Auth::user()->hasAnyRole(['su', 'staf_subbag_tu']))
                    <a href="{{ url('/surat-masuk/create') }}" class="btn btn-success btn-sm" title="Add New SuratMasuk">
                        <i class="icon-plus" aria-hidden="true"></i> Add New
                    </a>
                    @endif

                    {!! Form::open(['method' => 'GET', 'url' => '/surat-masuk', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>ID</th><th>Nomor</th><th>Tanggal Terima</th><th>Nomor Naskah Dinas</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suratmasuk as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nomor }}</td><td>{{ date_format(date_create($item->tanggal_terima), 'd/m/Y') }}</td><td>{{ $item->nomor_naskah_dinas }}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                                <button onclick="window.location = '{{ url('/surat-masuk/' . $item->id) }}'" title="View SuratMasuk" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>
                                                @if(Auth::user()->hasAnyRole(['su', 'staf_subbag_tu']) && @$item->status != '2')
                                                    <button onclick="window.location = '{{ url('/surat-masuk/' . $item->id . '/edit') }}'" title="Edit SuratMasuk" class="btn btn-primary btn-xs"><i class="icon-edit" aria-hidden="true"></i> Edit</button>
                                                    {!! Form::button('<i class="icon-trash" aria-hidden="true"></i> Delete', array(
                                                                                                            'type' => 'submit',
                                                                                                            'class' => 'btn btn-danger btn-xs',
                                                                                                            'title' => 'Delete SuratMasuk',
                                                                                                            'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-'.$item->id.'").submit() })'
                                                                                                    )) !!}
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => ['/surat-masuk', $item->id],
                                                        'style' => 'display:inline',
                                                        'id' => 'delete-'.$item->id,
                                                    ]) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                                @if(@Auth::user()->hasAnyRole(['su', 'ka_upt']) && @$item->status != '2')
                                                    <button onclick="window.location = '{{ url('/disposisi/create?sm=' . $item->id) }}'" title="Edit SuratMasuk" class="btn btn-success btn-xs"><i class="icon-edit" aria-hidden="true"></i> Disposisi</button>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $suratmasuk->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
