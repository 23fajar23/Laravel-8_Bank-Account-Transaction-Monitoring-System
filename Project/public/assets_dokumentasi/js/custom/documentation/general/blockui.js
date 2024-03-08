"use strict";
var KTGeneralBlockUI = {
    init: function () {
        var e, t, n;
        (e = document.querySelector("#kt_block_ui_1_button")),
            (t = document.querySelector("#kt_block_ui_1_target")),
            (n = new KTBlockUI(t)),
            e.addEventListener("click", function () {
                n.isBlocked()
                    ? (n.release(), (e.innerText = "Block"))
                    : (n.block(), (e.innerText = "Release"));
            }),
            (function () {
                var e = document.querySelector("#kt_block_ui_2_button"),
                    t = document.querySelector("#kt_block_ui_2_target"),
                    n = new KTBlockUI(t, {
                        message:
                            '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
                    });
                e.addEventListener("click", function () {
                    n.isBlocked()
                        ? (n.release(), (e.innerText = "Block"))
                        : (n.block(), (e.innerText = "Release"));
                });
            })(),
            (function () {
                var e = document.querySelector("#kt_block_ui_3_button"),
                    t = document.querySelector("#kt_block_ui_3_target"),
                    n = new KTBlockUI(t, {
                        overlayClass: "bg-danger bg-opacity-25",
                    });
                e.addEventListener("click", function () {
                    n.isBlocked()
                        ? (n.release(), (e.innerText = "Block"))
                        : (n.block(), (e.innerText = "Release"));
                });
            })(),
            (function () {
                var e = document.querySelector("#kt_block_ui_4_button"),
                    t = document.querySelector("#kt_block_ui_4_target"),
                    n = new KTBlockUI(t);
                e.addEventListener("click", function (e) {
                    e.preventDefault(),
                        n.block(),
                        setTimeout(function () {
                            n.release();
                        }, 3e3);
                });
            })(),
            (function () {
                var e = document.querySelector("#kt_block_ui_5_button"),
                    t = new KTBlockUI(document.body);
                e.addEventListener("click", function (e) {
                    e.preventDefault(),
                        t.block(),
                        setTimeout(function () {}, 3e3);
                });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTGeneralBlockUI.init();
});
