@extends('layouts.app')

@section('title', 'Calendar')

@section('css')
    <style>
        .container-calendar {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
            overflow-x: hidden;
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            text-align: center;
        }

        .card {
            position: relative;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            cursor: default;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        }

        .card--title {
            color: #000000;
            padding: 0.2rem;
            position: relative;
        }

        .index {
            position: absolute;
            top: 5px;
            left: 15px;
            font-size: 24px;
            color: #7fbe00;
        }

        .calendar {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar--day {
            color: #fff;
            background: #151518;
            padding: 0.25rem;
        }

        .today {
            position: relative;
            font-weight: 700;
            color: red !important;
        }

        .today::after {
            content: "";
            position: absolute;
            top: 7px;
            right: 16px;
            width: 5px;
            height: 5px;
            background: red !important;
            border-radius: 50%;
            z-index: 5;
        }

        table,
        thead,
        tbody {
            border-collapse: collapse;
        }

        th {
            font-weight: 600;
            text-align: center;
            width: 50px;
            padding: 0.5rem;
        }

        td {
            position: relative;
            font-weight: 500;
            height: 50px;
        }

        td:first-child {
            color: #d9534f;
        }

        #TopSpot {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div id="TopSpot">Personal numerology calendar for
                <div class="UserBirthday">January 1, 1991</div>
            </div>
        </div>
    </div>

    <section class="empty-sec py">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="DecadeSpot"> Change Year: <a href="javascript:;">2020-2029</a></div>
                </div>
                <div class="col-lg-12">
                    <div class="CalHeaderTop">
                    <span class="NavClass LeftNav">
                        <a href="javascript:;"><i class="fas fa-arrow-circle-left"></i></a>
                    </span>
                        <span id="YearViewYear">2024&nbsp;<span id="YearNumber">(1)</span>
                    </span>
                        <span class="NavClass RightNav">
                        <a href="javascript:;"><i class="fas fa-arrow-circle-right"></i></a>
                    </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="custom-calender">
                        <div class="container-calendar">
                            <main class="wrapper"></main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        const year = new Date().getFullYear();
        const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        const monthNames = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];

        const wrapper = document.querySelector(".wrapper");

        function generateCalendar() {
            for (let month = 0; month < 12; month++) {
                const firstDateMonth = new Date(year, month, 1);
                const lastDateMonth = new Date(year, month + 1, 0);
                const firstDayOfWeek = firstDateMonth.getDay();
                let date = new Date(firstDateMonth);
                let weeks = [];
                let week = new Array(7).fill({
                    date: ""
                });

                for (let i = 0; i < firstDayOfWeek; i++) {
                    week[i] = {
                        date: ""
                    };
                }

                while (date <= lastDateMonth) {
                    if (date.getDay() === 0) {
                        weeks.push(week);
                        week = new Array(7).fill({
                            date: ""
                        });
                    }
                    week[date.getDay()] = {
                        date: date.getDate()
                    };
                    date.setDate(date.getDate() + 1);
                }
                weeks.push(week);

                const card = document.createElement("div");
                card.classList.add("card");

                const title = document.createElement("h2");
                title.classList.add("card--title");
                title.innerHTML = `<a href="{{route('monthly-calendar')}}" ><span class="index">  ${month + 1}. </span> ${
                    monthNames[month]
                }</a>`;
                card.appendChild(title);

                const table = document.createElement("table");
                table.classList.add("calendar");

                const thead = document.createElement("thead");
                const tr = document.createElement("tr");

                days.forEach((day) => {
                    const th = document.createElement("th");
                    th.classList.add("calendar--day");
                    th.textContent = day;
                    tr.appendChild(th);
                });

                thead.appendChild(tr);
                table.appendChild(thead);

                const tbody = document.createElement("tbody");
                tbody.classList.add("calendar-body");

                weeks.forEach((week) => {
                    const tr = document.createElement("tr");
                    week.forEach((day) => {
                        const td = document.createElement("td");
                        td.textContent = day.date;
                        if (isToday(day, month)) {
                            td.classList.add("today");
                        }
                        tr.appendChild(td);
                    });
                    tbody.appendChild(tr);
                });

                table.appendChild(tbody);
                card.appendChild(table);
                wrapper.appendChild(card);
            }
        }

        function isToday(day, month) {
            const today = new Date();
            return (
                day.date &&
                day.date === today.getDate() &&
                month === today.getMonth() &&
                year === today.getFullYear()
            );
        }

        generateCalendar();
    </script>
@endsection


