@extends('layouts.app')

@section('title', 'Holidays')

@section('css')
    <style>
        .date-data li {
            color: #fff;
            list-style: none;
            position: relative;
            padding-left: 50px;
            line-height: 0;
            font-size: 32px;
        }

        .date-data li:before {
            font-family: FontAwesome;
            position: absolute;
            left: 0;
            color: #7fbe00;
            font-size: 32px;
        }

        .date-data li.one:before {
            content: "\f10c";
        }

        .top-holiday-calender .mid-number {
            padding: 0;
            /* display: unset; */
            flex-wrap: wrap;
            justify-content: start;
        }

        .top-holiday-calender .mid-number td {
            width: 10%;
            display: flex;
            height: 100px;
            align-items: center;
            justify-content: center;
            border: none;
            font-size: 30px;
            margin: 10px;
            border-radius: 12px;
            box-shadow: 0 0 6px 2px #7fbe00;
        }

        .top-holiday-calender .mid-number {
            border-top: none;
            border-bottom: none;
        }

        .top-holiday-calender .mid-number td a {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        tr.mid-number {}

        .top-holiday-calender .mid-number td {
            background: white;
            border-width: 2px;
        }

        table.top-holiday-calender thead {
            /* background: black; */
            border-top-left-radius: 30px;
        }

        table.top-holiday-calender thead tr {
            padding: 0 20px;
        }

        .table-holiday {
            background: black;
            border-radius: 20px;
        }

        .top-holiday-calender .mid-number td:hover a span {
            color: white;
            border: none;
        }

        .top-holiday-calender .mid-number {
            justify-content: center;
            /* background: black; */
            padding: 20px 0px;
            padding-top: 0;
        }

        .top-holiday-calender .mid-number td:hover {
            background: green;
        }

        .top-holiday-calender thead tr th a {
            color: orange;
        }

        section.holiday-calendar {
            padding: 50px 200px;
        }

        @media(max-width:1440px) {
            section.holiday-calendar {
                padding: 50px 100px;
            }
        }

        .datewise-show {
            padding: 50px 50px;
        }

        .data-justify h2 {
            text-align: center;
            color: black;
            font-size: 40px;
            margin-bottom: 50px;
            font-weight: 800;
        }

        .datewise-show .table-holiday {
            background: transparent;
            padding: 20px;
            border: 2px solid green;
        }

        .data-show-event tr {
            background: transparent !important;
            box-shadow: 0 0 5px 2px #ffa33f;
            margin-bottom: 15px;
        }

        .data-show-event .date-data td:nth-child(3) {
            width: 35%;
        }

        .data-show-event .date-data td {
            width: 20%;
        }

        .data-show-event .date-data td:nth-child(1) {
            width: 45%;
        }

        .last-row td:nth-child(1) {
            width: 45%;
        }

        .last-row td:nth-child(2) {
            width: 20%;
        }

        .last-row td:nth-child(3) {
            width: 35%;
        }

        .data-show-event .date-data td a h5 {
            margin: 0;
            font-size: 17px;
        }

        tr.last-row {
            background: green !important;
            padding: 10px 20px;
            border-radius: 10px;
        }

        tr.last-row h5 {
            margin: 0;
            color: white;
        }

        .top-holiday-calender .mid-number td a:hover span {
            border: none !important;
            color: white !important;
        }
    </style>
@endsection



@section('content')

    <section class="datewise-show">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="show-holiday">
                        <div class="data-justify">
                            <h2>{{ $datekey->format('l') }} {{ ucfirst($month) }} {{ $day }}</h2>
                        </div>
                        <div class="table-holiday">
                            {{-- @dump($holidays); --}}
                            @if (!empty($holidays))

                                <table class="data-show-event">
                                    <thead>
                                        <tr class="last-row">
                                            {{-- <td>
                                                <h5> </h5>
                                            </td> --}}
                                            <td>
                                                <h5> Holiday</h5>
                                            </td>
                                            <td>
                                                <h5> Category </h5>
                                            </td>
                                            <td>
                                                <h5> Tags
                                                </h5>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($holidays as $holiday)
                                            <tr class="date-data">
                                                {{-- <td class="text-white">
                                                    <li class="one">
                                                    </li>
                                                </td> --}}
                                                <td>
                                                    <a href="javascript:;">
                                                        <h5>{{ $holiday['title'] }}</h5>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:;">
                                                        <h6> {{ $holiday['category'] }} </h6>
                                                    </a>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $holiday['tags']) as $tag)
                                                        <a href="javascript:;">
                                                            <p> {{ $tag }} </p>
                                                        </a>
                                                        @if (!$loop->last)
                                                            <span>,</span>
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No holiday found for this date.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
