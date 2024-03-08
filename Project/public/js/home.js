// View on dashboard user
function desc_cut($value) {
    var output = $value.substring(0, 150);
    return output;
}

//Enter paragraft
function modify_word($str) {
    var data1 = $str.replaceAll("(b)", "<b>");
    var data2 = data1.replaceAll("(/b)", "</b>");
    var data3 = data2.replaceAll("(i)", "<i>");
    var data4 = data3.replaceAll("(/i)", "</i>");
    var data5 = data4.replaceAll("(u)", "<u>");
    var data6 = data5.replaceAll("(/u)", "</u>");
    return data6;
}

function show_change($str) {
    var data1 = $str.replaceAll("/space", "");
    var data2 = data1.replaceAll("(b)", "");
    var data3 = data2.replaceAll("(/b)", "");
    var data4 = data3.replaceAll("(i)", "");
    var data5 = data4.replaceAll("(/i)", "");
    var data6 = data5.replaceAll("(u)", "");
    var data7 = data6.replaceAll("(/u)", "");
    return data7;
}

function del_dot($str) {
    return $str.substring(1);
}

// Get All data news on user dashboard
function pengumuman() {
    $.ajax({
        url: "/getPengumuman",
        type: "GET",
        success: function (data) {
            $("#pengumuman").html("");
            data.forEach((hasil) => {
                $("#pengumuman").append(
                    "<div class='kt-widget3__item'>" +
                        "<div class='kt-widget3__header'>" +
                        "<div class='kt-widget3__user-img'>" +
                        "<img class='kt-widget3__img' src='assets/media/products/speaker.png' alt=''>" +
                        " </div>" +
                        "<div class='kt-widget3__info'>" +
                        "<a class='kt-widget3__username'>" +
                        hasil.judul +
                        "</a><br>" +
                        "<span class='kt-widget3__time'>" +
                        hasil.date +
                        "</span>" +
                        "</div>" +
                        "<span class='kt-widget3__status kt-font-brand'>" +
                        "<a data-toggle='modal' data-target='#modal_pengumuman" +
                        hasil.id +
                        "' class='kt-nav__link'>" +
                        "Open" +
                        "</a>" +
                        "</span>" +
                        "</div>" +
                        "<div class='kt-widget3__body'>" +
                        "<p class='kt-widget3__text desc_info_user'>" +
                        show_change(desc_cut(del_dot(hasil.deskripsi))) +
                        " ... " +
                        "</p>" +
                        "</div>" +
                        "</div>"
                );

                $("#pengumuman").append(
                    '<div class="modal fade" id="modal_pengumuman' +
                        hasil.id +
                        '" tabindex="-1" role="dialog">' +
                        '<div class="modal-dialog modal-lg"  role="document">' +
                        '<div class="modal-content modal-lg paper">' +
                        '<div class="modal-header cenmar">' +
                        '<h3 id="judul_pengumuman">~ ~ ' +
                        hasil.judul +
                        " ~ ~ </h3>" +
                        "</div>" +
                        '<div class="modal-body" >' +
                        '<div class="form-group">' +
                        '<div class="row ">' +
                        '<h5 for="nama" class="control-label font_pengumuman">Yth. Pengguna,</h5>' +
                        "</div>" +
                        '<div class="row">' +
                        '<div id="deskripsi_pengumuman" class="font_pengumuman desc_modal_user">' +
                        modify_word(del_dot(hasil.deskripsi)) +
                        "</div>" +
                        "</div>" +
                        '<div class="row pull-right">' +
                        '<img src="assets/media/products/ttd.png" class="ttd">' +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>"
                );
            });
        },
    });
}

// Run onload page
$(document).ready(function () {
    pengumuman();
    log_onload();
});
