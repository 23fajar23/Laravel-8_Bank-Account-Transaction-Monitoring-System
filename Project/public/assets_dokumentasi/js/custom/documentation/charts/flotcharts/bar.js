"use strict";
var KTFlotDemoBar = {
    init: function () {
        var t;
        (t = {
            colors: [KTUtil.getCssVariableValue("--bs-active-primary")],
            series: { bars: { show: !0 } },
            bars: {
                horizontal: !0,
                barWidth: 6,
                lineWidth: 0,
                shadowSize: 0,
                align: "left",
            },
            grid: {
                tickColor: KTUtil.getCssVariableValue("--bs-light-dark"),
                borderColor: KTUtil.getCssVariableValue("--bs-light-dark"),
                borderWidth: 1,
            },
        }),
            $.plot(
                $("#kt_docs_flot_bar"),
                [
                    [
                        [10, 10],
                        [20, 20],
                        [30, 30],
                        [40, 40],
                        [50, 50],
                        [60, 60],
                        [70, 70],
                        [80, 80],
                        [90, 90],
                        [100, 100],
                    ],
                ],
                t
            );
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFlotDemoBar.init();
});