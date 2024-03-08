"use strict";
var KTFormsQuillAutosave = {
    init: function () {
        var e, n, o;
        (e = Quill.import("delta")),
            (n = new Quill("#kt_docs_quill_autosave", {
                modules: { toolbar: !0 },
                placeholder: "Type your text here...",
                theme: "snow",
            })),
            (o = new e()),
            n.on("text-change", function (e) {
                o = o.compose(e);
            }),
            setInterval(function () {
                o.length() > 0 &&
                    (console.log("Saving changes", o), (o = new e()));
            }, 5e3),
            (window.onbeforeunload = function () {
                if (o.length() > 0)
                    return "There are unsaved changes. Are you sure you want to leave?";
            });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsQuillAutosave.init();
});
