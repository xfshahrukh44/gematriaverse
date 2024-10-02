@extends('layouts.app')

@section('title', 'Monthly calendar')

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
            display: block;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            text-align: center;
            width: 75%;
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
            height: 70px;
            font-size: 2rem;
        }

        td:first-child {
            color: #7fbe00;
        }

        .DayNameRow td:first-child {
            color: white;
        }

        #TopSpot {
            text-align: center;
        }

        table#MonthOnlyTableId {
            background: white;
            width: 100%;
        }

        table.DayTable {
            width: 100%;
        }

        tr.DayNameRow {
            background: #7fbe00;
            color: white;
        }

        td.EachDay {
            border: solid #7fbe00;
        }

        .PersonalSpot {
            font-size: 30px;
            width: 50%;
            color: black;
        }

        .CalSpot {
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div id="TopSpot">Learn more about your Personal Date Numerology<div class="UserBirthday">2024</div>
            </div>
        </div>
    </div>

    <section class="empty-sec py">
        <div class="container-fluid">
            <div class="row">
{{--                <div class="col-lg-12">--}}
{{--                    <div id="DecadeSpot"> Change Year: <a href="javascript:;">2020-2029</a></div>--}}
{{--                </div>--}}
                <div class="col-lg-12">
                    <div class="CalHeaderTop">
{{--                    <span class="NavClass LeftNav">--}}
{{--                        <a href="javascript:;"><i class="fas fa-arrow-circle-left"></i></a>--}}
{{--                    </span>--}}
                    <span id="YearViewYear">{{\Carbon\Carbon::createFromFormat('m', $_GET['month'])->format('F')}}</span>
                    <br>
                    <span id="YearViewYear">{{$_GET["year"]}}&nbsp;<span id="YearNumber"></span>
                    </span>
{{--                    <span class="NavClass RightNav">--}}
{{--                        <a href="javascript:;"><i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </span>--}}
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
        function calculateGematria(month, day, year) {
            // Convert year into two parts
            const yearFirstPart = Math.floor(year / 100); // first two digits of the year
            const yearSecondPart = year % 100; // last two digits of the year

            // Sum up digits of the year
            const yearDigitsSum = year.toString().split('').reduce((acc, digit) => acc + parseInt(digit), 0);

            // First calculation: month + day + first two digits of year + last two digits of year
            const calc1 = month + day + yearFirstPart + yearSecondPart;

            // Second calculation: month + day + sum of year digits
            const calc2 = month + day + yearDigitsSum;

            // Third calculation: sum of digits in month, day, and sum of year digits
            const calc3 = (month.toString().split('').reduce((acc, digit) => acc + parseInt(digit), 0)) +
                (day.toString().split('').reduce((acc, digit) => acc + parseInt(digit), 0)) +
                yearDigitsSum;

            // Fourth calculation: month + day + last two digits of year
            const calc4 = month + day + yearSecondPart;

            return [calc1, calc2, calc3, calc4];
        }
    </script>
    <script>
        let year_check = '{{$_GET["year"] ?? ""}}';
        let month = '{{$_GET["month"] ?? "1"}}';
        month = parseInt(month) - 1;

        const year = year_check !== '' ? year_check : new Date().getFullYear();
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

        function generateMonthView(month) {
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
                if (date.getDay() === 0 && week.some(day => day.date)) {
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

            const table = document.createElement("table");
            table.id = "MonthOnlyTableId";
            table.classList.add("MonthTable");

            const thead = document.createElement("thead");
            const trHead = document.createElement("tr");
            trHead.classList.add("DayNameRow");

            days.forEach((day) => {
                const th = document.createElement("td");
                th.textContent = day;
                trHead.appendChild(th);
            });

            thead.appendChild(trHead);
            table.appendChild(thead);

            const tbody = document.createElement("tbody");

            weeks.forEach((week) => {
                const tr = document.createElement("tr");

                week.forEach((day, index) => {
                    const td = document.createElement("td");
                    td.classList.add("EachDay");

                    if (day.date) {
                        console.log(day);
                        console.log(day.date);
                        const dayTable = document.createElement("table");
                        dayTable.classList.add("DayTable");

                        const dayTableBody = document.createElement("tbody");

                        // // Create Day Header Row
                        // const dayHeaderRow = document.createElement("tr");
                        // dayHeaderRow.classList.add("DayHeader");
                        //
                        // const emptyTd = document.createElement("td");
                        // dayHeaderRow.appendChild(emptyTd);
                        //
                        // const dateTd = document.createElement("td");
                        // dateTd.classList.add("DateClass");
                        // dateTd.textContent = day.date;
                        // dayHeaderRow.appendChild(dateTd);
                        //
                        // dayTableBody.appendChild(dayHeaderRow);

                        // Create Date Content Row
                        const dateContentRow = document.createElement("tr");
                        dateContentRow.classList.add("DateContent");

                        let numeric_results = calculateGematria(month+1, day.date, year);
                        const calSpotTd = document.createElement("td");
                        calSpotTd.classList.add("CalSpot");
                        calSpotTd.id = `CalSpot${index}`;
                        calSpotTd.innerHTML = `${numeric_results[0]}<br>${numeric_results[1]}<br>${numeric_results[2]}<br>${numeric_results[3]}<br>`; // Example content

                        const personalSpotTd = document.createElement("td");
                        personalSpotTd.classList.add("PersonalSpot");
                        personalSpotTd.id = `PersonalSpot${index}`;
                        // personalSpotTd.textContent = `${index % 12 + 1}`; // Example content
                        personalSpotTd.textContent = day.date; // Example content

                        dateContentRow.appendChild(calSpotTd);
                        dateContentRow.appendChild(personalSpotTd);

                        dayTableBody.appendChild(dateContentRow);
                        dayTable.appendChild(dayTableBody);
                        td.appendChild(dayTable);
                    }

                    tr.appendChild(td);
                });

                tbody.appendChild(tr);
            });

            table.appendChild(tbody);
            wrapper.appendChild(table);
        }

        // Example of generating a month view for September
        generateMonthView(month);
    </script>
@endsection


