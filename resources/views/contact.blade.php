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
                        <h1>
                            {!! $section[0]->value !!}
                        </h1>
                        {!! $section[1]->value !!}
                        <div class="web-relate">
                            {!! $section[2]->value !!}
                        </div>
                        <div class="web-relate">
                            {!! $section[3]->value !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-contact">
                        <div id="contactformsresult"></div>
                        <form id="contactform" action="{{ route('contactUsSubmit') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="from-group">
                                <div class="label-from">
                                    <label for="">Name</label>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" name="fname" class="form-control" placeholder="First">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" name="lname" class="form-control" placeholder="Last">
                                    </div>
                                </div>
                            </div>
                            <div class="from-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="First">
                                    </div>
                                    <div class="col-6">
                                        <label for="">Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Last">
                                    </div>
                                </div>
                            </div>
                            <div class="from-group">
                                <label for="">Message</label>
                                <textarea name="notes" class="form-control" id="" rows="5"></textarea>
                            </div>
                            <div class="from-group">
                                <button type="submit" class="btn custom-btn mt-4">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#contactform').on('submit', function(e) {
                e.preventDefault();
                // alert('hogaya');
                $('#contactformsresult').html('');

                $.ajax({
                    url: "{{ route('contactUsSubmit') }}",
                    type: "POST",
                    data: $("#contactform").serialize(),

                    success: function(response) {
                        if (response.status) {
                            document.getElementById("contactform").reset();
                            $('#contactformsresult').html("<div class='alert alert-success'>" +
                                response
                                .message + "</div>");
                        } else {
                            $('#contactformsresult').html("<div class='alert alert-danger'>" +
                                response
                                .message + "</div>");
                        }
                    },
                });
            });
        });
    </script>
@endsection
