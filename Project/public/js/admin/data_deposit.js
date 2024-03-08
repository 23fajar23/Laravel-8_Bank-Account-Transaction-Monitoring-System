function open_modal($id, $no) {
    Swal.mixin({
        confirmButtonText: "Ya, Setujui",
        cancelButtonText: "Batal",
        cancelButtonColor: "#d33",
        showCancelButton: true,
    })
        .queue([
            {
                title: "Verifikasi Pembayaran ?",
                text: "Setujui pembayaran dengan nomor urut " + $no + " ? ",
            },
        ])
        .then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/search_deposit",
                    type: "GET",
                    data: { id: $id },
                    success: function (data) {
                        output_change(data);
                    },
                });
            }
        });
}

function output_change($data) {
    if ($data == "null") {
        Swal.fire({
            title: "Silahkan Refresh Halaman",
            timer: 2000,
            onOpen: function () {
                Swal.showLoading();
            },
        });
    } else {
        var table = $("#riwayat_deposit_datatables").DataTable();
        table.ajax.reload(function (json) {
            $("#riwayat_deposit_datatables").val(json.lastInput);
        });
        fast_notif("Verifikasi Berhasil");
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
