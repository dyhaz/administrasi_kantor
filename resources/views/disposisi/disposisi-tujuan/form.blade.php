<div class="form-group {{ $errors->has('id_disposisi') ? 'has-error' : ''}}">
    {!! Form::label('id_disposisi', 'Id Disposisi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_disposisi', null) !!}
        {!! Form::text('nomor_disposisi', null, array('class' => 'form-control', 'disabled' => 'disabled')) !!}
        {!! $errors->first('id_disposisi', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{ Form::selectbox('id_divisi', null, ['endpointUrl' => route('searchDivisi'), 'label' => null, 'fieldName' => 'Divisi']) }}
{{ Form::selectbox('id_jabatan', null, ['endpointUrl' => route('searchJabatan'), 'label' => null, 'fieldName' => 'Jabatan']) }}

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@section('js')
    @parent
    <script>
        var url1 = "{{ route('searchDivisi') }}?term=%QUERY%";
        var url2 = "{{ route('searchJabatan') }}?term=%QUERY%";
    </script>
@append
