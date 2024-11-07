@extends('layouts.app')

@section('title', 'Nostalgia calculators')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <section class="empty-sec py">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tool-wrapper">
                        <table>
                            <tbody>
                            <tr>
                                <td colspan="2">
                                    <h1>
                                        <center>The Bare Bones</center>
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3><a href="{{route('nostalgia-calculators-nextgen')}}">NextGen (2018)</a></h3>
                                    <p class="white">
                                        The simple, sleek version that so many around the world have become accustomed to.
                                    </p>
                                </td>
                                <td>
                                    <a href="{{route('nostalgia-calculators-nextgen')}}"><img decoding="async" src="{{asset('images/NextGenCalc.png')}}" width="300px"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3><a href="{{route('nostalgia-calculators-date')}}">NextGen Date-to-Dates</a></h3>
                                    <p class="white">
                                        The Date Calculator that accompanied the 2018 upgrade.
                                    </p>
                                </td>
                                <td>
                                    <a href="{{route('nostalgia-calculators-date')}}"><img decoding="async" src="{{asset('images/NextGenDates.png')}}" width="300px"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3><a href="{{route('nostalgia-calculators-classic')}}">Classic (2017)</a></h3><br>
                                    <p class="white">
                                        An upgrade of the Basic calculator with cipher selections, customizable options, and user history.
                                    </p>
                                </td>
                                <td>
                                    <a href="{{route('nostalgia-calculators-classic')}}"><img decoding="async" src="{{asset('images/ClassicCalc.png')}}" width="300px"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3><a href="{{route('nostalgia-calculators-basic')}}">Basic (2017)</a></h3>
                                    <p class="white">
                                        The calculator that started it all. As simple as it comes.
                                    </p>
                                </td>
                                <td>
                                    <a href="{{route('nostalgia-calculators-basic')}}"><img decoding="async" src="{{asset('images/BasicCalc.png')}}" width="300px"></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{-- <script>
        trackTimeSpent('nostalgia_calculators', "{{ route('log.time.spent') }}", "{{ csrf_token() }}");
    </script> --}}
    <script type="text/javascript"></script>
@endsection


