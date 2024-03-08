"use strict";
var KTDraggableRestricted = {
    init: function () {
        !(function () {
            var e = document.querySelectorAll(".draggable-zone");
            const a = document.querySelector(
                '[data-kt-draggable-level="restricted"]'
            );
            if (0 === e.length) return !1;
            var r = new Droppable.default(e, {
                draggable: ".draggable",
                dropzone: ".draggable-zone",
                handle: ".draggable .draggable-handle",
                mirror: { appendTo: "body", constrainDimensions: !0 },
            });
            let t;
            r.on("drag:start", (e) => {
                t = e.originalSource.getAttribute("data-kt-draggable-level");
            }),
                r.on("drag:over", (e) => {
                    e.overContainer.closest(
                        '[data-kt-draggable-level="restricted"]'
                    ) && "admin" !== t
                        ? a.classList.add("bg-light-danger")
                        : a.classList.remove("bg-light-danger");
                }),
                r.on("drag:stop", (r) => {
                    e.forEach((e) => {
                        e.classList.remove("draggable-dropzone--occupied");
                    }),
                        a.classList.remove("bg-light-danger");
                }),
                r.on("droppable:dropped", (e) => {
                    e.dropzone.closest(
                        '[data-kt-draggable-level="restricted"]'
                    ) &&
                        "admin" !== t &&
                        (a.classList.add("bg-light-danger"), e.cancel());
                });
        })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTDraggableRestricted.init();
});
