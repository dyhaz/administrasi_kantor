<div class="form-group {{ $errors->has('nip') ? 'has-error' : ''}}">
    {!! Form::label('nip', 'Nip', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nip', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nip', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
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
        <div class="input-group">
            {!! Form::text('search_text_kota', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_kota')) !!}
            <span class="input-group-btn">
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#kotaModal"><i class="icon-plus"></i></button>
            </span>
        </div>
        {!! $errors->first('id_kota', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_divisi') ? 'has-error' : ''}}">
    {!! Form::label('id_divisi', 'Id Divisi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_divisi', null, ['id' => 'id_divisi']) !!}
        {!! Form::text('search_text_divisi', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_divisi')) !!}
        {!! $errors->first('id_divisi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_jabatan') ? 'has-error' : ''}}">
    {!! Form::label('id_jabatan', 'Id Jabatan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_jabatan', null, ['id' => 'id_jabatan']) !!}
        {!! Form::text('search_text_jabatan', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_jabatan')) !!}
        {!! $errors->first('id_jabatan', '<p class="help-block">:message</p>') !!}
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
        {!! Form::text('tanggal_lahir', null, ['class' => 'form-control datepicker']) !!}
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
        var date = new Date("{{ date('Y-m-d') }}");
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();
        var maxDate = new Date(currentYear, currentMonth, currentDate);

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: maxDate
        });

        $("#search_text_kota").on("click", function () {
            $(this).select();
        });

        $("#search_text_divisi").on("click", function () {
            $(this).select();
        });

        $("#search_text_jabatan").on("click", function () {
            $(this).select();
        });

        /*$("#search_text_kota").blur(function() {
         $('#search_text_kota').val($('#nama_instansi').val());
         });*/

        var url1 = "{{ route('searchKota') }}?term=%QUERY%";
        var url2 = "{{ route('searchDivisi') }}?term=%QUERY%";
        var url3 = "{{ route('searchJabatan') }}?term=%QUERY%";

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

        $('#search_text_divisi').typeahead({
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
            $('#id_divisi').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
        });
        $('#search_text_jabatan').typeahead({
            remote:  {
                url: url3,
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
            $('#id_jabatan').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
        });

        @if(isset($pegawai))
            $('#search_text_kota').val("{{ @$pegawai->kota->nama }}");
            $('#search_text_jabatan').val("{{ @$pegawai->jabatan->nama }}");
            $('#search_text_divisi').val("{{ @$pegawai->divisi->nama }}");
        @endif
    </script>
@append