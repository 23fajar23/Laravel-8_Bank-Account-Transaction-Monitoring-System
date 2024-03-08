var rekening = "";
var referal_id_bank = "";

// variabel Graph

var KTDashboard = (function () {
    var daterangepickerInit = function () {
        if ($("#kt_dashboard_daterangepicker").length == 0) {
            return;
        }

        var picker = $("#kt_dashboard_daterangepicker");
        var start = moment();
        var end = moment();

        function cb(start, end, label) {
            var title = "";
            var range = "";

            if (end - start < 100 || label == "Hari Ini") {
                title = "Hari Ini:";
                range = start.format("D MMM ");
            } else if (label == "Kemarin") {
                title = "Kemarin:";
                range = start.format("D MMM");
            } else {
                range = start.format("D MMM") + " - " + end.format("D MMM");
            }

            getTransaksi(
                rekening,
                referal_id_bank,
                start.format("YYYY-MM-DD"),
                end.format("YYYY-MM-DD")
            );

            $("#kt_dashboard_daterangepicker_date").html(range);
            $("#kt_dashboard_daterangepicker_title").html(title);
        }

        picker.daterangepicker(
            {
                direction: KTUtil.isRTL(),
                startDate: start,
                endDate: end,
                opens: "left",
                ranges: {
                    "Hari Ini": [moment(), moment()],
                    Kemarin: [
                        moment().subtract(1, "days"),
                        moment().subtract(1, "days"),
                    ],
                    "7 Hari Terakhir": [moment().subtract(6, "days"), moment()],
                    "30 Hari Terakhir": [
                        moment().subtract(29, "days"),
                        moment(),
                    ],
                    "Bulan Ini": [
                        moment().startOf("month"),
                        moment().endOf("month"),
                    ],
                    "Bulan Kemarin": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month"),
                    ],
                },
            },
            cb
        );

        cb(start, end, "");
    };

    var dailySales = function ($label, $value) {
        var chartContainer = KTUtil.getByID("kt_chart_daily_sales");

        if (!chartContainer) {
            return;
        }

        var chartData = {
            labels: $label,
            datasets: [
                {
                    //label: 'Dataset 1',
                    backgroundColor: KTApp.getStateColor("info"),
                    data: $value,
                },
                {
                    //label: 'Dataset 2',
                    backgroundColor: "#f3f3fb",
                    data: $value,
                },
            ],
        };

        var chart = new Chart(chartContainer, {
            type: "bar",
            data: chartData,
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                    mode: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                },
                responsive: true,
                maintainAspectRatio: false,
                barRadius: 4,
                scales: {
                    xAxes: [
                        {
                            display: false,
                            gridLines: false,
                            stacked: true,
                        },
                    ],
                    yAxes: [
                        {
                            display: false,
                            stacked: true,
                            gridLines: false,
                        },
                    ],
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0,
                    },
                },
            },
        });
    };

    var zero_debit = function () {
        var chartContainer = KTUtil.getByID("zero_debit");

        if (!chartContainer) {
            return;
        }

        var chartData = {
            labels: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
            datasets: [
                {
                    //label: 'Dataset 1',
                    backgroundColor: KTApp.getStateColor("info"),
                    data: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                },
            ],
        };

        var chart = new Chart(chartContainer, {
            type: "bar",
            data: chartData,
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                    mode: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                },
                responsive: true,
                maintainAspectRatio: false,
                barRadius: 4,
                scales: {
                    xAxes: [
                        {
                            display: false,
                            gridLines: false,
                            stacked: true,
                        },
                    ],
                    yAxes: [
                        {
                            display: false,
                            stacked: true,
                            gridLines: false,
                        },
                    ],
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0,
                    },
                },
            },
        });
    };

    var zero_kredit = function () {
        var chartContainer = KTUtil.getByID("zero_kredit");

        if (!chartContainer) {
            return;
        }

        var chartData = {
            labels: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
            datasets: [
                {
                    //label: 'Dataset 1',
                    backgroundColor: KTApp.getStateColor("danger"),
                    data: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                },
            ],
        };

        var chart = new Chart(chartContainer, {
            type: "bar",
            data: chartData,
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                    mode: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                },
                responsive: true,
                maintainAspectRatio: false,
                barRadius: 4,
                scales: {
                    xAxes: [
                        {
                            display: false,
                            gridLines: false,
                            stacked: true,
                        },
                    ],
                    yAxes: [
                        {
                            display: false,
                            stacked: true,
                            gridLines: false,
                        },
                    ],
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0,
                    },
                },
            },
        });
    };

    var dailySalesOut = function ($label, $value) {
        var chartContainer = KTUtil.getByID("kt_chart_daily_sales_out");

        if (!chartContainer) {
            return;
        }

        var chartData = {
            labels: $label,
            datasets: [
                {
                    //label: 'Dataset 1',
                    backgroundColor: KTApp.getStateColor("danger"),
                    data: $value,
                },
                {
                    //label: 'Dataset 2',
                    backgroundColor: "#f3f3fb",
                    data: $value,
                },
            ],
        };

        var chart = new Chart(chartContainer, {
            type: "bar",
            data: chartData,
            options: {
                title: {
                    display: false,
                },
                tooltips: {
                    intersect: false,
                    mode: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10,
                },
                legend: {
                    display: false,
                },
                responsive: true,
                maintainAspectRatio: false,
                barRadius: 4,
                scales: {
                    xAxes: [
                        {
                            display: false,
                            gridLines: false,
                            stacked: true,
                        },
                    ],
                    yAxes: [
                        {
                            display: false,
                            stacked: true,
                            gridLines: false,
                        },
                    ],
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 0,
                        bottom: 0,
                    },
                },
            },
        });
    };

    var profitShare = function ($bca, $bri, $bni, $mandiri) {
        if (!KTUtil.getByID("kt_chart_profit_share")) {
            return;
        }

        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100);
        };
        var config = {
            type: "doughnut",
            data: {
                datasets: [
                    {
                        data: [$bca, $bri, $bni, $mandiri],
                        backgroundColor: [
                            KTApp.getStateColor("bca"),
                            KTApp.getStateColor("bri"),
                            KTApp.getStateColor("bni"),
                            KTApp.getStateColor("mandiri"),
                        ],
                    },
                ],
                labels: ["BCA", "BRI", "BNI", "MANDIRI"],
            },
            options: {
                cutoutPercentage: 75,
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: "top",
                },
                title: {
                    display: false,
                    text: "Technology",
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                },
                tooltips: {
                    enabled: true,
                    intersect: false,
                    mode: "nearest",
                    bodySpacing: 5,
                    yPadding: 10,
                    xPadding: 10,
                    caretPadding: 0,
                    displayColors: false,
                    backgroundColor: KTApp.getStateColor("dark"),
                    titleFontColor: "#ffffff",
                    cornerRadius: 4,
                    footerSpacing: 0,
                    titleSpacing: 0,
                },
            },
        };

        var ctx = KTUtil.getByID("kt_chart_profit_share").getContext("2d");
        var myDoughnut = new Chart(ctx, config);
    };

    return {
        // Init All Graph
        init: function () {
            $.get({
                url: "/graph_bank/",
                success: function (data) {
                    // Show value rekening
                    $("#total_rekening").html(data[0]);
                    $("#persen_bca").html(data[5] + " % BCA");
                    $("#persen_bri").html(data[6] + " % BRI");
                    $("#persen_bni").html(data[7] + " % BNI");
                    $("#persen_mandiri").html(data[8] + " % MANDIRI");

                    // Remove and append canvas
                    $("#kt_chart_profit_share").remove();
                    $("#control_graph").append(
                        '<canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>'
                    );

                    // Call Diagram
                    profitShare(data[1], data[2], data[3], data[4]);
                },
            });

            daterangepickerInit();

            $.get({
                url: "/graph_input_output",
                success: function (data) {
                    // Show value rekening
                    zero_debit();
                    zero_kredit();
                    dailySales(data[0], data[4]);
                    dailySalesOut(data[0], data[3]);
                },
            });
        },
    };
})();

function getTransaksi($rekening, $referal_id, $start, $end) {
    var json;
    var color;

    $.ajax({
        url: "/get_data",
        type: "GET",
        data: {
            referal_id: $referal_id,
            rekening: $rekening,
            start: $start,
            end: $end,
        },
        success: function (data) {
            json = data;

            if (json[0] == 0) {
                $("#cek_mutasi").html(
                    '<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm marbot"><div class="kt-portlet__head-label cenmar"><h3 class="kt-portlet__head-title">Data Tidak Ditemukan</h3></div></div>'
                );
            } else {
                $("#cek_mutasi").html("");

                $("#cek_mutasi").append(
                    '<div class="textCen marbot"><b>Rekening : ' +
                        json[1].no_rekening +
                        "</b></br>" +
                        "<b>Bank : " +
                        json[1].service +
                        "</b></div>" +
                        '<hr class="separator_cek marbot" />'
                );

                for (var i = 1; i <= json[0]; i++) {
                    if (json[i].tipe == "DEBIT") {
                        color = "kt-widget2__item--danger";
                    } else if (json[i].tipe == "KREDIT") {
                        color = "kt-widget2__item--info";
                    }

                    var output =
                        '<div class="kt-widget2 kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">' +
                        '<div class="spaceCek kt-widget2__item ' +
                        color +
                        '">' +
                        '<div class="kt-widget2__checkbox">' +
                        "</div>" +
                        '<div class="kt-widget2__info leftmar">' +
                        '<a class="kt-widget2__title">' +
                        change_format_date(json[i].tgl_transaksi) +
                        "</a>" +
                        '<a class="kt-widget2__username">' +
                        json[i].tipe +
                        "</a>" +
                        "</div>" +
                        "</div>" +
                        '<div class="kt-widget2__item marleft"><b>Rp ' +
                        format_rupiah(json[i].nominal) +
                        "</b> </div>" +
                        '<div class="kt-portlet__head-toolbar">' +
                        '<div class="dropdown dropdown-inline">' +
                        '<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '<i class="flaticon-more-1"></i>' +
                        "</button>" +
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">' +
                        '<ul class="kt-nav">' +
                        '<li class="kt-nav__item">' +
                        '<a data-toggle="modal" data-target="#rincianTransaksi' +
                        json[i].id +
                        '" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon2-checking"></i>' +
                        '<span class="kt-nav__link-text">Rincian Transaksi</span>' +
                        "</a>" +
                        "</li>" +
                        "</ul>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";

                    var outputModal =
                        '<div class="modal fade" id="rincianTransaksi' +
                        json[i].id +
                        '" tabindex="-1" role="dialog">' +
                        '<div class="modal-dialog" role="document">' +
                        '<div class="modal-content paper">' +
                        '<div class="modal-header cenmar">' +
                        "<h4>~ ~ Rincian Transaksi ~ ~</h4>" +
                        "</div>" +
                        '<div class="modal-body">' +
                        '<div class="form-group">' +
                        '<div class="row">' +
                        '<div class="col-lg-6">' +
                        '<label for="nama" class="col-sm-6 control-label"><b>Bank :</b></label>' +
                        '<div class="col-sm-12">' +
                        '<div class="input-group">' +
                        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>' +
                        '<input type="text" class="form-control" value=' +
                        json[i].service +
                        "  disabled>" +
                        "</div>" +
                        "</div><br>" +
                        "</div>" +
                        '<div class="col-lg-6">' +
                        '<label for="nama" class="col-sm-6 control-label"><b>Tipe :</b></label>' +
                        '<div class="col-sm-12">' +
                        '<div class="input-group">' +
                        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-arrows-h"></i></span></div>' +
                        '<input type="text" value=' +
                        json[i].tipe +
                        '  class="form-control" minlength="6" disabled>' +
                        "</div>" +
                        "</div><br>" +
                        "</div>" +
                        "</div>" +
                        '<label for="nama" class="col-sm-12 control-label">' +
                        "<b>Nomor Rekening :</b>" +
                        "</label>" +
                        '<div class="col-sm-12">' +
                        '<div class="input-group">' +
                        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>' +
                        '<input type="number" class="form-control " value="' +
                        json[i].no_rekening +
                        '"disabled>' +
                        "</div>" +
                        "</div><br>" +
                        '<div class="row">' +
                        '<div class="col-lg-6">' +
                        '<label for="nama" class="col-sm-6 control-label"><b>Tanggal :</b></label>' +
                        '<div class="col-sm-12">' +
                        '<div class="input-group">' +
                        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-calendar-check-o"></i></span></div>' +
                        '<input type="text" class="form-control" value="' +
                        change_format_date(json[i].tgl_transaksi) +
                        '" disabled>' +
                        "</div>" +
                        "</div><br>" +
                        "</div>" +
                        '<div class="col-lg-6">' +
                        '<label for="nama" class="col-sm-6 control-label"><b>Nominal :</b></label>' +
                        '<div class="col-sm-12">' +
                        '<div class="input-group">' +
                        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-money"></i></span></div>' +
                        '<input type="text" value="Rp ' +
                        format_rupiah(json[i].nominal) +
                        '" class="form-control" disabled>' +
                        "</div>" +
                        "</div><br>" +
                        "</div>" +
                        "</div>" +
                        '<label for="nama" class="col-sm-12 control-label">' +
                        "<b>Deskripsi :</b>" +
                        "</label>" +
                        '<div class="col-sm-12">' +
                        '<textarea class="form-control " disabled>' +
                        json[i].deskripsi +
                        "</textarea>" +
                        "</div><br>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";

                    $("#cek_mutasi").append(output, outputModal);
                }
            }
        },
    });
}

function getBank() {
    var list_bank;
    var color_bank;
    var logo;
    var logo_reverse;
    var jenis;

    $.ajax({
        url: "/get_list_bank",
        type: "GET",
        success: function (data) {
            list_bank = data;

            if (list_bank[0] == 0) {
                $("#cek_list_bank").html(
                    '<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm marbot"><div class="kt-portlet__head-label cenmar"><h3 class="kt-portlet__head-title">Data Tidak Ditemukan</h3></div></div>'
                );
            } else {
                $("#cek_list_bank").html("");

                for (var i = 1; i <= list_bank[0]; i++) {
                    if (list_bank[i].service == "BCA") {
                        color_bank = "kt-widget2__item--bca";
                    } else if (list_bank[i].service == "BRI") {
                        color_bank = "kt-widget2__item--bri";
                    } else if (list_bank[i].service == "BNI") {
                        color_bank = "kt-widget2__item--bni";
                    } else if (list_bank[i].service == "MANDIRI") {
                        color_bank = "kt-widget2__item--mandiri";
                    }

                    if (
                        list_bank[i].status == "expired" ||
                        list_bank[i].status == "stop"
                    ) {
                        logo = "";
                    } else {
                        logo = "important_none";
                    }

                    if (
                        list_bank[i].jenis == "harian" &&
                        list_bank[i].status != "expired" &&
                        list_bank[i].status != "stop"
                    ) {
                        jenis = "";
                    } else {
                        jenis = "important_none";
                    }

                    if (
                        list_bank[i].status == "expired" ||
                        list_bank[i].status == "stop"
                    ) {
                        logo_reverse = "important_none";
                    } else {
                        logo_reverse = "";
                    }

                    var outputBank =
                        '<div class="kt-widget2 kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">' +
                        '<div class=" kt-widget2__item ' +
                        color_bank +
                        '">' +
                        '<div class="kt-widget2__checkbox">' +
                        "</div>" +
                        '<div class="kt-widget2__info">' +
                        '<a class="kt-widget2__title">' +
                        list_bank[i].no_rekening +
                        "</a>" +
                        '<a class="kt-widget2__username">' +
                        list_bank[i].service +
                        "</a>" +
                        "</div>" +
                        "</div>" +
                        '<div class="kt-portlet__head-toolbar">' +
                        '<div class="dropdown dropdown-inline">' +
                        '<span class="color_red ' +
                        logo +
                        ' " >' +
                        "<i><b> Paket Berakhir &emsp;</b></i>" +
                        "</span>" +
                        '<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '<i class="flaticon-more-1"></i>' +
                        "</button>" +
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">' +
                        '<ul class="kt-nav">' +
                        '<li class="kt-nav__head">' +
                        "Menu Tambahan" +
                        '<span data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">' +
                        '<i class="kt-nav__link-icon flaticon2-menu-4"></i></span>' +
                        "</li>" +
                        '<li class="kt-nav__separator"></li>' +
                        '<li class="kt-nav__item">' +
                        '<a onclick="modal_rincian(' +
                        list_bank[i].id +
                        ');" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon2-checking"></i>' +
                        '<span class="kt-nav__link-text">Rincian</span>' +
                        "</a>" +
                        "</li>" +
                        '<li class="kt-nav__item">' +
                        '<a onclick="alternatif_getTransaksi(' +
                        list_bank[i].no_rekening +
                        " , " +
                        list_bank[i].id +
                        ')" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon2-layers"></i>' +
                        '<span class="kt-nav__link-text">Cek Transaksi </span>' +
                        "</a>" +
                        "</li>" +
                        '<li class="kt-nav__item ' +
                        logo +
                        '">' +
                        '<a onclick="tambah_durasi(' +
                        list_bank[i].id +
                        ');" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon-time"></i>' +
                        '<span class="kt-nav__link-text">Perpanjang</span>' +
                        "</a>" +
                        "</li>" +
                        '<li class="kt-nav__item ' +
                        jenis +
                        '">' +
                        '<a onclick="stop_layanan(' +
                        list_bank[i].id +
                        ');" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon-time"></i>' +
                        '<span class="kt-nav__link-text">Berhenti Langganan</span>' +
                        "</a>" +
                        "</li>" +
                        '<li class="kt-nav__item ' +
                        logo_reverse +
                        '">' +
                        '<a onclick="update_rekening(' +
                        list_bank[i].id +
                        ');" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon2-writing"></i>' +
                        '<span class="kt-nav__link-text">Ubah</span>' +
                        "</a>" +
                        "</li>" +
                        '<li class="kt-nav__separator"></li>' +
                        '<li class="kt-nav__item">' +
                        '<a data-toggle="modal" data-target="#hapus' +
                        list_bank[i].id +
                        '" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon2-trash"></i>' +
                        '<span class="kt-nav__link-text">Hapus</span>' +
                        "</a>" +
                        "</li>" +
                        "</ul>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";

                    var outputModalHapus =
                        '<div class="modal fade" id="hapus' +
                        list_bank[i].id +
                        '" tabindex="-1" role="dialog">' +
                        '<div class="modal-dialog" role="document">' +
                        '<div class="modal-content paper">' +
                        '<div class="modal-header cenmar">' +
                        "<h4>~ ~ Hapus Rekening ~ ~" +
                        "</h4>" +
                        "</div>" +
                        '<div class="modal-body">' +
                        '<div class="delete_font marbot">Apakah Anda Yakin Ingin Menghapus Rekening <b>' +
                        list_bank[i].service +
                        "</b> dengan nomor rekening <b>" +
                        list_bank[i].no_rekening +
                        "</b> ? </div>" +
                        "<center>" +
                        '<form method="post" action="javascript:void(0);">' +
                        '<button type="submit" onclick={delete_rekening("' +
                        list_bank[i].id +
                        '")} class="btn btn-danger">Hapus</button> ' +
                        ' <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">Batal</button>' +
                        "</form>" +
                        "</center>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";

                    $("#cek_list_bank").append(outputBank, outputModalHapus);
                }
            }
        },
    });
}

// ----------------------------
// Form Action
// ----------------------------

function update_data_bank() {
    var update_id = document.getElementById("id_update").value;
    var update_username = document.getElementById("update_username").value;
    var update_password = document.getElementById("update_password").value;
    var update_service = document.getElementById("update_service").value;

    if (update_username.length >= 6 && update_password.length >= 6) {
        if (update_service == "MANDIRI") {
            var company_id = document.getElementById("update_company").value;
            if (company_id.length > 0) {
                $.ajax({
                    url: "/bank_update",
                    type: "GET",
                    data: {
                        id: update_id,
                        company: company_id,
                        username: update_username,
                        password: update_password,
                    },
                    beforeSend: function () {
                        show_btn_bank("loading_update");
                        alert_verify_update_rekening(
                            "Mohon Tunggu ..",
                            "Sistem Sedang Melakukan Verifikasi Rekening Anda."
                        );
                    },
                    complete: function () {
                        show_btn_bank("update_save");
                    },
                    success: function (data) {
                        success_savebank_function(
                            data,
                            update_service,
                            "update"
                        );
                    },
                    error: function () {
                        alert_verify_update_rekening(
                            "Sesuaikan Data",
                            "Pastikan input data telah sesuai dengan rekening anda."
                        );
                    },
                });
            }
        } else {
            $.ajax({
                url: "/bank_update",
                type: "GET",
                data: {
                    id: update_id,
                    username: update_username,
                    password: update_password,
                },
                beforeSend: function () {
                    show_btn_bank("loading_update");
                    alert_verify_update_rekening(
                        "Mohon Tunggu ..",
                        "Sistem Sedang Melakukan Verifikasi Rekening Anda."
                    );
                },
                complete: function () {
                    show_btn_bank("update_save");
                },
                success: function (data) {
                    success_savebank_function(data, update_service, "update");
                },
                error: function () {
                    alert_verify_update_rekening(
                        "Sesuaikan Data",
                        "Pastikan input data telah sesuai dengan rekening anda."
                    );
                },
            });
        }
    }
}

function delete_rekening($id) {
    $.ajax({
        url: "/bank_delete",
        data: { id: $id },
        type: "GET",
        success: function (data) {
            $("#hapus" + $id).modal("hide");
            getBank();

            // Reset Diagram to zero
            if (data == 0) {
                $("#total_rekening").html(0);
                $("#persen_bca").html("0 % BCA");
                $("#persen_bri").html("0 % BRI");
                $("#persen_bni").html("0 % BNI");
                $("#persen_mandiri").html("0 % MANDIRI");

                $("#kt_chart_profit_share").remove();
                $("#control_graph").append(
                    '<canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>'
                );
            }

            KTDashboard.init();
        },
    });
    fast_notif("Rekening Dihapus");
}

function show_btn_bank($value) {
    if ($value == "add_save") {
        $("#div_btn").html(
            '<button type="submit" onclick={add_rekening()} class="btn btn-primary" id="btn_add_bank">Daftar</button>'
        );
    } else if ($value == "loading_add") {
        $("#div_btn").html(
            '<i class="fa fa-spinner fa-pulse loading_icon" ></i>'
        );
    } else if ($value == "update_save") {
        $("#btn_update").html(
            '<button type="submit" onclick={update_data_bank()} class="btn btn-primary">Simpan</button>'
        );
    } else if ($value == "loading_update") {
        $("#btn_update").html(
            '<i class="fa fa-spinner fa-pulse loading_icon"  ></i>'
        );
    }
}

function alert_verify_rekening($title, $desc) {
    $("#alert_add").html(
        '<div class="row">' +
            '<div class="col-lg-12" style="color: black;">' +
            '<div class="box_alert">' +
            '<div class="alert_title"> ' +
            $title +
            "</div>" +
            $desc +
            "</div>" +
            "</div>" +
            "</div> <br />"
    );
}

function alert_verify_update_rekening($title, $desc) {
    $("#alert_update").html(
        '<div class="row">' +
            '<div class="col-lg-12">' +
            ' <div class="col-lg-12" style="color: black;">' +
            '<div class="box_alert">' +
            '<div class="alert_title"> ' +
            $title +
            " </div>" +
            $desc +
            "</div>" +
            "</div>" +
            "  <br />" +
            "  </div>" +
            " </div>"
    );
}

function success_savebank_function($data, $service, $jenis) {
    if ($jenis == "add") {
        if ($data == "berhasil") {
            // Begin Succes Register
            $("#tambahkan").modal("hide");
            $("#alert_add").html("");
            document.getElementById("add_no_rekening").value = "";
            document.getElementById("add_username").value = "";
            document.getElementById("add_password").value = "";
            if ($service == "MANDIRI") {
                document.getElementById("add_company").value = "";
            }
            getBank();
            KTDashboard.init();
            fast_notif("Rekening Ditambah");
            // End Succes Register
        } else if ($data == "gagal_login") {
            // Begin Alert Error Login
            alert_verify_rekening(
                "Kredensial Salah",
                "Username atau password tidak sesuai"
            );
            // End Alert Error Login
        } else if ($data == "sesi_login") {
            // Begin Alert Wait Session
            alert_verify_rekening(
                "Tunggu Sebentar ...",
                "Akun Internet Banking anda sedang login di perangkat lain."
            );
            // End Alert Wait Session
        } else if ($data == "error_captcha") {
            // Begin Try Again connect to server
            alert_verify_rekening(
                "Server Sibuk",
                "Silahkan tekan lagi tombol simpan"
            );
            // End Try Again connect to server
        } else if ($data == "invalid_rekening") {
            // Begin Alert Rekening Not Found
            alert_verify_rekening(
                "Kredensial Salah",
                "Nomor Rekening Tidak Ditemukan"
            );
            // End Alert Rekening Not Found
        }
    } else if ($jenis == "update") {
        if ($data == "berhasil") {
            // Begin Succes Update
            $("#alert_update").html("");
            $("#update_rekening").modal("hide");
            getBank();
            fast_notif("Data Rekening Diupdate");
            // End Succes Update
        } else if ($data == "gagal_login") {
            // Begin Alert Error Login
            alert_verify_update_rekening(
                "Kredensial Salah",
                "Username atau password tidak sesuai"
            );
            // End Alert Error Login
        } else if ($data == "sesi_login") {
            // Begin Alert Wait Session
            alert_verify_update_rekening(
                "Tunggu Sebentar ...",
                "Akun Internet Banking anda sedang login di perangkat lain."
            );
            // End Alert Wait Session
        } else if ($data == "error_captcha") {
            // Begin Try Again connect to server
            alert_verify_update_rekening(
                "Server Sibuk",
                "Silahkan tekan lagi tombol simpan"
            );
            // End Try Again connect to server
        } else if ($data == "invalid_rekening") {
            // Begin Alert Rekening Not Found
            alert_verify_update_rekening(
                "Kredensial Salah",
                "Nomor Rekening Tidak Ditemukan"
            );
            // End Alert Rekening Not Found
        }
    }
}

function add_rekening() {
    var add_service = document.getElementById("add_service").value;
    var add_no_rekening = document.getElementById("add_no_rekening").value;
    var add_username = document.getElementById("add_username").value;
    var add_password = document.getElementById("add_password").value;

    if (
        add_no_rekening.length > 0 &&
        add_username.length >= 6 &&
        add_password.length >= 6
    ) {
        if (add_service == "MANDIRI") {
            var add_company = document.getElementById("add_company").value;
            if (add_company.length > 0) {
                $.ajax({
                    url: "/add_bank",
                    type: "GET",
                    data: {
                        service: add_service,
                        no_rekening: add_no_rekening,
                        username: add_username,
                        password: add_password,
                        company: add_company,
                    },
                    beforeSend: function () {
                        show_btn_bank("loading_add");
                        alert_verify_rekening(
                            "Mohon Tunggu ..",
                            "Sistem Sedang Melakukan Verifikasi Rekening Anda."
                        );
                    },
                    complete: function () {
                        show_btn_bank("add_save");
                    },
                    success: function (data) {
                        success_savebank_function(data, add_service, "add");
                    },
                    error: function () {
                        alert_verify_rekening(
                            "Sesuaikan Data",
                            "Pastikan input data telah sesuai dengan rekening anda."
                        );
                    },
                });
            }
        } else {
            $.ajax({
                url: "/add_bank",
                type: "GET",
                data: {
                    service: add_service,
                    no_rekening: add_no_rekening,
                    username: add_username,
                    password: add_password,
                },
                beforeSend: function () {
                    show_btn_bank("loading_add");
                    alert_verify_rekening(
                        "Mohon Tunggu ..",
                        "Sistem Sedang Melakukan Verifikasi Rekening Anda."
                    );
                },
                complete: function () {
                    show_btn_bank("add_save");
                },
                success: function (data) {
                    success_savebank_function(data, add_service, "add");
                },
                error: function () {
                    alert_verify_rekening(
                        "Sesuaikan Data",
                        "Pastikan input data telah sesuai dengan rekening anda."
                    );
                },
            });
        }
    }
}

// ----------------------------
// End Form Action
// ----------------------------

function alternatif_getTransaksi($rek, $id) {
    rekening = $rek;
    referal_id_bank = $id;
    getTransaksi($rek, $id, "all", "all");
    $("#title_debit").html("Kredit : " + $rek);
    $("#title_kredit").html("Debit : " + $rek);
    $.ajax({
        url: "/graph_refresh",
        type: "GET",
        data: {
            id_bank: $id,
            no_rekening: rekening,
        },
        success: function (data) {
            $("#kt_chart_daily_sales").remove();
            $("#kt_chart_daily_sales_out").remove();
            $("#transaksi_masuk").append(
                '<canvas id="kt_chart_daily_sales"></canvas>'
            );
            $("#transaksi_keluar").append(
                '<canvas id="kt_chart_daily_sales_out"></canvas>'
            );
            refresh_graphic_input(data[0], data[4]);
            refresh_graphic_output(data[0], data[3]);
        },
    });
}

function change_format_date($tgl) {
    var cek_moment = moment($tgl);
    var date_change = "";
    date_change = cek_moment.format("DD-MMM-YYYY");
    return date_change;
}

function format_rupiah($uang) {
    var number_string = $uang.toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }
    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return rupiah;
}

// Begin Change Graphic after cek rekening
function refresh_graphic_input($label, $data) {
    var chartContainer = KTUtil.getByID("kt_chart_daily_sales");

    if (!chartContainer) {
        return;
    }

    var chartData = {
        labels: $label,
        datasets: [
            {
                //label: 'Dataset 1',
                backgroundColor: KTApp.getStateColor("info"),
                data: $data,
            },
            {
                //label: 'Dataset 2',
                backgroundColor: "#f3f3fb",
                data: $data,
            },
        ],
    };

    var chart = new Chart(chartContainer, {
        type: "bar",
        data: chartData,
        options: {
            title: {
                display: false,
            },
            tooltips: {
                intersect: false,
                mode: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            responsive: true,
            maintainAspectRatio: false,
            barRadius: 4,
            scales: {
                xAxes: [
                    {
                        display: false,
                        gridLines: false,
                        stacked: true,
                    },
                ],
                yAxes: [
                    {
                        display: false,
                        stacked: true,
                        gridLines: false,
                    },
                ],
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0,
                },
            },
        },
    });
}

function refresh_graphic_output($label, $data) {
    var chartContainer = KTUtil.getByID("kt_chart_daily_sales_out");

    if (!chartContainer) {
        return;
    }

    var chartData = {
        labels: $label,
        datasets: [
            {
                //label: 'Dataset 1',
                backgroundColor: KTApp.getStateColor("danger"),
                data: $data,
            },
            {
                //label: 'Dataset 2',
                backgroundColor: "#f3f3fb",
                data: $data,
            },
        ],
    };

    var chart = new Chart(chartContainer, {
        type: "bar",
        data: chartData,
        options: {
            title: {
                display: false,
            },
            tooltips: {
                intersect: false,
                mode: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            responsive: true,
            maintainAspectRatio: false,
            barRadius: 4,
            scales: {
                xAxes: [
                    {
                        display: false,
                        gridLines: false,
                        stacked: true,
                    },
                ],
                yAxes: [
                    {
                        display: false,
                        stacked: true,
                        gridLines: false,
                    },
                ],
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0,
                },
            },
        },
    });
}

// End Change Graphic after cek rekening

$(document).ready(function () {
    KTDashboard.init();
    getBank();
    log_onload();
});

function fast_notif($deskripsi) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });

    Toast.fire({
        type: "success",
        title: $deskripsi,
    });
}

function modal_rincian($id) {
    document.getElementById("rincian_no_rekening").value = "";
    document.getElementById("rincian_service").value = "";
    document.getElementById("rincian_username").value = "";
    document.getElementById("rincian_password").value = "";
    document.getElementById("rincian_company").value = "";
    document.getElementById("jenis_paket").value = "";

    $.ajax({
        url: "/details_bank",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            document.getElementById("rincian_no_rekening").value =
                data[0].no_rekening;
            document.getElementById("rincian_service").value = data[0].service;
            document.getElementById("rincian_username").value =
                data[0].username_ibank;
            document.getElementById("rincian_password").value =
                data[0].password_ibank;
            document.getElementById("jenis_paket").value = data[0].jenis;
            document.getElementById("paket_layanan").value = data[0].nama_paket;
            document.getElementById("masa_aktif").value =
                data[0].durasi + " Hari";
            document.getElementById("harga").value = "Rp " + data[0].harga;

            if (data[0].status == "expired" || data[0].status == "stop") {
                document.getElementById("status").value = "Tidak Aktif";
            } else {
                document.getElementById("status").value = "Aktif";
            }

            if (data[0].service == "MANDIRI") {
                document.getElementById("rincian_company_id").style.display =
                    "block";
                document.getElementById("rincian_company").value =
                    data[1].company_id;
            } else {
                document.getElementById("rincian_company_id").style.display =
                    "none";
            }

            $("#rincian_rekening").modal("show");
        },
    });
}

function modal_update($id) {
    document.getElementById("id_update").value = "";
    document.getElementById("update_no_rekening").value = "";
    document.getElementById("update_service").value = "";
    document.getElementById("update_company").value = "";
    document.getElementById("update_username").value = "";
    document.getElementById("update_password").value = "";

    $.ajax({
        url: "/details_bank",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            document.getElementById("id_update").value = $id;
            document.getElementById("update_no_rekening").value =
                data[0].no_rekening;
            document.getElementById("update_service").value = data[0].service;
            document.getElementById("update_username").value =
                data[0].username_ibank;
            document.getElementById("update_password").value =
                data[0].password_ibank;

            if (data[0].service == "MANDIRI") {
                document.getElementById("update_company_id").style.display =
                    "block";
                document.getElementById("update_company").value =
                    data[1].company_id;
            } else {
                document.getElementById("update_company_id").style.display =
                    "none";
            }
            alert_verify_update_rekening(
                "! Hati-Hati !",
                "Salah memasukkan username atau password 2 kali akan menyebabkan terblokirnya akun internet banking anda."
            );
            $("#update_rekening").modal("show");
        },
    });
}

function update_rekening($id) {
    $("#FormUpdate").html("");
    $("#FormUpdate").append(
        '<form id="SendFormUpdate" target="___blank" method="get" action="/update_rekening">' +
            '<input type="hidden" value="' +
            $id +
            '" name="id" id="id"></form>'
    );

    $("#SendFormUpdate").submit();
}

function tambah_durasi($id) {
    $.ajax({
        url: "/perpanjang_paket",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            output_durasi(data, $id);
        },
    });
}

function output_durasi($data, $id) {
    if ($data == "null_bank") {
        Swal.fire({
            title: "Silahkan Refresh Halaman",
            timer: 2000,
            onOpen: function () {
                Swal.showLoading();
            },
        });
    } else if ($data == "berhasil") {
        form_tambah_durasi($id);
    }
}

function form_tambah_durasi($id) {
    $("#FormUpdateDurasi").html("");
    $("#FormUpdateDurasi").append(
        '<form id="SendFormDurasi" target="___blank" method="get" action="/update_masa_aktif">' +
            '<input type="hidden" value="' +
            $id +
            '" name="id" id="id"></form>'
    );

    $("#SendFormDurasi").submit();
}

function stop_layanan($id) {
    Swal.mixin({
        confirmButtonText: "Ya, Tetap Hapus",
        cancelButtonText: "Batal",
        cancelButtonColor: "#d33",
        showCancelButton: true,
    })
        .queue([
            {
                title: "Berhenti Langganan ?",
                text: "Anda yakin ingin menghentikan layanan ini ? ",
            },
        ])
        .then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/stop_packet",
                    type: "GET",
                    data: { id: $id },
                    success: function (data) {
                        if (data == "berhasil") {
                            getBank();
                            fast_notif("Layanan Berhenti");
                        } else if (data == "null_bank") {
                            alert(data);
                        }
                    },
                });
            }
        });
}
