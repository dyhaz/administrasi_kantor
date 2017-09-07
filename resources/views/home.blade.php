@extends('layouts.master')

@section('demo')
    <script type="text/javascript" src="/theme/assets/js/demo/charts.js"></script>
    <script type="text/javascript" src="/theme/assets/js/demo/charts/chart_filled_blue.js"></script>
    <!--<script type="text/javascript" src="/theme/assets/js/demo/charts/chart_multiple.js"></script>-->
    <script type="text/javascript" src="/theme/assets/js/demo/charts/chart_pie.js"></script>
    <!--<script type="text/javascript" src="/theme/assets/js/demo/charts/chart_simple.js"></script>-->
    <!--<script type="text/javascript" src="/theme/assets/js/demo/charts/chart_updating.js"></script>
    <script type="text/javascript" src="/theme/assets/js/demo/charts/chart_widget.js"></script>-->
@endsection

@section('content')
<!--=== Page Content ===-->
<!--=== Blue Chart ===-->
<div class="row">
    <div class="col-md-12">
        <div class="widget box">
            <div class="widget-header">
                <h4><i class="icon-bar-chart"></i> Surat Masuk - <span class="blue">{{ DateTime::createFromFormat('!m', date('m'))->format('F').' '.date('Y') }}</span></h4>
                <div class="toolbar no-padding">
                    <div class="btn-group">
                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                    </div>
                </div>
            </div>
            <div class="widget-content">
                <div id="chart_filled_blue" class="chart"></div>
            </div>
        </div>
    </div> <!-- /.col-md-12 -->
</div> <!-- /.row -->
<!-- /Blue Chart -->

    <div class="row">
        <div class="col-md-6">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-bar-chart"></i> Surat Masuk - <span class="blue">{{ DateTime::createFromFormat('!m', date('m'))->format('F').' '.date('Y') }}</span></h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content">
                    <div id="chart_pie" class="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i> Surat Masuk Terakhir</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content no-padding">
                    <table class="table table-striped table-checkable table-hover">
                        <thead>
                        <tr>
                            <th class="checkbox-column">
                                <input type="checkbox" class="uniform">
                            </th>
                            <th class="hidden-xs">Nomor Surat</th>
                            <th>Tanggal Masuk</th>
                            <th>Pengirim</th>
                            <th class="align-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($surat_masuk_terakhir as $row)
                        <tr>
                            <td class="checkbox-column">
                                <input type="checkbox" class="uniform">
                            </td>
                            <td class="hidden-xs"><a href='/surat-masuk/{{ $row['id'] }}'>{{ $row['nomor'] }}</a></td>
                            <td>{{ date_format(date_create($row['tanggal_terima']), 'd/m/Y') }}</td>
                            <td>{{ @$row->instansi->nama }}</td>
                            <td class="align-center">
												<span class="btn-group">
                                                    {!! Form::open(['url' => '/persetujuan-surat-masuk/'.$row['id'], 'method' => 'GET', 'class' => 'form-horizontal ajax-form', 'files' => true,]) !!}
                                                    <a href="#" onclick="$(this).parent().submit();" title="Approve" class="btn btn-xs bs-tooltip"><i class="icon-ok"></i></a>
                                                    {!! Form::close() !!}
												</span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="table-footer">
                            <div class="col-md-12">
                                <div class="table-actions">
                                    <label>Apply action:</label>
                                    <select class="select2" data-minimum-results-for-search="-1" data-placeholder="Select action...">
                                        <option value=""></option>
                                        <option value="Edit">Edit</option>
                                        <option value="Delete">Delete</option>
                                        <option value="Move">Move</option>
                                    </select>
                                </div>
                            </div>
                        </div> <!-- /.table-footer -->
                    </div> <!-- /.row -->
                </div> <!-- /.widget-content -->
            </div> <!-- /.widget -->
        </div>
    </div>
@endsection
