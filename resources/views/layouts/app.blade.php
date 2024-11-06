<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<base href="http://localhost/gematriaverse-membership/">-->
    {{-- <base href="https://democustom-html.com/gematriaverse/"> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fav icon  -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
    <!-- font-awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fancybox  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- SweetAlert CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        @font-face {
            font-family: manteka;
            src: url('{{ url('fonts/manteka.otf') }}');
        }

        body {
            /* font-family: "Work Sans", sans-serif; */
            font-family: manteka;
            position: relative;
            z-index: 0;
        }

        .web-sittg {
            position: fixed;
            z-index: 555;
            right: 1%;
            bottom: 3%;
        }

        .web-sittg .btn {
            background: linear-gradient(45deg, #317009, #7fbe00);
            border: none;
            width: 55px;
            height: 55px;
            box-shadow: none !important;
            border-radius: 60%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .web-sittg i {
            font-size: 30px;
        }

        h5#offcanvasRightLabel {
            color: black;
            font-size: 28px;
            font-weight: 600;
        }

        .offcanvas-end {
            width: 350px;
        }

        .side-bar-menu {
            list-style: none;
        }

        .theme-info {
            width: 100%;
            padding: 5px 0;
            cursor: pointer;
        }

        .theme-info h5 {
            color: black;
            font-size: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .theme-info h5 i {
            transform: rotate(90deg);
            font-size: 25px;
        }

        .settings-mode {
            display: flex;
            gap: 30px;
            align-items: center;
            margin-top: 5px;
            padding-bottom: 10px;
        }

        .settings-mode a {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            color: black;
        }

        .menu-setting {
            padding-bottom: 0;

        }

        .check-block {
            display: block;
        }

        .check-block span {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 10px;
        }

        .check-block span p {
            color: black;
            margin: 0;
            font-size: 16px;
        }

        .none-mode {
            display: none;
        }

        .btn-close.text-reset {
            opacity: 1;
        }

        .check-block span i {
            color: black;
            font-size: 20px;
        }

        input[type="checkbox"] {
            border: 2px solid !important;
        }

        p {
            font-size: 14px;
        }

        .theme-settings .dropdown:hover {
            all: unset !important;
        }

        a.dropdown-item {
            font-size: 12px !important;
        }

        .container {
            max-width: 1200px !important;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 93px;
            height: 40px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ca2222;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 30px;
            width: 30px;
            left: 4px;
            bottom: 5px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #2ab934;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(55px);
        }

        /*------ ADDED CSS ---------*/
        .slider:after {
            content: 'OFF';
            color: white;
            display: block;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            right: 0;
            font-size: 16px;
            font-family: Verdana, sans-serif;
        }

        input:checked+.slider:after {
            content: 'ON';
            left: 40px;
        }
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inner-1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inner-2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/data-tables.css') }}">

    {{--    @include('layouts.front.css') --}}
    @yield('css')

    <title>Gematriavere | @yield('title')</title>

</head>

<body>

    <div class="web-sittg">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight"><i class="fa-solid fa-gear"></i></button>
    </div>

    <div class="top-header-parent">
        <div class="container">
            <div class="top-header">
                <div class="guest">
                    @if (\Illuminate\Support\Facades\Auth::check())
                        <span>
                            Hi, {{ Auth::user()->name }}!
                        </span>
                    @endif
                </div>
                <div class="log-in">
                    @if (!\Illuminate\Support\Facades\Auth::check())
                        <span>
                            <a href="{{ route('signin') }}"><i class="fa-solid fa-user-plus"></i></a>
                        </span>
                        <span>
                            <a href="{{ route('signin') }}">log in<i class="fa-solid fa-right-to-bracket"></i></a>
                        </span>
                    @else
                        <span>
                            <a href="{{ route('account') }}"><i class="fa-solid fa-user-plus"></i></a>
                        </span>
                        <span>
                            <a href="{{ route('account') }}">Dashboard<i class="fa-solid fa-right-to-bracket"></i></a>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/new-logo.png') }}" class="img-fluid logo-header" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle top-menu" href="{{ route('home') }}">
                                        Home
                                    </a>
                                    {{--                                    <a class="nav-link dropdown-toggle top-menu" href="{{ route('home') }}" id="navbarDropdown" --}}
                                    {{--                                       role="button" data-toggle="dropdown" aria-haspopup="true" --}}
                                    {{--                                       aria-expanded="false"> --}}
                                    {{--                                        Home --}}
                                    {{--                                    </a> --}}
                                    <div class="dropdown-menu menu-bar" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('about') }}">About</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Calculators
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('calculator') }}">
                                            <i class="fas fa-calculator mr-2" style="font-size: 14px;"></i>
                                            Calculator
                                        </a>
                                        <a class="dropdown-item" href="{{ route('date-calculator') }}">
                                            <i class="fas fa-calculator mr-2" style="font-size: 14px;"></i>
                                            Date Calculator
                                        </a>
                                        <a class="dropdown-item" href="{{ route('greek-calculator') }}">
                                            <i class="fas fa-calculator mr-2" style="font-size: 14px;"></i>
                                            Greek Calculator
                                        </a>
                                        <a class="dropdown-item" href="{{ route('hebrew-calculator') }}">
                                            <i class="fas fa-calculator mr-2" style="font-size: 14px;"></i>
                                            Hebrew Calculator
                                        </a>
                                        {{--                                        <a class="dropdown-item" href="{{ route('nostalgia-calculators') }}"> --}}
                                        {{--                                            <i class="fas fa-calculator mr-2" style="font-size: 14px;"></i> --}}
                                        {{--                                            Nostalgia Calculators --}}
                                        {{--                                        </a> --}}
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Tools
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('number-properties') }}"
                                            style="padding-left: 14px;">
                                            <i class="fas fa-2 ml-2" style="font-size: 8px; margin-right: -4px;"></i>
                                            <i class="fas fa-3" style="font-size: 8px; margin-right: -4px;"></i>
                                            <i class="fas fa-1" style="font-size: 8px; margin-right: 6px;"></i>
                                            Number Properties
                                        </a>
                                        {{--                                        <a class="dropdown-item" href="{{ route('calendar') }}"> --}}
                                        {{--                                            <i class="fas fa-calendar mr-2" style="font-size: 14px;"></i> --}}
                                        {{--                                            Personal Calendar --}}
                                        {{--                                        </a> --}}
                                        <a class="dropdown-item" href="{{ route('bible-search') }}">
                                            <i class="fas fa-book-bible mr-2" style="font-size: 14px;"></i>
                                            Bible Search
                                        </a>
                                        <a class="dropdown-item" href="{{ route('custom-ciphers') }}">
                                            <i class="fas fa-wand-magic-sparkles mr-1" style="font-size: 14px;"></i>
                                            Custom Ciphers
                                        </a>
                                        <a class="dropdown-item" href="{{ route('anagram.generator') }}">
                                            <i class="fas fa-arrow-down-a-z mr-1" style="font-size: 14px;"></i>
                                            Anagram Generator
                                        </a>
                                        <a class="dropdown-item" href="{{ route('acronym.finder') }}">
                                            <i class="fas fa-arrow-down-a-z mr-1" style="font-size: 14px;"></i>
                                            Acronym Finder
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('calendar') }}">Calendar</a>
                                </li>
                                {{--                                <li class="nav-item"> --}}
                                {{--                                    <a class="nav-link" href="{{ route('holidays') }}">Holidays</a> --}}
                                {{--                                </li> --}}
                                <!-- <li class="nav-item">
                                        <a class="nav-link" href="blog.php">Blog</a>
                                    </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('memberships') }}">Memberships</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                                </li>
                                {{--                                <li class="nav-item"> --}}
                                {{--                                    <a class="nav-link" href="{{ route('shop') }}">Shop</a> --}}
                                {{--                                </li> --}}
                            </ul>
                            <div class="social">
                                <span class="youtube">
                                    <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1964) }}"><i
                                            class="fa-brands fa-youtube"></i></a>
                                </span>
                                <span class="twitter-card">
                                    <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}"><img
                                            src="{{ asset('images/twitter-logo-2.svg') }}" class="img-fluid"
                                            alt=""></a>
                                </span>
                                <span class="shopping-cart">
                                    <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1973) }}"><i
                                            class="fa-solid fa-cart-shopping"></i></a>
                                </span>
                                <span class="icons-img">
                                    <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1974) }}"><img
                                            src="{{ asset('images/rumble.png') }}" class="img-fluid"
                                            alt=""></a>
                                </span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4">
                    <div class="footer-text">
                        <img src="{{ asset('images/new-logo.png') }}" alt="" class="img-fluid icon">
                        <p class="para-1">Simply put: Gematriaverse is the practice of coding numbers into
                            words. It is an ancient practice that traces back to at least the Hebrew and Greek
                            languages, in
                            which they used letters from the alphabet as numbers. Check our What is gematria?
                            and FAQ
                            pages.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-text">
                        <ul class="anker">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('memberships') }}">Memberships</a></li>
                            <li><a href="{{ route('calculator') }}">Calculator</a></li>
                            <li><a href="{{ route('date-calculator') }}">Date Calculator</a></li>
                            <li><a href="{{ route('calendar') }}">Calendar</a></li>
                            <!-- <li><a href="blog.php">Blog</a></li> -->
                            <li><a href="{{ route('faq') }}">FAQ</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <!-- <li><a href="javascript:;">Policies</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-text">
                        <h3 class="heading-3">Media</h3>
                        <ul class="icon-img">
                            <li class="twiter"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}"><img
                                        src="{{ asset('images/twiter.svg') }}" alt="" class="img-fluid"></a>
                            </li>
                            <li class="youtube"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1964) }}"><i
                                        class="fab fa-youtube"></i></a>
                            </li>
                            <li class="discord"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1973) }}"><i
                                        class="fab fa-discord"></i></a>
                            </li>
                            <li class="square"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1973) }}"><i
                                        class="fas fa-pen-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="from-group">

                            <div class="row">
                                <div class="label-from">
                                    <label for="">Username or Email Address</label>
                                </div>
                                <div class="col-12 p-0">
                                    <input type="text" class="form-control" placeholder="First">

                                </div>
                                <div class="label-from">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-12 p-0">
                                    <input type="text" class="form-control" placeholder="Last">

                                </div>
                            </div>
                        </div>

                        <div class="from-group">
                            <button type="submit" class="btn custom-btn">Log in</button>
                            <a href="#">Lost your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Settings</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="main-settings">
                <ul class="side-bar-menu">
                    <li class="menu-setting">
                        <div class="theme-settings">
                            <div class="theme-info">
                                <h5>Mode <i class="fa-solid fa-caret-right"></i></h5>
                            </div>
                            <div class="none-mode">
                                <div class="settings-mode">
                                    <a href="javascript:;" id="dark-mode" class="click-mode"><i
                                            class="fa-solid fa-moon"></i>Dark</a>
                                    <a href="javascript:;" id="light-mode" class="click-mode"><i
                                            class="fa-regular fa-moon"></i>Light</a>
                                    {{-- <a href="javascript:;" id="system-mode" class="click-mode"><i
                                            class="fa-solid fa-circle-half-stroke"></i>System</a> --}}
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-setting">
                        <div class="theme-settings">
                            <div class="theme-info">
                                <h5>Small Text Options <i class="fa-solid fa-caret-right"></i></h5>
                            </div>
                            <div class="none-mode">
                                <div class="settings-mode check-block">
                                    <span>
                                        <input type="checkbox" name="small">
                                        <p>Navbar</p>
                                    </span>
                                    <span>
                                        <input type="checkbox" name="small">
                                        <p>Body</p>
                                    </span>
                                    <span>
                                        <input type="checkbox" name="small">
                                        <p>Footer</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-setting">
                        <div class="theme-settings">
                            <div class="theme-info">
                                <h5>Tools and actions <i class="fa-solid fa-caret-right"></i></h5>
                            </div>
                            <div class="none-mode">
                                <div class="settings-mode check-block">
                                    <span>
                                        <input type="checkbox" name="small">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <p>Tools and actions</p>
                                    </span>
                                    <span>
                                        <input type="checkbox" name="small">
                                        <i class="fa-solid fa-language"></i>
                                        <p>Translate</p>
                                    </span>
                                    <span>
                                        <input type="checkbox" name="small">
                                        <i class="fa-solid fa-qrcode"></i>
                                        <p>Create QR Code</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="menu-setting">
                        <div class="theme-settings">
                            <div class="theme-info">
                                <h5>Switch <i class="fa-solid fa-caret-right"></i></h5>
                            </div>
                            <div class="none-mode">
                                <div class="settings-mode check-block">
                                    <label class="switch">
                                        <input type="checkbox" id="togBtn">
                                        <div class="slider round"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- particles js  -->
    <script src="https://npmcdn.com/particlesjs@1.0.2/dist/particles.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/datatables.bootstrap4.js') }}"></script>


    <script>
        // JavaScript for toggling dark/light mode
        document.addEventListener("DOMContentLoaded", function() {
            const darkModeButton = document.getElementById("dark-mode");
            const lightModeButton = document.getElementById("light-mode");
            const body = document.body;

            // Inline styles for dark and light modes
            const darkModeStyles = {
                backgroundColor: "#121212",
                color: "#ffffff"
            };

            const lightModeStyles = {
                backgroundColor: "#ffffff",
                color: "#000000"
            };

            function applyStyles(styles) {
                for (const property in styles) {
                    body.style[property] = styles[property];
                }
            }

            // Event listeners for each button to apply the respective theme
            darkModeButton.addEventListener("click", () => {
                applyStyles(darkModeStyles);
                localStorage.setItem("theme", "dark");
            });

            lightModeButton.addEventListener("click", () => {
                applyStyles(lightModeStyles);
                localStorage.setItem("theme", "light");
            });

            // Load the saved theme from local storage, if it exists
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme === "dark") {
                applyStyles(darkModeStyles);
            } else {
                applyStyles(lightModeStyles);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.theme-info').click(function() {
                $('.none-mode').not($(this).next('.none-mode')).slideUp('fast');
                $(this).next('.none-mode').slideToggle('fast');
            });
        });
    </script>
    <!-- counter -->
    {{--        <script> --}}
    {{--            document.addEventListener("DOMContentLoaded", () => { --}}
    {{--                function counter(id, start, end, duration) { --}}
    {{--                    let obj = document.getElementById(id), --}}
    {{--                        current = start, --}}
    {{--                        range = end - start, --}}
    {{--                        increment = end > start ? 1 : -1, --}}
    {{--                        step = Math.abs(Math.floor(duration / range)), --}}
    {{--                        timer = setInterval(() => { --}}
    {{--                            current += increment; --}}
    {{--                            obj.textContent = current; --}}
    {{--                            if (current == end) { --}}
    {{--                                clearInterval(timer); --}}
    {{--                            } --}}
    {{--                        }, step); --}}
    {{--                } --}}

    {{--                counter("count1", 0, 1420137, 10); --}}
    {{--                counter("count2", 0, 2400, 10); --}}
    {{--                counter("count3", 0, 5500, 10); --}}
    {{--                counter("count4", 0, 20, 1000); --}}
    {{--            }); --}}

    {{--        </script> --}}

    <script>
        const canvas = document.getElementById('c1');
        const c = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        //Falling Text
        class Text {
            constructor(x, y, v, len, i) {
                // Movement Data
                this.x = x;
                this.y = y;
                this.vel = v;
                // Visual Features
                this.len = len;
                this.i = i;
                let r = Math.random();
                // Randomly select uppercase or lowercase English letters
                if (r < 0.5) this.val = String.fromCharCode(0x41 + Math.floor(Math.random() * 26)); // Uppercase A-Z
                else this.val = String.fromCharCode(0x61 + Math.floor(Math.random() * 26)); // Lowercase a-z
                if (this.i == 0 && Math.random() < 0.4) this.tip = true;
            }
            update() {
                // Changing Character
                if (Math.random() < 0.03) {
                    let r = Math.random();
                    // Randomly select uppercase or lowercase English letters
                    if (r < 0.5) this.val = String.fromCharCode(0x41 + Math.floor(Math.random() * 26)); // Uppercase A-Z
                    else this.val = String.fromCharCode(0x61 + Math.floor(Math.random() * 26)); // Lowercase a-z
                }
                // Moving Character
                this.y += this.vel;
                if (this.y > canvas.height + inc) this.y = -inc;
            }
            show() {
                // Shading Based on Index
                if (this.tip) c.fillStyle = 'rgb(200, 255, 200)';
                else c.fillStyle = 'rgb(0, ' + (300 - this.i / this.len * 255) + ', 0)';
                c.fillText(this.val, this.x, this.y);
            }
        }

        //Streaks Of Text
        class Streak {
            constructor(x, y, len) {
                //Array Holding Text Objects Belonging to This Streak
                this.t = [];
                let v = Math.random() * 4 + 4;
                for (let i = 0; i < len; i++) {
                    this.t[i] = new Text(x, y - i * inc, v, len, i);
                }
            }
            run() {
                //Updating And Showing Text
                for (let i = 0; i < this.t.length; i++) {
                    this.t[i].update();
                    this.t[i].show();
                }
            }
        }
        let inc = 26;
        //Adding Streaks
        let s = [];
        for (let i = 0; i < canvas.width / inc; i++) {
            s[i] = new Streak(inc / 2 + i * inc, Math.random() * canvas.height - canvas.height, Math.random() * 15 + 20);
        }
        c.textAlign = 'center';
        c.font = inc + 'px Arial';
        //Animation Loop
        function draw() {
            requestAnimationFrame(draw);
            c.fillStyle = 'rgba(0, 0, 0, 0.5)';
            c.fillRect(0, 0, canvas.width, canvas.height);
            //Running Streaks
            for (let i = 0; i < s.length; i++) s[i].run();
        }
        draw();
    </script>
    @yield('js')

    @if (session()->has('success'))
        <script>
            toastr.success('{{ session()->get('success') }}');
        </script>
    @endif

    @if (session()->has('error'))
        <script>
            toastr.error('{{ session()->get('error') }}');
        </script>
    @endif

</body>

</html>
