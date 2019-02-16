{{ Form::selectbox('id_pegawai', null, ['endpointUrl' => route('searchPegawai'), 'label' => @$pegawai->nama ]) }}
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
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
        @if(isset($pegawai))
            $('#id_pegawai').val("{{ @$pegawai->id }}");
            $('#search_text').val("{{ @$pegawai->nama }}");
            $('#id_role').val({{ @$user_role->id }});
        @endif
    </script>
@append