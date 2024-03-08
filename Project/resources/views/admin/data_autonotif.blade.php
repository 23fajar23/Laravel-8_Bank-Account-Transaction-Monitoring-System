@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Pesan Autonotif</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->

    <!--end::Page Vendors Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->

    <!--begin:: Vendor Plugins -->
    <link href="assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
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
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>

    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>

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
                            <li class="kt-menu__item kt-menu__item--active" aria-haspopup="true"><a href="{{ route('pesan_autonotif') }}" class="kt-menu__link"><i class="kt-menu__link-icon flaticon-whatsapp"></i><span class="kt-menu__link-text">Pesan Autonotif</span></a>
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
                                        Pesan Autonotif </a>
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
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-user"></i></span></div>
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 form-group">
                                                    <label><b>Status Autonotif : </b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
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
                                    <div class="kt-widget14">
                                        <h4 class="kt-widget14__title">
                                            <center> - - Pesan Manual - - </center>
                                        </h4>
                                        <div class="row">
                                            <div class="col-lg-12" id="alert_notif_fast">
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
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-6 form-group">
                                                    <label><b>Data Autonotif : </b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-layers"></i></span></div>
                                                        <select name="status_autonotif" id="status_autonotif" class="form-control" required>
                                                            <option value="admin">Data Admin</option>
                                                            <option value="manual">Manual</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 form-group">
                                                    <label><b>Penerima : </b></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-avatar"></i></span></div>
                                                        <select name="status_penerima" id="status_penerima" class="form-control" required>
                                                            <option value="all_user">Semua User</option>
                                                            <option value="manual">Manual</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div id="new_api_key" style="display:none;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 form-group">
                                                        <label><b>API Key : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-rocket"></i></span></div>
                                                            <input type="text" class="form-control" name="fast_api_key" id="fast_api_key" placeholder="API Key" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 form-group">
                                                        <label><b>Username : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-user"></i></span></div>
                                                            <input type="text" class="form-control" name="fast_username" id="fast_username" placeholder="Username" value="" required>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div id="manual_phone" style='display: none'>
                                                <div class="form-group" id="field_penerima">
                                                    <label><b>No.WhatsApp : </b></label>
                                                    <input type="hidden" class="form-control" name="count_penerima" id="count_penerima" value="1">
                                                    <div id="data_penerima0">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon-whatsapp"></i></span></div>
                                                            <input type="number" class="form-control" name="penerima0" id="penerima0" placeholder="No Hp Penerima 1" value="" required>
                                                            <span class="input-group-text" onclick="add_penerima()" style="margin-left: 20px;"><i class="flaticon2-plus"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Message : </b></label>
                                                <button class="button_primary2 pull-right" onclick="style_textarea(fast_message, 'Strikethrough')" style="text-decoration: line-through;">
                                                    Text
                                                </button>
                                                <button class="button_primary2 pull-right" onclick="style_textarea(fast_message, 'italic')" style="font-style: italic;">i</button>
                                                <button class="button_primary2 pull-right" onclick="style_textarea(fast_message, 'bold')">B</button>
                                                <textarea class="form-control" style="min-height: 150px;" name="fast_message" id="fast_message" placeholder="Isi Pesan" required></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <center>
                                                    <div class="flex-equal text-end ms-1" id="btn_send_fast">
                                                        <button type="submit" onclick="send_fast_message()" class="btn btn-label btn-label-brand">Kirim</button>
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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Autonotif OTP
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-otp" value="on" type="button" onclick="toggle_show('otp');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-otp"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-otp">
                                        <div class="col-lg-6">
                                            <table class="table table-bordered table-striped " id="table_word">
                                                <thead>
                                                    <tr class="tb_cen">
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Tampilan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>(otp)</td>
                                                        <td>Kode OTP</td>
                                                    </tr>

                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_otp" id="status_otp" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_otp, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_otp, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_otp, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_otp" id="message_otp" placeholder="Isi Pesan"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('otp')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('otp')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center>
                                                        <br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!--end:: Widgets/Daily Sales-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 order-lg-2 order-xl-1">
                                <!--begin:: Widgets/Daily Sales-->
                                <div class="important_radius kt-portlet  kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--lg marbot">
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Autonotif Register
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-register" value="on" type="button" onclick="toggle_show('register');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-register"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-register">
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
                                                        <td>(name)</td>
                                                        <td>Nama User</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(fullname)</td>
                                                        <td>Nama Lengkap</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(alamat)</td>
                                                        <td>Alamat User</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(kota)</td>
                                                        <td>Nama Kota</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(no_hp)</td>
                                                        <td>Nomor Handphone</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(perusahaan)</td>
                                                        <td>Nama Perusahaan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(jabatan)</td>
                                                        <td>Nomor Jabatan</td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>(saldo)</td>
                                                        <td>Saldo Saat Ini</td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>(email)</td>
                                                        <td>Alamat Email</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>(password)</td>
                                                        <td>Kata Sandi</td>
                                                    </tr>

                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_register" id="status_register" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_register, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_register, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_register, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_register" id="message_register" placeholder="Isi Pesan"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('register')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('register')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Rekening Baru
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-bank" value="on" type="button" onclick="toggle_show('bank');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-bank"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-bank">
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
                                                        <td>(service)</td>
                                                        <td>Nama Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(nama_paket)</td>
                                                        <td>Nama Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(harga)</td>
                                                        <td>Harga Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(durasi)</td>
                                                        <td>Masa Aktif</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(date)</td>
                                                        <td>Tanggal Pembelian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(expired)</td>
                                                        <td>jatuh Tempo</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_add_bank" id="status_add_bank" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_add_bank, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_add_bank, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_add_bank, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_add_bank" id="message_add_bank" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('add_bank')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('add_bank')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Masa Aktif Paket Habis
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-paket_expired" value="on" type="button" onclick="toggle_show('paket_expired');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-paket_expired"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-paket_expired">
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
                                                        <td>(service)</td>
                                                        <td>Nama Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(nama_paket)</td>
                                                        <td>Nama Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(harga)</td>
                                                        <td>Harga Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(durasi)</td>
                                                        <td>Masa Aktif</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(date)</td>
                                                        <td>Tanggal Pembelian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(expired)</td>
                                                        <td>jatuh Tempo</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_paket_expired" id="status_paket_expired" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_expired, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_expired, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_expired, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_paket_expired" id="message_paket_expired" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('paket_expired')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('paket_expired')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Perpanjangan Paket Harian Berhasil
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-paket_harian_perpanjangan" value="on" type="button" onclick="toggle_show('paket_harian_perpanjangan');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-paket_harian_perpanjangan"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-paket_harian_perpanjangan">
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
                                                        <td>(service)</td>
                                                        <td>Nama Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(nama_paket)</td>
                                                        <td>Nama Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(harga)</td>
                                                        <td>Harga Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(durasi)</td>
                                                        <td>Masa Aktif</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(date)</td>
                                                        <td>Tanggal Pembelian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(expired)</td>
                                                        <td>jatuh Tempo</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_paket_harian_perpanjangan" id="status_paket_harian_perpanjangan" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_perpanjangan, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_perpanjangan, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_perpanjangan, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_paket_harian_perpanjangan" id="message_paket_harian_perpanjangan" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('paket_harian_perpanjangan')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('paket_harian_perpanjangan')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Perpanjangan Paket Harian Gagal
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-paket_harian_saldo" value="on" type="button" onclick="toggle_show('paket_harian_saldo');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-paket_harian_saldo"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-paket_harian_saldo">
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
                                                        <td>(service)</td>
                                                        <td>Nama Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(nama_paket)</td>
                                                        <td>Nama Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(harga)</td>
                                                        <td>Harga Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(durasi)</td>
                                                        <td>Masa Aktif</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(date)</td>
                                                        <td>Tanggal Pembelian</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(expired)</td>
                                                        <td>jatuh Tempo</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_paket_harian_saldo" id="status_paket_harian_saldo" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_saldo, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_saldo, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_saldo, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_paket_harian_saldo" id="message_paket_harian_saldo" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('paket_harian_saldo')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('paket_harian_saldo')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Paket Harian Dihapus/Dinonaktifkan
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-paket_harian_delete" value="on" type="button" onclick="toggle_show('paket_harian_delete');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-paket_harian_delete"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-paket_harian_saldo">
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
                                                        <td>(nama_paket)</td>
                                                        <td>Nama Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(harga)</td>
                                                        <td>Harga</td>
                                                    </tr>

                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_paket_harian_delete" id="status_paket_harian_delete" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_delete, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_delete, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_paket_harian_delete, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_paket_harian_delete" id="message_paket_harian_delete" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('paket_harian_delete')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('paket_harian_delete')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Login Mutasi Scrap Gagal
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-failed_login" value="on" type="button" onclick="toggle_show('failed_login');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-failed_login"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-failed_login">
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
                                                        <td>(service)</td>
                                                        <td>Nama Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(nama_paket)</td>
                                                        <td>Nama Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(harga)</td>
                                                        <td>Harga Paket</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(expired)</td>
                                                        <td>Jatuh Tempo</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_gagal_scrap" id="status_gagal_scrap" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_add_bank, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_add_bank, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_add_bank, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_gagal_scrap" id="message_gagal_scrap" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('gagal_scrap')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('gagal_scrap')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Top-up Saldo
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-topup" value="on" type="button" onclick="toggle_show('topup');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-topup"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-topup">
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
                                                        <td>Nominal Isi Ulang</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(tagihan)</td>
                                                        <td>Nominal Pembayaran</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(nama_rekening)</td>
                                                        <td>Nama Akun Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(service)</td>
                                                        <td>Jenis Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(expired)</td>
                                                        <td>Jatuh Tempo</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(kode_unik)</td>
                                                        <td>Kode Unik</td>
                                                    </tr>

                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_top_up" id="status_top_up" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_top_up, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_top_up, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_top_up, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_top_up" id="message_top_up" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">

                                                                <button type="submit" onclick="save_message('top_up')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('top_up')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Pembayaran Berhasil
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-success" value="on" type="button" onclick="toggle_show('success');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-success"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-success">
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
                                                        <td>Nominal Isi Ulang</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(tagihan)</td>
                                                        <td>Nominal Pembayaran</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(nama_rekening)</td>
                                                        <td>Nama Akun Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(service)</td>
                                                        <td>Jenis Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(expired)</td>
                                                        <td>Jatuh Tempo</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(kode_unik)</td>
                                                        <td>Kode Unik</td>
                                                    </tr>
                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_payment_success" id="status_payment_success" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_payment_success, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_payment_success, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_payment_success, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_payment_success" id="message_payment_success" placeholder="Isi Pesan"></textarea>
                                                    </div>
                                                    <div class="col-sm-12">

                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">
                                                                <button type="submit" onclick="save_message('payment_success')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('payment_success')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <i class="flaticon2-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title" id="judul_pengguna">
                                                Pembayaran Gagal
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar marrig">
                                            <div class="dropdown dropdown-inline">
                                                <button id="btn-failed" value="on" type="button" onclick="toggle_show('failed');" class="btn btn-clean btn-sm btn-icon btn-icon-md">
                                                    <div id="value-failed"><i class="flaticon2-down"></i></div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row collapse show" id="collapse-failed">
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
                                                        <td>Nominal Isi Ulang</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>(tagihan)</td>
                                                        <td>Nominal Pembayaran</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>(no_rekening)</td>
                                                        <td>Nomor Rekening</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>(nama_rekening)</td>
                                                        <td>Nama Akun Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>(service)</td>
                                                        <td>Jenis Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>(expired)</td>
                                                        <td>Jatuh Tempo</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>(kode_unik)</td>
                                                        <td>Kode Unik</td>
                                                    </tr>

                                                </tbody>
                                            </table><br />
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="box_msg">
                                                <form method="post" action="javascript:void();">
                                                    <div class="form-group">
                                                        <label><b>Status : </b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-check-mark"></i></span></div>
                                                            <select name="status_payment_failed" id="status_payment_failed" class="form-control" required>
                                                                <option value="">---</option>
                                                                <option value="aktif">Aktif</option>
                                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label><b>Message : </b></label>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_payment_failed, 'Strikethrough')" style="text-decoration: line-through;">
                                                            Text
                                                        </button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_payment_failed, 'italic')" style="font-style: italic;">i</button>
                                                        <button class="button_primary2 pull-right" onclick="style_textarea(message_payment_failed, 'bold')">B</button>
                                                        <textarea class="form-control" style="min-height: 150px;" name="message_payment_failed" id="message_payment_failed" placeholder="Isi Pesan"></textarea>

                                                    </div>
                                                    <div class="col-sm-12">
                                                        <center>
                                                            <div class="flex-equal text-end ms-1" id="btn_send">

                                                                <button type="submit" onclick="save_message('payment_failed')" class="btn btn-label btn-label-brand">Simpan</button>
                                                                <button type="submit" onclick="view_output('payment_failed')" class="btn btn-label btn-label-success">Lihat Hasil</button>
                                                            </div>
                                                        </center><br />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>

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


    <!-- end:: Page -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
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

    <script type="text/javascript">
        document.getElementById("status_autonotif").onchange = function() {
            if (this.value == "manual") {
                document.getElementById("new_api_key").style.display = "";
            } else {
                document.getElementById("new_api_key").style.display = "none";
            }
        };

        document.getElementById("status_penerima").onchange = function() {
            if (this.value == "manual") {
                document.getElementById("manual_phone").style.display = "";
            } else {
                document.getElementById("manual_phone").style.display = "none";
            }
        };

        document.getElementById('api_key').value = "{{$admin->api_key}}";
        document.getElementById('username').value = "{{$admin->username}}";
        document.getElementById('status').value = "{{$admin->status}}";
        $('#space-otp').html('<br />');
        $('#space-register').html('<br />');

        // Get Data to textarea
        document.getElementById('message_otp').value = `{{$data_autonotif['otp']->message}}`;
        document.getElementById('message_register').value = `{{$data_autonotif['register']->message}}`;
        document.getElementById('message_add_bank').value = `{{$data_autonotif['add_bank']->message}}`;
        document.getElementById('message_paket_expired').value = `{{$data_autonotif['paket_expired']->message}}`;
        document.getElementById('message_gagal_scrap').value = `{{$data_autonotif['gagal_scrap']->message}}`;
        document.getElementById('message_top_up').value = `{{$data_autonotif['topup']->message}}`;
        document.getElementById('message_payment_success').value = `{{$data_autonotif['payment_success']->message}}`;
        document.getElementById('message_payment_failed').value = `{{$data_autonotif['payment_failed']->message}}`;
        document.getElementById('message_paket_harian_saldo').value = `{{$data_autonotif['paket_harian_saldo']->message}}`;
        document.getElementById('message_paket_harian_perpanjangan').value = `{{$data_autonotif['paket_harian_perpanjangan']->message}}`;
        document.getElementById('message_paket_harian_delete').value = `{{$data_autonotif['paket_harian_delete']->message}}`;

        // Get Data to Status Textarea
        document.getElementById('status_otp').value = `{{$data_autonotif['otp']->status}}`;
        document.getElementById('status_register').value = `{{$data_autonotif['register']->status}}`;
        document.getElementById('status_add_bank').value = `{{$data_autonotif['add_bank']->status}}`;
        document.getElementById('status_paket_expired').value = `{{$data_autonotif['paket_expired']->status}}`;
        document.getElementById('status_gagal_scrap').value = `{{$data_autonotif['gagal_scrap']->status}}`;
        document.getElementById('status_top_up').value = `{{$data_autonotif['topup']->status}}`;
        document.getElementById('status_payment_success').value = `{{$data_autonotif['payment_success']->status}}`;
        document.getElementById('status_payment_failed').value = `{{$data_autonotif['payment_failed']->status}}`;
        document.getElementById('status_paket_harian_saldo').value = `{{$data_autonotif['paket_harian_saldo']->status}}`;
        document.getElementById('status_paket_harian_perpanjangan').value = `{{$data_autonotif['paket_harian_perpanjangan']->status}}`;
        document.getElementById('status_paket_harian_delete').value = `{{$data_autonotif['paket_harian_delete']->status}}`;
    </script>
    <!-- File Javascript for this page -->
    <script src="js/admin/data_admin_autonotif.js" type="text/javascript"></script>
</body>

</html>
@endsection
