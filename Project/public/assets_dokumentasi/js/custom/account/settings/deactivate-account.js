"use strict";
var KTAccountSettingsDeactivateAccount = (function () {
    var t, n, e;
    return {
        init: function () {
            (t = document.querySelector("#kt_account_deactivate_form")),
                (e = document.querySelector(
                    "#kt_account_deactivate_account_submit"
                )),
                (n = FormValidation.formValidation(t, {
                    fields: {
                        deactivate: {
                            validators: {
                                notEmpty: {
                                    message:
                                        "Please check the box to deactivate your account",
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                e.addEventListener("click", function (t) {
                    t.preventDefault(),
                        n.validate().then(function (t) {
                            "Valid" == t
                                ? swal
                                      .fire({
                                          text: "Are you sure you would like to deactivate your account?",
                                          icon: "warning",
                                          buttonsStyling: !1,
                                          showDenyButton: !0,
                                          confirmButtonText: "Yes",
                                          denyButtonText: "No",
                                          customClass: {
                                              confirmButton:
                                                  "btn btn-light-primary",
                                              denyButton: "btn btn-danger",
                                          },
                                      })
                                      .then((t) => {
                                          t.isConfirmed
                                              ? Swal.fire({
                                                    text: "Your account has been deactivated.",
                                                    icon: "success",
                                                    confirmButtonText: "Ok",
                                                    buttonsStyling: !1,
                                                    customClass: {
                                                        confirmButton:
                                                            "btn btn-light-primary",
                                                    },
                                                })
                                              : t.isDenied &&
                                                Swal.fire({
                                                    text: "Account not deactivated.",
                                                    icon: "info",
                                                    confirmButtonText: "Ok",
                                                    buttonsStyling: !1,
                                                    customClass: {
                                                        confirmButton:
                                                            "btn btn-light-primary",
                                                    },
                                                });
                                      })
                                : swal.fire({
                                      text: "Sorry, looks like there are some errors detected, please try again.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton:
                                              "btn btn-light-primary",
                                      },
                                  });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAccountSettingsDeactivateAccount.init();
});
