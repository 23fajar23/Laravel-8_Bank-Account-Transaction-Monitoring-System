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

function view_output($type) {
    var message_id = "message_" + $type;
    var data = change_all_data(document.getElementById(message_id).value);
    $("#isi_pesan").html(data);
    $("#show_output").modal("show");
}

function change_all_data($value) {
    var data1 = $value.replaceAll("(otp)", "345678");

    var data2 = data1.replaceAll("(name)", "Mistery");
    var data3 = data2.replaceAll("(fullname)", "Mistery Langit");
    var data4 = data3.replaceAll("(alamat)", "JL Terbang No 23");
    var data5 = data4.replaceAll("(kota)", "pedalaman");
    var data6 = data5.replaceAll("(no_hp)", "012345678921");
    var data7 = data6.replaceAll("(perusahaan)", "Box_Mistery");
    var data8 = data7.replaceAll("(jabatan)", "Manager");
    var data9 = data8.replaceAll("(saldo)", "15.000");
    var data10 = data9.replaceAll("(email)", "mistery@gmail.com");
    var data11 = data10.replaceAll("(password)", "123misteri123");

    var data12 = data11.replaceAll("(service)", "BCA");
    var data13 = data12.replaceAll("(no_rekening)", "123456789");
    var data14 = data13.replaceAll("(nama_paket)", "Murah Meriah");
    var data15 = data14.replaceAll("(harga)", "5.000");
    var data16 = data15.replaceAll("(durasi)", "3");
    var data17 = data16.replaceAll("(date)", "23-10-2021 (11:09)");
    var data18 = data17.replaceAll("(expired)", "24-10-2021 (11:09)");

    var data19 = data18.replaceAll("(nominal)", "20.000");
    var data20 = data19.replaceAll("(tagihan)", "25.475");
    var data21 = data20.replaceAll("(nama_rekening)", "MISTERY BOX NAN GO");
    var data22 = data21.replaceAll("(kode_unik)", "475");

    return data22;
}

function save_message($jenis) {
    var message_id = "message_" + $jenis;
    var status_id = "status_" + $jenis;

    var data1 = document.getElementById(message_id).value;
    var data2 = document.getElementById(status_id).value;

    if (data1.length > 0 && data2.length > 0) {
        $.ajax({
            url: "/save_message_admin",
            type: "GET",
            data: {
                type: $jenis,
                message: data1,
                status: data2,
            },
            success: function (data) {
                success_save(data);
            },
        });
    }
}

function success_save($value) {
    if ($value == "null_type") {
        fast_notif_error("Data Error");
    } else if ($value == "null_status") {
        fast_notif_error("Status Error");
    } else if ($value == "berhasil") {
        fast_notif("Data Disimpan");
    }
}

function save_data_autonotif() {
    var api_key = document.getElementById("api_key").value;
    var username = document.getElementById("username").value;
    var status = document.getElementById("status").value;
    var uid = "admin";

    if (api_key.length > 0 && username.length > 0 && status.length > 0) {
        $.ajax({
            url: "/update_autonotif",
            type: "GET",
            data: {
                uid: uid,
                api_key: api_key,
                status: status,
                username: username,
            },
            beforeSend: function () {
                show_btn_validate("loading_data", "data_autonotif");
            },
            complete: function () {
                show_btn_validate("save_data", "data_autonotif");
            },
            success: function (data) {
                if (data == "success") {
                    fast_notif("Data Berhasil Disimpan");
                    alert_verified(
                        "! Berhasil !",
                        "Data Autonotif berhasil disimpan.",
                        "success"
                    );
                } else {
                    alert_verified(
                        "! Kredensial Salah !",
                        "API_Key atau username tidak ditemukan.",
                        "failed"
                    );
                }
            },
        });
    }
}

function add_penerima() {
    $count = document.getElementById("count_penerima").value;
    $convert = Number($count);
    $("#field_penerima").append(
        '<div id="data_penerima' +
            $count +
            '">' +
            "<br />" +
            '<div class="input-group">' +
            '<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-phone"></i></span></div>' +
            '<input type="number" class="form-control" name="penerima' +
            $count +
            '" id="penerima' +
            $count +
            '" placeholder="No Hp Penerima ' +
            ($convert + 1) +
            ' (optional)" value="" >' +
            '<span class="input-group-text" onclick="delete_penerima(' +
            $count +
            ')" style="margin-left: 20px;"><i class="flaticon2-line"></i></span>' +
            "</div>" +
            "</div>"
    );
    document.getElementById("count_penerima").value = $convert + 1;
}

function delete_penerima($id) {
    $name = "data_penerima" + $id;
    $name_value = "penerima" + $id;
    document.getElementById($name_value).value = "";
    $hidden = document.getElementById($name);
    $hidden.style.display = "none";
}

function show_btn_validate($value, $type) {
    if ($type == "data_autonotif") {
        if ($value == "save_data") {
            $("#btn_data_autonotif").html(
                '<button type="submit" onclick={save_data_autonotif()} class="btn btn-label btn-label-brand">Simpan</button>'
            );
        } else if ($value == "loading_data") {
            $("#btn_data_autonotif").html(
                '<i class="fa fa-refresh fa-spin loading_icon" ></i>'
            );
        }
    } else if ($type == "custom") {
        if ($value == "save_data") {
            $("#btn_send_fast").html(
                '<button type="submit" onclick="send_fast_message()" class="btn btn-label btn-label-brand">Kirim</button>'
            );
        } else if ($value == "loading_data") {
            $("#btn_send_fast").html(
                '<i class="fa fa-refresh fa-spin loading_icon" ></i>'
            );
        }
    }
}

function alert_verified($title, $desc, $type) {
    $box_color = "box_alert";

    if ($type == "success") {
        $box_color = "box_alert_success";
    } else {
        $box_color = "box_alert";
    }

    $("#alert_notif").html(
        '<div class="' +
            $box_color +
            '">' +
            '<div class="alert_title"> ' +
            $title +
            "</div>" +
            $desc +
            "<br /><b>" +
            '<a href="https://app.autonotif.com/register" target="___blank">' +
            "Link Autonotif" +
            "</a>" +
            "</b>" +
            "</div> <br />"
    );
}

function alert_verified_fast($title, $desc, $type) {
    $box_color = "box_alert";

    if ($type == "success") {
        $box_color = "box_alert_success";
    } else {
        $box_color = "box_alert";
    }

    $("#alert_notif_fast").html(
        '<div class="' +
            $box_color +
            '">' +
            '<div class="alert_title"> ' +
            $title +
            "</div>" +
            $desc +
            "<br /><b>" +
            '<a href="https://app.autonotif.com/register" target="___blank">' +
            "Link Autonotif" +
            "</a>" +
            "</b>" +
            "</div> <br />"
    );
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

function fast_notif_error($deskripsi) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });

    Toast.fire({
        type: "error",
        title: $deskripsi,
    });
}

function send_fast_message() {
    var status_autonotif = document.getElementById("status_autonotif").value;
    var status_penerima = document.getElementById("status_penerima").value;
    var message = document.getElementById("fast_message").value;
    var phone = [];

    var tester = "";

    // ---------------------
    // Begin Validate Number
    // ---------------------

    if (status_penerima === "manual") {
        $count = document.getElementById("count_penerima").value;
        $convert = Number($count);
        $cek = 0;
        for (let index = 0; index < $convert; index++) {
            $name = "penerima" + index;
            $value = document.getElementById($name).value;
            if ($value !== "") {
                tester = tester + $value;
                phone[$cek] = $value;
                $cek++;
            }
        }
    } else {
        tester = "0";
        phone[0] = "0";
    }

    // ---------------------
    // End Validate Number
    // ---------------------

    if (status_autonotif === "manual") {
        var api_key = document.getElementById("fast_api_key").value;
        var username = document.getElementById("fast_username").value;

        if (
            status_autonotif.length > 0 &&
            status_penerima.length > 0 &&
            phone[0].length > 0 &&
            api_key.length > 0 &&
            username.length > 0 &&
            message.length > 0
        ) {
            $.ajax({
                url: "/send_message_fast",
                type: "GET",
                data: {
                    status_autonotif: status_autonotif,
                    status_penerima: status_penerima,
                    phone: phone,
                    api_key: api_key,
                    username: username,
                    message: message,
                },
                beforeSend: function () {
                    show_btn_validate("loading_data", "custom");
                },
                complete: function () {
                    show_btn_validate("save_data", "custom");
                },
                success: function (data) {
                    if (data == "success") {
                        fast_notif("Pesan Terkirim");
                        alert_verified_fast(
                            "! Berhasil !",
                            "Pesan telah berhasil dikirim",
                            "success"
                        );
                    } else {
                        alert_verified_fast(
                            "! Kredensial Salah !",
                            "API_Key atau username tidak ditemukan.",
                            "failed"
                        );
                    }
                },
            });
        }
    } else {
        if (
            status_autonotif.length > 0 &&
            status_penerima.length > 0 &&
            phone[0].length > 0 &&
            message.length > 0
        ) {
            $.ajax({
                url: "/send_message_fast",
                type: "GET",
                data: {
                    status_autonotif: status_autonotif,
                    status_penerima: status_penerima,
                    phone: phone,
                    message: message,
                },
                beforeSend: function () {
                    show_btn_validate("loading_data", "custom");
                },
                complete: function () {
                    show_btn_validate("save_data", "custom");
                },
                success: function (data) {
                    if (data == "success") {
                        fast_notif("Pesan Terkirim");
                        alert_verified_fast(
                            "! Berhasil !",
                            "Pesan telah berhasil dikirim",
                            "success"
                        );
                    } else {
                        alert_verified_fast(
                            "! Kredensial Salah !",
                            "API_Key atau username tidak ditemukan.",
                            "failed"
                        );
                    }
                },
            });
        }
    }
}

// -----------------
// Begin Btn style
// -----------------

function style_textarea($id_text, $type) {
    if ($id_text.selectionStart == $id_text.selectionEnd) {
        return; // nothing is selected
    }
    let selected = $id_text.value.slice(
        $id_text.selectionStart,
        $id_text.selectionEnd
    );

    if ($type == "bold") {
        $id_text.setRangeText(`*${selected}*`);
    } else if ($type == "italic") {
        $id_text.setRangeText(`_${selected}_`);
    } else if ($type == "Strikethrough") {
        $id_text.setRangeText(`~${selected}~`);
    }
}

// -----------------
// End Btn style
// -----------------
