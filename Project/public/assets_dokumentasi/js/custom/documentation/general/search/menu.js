"use strict";
var KTGeneralSearchMenuDemos = (function () {
    var e,
        t,
        n,
        a,
        s,
        c,
        r,
        o,
        d,
        l,
        i,
        m,
        u,
        h = function (e) {
            setTimeout(function () {
                var a = KTUtil.getRandomInt(1, 3);
                t.classList.add("d-none"),
                    3 === a
                        ? (n.classList.add("d-none"),
                          s.classList.remove("d-none"))
                        : (n.classList.remove("d-none"),
                          s.classList.add("d-none")),
                    e.complete();
            }, 1500);
        },
        L = function (e) {
            t.classList.remove("d-none"),
                n.classList.add("d-none"),
                s.classList.add("d-none");
        };
    return {
        init: function () {
            (e = document.querySelector("#kt_docs_search_handler_menu")) &&
                ((a = e.querySelector('[data-kt-search-element="wrapper"]')),
                e.querySelector('[data-kt-search-element="form"]'),
                (t = e.querySelector('[data-kt-search-element="main"]')),
                (n = e.querySelector('[data-kt-search-element="results"]')),
                (s = e.querySelector('[data-kt-search-element="empty"]')),
                (c = e.querySelector('[data-kt-search-element="preferences"]')),
                (r = e.querySelector(
                    '[data-kt-search-element="preferences-show"]'
                )),
                (o = e.querySelector(
                    '[data-kt-search-element="preferences-dismiss"]'
                )),
                (d = e.querySelector(
                    '[data-kt-search-element="advanced-options-form"]'
                )),
                (l = e.querySelector(
                    '[data-kt-search-element="advanced-options-form-show"]'
                )),
                (i = e.querySelector(
                    '[data-kt-search-element="advanced-options-form-cancel"]'
                )),
                (m = e.querySelector(
                    '[data-kt-search-element="advanced-options-form-search"]'
                )),
                (u = new KTSearch(e)).on("kt.search.process", h),
                u.on("kt.search.clear", L),
                r.addEventListener("click", function () {
                    a.classList.add("d-none"), c.classList.remove("d-none");
                }),
                o.addEventListener("click", function () {
                    a.classList.remove("d-none"), c.classList.add("d-none");
                }),
                l.addEventListener("click", function () {
                    a.classList.add("d-none"), d.classList.remove("d-none");
                }),
                i.addEventListener("click", function () {
                    a.classList.remove("d-none"), d.classList.add("d-none");
                }),
                m.addEventListener("click", function () {}));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTGeneralSearchMenuDemos.init();
});
