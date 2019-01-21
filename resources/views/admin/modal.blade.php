<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ $modal_title }}</h4>
    </div>
    <div class="modal-body">
        {!! Form::open(['url' => $form_url, 'class' => 'form-horizontal ajax-form', 'files' => true, 'target' => '_blank']) !!}
        @include ($form_include, ['submitButtonText' => 'Create', 'includeDelete' => ''])
        {!! Form::close() !!}
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
    </div>
</div>
<script>
    $('.ajax-form').find('input[type=text]').val('');
    $('.close-modal').click(function() {
        $('.modal-body form').trigger('reset');
        $('.modal-body form .form-group').removeClass('has-success has-error has-feedback');
    });
</script>