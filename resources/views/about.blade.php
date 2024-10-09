@extends('layouts.app')

@section('title', 'About')

@section('css')
    <style>
        .about-support-section {
            background: linear-gradient(45deg, #317009, #7fbe00);
        }

        .about-history-section-text .heading-2 {
            color: #7fbe00;
        }
    </style>
@endsection

@section('content')
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-section-text text-center">
                        <h2 class="heading-2">About <span class="d-block"></span> Gematriaverse </h2>
                        <p class="para-1">Gematriaverse , Inc. Est. 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-history-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-history-section-text">
                        {!! $section[1]->value !!}

                    </div>
                </div>
                {{--                <div class="col-lg-6"> --}}
                {{--                    <div class="about-history-section-img"> --}}
                {{--                        <img src="{{asset('images/gem-512x512-1-374x512.png')}}" alt="" class="img-fluid"> --}}
                {{--                    </div> --}}
                {{--                </div> --}}
                <div class="col-lg-12">
                    <div class="about-history-section-bottom text-center">
                        <h3 class="heading-3">DEDICATED TO...</h3>
                        <p class="para-1">All humanity that desires deeper wisdom.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-support-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-support-section-text text-center">
                        <h3 class="heading-3">{!! $section[0]->value !!}</h3>
                        <a href="javascript:;" class="btn custome-btn brown-btn">MEMBERSHIPS</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
