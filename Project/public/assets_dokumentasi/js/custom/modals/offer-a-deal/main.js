"use strict";
var KTModalOfferADeal = (function () {
    var e, t, o;
    return {
        init: function () {
            (e = document.querySelector("#kt_modal_offer_a_deal_stepper")),
                (o = document.querySelector("#kt_modal_offer_a_deal_form")),
                (t = new KTStepper(e));
        },
        getStepper: function () {
            return e;
        },
        getStepperObj: function () {
            return t;
        },
        getForm: function () {
            return o;
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    document.querySelector("#kt_modal_offer_a_deal") &&
        (KTModalOfferADeal.init(),
        KTModalOfferADealType.init(),
        KTModalOfferADealDetails.init(),
        KTModalOfferADealFinance.init(),
        KTModalOfferADealComplete.init());
}),
    "undefined" != typeof module &&
        void 0 !== module.exports &&
        (window.KTModalOfferADeal = module.exports = KTModalOfferADeal);
