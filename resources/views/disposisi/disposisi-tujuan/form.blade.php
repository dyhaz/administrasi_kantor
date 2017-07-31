<div class="form-group {{ $errors->has('id_disposisi') ? 'has-error' : ''}}">
    {!! Form::label('id_disposisi', 'Id Disposisi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_disposisi', null) !!}
        {!! Form::text('nomor_disposisi', null, array('class' => 'form-control', 'disabled' => 'disabled')) !!}
        {!! $errors->first('id_disposisi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_divisi') ? 'has-error' : ''}}">
    {!! Form::label('id_divisi', 'Id Divisi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_divisi', null) !!}
        {!! Form::text('search_text_divisi', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_divisi')) !!}
        {!! $errors->first('id_divisi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_jabatan') ? 'has-error' : ''}}">
    {!! Form::label('id_jabatan', 'Id Jabatan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_jabatan', null) !!}
        {!! Form::text('search_text_jabatan', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_jabatan')) !!}
        {!! $errors->first('id_jabatan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@section('js')
    @parent
    <script>
        $("#search_text_divisi").on("click", function () {
            $(this).select();
        });

        $("#search_text_jabatan").on("click", function () {
            $(this).select();
        });

        var url1 = "{{ route('searchDivisi') }}?term=%QUERY%";
        var url2 = "{{ route('searchJabatan') }}?term=%QUERY%";

        $('#search_text_divisi').typeahead({
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
            $('#id_divisi').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
        });

        $('#search_text_jabatan').typeahead({
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
            $('#id_jabatan').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
        });
    </script>
@append
