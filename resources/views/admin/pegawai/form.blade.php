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
</div>
{{ Form::selectbox('id_kota', null, ['endpointUrl' => route('searchKota'), 'label' => @$pegawai->kota->nama]) }}
{{ Form::selectbox('id_divisi', null, ['endpointUrl' => route('searchDivisi'), 'label' => @$pegawai->divisi->nama]) }}
{{ Form::selectbox('id_jabatan', null, ['endpointUrl' => route('searchJabatan'), 'label' => @$pegawai->jabatan->nama]) }}
<div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : ''}}">
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
        {!! Form::text('tanggal_lahir', null, ['class' => 'form-control datepicker', 'autocomplete' => 'off']) !!}
        {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


@section('content')
    @parent
    <div id="kotaModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            @include("admin.modal", [
                "modal_title" => "Create Kota",
                "form_url" => "/admin/kota",
                "form_include" => "admin.kota.form",
            ])
        </div>
    </div>
@append


@section('js')
    @parent
    <script type="text/javascript">
        var date = new Date("{{ date('Y-m-d') }}");
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();
        var maxDate = new Date(currentYear, currentMonth, currentDate);

        $('.datepicker').datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: maxDate
        });

        $("#id_divisi").on('change', function (e) {
            var data = e.added['kode'];
            $('#nip').val();
            console.log("id divisi changed " + data);
        });
        @if(isset($nip))
            $('#nip').val(" {{ $nip }}");
        @endif
    </script>
@append