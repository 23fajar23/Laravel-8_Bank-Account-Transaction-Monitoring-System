"use strict";
var KTGeneralStepperDemos = {
    init: function () {
        var e, t;
        (e = document.querySelector("#kt_stepper_example_basic")),
            (t = new KTStepper(e)).on("kt.stepper.next", function (e) {
                e.goNext();
            }),
            t.on("kt.stepper.previous", function (e) {
                e.goPrevious();
            }),
            (function () {
                var e = document.querySelector("#kt_stepper_example_vertical"),
                    t = new KTStepper(e);
                t.on("kt.stepper.next", function (e) {
                    e.goNext();
                }),
                    t.on("kt.stepper.previous", function (e) {
                        e.goPrevious();
                    });
            })(),
            (function () {
                var e = document.querySelector("#kt_stepper_example_clickable"),
                    t = new KTStepper(e);
                t.on("kt.stepper.click", function (e) {
                    e.goTo(e.getClickedStepIndex());
                }),
                    t.on("kt.stepper.next", function (e) {
                        e.goNext();
                    }),
                    t.on("kt.stepper.previous", function (e) {
                        e.goPrevious();
                    });
            })();
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTGeneralStepperDemos.init();
});
