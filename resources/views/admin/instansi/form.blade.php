<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    {!! Form::label('nama', 'Nama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_kota') ? 'has-error' : ''}}">
    {!! Form::label('id_kota', 'Id Kota', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_kota', null) !!}
        {!! Form::hidden('nama_kota', null) !!}
        {!! Form::text('search_text_kota', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_kota')) !!}
        {!! $errors->first('id_kota', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('no_telp') ? 'has-error' : ''}}">
    {!! Form::label('no_telp', 'No Telp', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('no_telp', null, ['class' => 'form-control']) !!}
        {!! $errors->first('no_telp', '<p class="help-block">:message</p>') !!}
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

        $("#search_text_kota").on("click", function () {
            $(this).select();
        });

        var url = "{{ route('searchKota') }}?term=%QUERY%";

        $('#search_text_kota').typeahead({
            remote:  {
                url: url,
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
                $('#nama_kota').val(datum.value);
            }
        });

        @if(isset($instansi))
            $('#search_text_kota').val("{{ @$instansi->kota->nama }}");
            $('#nama_kota').val("{{ @$instansi->kota->nama }}");
        @endif
    </script>
@append