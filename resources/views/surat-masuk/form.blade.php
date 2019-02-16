<div class="form-group {{ $errors->has('nomor') ? 'has-error' : ''}}">
    {!! Form::label('nomor', 'Nomor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal_naskah') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_naskah', 'Tanggal Naskah', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tanggal_naskah', null, ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
        {!! $errors->first('tanggal_naskah', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal_terima') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_terima', 'Tanggal Terima', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tanggal_terima', date('Y-m-d'), ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
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
        {!! Form::select('id_sifat', $sifatsurat, null, ['id' => 'id_sifat']) !!}
        {!! $errors->first('id_sifat', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{ Form::selectbox('id_instansi', null, ['endpointUrl' => route('searchInstansi'), 'label' => @$suratmasuk->instansi->nama, 'fieldName' => 'Pengirim Surat']) }}
<div class="form-group {{ $errors->has('perihal') ? 'has-error' : ''}}">
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

@section('content')
    @parent
    <div id="instansiModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            @include("admin.modal", [
                "modal_title" => "Create Instansi",
                "form_url" => "/admin/instansi",
                "form_include" => "admin.instansi.form",
            ])
        </div>
    </div>
@append

@section('js')
    @parent
    <script type="text/javascript">
        $("#id_sifat").select2();
        var date = new Date("{{ date('Y-m-d') }}");
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();
        var maxDate = new Date(currentYear, currentMonth, currentDate);

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: maxDate
        });

        /*$("#search_text").blur(function() {
         $('#search_text').val($('#nama_instansi').val());
         });*/

        @if(isset($suratmasuk))
            $('#search_text').val("{{ @$suratmasuk->instansi->nama }}");
            $('#nama_instansi').val("{{ @$suratmasuk->instansi->nama }}");
            $('#tanggal_terima').val("{{ $suratmasuk->tanggal_terima }}");
        @endif
    </script>
@append