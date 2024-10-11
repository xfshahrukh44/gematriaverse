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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @font-face {
            font-family: Pixeboy;
            src: url('{{ url('fonts/manteka.ttf') }}');
        }

        body {
            /* font-family: "Work Sans", sans-serif; */
            font-family: Pixeboy;
        }

        p {
            font-size: 20px;
        }
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inner-1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inner-2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    {{--    @include('layouts.front.css') --}}
    @yield('css')

    <title>Gematriavere | @yield('title')</title>

</head>

<body>

    <div class="top-header-parent">
        <div class="container">
            <div class="top-header">
                <div class="guest">
                    @if(\Illuminate\Support\Facades\Auth::check())
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
                            <img src="{{ asset('images/logo-2.png') }}" class="img-fluid logo-header" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle top-menu" href="#" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Home
                                    </a>
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
                                        <a class="dropdown-item" href="{{ route('nostalgia-calculators') }}">
                                            <i class="fas fa-calculator mr-2" style="font-size: 14px;"></i>
                                            Nostalgia Calculators
                                        </a>
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
                                            <i class="fas fa-2" style="font-size: 8px;"></i>
                                            <i class="fas fa-3" style="font-size: 8px;"></i>
                                            <i class="fas fa-1 mr-2" style="font-size: 8px;"></i>
                                            Number Properties
                                        </a>
{{--                                        <a class="dropdown-item" href="{{ route('calendar') }}">--}}
{{--                                            <i class="fas fa-calendar mr-2" style="font-size: 14px;"></i>--}}
{{--                                            Personal Calendar--}}
{{--                                        </a>--}}
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
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('calendar') }}">Calendar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Holidays</a>
                                </li>
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
                        <img src="{{ asset('images/logo-2.png') }}" alt="" class="img-fluid icon">
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
                            <li class="twiter"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}"><img src="{{ asset('images/twiter.svg') }}"
                                        alt="" class="img-fluid"></a>
                            </li>
                            <li class="youtube"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1964) }}"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li class="discord"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1973) }}"><i class="fab fa-discord"></i></a>
                            </li>
                            <li class="square"><a href="{{ App\Http\Traits\HelperTrait::returnFlag(1973) }}"><i class="fas fa-pen-square"></i></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('js/custom.js') }}"></script>

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


    @yield('js')

    @if(session()->has('success'))
        <script>
            toastr.success('{{session()->get('success')}}');
        </script>
    @endif

    @if(session()->has('error'))
        <script>
            toastr.error('{{session()->get('error')}}');
        </script>
    @endif

</body>

</html>
