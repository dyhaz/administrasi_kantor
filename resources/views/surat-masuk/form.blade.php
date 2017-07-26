<div class="form-group {{ $errors->has('nomor') ? 'has-error' : ''}}">
    {!! Form::label('nomor', 'Nomor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal_terima') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_terima', 'Tanggal Terima', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('tanggal_terima', null, ['class' => 'form-control datepicker', 'data-mask' => '9999-99-99']) !!}
        {!! $errors->first('tanggal_terima', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nomor_naskah_dinas') ? 'has-error' : ''}}">
    {!! Form::label('nomor_naskah_dinas', 'Nomor Naskah Dinas', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor_naskah_dinas', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomor_naskah_dinas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_sifat') ? 'has-error' : ''}}">
    {!! Form::label('id_sifat', 'Id Sifat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_sifat', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_sifat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_instansi') ? 'has-error' : ''}}">
    {!! Form::label('id_instansi', 'Id Instansi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('id_instansi', null, ['class' => 'form-control']) !!}
        {!! $errors->first('id_instansi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('perihal') ? 'has-error' : ''}}">
    {!! Form::label('perihal', 'Perihal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('perihal', null, ['class' => 'form-control']) !!}
        {!! $errors->first('perihal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('isi_ringkas') ? 'has-error' : ''}}">
    {!! Form::label('isi_ringkas', 'Isi Ringkas', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('isi_ringkas', null, ['class' => 'form-control']) !!}
        {!! $errors->first('isi_ringkas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
    {!! Form::label('file', 'File', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('file', null, ['class' => 'form-control']) !!}
        {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
