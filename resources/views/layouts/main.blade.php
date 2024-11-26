<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="dark" data-bs-theme="dark">
<head>
    <meta charset="utf-8"/>
    <title>Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="{{asset("images/favicon.ico")}}">
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("css/app.min.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("css/sweetalert2.min.css")}}" rel="stylesheet">
    @stack("style")
</head>
<body>
<div class="topbar d-print-none">
    <div class="container-fluid">
        <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">
            <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                <li>
                    <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                        <i class="iconoir-menu"></i>
                    </button>
                </li>
            </ul>
            <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                <li class="topbar-item">
                    <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                        <i class="iconoir-half-moon dark-mode"></i>
                        <i class="iconoir-sun-light light-mode"></i>
                    </a>
                </li>
                <li class="dropdown topbar-item">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                       role="button"
                       aria-haspopup="false" aria-expanded="false" data-bs-offset="0,19">
                        <img src="{{asset("images/users/avatar-1.jpg")}}" alt="" class="thumb-md rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end py-0">
                        <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                            <div class="flex-shrink-0">
                                <img src="{{asset("images/users/avatar-1.jpg")}}" alt=""
                                     class="thumb-md rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                <h6 class="my-0 fw-medium text-dark fs-13">{{auth()->user()->name}}</h6>
                            </div>
                        </div>
                        <div class="dropdown-divider mt-0"></div>
                        <a class="dropdown-item text-danger" href="{{ route("logout") }}">
                            <i class="las la-power-off fs-18 me-1 align-text-bottom"></i> Çıkış
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="startbar d-print-none">
    <div class="brand">
        <a href="{{route("dashboard")}}" class="logo">
            <span>
                <img src="{{asset("images/logo-sm.png")}}" alt="logo-small" class="logo-sm">
            </span>
            <span class="">
                <img src="{{asset("images/logo-light.png")}}" alt="logo-large" class="logo-lg logo-light">
                <img src="{{asset("images/logo-dark.png")}}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <div class="startbar-menu">
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label mt-2">
                        <span>Main</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("dashboard")}}">
                            <i class="iconoir-report-columns menu-icon"></i>
                            <span>Ana Sayfa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("income.index")}}">
                            <i class="iconoir-hand-cash menu-icon"></i>
                            <span>Gelir Kayıtları</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("expense.index")}}">
                            <i class="iconoir-hand-cash menu-icon"></i>
                            <span>Gider Kayıtları</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("company.index")}}">
                            <i class="iconoir-building menu-icon"></i>
                            <span>Firmalar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("licence.index")}}">
                            <i class="iconoir-page menu-icon"></i>
                            <span>Ruhsatlar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("contract.index")}}">
                            <i class="las la-newspaper menu-icon"></i>
                            <span>Sözleşmeler</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("invoice.index")}}">
                            <i class="iconoir-cash menu-icon"></i>
                            <span>Faturalar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("user.index")}}">
                            <i class="iconoir-user menu-icon"></i>
                            <span>Kullanıcılar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="startbar-overlay d-print-none"></div>
<div class="page-wrapper">
    <div class="page-content pt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">@yield("title")</h4>
                        </div>
                        <div>
                            @yield("button")
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    @yield("content")
                </div>
            </div>
        </div>
        <div class="modal fade" id="commonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true"></div>
        <footer class="footer text-center text-sm-start d-print-none">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0 rounded-bottom-0">
                            <div class="card-body">
                                <p class="text-muted mb-0">
                                    ©
                                    {{date("Y")}}
                                    {{env("APP_NAME")}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset("libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("js/jquery-3.7.1.min.js")}}"></script>
<script src="{{asset("js/sweetalert2.min.js")}}"></script>
<script src="{{asset("libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("js/scripts.js")}}"></script>
@stack("script")
@include("layouts.alert")
</body>
</html>
