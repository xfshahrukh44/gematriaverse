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
                        <h2 class="heading-2">THE HISTORY<span class="d-block">OF Gematriaverse</span></h2>
                        <p class="para-1">Hello. My name is Derek Tikkuri. My skepticism about the world as it is presented to us dates back to the 9/11 attacks in 2001, when I was just a junior in high school.</p>
                        <p class="para-1">My real journey for truth and knowledge began in 2015. After investigating the legitimacy of certain major news stories, I found myself reaching some unexpected conclusions that left me rather unsettled. In my search for others who were noticing the same things, I came across a couple of channels that were talking about this thing called “gematria” and how it exposes the cabal. Highly intrigued by the subject, I found it to be a great way to expose the actions of the puppet masters that I was increasingly sure existed.</p>
                        <p class="para-1">Before I felt comfortable talking about the topic, however, I had to do my own research to convince myself I wasn’t going crazy. I have always been a data and statistics junkie, so I went ahead and wrote a program to analyze the way we spell our numbers, dates, planets, and more. It did not take long to not only become convinced there was something powerful to this, but there were many more layers to the picture than I could ever have imagined.</p>
                        <p class="para-1">Almost immediately after doing so, I began noticing that not only was this code relevant to the news and the many fake stories I learned were being run, but also to events in my own real life. My fascination only grew as more and more revealed itself, and here in 2022 I have never been as passionate about not only sharing my discoveries, but giving people the ability to easily find their own as well.</p>
                    </div>
                </div>
{{--                <div class="col-lg-6">--}}
{{--                    <div class="about-history-section-img">--}}
{{--                        <img src="{{asset('images/gem-512x512-1-374x512.png')}}" alt="" class="img-fluid">--}}
{{--                    </div>--}}
{{--                </div>--}}
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
                        <h3 class="heading-3">SUPPORT Gematriaverse  WHILE GAINING ACCESS TO AMAZING TOOLS</h3>
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


