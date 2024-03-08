function getBank() {
    var list_bank;
    var color_bank;

    $.ajax({
        url: "/get_list_bank",
        type: "GET",
        success: function (data) {
            list_bank = data;

            if (list_bank[0] == 0) {
                $("#daftar_bank").html(
                    '<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm marbot"><div class="kt-portlet__head-label cenmar"><h3 class="kt-portlet__head-title">Data Tidak Ditemukan</h3></div></div>'
                );
            } else {
                $("#daftar_bank").html("");

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

                    var outputBank =
                        '<div class="kt-widget2 kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">' +
                        '<div class=" kt-widget2__item ' +
                        color_bank +
                        '">' +
                        '<div class="kt-widget2__checkbox">' +
                        // '<label class="kt-checkbox kt-checkbox--solid kt-checkbox--single">' +
                        // '<input type="checkbox">' +
                        // "<span></span>" +
                        // "</label>" +
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
                        '<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
                        '<i class="flaticon-more-1"></i>' +
                        "</button>" +
                        '<div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">' +
                        '<ul class="kt-nav">' +
                        '<li class="kt-nav__item">' +
                        '<a onclick="modal_rincian(' +
                        list_bank[i].id +
                        ')" class="kt-nav__link">' +
                        '<i class="kt-nav__link-icon flaticon2-checking"></i>' +
                        '<span class="kt-nav__link-text">Rincian</span>' +
                        "</a>" +
                        "</li>" +
                        "</ul>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";

                    $("#daftar_bank").append(outputBank);
                }
            }
        },
    });
}

function modal_rincian($id) {
    document.getElementById("rincian_no_rekening").value = "";
    document.getElementById("rincian_service").value = "";
    document.getElementById("rincian_username").value = "";
    document.getElementById("rincian_password").value = "";
    document.getElementById("rincian_company").value = "";

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

function tester_run() {
    var bank = document.getElementById("bank").value;
    var no_rek = document.getElementById("no_rek").value;
    // var tipe = document.getElementById("tipe").value;
    var link_receive = document.getElementById("link_receive").value;

    if (no_rek.length > 0 && link_receive.length > 0) {
        $.ajax({
            url: "/callback_tester",
            data: {
                bank: bank,
                no_rek: no_rek,
                link_receive: link_receive,
            },
            type: "GET",
            success: function (data) {
                document.getElementById("bank_tester").value = bank;
                document.getElementById("no_rek_tester").value = no_rek;
                document.getElementById("url_tester").value = link_receive;
                $("#output").html("");
                if (data.error_code != null) {
                    $("#output").append(
                        "error_code : " +
                            data.error_code +
                            "</br>" +
                            "error_details : " +
                            data.error_details
                    );
                } else {
                    $("#output").append(
                        "response_code : " +
                            data.response_code +
                            "</br>" +
                            "response_details : " +
                            data.response_details +
                            "</br>" +
                            "bank : " +
                            data.bank +
                            "</br>" +
                            "nomor_rekening : " +
                            data.nomor_rekening +
                            "</br>" +
                            "data : [ </br> "
                    );

                    data.data.forEach((hasil) => {
                        $("#output").append(
                            "<div class='mar_left'>{</div> <div class='mar_left_2x'> tanggal_transaksi : " +
                                hasil.tanggal_transaksi +
                                "</br>" +
                                "tipe : " +
                                hasil.tipe +
                                "</br>" +
                                "nominal : " +
                                hasil.nominal +
                                "</br>" +
                                "deskripsi : " +
                                hasil.deskripsi +
                                "</br> </div> <div class='mar_left'>},</div>"
                        );
                    });
                    $("#output").append("]");
                }
            },
        });
    }
}

$(document).ready(function () {
    getBank();
    log_onload();
});
