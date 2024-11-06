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
    <script>
        const userId = {{ auth()->check() ? auth()->id() : 'null' }};

        let isRainbow;
        if (userId) {
            // Load from server if user is logged in
            isRainbow = {{ $matrix_rainbow == 'on' ? 'true' : 'false' }};
        } else {
            // Load from localStorage if user is logged out
            isRainbow = localStorage.getItem('matrix_rainbow') === 'on';
        }
        document.getElementById('rainbowSwitch').checked = isRainbow;

        document.getElementById('rainbowSwitch').addEventListener('change', function() {
            isRainbow = this.checked;

            if (userId) {

                fetch("{{ route('matrix_rainbow') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ value: isRainbow ? 'on' : 'off' })
                });
            }else {
                localStorage.setItem('matrix_rainbow', isRainbow ? 'on' : 'off');
            }
        });

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
                if (isRainbow) {
                    // Rainbow shading based on index or position
                    let hue = (this.i * 10 + this.x / canvas.width * 360) % 360;
                    c.fillStyle = `hsl(${hue}, 100%, ${this.tip ? 75 : 50}%)`;
                } else {
                    // Default green color shading
                    c.fillStyle = this.tip ? 'rgb(200, 255, 200)' : `rgb(0, ${300 - this.i / this.len * 255}, 0)`;
                }
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
@endsection
