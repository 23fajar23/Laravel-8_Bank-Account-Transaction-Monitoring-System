function get_data() {
    $.ajax({
        url: "/get_user_data",
        type: "GET",
        success: function (data) {
            // View Default
            document.getElementById("username").value = data.name;
            document.getElementById("fullname").value = data.fullname;
            document.getElementById("jenis_kelamin").value = data.jenis_kelamin;
            document.getElementById("alamat").value = data.alamat;
            document.getElementById("kota").value = data.kota;
            document.getElementById("perusahaan").value = data.perusahaan;
            document.getElementById("jabatan").value = data.jabatan;
            document.getElementById("no_hp").value = data.no_hp;

            // View On Modal
            document.getElementById("change_username").value = data.name;
            document.getElementById("change_fullname").value = data.fullname;
            document.getElementById("change_jenis_kelamin").value =
                data.jenis_kelamin;
            document.getElementById("change_alamat").value = data.alamat;
            document.getElementById("change_kota").value = data.kota;
            document.getElementById("change_perusahaan").value =
                data.perusahaan;
            document.getElementById("change_jabatan").value = data.jabatan;
            document.getElementById("change_no_hp").value = data.no_hp;
        },
    });
}

function send_profil() {
    var change_username = document.getElementById("change_username").value;
    var change_fullname = document.getElementById("change_fullname").value;
    var change_jenis_kelamin = document.getElementById(
        "change_jenis_kelamin"
    ).value;
    var change_kota = document.getElementById("change_kota").value;
    var change_alamat = document.getElementById("change_alamat").value;
    var change_perusahaan = document.getElementById("change_perusahaan").value;
    var change_jabatan = document.getElementById("change_jabatan").value;

    if (
        change_username.length >= 5 &&
        change_fullname.length >= 8 &&
        change_jenis_kelamin.length > 0 &&
        change_kota.length > 0 &&
        change_alamat.length > 0
    ) {
        $.ajax({
            url: "/save_profil",
            data: {
                username: change_username,
                fullname: change_fullname,
                jenis_kelamin: change_jenis_kelamin,
                kota: change_kota,
                alamat: change_alamat,
                perusahaan: change_perusahaan,
                jabatan: change_jabatan,
            },
            type: "GET",
            success: function (data) {
                $("#profil_pengguna").modal("hide");
                get_data();
                fast_notif("Profil Berhasil Diubah");
            },
        });
    }
}

function send_kontak() {
    var no_hp = document.getElementById("change_no_hp").value;
    if (no_hp.length > 0) {
        $.ajax({
            url: "/save_kontak",
            data: {
                no_hp: no_hp,
            },
            type: "GET",
            success: function (data) {
                if (data == "null_numeric") {
                    alert("Gunakan Input Numeric");
                } else {
                    fast_notif("Kontak Berhasil Diubah");
                    $("#informasi_kontak").modal("hide");
                    get_data();
                }
            },
        });
    }
}

function change_password() {
    var pwd = document.getElementById("password").value;
    if (pwd.length >= 8) {
        $.ajax({
            url: "/change_password_admin",
            data: {
                password: pwd,
            },
            type: "GET",
            success: function (data) {
                if (data == "null_password") {
                    alert("Kata Sandi Minimal 8 digit");
                } else {
                    $("#keamanan").modal("hide");
                    get_data();
                    document.getElementById("password").value = "";
                    fast_notif("Kata Sandi Berhasil Diubah");
                }
            },
        });
    }
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
