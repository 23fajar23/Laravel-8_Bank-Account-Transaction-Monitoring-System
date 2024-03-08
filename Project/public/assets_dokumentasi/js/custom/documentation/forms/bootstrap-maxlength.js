"use strict";
var KTFormsMaxlengthDemos = {
    init: function () {
        $("#kt_docs_maxlength_basic").maxlength({
            warningClass: "badge badge-primary",
            limitReachedClass: "badge badge-success",
        }),
            $("#kt_docs_maxlength_threshold").maxlength({
                threshold: 20,
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success",
            }),
            $("#kt_docs_maxlength_always_show").maxlength({
                alwaysShow: !0,
                threshold: 20,
                warningClass: "badge badge-danger",
                limitReachedClass: "badge badge-info",
            }),
            $("#kt_docs_maxlength_custom_text").maxlength({
                threshold: 20,
                warningClass: "badge badge-danger",
                limitReachedClass: "badge badge-success",
                separator: " of ",
                preText: "You have ",
                postText: " chars remaining.",
                validate: !0,
            }),
            $("#kt_docs_maxlength_textarea").maxlength({
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success",
            }),
            $("#kt_docs_maxlength_position_top_left").maxlength({
                placement: "top-left",
                warningClass: "badge badge-danger",
                limitReachedClass: "badge badge-primary",
            }),
            $("#kt_docs_maxlength_position_top_right").maxlength({
                placement: "top-right",
                warningClass: "badge badge-success",
                limitReachedClass: "badge badge-danger",
            }),
            $("#kt_docs_maxlength_position_bottom_left").maxlength({
                placement: "bottom-left",
                warningClass: "badge badge-info",
                limitReachedClass: "badge badge-warning",
            }),
            $("#kt_docs_maxlength_position_bottom_right").maxlength({
                placement: "bottom-right",
                warningClass: "badge badge-primary",
                limitReachedClass: "badge badge-success",
            });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsMaxlengthDemos.init();
});
