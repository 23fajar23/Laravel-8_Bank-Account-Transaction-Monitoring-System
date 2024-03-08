"use strict";
var KTFormsDropzoneJSDemos = {
    init: function (e) {
        new Dropzone("#kt_dropzonejs_example_1", {
            url: "https://keenthemes.com/scripts/void.php",
            paramName: "file",
            maxFiles: 10,
            maxFilesize: 10,
            addRemoveLinks: !0,
            accept: function (e, o) {
                "wow.jpg" == e.name ? o("Naha, you don't.") : o();
            },
        }),
            (function () {
                const e = "#kt_dropzonejs_example_2",
                    o = document.querySelector(e);
                var r = o.querySelector(".dropzone-item");
                r.id = "";
                var t = r.parentNode.innerHTML;
                r.parentNode.removeChild(r);
                var l = new Dropzone(e, {
                    url: "https://preview.keenthemes.com/api/dropzone/void.php",
                    parallelUploads: 20,
                    previewTemplate: t,
                    maxFilesize: 1,
                    autoQueue: !1,
                    previewsContainer: e + " .dropzone-items",
                    clickable: e + " .dropzone-select",
                });
                l.on("addedfile", function (r) {
                    (r.previewElement.querySelector(
                        e + " .dropzone-start"
                    ).onclick = function () {
                        l.enqueueFile(r);
                    }),
                        o.querySelectorAll(".dropzone-item").forEach((e) => {
                            e.style.display = "";
                        }),
                        (o.querySelector(".dropzone-upload").style.display =
                            "inline-block"),
                        (o.querySelector(".dropzone-remove-all").style.display =
                            "inline-block");
                }),
                    l.on("totaluploadprogress", function (e) {
                        o.querySelectorAll(".progress-bar").forEach((o) => {
                            o.style.width = e + "%";
                        });
                    }),
                    l.on("sending", function (r) {
                        o.querySelectorAll(".progress-bar").forEach((e) => {
                            e.style.opacity = "1";
                        }),
                            r.previewElement
                                .querySelector(e + " .dropzone-start")
                                .setAttribute("disabled", "disabled");
                    }),
                    l.on("complete", function (e) {
                        const r = o.querySelectorAll(".dz-complete");
                        setTimeout(function () {
                            r.forEach((e) => {
                                (e.querySelector(
                                    ".progress-bar"
                                ).style.opacity = "0"),
                                    (e.querySelector(
                                        ".progress"
                                    ).style.opacity = "0"),
                                    (e.querySelector(
                                        ".dropzone-start"
                                    ).style.opacity = "0");
                            });
                        }, 300);
                    }),
                    o
                        .querySelector(".dropzone-upload")
                        .addEventListener("click", function () {
                            l.enqueueFiles(
                                l.getFilesWithStatus(Dropzone.ADDED)
                            );
                        }),
                    o
                        .querySelector(".dropzone-remove-all")
                        .addEventListener("click", function () {
                            (o.querySelector(".dropzone-upload").style.display =
                                "none"),
                                (o.querySelector(
                                    ".dropzone-remove-all"
                                ).style.display = "none"),
                                l.removeAllFiles(!0);
                        }),
                    l.on("queuecomplete", function (e) {
                        o.querySelectorAll(".dropzone-upload").forEach((e) => {
                            e.style.display = "none";
                        });
                    }),
                    l.on("removedfile", function (e) {
                        l.files.length < 1 &&
                            ((o.querySelector(
                                ".dropzone-upload"
                            ).style.display = "none"),
                            (o.querySelector(
                                ".dropzone-remove-all"
                            ).style.display = "none"));
                    });
            })(),
            (function () {
                const e = "#kt_dropzonejs_example_3",
                    o = document.querySelector(e);
                var r = o.querySelector(".dropzone-item");
                r.id = "";
                var t = r.parentNode.innerHTML;
                r.parentNode.removeChild(r);
                var l = new Dropzone(e, {
                    url: "https://preview.keenthemes.com/api/dropzone/void.php",
                    parallelUploads: 20,
                    maxFilesize: 1,
                    previewTemplate: t,
                    previewsContainer: e + " .dropzone-items",
                    clickable: e + " .dropzone-select",
                });
                l.on("addedfile", function (e) {
                    o.querySelectorAll(".dropzone-item").forEach((e) => {
                        e.style.display = "";
                    });
                }),
                    l.on("totaluploadprogress", function (e) {
                        o.querySelectorAll(".progress-bar").forEach((o) => {
                            o.style.width = e + "%";
                        });
                    }),
                    l.on("sending", function (e) {
                        o.querySelectorAll(".progress-bar").forEach((e) => {
                            e.style.opacity = "1";
                        });
                    }),
                    l.on("complete", function (e) {
                        const r = o.querySelectorAll(".dz-complete");
                        setTimeout(function () {
                            r.forEach((e) => {
                                (e.querySelector(
                                    ".progress-bar"
                                ).style.opacity = "0"),
                                    (e.querySelector(
                                        ".progress"
                                    ).style.opacity = "0");
                            });
                        }, 300);
                    });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsDropzoneJSDemos.init();
});
