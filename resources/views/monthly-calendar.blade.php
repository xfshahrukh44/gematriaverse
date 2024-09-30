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
            width: 100%;
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
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div id="TopSpot">Learn more about your Personal Date Numerology<div class="UserBirthday">February (3) 2024 (1)</div>
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
                        const dayTable = document.createElement("table");
                        dayTable.classList.add("DayTable");

                        const dayTableBody = document.createElement("tbody");

                        // Create Day Header Row
                        const dayHeaderRow = document.createElement("tr");
                        dayHeaderRow.classList.add("DayHeader");

                        const emptyTd = document.createElement("td");
                        dayHeaderRow.appendChild(emptyTd);

                        const dateTd = document.createElement("td");
                        dateTd.classList.add("DateClass");
                        dateTd.textContent = day.date;
                        dayHeaderRow.appendChild(dateTd);

                        dayTableBody.appendChild(dayHeaderRow);

                        // Create Date Content Row
                        const dateContentRow = document.createElement("tr");
                        dateContentRow.classList.add("DateContent");

                        const calSpotTd = document.createElement("td");
                        calSpotTd.classList.add("CalSpot");
                        calSpotTd.id = `CalSpot${index}`;
                        calSpotTd.innerHTML = `52<br>16<br>16<br>32<br>`; // Example content

                        const personalSpotTd = document.createElement("td");
                        personalSpotTd.classList.add("PersonalSpot");
                        personalSpotTd.id = `PersonalSpot${index}`;
                        personalSpotTd.textContent = `${index % 12 + 1}`; // Example content

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
        generateMonthView(8);
    </script>
@endsection


