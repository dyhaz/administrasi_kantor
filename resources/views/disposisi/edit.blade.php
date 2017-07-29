@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">Edit Disposisi #{{ $disposisi->id }}</div>
                <div class="widget-content">
                    <a href="{{ url('/disposisi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger fade in">
                                <i class="icon-remove close" data-dismiss="alert"></i>
                                <strong>Error!</strong> {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    {!! Form::model($disposisi, [
                        'method' => 'PATCH',
                        'url' => ['/disposisi', $disposisi->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('disposisi.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript">
    @if($disposisi)
        @foreach($disposisi_isi as $id_isi_disposisi)
            var id_isi = '{{ $id_isi_disposisi }}';
            $('option[value='+id_isi+']').attr('selected', 'selected');
        @endforeach
    @endif
    </script>
@append