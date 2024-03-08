log_onload();

function data_onload() {
    $.ajax({
        url: "/get_data_api",
        type: "GET",
        success: function (data) {
            document.getElementById("status").value = data.status;
            document.getElementById("link_receive").value = data.url;
        },
    });
}

function change_api() {
    var status = document.getElementById("status").value;
    var url_link = document.getElementById("link_receive").value;
    var password_change = document.getElementById("password_akun").value;

    if (
        status.length > 0 &&
        url_link.length > 0 &&
        password_change.length > 0
    ) {
        $.ajax({
            url: "/update_api",
            data: { status: status, url: url_link, password: password_change },
            type: "GET",
            success: function (data) {
                if (data == "error") {
                    fast_notif("Password Salah", "error");
                } else {
                    data_onload();
                    fast_notif("Data Berhasil Disimpan", "success");
                }

                document.getElementById("password_akun").value = "";
            },
        });
    }
}

function fast_notif($deskripsi, $tipe) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });

    Toast.fire({
        type: $tipe,
        title: $deskripsi,
    });
}
