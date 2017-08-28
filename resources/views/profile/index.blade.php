@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <li class="list-group-item no-padding" id="fileUpdate">
                    <img src="{{ Auth::user()->pegawai->foto?'storage/'.Auth::user()->pegawai->foto:"images/camera-icon.png" }}" alt="">
                </li>
                <a href="javascript:void(0);" class="list-group-item">Projects</a>
                <a href="javascript:void(0);" class="list-group-item">Messages</a>
                <a href="javascript:void(0);" class="list-group-item"><span class="badge">3</span>Friends</a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#profilModal" class="list-group-item"><i class="icon-pencil"></i> Edit Profile</a>
            </div>
        </div>

        <div class="col-md-9">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger fade in">
                        <i class="icon-remove close" data-dismiss="alert"></i>
                        <strong>Error!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="row profile-info">
                <div class="col-md-12">
                    <h1>{{ Auth::user()->pegawai->nama }} - {{ Auth::user()->pegawai->nip }}</h1>

                    <dl class="dl-horizontal">
                        <dt>Alamat</dt>
                        <dd>{{ Auth::user()->pegawai->alamat }}</dd>

                        @if(@Auth::user()->pegawai->divisi->nama)
                            <dt>Divisi</dt>
                            <dd>{{ Auth::user()->pegawai->divisi->nama }}</dd>
                        @endif

                        @if(@Auth::user()->pegawai->jabatan->nama)
                            <dt>Jabatan</dt>
                            <dd>{{ Auth::user()->pegawai->jabatan->nama }}</dd>
                        @endif

                        <dt>Jenis Kelamin</dt>
                        <dd>{{ Auth::user()->pegawai->__jenis_kelamin() }}</dd>

                        <dt>Nomor Telepon</dt>
                        <dd>{{ Auth::user()->pegawai->no_telp }}</dd>

                        <dt>Email</dt>
                        <dd>{{ Auth::user()->email }}</dd>

                        <dt>Tanggal Lahir</dt>
                        <dd>{{ date_format(date_create(Auth::user()->pegawai->tanggal_lahir), 'd/m/Y') }}</dd>
                    </dl>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet dolore magna aliquam tincidunt erat volutpat laoreet dolore magna aliquam tincidunt erat volutpat.</p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.col-md-9 -->
    </div>

    <div id="profilModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            @include("admin.modal", [
                "modal_title" => "Edit Profile",
                "form_url" => "/profile/edit",
                "form_include" => "profile.form",
            ])
        </div>
    </div>

    {!! Form::open(['url' => route('upload_photo'), 'class' => 'form-horizontal', 'files' => true,]) !!}
    {!! Form::file('file', null, ['class' => 'form-control', 'style' => 'display: none', 'id' => 'file']) !!}
    {!! Form::close() !!}
    <script>
        $('#fileUpdate').on("click", function() {
            $('input[type="file"]').click();
            /*$(this).next('input[type="file"]').change( function(){
                fileName = $(this).val().replace(/C:\\fakepath\\/i, '')
                $('#fileName').text(fileName).animate({
                    marginTop: '13px'
                });
            });*/
        });

        var fileInput = $('input[type="file"]');

        fileInput.attr('style', 'display: none');

        fileInput.change(function() {
            $('form[action="{{ route('upload_photo') }}"]').submit();
        });
    </script>
@endsection