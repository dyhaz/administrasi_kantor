@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="widget box">
                <div class="widget-header">Dashboard</div>

                <div class="widget-content">
                    Your application's dashboard.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
