@extends('layouts.app')

@section('title', 'Blog')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <section class="blog-section-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-section-text">
                        <h2 class="heading-2">Become a Member <span> for an ad-free experience</span></h2>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="blog-section-main">
                        <h2 class="heading-2">Blog</h2>
                        <ul class="blog-section-main-lines">

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">The ‘Perfect’ Numerology of Daniel Ricciardo’s F1 Career</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 23, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">Daniel Ricciardo Takes Fastest Lap in Possible Final Race</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 23, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">The Passing of Mercury Morris and His Head Coach Don Shula</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 22, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">The Extreme “Pi” Riddle for the Singapore GP</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 22, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">Lando Norris Tops Max Verstappen in Singapore Grand Prix</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 22, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">Shohei Ohtani Becomes First Player to Join MLB’s 50-50 Club</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 20, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">CNN Tribute to “Turbulence” Event</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 20, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">F1 Goes Racing at Marina Bay Street Circuit in Singapore</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 19, 2024</p>
                            </li>

                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">University of Idaho Stabber Bryan Kohberger Synced to Trump Attempt</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 16, 2024</p>
                            </li>
                            <li>
                                <a href="{{route('blog-detail')}}">
                                    <h3 class="heading-3">More on the “Rhoden” Riddle for Attempt on Trump</h3>
                                </a>
                                <p class="para-1"><i class="fa fa-calendar"></i> September 16, 2024</p>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="blog-section-main  blog-section-main-second">
                        <h2 class="heading-2">Search</h2>

                        <form>
                            <input type="search" id="" class="form-control" placeholder="Search..." value="">
                        </form>

                        <h2 class="heading-2">Categories</h2>
                        <ul class="main-anker">
                            <li><a href="javascript:;">Corporate Numerology</a></li>
                            <li><a href="javascript:;">Death by Numbers</a></li>
                            <li><a href="javascript:;">Film & Television</a></li>
                            <li><a href="javascript:;">History by the Numbers</a></li>
                            <li><a href="javascript:;">News by the Numbers</a></li>
                            <li><a href="javascript:;">Organic Matrix</a></li>
                            <li><a href="javascript:;">Other</a></li>
                            <li><a href="javascript:;">Rigged Sports</a></li>
                            <li><a href="javascript:;">Video Game Numerology</a></li>
                        </ul>

                        <!-- <h2 class="heading-2">Archives</h2>
                        <ul class="main-anker">
                            <li><a href="javascript:;">September 2024</a></li>
                            <li><a href="javascript:;">August 2024</a></li>
                            <li><a href="javascript:;">July 2024</a></li>
                            <li><a href="javascript:;">June 2024</a></li>
                            <li><a href="javascript:;">May 2024</a></li>
                            <li><a href="javascript:;">April 2024</a></li>
                            <li><a href="javascript:;">March 2024</a></li>
                            <li><a href="javascript:;">February 2024</a></li>
                            <li><a href="javascript:;">January 2024</a></li>
                            <li><a href="javascript:;">December 2023</a></li>
                            <li><a href="javascript:;">November 2023</a></li>
                            <li><a href="javascript:;">October 2023</a></li>
                            <li><a href="javascript:;">September 2023</a></li>
                            <li><a href="javascript:;">August 2023</a></li>
                            <li><a href="javascript:;">July 2023</a></li>
                            <li><a href="javascript:;">June 2023</a></li>
                            <li><a href="javascript:;">May 2023</a></li>
                            <li><a href="javascript:;">April 2023</a></li>
                            <li><a href="javascript:;">March 2023</a></li>
                            <li><a href="javascript:;">February 2023</a></li>
                            <li><a href="javascript:;">January 2023</a></li>
                            <li><a href="javascript:;">December 2022</a></li>
                            <li><a href="javascript:;">November 2022</a></li>
                            <li><a href="javascript:;">October 2022</a></li>
                            <li><a href="javascript:;">September 2022</a></li>
                            <li><a href="javascript:;">August 2022</a></li>
                            <li><a href="javascript:;">July 2022</a></li>
                            <li><a href="javascript:;">June 2022</a></li>
                            <li><a href="javascript:;">May 2022</a></li>
                            <li><a href="javascript:;">April 2022</a></li>
                            <li><a href="javascript:;">March 2022</a></li>
                            <li><a href="javascript:;">February 2022</a></li>
                            <li><a href="javascript:;">January 2022</a></li>
                            <li><a href="javascript:;">December 2021</a></li>
                            <li><a href="javascript:;">November 2021</a></li>
                            <li><a href="javascript:;">October 2021</a></li>
                            <li><a href="javascript:;">September 2021</a></li>
                            <li><a href="javascript:;">August 2021</a></li>
                            <li><a href="javascript:;">July 2021</a></li>
                            <li><a href="javascript:;">June 2021</a></li>
                            <li><a href="javascript:;">May 2021</a></li>
                            <li><a href="javascript:;">April 2021</a></li>
                            <li><a href="javascript:;">March 2021</a></li>
                            <li><a href="javascript:;">February 2021</a></li>
                            <li><a href="javascript:;">January 2021</a></li>
                            <li><a href="javascript:;">December 2020</a></li>
                            <li><a href="javascript:;">November 2020</a></li>
                            <li><a href="javascript:;">October 2020</a></li>
                            <li><a href="javascript:;">September 2020</a></li>
                            <li><a href="javascript:;">August 2020</a></li>
                            <li><a href="javascript:;">July 2020</a></li>
                            <li><a href="javascript:;">June 2020</a></li>
                            <li><a href="javascript:;">May 2020</a></li>
                            <li><a href="javascript:;">April 2020</a></li>
                            <li><a href="javascript:;">March 2020</a></li>
                            <li><a href="javascript:;">February 2020</a></li>
                            <li><a href="javascript:;">January 2020</a></li>
                            <li><a href="javascript:;">December 2019</a></li>
                            <li><a href="javascript:;">November 2019</a></li>
                            <li><a href="javascript:;">October 2019</a></li>
                            <li><a href="javascript:;">September 2019</a></li>
                            <li><a href="javascript:;">August 2019</a></li>
                            <li><a href="javascript:;">July 2019</a></li>
                            <li><a href="javascript:;">June 2019</a></li>
                            <li><a href="javascript:;">May 2019</a></li>
                            <li><a href="javascript:;">April 2019</a></li>
                            <li><a href="javascript:;">March 2019</a></li>
                            <li><a href="javascript:;">February 2019</a></li>
                            <li><a href="javascript:;">January 2019</a></li>
                            <li><a href="javascript:;">December 2018</a></li>
                            <li><a href="javascript:;">November 2018</a></li>
                            <li><a href="javascript:;">October 2018</a></li>
                            <li><a href="javascript:;">September 2018</a></li>
                            <li><a href="javascript:;">August 2018</a></li>
                            <li><a href="javascript:;">July 2018</a></li>
                            <li><a href="javascript:;">June 2018</a></li>
                            <li><a href="javascript:;">May 2018</a></li>
                            <li><a href="javascript:;">April 2018</a></li>
                            <li><a href="javascript:;">March 2018</a></li>
                            <li><a href="javascript:;">February 2018</a></li>
                            <li><a href="javascript:;">January 2018</a></li>
                            <li><a href="javascript:;">December 2017</a></li>
                        </ul> -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript"></script>
@endsection


