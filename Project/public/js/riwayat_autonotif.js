function modal_info($id) {
    document.getElementById("modal_api_key").value = "";
    document.getElementById("modal_username").value = "";
    $("#modal_status").html("");
    document.getElementById("modal_penerima").value = "";
    document.getElementById("modal_tanggal").value = "";
    document.getElementById("modal_report_self").value = "";

    $.ajax({
        url: "/search_message",
        data: {
            id: $id,
        },
        type: "GET",
        success: function (data) {
            document.getElementById("modal_api_key").value = data.api_key;
            document.getElementById("modal_username").value = data.username;
            if (data.status === "success") {
                $("#modal_status").append(
                    '<a href="javascript:void()" class="btn btn-primary radius_none" style="width:100%;">' +
                        '<i class="flaticon2-check-mark" style="color:white;"></i> Berhasil' +
                        "  </a>"
                );
            } else if (data.status === "Unauthorized") {
                $("#modal_status").append(
                    '<a href="javascript:void()" class="btn btn-danger radius_none" style="width:100%;">' +
                        '<i class="flaticon2-delete" style="color:white;"></i> Gagal' +
                        "  </a>"
                );
            }
            document.getElementById("modal_tanggal").value = data.date;
            document.getElementById("modal_penerima").value = data.phone;
            document.getElementById("modal_report_self").value = data.message;

            $("#track_message").modal("show");
        },
    });
}
