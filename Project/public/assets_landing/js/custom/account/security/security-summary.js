"use strict";
var KTAccountSecuritySummary = (function () {
    var t = function (t, e, a, r, s) {
        var i = document.querySelector(e),
            n = parseInt(KTUtil.css(i, "height"));
        if (i) {
            var o = {
                    series: [
                        { name: "Net Profit", data: a },
                        { name: "Revenue", data: r },
                    ],
                    chart: {
                        fontFamily: "inherit",
                        type: "bar",
                        height: n,
                        toolbar: { show: !1 },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: !1,
                            columnWidth: ["35%"],
                            endingShape: "rounded",
                        },
                    },
                    legend: { show: !1 },
                    dataLabels: { enabled: !1 },
                    stroke: { show: !0, width: 2, colors: ["transparent"] },
                    xaxis: {
                        categories: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dec",
                        ],
                        axisBorder: { show: !1 },
                        axisTicks: { show: !1 },
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue(
                                    "--bs-gray-400"
                                ),
                                fontSize: "12px",
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue(
                                    "--bs-gray-400"
                                ),
                                fontSize: "12px",
                            },
                        },
                    },
                    fill: { opacity: 1 },
                    states: {
                        normal: { filter: { type: "none", value: 0 } },
                        hover: { filter: { type: "none", value: 0 } },
                        active: {
                            allowMultipleDataPointsSelection: !1,
                            filter: { type: "none", value: 0 },
                        },
                    },
                    tooltip: {
                        style: { fontSize: "12px" },
                        y: {
                            formatter: function (t) {
                                return "$" + t + " thousands";
                            },
                        },
                    },
                    colors: [
                        KTUtil.getCssVariableValue("--bs-primary"),
                        KTUtil.getCssVariableValue("--bs-gray-200"),
                    ],
                    grid: {
                        borderColor:
                            KTUtil.getCssVariableValue("--bs-gray-200"),
                        strokeDashArray: 4,
                        yaxis: { lines: { show: !0 } },
                    },
                },
                u = new ApexCharts(i, o),
                l = !1,
                _ = document.querySelector(t);
            !0 === s && (u.render(), (l = !0)),
                _.addEventListener("shown.bs.tab", function (t) {
                    0 == l && (u.render(), (l = !0));
                });
        }
    };
    return {
        init: function () {
            t(
                "#kt_security_summary_tab_hours_agents",
                "#kt_security_summary_chart_hours_agents",
                [50, 70, 90, 117, 80, 65, 80, 90, 115, 95, 70, 84],
                [50, 70, 90, 117, 80, 65, 70, 90, 115, 95, 70, 84],
                !0
            ),
                t(
                    "#kt_security_summary_tab_hours_clients",
                    "#kt_security_summary_chart_hours_clients",
                    [50, 70, 90, 117, 80, 65, 80, 90, 115, 95, 70, 84],
                    [50, 70, 90, 117, 80, 65, 80, 90, 115, 95, 70, 84],
                    !1
                ),
                t(
                    "#kt_security_summary_tab_day",
                    "#kt_security_summary_chart_day_agents",
                    [50, 70, 80, 100, 90, 65, 80, 90, 115, 95, 70, 84],
                    [50, 70, 90, 117, 60, 65, 80, 90, 100, 95, 70, 84],
                    !1
                ),
                t(
                    "#kt_security_summary_tab_day_clients",
                    "#kt_security_summary_chart_day_clients",
                    [50, 70, 100, 90, 80, 65, 80, 90, 115, 95, 70, 84],
                    [50, 70, 90, 115, 80, 65, 80, 90, 115, 95, 70, 84],
                    !1
                ),
                t(
                    "#kt_security_summary_tab_week",
                    "#kt_security_summary_chart_week_agents",
                    [50, 70, 75, 117, 80, 65, 80, 90, 115, 95, 50, 84],
                    [50, 60, 90, 117, 80, 65, 80, 90, 115, 95, 70, 84],
                    !1
                ),
                t(
                    "#kt_security_summary_tab_week_clients",
                    "#kt_security_summary_chart_week_clients",
                    [50, 70, 90, 117, 80, 65, 80, 90, 100, 80, 70, 84],
                    [50, 70, 90, 117, 80, 65, 80, 90, 100, 95, 70, 84],
                    !1
                );
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAccountSecuritySummary.init();
});
