<div class="form-group {{ $errors->has('nomor') ? 'has-error' : ''}}">
    {!! Form::label('nomor', 'Nomor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_kegiatan_surat') ? 'has-error' : ''}}">
    {!! Form::label('id_kegiatan_surat', 'Klasifikasi Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_kegiatan_surat', null) !!}
        {!! Form::text('search_text_kegiatan_surat', null, ['class' => 'form-control', 'placeholder' => 'Searh Text', 'id' => 'search_text_kegiatan_surat']) !!}
        {!! $errors->first('id_kegiatan_surat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_instansi') ? 'has-error' : ''}}">
    {!! Form::label('id_instansi', 'Pengirim Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_instansi', null) !!}
        {!! Form::hidden('nama_instansi', null, ['id' => 'nama_instansi']) !!}
        <div class="input-group">
            {!! Form::text('search_text', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text')) !!}
            <span class="input-group-btn">
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#instansiModal"><i class="icon-plus"></i></button>
            </span>
        </div>
        {!! $errors->first('id_instansi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('perihal') ? 'has-error' : ''}}">
    {!! Form::label('perihal', 'Perihal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('perihal', null, ['class' => 'form-control']) !!}
        {!! $errors->first('perihal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_sifat') ? 'has-error' : ''}}">
    {!! Form::label('id_sifat', 'Id Sifat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_sifat', $sifatsurat, null, ['id' => 'id_sifat', 'class' => 'form-control']) !!}
        {!! $errors->first('id_sifat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('isi') ? 'has-error' : ''}}">
    {!! Form::label('isi', 'Isi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('isi', null, ['class' => 'form-control wysiwyg', 'rows' => '5' ]) !!}
        {!! $errors->first('isi', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::hidden('id_pegawai', '1', ['class' => 'form-control']) !!}
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@section('content')
    @parent
    <div id="instansiModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            @include("admin.modal", [
                "modal_title" => "Create Instansi",
                "form_url" => "/admin/instansi",
                "form_include" => "admin.instansi.form",
            ])
        </div>
    </div>
@append

@section('js')
    @parent
    <script type="text/javascript">

        $("#search_text").on("click", function () {
            $(this).select();
        });

        $("#search_text_kegiatan_surat").on("click", function () {
            $(this).select();
        });

        /*$("#search_text").blur(function() {
         $('#search_text').val($('#nama_instansi').val());
         });*/

        var url1 = "{{ route('searchInstansi') }}?term=%QUERY%";
        var url2 = "{{ route('searchKegiatanSurat') }}?term=%QUERY%";

        $('#search_text').typeahead({
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
            if(datum.id == 0) {
                window.open('/admin/instansi/create', '_blank', 'toolbar=yes, location=yes, status=yes, menubar=yes, scrollbars=yes');
            } else {
                $('#id_instansi').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
                $('#nama_instansi').val(datum.value);
            }
        });

        $('#search_text_kegiatan_surat').typeahead({
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
            $('#id_kegiatan_surat').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value

        });

        @if(isset($suratkeluar))
            $('#search_text').val("{{ @$suratkeluar->instansi->nama }}");
            $('#nama_instansi').val("{{ @$suratkeluar->instansi->nama }}");
            $('#search_text').val("{{ @$suratkeluar->kegiatan_surat->nomor }}");
        @endif
    </script>
@append