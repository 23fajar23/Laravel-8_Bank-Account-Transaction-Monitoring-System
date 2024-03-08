$.ajax({
    url: "/get_bank_received",
    type: "GET",
    success: function (data) {
        var bank = document.getElementById("service_saldo");

        data.forEach((element) => {
            var opt_bank = document.createElement("option");
            opt_bank.value = element;
            opt_bank.innerHTML = element;
            bank.appendChild(opt_bank);
        });
    },
});

function add_saldo() {
    $("#modal_saldo").modal("show");
}

function send_saldo() {
    var saldo = document.getElementById("saldo").value;
    var bank = document.getElementById("service_saldo").value;

    if (saldo < 10000) {
        $("#alert_nominal").html("Minimal Top Up Sebesar Rp 10.000");
    } else {
        $("#alert_nominal").html("");
    }

    if (saldo >= 10000 && bank.length > 0) {
        $.ajax({
            url: "/request_deposit",
            type: "GET",
            data: {
                saldo: saldo,
                service: bank,
            },
            beforeSend: function () {
                show_btn_saldo("loading_add");
            },
            complete: function () {
                show_btn_saldo("add_save");
            },
            success: function (data) {
                return_get_deposit(data);
            },
            error: function () {
                Swal.fire({
                    title: "Silahkan Refresh Halaman",
                    timer: 2000,
                    onOpen: function () {
                        Swal.showLoading();
                    },
                });
            },
        });
    }
}

function show_btn_saldo($value) {
    if ($value == "add_save") {
        $("#btn_save_saldo").html(
            '<button class="btn btn-primary" onclick={send_saldo();}>Simpan</button>'
        );
    } else if ($value == "loading_add") {
        $("#btn_save_saldo").html(
            '<i class="fa fa-spinner fa-pulse loading_icon" ></i>'
        );
    }
}

function printDiv(divPrint) {
    var printContents = document.getElementById(divPrint).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();

    document.body.innerHTML = originalContents;
}

function return_get_deposit($value) {
    if ($value["status"] == "min_saldo") {
        $("#alert_nominal").html("Minimal Top Up Sebesar Rp 10.000");
    } else if ($value["status"] == "null_service") {
        Swal.fire({
            title: "Silahkan Refresh Halaman",
            timer: 2000,
            onOpen: function () {
                Swal.showLoading();
            },
        });
    } else if ($value["status"] == "try_again") {
        Swal.fire({
            title: "Silahkan Coba Lagi",
            timer: 2000,
            onOpen: function () {
                Swal.showLoading();
            },
        });
        // show_btn_saldo("add_save");
    } else if ($value["status"] == "berhasil") {
        $("#modal_saldo").modal("hide");
        fast_notif("Request Berhasil");

        $("#form_invoice").html("");
        $("#form_invoice").append(
            '<form id="SaldoForm" target="blank" method="get" action="/form_deposit_user">' +
                '<input type="hidden" value="' +
                $value["id"] +
                '" name="deposit_id" id="deposit_id"></form>'
        );

        $("#SaldoForm").submit();

        document.getElementById("saldo").value = "";
        document.getElementById("service_saldo").value = "";
    }
}

function detail_invoice_saldo($id) {
    $("#form_detail_saldo").html("");
    $("#form_detail_saldo").append(
        '<form id="SaldoDetails" target="blank" method="get" action="/form_deposit_user">' +
            '<input type="hidden" value="' +
            $id +
            '" name="deposit_id" id="deposit_id"></form>'
    );

    $("#SaldoDetails").submit();
}

function detail_invoice_transaksi($id) {
    $("#form_detail_transaksi").html("");
    $("#form_detail_transaksi").append(
        '<form id="TransaksiDetails" target="__blank" method="get" action="/form_transaksi_user">' +
            '<input type="hidden" value="' +
            $id +
            '" name="transaksi_id" id="transaksi_id"></form>'
    );

    $("#TransaksiDetails").submit();
}

function not_ready() {
    alert("Fitur Ini Belum Tersedia");
}

function tes_cek($value) {
    if ($value == "password") {
        return '<i class="flaticon-security kt-font-danger"></i>';
    } else if ($value == "profil") {
        return '<i class="flaticon2-avatar kt-font-warning"></i>';
    } else if ($value == "kontak") {
        return '<i class="flaticon2-phone kt-font-info"></i>';
    } else if ($value == "on_api") {
        return '<i class="flaticon2-rocket kt-font-success"></i>';
    } else if ($value == "off_api") {
        return '<i class="flaticon2-rocket kt-font-danger"></i>';
    } else if ($value == "event") {
        return '<i class="flaticon2-gift kt-font-warning"></i>';
    } else if ($value == "login_gagal") {
        return '<i class="flaticon-security kt-font-danger"></i>';
    } else if ($value == "rekening_invalid") {
        return '<i class="flaticon2-chart kt-font-danger"></i>';
    } else if ($value == "BNI") {
        return '<i class="flaticon2-rocket kt-font-primary"></i>';
    } else if ($value == "BCA") {
        return '<i class="flaticon2-rocket kt-font-danger"></i>';
    } else if ($value == "BRI") {
        return '<i class="flaticon2-rocket kt-font-warning"></i>';
    } else if ($value == "MANDIRI") {
        return '<i class="flaticon2-rocket kt-font-success"></i>';
    }
}

function del_char($word) {
    let word = $word.slice(2);
    return word.slice(0, -2);
}

function comment() {
    Swal.mixin({
        input: "textarea",
        confirmButtonText: "Kirim",
        showCancelButton: false,
        progressSteps: 1,
    })
        .queue([
            {
                title: "Testimonial",
                text: "Masukkan Saran dan Kritik :",
            },
        ])
        .then((result) => {
            var string = del_char(JSON.stringify(result.value));
            if (string.length > 0) {
                $.ajax({
                    url: "/testimoni",
                    data: { id: string },
                    type: "GET",
                    success: function (data) {},
                });

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                });

                Toast.fire({
                    type: "success",
                    title: "Data Tersimpan",
                });
            } else {
                comment();
            }
        });
}

function click_Logs() {
    // $("#bar_log").html("Logs");
    // $("#bar_alert").html("Alert");
    $.ajax({
        url: "/log_visible",
        type: "GET",
        success: function (data) {},
    });
    // log_onload();
}

function click_alert() {
    $.ajax({
        url: "/alert_visible",
        type: "GET",
        success: function (data) {},
    });
}

function word_new($status) {
    if ($status == "invisible") {
        return '<div class="kt-notification__item-icon">New</div>';
    } else if ($status == "visible") {
        return "";
    }
}

function dot_change($str) {
    var data = $str.replaceAll("/enter", "<br />");
    var data1 = data.replaceAll("/2enter", "<br /><br />");
    var data2 = data1.replaceAll("/start", "&nbsp; &nbsp;&nbsp; ");
    return data2;
}

// function show_event($id) {
//     $.ajax({
//         url: "/cari_pengumuman",
//         type: "GET",
//         data: { id: $id },
//         success: function (data) {
//             $("#event_judul").html(data.judul);
//             $("#event_deskripsi").html(dot_change(data.deskripsi));
//             $("#show_event").modal("show");
//         },
//     });
// }

function log_onload() {
    // $("#log_user").append("1010");
    $.ajax({
        url: "/log_data",
        type: "GET",
        success: function (data) {
            $("#bar_new").html("News (" + data[9] + ")");

            // Begin Data Log
            if (data[3] == 0) {
                $("#log_user").html("<center> Data Tidak Tersedia</center>");
            } else {
                $("#log_user").html("");
            }

            if (data[6] == 0) {
                $("#bar_log").html("Logs");
            } else {
                $("#bar_log").html("Logs (" + data[6] + ")");
            }
            // End Data Log

            // Begin Data Event
            if (data[4] == 0) {
                $("#event_user").html("<center> Data Tidak Tersedia</center>");
            } else {
                $("#bar_event").html("Event (" + data[4] + ")");
                $("#event_user").html("");
            }
            // End Data Event

            // Begin Data Alert
            if (data[5] == 0) {
                $("#alert_user").html("<center> Data Tidak Tersedia</center>");
            } else {
                $("#alert_user").html("");
            }

            if (data[8] == 0) {
                $("#bar_alert").html("Alert");
            } else {
                $("#bar_alert").html("Alert (" + data[8] + ")");
            }
            // End Data Alert

            data[0].forEach((hasil) => {
                $("#log_user").append(
                    '<a href="#" class="kt-notification__item">' +
                        '<div class="kt-notification__item-icon">' +
                        tes_cek(hasil.activity) +
                        "</div>" +
                        '<div class="kt-notification__item-details">' +
                        '<div class="kt-notification__item-title">' +
                        hasil.deskripsi +
                        "</div>" +
                        '<div class="kt-notification__item-time">' +
                        hasil.date +
                        "</div>" +
                        "</div>" +
                        word_new(hasil.status) +
                        "</a>"
                );
            });

            data[1].forEach((hasil) => {
                $("#event_user").append(
                    '<a href="#" class="kt-notification__item">' +
                        '<div class="kt-notification__item-icon">' +
                        tes_cek(hasil.activity) +
                        "</div>" +
                        '<div class="kt-notification__item-details">' +
                        '<div class="kt-notification__item-title">' +
                        hasil.deskripsi +
                        "</div>" +
                        '<div class="kt-notification__item-time">' +
                        hasil.date +
                        "</div>" +
                        "</div>" +
                        "</a>"
                );
            });

            data[2].forEach((hasil) => {
                $("#alert_user").append(
                    '<a href="#" class="kt-notification__item">' +
                        '<div class="kt-notification__item-icon">' +
                        tes_cek(hasil.activity) +
                        "</div>" +
                        '<div class="kt-notification__item-details">' +
                        '<div class="kt-notification__item-title">' +
                        hasil.deskripsi +
                        "</div>" +
                        '<div class="kt-notification__item-time">' +
                        hasil.date +
                        "</div>" +
                        "</div>" +
                        word_new(hasil.status) +
                        "</a>"
                );
            });
        },
    });
}

function notif_wa() {
    $.ajax({
        url: "/get_user_data",
        type: "GET",
        success: function (data) {
            document.getElementById("notif").value = data.notif_wa;
            $("#modal_wa").modal("show");
        },
    });
}

function save_status_wa() {
    var status = document.getElementById("notif").value;
    $.ajax({
        url: "/save_status",
        data: { status: status },
        type: "GET",
        success: function (data) {
            fast_notif("Data Berhasil Disimpan");
            $("#modal_wa").modal("hide");
        },
    });
}

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
