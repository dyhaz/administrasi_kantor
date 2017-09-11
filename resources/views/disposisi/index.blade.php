@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Disposisi</div>
                <div class="widget-content">
                    @if(Auth::user()->hasAnyRole(['su', 'ka_upt']))
                    <a data-toggle="modal" data-target="#suratMasukModal" href="#" class="btn btn-success btn-sm" title="Add New Disposisi">
                        <i class="icon-plus" aria-hidden="true"></i> Add New
                    </a>
                    @endif

                    {!! Form::open(['method' => 'GET', 'url' => '/disposisi', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>ID</th><th>Nomor</th><th>No. Surat Masuk</th><th>Keterangan</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($disposisi as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nomor }}</td><td>{{ @$item->surat_masuk->nomor }}</td><td>{{ $item->keterangan }}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                                <button onclick="window.location = '{{ url('/disposisi/' . $item->id) }}'" title="View Disposisi" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>
                                                <!--<button onclick="window.location = '{{ url('/disposisi/' . $item->id . '/edit') }}'" title="Edit Disposisi" class="btn btn-primary btn-xs"><i class="icon-edit" aria-hidden="true"></i> Edit</button>-->
                                                @if(Auth::user()->hasAnyRole(['su', 'ka_upt']) && @$item->surat_masuk->status != '2')
                                                <button title="Edit Disposisi" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-edit"></i> Edit
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a style="cursor: pointer" onclick="window.location = '{{ url('/disposisi/' . $item->id . '/edit') }}'">Edit</a></li>
                                                    <li><a style="cursor: pointer" onclick="window.location = '{{ url('/disposisi-tujuan/' . $item->id) }}'">Input Disposisi Tujuan</a></li>
                                                </ul>
                                                {!! Form::button('<i class="icon-trash" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Disposisi',
                                                        'onclick'=>'bootbox.confirm("Confirm delete?", function(result){ if(result) $("#delete-'.$item->id.'").submit() })'
                                                )) !!}
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/disposisi', $item->id],
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
                        <div class="pagination-wrapper"> {!! $disposisi->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div id="suratMasukModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            @include("disposisi.modal_tabel_surat_masuk", [
                "suratmasuk" => $suratmasuk,
            ])
        </div>
    </div>
@endsection