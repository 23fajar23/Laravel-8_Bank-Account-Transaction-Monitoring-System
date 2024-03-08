@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Update Rekening</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->

    <!--begin:: Vendor Plugins -->

    <link href="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/all_blade.css" rel="stylesheet" type="text/css" />

    <!--end:: Vendor Plugins -->
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />


    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="assets_landing/media/logos/profit.ico" />
    <!-- begin::Global Config(global config for global JS sciprts) -->


    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
    <script src="assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
    <script src="assets/plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
    <script src="assets/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <!-- File Javascript for this page -->
    <script src="js/update_rekening.js" type="text/javascript"></script>
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="#">
                <img alt="Logo" class="img-logos" src="assets/media/logos/jv.png">
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <!-- <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button> -->
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                <!-- begin:: Aside Logo -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="#">
                            <img alt="Logo" class="img-logos" src="assets/media/logos/jv.png">
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
                    </div>
                </div>

                <!-- end:: Aside Logo-->

                <!-- begin:: Aside Menu -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('home') }}" class="kt-menu__link kt-menu__item--active"><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">NAVIGASI</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <!-- <li class="kt-menu__item" aria-haspopup="true"><a href="#Menu1" class="kt-menu__link"><i class="kt-menu__link-icon flaticon2-laptop"></i><span class="kt-menu__link-text">Menu 1</span></a>

                            </li> -->

                            <li class="kt-menu__item kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text ">Layanan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">

                                        <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('layanan_mutasi') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Bank</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="javascript:void()" onclick="not_ready()" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">E-Wallet</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">Integrasi</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('integrasi') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">API Request</span></a></li>
                                        <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('alat_pengujian') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pengujian API</span></a></li>

                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu " aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-whatsapp"></i><span class="kt-menu__link-text">Autonotif</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('data_autonotif') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Data Autonotif</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('riwayat_autonotif') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Riwayat Notifikasi</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu " aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-coins"></i><span class="kt-menu__link-text">Saldo</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item" aria-haspopup="true"><a href="javascript:void();" onclick="add_saldo();" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Isi Ulang</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('mutasi_saldo') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Mutasi Saldo</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('riwayat_transaksi') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Riwayat Transaksi</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('profil') }}" class="kt-menu__link"><i class="kt-menu__link-icon flaticon2-settings"></i><span class="kt-menu__link-text">Pengaturan</span></a>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true"><a href="javascript:;" onclick={comment();} class="kt-menu__link"><i class="kt-menu__link-icon flaticon2-talk"></i><span class="kt-menu__link-text">Testimoni</span></a>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="kt-menu__link"><i class="kt-menu__link-icon flaticon-logout"></i><span class="kt-menu__link-text">Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- end:: Aside Menu -->
            </div>

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                    <!-- begin: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">

                        </div>
                    </div>

                    <!-- end: Header Menu -->

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">
                        <!--begin: Notifications -->
                        <div class="kt-header__topbar-item dropdown">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
                                <span class="kt-header__topbar-icon kt-pulse kt-pulse--brand" onclick={click_alert();}>
                                    <i class="flaticon2-bell-alarm-symbol"></i>
                                    <span class="kt-pulse__ring"></span>
                                </span>

                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
                                <form>

                                    <!--begin: Head -->
                                    <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(assets/media/misc/bg-1.jpg); ">
                                        <h3 class="kt-head__title">
                                            Notifikasi
                                            &nbsp;
                                            <span class="btn btn-danger btn-sm btn-bold btn-font-md" id="bar_new">-</span>
                                        </h3>
                                        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
                                            <li class="nav-item">
                                                <a id="bar_alert" class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="bar_event" class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
                                            </li>
                                            <li class="nav-item">
                                                <a id="bar_log" onclick={click_Logs();} class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!--end: Head -->
                                    <div class="tab-content">
                                        <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                            <div id="alert_user" class="kt-notification kt-margin-t-10 kt-margin-b-10" data-height="270" data-mobile-height="200">
                                                <center>Data Tidak Tersedia</center>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                            <div id="event_user" class="kt-notification kt-margin-t-10 kt-margin-b-10" data-height="270" data-mobile-height="200">
                                                <center> Data Tidak Tersedia</center>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                            <div id="log_user" class="kt-notification kt-margin-t-10 kt-margin-b-10" data-height="270" data-mobile-height="200">
                                                <center> Data Tidak Tersedia</center>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--end: Notifications -->
                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                                    <span class="kt-header__topbar-username kt-hidden-mobile">
                                        {{ Auth::user()->name }}
                                    </span>
                                    <img alt="Pic" class="kt-radius-100" src="assets/media/users/300_25.jpg" />

                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->

                                    <!--<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>-->
                                </div>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(assets/media/misc/bg-1.jpg)">
                                    <div class="kt-user-card__avatar">
                                        <img class="kt-hidden" alt="Pic" src="assets/media/users/300_25.jpg" />

                                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                        <span><img alt="Pic" class="border_radius10" src="assets/media/users/300_25.jpg" /></span>
                                    </div>
                                    <div class="kt-user-card__name">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="kt-user-card__badge">
                                        <span class="btn btn-primary btn-sm btn-bold btn-font-md">Member</span>
                                    </div>
                                </div>

                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <a href="{{ route('profil') }}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Profilku
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Pengaturan akun dan lainnya
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('layanan_mutasi') }}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-cardiogram kt-font-warning"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Keuangan
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Traksaksi masuk & keluar
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('integrasi') }}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-group kt-font-primary"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                API Ku
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Pengaturan integrasi API
                                            </div>
                                        </div>
                                    </a>
                                    <div class="kt-notification__custom kt-space-between">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                    </div>
                                </div>

                                <!--end: Navigation -->
                            </div>
                        </div>

                        <!--end: User Bar -->
                    </div>

                    <!-- end:: Header Topbar -->
                </div>

                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Subheader -->
                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">
                                <h3 class="kt-subheader__title">
                                    Dashboard </h3>
                                <span class="kt-subheader__separator kt-hidden"></span>
                                <div class="kt-subheader__breadcrumbs">
                                    <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>

                                    <a class="kt-subheader__breadcrumbs-link">
                                        Layanan </a>
                                    <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-fast-next"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a class="kt-subheader__breadcrumbs-link">
                                        Update Rekening </a>
                                </div>
                            </div>
                            <div class="kt-subheader__toolbar  size-ttp">
                                <div class="kt-subheader__wrapper">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->


                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 ">

                            </div>
                            <div class="col-xl-6 col-lg-6 ">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <center>
                                                <h3 class="kt-widget14__title">
                                                    ~ ~ Perbarui Data Rekening ~ ~
                                                </h3>
                                            </center>
                                            <br />

                                            <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-12 cenmar">
                                                            <div class="col-lg-12" id="alert_update">
                                                                <div class="box_alert_warning">
                                                                    <div class="alert_title">! Hati-Hati !</div>
                                                                    Salah memasukkan username atau password 3 kali akan menyebabkan terblokirnya akun internet banking anda.
                                                                </div>
                                                                <br />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <label for="nama" class="col-sm-12 control-label">
                                                                <b>Paket Layanan :</b>
                                                            </label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-box-1"></i></span></div>
                                                                    <input type="text" class="form-control" name="paket" id="paket" placeholder="Paket Layanan" disabled>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <label for="nama" class="col-sm-12 control-label">
                                                                <b>Jenis Paket :</b>
                                                            </label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group" id="daftar_paket">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-cube"></i></span></div>
                                                                    <select name="jenis_paket" class="form-control" id="jenis_paket" disabled>
                                                                        <option value="">---</option>
                                                                        <option value="harian">Harian</option>
                                                                        <option value="normal">Normal</option>
                                                                    </select>
                                                                </div>

                                                            </div><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <label for="nama" class="col-sm-12 control-label"><b>Harga :</b></label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-price-tag"></i></span></div>
                                                                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" disabled>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6 col-6">
                                                            <label for="nama" class="col-sm-12 control-label"><b>Masa Aktif :</b></label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-time"></i></span></div>
                                                                    <input type="text" class="form-control" name="durasi" id="durasi" placeholder="Masa Aktif" disabled>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label for="nama" class="col-sm-12 control-label"><b>Nomor Rekening :</b></label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                                                    <input type="number" class="form-control" name="update_no_rekening" id="update_no_rekening" placeholder="Nomor Rekening" disabled>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12">
                                                            <label for="nama" class="col-sm-12 control-label">
                                                                <b>Service :</b>
                                                            </label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group" id="service_change">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>
                                                                    <select name="update_service" class="form-control" id="update_service" disabled>
                                                                        <option value="">---</option>
                                                                        <option value="BCA">BCA</option>
                                                                        <option value="BRI">BRI</option>
                                                                        <option value="BNI">BNI</option>
                                                                        <option value="MANDIRI">MANDIRI</option>
                                                                    </select>
                                                                </div>

                                                            </div><br>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="company_id" style='display: none'>
                                                        <div class="col-lg-12">
                                                            <label for="nama" class="col-sm-6 control-label"><b>Company ID :</b></label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-copyright"></i></span></div>
                                                                    <input type="text" class="form-control" placeholder="Company ID" name="update_company" id="update_company" disabled>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-sm-6 ">
                                                            <label for="nama" class="col-sm-6 control-label"><b>Username :</b></label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user-secret"></i></span></div>
                                                                    <input type="text" class="form-control" placeholder="Username Ibank" name="update_username" minlength="6" id="update_username" required>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6 ">
                                                            <label for="nama" class="col-sm-6 control-label"><b>Password :</b></label>
                                                            <div class="col-sm-12">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-key"></i></span></div>
                                                                    <input type="text" placeholder="Password Ibank" class="form-control" name="update_password" minlength="6" id="update_password" required>
                                                                </div>
                                                            </div><br>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-12">
                                                        <center>
                                                            <br>
                                                            <div class="flex-equal text-end ms-1" id="div_btn">
                                                                <button type="submit" onclick={update_rekening()} class="btn btn-primary" id="btn_update_bank">Simpan</button>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>

                                    </div>
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                            <div class="col-xl-3 col-lg-3 ">

                            </div>

                        </div>

                    </div>


                    <!-- end:: Content -->
                </div>

                <!-- begin:: Footer -->
                <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            2022&nbsp;&copy;&nbsp;<a href="https://www.jvpartner.id" target="_blank" class="kt-link">Dominus Lapidis</a>
                        </div>
                        <div class="kt-footer__menu">
                            <a href="https://www.jvpartner.id" target="_blank" class="kt-footer__menu-link kt-link">About</a>
                            <a href="https://www.jvpartner.id" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
                            <a href="https://www.jvpartner.id" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
                        </div>
                    </div>
                </div>

                <!-- end:: Footer -->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- Modal Saldo-->
    <div id="form_invoice">

    </div>
    <div class="modal fade" id="modal_saldo" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h3 id="event_judul">
                        ~ Nominal Saldo ~
                    </h3>
                </div>
                <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama" class="col-sm-12 control-label">
                                <b>Nominal :</b>
                            </label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-shopping-cart-1"></i></span></div>
                                    <input type="number" class="form-control" id="saldo" name="saldo" placeholder="Jumlah Pembelian Saldo" required>
                                </div>
                                <label id="alert_nominal" class="control-label"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-12 control-label">
                                <b>Bank Tujuan :</b>
                            </label>
                            <div class="col-sm-12">
                                <div class="input-group" id="bank_received">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>
                                    <select name="service_saldo" class="form-control" id="service_saldo" required="required">
                                        <option value="">---</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <center>
                            <div class="flex-equal text-end ms-1" id="btn_save_saldo">
                                <button class="btn btn-primary" onclick={send_saldo();}>Simpan</button>
                            </div>
                        </center>
                        <br />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/all_blade.js"></script>

    <script>
        log_onload();

        document.getElementById('paket').value = "{{$data->nama_paket}}";
        document.getElementById('durasi').value = "{{$different_on_day}} Hari";
        document.getElementById('harga').value = "Rp {{$data->harga}}";
        document.getElementById('update_no_rekening').value = "{{$data->no_rekening}}";
        document.getElementById('update_service').value = "{{$data->service}}";
        document.getElementById('jenis_paket').value = "{{$data->jenis}}";
        document.getElementById('update_username').value = "{{$data->username_ibank}}";
        document.getElementById('update_password').value = "{{$data->password_ibank}}";

        if ('{{$data->service}}' == "MANDIRI") {
            document.getElementById('update_company').value = "{{$data->comp_id}}";
            document.getElementById("company_id").style.display = "block";
        }

        if ('{{$data->jenis}}' == "harian") {
            document.getElementById('durasi').value = "-";
        }

        function update_rekening() {
            var id_bank = "{{$data->id}}";
            var service = "{{$data->service}}";
            var username = document.getElementById("update_username").value;
            var password = document.getElementById("update_password").value;

            if (id_bank.length > 0 && username.length >= 6 && password.length >= 6) {
                if (service == "MANDIRI") {
                    var comp_id = "{{$data->comp_id}}";
                    $.ajax({
                        url: "/bank_update",
                        type: "GET",
                        data: {
                            id: id_bank,
                            company: comp_id,
                            username: username,
                            password: password,
                        },
                        beforeSend: function() {
                            show_btn_bank("loading_update");
                            alert_verify_rekening(
                                "Mohon Tunggu ..",
                                "Sistem Sedang Melakukan Verifikasi Rekening Anda.",
                                "alert"
                            );
                        },
                        complete: function() {
                            show_btn_bank("update_save");
                        },
                        success: function(data) {
                            success_savebank_function(data);
                        },
                        error: function() {
                            alert_verify_rekening(
                                "Sesuaikan Data",
                                "Pastikan input data telah sesuai dengan rekening anda.",
                                "alert"
                            );
                        },
                    });

                } else {
                    $.ajax({
                        url: "/bank_update",
                        type: "GET",
                        data: {
                            id: id_bank,
                            username: username,
                            password: password,
                        },
                        beforeSend: function() {
                            show_btn_bank("loading_update");
                            alert_verify_rekening(
                                "Mohon Tunggu ..",
                                "Sistem Sedang Melakukan Verifikasi Rekening Anda.",
                                "alert"
                            );
                        },
                        complete: function() {
                            show_btn_bank("update_save");
                        },
                        success: function(data) {
                            success_savebank_function(data);
                        },
                        error: function() {
                            alert_verify_rekening(
                                "Sesuaikan Data",
                                "Pastikan input data telah sesuai dengan rekening anda.",
                                "alert"
                            );
                        },
                    });
                }
            }
        }
    </script>
</body>

</html>
@endsection
