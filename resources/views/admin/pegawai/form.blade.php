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
</div><div class="form-group {{ $errors->has('id_divisi') ? 'has-error' : ''}}">
    {!! Form::label('id_divisi', 'Id Divisi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_divisi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_divisi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_jabatan') ? 'has-error' : ''}}">
    {!! Form::label('id_jabatan', 'Id Jabatan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_jabatan', null, ['class' => 'form-control']) !!}
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
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
