@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Data Autonotif</title>
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
    <!-- <link href="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" /> -->
    <script src="assets/datatable/jquery-3.5.1.min.js"></script>

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

    <link rel="shortcut icon" href="assets_landing/media/logos/profit.ico" />
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <link href="assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />
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
                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('home') }}" class="kt-menu__link kt-menu__item--active"><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">NAVIGASI</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <li class="kt-menu__item kt-menu__item--submenu " aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text ">Layanan</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('layanan_mutasi') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Bank</span></a></li>
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
                            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--active" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-whatsapp"></i><span class="kt-menu__link-text">Autonotif</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item kt-menu__item--active" aria-haspopup="true"><a href="{{ route('data_autonotif') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Data Autonotif</span></a></li>
                                        <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('riwayat_autonotif') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Riwayat Notifikasi</span></a></li>
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
                                        Autonotif </a>
                                    <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-fast-next"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a class="kt-subheader__breadcrumbs-link">
                                        Data Autonotif </a>
                                </div>
                            </div>
                            <div class="kt-subheader__toolbar size-ttp">
                                <div class="kt-subheader__wrapper">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 order-lg-1 order-xl-1">
                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid">

                                    <div class="kt-widget14">
                                        <h4 class="kt-widget14__title">
                                            <center> ~ Autonotif Account ~ </center>
                                        </h4>
                                        <div class="row">
                                            <div class="col-lg-12" id="alert_notif">
                                                <div class="box_alert_warning">
                                                    <div class="alert_title">! Daftar Terlebih Dahulu !</div>
                                                    Gunakan API_Key dan username pada akun autonotif anda. <br />
                                                    <b>
                                                        <a href="https://app.autonotif.com/register" target="__blank">
                                                            Link Autonotif
                                                        </a>
                                                    </b>
                                                </div>
                                                <br />
                                            </div>
                                        </div>
                                        <form method="post" action="javascript:void();">
                                            <div class="form-group">
                                                <label><b>API Key : </b></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-rocket"></i></span></div>
                                                    <input type="text" class="form-control" name="api_key" id="api_key" placeholder="API_Key" value="" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 form-group">
                                                    <label><b>Username : </b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user-secret"></i></span></div>
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 form-group">
                                                    <label><b>Status : </b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-checkmark"></i></span></div>
                                                        <select name="status" id="status" class="form-control" required>
                                                            <option value="">---</option>
                                                            <option value="aktif">Aktif</option>
                                                            <option value="tidak_aktif">Tidak Aktif</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-sm-12">

                                                <center>
                                                    <div class="flex-equal text-end ms-1" id="btn_data_autonotif">
                                                        <button type="submit" onclick={save_data_autonotif()} class="btn btn-label btn-label-brand">Simpan</button>
                                                    </div>
                                                </center>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>

                            <div class="col-xl-6 col-lg-6 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-widget14" id="no_received">
                                        <h4 class="kt-widget14__title">
                                            <center> ~ Nomor Penerima ~ </center>
                                        </h4>
                                        <hr class="hr_data" />
                                        <br />
                                        <form method="post" action="javascript:void();">
                                            <div class="form-group" id="field_penerima">
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-5 col-5">
                                                        <label><b>Jenis Transaksi : </b></label>
                                                    </div>
                                                    <div class="col-lg-7 col-sm-7 col-7">
                                                        <label><b>No.WhatsApp : </b></label>
                                                        <input type="hidden" class="form-control" name="count_penerima" id="count_penerima" value="">
                                                    </div>
                                                </div>

                                                @php
                                                $cek_data = 0;
                                                @endphp

                                                @foreach($array_phone as $phone)
                                                <div id="data_penerima{{$cek_data}}">

                                                    <?php
                                                    if ($cek_data > 0) {
                                                        echo "<br />";
                                                    }
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-lg-5 col-sm-5 col-5">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-arrow-1"></i></span></div>
                                                                <select name="jenis{{$cek_data}}" id="jenis{{$cek_data}}" class="form-control" required>

                                                                    <option value="kredit">Kredit</option>
                                                                    <option value="debit">Debit</option>
                                                                    <option value="semua">Kredit & Debit</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-7 col-sm-7 col-7">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-phone"></i></span></div>
                                                                <input type="number" class="form-control" name="penerima{{$cek_data}}" id="penerima{{$cek_data}}" placeholder="No Hp Penerima <?php echo $cek_data + 1; ?>" value="<?php echo $array_phone[$cek_data]->phone;  ?>" required>

                                                                <?php
                                                                if ($cek_data == 0) { ?>
                                                                    <span class="input-group-text" onclick="add_penerima()" style="margin-left: 20px;"><i class="flaticon2-plus"></i></span>
                                                                <?php
                                                                } else { ?>
                                                                    <span class="input-group-text" onclick="delete_penerima('{{$cek_data}}')" style="margin-left: 20px;"><i class="flaticon2-line"></i></span>
                                                                <?php
                                                                }

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        var out = "jenis{{$cek_data}}";
                                                        document.getElementById(out).value = "{{$array_phone[$cek_data]->jenis}}";
                                                    </script>

                                                </div>
                                                @php
                                                $cek_data++;
                                                @endphp

                                                @endforeach
                                            </div>
                                            <div class="col-sm-12">
                                                <center>
                                                    <div class="flex-equal text-end ms-1" id="btn_send">
                                                        <button type="submit" onclick={save_phone()} class="btn btn-label btn-label-brand">Simpan</button>
                                                    </div>
                                                </center>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--lg marbot">
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="modal" data-target="#tambahkan_user" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Pengaturan Notifikasi
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-autonotif" value="on" type="button" onclick="toggle_show('autonotif');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-autonotif"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-autonotif">
                                        <div class="col-lg-6">
                                            <table class="table table-bordered table-striped " id="table_word">
                                                <thead>
                                                    <tr class="tb_cen">
                                                        <th>No</th>
                                                        <th>Symbol</th>
                                                        <th>Tampilan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>(nominal)</td>
                                                        <td>Nominal Transaksi</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(service)</td>
                                                        <td>Bank Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(jenis_transaksi)</td>
                                                        <td>Debit atau Kredit Transaksi</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(tgl_transaksi)</td>
                                                        <td>Tanggal Transaksi</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" id="buttonStrike" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" id="buttonItalic" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" id="buttonBold">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message" id="message" placeholder="Isi Pesan"></textarea>
                                                        <!-- <input type="email" class="form-control" name="email" id="email" placeholder="Alamat" value="" required> -->
                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <!-- <button type="submit" onclick={send_profil()} class="btn btn-primary">Kirim</button> -->
                                                                <button type="submit" onclick={save_message()} class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick={view_output()} class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>



                                    <!-- <div class="kt-widget14">
                                    </div> -->
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--lg marbot">
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="modal" data-target="#tambahkan_user" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Pemberitahuan Pengiriman Notifikasi
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-reportself" value="on" type="button" onclick="toggle_show('reportself');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-reportself"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-reportself">
                                        <div class="col-lg-6">
                                            <table class="table table-bordered table-striped " id="table_word">
                                                <thead>
                                                    <tr class="tb_cen">
                                                        <th>No</th>
                                                        <th>Symbol</th>
                                                        <th>Tampilan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>(nominal)</td>
                                                        <td>Nominal Transaksi</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(service)</td>
                                                        <td>Bank Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(jenis_transaksi)</td>
                                                        <td>Debit atau Kredit Transaksi</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(tgl_transaksi)</td>
                                                        <td>Tanggal Transaksi</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(status)</td>
                                                        <td>Status Pengiriman Pesan</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <!-- <div class="col-lg-6 col-sm-6 form-group"> -->
                                                    <label><b>Status : </b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-checkmark"></i></span></div>
                                                        <select name="status_report" id="status_report" class="form-control" required>
                                                            <option value="">---</option>
                                                            <option value="aktif">Aktif</option>
                                                            <option value="tidak_aktif">Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                    <br />

                                                    <!-- </div> -->
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" id="buttonStrike2" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" id="buttonItalic2" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" id="buttonBold2">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="report_self" id="report_self" placeholder="Isi Pesan"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick={save_message2()} class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick={view_output2()} class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>



                                    <!-- <div class="kt-widget14">
                                    </div> -->
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                        </div>
                    </div>




                    <!-- end:: Content -->
                </div>

                <!-- begin:: Footer -->
                <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            2022&nbsp;&copy;&nbsp;<a href="https://www.jvpartner.id" target="_blank" class="kt-link">JV Partner Indonesia</a>
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


    <!-- Modal Notification -->
    <div class="modal fade" id="show_output" tabindex="-1" role="dialog">
        <div class="modal-dialog " role="document">
            <div class="modal-content paper" style="padding-right: 20px;">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- <div class="row ">
                            <h5 for="nama" class="control-label font_pengumuman">Yth. Pengguna,</h5>
                        </div> -->
                        <div class="row">
                            <div id="isi_pesan" style="text-align: justify;" class="font_pengumuman desc_modal_user">
                                deskripsi
                            </div>
                        </div>
                        <!-- <div class="row pull-right">
                            <img src="assets/media/products/ttd.png" class="ttd">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- end:: Page -->

    <script>
        document.getElementById("api_key").value = "{{$data->api_key}}";
        document.getElementById("status").value = "{{$data->status}}";
        document.getElementById("username").value = "{{$data->username}}";
        document.getElementById("message").value = `{{$data->message}}`;
        document.getElementById("count_penerima").value = '{{$total}}';
        document.getElementById("report_self").value = `{{$report_self->message}}`;
        document.getElementById("status_report").value = '{{$report_self->status}}';

        $(document).ready(function() {
            // refresh_data();
            $("textarea")
                .each(function() {
                    this.setAttribute(
                        "style",
                        "height:" + (36 + this.scrollHeight) + "px;overflow-y:hidden;"
                    );
                })
                .on("input", function() {
                    this.style.height = this.scrollHeight + "px";
                });
            log_onload();
        });
    </script>


    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>

    <!-- <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script> -->
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
    <!-- File Javascript for this page -->
    <script src="js/all_blade.js"></script>
    <script src="js/autonotif.js"></script>

</body>

</html>
@endsection
