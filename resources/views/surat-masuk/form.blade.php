<div class="form-group {{ $errors->has('nomor') ? 'has-error' : ''}}">
    {!! Form::label('nomor', 'Nomor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal_terima') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_terima', 'Tanggal Terima', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('tanggal_terima', date('Y-m-d'), ['class' => 'form-control', 'data-mask' => "9999-99-99"]) !!}
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
        {!! Form::select('id_sifat', $sifatsurat, null, ['id' => 'id_sifat', 'class' => 'form-control']) !!}
        {!! $errors->first('id_sifat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_instansi') ? 'has-error' : ''}}">
    {!! Form::label('id_instansi', 'Pengirim Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_instansi', null) !!}
        {!! Form::text('search_text', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text')) !!}
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

@section('js')
<script type="text/javascript">

    var url = "{{ route('searchInstansi') }}?term=%QUERY%";

    $('#search_text').typeahead({
        remote:  {
            url: url,
            filter: function (data) {
                // Map the remote source JSON array to a JavaScript object array
                return $.map(data, function (data) {
                    return {
                        value: data.value
                    };
                });
            },
            ajax:{
                type:"GET",
                cache:false,
                data:{
                    limit:5
                },
                complete:function(jqXHR,textStatus){
                    alert('OK!');
                }
            }
        }
    }).on('typeahead:selected',function(evt,datum){
        alert(datum.id);
        $('#id_instansi').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
    });
</script>
@endsection