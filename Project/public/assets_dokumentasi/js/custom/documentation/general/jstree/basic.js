"use strict";
var KTJSTreeBasic = {
    init: function () {
        $("#kt_docs_jstree_basic").jstree({
            core: { themes: { responsive: !1 } },
            types: {
                default: { icon: "fa fa-folder" },
                file: { icon: "fa fa-file" },
            },
            plugins: ["types"],
        });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTJSTreeBasic.init();
});