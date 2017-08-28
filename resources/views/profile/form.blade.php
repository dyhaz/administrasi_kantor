<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    {!! Form::label('nama', 'Nama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    {!! Form::label('alamat', 'Alamat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
        {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_kota') ? 'has-error' : ''}}">
    {!! Form::label('id_kota', 'Kota', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_kota', null, ['id' => 'id_kota']) !!}
        {!! Form::text('search_text_kota', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_kota')) !!}
        {!! $errors->first('id_kota', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
    {!! Form::label('jenis_kelamin', 'Jenis Kelamin', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('jenis_kelamin', ['Laki-laki', 'Perempuan'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('jenis_kelamin', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('no_telp') ? 'has-error' : ''}}">
    {!! Form::label('no_telp', 'No Telp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('no_telp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('no_telp', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('tanggal_lahir', date('Y-m-d'), ['class' => 'form-control', 'data-mask' => "9999-99-99"]) !!}
        {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


@section('content')
    @parent
    <div id="kotaModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            @include("admin.modal", [
                "modal_title" => "Create Kota",
                "form_url" => "/admin/kota",
                "form_include" => "admin.kota.form",
            ])
        </div>
    </div>
@append


@section('js')
    @parent
    <script type="text/javascript">

        $("#search_text_kota").on("click", function () {
            $(this).select();
        });

        var url1 = "{{ route('searchKota') }}?term=%QUERY%";

        $('#search_text_kota').typeahead({
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
                window.open('/admin/kota/create', '_blank', 'toolbar=yes, location=yes, status=yes, menubar=yes, scrollbars=yes');
            } else {
                $('#id_kota').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
            }
        });

        @if(isset($pegawai))
            //$('#search_text_kota').val("{{ @$pegawai->kota->nama }}");
            //$('#search_text_jabatan').val("{{ @$pegawai->jabatan->nama }}");
            //$('#search_text_divisi').val("{{ @$pegawai->divisi->nama }}");
        @endif
    </script>
@append