@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Data Rekening</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->

    <!--begin:: Vendor Plugins -->
    <link href="assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/all_blade.css" rel="stylesheet" type="text/css" />

    <!--end:: Vendor Plugins -->
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">


    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="assets_landing/media/logos/profit.ico" />
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <link href="assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
    <!-- File Javascript for this page -->
    <script src="js/admin/add_rekening_admin.js" type="text/javascript"></script>
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
                            <li class="kt-menu__item kt-menu__item--submenu " aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-layer"></i><span class="kt-menu__link-text ">Data User</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('user') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Akun & Rekening</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('data_event') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Event & Pengumuman</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('autonotif') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Autonotif</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item kt-menu__item--submenu " aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-box-1"></i><span class="kt-menu__link-text ">Data Paket</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('data_packet') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Daftar Paket</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{route('data_pembelian')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Riwayat Pembelian</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item kt-menu__item--submenu " aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon fas fa-wallet"></i><span class="kt-menu__link-text ">Top up Saldo</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('deposit_bank') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Daftar Rekening</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('data_deposit') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Riwayat Deposit User</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('pesan_autonotif') }}" class="kt-menu__link"><i class="kt-menu__link-icon flaticon-whatsapp"></i><span class="kt-menu__link-text">Pesan Autonotif</span></a>
                            </li>
                            <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('setting_admin') }}" class="kt-menu__link"><i class="kt-menu__link-icon flaticon2-settings"></i><span class="kt-menu__link-text">Pengaturan</span></a>
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
                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Welcome ,</span>
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
                                        <span class="btn btn-primary btn-sm btn-bold btn-font-md">Admin</span>
                                    </div>
                                </div>
                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <a href="{{ route('user') }}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-cardiogram kt-font-success"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Data Pengguna
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Pengaturan akun & rekening
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ route('data_event') }}" class="kt-notification__item">
                                        <div class="kt-notification__item-icon">
                                            <i class="flaticon2-browser kt-font-danger"></i>
                                        </div>
                                        <div class="kt-notification__item-details">
                                            <div class="kt-notification__item-title kt-font-bold">
                                                Pengumuman
                                            </div>
                                            <div class="kt-notification__item-time">
                                                Pengaturan event dan lainnya
                                            </div>
                                        </div>
                                    </a>
                                    <div class="kt-notification__custom kt-space-between">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        {{-- <a href="custom/user/login-v2&demo=demo12.html" target="_blank"
                                                    class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> --}}
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
                                        Data User </a>
                                    <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-fast-next"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a class="kt-subheader__breadcrumbs-link">
                                        Data Rekening </a>
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
                            <div class="col-xl-6 col-lg-6 order-lg-3 order-xl-1">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-sm-6 order-lg-2 order-xl-1">

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
                                                <h3 class="kt-widget14__title" id="saldo_now">
                                                    <!-- Rp 25.000 -->
                                                    Rp {{$user->saldo}}
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
                                    <div class="col-xl-6 col-lg-6 col-sm-6 order-lg-2 order-xl-1">

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
                                                <h3 class="kt-widget14__title" id="paket_now">
                                                    {{$count_paket}}
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
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 order-lg-3 order-xl-1">
                                        <div class="important_radius kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                            <div class="kt-portlet__head kt-portlet__head--lg marbot">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        Daftar Rekening
                                                    </h3>
                                                </div>
                                                <div class="kt-portlet__head-toolbar ">
                                                    <div class="dropdown dropdown-inline" style="padding-right: 7px;">
                                                        <a href="javascript:void();" target="blank" onclick="form_add();" style="margin-right:-2px;" type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                            <i class="flaticon2-add-square"></i>
                                                        </a>
                                                        <a href="{{route('info_rekening')}}" target="blank" type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                            <i class="flaticon2-exclamation"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="cek_list_bank">
                                                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm marbot">
                                                    <div class="kt-portlet__head-label cenmar">
                                                        <h3 class="kt-portlet__head-title">
                                                            Loading ...
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 order-lg-3 order-xl-1">
                                        <div class="bot_img important_radius kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                            <div class="marbot " style="height:130px;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 order-lg-3 order-xl-1">
                                <div class="important_radius kt-portlet kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--lg ">
                                        <div class="kt-portlet__head-toolbar marrig">

                                            <div class="dropdown dropdown-inline">

                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="modal" data-target="#tambahkan_user" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">

                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Tambah Rekening
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">

                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="modal" data-target="#tambahkan_user" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cenmar kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm ">
                                        <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-12 cenmar">
                                                        <br />
                                                        <div class="col-lg-12" id="alert_add">
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
                                                            <div class="input-group" id="daftar_paket">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-box-1"></i></span></div>
                                                                <select name="paket" class="form-control" id="paket" required="required">
                                                                    <option value="">---</option>
                                                                </select>
                                                            </div>

                                                        </div><br>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-6">
                                                        <label for="nama" class="col-sm-12 control-label">
                                                            <b>Jenis Paket :</b>
                                                        </label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group" id="daftar_paket">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-box-1"></i></span></div>
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
                                                            <div class="input-group" id="harga_paket">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-price-tag"></i></span></div>
                                                                <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" disabled>
                                                            </div>
                                                        </div><br>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-6">
                                                        <label for="nama" class="col-sm-12 control-label"><b>Masa Aktif :</b></label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group" id="durasi_paket">
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
                                                            <div class="input-group" id="no_rek">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                                                <input type="number" class="form-control" name="add_no_rekening" id="add_no_rekening" placeholder="Nomor Rekening" required>
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
                                                                <select name="add_service" class="form-control" id="add_service" required>
                                                                    <option value="">---</option>
                                                                </select>
                                                            </div>

                                                        </div><br>
                                                    </div>
                                                </div>
                                                <div class="row" id="company_id" style='display: none'>
                                                    <div class="col-lg-12">
                                                        <label for="nama" class="col-sm-6 control-label"><b>Company ID :</b></label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group" id="input_company">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-copyright"></i></span></div>
                                                                <input type="text" class="form-control" placeholder="Company ID" name="add_company" id="add_company" required>
                                                            </div>
                                                        </div><br>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 ">
                                                        <label for="nama" class="col-sm-12 control-label"><b>Username :</b></label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user-secret"></i></span></div>
                                                                <input type="text" class="form-control" placeholder="Username Ibank" name="add_username" minlength="6" id="add_username" required>
                                                            </div>
                                                        </div><br>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 ">
                                                        <label for="nama" class="col-sm-12 control-label"><b>Password :</b></label>
                                                        <div class="col-sm-12">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-key"></i></span></div>
                                                                <input type="text" placeholder="Password Ibank" class="form-control" name="add_password" minlength="6" id="add_password" required>
                                                            </div>
                                                        </div><br>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <center>
                                                        <br>
                                                        <input type="hidden" value="{{$user->id}}" id="id_data">
                                                        <input type="hidden" value="" id="id_update_rekening">
                                                        <input type="hidden" value="" id="id_perpanjang_rekening">
                                                        <div class="flex-equal text-end ms-1" id="div_btn">
                                                            <button type="submit" onclick="add_rekening()" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </center>
                                                </div>
                                            </div>
                                        </form>
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

    <!-- Modal Rincian Rekening -->
    <div class="modal fade" id="rincian_rekening" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h4>~ ~ Data Rekening ~ ~
                    </h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="nama" class="col-sm-12 control-label"><b>Paket Layanan :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-box-1"></i></span></div>
                                            <input type="text" class="form-control" placeholder="Nama Paket" name="rincian_paket_layanan" id="rincian_paket_layanan" disabled>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Jenis Paket :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-cube"></i></span></div>
                                            <select name="rincian_jenis_paket" class="form-control" id="rincian_jenis_paket" disabled>
                                                <option value="">---</option>
                                                <option value="normal">Normal</option>
                                                <option value="harian">Harian</option>
                                            </select>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Masa Aktif :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-time"></i></span></div>
                                            <input type="text" placeholder="Masa Aktif" class="form-control" name="rincian_masa_aktif" id="rincian_masa_aktif" disabled>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Harga :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-price-tag"></i></span></div>
                                            <input type="text" class="form-control" placeholder="Harga" name="rincian_harga" id="rincian_harga" disabled>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Status :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-contract"></i></span></div>
                                            <input type="text" placeholder="Status" class="form-control" name="rincian_status" id="rincian_status" disabled>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Nomor Rekening :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                            <input type="number" class="form-control" name="rincian_no_rekening" id="rincian_no_rekening" placeholder="Nomor Rekening" disabled>
                                        </div>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label">
                                        <b>Service :</b>
                                    </label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>
                                            <select name="rincian_service" class="form-control" id="rincian_service" disabled>
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
                            <div class="row" id="rincian_company_id" style='display: none'>
                                <div class="col-lg-12">
                                    <label for="nama" class="col-sm-6 control-label"><b>Company ID :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-copyright"></i></span></div>
                                            <input type="text" class="form-control" placeholder="Company ID" name="rincian_company" id="rincian_company" disabled>
                                        </div>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <!-- end:: Page -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>


    <script>
        document.getElementById("paket").onchange = function() {
            if (this.value == "") {
                document.getElementById("company_id").style.display = "none";
            }
        };

        $(document).ready(function() {
            getBank('{{$user->id}}');
            get_package();
        });
    </script>

</body>

</html>
@endsection
