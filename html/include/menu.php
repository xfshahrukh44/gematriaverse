</head>

<body>

    <div class="top-header-parent">
        <div class="container">
            <div class="top-header">
                <div class="guest">
                    <span>
                        Hi, Guest!
                    </span>
                </div>
                <div class="log-in">
                    <span>
                        <a href="javascript:;"><i class="fa-solid fa-user-plus"></i></a>
                    </span>
                    <span>
                        <a href="javascript:;" data-toggle="modal" data-target="#exampleModal" >log in<i class="fa-solid fa-right-to-bracket"></i></a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="images/logo-2.png" class="img-fluid logo-header" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle top-menu" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Home
                                    </a>
                                    <div class="dropdown-menu menu-bar" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="about.php">About</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Calculators
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('calculator')}}">Calculator</a>
                                        <a class="dropdown-item" href="calculator-language-greek.php">Greek Calculator</a>
                                        <a class="dropdown-item" href="calculator-language-hebrew.php">Hebrew Calculator</a>
                                        <a class="dropdown-item" href="nostalgia-calculator.php">Nostalgia Calculator</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tools
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="date-calculator.php">Date Calculator</a>
                                        <a class="dropdown-item" href="number-properties.php">Number Properties</a>
                                        <a class="dropdown-item" href="calendar.php">Personal Calendar</a>
                                        <a class="dropdown-item" href="bible-search.php">Bible Search</a>
                                        <a class="dropdown-item" href="custom-ciphers.php">Custom Ciphers</a>
                                    </div>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="blog.php">Blog</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="memberships.php">Memberships</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('faq')}}">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="shop.php">Shop</a>
                                </li>
                            </ul>
                            <div class="social">
                                <span class="youtube">
                                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                </span>
                                <span class="twitter-card">
                                    <a href="#"><img src="images/twitter-logo-2.svg" class="img-fluid" alt=""></a>
                                </span>
                                <span class="shopping-cart">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </span>
                                <span class="icons-img">
                                    <a href="#"><img src="images/rumble.png" class="img-fluid" alt=""></a>
                                </span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>