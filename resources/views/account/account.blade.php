@extends('layouts.app')
@section('title', 'Account Details')
@section('css')
    <style>
        .myaccount-page-wrapper {
            margin-bottom: 50px;
        }

        .myaccount-tab-menu.nav a {
            display: block;
            padding: 20px;
            font-size: 16px;
            align-items: center;
            width: 100%;
            font-weight: bold;
            color: black;
        }

        .myaccount-tab-menu.nav a i {
            padding-right: 10px;
        }

        .myaccount-tab-menu.nav {
            border: 1px solid;
        }

        .myaccount-tab-menu.nav .active,
        .myaccount-tab-menu.nav a:hover {
            background-color: #7fbe00;
            color: white;
        }

        .account-details-form label.required {
            width: 100%;
            font-weight: 500;
            font-size: 18px;
        }

        .account-details-form input {
            border-width: 1px;
            border-color: black;
            border-style: solid;
            padding-left: 15px;
            color: black;
            width: 100%;
            border-radius: 3px;
            background-color: rgb(255, 255, 255);
            height: 52px;
            padding-left: 15px;
            margin-bottom: 30px;
            color: #000000;
            font-size: 15px;
        }

        .account-details-form legend {
            font-family: CottonCandies;
            font-size: 50px;
        }

        .editable {
            position: relative;
        }

        .editable-wrapper {
            position: absolute;
            right: 0px;
            top: -50px;
        }

        .editable-wrapper a {
            background-color: #17a2b8;
            border-radius: 50px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            line-height: 35px;
            color: white;
            margin-left: 10px;
            font-size: 16px;
        }

        .editable-wrapper a.edit {
            background-color: #007bff;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            background-color: red !important;
            border-color: red !important;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: red !important;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        span.page-link {
            color: white !important;
        }

        button.activee {
            background: #cb1e20 !important;
            color: #fff !important;
        }
    </style>
@endsection
@section('content')

    <?php $segment = Request::segments(); ?>


    <section class="banner py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-wrapper inner-banner-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="section-heading text-center">
                                    <h1>Account Details</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="my-cart">
        <!-- banner start -->
        <!-- banner end -->

        <!-- main content start -->

        <!-- my account wrapper start -->
        <div class="my-account-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                @include('account.sidebar')
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">

                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane active" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
{{--                                                <div class="section-heading">--}}
{{--                                                    <h2>Account Details</h2>--}}
{{--                                                </div>--}}

                                                <div class="account-details-form">
                                                    <form action="{{ route('update.account') }}" method="post"
                                                        enctype="multipart/form-data" id="accountForm">
                                                        @csrf

                                                        <div class="row mb-4">

                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="last-name" class="required">
                                                                        <b>
                                                                            <h5>Account creation date</h5>
                                                                        </b>
                                                                        <h6 style="color: #7fbe00;">
                                                                            {{\Carbon\Carbon::parse(auth()->user()->created_at)->format('d F, Y.')}}
                                                                        </h6>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 text-right">
                                                                <div class="single-input-item">
                                                                    <label for="last-name" class="required">
                                                                        <b>
                                                                            <h5>Membership plan</h5>
                                                                        </b>
                                                                        <h6 style="color: #7fbe00;">
                                                                            {{ucfirst(auth()->user()->plan)}}
                                                                        </h6>
                                                                        <a href="{{route('memberships')}}" style="color: blue;">
                                                                            <h6 style="font-size: 10px;">Change</h6>
                                                                        </a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-lg-12">
                                                                <div class="single-input-item">
                                                                    <label for="last-name" class="required">Name</label>
                                                                    <input type="text" id="last-name" name="uname"
                                                                        placeholder="Last Name" value="<?php echo Auth::user()->name; ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <label for="email" class="required">Email Addres</label>
                                                            <input type="email" id="email" placeholder="Email Address"
                                                                name="email" value="<?php echo Auth::user()->email; ?>">
                                                        </div>

                                                        <fieldset>
                                                            <legend style="font-family: Pixeboy !important;">Change password</legend>

                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">New
                                                                            Password</label>
                                                                        <input type="password" id="new-pwd"
                                                                            placeholder="New Password" name="password">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Confirm
                                                                            Password</label>
                                                                        <input type="password" id="confirm-pwd"
                                                                            placeholder="Confirm Password"
                                                                            name="password_confirmation">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <div class="single-input-item">
                                                            <button class="btn custom-btn"
                                                                id="updateProfile ">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->


                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->


        <!-- main content end -->
    </main>
@endsection
@section('css')
    <style type="text/css">

    </style>
@endsection
@section('js')

    <script type="text/javascript">
        $(document).on('click', "#updateProfile", function(e) {
            $('#accountForm').submit();
        });
    </script>

@endsection
