<div class="form-group {{ $errors->has('id_klasifikasi_arsip') ? 'has-error' : ''}}">
    {!! Form::label('id_klasifikasi_arsip', 'Id Klasifikasi Arsip', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_klasifikasi_arsip', null) !!}
        {!! Form::text('search_text_klasifikasi_arsip', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_klasifikasi_arsip')) !!}
        {!! $errors->first('id_klasifikasi_arsip', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_kegiatan') ? 'has-error' : ''}}">
    {!! Form::label('id_kegiatan', 'Id Kegiatan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_kegiatan', null) !!}
        {!! Form::text('search_text_kegiatan', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_kegiatan')) !!}
        {!! $errors->first('id_kegiatan', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nomor') ? 'has-error' : ''}}">
    {!! Form::label('nomor', 'Nomor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


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