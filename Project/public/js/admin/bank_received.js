function toggle_show($value) {
    $button = document.getElementById("btn-" + $value).value;
    if ($button == "off") {
        document.getElementById("btn-" + $value).value = "on";
        $("#value-" + $value).html('<i class="flaticon2-down"></i>');
        $("#collapse-" + $value).collapse("show");
    } else {
        document.getElementById("btn-" + $value).value = "off";
        $("#value-" + $value).html('<i class="flaticon2-up"></i>');
        $("#collapse-" + $value).collapse("hide");
    }
}

function enable_input() {
    document.getElementById("nama_rekening").disabled = true;
    document.getElementById("no_rekening").disabled = true;
    document.getElementById("status").disabled = true;
    document.getElementById("username").disabled = true;
    document.getElementById("password").disabled = true;
}

function null_input() {
    document.getElementById("nama_rekening").value = "";
    document.getElementById("no_rekening").value = "";
    document.getElementById("status").value = "";
    document.getElementById("username").value = "";
    document.getElementById("password").value = "";
    document.getElementById("company").value = "";
}

function disable_input() {
    document.getElementById("nama_rekening").disabled = false;
    document.getElementById("no_rekening").disabled = false;
    document.getElementById("status").disabled = false;
    document.getElementById("username").disabled = false;
    document.getElementById("password").disabled = false;
}

function save_bank() {
    var nama_rekening = document.getElementById("nama_rekening").value;
    var no_rekening = document.getElementById("no_rekening").value;
    var service = document.getElementById("service").value;
    var status = document.getElementById("status").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (
        nama_rekening.length > 0 &&
        no_rekening.length > 0 &&
        service.length > 0 &&
        status.length > 0 &&
        username.length >= 6 &&
        password.length >= 6
    ) {
        if (service == "MANDIRI") {
            var company_id = document.getElementById("company").value;
            $.ajax({
                url: "/save_deposit_bank",
                type: "GET",
                data: {
                    nama_rekening: nama_rekening,
                    no_rekening: no_rekening,
                    service: service,
                    status: status,
                    company_id: company_id,
                    username: username,
                    password: password,
                },
                beforeSend: function () {
                    show_btn_bank("loading_update");
                    alert_verify_rekening(
                        "Mohon Tunggu ..",
                        "Sistem Sedang Melakukan Verifikasi Rekening Anda.",
                        "alert"
                    );
                },
                complete: function () {
                    show_btn_bank("update_save");
                },
                success: function (data) {
                    call_data();
                    success_savebank_function(data, service);
                },
                error: function () {
                    alert_verify_rekening(
                        "Sesuaikan Data",
                        "Pastikan input data telah sesuai dengan rekening anda.",
                        "alert"
                    );
                },
            });
        } else {
            $.ajax({
                url: "/save_deposit_bank",
                type: "GET",
                data: {
                    nama_rekening: nama_rekening,
                    no_rekening: no_rekening,
                    service: service,
                    status: status,
                    username: username,
                    password: password,
                },
                beforeSend: function () {
                    show_btn_bank("loading_update");
                    alert_verify_rekening(
                        "Mohon Tunggu ..",
                        "Sistem Sedang Melakukan Verifikasi Rekening Anda.",
                        "alert"
                    );
                },
                complete: function () {
                    show_btn_bank("update_save");
                },
                success: function (data) {
                    call_data();
                    success_savebank_function(data, service);
                },
                error: function () {
                    alert_verify_rekening(
                        "Sesuaikan Data",
                        "Pastikan input data telah sesuai dengan rekening anda.",
                        "alert"
                    );
                },
            });
        }
    }
}

function show_btn_bank($value) {
    if ($value == "update_save") {
        $("#btn_send").html(
            '<button type="submit" onclick={save_bank()} class="btn btn-label btn-label-brand">Simpan</button>'
        );
    } else if ($value == "loading_update") {
        $("#btn_send").html(
            '<i class="fa fa-spinner fa-pulse loading_icon" ></i>'
        );
    }
}

function alert_verify_rekening($title, $desc, $status) {
    $color = "box_alert";
    if ($status == "success") {
        $color = "box_alert_success";
    } else if ($status == "warning") {
        $color = "box_alert_warning";
    } else if ($status == "alert") {
        $color = "box_alert";
    }
    $("#alert_update").html(
        '<div class="row">' +
            '<div class="col-lg-12" style="color: black;">' +
            '<div class="' +
            $color +
            '">' +
            '<div class="alert_title"> ' +
            $title +
            "</div>" +
            $desc +
            "</div>" +
            "</div>" +
            "</div> <br />"
    );
}

function success_savebank_function($data, $service) {
    if ($data == "berhasil") {
        // Begin Succes Register
        alert_verify_rekening(
            "Berhasil",
            "Pembelian paket layanan telah berhasil",
            "success"
        );
        fast_notif("Data Tersimpan");
        // End Succes Register
    } else if ($data == "gagal_login") {
        // Begin Alert Error Login
        alert_verify_rekening(
            "Kredensial Salah",
            "Username atau password tidak sesuai",
            "alert"
        );
        // End Alert Error Login
    } else if ($data == "sesi_login") {
        // Begin Alert Wait Session
        alert_verify_rekening(
            "Tunggu Sebentar ...",
            "Akun Internet Banking anda sedang login di perangkat lain.",
            "alert"
        );
        // End Alert Wait Session
    } else if ($data == "error_captcha") {
        // Begin Try Again connect to server
        alert_verify_rekening(
            "Server Sibuk",
            "Silahkan tekan lagi tombol simpan",
            "alert"
        );
        // End Try Again connect to server
    } else if ($data == "invalid_rekening") {
        // Begin Alert Rekening Not Found
        alert_verify_rekening(
            "Kredensial Salah",
            "Nomor Rekening Tidak Ditemukan",
            "alert"
        );
        // End Alert Rekening Not Found
    } else if ($data == "status_off") {
        // Begin Alert Rekening Not Found
        alert_verify_rekening(
            "Status OFF",
            "Akun Rekening Berhasil Dinonaktifkan",
            "success"
        );
        // End Alert Rekening Not Found
    } else if ($data == "status_on") {
        // Begin Alert Rekening Not Found
        alert_verify_rekening(
            "Status ON",
            "Akun Rekening Berhasil Diaktifkan",
            "success"
        );
        // End Alert Rekening Not Found
    }
}

function call_data() {
    $.ajax({
        url: "/data_bank_admin",
        type: "GET",
        success: function (data) {
            document.getElementById("service").onchange = function () {
                if (this.value == "MANDIRI") {
                    document.getElementById("company_id").style.display =
                        "block";
                } else {
                    document.getElementById("company_id").style.display =
                        "none";
                }

                if (this.value == "") {
                    null_input();
                    enable_input();
                } else {
                    disable_input();
                }

                if (this.value == "BCA") {
                    null_input();
                    document.getElementById("nama_rekening").value =
                        data["bca"].nama_rekening;
                    document.getElementById("no_rekening").value =
                        data["bca"].no_rekening;
                    document.getElementById("status").value =
                        data["bca"].status;
                    document.getElementById("username").value =
                        data["bca"].username_ibank;
                    document.getElementById("password").value =
                        data["bca"].password_ibank;
                    document.getElementById("company").value = "";
                }

                if (this.value == "BRI") {
                    null_input();
                    document.getElementById("nama_rekening").value =
                        data["bri"].nama_rekening;
                    document.getElementById("no_rekening").value =
                        data["bri"].no_rekening;
                    document.getElementById("status").value =
                        data["bri"].status;
                    document.getElementById("username").value =
                        data["bri"].username_ibank;
                    document.getElementById("password").value =
                        data["bri"].password_ibank;
                    document.getElementById("company").value = "";
                }

                if (this.value == "BNI") {
                    null_input();
                    document.getElementById("nama_rekening").value =
                        data["bni"].nama_rekening;
                    document.getElementById("no_rekening").value =
                        data["bni"].no_rekening;
                    document.getElementById("status").value =
                        data["bni"].status;
                    document.getElementById("username").value =
                        data["bni"].username_ibank;
                    document.getElementById("password").value =
                        data["bni"].password_ibank;
                    document.getElementById("company").value = "";
                }

                if (this.value == "MANDIRI") {
                    null_input();
                    document.getElementById("nama_rekening").value =
                        data["mandiri"].nama_rekening;
                    document.getElementById("no_rekening").value =
                        data["mandiri"].no_rekening;
                    document.getElementById("status").value =
                        data["mandiri"].status;
                    document.getElementById("username").value =
                        data["mandiri"].username_ibank;
                    document.getElementById("password").value =
                        data["mandiri"].password_ibank;
                    document.getElementById("company").value =
                        data["mandiri"].company_id;
                }
            };
        },
    });
}
