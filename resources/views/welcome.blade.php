@extends('layouts.app')

@section('title', 'Home')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <section class="hero-section">

        <div class="parent-video">
            <video class="lazy" poster=""
                   src="{{asset('images/video-bg.mp4')}}" preload="auto" autoplay muted loop width="100%"
                   height="100%">
                <source src="{{asset('images/video-bg.mp4')}}" type="video/mp4">
            </video>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="parent-section">
                        <h1 class="heading-1">
                            Hello World, Welcome to
                        </h1>
                        <figure>
                            <img src="{{asset('images/logo.png')}}" class="img-fluid" alt="">
                        </figure>
                        <div class="cta-buttons">
                        <span>
                            <a href="#" class="btn custom-btn">Gematriaverse CALCULATOR </a>
                        </span>
                            <span>
                            <a href="#" class="btn custom-btn">Gematriaverse CALCULATOR </a>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="uncovering">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wpb_wrapper">
                    <span class="banner-text">UNCOVERING <span style="color:black;">THE</span> COSMIC MYSTERIES OF
                        LANGUAGE AND TIME</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="simple-easy-section py">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="custom-content">
                        <h2 class="heading-2 white">
                            Simple & Easy.
                            <span class="d-block">
                            Powerful & Profound.
                        </span>
                        </h2>
                        <p class="white">
                            Gematriaverse is continuously bettering all of the tools on the website. From
                            deeper
                            functionality to more mobile-responsive designs, Gematriaverse is bringing you
                            the
                            powerful mysticism of <a href="#">Gematriaverse</a>, Date Numerology, and
                            Number Properties.
                        </p>


                        <div class="horizontals-btns">
                        <span>
                            <a href="#" class="btn custom-btn">JOIN</a>
                        </span>
                            <span>
                            <a href="#" class="btn custom-btn">FAQ</a>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="custom-content">

                        <ul class="list-content">
                            <li>
                                <div class="icons">
                                <span>
                                    <i class="fa-solid fa-calculator"></i>
                                </span>
                                </div>
                                <div class="cotent">
                                    <h3 class="heading-3">
                                        Gematriaverse Calculator
                                    </h3>
                                    <p class="para white">
                                        The Web’s Best Gematriaverse Calculator just got better!

                                        (And it’s still improving!)
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icons">
                                <span>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </span>
                                </div>
                                <div class="cotent">
                                    <h3 class="heading-3">
                                        Date Calculator
                                    </h3>
                                    <p class="para white">
                                        Here you will be able to explore different date numerology and even check the
                                        time between two separate dates.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icons">
                                <span>
                                    <i class="fa-solid fa-hashtag"></i>
                                </span>
                                </div>
                                <div class="cotent">
                                    <h3 class="heading-3">
                                        Number Properties
                                    </h3>
                                    <p class="para white">
                                        Learn the special properties and essences of numbers by finding out if they are
                                        prime numbers, triangular numbers, etc.
                                    </p>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="uncovering">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wpb_wrapper">
                        <span class="banner-text">JOIN THE COMMUNITY FOR EXCLUSIVE ACCESS & <span style="color:yellow;">AD FREE</span> EXPERIENCETHE</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testi-parents">
                        <figure>
                            <img src="{{asset('images/row-bg.png')}}" class="img-fluid" alt="">
                        </figure>
                        <div class="testi-content">
                            <p class="para white">
                                “The act of seeking out knowledge is one of the oldest known traditions to man. The act
                                of hiding it may be even older.”
                            </p>
                            <span>
                            – Gematriaverse
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="count">
                        <p><span class="big-text" id="count1">1420137</span></p>
                        <span class="d-block bottom-text">Average Monthly Page Views</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="count">
                        <p><span class="big-text" id="count2">2400</span>+</p>
                        <span class="d-block bottom-text">Blog Posts</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="count">
                        <p><span class="big-text" id="count3">5500</span></p>
                        <span class="d-block bottom-text">Users Per Day</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="count">
                        <p><span class="big-text" id="count4">20</span>K+</p>
                        <span class="d-block bottom-text">Calculations Per Day</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection


