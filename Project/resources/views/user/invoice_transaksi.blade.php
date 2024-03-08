@extends('layouts.app')

@section('content')
<html>

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>Mutasi | Invoice Transaksi </title>
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
    <link href="assets/datatable/jquery.dataTables.min.css" rel="stylesheet">
    <script src="assets/datatable/jquery.dataTables.min.js"></script>


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

    <div class="row" style="margin-top: 10px;margin-right:auto;margin-left:auto;">
        <div class="col-xl-1 col-lg-1 col-sm-1">

        </div>
        <div class="col-xl-10 col-lg-10 col-sm-10">
            <div class="bg_inv_img  inv_pad important_radius kt-portlet kt-portlet--height-fluid animate">
                <div class="kt-widget14 ">
                    <div class="row " style="color:#dddddd;">
                        <div class="col-lg-6 col-sm-6">
                            <h1><b> INVOICE </b> </h1><br />
                        </div>
                        <div class="col-lg-6 col-sm-6" style="text-align: right;">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img alt="Logo" class="img-inv pull-right" src="assets/media/logos/jv.png"><br />

                                </div>
                            </div><br />
                            Jalan Danau Toba Blok C22, Sawojajar <br /> Kota Malang
                        </div>
                        <div class="col-lg-12 space_inv"></div>
                        <div class="col-lg-12">
                            <hr class="hr_inv">
                        </div>
                        <br />

                        <div class="col-lg-4 col-sm-4 col-4">
                            <h5> Tanggal </h5>
                            {{$invoice->tgl_pembelian}}
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <h5>Jatuh Tempo</h5>
                            {{$expired}}
                        </div>
                        <div class="col-lg-4 col-sm-4 col-4">
                            <h5>Faktur</h5>
                            {{$invoice->name}}
                        </div>

                    </div>
                    <div class="space_inv"></div>
                    <div class="space_inv"></div>
                    <div class="space_inv"></div>

                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 60%;">Deskripsi</th>
                                        <th style="text-align: right;">Masa Aktif</th>
                                        <th style="text-align: right;">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style=" color:#636060;">
                                        <th scope="row"><b>Paket {{$invoice->nama_paket}}</b></th>
                                        <td style="text-align: right;"><b>{{$invoice->durasi}} Hari</b></td>
                                        <td style="text-align: right;color:#ff265c;"><b>{{$invoice->harga}}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="space_inv"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5><b> Paket Pembelian</b></h5>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <h6> Bank Pilihan :</h6>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <div class=" pull-right">
                                        {{$invoice->service}}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <h6> Nomor Rekening :</h6>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-6">
                                    <div class=" pull-right">
                                        {{$invoice->no_rekening}}
                                    </div>
                                </div>
                            </div>
                            <br />
                        </div>
                    </div>

                    <div class="kt-invoice__actions">
                        <div class="kt-invoice__container">
                            <a class="important_radius_half btn btn-info btn-bold pull-right" href="javascript:void()" onclick="printDiv('print_invoice');">Cetak Invoice</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-lg-1 col-sm-1">

        </div>
    </div>


    <div id="print_invoice" style="display: none;">
        <div class="row">
            <div class="bg_white col-xl-12 col-lg-12 col-sm-12 col-12">
                <div class="bg_inv_img inv_pad important_radius kt-portlet kt-portlet--height-fluid animate">
                    <div class="kt-widget14 ">
                        <div class="row " style="color:#dddddd;">
                            <div class="col-lg-6 col-sm-6">
                                <h1><b> INVOICE </b> </h1><br />
                            </div>
                            <div class="col-lg-6 col-sm-6" style="text-align: right;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <img alt="Logo" class="img-inv pull-right" src="assets/media/logos/jv.png"><br />

                                    </div>
                                </div><br />
                                Jalan Danau Toba Blok C22, Sawojajar <br /> Kota Malang
                            </div>
                            <div class="col-lg-12 space_inv"></div>
                            <div class="col-lg-12">
                                <hr class="hr_inv">
                            </div>
                            <br />

                            <div class="col-lg-4 col-sm-4 col-4">
                                <h5> Tanggal </h5>
                                {{$invoice->tgl_pembelian}}
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4">
                                <h5>Jatuh Tempo</h5>
                                {{$expired}}
                            </div>
                            <div class="col-lg-4 col-sm-4 col-4">
                                <h5>Faktur</h5>
                                {{$invoice->name}}
                            </div>

                        </div>
                        <div class="space_inv"></div>
                        <div class="space_inv"></div>
                        <div class="space_inv"></div>

                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 60%;">Deskripsi</th>
                                            <th style="text-align: right;">Masa Aktif</th>
                                            <th style="text-align: right;">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style=" color:#636060;">
                                            <th scope="row"><b>Paket {{$invoice->nama_paket}} </b></th>
                                            <td style="text-align: right;"><b>{{$invoice->durasi}} Hari</b></td>
                                            <td style="text-align: right;color:#ff265c;"><b>{{$invoice->harga}}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="space_inv"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h5><b>Paket Pembelian</b></h5>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <h6> Bank Pilihan :</h6>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <div class=" pull-right">
                                            {{$invoice->service}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <h6> Nomor Rekening :</h6>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <div class=" pull-right">
                                            {{$invoice->no_rekening}}
                                        </div>
                                    </div>
                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="js/home.js" type="text/javascript"></script>
</body>

</html>
@endsection
