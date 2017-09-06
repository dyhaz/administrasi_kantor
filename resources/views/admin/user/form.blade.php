<div class="form-group {{ $errors->has('id_pegawai') ? 'has-error' : ''}}">
    {!! Form::label('id_pegawai', 'Pegawai', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_pegawai', null) !!}
        {!! Form::text('search_text', null, ['class' => 'form-control', 'placeholder' => 'Search Text', 'id' => 'search_text']) !!}
        {!! $errors->first('id_pegawai', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_role') ? 'has-error' : ''}}">
    {!! Form::label('id_role', 'Role', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_role', $roles, null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_role', '<p class="help-block">:message</p>') !!}
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

        $("#search_text").on("click", function () {
            $(this).select();
        });

        var url = "{{ route('searchPegawai') }}?term=%QUERY%";

        $('#search_text').typeahead({
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
            $('#id_pegawai').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
        });

        @if(isset($pegawai))
            $('#id_pegawai').val("{{ @$pegawai->id }}");
            $('#search_text').val("{{ @$pegawai->nama }}");
            $('#id_role').val({{ @$user_role->id }});
        @endif
    </script>
@append