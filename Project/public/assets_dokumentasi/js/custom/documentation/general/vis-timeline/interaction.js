"use strict";
var KTVisTimelineInteraction = {
    init: function () {
        !(function () {
            var t = new vis.DataSet({
                type: { start: "ISODate", end: "ISODate" },
            });
            t.add([
                { id: 1, content: "item 1<br>start", start: "2021-01-23" },
                { id: 2, content: "item 2", start: "2021-01-18" },
                { id: 3, content: "item 3", start: "2021-01-21" },
                {
                    id: 4,
                    content: "item 4",
                    start: "2021-01-19",
                    end: "2021-01-24",
                },
                {
                    id: 5,
                    content: "item 5",
                    start: "2021-01-28",
                    type: "point",
                },
                { id: 6, content: "item 6", start: "2021-01-26" },
            ]);
            var e = document.getElementById("kt_docs_vistimeline_interaction"),
                n = new vis.Timeline(e, t, {
                    start: "2021-01-10",
                    end: "2021-02-10",
                    editable: !0,
                    showCurrentTime: !0,
                });
            (document.getElementById("window1").onclick = function () {
                n.setWindow("2021-01-01", "2021-04-01");
            }),
                (document.getElementById("fit").onclick = function () {
                    n.fit();
                }),
                (document.getElementById("select").onclick = function () {
                    n.setSelection([5, 6], { focus: !0 });
                }),
                (document.getElementById("focus1").onclick = function () {
                    n.focus(2);
                }),
                (document.getElementById("moveTo").onclick = function () {
                    n.moveTo("2021-02-01");
                });
        })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTVisTimelineInteraction.init();
});
