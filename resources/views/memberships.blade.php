@extends('layouts.app')

@section('title', 'Memberships')

@section('css')
    <style>
        .payment-accordion img {
            display: inline-block;
            margin-left: 10px;
            background-color: white;
        }
        form#order-place .form-control {
            border-width: 1px;
            border-color: rgb(150, 163, 218);
            border-style: solid;
            border-radius: 8px;
            background-color: transparent;
            height: 54px;
            padding-left: 15px;
            color: black;
        }
        form#order-place textarea.form-control {
            height: auto !important;
        }

        .checkoutPage {
            padding: 50px 0px;
        }
        .checkoutPage .section-heading h3{
            margin-bottom: 30px;
        }
        .YouOrder {
            background-color: #c91d22;
            color: white;
            padding: 25px;
            padding-bottom: 2px;
            min-height: 300px;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        .amount-wrapper {
            padding-top: 12px;
            border-top: 2px solid white;
            text-align: left;
            margin-top: 90px;
        }

        .amount-wrapper h2 {
            font-size: 20px;
            display: flex;
            justify-content: space-between;
        }
        .amount-wrapper h3 {
            display: FLEX;
            justify-content: SPACE-BETWEEN;
            font-size: 22px;
            border-top: 2px solid white;
            padding-top: 10px;
            margin-top: 14px;
        }
        .checkoutPage span.invalid-feedback strong {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            display: block;
            width: 100%;
            font-size: 15px;
            padding: 5px 15px;
            border-radius: 6px;
        }
        .payment-accordion .btn-link {
            display: block;
            width: 100%;
            text-align: left;
            padding: 10px 19px;
            color: black;
        }

        .payment-accordion .card-header {
            padding: 0px !important;
        }
        .payment-accordion .card-header:first-child{
            border-radius: 0px;
        }
        .payment-accordion .card{
            border-radius: 0px;
        }
        .form-group.hide {
            display: none;
        }
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
            border-width: 1px;
            border-color: rgb(150, 163, 218);
            border-style: solid;
            margin-bottom: 10px;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
        div#card-errors {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            display: block;
            width: 100%;

            font-size: 15px;
            padding: 5px 15px;
            border-radius: 6px;
            display: none;
            margin-bottom: 10px;
        }

        .btn_current_plan {
            border: 4px solid white;
            background: black;
            color: white;
            pointer-events: none;
        }

    </style>
@endsection

@section('content')
    <section class="faq-pg membership">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-faq">
                        <h1>Memberships</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faqs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq_accod">
                        <h1>Gematriaverse<span class="d-block"> DEGREES</span></h1>
                        <p>What ability level are you?</p>
                        <p>Gematriaverse  offers a few different membership plans that give you deeper access into the
                            tools that are not available to the general public. Bolster up your <a
                                    href="javascript:void(0)">calculator</a> to assist
                            your explorations into Gematria, Dates, and even an all new Bible Search.</p>
                        <p>Looking for the OLD <a href="javascript:void(0)">CALCULATOR</a>? Casual, Enthusiast, and Mystic Memberships
                            will unlock the
                            Nostalgia Calculators! Although the database match is only available in our main
                            calculator, the Nostalgia Calculator gives you the same look, feel, and layout as years
                            past!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="membership_price">
        <div class="container">
            <div class="row">
{{--                <div class="col-lg-4">--}}
{{--                    <div class="main-membership">--}}
{{--                        <div class="top-price">--}}
{{--                            <h5>CASUAL</h5>--}}
{{--                            <h2>$6.04</h2>--}}
{{--                            <p>Per Month</p>--}}
{{--                        </div>--}}
{{--                        <div class="experiencial">--}}
{{--                            <h4>Ad Free Experience!</h4>--}}
{{--                            <ul>--}}
{{--                                <h5>Gematriaverse Calculator</h5>--}}
{{--                                <li><strong>Match</strong> to Database (<strong>25/Day</strong>)</li>--}}
{{--                                <li><strong>Match</strong> to Session/History (<strong>Unlimited</strong>)</li>--}}
{{--                                <li><strong><a style="color: #0dd300;" href="javascript:void(0)">All Ciphers</a> Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Session + History (500 Entries Each)</li>--}}
{{--                                <li>4 Custom Tables (500 Entries Each)</li>--}}
{{--                                <li>No Watermark on Screenshots</li>--}}
{{--                                    <li>Screenshots of Breakdown</li>--}}
{{--                                <li>Save Your User Preferences</li>--}}
{{--                                <li>Set Your Default Ciphers + Presets</li>--}}
{{--                                <li>Nostalgia Calculators <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}

{{--                                <h5>Create-A-Cipher </h5>--}}
{{--                                <li>Create up to 20 Custom Ciphers</li>--}}
{{--                                <li>Import 3 Created Ciphers into Calculator</li>--}}

{{--                                <h5>Date Calculator</h5>--}}
{{--                                <li> Save 25 Recent Dates Unlocked</li>--}}
{{--                                <li> Access Unlocked </li>--}}

{{--                                <h5>Bible Search Tool</h5>--}}
{{--                                <li> Access Unlocked </li>--}}

{{--                                <h5>Personal Calendar</h5>--}}
{{--                                <li> Access Unlocked </li>--}}
{{--                            </ul>--}}
{{--                            @if(auth()->check())--}}
{{--                                <a href="javascript:void(0)" data-plan="casual" class="btn white-btn {!! Auth::user()->plan == "casual" ? 'btn_current_plan' : 'btn-subscription' !!}">--}}
{{--                                    {{ Auth::user()->plan == "casual" ? "Current plan" : "Change plan"  }}--}}
{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a href="javascript:void(0)" data-plan="casual" class="btn white-btn btn-subscription">--}}
{{--                                    Get Started--}}
{{--                                </a>--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="main-membership">--}}
{{--                        <div class="top-price">--}}
{{--                            <h5>ENTHUSIAST--}}
{{--                            </h5>--}}
{{--                            <h2>$10.61</h2>--}}
{{--                            <p>Ad Free Experience!--}}

{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="experiencial">--}}
{{--                            <h4>Ad Free Experience!</h4>--}}
{{--                            <ul>--}}
{{--                                <h5>Gematriaverse Calculator </h5>--}}
{{--                                <li><strong>Match</strong> to Database (<strong>75/Day</strong>)</li>--}}
{{--                                <li><strong>Match</strong> to All Tables&nbsp;(<strong>Unlimited</strong>)</li>--}}
{{--                                <li><strong><a style="color: #0dd300;" href="javascript:void(0)">All Ciphers</a> Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Session + History (500 Entries Each)</li>--}}
{{--                                <li>4 Custom Tables (500 Entries Each)</li>--}}
{{--                                <li>No Watermark on Screenshots</li>--}}
{{--                                    <li>Screenshots of Breakdown</li>--}}
{{--                                <li>Save Your User Preferences</li>--}}
{{--                                <li>Set Your Default Ciphers + Presets</li>--}}
{{--                                <li>Nostalgia Calculators <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}

{{--                                <h5>Create-A-Cipher </h5>--}}
{{--                                <li> Create up to 20 Custom Ciphers</li>--}}
{{--                                <li>Import up to 7 Created Ciphers into Calculator</li>--}}

{{--                                <h5>Date Calculator</h5>--}}
{{--                                <li>Save 100 Recent Dates <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Astrology Add-On <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Planetary Table <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Lunar Phase <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Saros Series <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Brown Lunation Count <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}

{{--                                <h5>Bible Search Tool </h5>--}}
{{--                                <li> Access Unlocked </li>--}}

{{--                                <h5>Personal Calendar</h5>--}}
{{--                                <li> Access Unlocked </li>--}}
{{--                            </ul>--}}

{{--                            @if(auth()->check())--}}
{{--                                <a href="javascript:void(0)" data-plan="enthusiast" class="btn white-btn {!! Auth::user()->plan == "enthusiast" ? 'btn_current_plan' : 'btn-subscription' !!}">--}}
{{--                                    {{ Auth::user()->plan == "enthusiast" ? "Current plan" : "Change plan"  }}--}}
{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a href="javascript:void(0)" data-plan="enthusiast" class="btn white-btn btn-subscription">--}}
{{--                                    Get Started--}}
{{--                                </a>--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="main-membership">--}}
{{--                        <div class="top-price">--}}
{{--                            <h5>MYSTIC--}}
{{--                            </h5>--}}
{{--                            <h2>$16.99</h2>--}}
{{--                            <p>Ad Free Experience!--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="experiencial">--}}
{{--                            <h4>Ad Free Experience!</h4>--}}

{{--                            <ul>--}}
{{--                                <h5>Gematriaverse Calculator</h5>--}}
{{--                                <li><strong>Match</strong> to Database (<strong>Unlimited</strong>)</li>--}}
{{--                                <li><strong>Match</strong> to All Tables&nbsp;(<strong>Unlimited</strong>)</li>--}}
{{--                                <li><strong><a style="color: #0dd300;" href="javascript:void(0)">All Ciphers</a> Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Session + History (500 Entries Each)</li>--}}
{{--                                <li>History (500 Entries)</li>--}}
{{--                                <li>4 Custom Tables (500 Entries Each)</li>--}}
{{--                                <li>Screenshots of History + Breakdown</li>--}}
{{--                                <li>Screenshots of Breakdown</li>--}}
{{--                                <li>Save Your User Preferences</li>--}}
{{--                                <li>Set Your Default Ciphers + Presets</li>--}}
{{--                                <li>Nostalgia Calculators <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}

{{--                                <h5>Create-A-Cipher </h5>--}}
{{--                                <li>Create up to 20 Custom Ciphers</li>--}}
{{--                                <li> Import up to 12 Created Ciphers into Calculator</li>--}}

{{--                                <h5>Date Calculator</h5>--}}
{{--                                <li>Save 100 Recent Dates <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Astrology Add-On <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Planetary Table <strong>Unlocked</strong></li>--}}
{{--                                <li>Lunar Phase <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Saros Series <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Brown Lunation Count <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li>Date Matrix <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}

{{--                                <h5>Bible Search Tool</h5>--}}
{{--                                <li> Access Unlocked </li>--}}

{{--                                <h5>Personal Calendar</h5>--}}
{{--                                <li>Access Unlocked</li>--}}
{{--                            </ul>--}}

{{--                            @if(auth()->check())--}}
{{--                                <a href="javascript:void(0)" data-plan="mystic" class="btn white-btn {!! Auth::user()->plan == "mystic" ? 'btn_current_plan' : 'btn-subscription' !!}">--}}
{{--                                    {{ Auth::user()->plan == "mystic" ? "Current plan" : "Change plan"  }}--}}
{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a href="javascript:void(0)" data-plan="mystic" class="btn white-btn btn-subscription">--}}
{{--                                    Get Started--}}
{{--                                </a>--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="main-membership">--}}
{{--                        <div class="top-price">--}}
{{--                            <h5>JOIN FOR--}}
{{--                            </h5>--}}
{{--                            <h2>FREE</h2>--}}
{{--                            <p>Ads Will Be Present--}}

{{--                            </p>--}}
{{--                        </div>--}}

{{--                        <div class="experiencial">--}}
{{--                            <h4>Gematriaverse Calculator</h4>--}}
{{--                            <ul>--}}
{{--                                <li><strong>Match</strong> to Database (10/Day)</li>--}}
{{--                                <li><strong>Match</strong> to Session/History&nbsp;(<strong>Unlimited</strong>)</li>--}}
{{--                                <li>Session + History (50 Entries Each)</li>--}}
{{--                                <li><strong><a style="color: #0dd300;" href="javascript:void(0)">31 of 38 Ciphers</a> Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
{{--                                <li> Basic Access</li>--}}

{{--                                <h5>Date Calculator</h5>--}}
{{--                                <li> Basic Access</li>--}}

{{--                                <h5>Bible Search</h5>--}}
{{--                                <li>Locked</li>--}}

{{--                                <h5>Personal Calendar</h5>--}}
{{--                                <li>Locked </li>--}}

{{--                            </ul>--}}


{{--                            @if(auth()->check())--}}
{{--                                <a href="javascript:void(0)" data-plan="free" class="btn white-btn {!! Auth::user()->plan == "free" ? 'btn_current_plan' : 'btn-subscription' !!}">--}}
{{--                                    {{ Auth::user()->plan == "free" ? "Current plan" : "Change plan"  }}--}}
{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a href="javascript:void(0)" data-plan="free" class="btn white-btn btn-subscription">--}}
{{--                                    Get Started--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="col-lg-4">
                    <div class="main-membership">
                        <div class="top-price">
                            <h5>Gold</h5>
                            <h2>$17</h2>
                            <p>Per Month</p>
                        </div>
                        <div class="experiencial">
                            <h4>Ad Free Experience!</h4>
                            <ul>
                                <h5>Gematriaverse Calculator</h5>
                                <li>All ciphers unlocked</li>
                                <li>Match from database (7 times/day)</li>
                                {{--                                <li><strong>Match</strong> to Session/History (<strong>Unlimited</strong>)</li>--}}
                                {{--                                <li><strong><a style="color: #0dd300;" href="javascript:void(0)">All Ciphers</a> Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}
                                {{--                                <li>Session + History (500 Entries Each)</li>--}}
                                {{--                                <li>4 Custom Tables (500 Entries Each)</li>--}}
                                {{--                                <li>No Watermark on Screenshots</li>--}}
{{--                                <li>Screenshots of Breakdown</li>--}}
                                {{--                                <li>Save Your User Preferences</li>--}}
                                {{--                                <li>Set Your Default Ciphers + Presets</li>--}}
{{--                                <li>Nostalgia Calculators <strong>Unlocked <i class="fas fa-lock-open"></i></strong></li>--}}


                                <h5>Date Calculator</h5>
                                <li>Astrology report</li>

                                <h5>Holidays</h5>

                                <h5>Anagrams</h5>
                                <li>All ciphers unlocked</li>
                                <li>Save to database unlocked</li>

                                <h5>Acronyms</h5>

                                <h5>Number properties</h5>

                                <h5>Bible search</h5>

                                <h5>Custom ciphers</h5>
                            </ul>
                            @if(auth()->check())
                                <a href="javascript:void(0)" data-plan="gold" class="btn white-btn {!! Auth::user()->plan == "gold" ? 'btn_current_plan' : 'btn-subscription' !!}">
                                    {{ Auth::user()->plan == "gold" ? "Current plan" : "Change plan"  }}
                                </a>
                            @else
                                <a href="javascript:void(0)" data-plan="gold" class="btn white-btn btn-subscription">
                                    Get Started
                                </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="main-membership">
                        <div class="top-price">
                            <h5>Silver</h5>
                            <h2>$7</h2>
                            <p>Per Month</p>
                        </div>
                        <div class="experiencial">
                            <h4>Ad Free Experience!</h4>
                            <ul>
                                <h5>Gematriaverse Calculator</h5>
                                <li>All ciphers unlocked</li>
                                <li>Match from database (7 times/day)</li>


                                <h5>Date Calculator</h5>
                                <li>Astrology report</li>

                                <h5>Holidays</h5>

                                <h5>Anagrams</h5>
                                <li>All ciphers unlocked</li>
                                <li>Save to database unlocked</li>

                                <h5>Acronyms</h5>

                                <h5>Number properties</h5>

                                <h5>Bible search</h5>

                                <h5>Custom ciphers</h5>
                            </ul>
                            @if(auth()->check())
                                <a href="javascript:void(0)" data-plan="silver" class="btn white-btn {!! Auth::user()->plan == "silver" ? 'btn_current_plan' : 'btn-subscription' !!}">
                                    {{ Auth::user()->plan == "silver" ? "Current plan" : "Change plan"  }}
                                </a>
                            @else
                                <a href="javascript:void(0)" data-plan="silver" class="btn white-btn btn-subscription">
                                    Get Started
                                </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="main-membership">
                        <div class="top-price">
                            <h5>Bronze</h5>
                            <h2>FREE</h2>
                            <p>Ads Will Be Present</p>
                        </div>

                        <div class="experiencial">
                            <h4>Ads will be present</h4>
                            <ul>
                                <h5>Gematriaverse Calculator</h5>
                                <li>Match from database (7 times/day)</li>


                                <h5>Date Calculator</h5>
                                <li>Astrology report</li>

                                <h5>Holidays</h5>

                                <h5>Anagrams</h5>

                                <h5>Acronyms</h5>

                                <h5>Number properties</h5>
                            </ul>


                            @if(auth()->check())
                                <a href="javascript:void(0)" data-plan="bronze" class="btn white-btn {!! Auth::user()->plan == "bronze" ? 'btn_current_plan' : 'btn-subscription' !!}">
                                    {{ Auth::user()->plan == "bronze" ? "Current plan" : "Change plan"  }}
                                </a>
                            @else
                                <a href="javascript:void(0)" data-plan="bronze" class="btn white-btn btn-subscription">
                                    Get Started
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
    $(document).on('click', '.btn-subscription', function () {
        const plan = $(this).data('plan');

        // Redirect to the signin route with the plan as a query parameter
        @if(auth()->check())
            const url = "{{ route('upgrade.subscription') }}" + '?plan=' + plan;
        @else
            const url = "{{ route('signin') }}" + '?plan=' + plan;
        @endif

        window.location.href = url;
    });
    </script>
@endsection


