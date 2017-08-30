@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Input Tujuan</div>
                <div class="panel-body">
                    <a href="{{ url('/disposisi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    {!! Form::open(['url' => '/disposisi/disposisi-tujuan', 'class' => 'form-horizontal ajax-form', 'files' => true]) !!}

                    @include ('disposisi.disposisi-tujuan.form')

                    {!! Form::close() !!}
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    <script type="text/javascript" src="/theme/plugins/nprogress/nprogress.js"></script>
    {!! $dataTable->scripts() !!}
    <script>
        function deleteRecord(btn) {
            NProgress.start();
            $('#nprogress-info-msg').slideDown(200);
            var token = "{{ csrf_token() }}";
            var id = $(btn).data('id');

            $.ajax({
                url: "/disposisi/disposisi-tujuan/"+id,
                type: 'post',
                data: {_method: 'delete', _token: token},
                success: function (msg) {
                    NProgress.done();
                    $('#nprogress-info-msg').slideUp(200);
                    $('#dataTableBuilder').DataTable().draw(false);
                    bootbox.alert('Data dihapus');
                },
                error: function(msg) {
                    NProgress.done();
                    alert("Error!");
                }
            });
        }
        $('input[name=id_disposisi]').val('{{ $id }}');
        $('input[name=nomor_disposisi]').val('{{ $id }}');
    </script>
@append