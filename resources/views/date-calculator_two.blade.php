@extends('layouts.app')

@section('title', 'Date calculator')

@section('css')
    <style>
        #DurationDetailsInner {
            padding: 16px;
            font-size: 13px;
        }

        #CheckBoxSection {
            width: 100%;
            margin-top: 50px;
        }

        #TimeBetweenRow {
            width: 100%;
            margin-top: 10px;
        }

        div#TimeBetweenDates {
            padding-bottom: 0;
        }

        #DurationContainer {
            width: 100%;
            margin-bottom: 20px;
        }

        #DurationTotalsSpotHolder {
            width: 100%;
            margin-top: 50px;
            text-align: end;
        }

        div#YearTable {
            line-height: 28px;
        }

        .DurationString {
            font-size: 1em;
            letter-spacing: 1px;
        }

        .planety-tables {
            margin: auto;
            width: 50%;
            margin-bottom: 20px;
        }

        table.table.table-sm.table-striped.table-bordered {
            text-align: center;
            background-color: black;
        }

        #mdy1,
        #mdy2 {
            display: flow-root;
            padding: 10px;
        }

        #CheckBoxSpotTitle {
            margin-bottom: 15px;
        }

        #Date1Inputs,
        #Date2Inputs {
            margin: 10px 0;
        }

        .mdyDiv input {
            height: 30px;
            text-align: center;
            /* border-radius: 8px; */
            margin-top: 5px;
            width: 100px;
            font-size: 13px;
        }

        #printDateStr1,
        #printDateStr2 {
            margin-bottom: 15px;
        }

        #DateNums1 div,
        #DateNums2 div {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #DateNums1 div span a,
        #DateNums2 div span a {
            font-size: 16px;
            /* border: 1px solid #7fbe00; */
            padding: 3px 4px;
        }

        .dateNumSpan a:focus {
            background: #7fbe00;
        }

        .dateNumSpan a:focus font {
            color: white;
        }

        .dateNumSpan a:focus {
            border: 1px solid white !important;

        }

        #Date1Inputs,
        #Date2Inputs {
            justify-content: center;
        }

        .mdyDiv {
            margin: 0;
            padding: 0 5px;
        }

        #mdy1,
        #mdy2 {
            border-color: #7fbe00;
            border-radius: 5px;
            padding: 15px 0;
            background: black;
            border-width: 3px;
            margin: auto;
            /* width: 80%; */
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        #DateStr1,
        #DateStr2 {
            letter-spacing: 2px;
        }

        .DurationStringMain {
            color: #7fbe00;
            font-weight: 600;
            font-size: 17px;
            display: block;
            margin: 2px 0;
        }

        .DurNumMain {
            font-size: 1.5em;
        }

        #DurationDetailsInner {
            letter-spacing: 1px;
        }

        div#DurationSection {
            border-color: #7fbe00;
            border-radius: 5px;
            padding: 5px 0;
            margin-top: 10px;
            background: black;

        }

        table.table.table-sm.table-striped.table-bordered.planety-tables tr th {
            border: 2px solid white;
            height: 50px;
            line-height: 45px;
            color: white;
            font-size: 15px;
        }

        table.table.table-sm.table-striped.table-bordered.planety-tables tr td {
            border: 2px solid white;
            height: 50px;
            line-height: 45px;
            color: white;
            font-size: 12px;
        }

        table.table.table-sm.table-striped.table-bordered tr th {
            border: 2px solid white;
            color: white;
            font-size: 13px;
        }

        table.table.table-sm.table-striped.table-bordered tr td {
            border: 2px solid white;
            height: 50px;
            line-height: 45px;
            color: white;
            font-size: 13px;
        }

        .page-content {
            background: black;
            padding: 0px 30px;
            /* padding-bottom: 0px; */
            padding-top: 20px;
        }

        .page-content .row {
            align-items: center;
        }

        .mdyDiv {
            font-size: 12px;
            width: unset;
        }

        span#DateHeader1,
        span#DateHeader2 {
            font-size: 15px;
            width: unset;
        }

        div#printDateStr1,
        div#printDateStr2 {
            margin-bottom: 10px;
        }

        div#printDateStr1 span,
        div#printDateStr2 span {
            font-size: 14px;
        }

        div#Date1Inputs,
        div#Date2Inputs {
            margin: 0;
            margin-top: 10px;
            padding: 0;
        }

        div#DurationTotalsSpotHolder {
            width: unset;
            float: unset;
            margin-top: 0;
            text-align: start;
        }

        div#CheckBoxSection {
            width: unset;
            float: unset;
            margin-top: 0;
        }

        div#DurationSection {
            width: 100%;
            display: flex;
            align-items: start;
            justify-content: space-between;
            padding: 10px 15px;
            display: block;
            text-align: start;
        }

        div#CheckBoxSpotTitle {
            float: unset;
        }

        div#mdy1 {
            margin-right: unset;
        }

        div#mdy2 {
            margin-left: unset;
        }

        .flex-b {
            /* display: flex; */
            align-items: end;
            border: 2px solid #7fbe00;
            border-radius: 5px;
            padding: 5px 10px;
        }

        #DateStr1Show,
        #DateStr2Show {
            border: 2px solid #7fbe00;
            border-radius: 5px;
            padding: 15px 10px;
        }

        div#DurationDetailsInner {
            padding-left: 0;
        }

        .DurationStringMain {
            font-size: 12px;
        }

        font.DurNumMain.target_number {}

        .DurNumMain {
            font-size: 12px;
        }

        span.DurationString {
            font-size: 12px;
        }

        div#CheckBoxSpot label {
            font-size: 12px;
            margin-bottom: 0;
        }

        div#CheckBoxSpot input {
            width: 15px;
            height: 15px;
        }

        div#CheckBoxSpotTitle {
            margin-bottom: 5px;
        }

        div#YearTable span {
            font-size: 12px;
        }

        div#CheckBoxSpot {
            padding-bottom: 20px;
        }

        .flow-chg {
            display: flex;
        }

        .text-center.mb-4 {
            margin-top: 20px;
        }

        input[type="checkbox"]:checked::after {
            font-size: 12px;
        }

        @media(max-width:1440px) {
            .page-content {
                padding: 0px 0px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="main-content-area full-width-template">

        @php
            $currentDate = date('Y-m-d');
            $currentYear = date('Y');
            $currentMonth = date('m');
            $currentDay = date('d');
            $previousYear = $currentYear - 1;
            $previousDate = date('Y-m-d', strtotime('-1 year'));
        @endphp
        <section class="page-content clearfix py">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-3">
                        <div id="TimeBetweenRow">
                            <div id="TimeBetweenDates">
                                <div class="DurHead">Time Between Dates:</div>
                                <!-- <br class="mo"> -->
                                <div id="TimeBetweenCheckbox">
                                    <input tabindex="14" class="opt_check" type="checkbox" id="Check_End"
                                        value="End"><label for="Check_End">&nbsp;Include End
                                        Date?&nbsp;&nbsp;</label>
                                </div>
                            </div>
                        </div>
                        <div id="DurationContainer">
                            <div id="DurationSection">
                                <div class="data-duration">
                                    <div id="DurationDetails">
                                        <div id="DurationDetailsInner">
                                            From <font class="DurationStringMain"></font><br class="mo">
                                            to <font class="DurationStringMain"></font> is:<br>
                                            <font style="size: 115%">
                                                <a href="javascript:void(0)" class="">
                                                    <font class="DurNumMain target_number"></font>
                                                </a>
                                            </font>
                                        </div>
                                    </div>
                                    <img decoding="async" id="watermarkDurationText"
                                        style="display: none; float:right; margin-top: -22px; margin-right: 7px;"
                                        src="/tools/date-calculator-advanced/img/gematrinator-just-text-200px.png"
                                        width="100px">
                                    <img decoding="async" id="watermarkDurationGuy"
                                        style="display: none; float:right; margin-top: -47px; margin-right: 6px;"
                                        src="/tools/date-calculator-advanced/img/gem-guy-flip.png" width="36px">
                                </div>
                                <div id="CheckBoxSection">
                                    <div id="CheckBoxSpotTitle">
                                        <span class="DurationString">Select Durations to View:</span>
                                    </div>
                                    <div id="CheckBoxSpot">
                                        <input tabindex="15" class="opt_check" type="checkbox" id="showYears"
                                            value="Year"><label for="showYears" class="mx-2">Year</label>
                                        <br>
                                        <input tabindex="16" class="opt_check" type="checkbox" id="showMonths"
                                            value="Month"><label for="showMonths" class="mx-2">Month</label>
                                        <br>
                                        <input tabindex="17" class="opt_check" type="checkbox" id="showWeeks"
                                            value="Week"><label for="showWeeks" class="mx-2">Week</label>
                                        <br>
                                        <input tabindex="18" class="opt_check" type="checkbox" id="showDays"
                                            value="Day" checked=""><label for="showDays" class="mx-2">Day</label>
                                    </div>
                                </div>

                                <div id="DurationTotalsSpotHolder">
                                    <div id="CheckBoxSpotTitle">
                                        <span class="DurationString">Duration Variations:</span>
                                    </div>
                                    <div id="DurationTotalsSpot">
                                        <div id="YearTable"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div id="firstDate text-center">
                            <div id="mdy1">
                                <div class="flex-b">
                                    <span id="DateHeader1"></span>
                                    <div id="Date1Inputs" class="row">
                                        <div class="mdyDiv">
                                            <span class="monthTitle">Month:</span><br>
                                            <input tabindex="1" type="number" max="12" min="1"
                                                class="u_Inp" id="Month1" value="<?php echo date('m', strtotime($previousDate)); ?>">
                                        </div>
                                        <div class="mdyDiv">
                                            Day:<br>
                                            <input tabindex="2" type="number" max="31" min="1"
                                                class="u_Inp" id="Day1" value="<?php echo date('d', strtotime($previousDate)); ?>">
                                        </div>
                                        <div class="mdyDiv">
                                            Year:<br>
                                            <input tabindex="3" type="number" max="9999" min="0"
                                                class="u_Inp" id="Year1" value="<?php echo $previousYear; ?>">
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <table id="lunationDate1" class="TopTable" style="display:none;">
                                        <thead>
                                            <tr>
                                                <th>Eclipse</th>
                                                <th>Lunation</th>
                                                <th>Zodiac Sign</th>
                                            </tr>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:NavEclipse(1, 1)"
                                                        class="eclipseNextPrev">Next</a><br><a
                                                        href="javascript:NavEclipse(2, 1)"
                                                        class="eclipseNextPrev">Last</a>
                                                </td>
                                                <td><span title="Brown Lunation Number" id="LunaSpot1">
                                                        <font>1246</font>
                                                    </span><br><span id="MoonSpot1"><img title="NewMoon" id="NewMoon1"
                                                            src="tools/date-calculator-advanced/img/NewMoon.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaxingCrescent" id="WaxingCrescent1"
                                                            src="tools/date-calculator-advanced/img/WaxingCrescent.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="FirstQuarter" id="FirstQuarter1"
                                                            src="tools/date-calculator-advanced/img/FirstQuarter.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaxingGibbous" id="WaxingGibbous1"
                                                            src="tools/date-calculator-advanced/img/WaxingGibbous.png"
                                                            style="height: 25px; width: 25px; display: inline-block;"><img
                                                            title="FullMoon" id="FullMoon1"
                                                            src="tools/date-calculator-advanced/img/FullMoon.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaningGibbous" id="WaningGibbous1"
                                                            src="tools/date-calculator-advanced/img/WaningGibbous.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="LastQuarter" id="LastQuarter1"
                                                            src="tools/date-calculator-advanced/img/LastQuarter.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaningCrescent" id="WaningCrescent1"
                                                            src="tools/date-calculator-advanced/img/WaningCrescent.png"
                                                            style="height: 25px; width: 25px; display: none;"></span><br><span
                                                        id="SarosSpot1" style="color:red;">&nbsp;</span>
                                                </td>
                                                <td class="SignCell" id="SignSpot1">
                                                    <font>
                                                        <div class="SignDropdown">
                                                            <button onclick="OpenSignDropdown(0)" class="SignButton">Libra
                                                            </button>
                                                            <div id="SignDropdown0" class="SignDropdown-content">
                                                                <span class="astrologyLabel">Symbol:</span>
                                                                <span class="astrologyInfo">Scales</span><br><span
                                                                    class="astrologyLabel">Element:</span>
                                                                <span class="astrologyInfo">Air</span><br><span
                                                                    class="astrologyLabel">Quality:</span>
                                                                <span class="astrologyInfo">Cardinal</span><br><span
                                                                    class="astrologyLabel">Ruler:</span>
                                                                <span class="astrologyInfo">Venus</span><br><span
                                                                    class="astrologyLabel">Exaltation:</span>
                                                                <span class="astrologyInfo">Saturn</span><br><span
                                                                    class="astrologyLabel">Detriment:</span>
                                                                <span class="astrologyInfo">Mars</span><br><span
                                                                    class="astrologyLabel">Fall:</span>
                                                                <span class="astrologyInfo">Sun</span><br>180°
                                                                - 210° (West)<br><span class="astrologyLabel">Body:</span>
                                                                <span class="astrologyInfo">Kidneys /
                                                                    Lumbar</span>
                                                            </div>
                                                        </div>
                                                    </font>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                                <div id="titleAddGridList1" style="display:none;">
                                    <div class="dateTitle">
                                        <span>Title:</span><br>
                                        <input tabindex="4" class="u_Inp" id="DateTitle1" maxlength="15"
                                            oninput="Confirm_Title(1)">
                                    </div>
                                    <div class="dateTitleLess">
                                        <button tabindex="6" id="AddDate1" class="AddToList" onclick="AddNewDate()"
                                            value="Add Date">Add to List
                                        </button>
                                    </div>
                                </div>
                                <div id="DateStr1Show" style="display: block;">
                                    <div id="printDateStr1">
                                        <span id="DateStr1"></span><span> = </span>
                                        <span id="DateNum1" style="color: white;"></span>
                                    </div>
                                    <div id="DateNums1"></div>
                                </div>
                            </div>
                        </div>
                        <div id="secondDate text-center">
                            <div id="mdy2">
                                <div class="flex-b">
                                    <span id="DateHeader2"></span>
                                    <div id="Date2Inputs" class="row">
                                        <div class="mdyDiv">
                                            <span class="monthTitle">Month:</span><br>
                                            <input tabindex="7" type="number" max="12" min="1"
                                                class="u_Inp" id="Month2" value="<?php echo $currentMonth; ?>">
                                        </div>
                                        <div class="mdyDiv">
                                            Day:<br>
                                            <input tabindex="8" type="number" max="31" min="1"
                                                class="u_Inp" id="Day2" value="<?php echo $currentDay; ?>">
                                        </div>
                                        <div class="mdyDiv">
                                            Year:<br>
                                            <input tabindex="9" type="number" max="9999" min="0"
                                                class="u_Inp" id="Year2" value="<?php echo $currentYear; ?>">
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <table id="lunationDate2" class="TopTable" style="display:none;">
                                        <thead>
                                            <tr>
                                                <th>Eclipse</th>
                                                <th>Lunation</th>
                                                <th>Zodiac Sign</th>
                                            </tr>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="javascript:NavEclipse(1, 2)"
                                                        class="eclipseNextPrev">Next</a><br><a
                                                        href="javascript:NavEclipse(2, 2)"
                                                        class="eclipseNextPrev">Last</a></td>
                                                <td><span title="Brown Lunation Number" id="LunaSpot2">
                                                        <font>1258</font>
                                                    </span><br><span id="MoonSpot2"><img title="NewMoon" id="NewMoon2"
                                                            src="tools/date-calculator-advanced/img/NewMoon.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaxingCrescent" id="WaxingCrescent2"
                                                            src="tools/date-calculator-advanced/img/WaxingCrescent.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="FirstQuarter" id="FirstQuarter2"
                                                            src="tools/date-calculator-advanced/img/FirstQuarter.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaxingGibbous" id="WaxingGibbous2"
                                                            src="tools/date-calculator-advanced/img/WaxingGibbous.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="FullMoon" id="FullMoon2"
                                                            src="tools/date-calculator-advanced/img/FullMoon.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaningGibbous" id="WaningGibbous2"
                                                            src="tools/date-calculator-advanced/img/WaningGibbous.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="LastQuarter" id="LastQuarter2"
                                                            src="tools/date-calculator-advanced/img/LastQuarter.png"
                                                            style="height: 25px; width: 25px; display: none;"><img
                                                            title="WaningCrescent" id="WaningCrescent2"
                                                            src="tools/date-calculator-advanced/img/WaningCrescent.png"
                                                            style="height: 25px; width: 25px; display: inline-block;"></span><br><span
                                                        id="SarosSpot2" style="color:red;">&nbsp;</span>
                                                </td>
                                                <td class="SignCell" id="SignSpot2">
                                                    <font>
                                                        <div class="SignDropdown">
                                                            <button onclick="OpenSignDropdown(1)" class="SignButton">Libra
                                                            </button>
                                                            <div id="SignDropdown1" class="SignDropdown-content">
                                                                <span class="astrologyLabel">Symbol:</span>
                                                                <span class="astrologyInfo">Scales</span><br><span
                                                                    class="astrologyLabel">Element:</span>
                                                                <span class="astrologyInfo">Air</span><br><span
                                                                    class="astrologyLabel">Quality:</span>
                                                                <span class="astrologyInfo">Cardinal</span><br><span
                                                                    class="astrologyLabel">Ruler:</span>
                                                                <span class="astrologyInfo">Venus</span><br><span
                                                                    class="astrologyLabel">Exaltation:</span>
                                                                <span class="astrologyInfo">Saturn</span><br><span
                                                                    class="astrologyLabel">Detriment:</span>
                                                                <span class="astrologyInfo">Mars</span><br><span
                                                                    class="astrologyLabel">Fall:</span>
                                                                <span class="astrologyInfo">Sun</span><br>180°
                                                                - 210° (West)<br><span class="astrologyLabel">Body:</span>
                                                                <span class="astrologyInfo">Kidneys /
                                                                    Lumbar</span>
                                                            </div>
                                                        </div>
                                                    </font>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                                <div id="titleAddGridList2" style="display:none;">
                                    <div class="dateTitle">
                                        <span>Title:</span><br>
                                        <input tabindex="10" class="u_Inp" id="DateTitle2" maxlength="15"
                                            oninput="Confirm_Title(2)">
                                    </div>
                                    <div class="dateTitleLess">
                                        <button tabindex="12" id="AddDate2" class="AddToList" onclick="AddNewDate(2)"
                                            value="Add Date">Add to
                                            List
                                        </button>
                                    </div>
                                </div>
                                <div id="DateStr2Show" style="display: block;">
                                    <div id="printDateStr2">
                                        <span id="DateStr2"></span><span> = </span>
                                        <span id="DateNum2" style="color: white;"></span>
                                    </div>
                                    <div id="DateNums2"></div>
                                </div>

                            </div>
                        </div>
                        <div class="planety_table">
                            @if ($astrology_report)
                                <div class="text-center mb-4">
                                    <h4>Planetary table</h4>
                                </div>
                                <div class="flow-chg">
                                    <div class="table_phases">
                                        <table class="table table-sm table-striped table-bordered planety-tables">
                                            <tbody>
                                                <tr>
                                                    <th colspan="2">
                                                        <img src="{{ asset('images/Moon.png') }}" alt="">
                                                        {{--                                                                        <br> --}}
                                                        Moon
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Phases (Synodic)</th>
                                                    <th>Orbits (Sidereal)</th>
                                                </tr>
                                                <tr>
                                                    <td id="phases_moon">
                                                        {{--                                                                            <b style="color: yellow;">12</b>m, --}}
                                                        {{--                                                                            <b style="color: yellow;">11</b>d --}}
                                                    </td>
                                                    <td id="orbits_moon">
                                                        {{--                                                                            <b style="color: yellow;">13</b>m, --}}
                                                        {{--                                                                            <b style="color: yellow;">10</b>d --}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table class="table table-sm table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>

                                                </th>
                                                <th>
                                                    <img src="{{ asset('images/Mercury.png') }}" alt="">
                                                    <br>
                                                    Mercury
                                                </th>
                                                <th>
                                                    <img src="{{ asset('images/Venus.png') }}" alt="">
                                                    <br>
                                                    Venus
                                                </th>
                                                <th>
                                                    <img src="{{ asset('images/Earth.png') }}" alt="">
                                                    <br>
                                                    Earth
                                                </th>
                                                <th>
                                                    <img src="{{ asset('images/Mars.png') }}" alt="">
                                                    <br>
                                                    Mars
                                                </th>
                                                <th>
                                                    <img src="{{ asset('images/Jupiter.png') }}" alt="">
                                                    <br>
                                                    Jupiter
                                                </th>
                                                <th>
                                                    <img src="{{ asset('images/Saturn.png') }}" alt="">
                                                    <br>
                                                    Saturn
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Orbits</td>
                                                <td id="orbits_mercury">
                                                    {{--                                                                        <b style="color: yellow;">4</b>y, --}}
                                                    {{--                                                                        <b style="color: yellow;">14</b>d --}}
                                                </td>
                                                <td id="orbits_venus">
                                                    {{--                                                                        <b style="color: yellow;">1</b>y, --}}
                                                    {{--                                                                        <b style="color: yellow;">141</b>d --}}
                                                </td>
                                                <td id="orbits_earth">
                                                    {{--                                                                        <b style="color: lightblue;">1</b>y, --}}
                                                    {{--                                                                        <b style="color: lightblue;">0</b>d --}}
                                                </td>
                                                <td id="orbits_mars">
                                                    {{--                                                                        <b style="color: yellow;">320</b>d left --}}
                                                </td>
                                                <td id="orbits_jupiter">
                                                    {{--                                                                        <b style="color: yellow;">3966</b>d left --}}
                                                </td>
                                                <td id="orbits_saturn">
                                                    {{--                                                                        <b style="color: yellow;">10393</b>d left --}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Planet days</td>
                                                <td id="planet_days_mercury">
                                                    {{--                                                                        <b style="color: yellow;">2</b> --}}
                                                </td>
                                                <td id="planet_days_venus">
                                                    {{--                                                                        <b style="color: yellow;">3</b> --}}
                                                </td>
                                                <td id="planet_days_earth">
                                                    {{--                                                                        <b style="color: lightblue;">366</b> --}}
                                                </td>
                                                <td id="planet_days_mars">
                                                    {{--                                                                        <b style="color: yellow;">356</b> --}}
                                                </td>
                                                <td id="planet_days_jupiter">
                                                    {{--                                                                        <b style="color: yellow;">884</b> --}}
                                                </td>
                                                <td id="planet_days_saturn">
                                                    {{--                                                                        <b style="color: yellow;">833</b> --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- END Main -->
    </div>
@endsection

@section('js')
    <script>
        trackTimeSpent('date_calculator', "{{ route('log.time.spent') }}", "{{ csrf_token() }}");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/date-calculator.js') }}"></script>

    @if ($astrology_report)
        <script>
            $('#Month1, #Day1, #Year1, #Month2, #Day2, #Year2').on('keyup change', function() {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
                if ($(this).val() == '') {
                    $(this).val(0);
                    return false;
                }

                let Month1 = $('#Month1').val();
                let Day1 = $('#Day1').val();
                let Year1 = $('#Year1').val();
                let Month2 = $('#Month2').val();
                let Day2 = $('#Day2').val();
                let Year2 = $('#Year2').val();

                if (
                    Month1 == '' ||
                    Day1 == '' ||
                    Year1 == '' ||
                    Month2 == '' ||
                    Day2 == '' ||
                    Year2 == ''
                ) {
                    return false;
                }

                let planet_colors = {
                    mercury: 'yellow',
                    venus: 'yellow',
                    earth: 'lightblue',
                    mars: 'yellow',
                    jupiter: 'yellow',
                    saturn: 'yellow',
                };

                let date1 = new Date(Year1, Month1 - 1, Day1);
                let date2 = new Date(Year2, Month2 - 1, Day2);
                let diffInTime = date2.getTime() - date1.getTime();
                let diffInDays = Math.ceil(diffInTime / (1000 * 3600 * 24));
                let orbitalPeriods = {
                    mercury: 88,
                    venus: 225,
                    earth: 365.25, // Accounting for leap years
                    mars: 687,
                    jupiter: 4333,
                    saturn: 10759
                };
                let dayLengths = {
                    mercury: 182.65, // Adjusted value for Mercury
                    venus: 117.84, // Adjusted value for Venus
                    earth: 1, // Earth day
                    mars: 1.03, // Mars day (accurate)
                    jupiter: 0.4137, // Adjusted value for Jupiter
                    saturn: 0.439 // Adjusted value for Saturn
                };

                for (let planet in orbitalPeriods) {
                    let totalOrbits = Math.floor(diffInDays / orbitalPeriods[planet]);
                    let remainingDays = diffInDays % orbitalPeriods[planet];

                    // orbits_jupiter
                    // planet_days_jupiter
                    if (totalOrbits > 0) {
                        // output.orbits[planet] = `${totalOrbits}y, ${remainingDays}d`;
                        $('#orbits_' + planet).html(`<b style="color: ` + planet_colors[planet] + `;">` + parseInt(
                                totalOrbits) + `</b>y,
                                        <b style="color: ` + planet_colors[planet] + `;">` + parseInt(remainingDays) +
                            `</b>d`);
                    } else {
                        let daysLeft = orbitalPeriods[planet] - remainingDays;
                        // output.orbits[planet] = `${daysLeft}d left`; // Display days left until completing the first orbit
                        $('#orbits_' + planet).html(`<b style="color: ` + planet_colors[planet] + `;">` + parseInt(
                            daysLeft) + `</b>d left`)
                    }

                    let planetDays = Math.floor(diffInDays / dayLengths[planet]);
                    // output.planet_days[planet] = remainingDays; // Example for calculating "planet days"
                    $('#planet_days_' + planet).html(`<b style="color: ` + planet_colors[planet] + `;">` + parseInt(
                        planetDays) + `</b>`);
                }


                const synodicMonth = 29.53;
                const siderealMonth = 27.32;
                let synodicCycles = diffInDays / synodicMonth;
                let siderealCycles = diffInDays / siderealMonth;
                let synodicMonths = Math.floor(synodicCycles);
                let synodicRemainingDays = Math.round((synodicCycles - synodicMonths) * synodicMonth);
                let siderealMonths = Math.floor(siderealCycles);
                let siderealRemainingDays = Math.round((siderealCycles - siderealMonths) * siderealMonth);
                if (synodicRemainingDays >= synodicMonth) {
                    synodicMonths++;
                    synodicRemainingDays -= synodicMonth;
                }
                if (siderealRemainingDays >= siderealMonth) {
                    siderealMonths++;
                    siderealRemainingDays -= siderealMonth;
                }

                $('#phases_moon').html(`<b style="color: yellow;">` + synodicMonths + `</b>m,
                                        <b style="color: yellow;">` + synodicRemainingDays + `</b>d`);
                $('#orbits_moon').html(`<b style="color: yellow;">` + siderealMonths + `</b>m,
                                        <b style="color: yellow;">` + siderealRemainingDays + `</b>d`);
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#Month1').trigger('change');
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#Month1, #Month2').on("input", function(e) {
                    let value = $(this).val();

                    // Restrict to numbers 1-12
                    if (value < 1) {
                        $(this).val(1);
                    } else if (value > 12) {
                        $(this).val(12);
                    }
                });

                $('#Day1, #Day2').on("input", function(e) {
                    let value = $(this).val();

                    // Restrict to numbers 1-12
                    if (value < 1) {
                        $(this).val(1);
                    } else if (value > 31) {
                        $(this).val(31);
                    }
                });

                $('#Year1, #Year2').on("input", function(e) {
                    let value = $(this).val();

                    // Restrict to numbers 1-12
                    if (value < 1) {
                        $(this).val(1);
                    } else if (value > 9999) {
                        $(this).val(9999);
                    }
                });

                $('#Month1, #Month2, #Day1, #Day2').on("keydown", function(e) {
                    // Prevent Ctrl+V (paste)
                    if (e.ctrlKey && e.key === 'v') {
                        e.preventDefault();
                    }

                    // Allow backspace, delete, tab, escape, enter and arrow keys
                    if ($.inArray(e.key, ['Backspace', 'Delete', 'Tab', 'Escape', 'Enter', 'ArrowLeft',
                            'ArrowRight', 'ArrowUp', 'ArrowDown'
                        ]) !== -1 ||
                        // Allow Ctrl+A, Ctrl+C, Ctrl+X
                        (e.ctrlKey && $.inArray(e.key, ['a', 'c', 'x']) !== -1) ||
                        // Allow numbers only
                        (e.key >= '1' && e.key <= '9') || (e.key === '0')) {
                        return;
                    }

                    // Prevent other keys
                    e.preventDefault();
                });
            });
        </script>
    @endif

    <script>
        // Greek alphabet mapping for Isopsephy values
        const greekAlphabet = {
            'Α': 1,
            'Β': 2,
            'Γ': 3,
            'Δ': 4,
            'Ε': 5,
            'Ϝ': 6,
            'Ζ': 7,
            'Η': 8,
            'Θ': 9,
            'Ι': 10,
            'Κ': 20,
            'Λ': 30,
            'Μ': 40,
            'Ν': 50,
            'Ξ': 60,
            'Ο': 70,
            'Π': 80,
            'Ϙ': 90,
            'Ρ': 100,
            'Σ': 200,
            'Τ': 300,
            'Υ': 400,
            'Φ': 500,
            'Χ': 600,
            'Ψ': 700,
            'Ω': 800,
            'ϡ': 900
        };

        // Greek alphabet mapping for Ordinal values (A=1 to Ω=24)
        const greekOrdinalAlphabet = {
            'Α': 1,
            'Β': 2,
            'Γ': 3,
            'Δ': 4,
            'Ε': 5,
            'Ϝ': 6,
            'Ζ': 7,
            'Η': 8,
            'Θ': 9,
            'Ι': 10,
            'Κ': 11,
            'Λ': 12,
            'Μ': 13,
            'Ν': 14,
            'Ξ': 15,
            'Ο': 16,
            'Π': 17,
            'Ϙ': 18,
            'Ρ': 19,
            'Σ': 20,
            'Τ': 21,
            'Υ': 22,
            'Φ': 23,
            'Χ': 24,
            'Ψ': 25,
            'Ω': 26,
            'ϡ': 27
        };

        // Function to calculate Greek Isopsephy value
        function calculateGreekIsopsephy(input) {
            return [...input].reduce((sum, char) => sum + (greekAlphabet[char] || 0), 0);
        }

        // Function to calculate Greek Ordinal value
        function calculateGreekOrdinal(input) {
            return [...input].reduce((sum, char) => sum + (greekOrdinalAlphabet[char] || 0), 0);
        }

        // Function to calculate Greek Reduction value
        function calculateGreekReduction(input) {
            return [...input].reduce((sum, char) => {
                let value = greekOrdinalAlphabet[char] || 0;
                return sum + (value ? (value > 9 ? value % 9 || 9 : value) : 0);
            }, 0);
        }

        // Main function to calculate all values
        function calculateGreekGematria(word) {
            const isopsephy = calculateGreekIsopsephy(word);
            const ordinal = calculateGreekOrdinal(word);
            const reduction = calculateGreekReduction(word);

            return {
                isopsephy: isopsephy,
                ordinal: ordinal,
                reduction: reduction
            };
        }

        function get_divisors(num) {
            let divisors = [];

            for (let i = 1; i <= num; i++) {
                if (num % i === 0) {
                    divisors.push(i);
                }
            }

            return divisors;
        }

        function isPrime(num) {
            if (num < 2) return false;
            for (let i = 2; i <= Math.sqrt(num); i++) {
                if (num % i === 0) {
                    return false;
                }
            }
            return true;
        }

        function getNumberSuffix(n) {
            let lastDigit = n % 10;
            let lastTwoDigits = n % 100;

            if (lastTwoDigits >= 11 && lastTwoDigits <= 13) {
                return `${n}th`;
            }

            switch (lastDigit) {
                case 1:
                    return `${n}st`;
                case 2:
                    return `${n}nd`;
                case 3:
                    return `${n}rd`;
                default:
                    return `${n}th`;
            }
        }

        function getCompositePosition(num) {
            let count = 0; // Counter for composite numbers
            let current = 4; // Start from 4 because 4 is the first composite number

            while (current <= num) {
                if (!isPrime(current)) {
                    count++; // Increment the composite count
                }
                current++;
            }

            if (isPrime(num)) {
                return '';
            }

            return `${getNumberSuffix(count)} composite.`;
        }

        function nthPrime(n) {
            let count = 0; // Count of prime numbers found
            let num = 1; // Starting number to check for primes

            while (count < n) {
                num++;
                if (isPrime(num)) {
                    count++;
                }
            }

            return num; // The n-th prime number
        }

        function isComposite(num) {
            if (num <= 1) return false; // 0 and 1 are not composite numbers
            let isPrime = true;

            for (let i = 2; i <= Math.sqrt(num); i++) {
                if (num % i === 0) {
                    isPrime = false; // It is not a prime number
                    break;
                }
            }

            return !isPrime; // Return true if it's composite (not prime)
        }

        function nthComposite(n) {
            let count = 0; // Count of composite numbers found
            let num = 1; // Starting number to check for composites

            while (count < n) {
                num++;
                if (isComposite(num)) {
                    count++;
                }
            }

            return num; // The n-th composite number
        }

        function fibonacci(n) {
            if (n <= 0) return 0; // Return 0 for n = 0
            if (n === 1) return 1; // Return 1 for n = 1

            let a = 0; // First Fibonacci number
            let b = 1; // Second Fibonacci number
            let fib = 1; // Variable to store the current Fibonacci number

            for (let i = 2; i <= n; i++) {
                fib = a + b; // Calculate the next Fibonacci number
                a = b; // Move to the next pair
                b = fib;
            }

            return fib; // Return the n-th Fibonacci number
        }

        function triangular(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (n + 1)) / 2; // Calculate the n-th triangular number
        }

        function tetrahedral(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (n + 1) * (n + 2)) / 6; // Calculate the n-th tetrahedral number
        }

        function squarePyramidal(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (n + 1) * (2 * n + 1)) / 6; // Calculate the n-th square pyramidal number
        }

        function starNumber(n) {
            if (n <= 0) return 1; // Return 1 for n = 0 or negative, as the 0th star number is 1

            return 6 * n * (n - 1) + 1; // Calculate the n-th star number
        }

        function pentagonal(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (3 * n - 1)) / 2; // Calculate the n-th pentagonal number
        }

        function convertNumeralSystems(n) {
            // Ensure the input is a number
            if (typeof n !== 'number' || n < 0) {
                throw new Error('Input must be a non-negative number.');
            }

            // Conversions
            const conversions = {
                octal: n.toString(8), // Octal
                duodecimal: n.toString(12), // Duodecimal
                hexadecimal: n.toString(16), // Hexadecimal
                binary: n.toString(2) // Binary
            };

            return conversions;
        }

        function number_properties(number) {
            if (number == '') {
                return false;
            }

            number = parseInt(number);

            if (number == 0) {
                $('#center_number_properties').prop('hidden', true);
                return false;
            }

            let divisors = get_divisors(number);

            let return_body = {
                divisors: divisors,
                count: divisors.length,
                sum: divisors.reduce((acc, current) => acc + current, 0),
                composite: getCompositePosition(number),
                nth_prime: nthPrime(number),
                nth_composite: nthComposite(number),
                nth_fibonacci: fibonacci(number),
                nth_triangular: triangular(number),
                square: number * number,
                cube: number * number * number,
                nth_tetrahedral: tetrahedral(number),
                nth_sq_pyramidal: squarePyramidal(number),
                nth_star: starNumber(number),
                nth_pentagonal: pentagonal(number),
                conversions: convertNumeralSystems(number),
            };

            $('#TopNumber').text(number);
            $('#count').text(return_body.count);
            $('#nth_prime').text(return_body.nth_prime);
            $('#nth_composite').text(return_body.nth_composite);
            $('#nth_fibonacci').text(return_body.nth_fibonacci);
            $('#nth_triangular').text(return_body.nth_triangular);
            $('#square').text(return_body.square);
            $('#cube').text(return_body.cube);
            $('#nth_tetrahedral').text(return_body.nth_tetrahedral);
            $('#nth_sq_pyramidal').text(return_body.nth_sq_pyramidal);
            $('#nth_star').text(return_body.nth_star);
            $('#nth_pentagonal').text(return_body.nth_pentagonal);

            let string = '';
            let count = 0;
            for (const item of return_body.divisors) {
                count += 1;
                string += '<b class="Linkable"><a href="javascript:void(0);" class="target_number">' + item + '</a></b>' + (
                    count === return_body.divisors.length ? '' : ',&nbsp;');
            }
            if (return_body.composite != '') {
                string += '<br>';
                string += '<b class="Linkable">' + return_body.composite + '</b>';
            }
            $('#divisors_list').html(string);

            $('#sum').text(return_body.sum);
            $('#number_with_suffix').text(getNumberSuffix(number));
            $('#octal').text(return_body.conversions.octal);
            $('#duodecimal').text(return_body.conversions.duodecimal);
            $('#hexadecimal').text(return_body.conversions.hexadecimal);
            $('#binary').text(return_body.conversions.binary);

            $('#center_number_properties').prop('hidden', false);
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#EntryField').on('keyup', function() {
                let val = $(this).val();

                if (val == "") {
                    $('#isopsephy').text('0');
                    $('#ordinal').text('0');
                    $('#reduction').text('0');
                }

                let data = calculateGreekGematria(val);

                $('#isopsephy').text(data.isopsephy);
                $('#ordinal').text(data.ordinal);
                $('#reduction').text(data.reduction);

                return true;
            });

            $('#isopsephy').on('click', function() {
                number_properties($(this).text());
            });
            $('#ordinal').on('click', function() {
                number_properties($(this).text());
            });
            $('#reduction').on('click', function() {
                number_properties($(this).text());
            });

            $('#btn_get_properties').on('click', function() {
                let val = $('#input_get_properties').val();

                if (val < 1 || val == '') {
                    return false;
                }

                number_properties(val);
            });

            $('body').on('click', '.target_number', function() {
                let text = $(this).text();
                let numericText = text.replace(/\D/g, '');
                if (numericText === '') {
                    console.log('No numeric value found');
                    alert('No numeric value found');
                    return;
                }
                number_properties(numericText);
            });
        });
    </script>
@endsection
