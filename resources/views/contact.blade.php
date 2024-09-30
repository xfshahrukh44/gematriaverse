@extends('layouts.app')

@section('title', 'Contact')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-section-text text-center">
                        <h2 class="heading-2">Contact </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-team">
                        <h1>Contact the Team</h1>
                        <p>Have questions? Need to contact Gematriaverse ? Please use one of the emails below or the
                            form on this page. We will do our best to review the emails and contacts that come in, but
                            please, have patience. We appreciate that!

                            Thank you! 😊</p>
                        <div class="web-relate">
                            <div class="icon-1">
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                            <div class="email_web">
                                <h2>Website Related</h2>
                                <a href="<?php echo EMAIL_HREF; ?>"><?php echo EMAIL; ?></a>
                            </div>
                        </div>
                        <div class="web-relate">
                            <div class="icon-1">
                                <i class="fa-regular fa-envelope"></i>
                            </div>

                            <div class="email_web">
                                <h2>General Inquiries</h2>
                                <a href="<?php echo EMAIL_HREF; ?>"><?php echo EMAIL; ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-contact">
                        <div class="from-group">
                            <div class="label-from">
                                <label for="">Name</label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="First">

                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Last">

                                </div>
                            </div>
                        </div>
                        <div class="from-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" placeholder="First">
                                </div>
                                <div class="col-6">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" placeholder="Last">
                                </div>
                            </div>
                        </div>
                        <div class="from-group">
                            <label for="">Message</label>
                            <textarea name="" class="form-control" id="" rows="5"></textarea>
                        </div>
                        <div class="from-group">
                            <button type="submit" class="btn custom-btn mt-4" >Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection


