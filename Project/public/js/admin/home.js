// Delete char
function del_char($word) {
    let word = $word.slice(2);
    return word.slice(0, -2);
}

function search() {
    Swal.mixin({
        input: "text",
        inputPlaceholder: "Masukkan E-Mail",
        confirmButtonText: "Cari",
        showCancelButton: false,
    })
        .queue([
            {
                title: "Pencarian",
                text: "Cari Berdasarkan E-Mail : ",
            },
        ])
        .then((result) => {
            if (result.value) {
                var string = del_char(JSON.stringify(result.value));
                if (string.length == 0) {
                    $("#judul_pengguna").html("Daftar Pengguna ");
                } else {
                    $("#judul_pengguna").html("Hasil Pencarian : ");
                }

                getUser("find_user", del_char(JSON.stringify(result.value)));
            }
        });
}

function cut_string($string) {
    var output = $string.substring(0, 20);
    return output;
}

var activitiesChart = function ($label, $data) {
    if ($("#kt_chart_activities").length == 0) {
        return;
    }

    var ctx = document.getElementById("kt_chart_activities").getContext("2d");

    var gradient = ctx.createLinearGradient(0, 0, 0, 240);
    gradient.addColorStop(
        0,
        Chart.helpers.color("#e14c86").alpha(1).rgbString()
    );
    gradient.addColorStop(
        1,
        Chart.helpers.color("#e14c86").alpha(0.3).rgbString()
    );

    var config = {
        type: "line",
        data: {
            labels: $label,
            datasets: [
                {
                    label: "Mutasi",
                    backgroundColor: Chart.helpers
                        .color("#eb4b4b")
                        .alpha(1)
                        .rgbString(), //gradient
                    borderColor: "white",

                    pointBackgroundColor: Chart.helpers
                        .color("#000000")
                        .alpha(0)
                        .rgbString(),
                    pointBorderColor: Chart.helpers
                        .color("#000000")
                        .alpha(0)
                        .rgbString(),
                    pointHoverBackgroundColor: KTApp.getStateColor("light"),
                    pointHoverBorderColor: Chart.helpers
                        .color("#ffffff")
                        .alpha(0.1)
                        .rgbString(),

                    data: $data,
                },
            ],
        },
        options: {
            title: {
                display: false,
            },
            tooltips: {
                mode: "nearest",
                intersect: false,
                position: "nearest",
                xPadding: 25,
                yPadding: 10,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [
                    {
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: "Month",
                        },
                    },
                ],
                yAxes: [
                    {
                        display: false,
                        gridLines: false,
                        scaleLabel: {
                            display: true,
                            labelString: "Value",
                        },
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
            elements: {
                line: {
                    tension: 0.0000005,
                },
                point: {
                    radius: 4,
                    borderWidth: 12,
                },
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 10,
                    bottom: 0,
                },
            },
        },
    };

    var chart = new Chart(ctx, config);
};

var bank_diagram = function ($data) {
    var chartContainer = KTUtil.getByID("bank_diagram");

    if (!chartContainer) {
        return;
    }

    var chartData = {
        labels: ["BCA", "BRI", "BNI", "Mandiri"],

        datasets: [
            {
                // label: "Dataset 1",
                backgroundColor: [
                    KTApp.getStateColor("bca"),
                    KTApp.getStateColor("bri"),
                    KTApp.getStateColor("bni"),
                    KTApp.getStateColor("mandiri"),
                    "#cc00aa",
                    KTApp.getStateColor("success"),
                    "#ffbb00",
                ],
                data: [$data.bca, $data.bri, $data.bni, $data.mandiri],
                // data: [0, 0, 0, 0],
            },
        ],
    };

    var chart = new Chart(chartContainer, {
        type: "bar",
        data: chartData,
        options: {
            title: {
                display: true,
            },
            tooltips: {
                intersect: true,
                mode: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            responsive: true,
            maintainAspectRatio: false,
            barRadius: 4,
            scales: {
                xAxes: [
                    {
                        display: true,
                        gridLines: false,
                        stacked: true,
                    },
                ],
                yAxes: [
                    {
                        display: false,
                        stacked: true,
                        gridLines: false,
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0,
                },
            },
        },
    });
};

var paket_diagram = function ($data) {
    var chartContainer = KTUtil.getByID("paket_diagram");

    if (!chartContainer) {
        return;
    }

    var chartData = {
        labels: ["BCA", "BRI", "BNI", "Mandiri"],

        datasets: [
            {
                // label: "Dataset 1",
                backgroundColor: [
                    KTApp.getStateColor("bca"),
                    KTApp.getStateColor("bri"),
                    KTApp.getStateColor("bni"),
                    KTApp.getStateColor("mandiri"),
                    "#cc00aa",
                    KTApp.getStateColor("success"),
                    "#ffbb00",
                ],
                data: [$data.bca, $data.bri, $data.bni, $data.mandiri],
                // data: [0, 0, 0, 0],
            },
        ],
    };

    var chart = new Chart(chartContainer, {
        type: "doughnut",
        data: chartData,
        options: {
            title: {
                display: false,
            },
            tooltips: {
                intersect: false,
                mode: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            legend: {
                display: false,
            },
            responsive: true,
            maintainAspectRatio: false,
            barRadius: 4,
            scales: {
                xAxes: [
                    {
                        display: false,
                        gridLines: false,
                        stacked: false,
                    },
                ],
                yAxes: [
                    {
                        display: false,
                        stacked: false,
                        gridLines: false,
                        ticks: {
                            beginAtZero: false,
                        },
                    },
                ],
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 0,
                    bottom: 0,
                },
            },
        },
    });
};

function show_lineGraph() {
    $.ajax({
        url: "/linegraph_admin",
        type: "GET",
        success: function (data) {
            activitiesChart(data[0], data[1]);
        },
    });
}

$(document).ready(function () {
    board();
    show_lineGraph();
    setInterval(board, 10000);
});

function board() {
    $.ajax({
        url: "/admin_board",
        type: "GET",
        success: function (data) {
            $("#total_pengguna").html(data[0] + " Pengguna Terdaftar");
            $("#total_rekening").html(data[1] + " Rekening Terdaftar");
            $("#total_mutasi").html(data[2] + " Data Transaksi");
            $("#total_layanan").html(data[3] + " Layanan Tersedia");
        },
    });
}
