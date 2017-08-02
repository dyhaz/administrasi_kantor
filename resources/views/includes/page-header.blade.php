<!-- Breadcrumbs line -->
<div class="crumbs">
    <ul id="breadcrumbs" class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="/">Dashboard</a>
        </li>
        <li class="current">
            <a href="#" title="">Calendar</a>
        </li>
    </ul>
<!--
    <ul class="crumb-buttons">
        <li><a href="charts.html" title=""><i class="icon-signal"></i><span>Statistics</span></a></li>
        <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="icon-tasks"></i><span>Users <strong>(+3)</strong></span><i class="icon-angle-down left-padding"></i></a>
            <ul class="dropdown-menu pull-right">
                <li><a href="form_components.html" title=""><i class="icon-plus"></i>Add new User</a></li>
                <li><a href="tables_dynamic.html" title=""><i class="icon-reorder"></i>Overview</a></li>
            </ul>
        </li>
        <li class="range"><a href="#">
                <i class="icon-calendar"></i>
                <span></span>
                <i class="icon-angle-down"></i>
            </a></li>
    </ul>-->
</div>
<!-- /Breadcrumbs line -->

<!--=== Page Header ===-->
<div class="page-header">
    <div class="page-title">
        <h3>{{ @$title?$title:preg_replace('/(?<!\ )[A-Z]/', ' $0',str_replace('Controller', '', $controller)) }}</h3>
        <span>{{ @$description?$description:ucfirst(@$action) . ' ' . preg_replace('/(?<!\ )[A-Z]/', ' $0',str_replace('Controller', '', $controller)) }}</span>
    </div>

</div>
<!-- /Page Header -->