<div id="sidebar" class="sidebar-fixed">
    <div id="sidebar-content">

        <!-- Search Input -->
        <!--<form class="sidebar-search">
            <div class="input-box">
                <button type="submit" class="submit">
                    <i class="icon-search"></i>
                </button>
						<span>
							<input type="text" placeholder="Search...">
						</span>
            </div>
        </form>-->

        <!-- Search Results -->
        <div class="sidebar-search-results">

            <i class="icon-remove close"></i>
            <!-- Documents -->
            <div class="title">
                Documents
            </div>
            <ul class="notifications">
                <li>
                    <a href="javascript:void(0);">
                        <div class="col-left">
                            <span class="label label-info"><i class="icon-file-text"></i></span>
                        </div>
                        <div class="col-right with-margin">
                            <span class="message"><strong>John Doe</strong> received $1.527,32</span>
                            <span class="time">finances.xls</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <div class="col-left">
                            <span class="label label-success"><i class="icon-file-text"></i></span>
                        </div>
                        <div class="col-right with-margin">
                            <span class="message">My name is <strong>John Doe</strong> ...</span>
                            <span class="time">briefing.docx</span>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /Documents -->
            <!-- Persons -->
            <div class="title">
                Persons
            </div>
            <ul class="notifications">
                <li>
                    <a href="javascript:void(0);">
                        <div class="col-left">
                            <span class="label label-danger"><i class="icon-female"></i></span>
                        </div>
                        <div class="col-right with-margin">
                            <span class="message">Jane <strong>Doe</strong></span>
                            <span class="time">21 years old</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div> <!-- /.sidebar-search-results -->

        <!--=== Navigation ===-->
        @include('_partials.sidebar')
                <!--<ul id="nav">
            <li class="current">
                <a href="/">
                    <i class="icon-dashboard"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-user-md"></i>
                    KA UPT
                    <span class="label label-info pull-right">6</span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="/disposisi">
                            <i class="icon-angle-right"></i>
                            Disposisi Surat
                        </a>
                    </li>
                    <li>
                        <a href="/disposisi/isi-disposisi">
                            <i class="icon-angle-right"></i>
                            Isi Disposisi
                        </a>
                    </li>
                    <li>
                        <a href="/persetujuan-surat-keluar">
                            <i class="icon-angle-right"></i>
                            Persetujuan Surat Keluar
                        </a>
                    </li>
                    <li>
                        <a href="/persetujuan-surat-masuk">
                            <i class="icon-angle-right"></i>
                            Persetujuan Surat Masuk
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-user-md"></i>
                    KA Subbag TU
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="/admin/pegawai">
                            <i class="icon-user"></i>
                            Data Pegawai
                        </a>
                    </li>
                    <li>
                        <a href="/admin/divisi">
                            <i class="icon-user"></i>
                            Divisi
                        </a>
                    </li>
                    <li>
                        <a href="/admin/jabatan">
                            <i class="icon-user"></i>
                            Jabatan
                        </a>
                    </li>
                    <li>
                        <a href="/admin/kota">
                            <i class="icon-building"></i>
                            Kota
                        </a>
                    </li>
                    <li>
                        <a href="/admin/instansi">
                            <i class="icon-certificate"></i>
                            Instansi
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sifat-surat">
                            <i class="icon-envelope-alt"></i>
                            Sifat Surat
                        </a>
                    </li>
                    <li>
                        <a href="/admin/kegiatan">
                            <i class="icon-angle-right"></i>
                            Kegiatan
                        </a>
                    </li>
                    <li>
                        <a href="/admin/klasifikasi-arsip">
                            <i class="icon-angle-right"></i>
                            Klasifikasi Kearsipan
                        </a>
                    </li>
                    <li>
                        <a href="/admin/kegiatan-surat">
                            <i class="icon-angle-right"></i>
                            Kegiatan Surat
                        </a>
                    </li>
                    <li>
                        <a href="/surat-masuk">
                            <i class="icon-envelope"></i>
                            Surat Masuk
                        </a>
                    </li>
                    <li>
                        <a href="/surat-keluar">
                            <i class="icon-envelope"></i>
                            Surat Keluar
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-user-md"></i>
                    KA Seksi Pengujian dan Pengendalian Mutu
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="tables_static.html">
                            <i class="icon-angle-right"></i>
                            Static Tables
                        </a>
                    </li>
                    <li>
                        <a href="tables_dynamic.html">
                            <i class="icon-angle-right"></i>
                            Dynamic Tables (DataTables)
                        </a>
                    </li>
                    <li>
                        <a href="tables_responsive.html">
                            <i class="icon-angle-right"></i>
                            Responsive Tables
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="charts.html">
                    <i class="icon-user-md"></i>
                    Staff Seksi Pengujian &amp; Pengendalian Mutu
                </a>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-folder-open-alt"></i>
                    Pages
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="login.html">
                            <i class="icon-angle-right"></i>
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="pages_user_profile.html">
                            <i class="icon-angle-right"></i>
                            User Profile
                        </a>
                    </li>
                    <li>
                        <a href="pages_calendar.html">
                            <i class="icon-angle-right"></i>
                            Calendar
                        </a>
                    </li>
                    <li>
                        <a href="pages_invoice.html">
                            <i class="icon-angle-right"></i>
                            Invoice
                        </a>
                    </li>
                    <li>
                        <a href="404.html">
                            <i class="icon-angle-right"></i>
                            404 Page
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);">
                    <i class="icon-list-ol"></i>
                    4 Level Menu
                </a>
                <ul class="sub-menu">
                    <li class="open-default">
                        <a href="javascript:void(0);">
                            <i class="icon-cogs"></i>
                            Item 1
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="open-default">
                                <a href="javascript:void(0);">
                                    <i class="icon-user"></i>
                                    Sample Link 1
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="current"><a href="javascript:void(0);"><i class="icon-remove"></i> Sample Link 1</a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-pencil"></i> Sample Link 1</a></li>
                                    <li><a href="javascript:void(0);"><i class="icon-edit"></i> Sample Link 1</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:void(0);"><i class="icon-user"></i>  Sample Link 1</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-external-link"></i>  Sample Link 2</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-bell"></i>  Sample Link 3</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="icon-globe"></i>
                            Item 2
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="javascript:void(0);"><i class="icon-user"></i>  Sample Link 1</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-external-link"></i>  Sample Link 1</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-bell"></i>  Sample Link 1</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="icon-folder-open"></i>
                            Item 3
                        </a>
                    </li>
                </ul>
            </li>
        </ul>-->

        <!-- /Navigation -->
        <div class="sidebar-title">
            <span>Notifications</span>
        </div>
        <ul class="notifications demo-slide-in"> <!-- .demo-slide-in is just for demonstration purposes. You can remove this. -->
            @if(Auth::user()->hasRole('su'))
                @php
                $user = \App\User::orderBy('created_at', 'desc')->limit(10)->get();
                @endphp
                @foreach($user as $item)
                    <li>
                        <div class="col-left">
                            <span class="label label-success"><i class="icon-plus"></i></span>
                        </div>
                        <div class="col-right with-margin">
                            <span class="message"><strong>{{ $item->name }}</strong>'s account was created</span>
                            <span class="time">{{ $item->created_at?$item->created_at->diffForHumans():'' }}</span>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>

        <div class="sidebar-widget align-center">
            <div class="btn-group" data-toggle="buttons" id="theme-switcher">
                <label class="btn active">
                    <input type="radio" name="theme-switcher" data-theme="bright"><i class="icon-sun"></i> Bright
                </label>
                <label class="btn">
                    <input type="radio" name="theme-switcher" data-theme="dark"><i class="icon-moon"></i> Dark
                </label>
            </div>
        </div>

    </div>
    <div id="divider" class="resizeable"></div>
</div>
<!-- /Sidebar -->