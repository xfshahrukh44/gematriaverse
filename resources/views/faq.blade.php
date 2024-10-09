@extends('layouts.app')

@section('title', 'FAQ')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <section class="faq-pg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-faq">
                        <h1>FAQ</h1>
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
                        <h1>{!! $section[0]->value !!} </h1>
                        {!! $section[1]->value !!}
                    </div>
                    <div class="main-faq">
                        <div id="accordion">
                            @if (!count($faqs))
                                <div class="col-lg-12 col-md-12 col-12 text-center my-5">
                                    No items found.
                                </div>
                            @endif
                            @foreach ($faqs as $faq)
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                data-target="#collapseOne_{{ $faq->id }}" aria-expanded="true"
                                                aria-controls="collapseOne_{{ $faq->id }}">
                                                <div class="change-font">
                                                    <span class="plus"><i class="fa-solid fa-plus"></i></span>
                                                    <span class="minus"><i class="fa-solid fa-minus"></i></span>
                                                </div>
                                                {{ $faq->question }}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne_{{ $faq->id }}" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="faq_accod">
                                <h1>{!! $section[2]->value !!}</h1>
                                {!! $section[3]->value !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="derek">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video_calculator">
                        {!! $section[4]->value !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video_calculator">
                        {!! $section[5]->value !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection
