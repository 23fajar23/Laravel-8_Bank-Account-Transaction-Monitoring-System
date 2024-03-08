@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Profil</title>
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
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('home') }}" class="kt-menu__link kt-menu__item--active"><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a>
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
                            <li class="kt-menu__item kt-menu__item--active" aria-haspopup="true"><a href="{{ route('profil') }}" class="kt-menu__link"><i class="kt-menu__link-icon flaticon2-settings"></i><span class="kt-menu__link-text">Pengaturan</span></a>
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
                                        Pengaturan </a>
                                    <!-- <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-fast-next"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a class="kt-subheader__breadcrumbs-link">
                                        Data Akun </a> -->
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
                            <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">

                                <!--begin:: Widgets/Daily Sales-->
                                <div class=" kt-portlet kt-portlet--height-fluid" style="min-height:150px;">
                                    <div class="important_radius kt-widget14" style="min-height: 150px; background-image: url(assets/media/products/back.jpg)">
                                        <!-- <div class="kt-widget14__header kt-margin-b-30 position_name">
                                            <h3>
                                                Fullname Fullname
                                            </h3>
                                            Member

                                        </div> -->

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="img_user col-xl-10 col-lg-10 order-lg-2 order-xl-1">
                                <img alt="Pic" class="kt-radius-100 size_img" src="assets/media/users/300_25.jpg" />

                            </div> -->

                            <div class="col-xl-12 col-lg-12 order-lg-3 order-xl-1">
                                <div class="important_radius kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                    <div class="kt-portlet__head kt-portlet__head--lg marbot">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Pengaturan Akun
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                                        <div class="kt-portlet">
                                            <div class="kt-portlet__body kt-portlet__body--fit">
                                                <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
                                                    <div class="kt-grid__item kt-wizard-v2__aside">

                                                        <!--begin: Form Wizard Nav -->
                                                        <div class="kt-wizard-v2__nav">
                                                            <div class="kt-wizard-v2__nav-items">

                                                                <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                                                                <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                                                    <div class="kt-wizard-v2__nav-body">
                                                                        <div class="kt-wizard-v2__nav-icon">
                                                                            <i class="flaticon-users-1"></i>
                                                                        </div>
                                                                        <div class="kt-wizard-v2__nav-label">
                                                                            <div class="kt-wizard-v2__nav-label-title">
                                                                                Profil Akun
                                                                            </div>
                                                                            <div class="kt-wizard-v2__nav-label-desc">
                                                                                Data Diri Pengguna
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                                                    <div class="kt-wizard-v2__nav-body">
                                                                        <div class="kt-wizard-v2__nav-icon">
                                                                            <i class="flaticon2-phone"></i>
                                                                        </div>
                                                                        <div class="kt-wizard-v2__nav-label">
                                                                            <div class="kt-wizard-v2__nav-label-title">
                                                                                Info Kontak
                                                                            </div>
                                                                            <div class="kt-wizard-v2__nav-label-desc">
                                                                                Email & Telephone
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kt-wizard-v2__nav-item" href="#" data-toggle="modal" data-target="#keamanan">
                                                                    <div class="kt-wizard-v2__nav-body">
                                                                        <div class="kt-wizard-v2__nav-icon">
                                                                            <i class="flaticon2-shield"></i>
                                                                        </div>
                                                                        <div class="kt-wizard-v2__nav-label">
                                                                            <div class="kt-wizard-v2__nav-label-title">
                                                                                Keamanan
                                                                            </div>
                                                                            <div class="kt-wizard-v2__nav-label-desc">
                                                                                Kata Sandi Pengguna
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="kt-wizard-v2__nav-item" href="#" data-toggle="modal" data-target="#modal_wa">
                                                                    <div class="kt-wizard-v2__nav-body">
                                                                        <div class="kt-wizard-v2__nav-icon">
                                                                            <i class="flaticon-whatsapp"></i>
                                                                        </div>
                                                                        <div class="kt-wizard-v2__nav-label">
                                                                            <div class="kt-wizard-v2__nav-label-title">
                                                                                Notifikasi WhatsApp
                                                                            </div>
                                                                            <div class="kt-wizard-v2__nav-label-desc">
                                                                                Notifikasi Laporan Aktivitas
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--end: Form Wizard Nav -->
                                                    </div>
                                                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
                                                        <!--begin: Form Wizard Form-->
                                                        <form class="kt-form" id="kt_form">
                                                            <!--begin: Form Wizard Step 1-->
                                                            <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                                                <div class="kt-heading kt-heading--md"> Profil Pengguna <button type="submit" data-toggle="modal" data-target="#profil_pengguna" class="btn btn-label btn-label-brand btn-sm btn-bold pull-right">Perbarui</button> </div>
                                                                <div class="kt-form__section kt-form__section--first">
                                                                    <div class="kt-wizard-v2__form">
                                                                        <div class="form-group">
                                                                            <label>Nama Pengguna : </label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-user"></i></span></div>
                                                                                <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" value="" disabled>
                                                                            </div>
                                                                            <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Nama Lengkap : </label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">
                                                                                        <i class="flaticon2-layers"></i>
                                                                                    </span>
                                                                                </div>
                                                                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="" disabled>
                                                                            </div>
                                                                            <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 form-group">
                                                                                <label>Jenis Kelamin : </label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-users-1"></i></span></div>
                                                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" disabled>
                                                                                        <option value="">---</option>
                                                                                        <option value="laki-laki">Laki-Laki</option>
                                                                                        <option value="perempuan">Perempuan</option>
                                                                                    </select>
                                                                                </div>
                                                                                <!-- <input type="text" class="form-control" name="fname" placeholder="First Name" value="John"> -->
                                                                                <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                                                            </div>
                                                                            <div class="col-lg-6 form-group">
                                                                                <label>Kota : </label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-map"></i></span></div>
                                                                                    <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="" disabled>
                                                                                </div>
                                                                                <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Alamat : </label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-pin"></i></span></div>
                                                                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="" disabled>
                                                                            </div>
                                                                            <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6 form-group">
                                                                                <label>Perusahaan : </label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-rocket"></i></span></div>
                                                                                    <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="-" value="" disabled>
                                                                                </div>
                                                                                <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                                                            </div>
                                                                            <div class="col-lg-6 form-group">
                                                                                <label>Jabatan : </label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-group"></i></span></div>
                                                                                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="-" value="" disabled>
                                                                                </div>
                                                                                <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--end: Form Wizard Step 1-->

                                                            <!--begin: Form Wizard Step 2-->

                                                            <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                                                <div class="kt-heading kt-heading--md">Informasi Kontak <button type="submit" data-toggle="modal" data-target="#informasi_kontak" class="btn btn-label btn-label-brand btn-sm btn-bold pull-right">Perbarui</button> </div>
                                                                <div class="kt-form__section kt-form__section--first">
                                                                    <div class="kt-wizard-v2__form">
                                                                        <div class="row">
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label>E-Mail : </label>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-multimedia"></i></span></div>
                                                                                        <input type="text" class="form-control" placeholder="Email" value="{{Auth::user()->email}}" disabled>
                                                                                    </div>
                                                                                    <!-- <span class="form-text text-muted">Please enter your Address.</span> -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="form-group">
                                                                                    <label>Nomor Telephone : </label>
                                                                                    <div class="input-group">
                                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-whatsapp"></i></span></div>
                                                                                        <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Telp" value="" disabled>
                                                                                    </div>
                                                                                    <!-- <span class="form-text text-muted">Please enter your Address.</span> -->
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--end: Form Wizard Step 2-->


                                                        </form>

                                                        <!--end: Form Wizard Form-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
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


    <!-- Begin Form Modal -->

    <div class="modal fade" id="profil_pengguna" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h4>Profil Pengguna
                    </h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Pengguna : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-user"></i></span></div>
                                    <input type="text" class="form-control" name="change_username" id="change_username" placeholder="Nama Pengguna" value="" minlength="5" maxlength="11" required>
                                </div>
                                <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="flaticon2-layers"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="change_fullname" id="change_fullname" placeholder="Nama Lengkap" value="" minlength="8" maxlength="30" required>
                                </div>
                                <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Jenis Kelamin : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-users-1"></i></span></div>
                                        <select name="change_jenis_kelamin" id="change_jenis_kelamin" class="form-control" required>
                                            <option value="">---</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Kota : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-map"></i></span></div>
                                        <input type="text" class="form-control" name="change_kota" id="change_kota" placeholder="Kota" value="" required>
                                    </div>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-pin"></i></span></div>
                                    <input type="text" class="form-control" name="change_alamat" id="change_alamat" placeholder="Alamat" value="" required>
                                </div>
                                <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Perusahaan : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-rocket"></i></span></div>
                                        <input type="text" class="form-control" name="change_perusahaan" id="change_perusahaan" placeholder="Perusahaan" value="">
                                    </div>
                                    <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Jabatan : </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-group"></i></span></div>
                                        <input type="text" class="form-control" name="change_jabatan" id="change_jabatan" placeholder="Jabatan" value="">
                                    </div>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>


                            <div class="col-sm-12">

                                <center>
                                    <div class="flex-equal text-end ms-1">
                                        <button type="submit" onclick={send_profil()} class="btn btn-primary">Kirim</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade" id="informasi_kontak" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h4>Informasi Kontak
                    </h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>E-Mail : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-multimedia"></i></span></div>
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{Auth::user()->email}}" disabled>
                                        </div>
                                        <!-- <span class="form-text text-muted">Please enter your Address.</span> -->
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Nomor Telephone : </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-whatsapp"></i></span></div>
                                            <input type="number" class="form-control" name="change_no_hp" id="change_no_hp" placeholder="No Telp" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">

                                <center>
                                    <div class="flex-equal text-end ms-1">
                                        <button type="submit" onclick={send_kontak()} class="btn btn-primary">Kirim</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="modal fade" id="keamanan" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h4>Keamanan Akun
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Kata Sandi</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-key"></i></span></div>
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Kata Sandi Baru" value="" minlength="8" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <center>
                                    <div class="flex-equal text-end ms-1">
                                        <button type="submit" onclick={change_password()} class="btn btn-primary">Kirim</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Notification WA-->
    <div class="modal fade" id="modal_wa" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h3 id="event_judul">
                        ~ Notifikasi WhatsApp ~
                    </h3>
                </div>
                <div class="notice_key">
                    <h6>
                        <span class="kt-menu__link-icon flaticon2-warning"></span>
                        Pastikan Nomor Telepon Anda Memiliki Akun WhatsApp
                    </h6>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama" class="col-sm-12 control-label">
                            <b>Status :</b>
                        </label>
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-paper"></i></span></div>
                                <select name="notif" class="form-control" id="notif" required="required">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak_aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <center><button class="btn btn-primary" onclick={save_status_wa();}>Simpan</button> </center>
                    <br />
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

    <script>
        document.getElementById("username").value = "{{$data->name}}";
        document.getElementById("fullname").value = "{{$data->fullname}}";
        document.getElementById("jenis_kelamin").value = "{{$data->jenis_kelamin}}";
        document.getElementById("alamat").value = "{{$data->alamat}}";
        document.getElementById("kota").value = "{{$data->kota}}";
        document.getElementById("perusahaan").value = "{{$data->perusahaan}}";
        document.getElementById("jabatan").value = "{{$data->jabatan}}";
        document.getElementById("no_hp").value = "{{$data->no_hp}}";

        document.getElementById("notif").value = "{{Auth::user()->notif_wa}}";

        document.getElementById("change_username").value = "{{$data->name}}";
        document.getElementById("change_fullname").value = "{{$data->fullname}}";
        document.getElementById("change_jenis_kelamin").value = "{{$data->jenis_kelamin}}";
        document.getElementById("change_alamat").value = "{{$data->alamat}}";
        document.getElementById("change_kota").value = "{{$data->kota}}";
        document.getElementById("change_perusahaan").value = "{{$data->perusahaan}}";
        document.getElementById("change_jabatan").value = "{{$data->jabatan}}";
        document.getElementById("change_no_hp").value = "{{$data->no_hp}}";
    </script>

    <!-- End Form Modal -->
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>

    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
    <script src="assets/js/pages/custom/wizard/wizard-2.js" type="text/javascript"></script>

    <!-- File Javascript for this page -->
    <script src="js/all_blade.js"></script>
    <script src="js/profil.js" type="text/javascript"></script>
</body>

</html>
@endsection
