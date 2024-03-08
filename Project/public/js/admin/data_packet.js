function modal_add() {
    $("#tambahkan_paket").modal("show");
}

function modal_update($id) {
    document.getElementById("id_update").value = "";

    document.getElementById("change_nama_paket").value = "";
    document.getElementById("change_harga").value = "";
    document.getElementById("change_masa_aktif").value = "";
    document.getElementById("change_status").value = "";
    document.getElementById("change_jenis").value = "";

    document.getElementById("change_bca_cek").checked = false;
    document.getElementById("change_bri_cek").checked = false;
    document.getElementById("change_bni_cek").checked = false;
    document.getElementById("change_mandiri_cek").checked = false;

    $.ajax({
        url: "/find_packet",
        type: "GET",
        data: {
            id: $id,
        },
        success: function (data) {
            document.getElementById("id_update").value = $id;
            document.getElementById("change_nama_paket").value =
                data.data.nama_paket;
            document.getElementById("change_harga").value = data.data.harga;
            document.getElementById("change_jenis").value = data.data.jenis;
            document.getElementById("change_masa_aktif").value =
                data.data.durasi;
            document.getElementById("change_status").value = data.data.status;

            if (data.data.jenis == "harian") {
                document.getElementById("change_masa_aktif").disabled = true;
                document.getElementById("change_masa_aktif").value = "";
            } else {
                document.getElementById("change_masa_aktif").disabled = false;
            }

            document.getElementById("change_jenis").onchange = function () {
                if (this.value == "harian") {
                    document.getElementById(
                        "change_masa_aktif"
                    ).disabled = true;
                    document.getElementById("change_masa_aktif").value = "";
                } else {
                    document.getElementById(
                        "change_masa_aktif"
                    ).disabled = false;
                }
            };

            data.bank.forEach((element) => {
                if (element.service == "BCA") {
                    document.getElementById("change_bca_cek").checked = true;
                } else if (element.service == "BRI") {
                    document.getElementById("change_bri_cek").checked = true;
                } else if (element.service == "BNI") {
                    document.getElementById("change_bni_cek").checked = true;
                } else if (element.service == "MANDIRI") {
                    document.getElementById(
                        "change_mandiri_cek"
                    ).checked = true;
                }
            });

            $("#update_paket").modal("show");
        },
    });
}

function save_change() {
    var id = document.getElementById("id_update").value;

    var nama = document.getElementById("change_nama_paket").value;
    var harga = document.getElementById("change_harga").value;
    var masa_aktif = document.getElementById("change_masa_aktif").value;
    var status = document.getElementById("change_status").value;
    var jenis = document.getElementById("change_jenis").value;

    var bca = document.getElementById("change_bca_cek");
    var bri = document.getElementById("change_bri_cek");
    var mandiri = document.getElementById("change_mandiri_cek");
    var bni = document.getElementById("change_bni_cek");

    var bank = [];
    var cek = 0;

    if (
        nama.length > 0 &&
        harga.length > 0 &&
        harga >= 0 &&
        status.length > 0
    ) {
        if (bca.checked || bri.checked || mandiri.checked || bni.checked) {
            if (bca.checked) {
                bank[cek] = "bca";
                cek++;
            }

            if (bri.checked) {
                bank[cek] = "bri";
                cek++;
            }

            if (mandiri.checked) {
                bank[cek] = "mandiri";
                cek++;
            }

            if (bni.checked) {
                bank[cek] = "bni";
                cek++;
            }

            $.ajax({
                url: "/update_packet",
                type: "GET",
                data: {
                    id: id,
                    nama: nama,
                    harga: harga,
                    jenis: jenis,
                    masa_aktif: masa_aktif,
                    status: status,
                    bank: bank,
                },
                beforeSend: function () {
                    show_btn_validate("loading_data", "update");
                },
                complete: function () {
                    show_btn_validate("save_data", "update");
                },
                success: function (data) {
                    change_output(data, "update");
                },
            });
        } else {
            $("#alert_update").html(
                '<div class="box_alert">' +
                    '<div class="alert_title">! Pilih Satu Bank !</div>' +
                    "Pilih minimal 1 bank untuk terdaftar pada paket layanan." +
                    "</div>"
            );
        }
    }
}

function save_packet() {
    var nama = document.getElementById("nama_paket").value;
    var harga = document.getElementById("harga").value;
    var masa_aktif = document.getElementById("masa_aktif").value;
    var status = document.getElementById("status").value;
    var jenis = document.getElementById("jenis").value;

    var bca = document.getElementById("bca_cek");
    var bri = document.getElementById("bri_cek");
    var mandiri = document.getElementById("mandiri_cek");
    var bni = document.getElementById("bni_cek");

    var bank = [];
    var cek = 0;

    if (
        nama.length > 0 &&
        harga.length > 0 &&
        harga >= 0 &&
        status.length > 0
    ) {
        if (bca.checked || bri.checked || mandiri.checked || bni.checked) {
            if (bca.checked) {
                bank[cek] = "bca";
                cek++;
            }

            if (bri.checked) {
                bank[cek] = "bri";
                cek++;
            }

            if (mandiri.checked) {
                bank[cek] = "mandiri";
                cek++;
            }

            if (bni.checked) {
                bank[cek] = "bni";
                cek++;
            }

            $.ajax({
                url: "/add_packet",
                type: "GET",
                data: {
                    nama: nama,
                    harga: harga,
                    jenis: jenis,
                    masa_aktif: masa_aktif,
                    status: status,
                    bank: bank,
                },
                beforeSend: function () {
                    show_btn_validate("loading_data", "add");
                },
                complete: function () {
                    show_btn_validate("save_data", "add");
                },
                success: function (data) {
                    change_output(data, "add");
                },
            });
        } else {
            $("#alert_add").html(
                '<div class="box_alert">' +
                    '<div class="alert_title">! Pilih Satu Bank !</div>' +
                    "Pilih minimal 1 bank untuk terdaftar pada paket layanan." +
                    "</div>"
            );
        }
    }
}

function change_output($data, $tipe) {
    if ($data == "null_jenis") {
        alert($data);
    } else if ($data == "null_status") {
        alert($data);
    } else if ($data == "null_bank") {
        alert($data);
    } else if ($data == "null_nama") {
        alert($data);
    } else if ($data == "null_harga") {
        alert($data);
    } else if ($data == "null_durasi") {
        alert($data);
    }

    if ($tipe == "update") {
        if ($data == "berhasil") {
            $("#tambahkan_paket").modal("hide");

            var table = $("#packet_datatables").DataTable();
            table.ajax.reload(function (json) {
                $("#packet_datatables").val(json.lastInput);
            });

            $("#alert_update").html(
                '<div class="box_alert_warning">' +
                    '<div class="alert_title">! Pilih Bank !</div>' +
                    "Pilih minimal 1 bank untuk terdaftar pada paket layanan." +
                    "</div>"
            );

            $("#update_paket").modal("hide");

            fast_notif("Data Berhasil Disimpan");
        }
    }

    if ($tipe == "add") {
        if ($data == "berhasil") {
            $("#tambahkan_paket").modal("hide");
            var table = $("#packet_datatables").DataTable();
            table.ajax.reload(function (json) {
                $("#packet_datatables").val(json.lastInput);
            });
            fast_notif("Paket Berhasil Ditambahkan");
        }
    }
}

function delete_paket($id, $no) {
    Swal.mixin({
        confirmButtonText: "Ya, Tetap Hapus",
        cancelButtonText: "Batal",
        cancelButtonColor: "#d33",
        showCancelButton: true,
    })
        .queue([
            {
                title: "Delete Packet ?",
                text: "Hapus paket dengan nomor urut " + $no + " ? ",
            },
        ])
        .then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/delete_packet",
                    type: "GET",
                    data: { id: $id },
                    success: function (data) {
                        var table = $("#packet_datatables").DataTable();
                        table.ajax.reload(function (json) {
                            $("#packet_datatables").val(json.lastInput);
                        });
                        fast_notif("Paket Berhasil Dihapus");
                    },
                });
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

function show_btn_validate($value, $type) {
    if ($type == "update") {
        if ($value == "save_data") {
            $("#div_btn_update").html(
                '<button type="submit" onclick={save_change()} class="btn btn-primary" id="btn_add_bank">Simpan</button>'
            );
        } else if ($value == "loading_data") {
            $("#div_btn_update").html(
                '<i class="fa fa-refresh fa-spin loading_icon" ></i>'
            );
        }
    } else if ($type == "add") {
        if ($value == "save_data") {
            $("#div_btn_add").html(
                '<button type="submit" onclick={save_packet()} class="btn btn-primary" id="btn_add_bank">Daftar</button>'
            );
        } else if ($value == "loading_data") {
            $("#div_btn_add").html(
                '<i class="fa fa-refresh fa-spin loading_icon" ></i>'
            );
        }
    }
}
