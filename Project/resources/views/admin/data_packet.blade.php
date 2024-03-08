@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Daftar Paket</title>
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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <script src="assets/datatable/jquery-3.5.1.min.js"></script>
    <link href="assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
    <script src="assets/datatable/jquery.dataTables.min.js"></script>

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

    <!-- <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script> -->
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
    <!-- File Javascript for this page -->
    <script src="js/admin/data_packet.js" type="text/javascript"></script>
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
                            <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--active" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-box-1"></i><span class="kt-menu__link-text ">Data Paket</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item kt-menu__item--active" aria-haspopup="true"><a href="{{ route('data_packet') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Daftar Paket</span></a></li>
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
                                        Data Paket </a>
                                    <a class="kt-subheader__breadcrumbs-home"><i class="flaticon2-fast-next"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a class="kt-subheader__breadcrumbs-link">
                                        Daftar Paket </a>
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
                                <div class="important_radius kt-portlet kt-portlet--height-fluid animate">
                                    <div class="kt-widget14">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="bank_box" style="background-color: #97cbf0;color: #0066ae;">
                                                    <h4 class="kt-widget14__title marbot_15" style="padding-left: 40px;"><br />
                                                        Bank BCA <i class="flaticon2-check-mark"></i>
                                                    </h4>
                                                    <ul class="ul_pesan">
                                                        <li style="color:black;">
                                                            <h2>
                                                                {{$output['bca']}}
                                                            </h2>
                                                        </li>
                                                        <li style="margin-left: 10px;">Pengguna</li>
                                                    </ul>
                                                    <ul style="padding-right:40px;">
                                                        <div id="box_percent_bca">
                                                        </div>
                                                    </ul>
                                                </div>
                                                <br />
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="bank_box" style="background-color: #ffc9a0;color: #fa6c00;">
                                                    <h4 class="kt-widget14__title marbot_15" style="padding-left: 40px;"><br />
                                                        Bank BRI <i class="flaticon2-check-mark"></i>
                                                    </h4>
                                                    <ul class="ul_pesan">
                                                        <li style="color:black;">
                                                            <h2>
                                                                {{$output['bri']}}
                                                            </h2>
                                                        </li>
                                                        <li style="margin-left: 10px;">Pengguna</li>
                                                    </ul>
                                                    <ul style="padding-right:40px;">
                                                        <div id="box_percent_bri">
                                                        </div>
                                                    </ul>
                                                </div>
                                                <br />
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="bank_box" style="background-color: #60b5be;color: #056572;">
                                                    <h4 class="kt-widget14__title marbot_15" style="padding-left: 40px;"><br />
                                                        Bank BNI <i class="flaticon2-check-mark"></i>
                                                    </h4>
                                                    <ul class="ul_pesan">
                                                        <li style="color:black;">
                                                            <h2>
                                                                {{$output['bni']}}
                                                            </h2>
                                                        </li>
                                                        <li style="margin-left: 10px;">Pengguna</li>
                                                    </ul>
                                                    <ul style="padding-right:40px;">
                                                        <div id="box_percent_bni">
                                                        </div>
                                                    </ul>
                                                </div>
                                                <br />
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="bank_box" style="background-color: #fddf92; color: #e6a400;">
                                                    <h4 class="kt-widget14__title marbot_15" style="padding-left: 40px;"><br />
                                                        Bank Mandiri <i class="flaticon2-check-mark"></i>
                                                    </h4>
                                                    <ul class="ul_pesan">
                                                        <li style="color:black;">
                                                            <h2>
                                                                {{$output['mandiri']}}
                                                            </h2>
                                                        </li>
                                                        <li style="margin-left: 10px;">Pengguna</li>
                                                    </ul>
                                                    <ul style="padding-right:40px;">
                                                        <div id="box_percent_mandiri">
                                                        </div>
                                                    </ul>
                                                </div>
                                                <br />
                                            </div>
                                        </div>
                                        <a href="javascript:void()" onclick="modal_add()">
                                            <button class="button2">
                                                Buat Paket
                                            </button>
                                        </a>
                                        <a title="Riwayat Pembelian" class="pull-right" href="{{route('data_pembelian')}}">
                                            <button class="button2">
                                                Pembelian
                                            </button>
                                        </a>
                                        <table class="table table-bordered table-striped " id="packet_datatables">
                                            <thead>
                                                <tr class="tb_cen">
                                                    <th>No</th>
                                                    <th>Nama Paket</th>
                                                    <th>Harga</th>
                                                    <th>Masa Aktif</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>

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

    <!-- Modal Add Packet -->
    <div class="modal fade" id="tambahkan_paket" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h4>~ ~ Paket Baru ~ ~
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="nama" class="col-sm-12 control-label"><b>Nama Paket :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                            <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Paket Layanan" required>
                                        </div>
                                        <span class="form-text text-muted">Contoh : Murah Meriah</span>
                                    </div>
                                    <br />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Harga :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga Paket" required>
                                        </div>
                                        <span class="form-text text-muted">Contoh : 5000</span>
                                    </div>
                                    <br />
                                </div>
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Jenis Paket :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-cube"></i></span></div>
                                            <select name="jenis" class="form-control" id="jenis" required="required">
                                                <option value="">---</option>
                                                <option value="harian">Harian</option>
                                                <option value="normal">Normal</option>
                                            </select>
                                        </div>
                                        <!-- <span class="form-text text-muted">Contoh : Murah Meriah</span> -->
                                    </div>
                                    <br />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Masa Aktif : (Hari) </b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user-secret"></i></span></div>
                                            <input type="number" class="form-control" placeholder="Masa Aktif Paket" name="masa_aktif" id="masa_aktif" required>
                                        </div>
                                        <span class="form-text text-muted">Contoh : 7</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Status :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>
                                            <select name="status" class="form-control" id="status" required="required">
                                                <option value="">---</option>
                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                <option value="aktif">Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <center>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-12" id="alert_add">
                                            <div class="box_alert_warning">
                                                <div class="alert_title">! Pilih Bank !</div>
                                                Pilih minimal 1 bank untuk terdaftar pada paket layanan.
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="bca_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="BCA" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="bri_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="BRI" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="mandiri_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="MANDIRI" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="bni_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="BNI" disabled>
                                            </div>
                                        </div>
                                    </div>

                                </center>
                            </div>
                            <br />
                            <div class="col-sm-12">
                                <center>
                                    <br>
                                    <div class="flex-equal text-end ms-1" id="div_btn_add">
                                        <button type="submit" onclick={save_packet()} class="btn btn-primary" id="btn_add_bank">Daftar</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal Update Packet -->
    <div class="modal fade" id="update_paket" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header cenmar">
                    <h4>~ ~ Perbarui Paket ~ ~
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="nama" class="col-sm-12 control-label"><b>Nama Paket :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                            <input type="text" class="form-control" name="change_nama_paket" id="change_nama_paket" placeholder="Paket Layanan" required>
                                        </div>
                                        <span class="form-text text-muted">Contoh : Murah Meriah</span>
                                    </div>
                                    <br />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Harga :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>
                                            <input type="number" class="form-control" name="change_harga" id="change_harga" placeholder="Harga Paket" required>
                                        </div>
                                        <span class="form-text text-muted">Contoh : 5000</span>
                                    </div>
                                    <br />
                                </div>
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Jenis Paket :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-cube"></i></span></div>
                                            <select name="change_jenis" class="form-control" id="change_jenis" required="required">
                                                <option value="">---</option>
                                                <option value="harian">Harian</option>
                                                <option value="normal">Normal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Masa Aktif : (Hari) </b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user-secret"></i></span></div>
                                            <input type="number" class="form-control" placeholder="Masa Aktif Paket" name="change_masa_aktif" id="change_masa_aktif" required>
                                        </div>
                                        <span class="form-text text-muted">Contoh : 7</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Status :</b></label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>
                                            <select name="change_status" class="form-control" id="change_status" required="required">
                                                <option value="">---</option>
                                                <option value="tidak_aktif">Tidak Aktif</option>
                                                <option value="aktif">Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <center>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-12" id="alert_update">
                                            <div class="box_alert_warning">
                                                <div class="alert_title">! Pilih Bank !</div>
                                                Pilih minimal 1 bank untuk terdaftar pada paket layanan.
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="change_bca_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="BCA" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="change_bri_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="BRI" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="change_mandiri_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="MANDIRI" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><input class="size_checkbox" id="change_bni_cek" type="checkbox" /></span></div>
                                                <input type="text" class="form-control" value="BNI" disabled>
                                            </div>
                                        </div>
                                    </div>

                                </center>
                            </div>
                            <br />
                            <div class="col-sm-12">
                                <center>
                                    <br>
                                    <input type="hidden" id="id_update">
                                    <div class="flex-equal text-end ms-1" id="div_btn_update">
                                        <button type="submit" onclick={save_change()} class="btn btn-primary" id="btn_add_bank">Simpan</button>
                                    </div>
                                </center>
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

    <script type="text/javascript">
        var bca = "{{$output['bca_persen']}}";
        var bri = "{{$output['bri_persen']}}";
        var bni = "{{$output['bni_persen']}}";
        var mandiri = "{{$output['mandiri_persen']}}";

        $("#box_percent_bca").append(
            '<div class="box_percent" style="background: linear-gradient(to right, #0066ae 0%, #0066ae ' + bca + '%, #66a9da ' + bca + '%, #66a9da 100%);"></div>'
        );
        $("#box_percent_bri").append(
            '<div class="box_percent" style="background: linear-gradient(to right, #f77f0f 0%, #f77f0f ' + bri + '%, #fdad62 ' + bri + '%, #fdad62 100%);"></div>'
        );
        $("#box_percent_bni").append(
            '<div class="box_percent" style="background: linear-gradient(to right, #12565f 0%, #12565f ' + bni + '%, #2895a3 ' + bni + '%, #2895a3 100%);"></div>'
        );
        $("#box_percent_mandiri").append(
            '<div class="box_percent" style="background: linear-gradient(to right, #f0ad03 0%, #f0ad03 ' + mandiri + '%, #f8ca55 ' + mandiri + '%, #f8ca55 100%);"></div>'
        );

        document.getElementById("jenis").onchange = function() {
            if (this.value == "harian") {
                document.getElementById("masa_aktif").disabled = true;
                document.getElementById("masa_aktif").value = "";
            } else {
                document.getElementById("masa_aktif").disabled = false;
            }
        }


        $('#packet_datatables').DataTable({
            language: {
                'paginate': {
                    'first': '<span class="flaticon2-fast-back"></span>',
                    'last': '<span class="flaticon2-fast-next"></span>',
                    'previous': '<span class="flaticon2-back larger"></span>',
                    'next': '<span class="flaticon2-next larger"></span>'
                },
            },
            bLengthChange: false,
            searching: false,
            processing: false,
            scrollX: true,
            serverSide: true,
            ajax: "{{ url('ajax_packet_datatables') }}",
            columns: [{
                    data: 'no',
                    name: 'no',
                    className: 'no_size2',
                },
                {
                    data: 'nama_paket',
                    name: 'nama_paket',
                    className: 'fullname_size',
                },
                {
                    data: 'harga',
                    name: 'harga',
                    className: 'integrasi_size',
                },
                {
                    data: 'durasi',
                    name: 'durasi',
                    className: 'integrasi_size',
                },
                {
                    data: 'status',
                    name: 'status',
                    className: 'integrasi_size',
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'integrasi_size',
                    orderable: false
                },
            ],
            order: [
                [0, 'asc']
            ],
        });
    </script>
</body>

</html>
@endsection
