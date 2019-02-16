<!-- resources/views/components/form/typeahead.blade.php -->
<div class="form-group {{ @$errors->has('id_' . $name) ? 'has-error' : ''}}">
    <?php echo Form::label($name, str_replace('_', ' ' , ucfirst($name)), ['class' => 'col-md-4 control-label']); ?>
    <div class="col-md-6">
        <div class="input-group">
            {!! Form::hidden('id_' . $name, $value, ['id' => 'id_' . $name]) !!}
            {!! Form::text($name, $value, array_merge(['class' => 'form-control', 'id' => $name], $attributes)) !!}
            {!! @$errors->first('id_' . $name, '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<script>
    $('#{{ $name }}').typeahead({
        remote:  {
            url: '{{ $attributes['endpointUrl'] }}',
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
                }
            }
        }
    }).on('typeahead:selected',function(evt,datum){
        $('#id_{{ $name }}').val(datum.id);
    });
</script>