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

        .top-holiday-calender .mid-number td a:hover span {
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

        .top-holiday-calender .mid-number td.active {
            background: green;
        }

        .top-holiday-calender .mid-number td.active a span {
            color: white;
        }
    </style>
@endsection

@section('content')

    <section class="holiday-calendar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-holiday">
                        <table class="top-holiday-calender">
                            <thead>
                                <tr>
                                    @php
                                        $currentMonthDate = \Carbon\Carbon::createFromFormat(
                                            'F',
                                            ucfirst($currentMonth),
                                        );
                                        $previousMonth = $currentMonthDate->copy()->subMonth();
                                        $nextMonth = $currentMonthDate->copy()->addMonth();
                                    @endphp
                                    <th>
                                        <a href="{{ url('holidays-two/' . strtolower($previousMonth->format('M'))) }}">
                                            {{ $previousMonth->format('F') }}
                                        </a>
                                    </th>
                                    <th>
                                        <h2>{{ ucfirst($currentMonth) }} Holidays</h2>
                                    </th>
                                    <th>
                                        <a href="{{ url('holidays-two/' . strtolower($nextMonth->format('M'))) }}">
                                            {{ $nextMonth->format('F') }}
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="mid-number">
                                    @php
                                        $currentMonthD = strtolower(\Carbon\Carbon::now()->format('M'));
                                        $currentDay = \Carbon\Carbon::now()->day;
                                        $currentYear = \Carbon\Carbon::now()->year;
                                        $daysInMonth = getDaysInMonth($currentMonth, $currentYear);
                                    @endphp
                                    @for ($i = 1; $i <= $daysInMonth; $i++)
                                        @php
                                            $active = '';
                                            if ($currentMonthD == $currentMonth && $currentDay == $i) {
                                                $active = 'active';
                                                $currentHash = "#{$currentMonth}-{$i}";
                                            }
                                        @endphp
                                        <td class="{{ $active }}">
                                            <a href="{{ url('/holiday-detail/' . $currentMonth . '/' . $i) }}">
                                                <span>{{ $i }}</span>
                                            </a>
                                        </td>
                                    @endfor
                                </tr>
                                {{-- <tr class="last-row">
                                    <td>
                                        <h5> Date</h5>
                                    </td>
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
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    <div class="table-holiday">
                        @foreach ($holidays as $date => $holidayList)
                            @php
                                $parsedDate = \Carbon\Carbon::parse($date);
                                $month = strtolower($parsedDate->format('M'));
                                $day = $parsedDate->day;
                            @endphp
                            <table class="data-show-event">
                                <thead>
                                    <tr class="data-row">
                                        <th>
                                            <a href="javascript:;">
                                                <h3 id="{{ $month . '-' . $day }}">{{ $date }}</h3>
                                            </a>
                                        </th>
                                        <th>
                                            <h3>{{ \Carbon\Carbon::parse($date)->format('l') }}</h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($holidayList as $holiday)
                                        <tr class="date-data">
                                            <td class="text-white">
                                                <li class="one">
                                                </li>
                                            </td>
                                            <td>
                                                <a href="javascript:;">
                                                    <h5>{{ $holiday['title'] }}</h5>
                                                </a>
                                            </td>
                                            <td
                                                class="circle-dot {{ strtolower(str_replace(' ', '-', $holiday['category'])) }}">
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
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </section>


@endsection

@section('js')
    <script>
        // $(document).ready(function() {
        //     var hash = '{{ $currentHash }}';

        //     if (hash != '') {
        //         $('html, body').animate({
        //             scrollTop: $(hash).offset().top
        //         }, 1000);
        //     }
        // });
    </script>
@endsection
