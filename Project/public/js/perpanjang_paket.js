function update_masa_aktif() {
    // alert(123);
    var id = document.getElementById("bank_id").value;
    var paket = document.getElementById("paket").value;
    var harga = document.getElementById("harga").value;
    var masa_aktif = document.getElementById("durasi").value;
    var add_service = document.getElementById("add_service").value;
    var add_username = document.getElementById("add_username").value;
    var add_password = document.getElementById("add_password").value;

    if (
        paket.length > 0 &&
        add_service.length > 0 &&
        add_username.length >= 6 &&
        add_password.length >= 6
    ) {
        if (add_service == "MANDIRI") {
            var add_company = document.getElementById("add_company").value;
            if (add_company.length > 0) {
                $.ajax({
                    url: "/save_update_masa_aktif",
                    type: "GET",
                    data: {
                        id: id,
                        paket: paket,
                        harga: harga,
                        masa_aktif: masa_aktif,
                        service: add_service,
                        username: add_username,
                        password: add_password,
                        company: add_company,
                    },
                    beforeSend: function () {
                        show_btn_bank("loading_add");
                        alert_verify_rekening(
                            "Mohon Tunggu ..",
                            "Sistem Sedang Melakukan Verifikasi Rekening Anda.",
                            "alert"
                        );
                    },
                    complete: function () {
                        show_btn_bank("add_save");
                    },
                    success: function (data) {
                        success_savebank_function(data, add_service);
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
        } else {
            $.ajax({
                url: "/save_update_masa_aktif",
                type: "GET",
                data: {
                    id: id,
                    paket: paket,
                    harga: harga,
                    masa_aktif: masa_aktif,
                    service: add_service,
                    username: add_username,
                    password: add_password,
                },
                beforeSend: function () {
                    show_btn_bank("loading_add");
                    alert_verify_rekening(
                        "Mohon Tunggu ..",
                        "Sistem Sedang Melakukan Verifikasi Rekening Anda.",
                        "alert"
                    );
                },
                complete: function () {
                    show_btn_bank("add_save");
                },
                success: function (data) {
                    success_savebank_function(data, add_service);
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
    if ($value == "add_save") {
        $("#div_btn").html(
            '<button type="submit" onclick={update_masa_aktif()} class="btn btn-primary" id="btn_add_bank">Daftar</button>'
        );
    } else if ($value == "loading_add") {
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
    $("#alert_add").html(
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
            "Silahkan tekan lagi tombol daftar",
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
    } else if ($data == "null_packet") {
        alert_verify_rekening(
            "Paket Tidak Teredia",
            "Silahkan pilih paket layanan yang lainnya.",
            "alert"
        );
    } else if ($data == "null_saldo") {
        alert_verify_rekening(
            "Saldo Tidak Mencukupi",
            "Top-up terlebih dahulu untuk dapat membeli paket layanan ini.",
            "alert"
        );
    } else if ($data == "null_service") {
        alert_verify_rekening(
            "Service Tidak Tersedia",
            "Silahkan pilih jenis bank yang telah disediakan.",
            "alert"
        );
    } else if ($data == "null_expired") {
        alert_verify_rekening(
            "Rekening Tidak Ditemukan",
            "Silahkan muat ulang halaman anda.",
            "alert"
        );
        Swal.fire({
            title: "Silahkan Refresh Halaman",
            timer: 2000,
            onOpen: function () {
                Swal.showLoading();
            },
        });
    }
}

function get_packet() {
    var paket = document.getElementById("paket");

    $.ajax({
        url: "/get_package",
        type: "GET",
        success: function (data) {
            function change_service($no) {
                $("#service_change").html(
                    '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>' +
                        '<select name="add_service" class="form-control" id="add_service" required="required">' +
                        '<option value="">---</option>' +
                        "</select>"
                );

                var bank = document.getElementById("add_service");

                data.data_bank[$no].forEach((element) => {
                    var opt_bank = document.createElement("option");
                    opt_bank.value = element.service;
                    opt_bank.innerHTML = element.service;
                    bank.appendChild(opt_bank);
                });

                document.getElementById("add_service").onchange = function () {
                    if (this.value == "MANDIRI") {
                        document.getElementById("company_id").style.display =
                            "block";
                    } else {
                        document.getElementById("company_id").style.display =
                            "none";
                    }
                };
            }

            data.data_paket.forEach((element) => {
                var opt = document.createElement("option");
                opt.value = element.id;
                opt.innerHTML = element.nama_paket;
                paket.appendChild(opt);

                paket.addEventListener("change", function () {
                    if (this.value == element.id) {
                        document.getElementById("harga").value =
                            "Rp " + element.harga;
                        document.getElementById("jenis_paket").value =
                            element.jenis;
                        document.getElementById("durasi").value =
                            element.durasi + " Hari";

                        if (element.jenis == "harian") {
                            document.getElementById("durasi").value = "-";
                        }

                        change_service(element.no);
                    }

                    if (this.value == "") {
                        document.getElementById("harga").value = "";
                        document.getElementById("durasi").value = "";
                        document.getElementById("jenis_paket").value = "";
                        $("#service_change").html(
                            '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>' +
                                '<select name="add_service" class="form-control" id="add_service" required="required">' +
                                '<option value="">---</option>' +
                                "</select>"
                        );
                    }
                });
            });
        },
    });
}
