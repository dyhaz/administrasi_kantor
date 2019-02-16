<!-- resources/views/components/form/selectbox.blade.php -->
<div class="form-group {{ @$errors->has($name) ? 'has-error' : ''}}">
    <?php echo Form::label($name, @$attributes['fieldName'] ? $attributes['fieldName'] : str_replace('_', ' ' , ucfirst(preg_replace('/^id_/', '', $name))), ['class' => 'col-md-4 control-label']); ?>
    <div class="col-md-6">
        <div class="input-group" style="width: 100%">
            {!! Form::hidden($name, $value, array_merge(['id' => $name], $attributes)) !!}
            {!! Form::hidden($name . '_text', null) !!}
            {!! @$errors->first($name, '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<script>
    $("#{{ $name }}").select2({
        ajax: {
            url: '{{ $attributes['endpointUrl'] }}',
            results: function (data) {
                data = $.map(data, function (obj) {
                    obj.text = obj.text || obj.nama || obj.name || obj.value;

                    return obj;
                });
                return {
                    results: data
                };
            },
            dataType: 'json',
            data: function (params) {
                var query = {
                    term: params
                };
                return query;
            }
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
    });

    $("#{{ $name }}").on('change', function (e) {
        var data = e.added['text'];
        $("#{{ $name }}_text").val(data);
        console.log($("#{{ $name }}_text").val());
    });

    <?php if(!empty($attributes['label'])) { ?>
    $('.select2-chosen').html('<?= $attributes['label'] ?>');
    <?php } ?>

    <?php if (!empty(old($name))) { ?>
    // Pass old input after request
    $('.select2-chosen').html('<?= old($name . "_text") ?>');
    <?php } ?>
</script>