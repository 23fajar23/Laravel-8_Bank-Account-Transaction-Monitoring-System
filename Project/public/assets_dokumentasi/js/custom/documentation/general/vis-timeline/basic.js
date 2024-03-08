"use strict";
var KTVisTimelineBasic = {
    init: function () {
        var t, i;
        (t = document.getElementById("kt_docs_vistimeline_basic")),
            (i = new vis.DataSet([
                { id: 1, content: "item 1", start: "2021-04-20" },
                { id: 2, content: "item 2", start: "2021-04-14" },
                { id: 3, content: "item 3", start: "2021-04-18" },
                {
                    id: 4,
                    content: "item 4",
                    start: "2021-04-16",
                    end: "2021-04-19",
                },
                { id: 5, content: "item 5", start: "2021-04-25" },
                {
                    id: 6,
                    content: "item 6",
                    start: "2021-04-27",
                    type: "point",
                },
            ])),
            new vis.Timeline(t, i, {});
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTVisTimelineBasic.init();
});
