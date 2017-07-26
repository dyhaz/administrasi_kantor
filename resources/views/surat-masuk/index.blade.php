@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Suratmasuk</div>
                <div class="widget-content">
                    <a href="{{ url('/surat-masuk/create') }}" class="btn btn-success btn-sm" title="Add New SuratMasuk">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    {!! Form::open(['method' => 'GET', 'url' => 'surat-masuk', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
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
                                    <td>{{ $item->nomor }}</td><td>{{ $item->tanggal_terima }}</td><td>{{ $item->nomor_naskah_dinas }}</td>
                                    <td>
                                        <a href="{{ url('/surat-masuk/' . $item->id) }}" title="View SuratMasuk"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        <a href="{{ url('/surat-masuk/' . $item->id . '/edit') }}" title="Edit SuratMasuk"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        {!! Form::open([
                                            'method'=>'DELETE',
                                            'url' => ['/surat-masuk', $item->id],
                                            'style' => 'display:inline'
                                        ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Delete SuratMasuk',
                                                'onclick'=>'return confirm("Confirm delete?")'
                                        )) !!}
                                        {!! Form::close() !!}
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
