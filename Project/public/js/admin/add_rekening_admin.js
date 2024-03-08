function add_rekening() {
    var id = document.getElementById("id_data").value;
    var paket = document.getElementById("paket").value;
    var harga = document.getElementById("harga").value;
    var masa_aktif = document.getElementById("durasi").value;
    var add_service = document.getElementById("add_service").value;
    var add_no_rekening = document.getElementById("add_no_rekening").value;
    var add_username = document.getElementById("add_username").value;
    var add_password = document.getElementById("add_password").value;

    if (
        paket.length > 0 &&
        add_no_rekening.length > 0 &&
        add_username.length >= 6 &&
        add_password.length >= 6
    ) {
        if (add_service == "MANDIRI") {
            var add_company = document.getElementById("add_company").value;
            if (add_company.length > 0) {
                $.ajax({
                    url: "/add_rekening",
                    type: "GET",
                    data: {
                        id: id,
                        paket: paket,
                        harga: harga,
                        masa_aktif: masa_aktif,
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
                            "Sistem Sedang Melakukan Verifikasi Rekening Anda.",
                            "alert"
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
                            "Pastikan input data telah sesuai dengan rekening anda.",
                            "alert"
                        );
                    },
                });
            }
        } else {
            $.ajax({
                url: "/add_rekening",
                type: "GET",
                data: {
                    id: id,
                    paket: paket,
                    harga: harga,
                    masa_aktif: masa_aktif,
                    service: add_service,
                    no_rekening: add_no_rekening,
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
                    success_savebank_function(data, add_service, "add");
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
            '<button type="submit" onclick="add_rekening()" class="btn btn-primary">Simpan</button>'
        );
    } else if ($value == "loading_add") {
        $("#div_btn").html(
            '<i class="fa fa-spinner fa-pulse loading_icon" ></i>'
        );
    } else if ($value == "update_save") {
        $("#div_btn").html(
            '<button type="submit" onclick="send_update_data()" class="btn btn-primary">Simpan</button>'
        );
    } else if ($value == "durasi_save") {
        $("#div_btn").html(
            '<button type="submit" onclick="send_perpanjang_data()" class="btn btn-primary">Simpan</button>'
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

function success_savebank_function($data, $service, $jenis) {
    if ($data == "gagal_login") {
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
    }

    var id = document.getElementById("id_data").value;

    if ($jenis == "add") {
        if ($data["status"] == "berhasil") {
            // Begin Succes Register
            getBank(id);
            show_btn_bank("add_save");
            alert_verify_rekening(
                "Berhasil",
                "Pembelian paket layanan telah berhasil",
                "success"
            );

            document.getElementById("add_no_rekening").value = "";
            document.getElementById("add_username").value = "";
            document.getElementById("add_password").value = "";
            if ($service == "MANDIRI") {
                document.getElementById("add_company").value = "";
            }

            $("#saldo_now").html("Rp " + $data["saldo"]);
            $("#paket_now").html($data["count_paket"]);
            fast_notif("Rekening Ditambah");

            // End Succes Register
        }
    } else if ($jenis == "update") {
        if ($data == "null_user") {
            Swal.fire({
                title: "User Tidak Ditemukan",
                timer: 2000,
                onOpen: function () {
                    Swal.showLoading();
                },
            });
        } else if ($data == "null_bank") {
            Swal.fire({
                title: "Rekening Tidak Terdaftar",
                timer: 2000,
                onOpen: function () {
                    Swal.showLoading();
                },
            });
        }

        if ($data == "berhasil") {
            show_btn_bank("update_save");
            alert_verify_rekening(
                "Berhasil",
                "Data Rekening Berhasil Disimpan",
                "success"
            );
            fast_notif("Berhasil Menyimpan Data");
        }
    } else if ($jenis == "durasi") {
        show_btn_bank("update_save");
        getBank(id);
        alert_verify_rekening(
            "Berhasil",
            "Perpanjangan Masa Aktif Berhasil",
            "success"
        );
        fast_notif("Pembelian Berhasil");
    }
}

function show_bank($data) {
    var list_bank;
    var color_bank;
    var logo;
    var logo_reverse;
    var jenis;

    list_bank = $data;

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
                logo +
                '">' +
                '<a onclick="perpanjang_paket(' +
                list_bank[i].id +
                ');" class="kt-nav__link">' +
                '<i class="kt-nav__link-icon flaticon-time"></i>' +
                '<span class="kt-nav__link-text">Perpanjangan</span>' +
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
}

function getBank($id) {
    $.ajax({
        url: "/get_bank_user",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            show_bank(data);
        },
    });
}

function update_rekening($id) {
    $.ajax({
        url: "/cek_rekening",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            form_update();
            document.getElementById("id_update_rekening").value = data.id;
            document.getElementById("paket").value = data.nama_paket;
            document.getElementById("update_no_rekening").value =
                data.nama_paket;
            document.getElementById("harga").value = "Rp " + data.harga;
            document.getElementById("durasi").value = data.durasi + " Hari";
            document.getElementById("service_update").value = data.service;
            document.getElementById("jenis_paket").value = data.jenis;
            document.getElementById("update_no_rekening").value =
                data.no_rekening;

            if (data.service == "MANDIRI") {
                document.getElementById("company_id").style.display = "block";
                document.getElementById("update_company").value =
                    data.company_id;
            } else {
                document.getElementById("company_id").style.display = "none";
            }
        },
    });
}

function form_add() {
    $("#judul_pengguna").html("Tambah Rekening");

    $("#daftar_paket").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-box-1"></i></span></div>' +
            '<select name="paket" class="form-control" id="paket" required="required"> <option value="">---</option> </select>'
    );

    $("#no_rek").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>' +
            '<input type="number" class="form-control" name="add_no_rekening" id="add_no_rekening" placeholder="Nomor Rekening" required>'
    );

    $("#service_change").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>' +
            '<select name="add_service" class="form-control" id="add_service" required> <option value="">---</option> </select>'
    );

    $("#input_company").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-copyright"></i></span></div>' +
            '<input type="text" class="form-control" placeholder="Company ID" name="add_company" id="add_company" required>'
    );

    document.getElementById("paket").onchange = function () {
        if (this.value == "") {
            document.getElementById("company_id").style.display = "none";
        }
    };

    $("#div_btn").html(
        '<button type="submit" onclick="add_rekening()" class="btn btn-primary">Simpan</button>'
    );

    var service = document.getElementById("add_service").value;

    if (service == "MANDIRI") {
        document.getElementById("company_id").style.display = "block";
    } else {
        document.getElementById("company_id").style.display = "none";
    }

    document.getElementById("harga").value = "";
    document.getElementById("durasi").value = "";
    document.getElementById("jenis_paket").value = "";
    document.getElementById("add_username").value = "";
    document.getElementById("add_password").value = "";

    get_package();
}

function form_update() {
    $("#judul_pengguna").html("Update Rekening");

    $("#daftar_paket").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-box-1"></i></span></div>' +
            '<input type="text" class="form-control" name="paket" id="paket" placeholder="Paket Layanan" disabled>'
    );

    $("#no_rek").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>' +
            '<input type="number" id="update_no_rekening" class="form-control" placeholder="Nomor Rekening" disabled>'
    );

    $("#service_change").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-bank"></i></span></div>' +
            '<input type="text" class="form-control" name="service_update" id="service_update" placeholder="Service" disabled>'
    );

    $("#input_company").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-copyright"></i></span></div>' +
            '<input type="text" class="form-control" placeholder="Company ID" name="update_company" id="update_company" required>'
    );

    $("#div_btn").html(
        '<button type="submit" onclick="send_update_data()" class="btn btn-primary">Simpan</button>'
    );
}

function send_update_data() {
    var id = document.getElementById("id_update_rekening").value;
    var user = document.getElementById("id_data").value;
    var company = document.getElementById("update_company").value;
    var username = document.getElementById("add_username").value;
    var password = document.getElementById("add_password").value;

    if (username.length > 0 && password.length > 0) {
        $.ajax({
            url: "/ubah_rekening",
            type: "GET",
            data: {
                id: id,
                user: user,
                company: company,
                username: username,
                password: password,
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
                show_btn_bank("update_save");
            },
            success: function (data) {
                success_savebank_function(data, "all", "update");
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

function send_perpanjang_data() {
    var id = document.getElementById("id_perpanjang_rekening").value;
    var user = document.getElementById("id_data").value;
    var company = document.getElementById("add_company").value;
    var username = document.getElementById("add_username").value;
    var password = document.getElementById("add_password").value;
    var service = document.getElementById("add_service").value;
    var paket = document.getElementById("paket").value;
    var harga = document.getElementById("harga").value;
    var masa_aktif = document.getElementById("durasi").value;

    if (
        paket.length > 0 &&
        service.length > 0 &&
        username.length >= 6 &&
        password.length >= 6
    ) {
        $.ajax({
            url: "/perpanjang_rekening",
            type: "GET",
            data: {
                id: id,
                user: user,
                paket: paket,
                harga: harga,
                masa_aktif: masa_aktif,
                service: service,
                username: username,
                password: password,
                company: company,
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
                show_btn_bank("durasi_save");
            },
            success: function (data) {
                success_savebank_function(data, service, "durasi");
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

function perpanjang_paket($id) {
    form_add();
    $("#judul_pengguna").html("Perpanjang Masa Aktif");

    $("#no_rek").html(
        '<div class="input-group-prepend"><span class="input-group-text"><i class="la la-credit-card"></i></span></div>' +
            '<input type="number" class="form-control" name="add_no_rekening" id="add_no_rekening" placeholder="Nomor Rekening" disabled>'
    );
    document.getElementById("id_perpanjang_rekening").value = $id;

    $.ajax({
        url: "/cek_rekening",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            document.getElementById("add_no_rekening").value = data.no_rekening;
            if (data.service == "MANDIRI") {
                document.getElementById("add_company").value = data.company_id;
            }
        },
    });

    $("#div_btn").html(
        '<button type="submit" onclick="send_perpanjang_data()" class="btn btn-primary">Simpan</button>'
    );
}

function delete_rekening($id) {
    $.ajax({
        url: "/delete_rekening",
        data: { id: $id },
        type: "GET",
        success: function (data) {
            $("#hapus" + $id).modal("hide");
            $("#paket_now").html(data["count_paket"]);
            getBank(data["id"]);
        },
    });
    fast_notif("Rekening Dihapus");
}

function modal_rincian($id) {
    document.getElementById("rincian_no_rekening").value = "";
    document.getElementById("rincian_service").value = "";
    document.getElementById("rincian_company").value = "";

    $.ajax({
        url: "/cek_rekening",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            document.getElementById("rincian_no_rekening").value =
                data.no_rekening;
            document.getElementById("rincian_service").value = data.service;
            document.getElementById("rincian_paket_layanan").value =
                data.nama_paket;
            document.getElementById("rincian_masa_aktif").value =
                data.durasi + " Hari";
            document.getElementById("rincian_harga").value = "Rp " + data.harga;
            document.getElementById("rincian_jenis_paket").value = data.jenis;

            if (data.status == "expired" || data.status == "stop") {
                document.getElementById("rincian_status").value = "Tidak Aktif";
            } else {
                document.getElementById("rincian_status").value = "Aktif";
            }

            if (data.service == "MANDIRI") {
                document.getElementById("rincian_company_id").style.display =
                    "block";
                document.getElementById("rincian_company").value =
                    data.company_id;
            } else {
                document.getElementById("rincian_company_id").style.display =
                    "none";
            }

            $("#rincian_rekening").modal("show");
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

function get_package() {
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
                        document.getElementById("durasi").value =
                            element.durasi + " Hari";
                        document.getElementById("jenis_paket").value =
                            element.jenis;
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

function stop_layanan($id) {
    var user = document.getElementById("id_data").value;
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
                    url: "/stop_rekening",
                    type: "GET",
                    data: {
                        id: $id,
                        user: user,
                    },
                    success: function (data) {
                        if (data == "berhasil") {
                            getBank(user);
                            fast_notif("Layanan Berhenti");
                        } else if (data == "null_bank") {
                            alert(data);
                        }
                    },
                });
            }
        });
}
