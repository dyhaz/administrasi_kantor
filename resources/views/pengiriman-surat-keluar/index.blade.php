@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Pengiriman Suratkeluar</div>
                <div class="widget-content">

                    {!! Form::open(['method' => 'GET', 'url' => '/surat-keluar/draft', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                <th>ID</th><th>Nomor</th><th>Tujuan</th><th>Perihal</th><th>Status</th><th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suratkeluar as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nomor }}</td><td>{{ @$item->instansi->nama }}</td><td>{{ $item->perihal }}</td><td>{!! $item->persetujuan()->where('id', $id_pegawai)->exists()?'Ter-acc ' . $jabatan:'<span class="text-danger"><strong>Belum di-acc</strong></span>' !!}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                                @if($item->status_kirim == '0' && $item->disetujui_ka_upt())<button onclick="window.location = '{{ url('/surat-keluar/kirim/' . $item->id ) }}'" title="Kirim SuratKeluar" class="btn btn-success btn-xs"><i class="icon-ok-sign" aria-hidden="true"></i> Kirim</button>@endif
                                                <button onclick="window.location = '{{ url('/surat-keluar/' . $item->id) }}'" title="View SuratKeluar" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>
                                                {!! Form::close() !!}
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
