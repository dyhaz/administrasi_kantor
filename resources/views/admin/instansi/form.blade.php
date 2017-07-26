<div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
    {!! Form::label('nama', 'Nama', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_kota') ? 'has-error' : ''}}">
    {!! Form::label('id_kota', 'Id Kota', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_kota', null, ['class' => 'form-control']) !!}
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
