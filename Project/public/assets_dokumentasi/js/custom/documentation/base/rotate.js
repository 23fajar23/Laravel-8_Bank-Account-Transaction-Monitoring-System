"use strict";
var KTBaseRotateDemos = {
    init: function (t) {
        var e;
        (e = document.querySelector("#kt_button_1")).addEventListener(
            "click",
            function () {
                e.classList.toggle("active");
            }
        ),
            (function (t) {
                var e = document.querySelector("#kt_button_2");
                e.addEventListener("click", function () {
                    e.classList.toggle("active");
                });
            })(),
            (function (t) {
                var e = document.querySelector("#kt_button_3");
                e.addEventListener("click", function () {
                    e.classList.toggle("active");
                });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTBaseRotateDemos.init();
});
