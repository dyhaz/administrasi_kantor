@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Persetujuan Suratkeluar</div>
                <div class="widget-content">

                    {!! Form::open(['method' => 'GET', 'url' => '/persetujuan-surat-keluar', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                        <table class="table table-borderless table-responsive">
                            @if(Auth::user()->hasAnyRole(['staf_seksi_pengujian_dan_pengendalian_mutu', 'staf_subbag_tu']))
                                <thead>
                                <tr>
                                    <th>ID</th><th>Nomor</th><th>Tujuan</th><th>Perihal</th><th>Seksi Pengujian</th><th>Seksi Pengendalian Mutu</th><th>Subbag TU</th><th>UPT</th><th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($suratkeluar as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nomor }}</td><td>{{ @$item->instansi->nama }}</td><td>{{ $item->perihal }}</td><td>{!! $item->disetujui_kasie_pengujian()?'<img width=26 height=26 src="/images/ok-icon-small.png"></img>':'<img width=26 height=26 src="/images/cross-icon-small.png"></img>' !!}</td><td>{!! $item->disetujui_kasie_pengendalian_mutu()?'<img width=26 height=26 src="/images/ok-icon-small.png"></img>':'<img width=26 height=26 src="/images/cross-icon-small.png"></img>' !!}</td><td>{!! $item->disetujui_ka_subbag_tu()?'<img width=26 height=26 src="/images/ok-icon-small.png"></img>':'<img width=26 height=26 src="/images/cross-icon-small.png"></img>' !!}</td><td>{!! $item->disetujui_ka_upt()?'<img width=26 height=26 src="/images/ok-icon-small.png"></img>':'<img width=26 height=26 src="/images/cross-icon-small.png"></img>' !!}</td>
                                        <td>
                                            <div class="btn-toolbar">
                                                <div class="btn-group">
                                                    @if($item->status_kirim == '0' && $item->disetujui_ka_upt())<button onclick="window.location = '{{ url('/surat-keluar/kirim/' . $item->id ) }}'" title="Kirim SuratKeluar" class="btn btn-success btn-xs"><i class="icon-ok-sign" aria-hidden="true"></i> Kirim</button>@else<button class="btn btn-success btn-xs disabled"><i class="icon-ok-sign" aria-hidden="true"></i> Kirim</button>@endif
                                                    <button onclick="window.location = '{{ url('/surat-keluar/' . $item->id) }}'" title="View SuratKeluar" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @else
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
                                                    <button onclick="window.location = '{{ url('/surat-keluar/' . $item->id) }}'" title="View SuratKeluar" class="btn btn-info btn-xs"><i class="icon-eye-open" aria-hidden="true"></i> View</button>
                                                    <button onclick="window.location = '{{ url('/persetujuan-surat-keluar/' . $item->id ) }}'" title="Edit SuratKeluar" class="btn btn-primary btn-xs"><i class="icon-edit" aria-hidden="true"></i> Edit</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            @endif

                        </table>
                        <div class="pagination-wrapper"> {!! $suratkeluar->appends(['search' => Request::get('search')])->render() !!} </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
