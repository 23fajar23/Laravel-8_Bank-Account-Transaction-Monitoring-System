@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link href="assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/all_blade.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets_landing/media/logos/profit.ico" />
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
                            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ route('home') }}" class="kt-menu__link kt-menu__item--active"><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a>
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
                                        Dashboard </a>
                                    <!-- <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-fast-next"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a class="kt-subheader__breadcrumbs-link">
                                        Data Akun </a> -->
                                </div>
                            </div>
                            <div class="kt-subheader__toolbar size-ttp">
                                <div class="kt-subheader__wrapper">
                                    <!-- <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Mutasi daterange" data-placement="left">
                                        <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                                        <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--sm">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                    </a> -->

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-sm-6 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid animate">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <!--Begin Logo SVG  -->
                                            <div class="field_logo">
                                                <div class="box_logo pull-right" style="background-color: rgb(94, 94, 211);">
                                                    <img src="assets/media/users/wallet.png" class="img_logo">
                                                </div>

                                            </div>
                                            <!--End Logo SVG  -->

                                        </div>
                                        <h5 class="kt-widget14__title uptext" style="color: rgb(101, 101, 216);">
                                            Saldo
                                        </h5>
                                        <h3 class="kt-widget14__title ">
                                            <!-- Rp 25.000 -->
                                            Rp {{Auth::User()->saldo}}
                                        </h3>


                                        <!-- Gunakan col-lg-6 dan col-sm-6 untuk penataan layout -->
                                        <br />
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Info-circle.svg-->
                                            <svg xmlns=" http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="20" height="20" />
                                                    <circle fill="rgb(101, 101, 216)" cx="12" cy="12" r="10" />
                                                    <rect fill="#FFFFFF" x="11" y="10" width="2" height="7" rx="1" />
                                                    <rect fill="#FFFFFF" x="11" y="7" width="2" height="2" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        Saldo anda saat ini

                                    </div>
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Revenue Change-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid animate">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <!--Begin Logo SVG  -->
                                            <div class="field_logo">
                                                <div class="box_logo pull-right" style="background-color: rgb(45, 72, 221);">
                                                    <img src="assets/media/users/package.png" class="img_logo">
                                                </div>

                                            </div>
                                            <!--End Logo SVG  -->

                                        </div>
                                        <h5 class="kt-widget14__title uptext" style="color: rgb(45, 72, 221);">
                                            Paket
                                        </h5>
                                        <h3 class="kt-widget14__title ">
                                            {{$riwayat_pembelian}}
                                        </h3>


                                        <!-- Gunakan col-lg-6 dan col-sm-6 untuk penataan layout -->
                                        <br />
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Info-circle.svg-->
                                            <svg xmlns=" http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="20" height="20" />
                                                    <circle fill="rgb(45, 72, 221)" cx="12" cy="12" r="10" />
                                                    <rect fill="#FFFFFF" x="11" y="10" width="2" height="7" rx="1" />
                                                    <rect fill="#FFFFFF" x="11" y="7" width="2" height="2" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        Jumlah Pembelian Paket

                                    </div>
                                </div>

                                <!--end:: Widgets/Revenue Change-->
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid animate">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <!--Begin Logo SVG  -->
                                            <div class="field_logo">
                                                <div class="box_logo pull-right" style="background-color: rgb(132, 231, 40);">
                                                    <img src="assets/media/users/credit-card.png" class="img_logo">
                                                </div>

                                            </div>
                                            <!--End Logo SVG  -->

                                        </div>
                                        <h5 class="kt-widget14__title uptext" style="color: rgb(43, 182, 15);">
                                            Rekening
                                        </h5>
                                        <h3 class="kt-widget14__title ">
                                            {{$data}}
                                        </h3>


                                        <!-- Gunakan col-lg-6 dan col-sm-6 untuk penataan layout -->
                                        <br />
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Info-circle.svg-->
                                            <svg xmlns=" http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="20" height="20" />
                                                    <circle fill="rgb(43, 182, 15)" cx="12" cy="12" r="10" />
                                                    <rect fill="#FFFFFF" x="11" y="10" width="2" height="7" rx="1" />
                                                    <rect fill="#FFFFFF" x="11" y="7" width="2" height="2" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        Total Rekening Terdaftar

                                    </div>
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                            <div class="col-xl-3 col-lg-3 col-sm-6 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Revenue Change-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid animate">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <!--Begin Logo SVG  -->
                                            <div class="field_logo">
                                                <div class="box_logo pull-right" style="background-color: rgb(98, 100, 211);">
                                                    <img src="assets/media/users/database.png" class="img_logo">
                                                </div>

                                            </div>
                                            <!--End Logo SVG  -->

                                        </div>
                                        <h5 class="kt-widget14__title uptext" style="color: rgb(98, 100, 211);">
                                            Mutasi
                                        </h5>
                                        <h3 class="kt-widget14__title ">
                                            {{$transaksi}}
                                        </h3>


                                        <!-- Gunakan col-lg-6 dan col-sm-6 untuk penataan layout -->
                                        <br />
                                        <span class="svg-icon">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Code/Info-circle.svg-->
                                            <svg xmlns=" http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="20" height="20" />
                                                    <circle fill="rgb(98, 100, 211)" cx="12" cy="12" r="10" />
                                                    <rect fill="#FFFFFF" x="11" y="10" width="2" height="7" rx="1" />
                                                    <rect fill="#FFFFFF" x="11" y="7" width="2" height="2" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                        Total Mutasi Rekening

                                    </div>
                                </div>

                                <!--end:: Widgets/Revenue Change-->
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xl-8 col-lg-8 order-lg-1 order-xl-1">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid" style="min-height:400px;">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <h3 class="kt-widget14__title">
                                                Pusat Informasi :
                                            </h3>

                                            <div class="kt-widget3 martop" id="pengumuman">
                                                <div id="pengumuman">
                                                    Memuat Berita ...
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>

                            <div class="col-xl-4 col-lg-4 order-lg-2 order-xl-2">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid-half" style="height: 320px;">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <h3 class="kt-widget14__title">
                                                Status Layanan :
                                                <div class="pull-right status_layanan">
                                                    Kondisi
                                                </div>
                                            </h3>
                                        </div>
                                        <h6 class="botmin">
                                            <!-- E-Banking :
                                            <br /> -->
                                            Bank BCA
                                            <div class="pull-right status_tersedia">
                                                Tersedia
                                            </div> <br /><br />
                                            Bank BRI
                                            <div class="pull-right status_tersedia">
                                                Tersedia
                                            </div> <br /><br />
                                            Bank Mandiri
                                            <div class="pull-right status_tersedia">
                                                Tersedia
                                            </div> <br /><br />
                                            Bank BNI
                                            <div class="pull-right status_tersedia">
                                                Tersedia
                                            </div> <br /><br />
                                            <!-- E-Banking :
                                            <br /> -->
                                            Paypal
                                            <div class="pull-right status_belum_tersedia">
                                                Belum Tersedia
                                            </div> <br /><br />
                                            Go-Pay
                                            <div class="pull-right status_belum_tersedia">
                                                Belum Tersedia
                                            </div> <br /><br />
                                            OVO
                                            <div class="pull-right status_belum_tersedia">
                                                Belum Tersedia
                                            </div>
                                        </h6>


                                    </div>
                                </div>
                                <div>

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

    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
    <!-- File Javascript for this page -->
    <script src="js/all_blade.js"></script>
    <script src="js/home.js" type="text/javascript"></script>
</body>

</html>
@endsection
