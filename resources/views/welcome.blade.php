@extends('layouts.app')

@section('title', 'Home')

@section('css')
    <style>
        canvas {
            position: absolute;
            z-index: 0;
            top: 0;
            bottom: 0;
            height: 100%;
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <section class="hero-section">

        {{-- <div class="parent-video">
            <video class="lazy" poster="" src="{{ asset('images/video-bg.mp4') }}" preload="auto" autoplay muted loop
                width="100%" height="100%">
                <source src="{{ asset('images/video-bg.mp4') }}" type="video/mp4">
            </video>
        </div> --}}

        <canvas id = "c1"></canvas>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="parent-section">
                        <h1 class="heading-1" style="font-size: 52px !important;">
                            Hello World, Welcome to
                        </h1>
                        <figure>
                            <img style="max-width: 75% !important;" src="{{ asset('images/logo.png') }}" class="img-fluid"
                                alt="">
                        </figure>
                        <div class="cta-buttons">
                            <span>
                                <a href="{{ route('calculator') }}" class="btn custom-btn">Gematriaverse CALCULATOR </a>
                            </span>
                            <span>
                                <a href="{{ route('date-calculator') }}" class="btn custom-btn">DATE CALCULATOR </a>
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

                        {!! $section[0]->value !!}
                        <div class="horizontals-btns">
                            <span>
                                <a href="{{ route('memberships') }}" class="btn custom-btn">JOIN</a>
                            </span>
                            <span>
                                <a href="{{ route('faq') }}" class="btn custom-btn">FAQ</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="custom-content">

                        {!! $section[1]->value !!}


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
                        {!! $section[2]->value !!}
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
                            <img src="{{ asset('images/row-bg.png') }}" class="img-fluid" alt="">
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
