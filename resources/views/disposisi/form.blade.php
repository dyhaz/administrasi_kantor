<div class="form-group {{ $errors->has('nomor') ? 'has-error' : ''}}">
    {!! Form::label('nomor', 'Nomor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nomor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('id_surat_masuk') ? 'has-error' : ''}}">
    {!! Form::label('id_surat_masuk', 'No. Surat Masuk', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::hidden('id_surat_masuk', null) !!}
        {!! Form::hidden('nomor_surat_masuk', null) !!}
        {!! Form::text('search_text_surat_masuk', null, array('placeholder' => 'Search Text','class' => 'form-control','id'=>'search_text_surat_masuk')) !!}
        {!! $errors->first('id_surat_masuk', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('isi_disposisi') ? 'has-error' : ''}}">
    {!! Form::label('isi_disposisi', 'Isi Disposisi', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('isi_disposisi[]', @$isidisposisi, null, ['id' => 'isi_disposisi','class' => 'select2-multiple',  'multiple' => "multiple", 'style' => 'width: 100%']) !!}
        {!! $errors->first('isi_disposisi', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('keterangan') ? 'has-error' : ''}}">
    {!! Form::label('keterangan', 'Keterangan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('keterangan', null, ['class' => 'form-control']) !!}
        {!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="checkbox">
            <label>{!! Form::radio('status', '1') !!} Tidak perlu balasan</label>
        </div>
        <div class="checkbox">
            <label>{!! Form::radio('status', '0', true) !!} Balasan</label>
        </div>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

@section('css')
@parent
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"/>-->
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />-->
@append

@section('js')
@parent
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js" type="text/javascript"></script>-->
<script type="text/javascript">

    $("#search_text_surat_masuk").on("click", function () {
        $(this).select();
    });

    var url = "{{ route('searchSuratMasuk') }}?term=%QUERY%";

    $('#search_text_surat_masuk').typeahead({
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
        if(datum.id == 0) {
            window.open('/surat-masuk/create', '_blank', 'toolbar=yes, location=yes, status=yes, menubar=yes, scrollbars=yes');
        } else {
            $('#id_surat_masuk').val(datum.id); //Select a user from the drop-down in an item, refresh the read-only personId value
            $('#nomor_surat_masuk').val(datum.value);
        }
    });

    @if(isset($disposisi))
        $('#search_text_surat_masuk').val("{{ @$disposisi->surat_masuk->nomor }}");
    $('#nomor_surat_masuk').val("{{ @$disposisi->surat_masuk->nomor }}");
    @endif
</script>
@append