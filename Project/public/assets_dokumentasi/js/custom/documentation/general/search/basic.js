"use strict";
var KTGeneralSearchBasicDemos = (function () {
    var e,
        t,
        n,
        s,
        a,
        c = function (e) {
            setTimeout(function () {
                var a = KTUtil.getRandomInt(1, 6);
                t.classList.add("d-none"),
                    3 === a
                        ? (n.classList.add("d-none"),
                          s.classList.remove("d-none"))
                        : (n.classList.remove("d-none"),
                          s.classList.add("d-none")),
                    e.complete();
            }, 1500);
        },
        o = function (e) {
            t.classList.remove("d-none"),
                n.classList.add("d-none"),
                s.classList.add("d-none");
        };
    return {
        init: function () {
            (e = document.querySelector("#kt_docs_search_handler_basic")) &&
                (e.querySelector('[data-kt-search-element="wrapper"]'),
                (t = e.querySelector('[data-kt-search-element="suggestions"]')),
                (n = e.querySelector('[data-kt-search-element="results"]')),
                (s = e.querySelector('[data-kt-search-element="empty"]')),
                (a = new KTSearch(e)).on("kt.search.process", c),
                a.on("kt.search.clear", o),
                KTUtil.on(
                    e,
                    '[data-kt-search-element="customer"]',
                    "click",
                    function () {}
                ));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTGeneralSearchBasicDemos.init();
});
