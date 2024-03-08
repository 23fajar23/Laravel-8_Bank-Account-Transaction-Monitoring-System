function show_btn_bank($value) {
    if ($value == "update_save") {
        $("#div_btn").html(
            '<button type="submit" onclick={update_rekening()} class="btn btn-primary" id="btn_update_bank">Simpan</button>'
        );
    } else if ($value == "loading_update") {
        $("#div_btn").html(
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

function success_savebank_function($data) {
    if ($data == "berhasil") {
        // Begin Succes Register
        alert_verify_rekening(
            "Berhasil",
            "Data Rekening Berhasil Diperbarui",
            "success"
        );
        fast_notif("Data Berhasil Disimpan");
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
    }
}
