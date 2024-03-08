"use strict";
var KTFormsCKEditorDocument = {
    init: function () {
        DecoupledEditor.create(
            document.querySelector("#kt_docs_ckeditor_document")
        )
            .then((o) => {
                document
                    .querySelector("#kt_docs_ckeditor_document_toolbar")
                    .appendChild(o.ui.view.toolbar.element);
            })
            .catch((o) => {
                console.error(o);
            });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTFormsCKEditorDocument.init();
});
