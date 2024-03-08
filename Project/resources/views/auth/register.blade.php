@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <title>Mutasi | Register</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="assets_landing/media/logos/profit.ico" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="asset_login/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="asset_login/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <link href="assets/css/all_blade.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="FormatPhoneNumber/css/intlTelInput.css">
    <link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-dark">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(asset_login/assets/media/illustrations/sigma-1/14-dark.png)">
            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!--begin::Logo-->
                <a href="{{ route('register') }}" class="mb-12">
                    <img alt="Logo" src="asset_login/assets/media/logos/logo.png" class="h-60px" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!--begin::Form-->
                    <form class="form w-100" method="POST" action="{{ route('register') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-10 text-center">
                            <!--begin::Title-->
                            <h1 class="text-dark mb-3">Akun Baru</h1>
                            <!--end::Title-->
                            <!--begin::Link-->
                            <div class="text-gray-400 fw-bold fs-4">Sudah Memiliki Akun ?
                                <a href="{{ route('login') }}" class="link-primary fw-bolder">Masuk</a>
                            </div>
                            <!--end::Link-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Action-->
                        <!-- <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
                            <img alt="Logo" src="asset_login/assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Sign in with Google</button> -->
                        <!--end::Action-->
                        <!--begin::Separator-->
                        <div class="d-flex align-items-center mb-10">
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            <span class="fw-bold text-gray-400 fs-7 mx-2">Atau</span>
                            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        </div>
                        <!--end::Separator-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Nama Pengguna : </label>
                            <div class="input-group">
                                <span class="blur_color input-group-text flaticon2-user"></span>
                                <input id="name" placeholder="5 - 12 Karakter" minlength="5" maxlength="12" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Nama Lengkap : </label>

                            <div class="input-group">
                                <span class="blur_color input-group-text flaticon2-layers"></span>
                                <input id="fullname" placeholder="8 - 30 Karakter" minlength="8" maxlength="30" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="off" autofocus>

                                @error('fullname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="col-xl-6 col-sm-6">
                                <label class="form-label fw-bolder text-dark fs-6">Jenis Kelamin : </label>
                                <div class="input-group">

                                    <span class="blur_color input-group-text flaticon-users-1" id="jenis_kelamin"></span>
                                    <select id="jenis_kelamin" class="form-control  @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required autocomplete="off" autofocus>
                                        <option value="">---</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-6 col-sm-6">
                                <label class="form-label fw-bolder text-dark fs-6">Kota : </label>
                                <div class="input-group">
                                    <span class="blur_color input-group-text flaticon2-map"></span>
                                    <input id="kota" placeholder="Kota" type="text" class=" form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required autocomplete="off" autofocus>

                                    @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Alamat : </label>
                                <div class="input-group">

                                    <span class="blur_color input-group-text flaticon2-pin"></span>
                                    <input id="alamat" placeholder="Alamat" type="text" class=" form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="off" autofocus>

                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">No Whatsapp :</label><br />
                                <input id="no_hp" type="number" placeholder="Akun Whatsapp" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="off" autofocus>
                                <!--begin::Hint-->
                                <div class="text-muted">Contoh : 628370262**</div>
                                <!--end::Hint-->
                                @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row fv-row mb-7">
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Perusahaan : </label>
                                <div class="input-group">
                                    <span class="blur_color input-group-text flaticon2-rocket"></span>
                                    <input id="perusahaan" placeholder="Perusahaan (Opsional)" type="text" class=" form-control @error('perusahaan') is-invalid @enderror" name="perusahaan" value="{{ old('perusahaan') }}" autocomplete="off" autofocus>

                                    @error('perusahaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <br />
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Jabatan : </label>
                                <div class="input-group">
                                    <span class="blur_color input-group-text flaticon2-group"></span>
                                    <input id="jabatan" type="text" placeholder="Jabatan (Opsional)" class="  form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{ old('jabatan') }}" autocomplete="off" autofocus>

                                    @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6">Email : </label>
                            <div class="input-group">
                                <span class="blur_color input-group-text flaticon-multimedia"></span>
                                <input id="email" placeholder="Email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="form-label fw-bolder text-dark fs-6">Kata Sandi : </label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <div class="input-group">
                                        <span class="blur_color input-group-text flaticon2-lock"></span>

                                        <input class="form-control form-control-lg " minlength="8" type="password" placeholder="" name="password" autocomplete="off" />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                </div>
                                <!--end::Input wrapper-->
                                <!--begin::Meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Meter-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Hint-->
                            <div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka & simbol.</div>
                            <!--end::Hint-->
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-5">
                            <label class="form-label fw-bolder text-dark fs-6">Kata Sandi Konfirmasi : </label>
                            <div class="input-group">
                                <span class="blur_color input-group-text flaticon2-check-mark"></span>
                                <input id="password-confirm" minlength="8" placeholder="Kata Sandi Konfirmasi" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <br />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                                Daftar
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
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "asset_login/assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="asset_login/assets/plugins/global/plugins.bundle.js"></script>
    <script src="asset_login/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="asset_login/assets/js/custom/authentication/sign-up/general.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    <script src="FormatPhoneNumber/js/intlTelInput.js"></script>
    <script>
        var input = document.querySelector("#no_hp");
        window.intlTelInput(input, {
            initialCountry: "id",
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
</body>
<!--end::Body-->

</html>
@endsection
