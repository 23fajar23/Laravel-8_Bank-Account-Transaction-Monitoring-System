"use strict";
var KTJSTreeDragDrop = {
    init: function () {
        $("#kt_docs_jstree_dragdrop").jstree({
            core: {
                themes: { responsive: !1 },
                check_callback: !0,
                data: [
                    {
                        text: "Parent Node",
                        children: [
                            {
                                text: "Initially selected",
                                state: { selected: !0 },
                            },
                            {
                                text: "Custom Icon",
                                icon: "flaticon2-warning text-danger",
                            },
                            {
                                text: "Initially open",
                                icon: "fa fa-folder text-success",
                                state: { opened: !0 },
                                children: [
                                    {
                                        text: "Another node",
                                        icon: "fa fa-file text-waring",
                                    },
                                ],
                            },
                            {
                                text: "Another Custom Icon",
                                icon: "flaticon2-bell-5 text-waring",
                            },
                            {
                                text: "Disabled Node",
                                icon: "fa fa-check text-success",
                                state: { disabled: !0 },
                            },
                            {
                                text: "Sub Nodes",
                                icon: "fa fa-folder text-danger",
                                children: [
                                    {
                                        text: "Item 1",
                                        icon: "fa fa-file text-waring",
                                    },
                                    {
                                        text: "Item 2",
                                        icon: "fa fa-file text-success",
                                    },
                                    {
                                        text: "Item 3",
                                        icon: "fa fa-file text-default",
                                    },
                                    {
                                        text: "Item 4",
                                        icon: "fa fa-file text-danger",
                                    },
                                    {
                                        text: "Item 5",
                                        icon: "fa fa-file text-info",
                                    },
                                ],
                            },
                        ],
                    },
                    "Another Node",
                ],
            },
            types: {
                default: { icon: "fa fa-folder text-success" },
                file: { icon: "fa fa-file  text-success" },
            },
            state: { key: "demo2" },
            plugins: ["dnd", "state", "types"],
        });
    },
};
KTUtil.onDOMContentLoaded(function () {
    KTJSTreeDragDrop.init();
});
