function request_forgot() {
    var mail = document.getElementById("email").value;

    if (mail.length > 0) {
        $.ajax({
            url: "/cek_email_user",
            type: "GET",
            data: {
                email: mail,
            },
            success: function (data) {
                if (data == "null_user") {
                    $("#alert_forgot").html("Rekaman Data Tidak Ditemukan");
                } else {
                    $("#alert_forgot").html("");
                    request_otp(mail);
                }
            },
        });
    }
}

function send_verify() {
    var email = document.getElementById("id_user").value;
    var otp = document.getElementById("kode_otp").value;
    var clear = otp.split(" ").join("");
    var password = document.getElementById("password").value;
    var new_password = document.getElementById("password_confirm").value;

    if (otp.length > 0 && password.length > 0 && new_password.length > 0) {
        if (password == new_password) {
            $("#alert_password_confirm").html("");
            $.ajax({
                url: "/verify_otp_user",
                type: "GET",
                data: {
                    email: email,
                    otp: clear,
                    password: password,
                    new_password: new_password,
                },
                success: function (data) {
                    output_verify(data);
                },
            });
        } else {
            $("#alert_password_confirm").html(
                "Kata Sandi Konfirmasi Tidak Sesuai"
            );
        }
    }
}

function output_verify($data) {
    $("#alert_password_confirm").html("");
    $("#alert_otp").html("");

    if (
        $data == "null_user" ||
        $data == "null_password" ||
        $data == "null_otp"
    ) {
        notif_autoclose("Silahkan Restart Halaman");
    } else if ($data == "password_invalid") {
        $("#alert_password_confirm").html("Kata Sandi Konfirmasi Tidak Sesuai");
    } else if ($data == "success_otp") {
        document.getElementById("to_login").click();
    } else if ($data == "failed_otp") {
        $("#alert_otp").html("Kode OTP salah");
    } else if ($data == "refresh") {
        notif_autoclose("Silahkan Restart Halaman");
    }
}

function request_otp($email) {
    $("#request_otp").html("");
    $("#request_otp").append(
        '<form id="SendFormOTP" method="get" action="/verify_otp">' +
            "@csrf" +
            '<input type="hidden" value="' +
            $email +
            '" name="user_email" id="user_email"></form>'
    );

    $("#SendFormOTP").submit();
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

function notif_autoclose($deskripsi) {
    let timerInterval;
    Swal.fire({
        title: $deskripsi,
        timer: 1700,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector("b");
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft();
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        },
    });
}
