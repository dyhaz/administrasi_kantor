@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ubah Password</div>
                <div class="panel-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger fade in">
                                <i class="icon-remove close" data-dismiss="alert"></i>
                                <strong>Error!</strong> {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    {!! Form::open(['url' => '/password/ubah', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                        {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','id'=>'password')) !!}
                            {!! $errors->first('id_klasifikasi_arsip', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div><div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                        {!! Form::label('password_confirmation', 'Konfirmasi Password', ['class' => 'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            {!! Form::password('password_confirmation', array('placeholder' => 'Password Confirmation','class' => 'form-control','id'=>'password_confirmation')) !!}
                            {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-4">
                            {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Proses', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript">

        $("#search_text_klasifikasi_arsip").on("click", function () {
            $(this).select();
        });

        $("#search_text_kegiatan").on("click", function () {
            $(this).select();
        });

        /*$("#search_text").blur(function() {
         $('#search_text').val($('#nama_instansi').val());
         });*/

        var url1 = "{{ route('searchKlasifikasiArsip') }}?term=%QUERY%";
        var url2 = "{{ route('searchKegiatan') }}?term=%QUERY%";

        $('#search_text_klasifikasi_arsip').typeahead({
            remote:  {
                url: url1,
                filter: function (data) {
                    // Map the remote source JSON array to a JavaScript object array
                    return $.map(data, function (data) {
                        return {
                            value: data.value,
                            id: data.id
                        };
                    });
                },
                ajax:{
                    type:"GET",
                    cache:false,
                    data:{
                        limit:10
                    },
                    complete:function(jqXHR,textStatus){
                        alert('OK!');
                    }
                }
            }
        }).on('typeahead:selected',function(evt,datum){
            console.log(datum);
            $('#id_klasifikasi_arsip').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
        });

        $('#search_text_kegiatan').typeahead({
            remote:  {
                url: url2,
                filter: function (data) {
                    // Map the remote source JSON array to a JavaScript object array
                    return $.map(data, function (data) {
                        return {
                            value: data.value,
                            id: data.id
                        };
                    });
                },
                ajax:{
                    type:"GET",
                    cache:false,
                    data:{
                        limit:10
                    },
                    complete:function(jqXHR,textStatus){
                        alert('OK!');
                    }
                }
            }
        }).on('typeahead:selected',function(evt,datum){
            console.log(datum);
            $('#id_kegiatan').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
        });


        @if(isset($kegiatansurat))
            $('#search_text_klasifikasi_arsip').val("{{ @$kegiatansurat->klasifikasi_arsip->nama }}");
        $('#search_text_kegiatan').val("{{ @$kegiatansurat->kegiatan->nama }}");
        @endif
    </script>
@append