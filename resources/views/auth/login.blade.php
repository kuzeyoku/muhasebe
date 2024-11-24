<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="dark">
<head>
    <meta charset="utf-8"/>
    <title>Yönetim Paneli | Giriş Yap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="{{asset("images/favicon.ico") }}">
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("css/icons.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("css/app.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("css/sweetalert2.min.css") }}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-xxl">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5 mx-auto">
                        <div class="card">
                            <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                <div class="text-center p-3">
                                    <div class="logo logo-admin">
                                        <img src="{{ asset("images/logo-sm.png") }}" height="100" alt="logo"
                                             class="auth-logo">
                                    </div>
                                    <h4 class="mt-2 mb-1 fw-semibold text-white fs-18">Yönetim Paneli</h4>
                                    <p class="text-muted fw-medium mb-0">Lütfen Giriş Yapın</p>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                {{html()->form()->class("my-4")->route("auth.login")->open()}}
                                <div class="form-group mb-2">
                                    {{html()->label("E-Posta Adresi")->for("email")->class("form-label")}}
                                    {{html()->email("email")->class("form-control")->placeholder("E-Posta Adresi")->required()}}
                                </div>
                                <div class="form-group">
                                    {{html()->label("Şifre")->for("password")->class("form-label")}}
                                    {{html()->password("password")->class("form-control")->placeholder("Şifre")->required()}}
                                </div>
                                {{--<div class="form-group row mt-3">
                                    <div class="col-sm-6">
                                        <div class="form-check form-switch form-switch-success">
                                            {{html()->checkbox("remember", false)->class("form-check-input")->id("customSwitchSuccess")}}
                                            {{html()->label("Beni Hatırla")->for("customSwitchSuccess")->class("form-check-label")}}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <a href="{{route("auth.forgot-password")}}" class="text-muted font-13"><i
                                                class="dripicons-lock"></i> Şifremi Unuttum?</a>
                                    </div>
                                </div>--}}
                                <div class="form-group mb-0 row">
                                    <div class="col-12">
                                        <div class="d-grid mt-3">
                                            {{html()->button('Giriş Yap<i class="fas fa-sign-in-alt ms-1"></i>')->class("btn btn-primary")->type("submit")}}
                                        </div>
                                    </div>
                                </div>
                                {{html()->form()->close()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset("js/sweetalert2.min.js")}}"></script>
@include("layouts.alert");
</body>
</html>
