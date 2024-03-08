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

function delete_pengumuman($id, $no) {
    Swal.mixin({
        confirmButtonText: "Ya, Tetap Hapus",
        cancelButtonText: "Batal",
        cancelButtonColor: "#d33",
        showCancelButton: true,
    })
        .queue([
            {
                title: "Delete Event ?",
                text: "Hapus Pengumuman dengan nomor urut " + $no + " ? ",
            },
        ])
        .then((result) => {
            if (result.value) {
                // fast_notif("Event Berhasil Dihapus");
                $.ajax({
                    url: "/delete_event",
                    type: "GET",
                    data: { id: $id },
                    success: function (data) {
                        var table = $("#event_datatables").DataTable();
                        table.ajax.reload(function (json) {
                            $("#event_datatables").val(json.lastInput);
                        });
                        fast_notif("Event Berhasil Dihapus");
                    },
                });
            }
        });
}

function pageEvent($id) {
    $("#FormEvent").html("");
    $("#FormEvent").append(
        '<form id="SendForm" target="___blank" method="get" action="/page_update_event">' +
            '<input type="hidden" value="' +
            $id +
            '" name="user_event" id="user_event"></form>'
    );

    $("#SendForm").submit();
}
