@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <title>Mutasi | Lupa Password</title>
    <link rel="shortcut icon" href="assets_landing/media/logos/profit.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="asset_login/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="asset_login/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/all_blade.css" rel="stylesheet" type="text/css" />

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-dark">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(asset_login/assets/media/illustrations/sigma-1/14-dark.png)">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="{{ route('login') }}" class="mb-12">
                    <img alt="Logo" src="asset_login/assets/media/logos/logo.png " class="h-60px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="col-sm-8 w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" method="POST" action="javascript:void()">
                        <!--begin::Heading-->
                        <div class="text-center mb-10">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-10">~ Lupa Password ~</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">
                                Masukkan kode verifikasi yang telah kami kirimkan ke nomor whatsapp +{{$output['start']}}XXXXXX{{$output['end']}}
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--begin::Heading-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Kode OTP : </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="input-group">
                                <input id="kode_otp" name="kode_otp" type="text" class="form-control " placeholder="Kode OTP" value="" aria-describedby="basic-addon1" required autofocus />
                            </div>
                            <label style="color: red;" id="alert_otp" class="form-label fs-8 fw-bolder"></label>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Kata Sandi Baru : </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="input-group">
                                <span class="blur_color input-group-text flaticon2-lock" id="basic-addon1"></span>
                                <input id="password" minlength="8" name="password" type="text" class="form-control" placeholder="Password Baru" value="" aria-describedby="basic-addon1" required autocomplete="off" autofocus />
                            </div>
                            <label style="color: red;" id="alert_password" class="form-label fs-8 fw-bolder"></label>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-5">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">Kata Sandi Konfirmasi : </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div class="input-group">
                                <span class="blur_color input-group-text flaticon2-check-mark" id="basic-addon1"></span>
                                <input id="password_confirm" minlength="8" name="password_confirm" type="text" class="form-control" placeholder="Password Konfirmasi" value="" aria-describedby="basic-addon1" required autocomplete="off" autofocus />
                            </div>
                            <label style="color: red;" id="alert_password_confirm" class="form-label fs-8 fw-bolder"></label>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <input type="hidden" id="id_user" value="{{$output['email']}}">
                        <div class="text-center">
                            <!--begin::Submit button-->
                            <button onclick="send_verify();" type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Lanjutkan</span>
                            </button>

                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
            <!--begin::Footer-->
            <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="javascript:void()" class="text-muted text-hover-primary px-2">About</a>
                    <a href="javascript:void()" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="javascript:void()" class="text-muted text-hover-primary px-2">Contact Us</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <div id="go_login"></div>
    <a id="to_login" style="display: none;" href="{{ route('login') }}" class="link-primary fw-bolder">Buat Akun</a>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "asset_login/assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="asset_login/assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>

    <script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="asset_login/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script src="js/forgot_password.js" type="text/javascript"></script>

</body>
<!--end::Body-->

</html>
@endsection
