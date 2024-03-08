@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Dashboard</title>
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
    <!-- <link href="assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" /> -->
    <link href="assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" /> -->
    <link href="assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/css/all_blade.css" rel="stylesheet" type="text/css" />

    <!--end:: Vendor Plugins -->
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--begin:: Vendor Plugins for custom pages -->
    <!-- <link href="assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" /> -->

    <!--end:: Vendor Plugins for custom pages -->

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="assets_landing/media/logos/profit.ico" />
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <link href="assets/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
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
    <script src="js/admin/home.js" type="text/javascript"></script>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="row">

                            <div class=" col-lg-6 col-xl-6 order-lg-1 order-xl-1">
                                <!--begin:: Widgets/Activity-->
                                <div class="important_radius kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                                    <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                                        <div class="kt-portlet__head-label">
                                            <h3 class="kt-portlet__head-title">
                                                Transaksi
                                            </h3>
                                        </div>
                                        <div class="kt-portlet__head-toolbar">

                                        </div>
                                    </div>
                                    <div class="kt-portlet__body kt-portlet__body--fit">
                                        <div class="kt-widget17 marbot2x">
                                            <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides bg_banner">
                                                <div class="kt-widget17__chart" style="height:220px;">
                                                    <canvas id="kt_chart_activities"></canvas>
                                                </div>
                                                <div style="height:55px; background-color:#eb4b4b ;">

                                                </div>
                                            </div>
                                            <div class="kt-widget17__stats">
                                                <div class="kt-widget17__items">
                                                    <div class="important_radius kt-widget17__item">
                                                        <span class="kt-widget17__icon">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Communication/Group.svg-->
                                                            <svg class="kt-svg-icon kt-svg-icon--primary" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="kt-widget17__subtitle">
                                                            Pengguna
                                                        </span>
                                                        <span class="kt-widget17__desc" id="total_pengguna">
                                                            0 Pengguna Terdaftar
                                                        </span>
                                                    </div>
                                                    <div class="important_radius kt-widget17__item">
                                                        <span class="kt-widget17__icon">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Credit-card.svg-->
                                                            <svg class="kt-svg-icon kt-svg-icon--success" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
                                                                    <rect fill="#000000" x="2" y="8" width="20" height="3" />
                                                                    <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="kt-widget17__subtitle">
                                                            Rekening
                                                        </span>
                                                        <span class="kt-widget17__desc" id="total_rekening">
                                                            0 Rekening Terdaftar
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="kt-widget17__items">
                                                    <div class="important_radius kt-widget17__item">
                                                        <span class="kt-widget17__icon">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Box2.svg-->
                                                            <svg class="kt-svg-icon kt-svg-icon--warning" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
                                                                    <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="kt-widget17__subtitle">
                                                            Paket
                                                        </span>
                                                        <span class="kt-widget17__desc" id="total_layanan">
                                                            0 Layanan Tersedia
                                                        </span>
                                                    </div>
                                                    <div class="important_radius kt-widget17__item">
                                                        <span class="kt-widget17__icon">
                                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Shopping/Chart-line1.svg-->
                                                            <svg class="kt-svg-icon kt-svg-icon--danger" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
                                                                    <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                        <span class="kt-widget17__subtitle">
                                                            Mutasi
                                                        </span>
                                                        <span class="kt-widget17__desc" id="total_mutasi">
                                                            0 Data Transaksi
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Activity-->
                            </div>
                            <div class="col-lg-6 col-xl-6 order-lg-2 order-xl-1">
                                <div class="important_radius kt-portlet kt-portlet--height-fluid-half kt-portlet--mobile ">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <center>
                                                <h3 class="kt-widget14__title" id="title_debit">
                                                    Data Paket Layanan
                                                </h3>
                                                <span class="kt-widget14__desc">
                                                    Total Pembelian Paket Layanan
                                                </span>
                                            </center>
                                        </div>
                                        <div class="kt-widget14__chart" style="height:140px;" id="transaksi_masuk">
                                            <canvas id="paket_diagram"></canvas>
                                        </div>

                                    </div>

                                </div>

                                <!-- Begin List Bank & E-Wallet -->
                                <div class="important_radius kt-portlet kt-portlet--height-fluid-half kt-portlet--mobile ">
                                    <div class="kt-widget14">
                                        <div class="kt-widget14__header kt-margin-b -30">
                                            <center>
                                                <h3 class="kt-widget14__title" id="title_debit">
                                                    Data Bank & E-Wallet
                                                </h3>
                                                <span class="kt-widget14__desc">
                                                    Total Rekening Terdaftar
                                                </span>
                                            </center>
                                        </div>
                                        <div class="kt-widget14__chart cenmar" style="height:140px; width:50%; " id="transaksi_masuk">
                                            <canvas id="bank_diagram"></canvas>
                                        </div>

                                    </div>

                                </div>
                                <!-- End List  Bank & E-Wallet -->
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


    <!-- Modal Tambah Pengguna -->
    <div class="modal fade" id="tambahkan_user" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header ">
                    <h4>~~~ Pengguna Baru ~~~
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Pengguna : </label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" value="" minlength="5" maxlength="11" required>
                                <span class="form-text text-muted" id="alert_add_name"></span>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap : </label>
                                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="" minlength="8" maxlength="30" required>
                                <span class="form-text text-muted" id="alert_add_fullname"></span>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Jenis Kelamin : </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="">---</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Kota : </label>
                                    <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="" required>
                                    <!-- <span class="form-text text-muted" id="alert_add_kota"></span> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Alamat : </label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>No HP : </label>
                                    <input type="int" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor HP" value="" required>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Perusahaan : </label>
                                    <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan (Opsional)" value="">
                                    <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Jabatan : </label>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan (Opsional)" value="">
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email : </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Alamat" value="" required>
                                <span class="form-text text-muted" id="alert_add_email"></span>
                            </div>
                            <div class="form-group">
                                <label>Password : </label>
                                <input type="text" class="form-control" minlength="8" name="password" id="password" placeholder="Alamat" value="" required>
                                <span class="form-text text-muted" id="alert_add_password"></span>
                            </div>

                            <div class="col-sm-12">

                                <center>
                                    <div class="flex-equal text-end ms-1" id="btn_send">
                                        <!-- <button type="submit" onclick={send_profil()} class="btn btn-primary">Kirim</button> -->
                                        <button type="submit" onclick={add_user()} class="btn btn-primary">Simpan</button>

                                    </div>
                                </center>
                            </div>
                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>


    <!-- Modal Ubah Profil -->
    <div class="modal fade" id="ubah_profil" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header ">
                    <h4>~~ Ubah Profil ~~
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Pengguna : </label>
                                <input type="text" class="form-control" name="ubah_username" id="ubah_username" placeholder="Nama Pengguna" value="" minlength="5" maxlength="11" required>
                                <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap : </label>
                                <input type="text" class="form-control" name="ubah_fullname" id="ubah_fullname" placeholder="Nama Lengkap" value="" minlength="8" maxlength="30" required>
                                <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Jenis Kelamin : </label>
                                    <select name="ubah_jenis_kelamin" id="ubah_jenis_kelamin" class="form-control" required>
                                        <option value="">---</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Kota : </label>
                                    <input type="text" class="form-control" name="ubah_kota" id="ubah_kota" placeholder="Kota" value="" required>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Alamat : </label>
                                    <input type="text" class="form-control" name="ubah_alamat" id="ubah_alamat" placeholder="Alamat" value="" required>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>No HP : </label>
                                    <input type="int" class="form-control" name="ubah_no_hp" id="ubah_no_hp" placeholder="Nomor HP" value="" required>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Perusahaan : </label>
                                    <input type="text" class="form-control" name="ubah_perusahaan" id="ubah_perusahaan" placeholder="Perusahaan (Opsional)" value="">
                                    <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Jabatan : </label>
                                    <input type="text" class="form-control" name="ubah_jabatan" id="ubah_jabatan" placeholder="Jabatan (Opsional)" value="">
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>



                            <div class="col-sm-12">

                                <center>
                                    <input type="hidden" name="cek_id" id="cek_id">
                                    <div class="flex-equal text-end ms-1" id="update_btn">
                                        <button type="submit" onclick="send_update(document.getElementById('cek_id').value);" class="btn btn-primary">Simpan</button>
                                    </div>
                                </center>
                            </div>
                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal Rincian Profil -->
    <div class="modal fade" id="rincian_profil" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header ">
                    <h4>~~ Data Profil ~~
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="form-group">
                                <label>Nama Pengguna : </label>
                                <input type="text" class="form-control" name="rincian_username" id="rincian_username" placeholder="Nama Pengguna" value="" minlength="5" maxlength="11" disabled>
                                <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap : </label>
                                <input type="text" class="form-control" name="rincian_fullname" id="rincian_fullname" placeholder="Nama Lengkap" value="" minlength="8" maxlength="30" disabled>
                                <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Jenis Kelamin : </label>
                                    <select name="rincian_jenis_kelamin" id="rincian_jenis_kelamin" class="form-control" disabled>
                                        <option value="">---</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-6 form-group">
                                    <label>Kota : </label>
                                    <input type="text" class="form-control" name="rincian_kota" id="rincian_kota" placeholder="Kota" value="" disabled>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Alamat : </label>
                                    <input type="text" class="form-control" name="rincian_alamat" id="rincian_alamat" placeholder="Alamat" value="" disabled>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>No HP : </label>
                                    <input type="int" class="form-control" name="rincian_no_hp" id="rincian_no_hp" placeholder="Nomor HP" value="" disabled>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label>Perusahaan : </label>
                                    <input type="text" class="form-control" name="rincian_perusahaan" id="rincian_perusahaan" placeholder="Perusahaan (Opsional)" value="" disabled>
                                    <!-- <span class="form-text text-muted">Please enter your first name.</span> -->
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label>Jabatan : </label>
                                    <input type="text" class="form-control" name="rincian_jabatan" id="rincian_jabatan" placeholder="Jabatan (Opsional)" value="" disabled>
                                    <!-- <span class="form-text text-muted">Please enter your last name.</span> -->
                                </div>
                            </div>

                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal Rekening Baru -->
    <div class="modal fade" id="tambahkan_rekening" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header ">
                    <h4>~~~ Rekening Baru ~~~
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama" class="col-sm-12 control-label">
                                <b>Pengguna :</b>
                            </label>
                            <div class="col-sm-12">
                                <input type="email" placeholder="Masukkan Email Pengguna" class="form-control" name="add_pengguna" id="add_pengguna" required>
                                <span class="form-text text-muted" id="alert_email"></span>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Nomor Rekening :</b></label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="add_no_rekening" id="add_no_rekening" placeholder="Nomor Rekening" required>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label">
                                        <b>Service :</b>
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="add_service" class="form-control" id="add_service" required="required">
                                            <option value="">---</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BRI">BRI</option>
                                            <option value="BNI">BNI</option>
                                            <option value="MANDIRI">MANDIRI</option>
                                        </select>
                                    </div><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Username :</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Username Ibank" name="add_username" minlength="6" id="add_username" required>
                                        <span class="form-text text-muted" id="alert_username"></span>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Password :</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Password Ibank" class="form-control" name="add_password" minlength="6" id="add_password" required>
                                        <span class="form-text text-muted" id="alert_password"></span>
                                    </div><br>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <center>
                                    <br>
                                    <div class="flex-equal text-end ms-1">
                                        <button type="submit" onclick={add_rekening()} class="btn btn-primary">Simpan</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal Ubah Rekening -->
    <div class="modal fade" id="ubah_rekening" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header ">
                    <h4>~~~ Ubah Rekening ~~~
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama" class="col-sm-12 control-label">
                                <b>Pengguna :</b>
                            </label>
                            <div class="col-sm-12">
                                <input type="email" placeholder="Masukkan Email Pengguna" class="form-control" name="ubah_pengguna" id="ubah_pengguna" disabled>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Nomor Rekening :</b></label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="ubah_no_rekening" id="ubah_no_rekening" placeholder="Nomor Rekening" disabled>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label">
                                        <b>Service :</b>
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="ubah_service" class="form-control" id="ubah_service" disabled>
                                            <option value="">---</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BRI">BRI</option>
                                            <option value="BNI">BNI</option>
                                            <option value="MANDIRI">MANDIRI</option>
                                        </select>
                                    </div><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Username :</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Username Ibank" name="ubah_name" minlength="6" id="ubah_name" required>
                                        <span class="form-text text-muted" id="alert_ubah_username"></span>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Password :</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Password Ibank" class="form-control" name="ubah_password" minlength="6" id="ubah_password" required>
                                        <span class="form-text text-muted" id="alert_ubah_password"></span>
                                    </div><br>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <center>
                                    <br>
                                    <div class="flex-equal text-end ms-1">
                                        <input type="hidden" name="ubah_id" id="ubah_id">
                                        <button type="submit" onclick="send_ubah_rekening(document.getElementById('ubah_id').value);" class="btn btn-primary">Simpan</button>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- Modal Rincian Rekening -->
    <div class="modal fade" id="rincian_rekening" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content paper">
                <div class="modal-header ">
                    <h4>~~~ Data Rekening ~~~
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="javascript:void(0);" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama" class="col-sm-12 control-label">
                                <b>Pengguna :</b>
                            </label>
                            <div class="col-sm-12">
                                <input type="email" placeholder="Masukkan Email Pengguna" class="form-control" name="rincian_pengguna" id="rincian_pengguna" disabled>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label"><b>Nomor Rekening :</b></label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" name="rincian_no_rekening" id="rincian_no_rekening" placeholder="Nomor Rekening" disabled>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-12 control-label">
                                        <b>Service :</b>
                                    </label>
                                    <div class="col-sm-12">
                                        <select name="rincian_service" class="form-control" id="rincian_service" disabled>
                                            <option value="">---</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BRI">BRI</option>
                                            <option value="BNI">BNI</option>
                                            <option value="MANDIRI">MANDIRI</option>
                                        </select>
                                    </div><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Username :</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Username Ibank" name="rincian_name" minlength="6" id="rincian_name" disabled>
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <label for="nama" class="col-sm-6 control-label"><b>Password :</b></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Password Ibank" class="form-control" name="rincian_password" minlength="6" id="rincian_password" disabled>
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
        $.ajax({
            url: "/data_bank",
            type: "GET",
            success: function(data) {
                bank_diagram(data);
            },
        });

        $.ajax({
            url: "/data_paket",
            type: "GET",
            success: function(data) {
                paket_diagram(data);
            },
        });

        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#2c77f4",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995",
                    "bca": "#0066ae",
                    "bri": "#FE7916",
                    "bni": "#005E6A",
                    "mandiri": "#f2ae00"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>
</body>

</html>
@endsection
