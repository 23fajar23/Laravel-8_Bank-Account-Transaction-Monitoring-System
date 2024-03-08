function btn_off() {
    document.getElementById("informasi_rekening").classList.remove("active");
    document.getElementById("riwayat_transaksi").classList.remove("active");
    document.getElementById("server_integration").classList.remove("active");
    document.getElementById("changelog").classList.remove("active");
    document.getElementById("common_errors").classList.remove("active");
    document.documentElement.scrollTop = 0;
}

$("#informasi_rekening").click(function () {
    btn_off();
    document.getElementById("informasi_rekening").classList.add("active");
    $("#title_change").html("Informasi Rekening");
    $("#content_docs").load("assets_dokumentasi/part/informasi_rekening.html");
});

$("#riwayat_transaksi").click(function () {
    btn_off();
    document.getElementById("riwayat_transaksi").classList.add("active");
    $("#title_change").html("Riwayat Transaksi");
    $("#content_docs").load("assets_dokumentasi/part/riwayat_transaksi.html");
});

$("#server_integration").click(function () {
    btn_off();
    document.getElementById("server_integration").classList.add("active");
    $("#title_change").html("Integrasi Server");
    $("#content_docs").load("assets_dokumentasi/part/server_integration.html");
});

$("#changelog").click(function () {
    btn_off();
    document.getElementById("changelog").classList.add("active");
    $("#title_change").html("Changelog");
    $("#content_docs").load("assets_dokumentasi/part/changelog.html");
});

$("#common_errors").click(function () {
    btn_off();
    document.getElementById("common_errors").classList.add("active");
    $("#title_change").html("Common Errors");
    $("#content_docs").load("assets_dokumentasi/part/common_error.html");
});

// Button Dashboard

$("#dashboard_rekening").click(function () {
    btn_off();
    document.getElementById("informasi_rekening").classList.add("active");
    $("#title_change").html("Informasi Rekening");
    $("#content_docs").load("assets_dokumentasi/part/informasi_rekening.html");
});

$("#dashboard_transaksi").click(function () {
    btn_off();
    document.getElementById("riwayat_transaksi").classList.add("active");
    $("#title_change").html("Riwayat Transaksi");
    $("#content_docs").load("assets_dokumentasi/part/riwayat_transaksi.html");
});

$("#dashboard_integrasi").click(function () {
    btn_off();
    document.getElementById("server_integration").classList.add("active");
    $("#title_change").html("Integrasi Server");
    $("#content_docs").load("assets_dokumentasi/part/server_integration.html");
});

$("#dashboard_perubahan").click(function () {
    btn_off();
    document.getElementById("changelog").classList.add("active");
    $("#title_change").html("Perubahan");
    $("#content_docs").load("assets_dokumentasi/part/changelog.html");
});

$("#dashboard_errors").click(function () {
    btn_off();
    document.getElementById("common_errors").classList.add("active");
    $("#title_change").html("Kesalahan Umum");
    $("#content_docs").load("assets_dokumentasi/part/common_error.html");
});

// dashboard_rekening, dashboard_transaksi,dashboard_integrasi,
// dashboard_perubahan, dashboard_errors
