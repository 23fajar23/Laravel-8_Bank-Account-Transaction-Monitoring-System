"use strict";
var KTModalCreateProject = (function () {
    var e, t, o;
    return {
        init: function () {
            (e = document.querySelector("#kt_modal_create_project_stepper")),
                (o = document.querySelector("#kt_modal_create_project_form")),
                (t = new KTStepper(e));
        },
        getStepperObj: function () {
            return t;
        },
        getStepper: function () {
            return e;
        },
        getForm: function () {
            return o;
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    document.querySelector("#kt_modal_create_project") &&
        (KTModalCreateProject.init(),
        KTModalCreateProjectType.init(),
        KTModalCreateProjectBudget.init(),
        KTModalCreateProjectSettings.init(),
        KTModalCreateProjectTeam.init(),
        KTModalCreateProjectTargets.init(),
        KTModalCreateProjectFiles.init(),
        KTModalCreateProjectComplete.init());
}),
    "undefined" != typeof module &&
        void 0 !== module.exports &&
        (window.KTModalCreateProject = module.exports = KTModalCreateProject);
