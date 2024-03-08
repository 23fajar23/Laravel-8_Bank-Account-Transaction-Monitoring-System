buttonBold.onclick = () => {
    if (message.selectionStart == message.selectionEnd) {
        return; // nothing is selected
    }
    let selected = message.value.slice(
        message.selectionStart,
        message.selectionEnd
    );
    message.setRangeText(`*${selected}*`);
};

buttonItalic.onclick = () => {
    if (message.selectionStart == message.selectionEnd) {
        return; // nothing is selected
    }
    let selected = message.value.slice(
        message.selectionStart,
        message.selectionEnd
    );
    message.setRangeText(`_${selected}_`);
};

buttonStrike.onclick = () => {
    if (message.selectionStart == message.selectionEnd) {
        return; // nothing is selected
    }
    let selected = message.value.slice(
        message.selectionStart,
        message.selectionEnd
    );
    message.setRangeText(`~${selected}~`);
};

// Start button return textarea

buttonBold2.onclick = () => {
    if (report_self.selectionStart == report_self.selectionEnd) {
        return; // nothing is selected
    }
    let selected = report_self.value.slice(
        report_self.selectionStart,
        report_self.selectionEnd
    );
    report_self.setRangeText(`*${selected}*`);
};

buttonItalic2.onclick = () => {
    if (report_self.selectionStart == report_self.selectionEnd) {
        return; // nothing is selected
    }
    let selected = report_self.value.slice(
        report_self.selectionStart,
        report_self.selectionEnd
    );
    report_self.setRangeText(`_${selected}_`);
};

buttonStrike2.onclick = () => {
    if (report_self.selectionStart == report_self.selectionEnd) {
        return; // nothing is selected
    }
    let selected = report_self.value.slice(
        report_self.selectionStart,
        report_self.selectionEnd
    );
    report_self.setRangeText(`~${selected}~`);
};

// End button return textarea

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

function pageUpdate($id) {
    $("#FormAutonotif").html("");
    $("#FormAutonotif").append(
        '<form id="SendForm" target="__blank" method="get" action="/page_update_autonotif">' +
            '<input type="hidden" value="' +
            $id +
            '" name="user_autonotif" id="user_autonotif"></form>'
    );

    $("#SendForm").submit();
}

function show_btn_validate($value) {
    if ($value == "save_data") {
        $("#btn_data_autonotif").html(
            '<button type="submit" onclick={save_data_autonotif()} class="btn btn-label btn-label-brand">Simpan</button>'
        );
    } else if ($value == "loading_data") {
        $("#btn_data_autonotif").html(
            '<i class="fa fa-refresh fa-spin loading_icon" ></i>'
        );
    }
}

function save_data_autonotif() {
    var api_key = document.getElementById("api_key").value;
    var username = document.getElementById("username").value;
    var status = document.getElementById("status").value;
    var uid = document.getElementById("uid_user").value;

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
                show_btn_validate("loading_data");
            },
            complete: function () {
                show_btn_validate("save_data");
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

function save_phone() {
    var data_output = [];
    var jenis_output = [];
    var uid = document.getElementById("uid_user").value;

    $count = document.getElementById("count_penerima").value;
    $convert = Number($count);
    $cek = 0;
    for (let index = 0; index < $convert; index++) {
        $name = "penerima" + index;
        $jenis = "jenis" + index;

        $value = document.getElementById($name).value;
        $value_jenis = document.getElementById($jenis).value;
        $del_space = $value.replace(/\s/g, "");
        if ($del_space !== "") {
            data_output[$cek] = $del_space;
            jenis_output[$cek] = $value_jenis;
            $cek++;
        }
    }

    // alert(jenis_output[1]);

    $.ajax({
        url: "/save_phone_autonotif_user",
        type: "GET",
        data: {
            uid: uid,
            penerima: data_output,
            jenis: jenis_output,
        },
        success: function (data) {
            fast_notif("Daftar Penerima Tersimpan");
        },
    });
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

function add_penerima() {
    $count = document.getElementById("count_penerima").value;
    $convert = Number($count);
    $("#field_penerima").append(
        '<div id="data_penerima' +
            $count +
            '">' +
            "<br />" +
            '<div class="row">' +
            '<div class="col-lg-5 col-sm-5 col-5">' +
            '<div class="input-group">' +
            '<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-arrow-1"></i></span></div>' +
            '<select name="jenis' +
            $count +
            '" id="jenis' +
            $count +
            '" class="form-control" required>' +
            '<option value="kredit">Kredit</option>' +
            '<option value="debit">Debit</option>' +
            '<option value="semua">Kredit & Debit</option>' +
            "</select>" +
            "</div>" +
            "</div>" +
            '<div class="col-lg-7 col-sm-7 col-7">' +
            '<div class="input-group">' +
            '<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-phone"></i></span></div>' +
            '<input type="number" class="form-control" name="penerima' +
            $count +
            '" id="penerima' +
            $count +
            '" placeholder="No Hp Penerima ' +
            $count +
            ' (optional)" value="" >' +
            '<span class="input-group-text" onclick="delete_penerima(' +
            $count +
            ')" style="margin-left: 20px;"><i class="flaticon2-line"></i></span>' +
            "</div>" +
            "</div>" +
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

function modify_word($str) {
    var data = $str.replaceAll("(nominal)", "50.000");
    var data1 = data.replaceAll("(service)", "BCA");
    var data2 = data1.replaceAll("(no_rekening)", "0123456789");
    var data3 = data2.replaceAll("(jenis_transaksi)", "Debit");
    var data4 = data3.replaceAll("(tgl_transaksi)", "19 Oct 2022");
    return data4;
}

function view_output() {
    $("#isi_pesan").html(modify_word(document.getElementById("message").value));
    $("#show_output").modal("show");
}

function view_output2() {
    $("#isi_pesan").html(
        modify_word(document.getElementById("report_self").value)
    );
    $("#show_output").modal("show");
}

function save_message() {
    var message = document.getElementById("message").value;
    var uid = document.getElementById("uid_user").value;

    if (message.length > 0) {
        $.ajax({
            url: "/save_message_autonotif",
            type: "GET",
            data: {
                uid: uid,
                message: message,
            },
            success: function (data) {
                fast_notif("Pesan Disimpan");
            },
        });
    }
}

function save_message2() {
    var uid = document.getElementById("uid_user").value;
    var message = document.getElementById("report_self").value;
    var status = document.getElementById("status_report").value;

    if (message.length > 0 && status.length > 0) {
        $.ajax({
            url: "/save_message_report_self",
            type: "GET",
            data: {
                uid: uid,
                message: message,
                status: status,
            },
            success: function (data) {
                fast_notif("Data Berhasil Disimpan");
            },
        });
    }
}
