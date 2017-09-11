<div class="form-group {{ $errors->has('tanggal1') ? 'has-error' : ''}}">
    {!! Form::label('tanggal1', 'Awal', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::date('tanggal1', date('Y-m-d'), ['class' => 'form-control', 'data-mask' => "9999-99-99"]) !!}
        {!! $errors->first('tanggal1', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal2') ? 'has-error' : ''}}">
    {!! Form::label('tanggal2', 'Akhir', ['class' => 'col-md-2 control-label']) !!}
    <div class="col-md-8">
        {!! Form::date('tanggal2', date('Y-m-d'), ['class' => 'form-control', 'data-mask' => "9999-99-99"]) !!}
        {!! $errors->first('tanggal2', '<p class="help-block">:message</p>') !!}
    </div>
</div>

    <div class="col-md-offset-2 col-md-4">
        {!! Form::submitButton(isset($submitButtonText) ? $submitButtonText : 'Cetak') !!}
    </div>