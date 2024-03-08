function delete_user($id, $no) {
    Swal.mixin({
        confirmButtonText: "Ya, Tetap Hapus",
        cancelButtonText: "Batal",
        cancelButtonColor: "#d33",
        showCancelButton: true,
    })
        .queue([
            {
                title: "Delete Account ?",
                text: "Hapus Akun dengan nomor urut " + $no + " ? ",
            },
        ])
        .then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/delete_user",
                    type: "GET",
                    data: { id: $id },
                    success: function (data) {
                        var table = $("#user_datatables").DataTable();
                        table.ajax.reload(function (json) {
                            $("#user_datatables").val(json.lastInput);
                        });
                        fast_notif("Akun Berhasil Dihapus");
                    },
                });
            }
        });
}

// Delete char
function del_char($word) {
    let word = $word.slice(2);
    return word.slice(0, -2);
}

function change_password($id, $no) {
    Swal.mixin({
        input: "text",
        inputPlaceholder: "Minimal 8 Character",
        confirmButtonText: "Simpan",
        cancelButtonText: "Batal",
        cancelButtonColor: "#d33",
        progressSteps: 1,
        showCancelButton: true,
    })
        .queue([
            {
                title: "Change Password ?",
                text: "Ubah Kata Sandi Akun dengan nomor urut  " + $no + " ? ",
            },
        ])
        .then((result) => {
            var string = del_char(JSON.stringify(result.value));
            if (string.length >= 8) {
                $.ajax({
                    url: "/password_user",
                    type: "GET",
                    data: {
                        id: $id,
                        password: string,
                    },
                    success: function (data) {
                        fast_notif("Kata Sandi Disimpan");
                    },
                });
            } else {
                change_password($id, $no);
            }
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

function show_btn_bank($value) {
    if ($value == "add_save") {
        $("#div_btn").html(
            '<button type="submit" onclick="add_rekening()" class="btn btn-primary" >Simpan</button>'
        );
    } else if ($value == "loading_add") {
        $("#div_btn").html(
            '<i class="fa fa-refresh fa-spin loading_icon" ></i>'
        );
    }
}

function alert_verify_rekening($title, $desc) {
    $("#alert_add").html(
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

function success_savebank_function($data, $service) {
    if ($data == "berhasil") {
        // Begin Succes Register
        document.getElementById("id_add_rekening").value = "";
        document.getElementById("add_no_rekening").value = "";
        document.getElementById("add_service").value = "";
        document.getElementById("add_username").value = "";
        document.getElementById("add_password").value = "";
        if ($service == "MANDIRI") {
            document.getElementById("add_company").value = "";
        }
        $("#tambahkan_rekening").modal("hide");
        fast_notif("Data Rekening Disimpan");
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
}

function add_rekening() {
    var id_add = document.getElementById("id_add_rekening").value;
    var rekening = document.getElementById("add_no_rekening").value;
    var service = document.getElementById("add_service").value;
    var username = document.getElementById("add_username").value;
    var password = document.getElementById("add_password").value;

    if (
        rekening.length > 0 &&
        service.length > 0 &&
        username.length >= 6 &&
        password.length >= 6
    ) {
        if (service == "MANDIRI") {
            var company = document.getElementById("add_company").value;
            if (company.length > 0) {
                $.ajax({
                    url: "/add_rekening",
                    type: "GET",
                    data: {
                        id: id_add,
                        rekening: rekening,
                        service: service,
                        username: username,
                        password: password,
                        company: company,
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
                        success_savebank_function(data, service);
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
                url: "/add_rekening",
                type: "GET",
                data: {
                    id: id_add,
                    rekening: rekening,
                    service: service,
                    username: username,
                    password: password,
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
                    success_savebank_function(data, service);
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

function sendForm($id) {
    $("#FormUpdate").html("");
    $("#FormUpdate").append(
        '<form id="SendForm" target="blank" method="get" action="/form_update_user">' +
            '<input type="hidden" value="' +
            $id +
            '" name="user_id" id="user_id"></form>'
    );

    $("#SendForm").submit();
}

function FormRekening($id) {
    $("#FormRekening").html("");
    $("#FormRekening").append(
        '<form id="SendFormRekening" target="blank" method="get" action="/form_update_rekening">' +
            '<input type="hidden" value="' +
            $id +
            '" name="user_id" id="user_id"></form>'
    );

    $("#SendFormRekening").submit();
}
