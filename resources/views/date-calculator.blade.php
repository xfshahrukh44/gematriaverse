@extends('layouts.app')

@section('title', 'Date calculator')

@section('css')
    <style>
        #DurationDetailsInner {
            padding: 16px;
            font-size: 13px;
        }
    </style>
@endsection

@section('content')
    <div class="main-content-area full-width-template">

        <div class="page-content clearfix py">
            <div class="wpb-content-wrapper">
                <div id="wbc-66f74052c36b9" class="vc_row wpb_row  full-width-section"
                     style="padding-top: 10px;padding-bottom: 30px;">
                    <div class="wpb_column vc_column_container vc_col-sm-12 text-center">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="current-user">Username: <span class="user-name">Mersdecodes</span><br>User
                                    ID:
                                    <span class="user-id">9727</span><br>Membership level: <span
                                            class="membership-level">Enthusiast</span></div>
                                <div class="tool-wrapper">
                                    {{-- <script src="js/datecalcadv.js"></script>
                                    <script src="js/basic/datecalcbuilders.js"></script>
                                    <script src="js/planets-1.js"></script>
                                    <script src="js/planets-2.js"></script>
                                    <script src="js/ss.js"></script> --}}
                                    <script>
                                        var maxDates = 100;
                                        var subLevel = 4
                                    </script>
                                    {{-- <script src="js/datenumerology.js"></script>
                                    <script src="js/eclipses.js"></script>
                                    <script src="js/datematches.js"></script>
                                    <script src="js/load.js"></script>
                                    <script src="js/html2canvas.min.js"></script>
                                    <script src="js/jquery.min.js"></script> --}}

                                    {{-- <link rel="stylesheet" type="text/css"
                                          href="css/datecalcadv.css"> --}}
                                    @php
                                        $currentDate = date("Y-m-d");
                                        $currentYear = date("Y");
                                        $currentMonth = date("m");
                                        $currentDay = date("d");

                                        $previousYear = $currentYear - 1;
                                        $previousDate = date("Y-m-d", strtotime("-1 year"));
                                    @endphp
                                    <div id="containerDateAdv">
                                        <div id="dateRows">
                                            <div id="firstDate">
                                                <div id="mdy1">
                                                <span class="topIcons"
                                                      title="Click to view Lunar/Zodiac info for selected dates"
                                                      onclick="javascript:toggleLunation()">
{{--                                                    <i class="far fa-moon"></i>--}}
                                                    </span>&nbsp;&nbsp;<span
                                                            id="DateHeader1"></span>&nbsp;&nbsp;<span
                                                            title="Click to name this date and store it on the left sidebar."
                                                            class="topIcons" onclick="javascript:toggleGridListTitle()">
{{--                                                        <i class="far fa-address-book"></i>--}}
                                                    </span>
                                                    <div id="Date1Inputs" class="row">
                                                        <div class="mdyDiv">
                                                            <span class="monthTitle">Month:</span><br>
                                                            <input tabindex="1" type="number" max="12" min="1"
                                                                   class="u_Inp" id="Month1"
                                                                   value="<?php echo date('m', strtotime($previousDate)); ?>">
                                                        </div>
                                                        <div class="mdyDiv">
                                                            Day:<br>
                                                            <input tabindex="2" type="number" max="31" min="1"
                                                                   class="u_Inp" id="Day1"
                                                                   value="<?php echo date('d', strtotime($previousDate)); ?>">
                                                        </div>
                                                        <div class="mdyDiv">
                                                            Year:<br>
                                                            <input tabindex="3" type="number" max="9999" min="0"
                                                                   class="u_Inp" id="Year1"
                                                                   value="<?php echo $previousYear; ?>">
                                                        </div>
                                                    </div>
                                                    <center>
                                                        <table id="lunationDate1" class="TopTable"
                                                               style="display:none;">
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
                                                                            class="eclipseNextPrev">Last</a></td>
                                                                <td><span title="Brown Lunation Number" id="LunaSpot1">
                                                                        <font>1246</font>
                                                                    </span><br><span id="MoonSpot1"><img title="NewMoon"
                                                                                                         id="NewMoon1"
                                                                                                         src="tools/date-calculator-advanced/img/NewMoon.png"
                                                                                                         style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaxingCrescent"
                                                                                id="WaxingCrescent1"
                                                                                src="tools/date-calculator-advanced/img/WaxingCrescent.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="FirstQuarter" id="FirstQuarter1"
                                                                                src="tools/date-calculator-advanced/img/FirstQuarter.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaxingGibbous"
                                                                                id="WaxingGibbous1"
                                                                                src="tools/date-calculator-advanced/img/WaxingGibbous.png"
                                                                                style="height: 25px; width: 25px; display: inline-block;"><img
                                                                                title="FullMoon" id="FullMoon1"
                                                                                src="tools/date-calculator-advanced/img/FullMoon.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaningGibbous"
                                                                                id="WaningGibbous1"
                                                                                src="tools/date-calculator-advanced/img/WaningGibbous.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="LastQuarter" id="LastQuarter1"
                                                                                src="tools/date-calculator-advanced/img/LastQuarter.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaningCrescent"
                                                                                id="WaningCrescent1"
                                                                                src="tools/date-calculator-advanced/img/WaningCrescent.png"
                                                                                style="height: 25px; width: 25px; display: none;"></span><br><span
                                                                            id="SarosSpot1"
                                                                            style="color:red;">&nbsp;</span>
                                                                </td>
                                                                <td class="SignCell" id="SignSpot1">
                                                                    <font>
                                                                        <div class="SignDropdown">
                                                                            <button
                                                                                    onclick="OpenSignDropdown(0)"
                                                                                    class="SignButton">Libra
                                                                            </button>
                                                                            <div id="SignDropdown0"
                                                                                 class="SignDropdown-content"><span
                                                                                        class="astrologyLabel">Symbol:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Scales</span><br><span
                                                                                        class="astrologyLabel">Element:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Air</span><br><span
                                                                                        class="astrologyLabel">Quality:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Cardinal</span><br><span
                                                                                        class="astrologyLabel">Ruler:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Venus</span><br><span
                                                                                        class="astrologyLabel">Exaltation:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Saturn</span><br><span
                                                                                        class="astrologyLabel">Detriment:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Mars</span><br><span
                                                                                        class="astrologyLabel">Fall:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Sun</span><br>180°
                                                                                - 210° (West)<br><span
                                                                                        class="astrologyLabel">Body:</span>
                                                                                <span class="astrologyInfo">Kidneys /
                                                                                    Lumbar</span></div>
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
                                                            <input tabindex="4" class="u_Inp" id="DateTitle1"
                                                                   maxlength="15"
                                                                   oninput="Confirm_Title(1)">
                                                        </div>
                                                        <div class="dateTitleLess">
                                                            <button tabindex="6" id="AddDate1" class="AddToList"
                                                                    onclick="AddNewDate()" value="Add Date">Add to List
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{-- <div id="DateStr1Show" style="display: block;">
                                                        <div id="printDateStr1">
                                                            <span id="DateStr1">(9) + (28) + (20) + (23)</span><span> =
                                                        </span><span id="DateNum1" style="color: white;"><a
                                                                        href="javascript:Open_NumberProperties(80)">80</a></span>
                                                        </div>
                                                        <div id="DateNums1">
                                                            <div><span class="dateNumSpan">
                                                                <font color="#1862cf">80</font>
                                                            </span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="white">44</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="white">26</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="white">60</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="white">24</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="yellow">271</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="yellow">94</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="lightblue">1728</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:void(0)">
                                                                    <font color="lightblue">864</font>
                                                                </a></span></div>
                                                        </div>
                                                    </div> --}}
                                                    <div id="DateStr1Show" style="display: block;">
                                                        <div id="printDateStr1">
                                                            <span id="DateStr1"></span><span> = </span>
                                                            <span id="DateNum1" style="color: white;"></span>
                                                        </div>
                                                        <div id="DateNums1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="secondDate">
                                                <div id="mdy2">
                                                    <span id="DateHeader2"></span>
                                                    <div id="Date2Inputs" class="row">
                                                        <div class="mdyDiv">
                                                            <span class="monthTitle">Month:</span><br>
                                                            <input tabindex="7" type="number" max="12" min="1"
                                                                   class="u_Inp" id="Month2"
                                                                   value="<?php echo $currentMonth; ?>">
                                                        </div>
                                                        <div class="mdyDiv">
                                                            Day:<br>
                                                            <input tabindex="8" type="number" max="31" min="1"
                                                                   class="u_Inp" id="Day2"
                                                                   value="<?php echo $currentDay; ?>">
                                                        </div>
                                                        <div class="mdyDiv">
                                                            Year:<br>
                                                            <input tabindex="9" type="number" max="9999" min="0"
                                                                   class="u_Inp" id="Year2"
                                                                   value="<?php echo $currentYear; ?>">
                                                        </div>
                                                    </div>
                                                    <center>
                                                        <table id="lunationDate2" class="TopTable"
                                                               style="display:none;">
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
                                                                    </span><br><span id="MoonSpot2"><img title="NewMoon"
                                                                                                         id="NewMoon2"
                                                                                                         src="tools/date-calculator-advanced/img/NewMoon.png"
                                                                                                         style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaxingCrescent"
                                                                                id="WaxingCrescent2"
                                                                                src="tools/date-calculator-advanced/img/WaxingCrescent.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="FirstQuarter" id="FirstQuarter2"
                                                                                src="tools/date-calculator-advanced/img/FirstQuarter.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaxingGibbous"
                                                                                id="WaxingGibbous2"
                                                                                src="tools/date-calculator-advanced/img/WaxingGibbous.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="FullMoon" id="FullMoon2"
                                                                                src="tools/date-calculator-advanced/img/FullMoon.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaningGibbous"
                                                                                id="WaningGibbous2"
                                                                                src="tools/date-calculator-advanced/img/WaningGibbous.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="LastQuarter" id="LastQuarter2"
                                                                                src="tools/date-calculator-advanced/img/LastQuarter.png"
                                                                                style="height: 25px; width: 25px; display: none;"><img
                                                                                title="WaningCrescent"
                                                                                id="WaningCrescent2"
                                                                                src="tools/date-calculator-advanced/img/WaningCrescent.png"
                                                                                style="height: 25px; width: 25px; display: inline-block;"></span><br><span
                                                                            id="SarosSpot2"
                                                                            style="color:red;">&nbsp;</span>
                                                                </td>
                                                                <td class="SignCell" id="SignSpot2">
                                                                    <font>
                                                                        <div class="SignDropdown">
                                                                            <button
                                                                                    onclick="OpenSignDropdown(1)"
                                                                                    class="SignButton">Libra
                                                                            </button>
                                                                            <div id="SignDropdown1"
                                                                                 class="SignDropdown-content"><span
                                                                                        class="astrologyLabel">Symbol:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Scales</span><br><span
                                                                                        class="astrologyLabel">Element:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Air</span><br><span
                                                                                        class="astrologyLabel">Quality:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Cardinal</span><br><span
                                                                                        class="astrologyLabel">Ruler:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Venus</span><br><span
                                                                                        class="astrologyLabel">Exaltation:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Saturn</span><br><span
                                                                                        class="astrologyLabel">Detriment:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Mars</span><br><span
                                                                                        class="astrologyLabel">Fall:</span>
                                                                                <span
                                                                                        class="astrologyInfo">Sun</span><br>180°
                                                                                - 210° (West)<br><span
                                                                                        class="astrologyLabel">Body:</span>
                                                                                <span class="astrologyInfo">Kidneys /
                                                                                    Lumbar</span></div>
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
                                                            <input tabindex="10" class="u_Inp" id="DateTitle2"
                                                                   maxlength="15" oninput="Confirm_Title(2)">
                                                        </div>
                                                        <div class="dateTitleLess">
                                                            <button tabindex="12" id="AddDate2" class="AddToList"
                                                                    onclick="AddNewDate(2)" value="Add Date">Add to
                                                                List
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!--<div class="row"></div>-->
                                                    {{-- <div id="DateStr2Show" style="display: block;">
                                                        <div id="printDateStr2">
                                                            <span id="DateStr2">(9) + (28) + (20) + (24)</span><span> =
                                                        </span><span id="DateNum2" style="color: white;"><a
                                                                        href="javascript:Open_NumberProperties(81)">81</a></span>
                                                        </div>
                                                        <div id="DateNums2">
                                                            <div><span class="dateNumSpan">
                                                                <font color="#1862cf">81</font>
                                                            </span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 1)">
                                                                    <font color="white">45</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 2)">
                                                                    <font color="white">27</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 3)">
                                                                    <font color="white">61</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 4)">
                                                                    <font color="white">25</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 5)">
                                                                    <font color="orange">272</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 6)">
                                                                    <font color="yellow">94</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 11)">
                                                                    <font color="lightblue">2304</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                            href="javascript:Change_DateNum(1, 12)">
                                                                    <font color="lightblue">1152</font>
                                                                </a></span></div>
                                                        </div>
                                                    </div> --}}
                                                    <div id="DateStr2Show" style="display: block;">
                                                        <div id="printDateStr2">
                                                            <span id="DateStr2"></span><span> = </span>
                                                            <span id="DateNum2" style="color: white;"></span>
                                                        </div>
                                                        <div id="DateNums2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 	<div class="row">
            <div id="AddSubLink" class="DropLink"><a href="javascript:DropCells()">(+/-)</a></div>
        </div> -->
                                        <div id="AddSubSection">
                                            <div id="AddSubBlock">
                                                <div id="AddSubTextBlock">
                                                <span
                                                        class="mo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    <input type="radio" value="AddBox" id="AddChoice"
                                                           onclick="ClickAddSub(true)" name="AddSub" checked=""><span>&nbsp;
                                                    Add</span>
                                                    <span class="mo">&nbsp;&nbsp;</span>
                                                    <br class="nomo">
                                                    <input type="radio" value="SubtractBox" id="SubtractChoice"
                                                           onclick="ClickAddSub(false)" name="AddSub"><span>&nbsp;
                                                    Subtract</span>
                                                </div>
                                                <!-- <div id="AddSubYMWD"> -->
                                                <br class="mo-only">
                                                <div class="mdyDiv">Years:<br><input type="number" max="2020" min="0"
                                                                                     class="u_Inp" id="YearAdd"
                                                                                     value="0" oninput="SetDatesAlt()">
                                                </div>
                                                <div class="mdyDiv">Months:<br><input type="number" max="24000" min="0"
                                                                                      class="u_Inp" id="MonthAdd"
                                                                                      value="0" oninput="SetDatesAlt()">
                                                </div>
                                                <div class="mdyDiv">Weeks:<br><input type="number" max="100000" min="0"
                                                                                     class="u_Inp" id="WeekAdd"
                                                                                     value="0" oninput="SetDatesAlt()">
                                                </div>
                                                <div class="mdyDiv">Days:<br><input type="number" max="700000" min="0"
                                                                                    class="u_Inp" id="DayAdd" value="0"
                                                                                    oninput="SetDatesAlt()"></div>
                                                <!-- </div> -->
                                            </div>
                                        </div>
                                        <div id="NumerologySection"></div>

                                        <!----END OF THE TOP SECTION---->
                                        <div id="TimeBetweenRow">
                                            <div id="TimeBetweenDates">
                                                <div class="DurHead">Time Between Dates:</div>
                                                <!-- <br class="mo"> -->
                                                <div id="TimeBetweenCheckbox">
                                                    <input tabindex="14" class="opt_check" type="checkbox"
                                                           id="Check_End"
                                                           value="End"><span>&nbsp;Include End
                                                    Date?&nbsp;&nbsp;</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="DurationRow" class="row">
                                            <div id="CheckBoxSection">
                                                <div id="CheckBoxSpotTitle">
                                                    <span class="DurationString">Select Durations to View:</span>
                                                </div>
                                                <div id="CheckBoxSpot">
                                                    <input tabindex="15" class="opt_check" type="checkbox"
                                                           id="showYears"
                                                           value="Year"
                                                    ><span>&nbsp;Year&nbsp;&nbsp;</span><br>
                                                    <input tabindex="16" class="opt_check" type="checkbox"
                                                           id="showMonths"
                                                           value="Month"
                                                    ><span>&nbsp;Month&nbsp;&nbsp;</span><br>
                                                    <input tabindex="17" class="opt_check" type="checkbox"
                                                           id="showWeeks"
                                                           value="Week"
                                                    ><span>&nbsp;Week&nbsp;&nbsp;</span><br>
                                                    <input tabindex="18" class="opt_check" type="checkbox" id="showDays"
                                                           value="Day"
                                                           checked=""><span>&nbsp;Day&nbsp;&nbsp;</span>
                                                </div>
                                            </div>
                                            <div id="DurationContainer">
                                                <div id="DurationSection">
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
                                                         src="/tools/date-calculator-advanced/img/gem-guy-flip.png"
                                                         width="36px">
                                                </div>
                                            </div>
                                            <div id="DurationTotalsSpotHolder">
                                                <span class="DurationString">Duration Variations:</span>
                                                <div id="DurationTotalsSpot">
                                                    <div id="YearTable"></div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($planetary_table)
                                            <div class="row py-5">
                                                <div class="col-md-4 offset-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12 text-center">
                                                            <h4>Planetary table</h4>
                                                        </div>

                                                        <div class="col-md-4 offset-md-4">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <tbody>
                                                                    <tr>
                                                                        <th colspan="2">
                                                                            <img src="{{asset('images/Moon.png')}}" alt="">
    {{--                                                                        <br>--}}
                                                                            Moon
                                                                        </th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Phases (Synodic)</th>
                                                                        <th>Orbits (Sidereal)</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td id="phases_moon">
{{--                                                                            <b style="color: yellow;">12</b>m,--}}
{{--                                                                            <b style="color: yellow;">11</b>d--}}
                                                                        </td>
                                                                        <td id="orbits_moon">
{{--                                                                            <b style="color: yellow;">13</b>m,--}}
{{--                                                                            <b style="color: yellow;">10</b>d--}}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <table class="table table-sm table-striped table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>

                                                                        </th>
                                                                        <th>
                                                                            <img src="{{asset('images/Mercury.png')}}" alt="">
                                                                            <br>
                                                                            Mercury
                                                                        </th>
                                                                        <th>
                                                                            <img src="{{asset('images/Venus.png')}}" alt="">
                                                                            <br>
                                                                            Venus
                                                                        </th>
                                                                        <th>
                                                                            <img src="{{asset('images/Earth.png')}}" alt="">
                                                                            <br>
                                                                            Earth
                                                                        </th>
                                                                        <th>
                                                                            <img src="{{asset('images/Mars.png')}}" alt="">
                                                                            <br>
                                                                            Mars
                                                                        </th>
                                                                        <th>
                                                                            <img src="{{asset('images/Jupiter.png')}}" alt="">
                                                                            <br>
                                                                            Jupiter
                                                                        </th>
                                                                        <th>
                                                                            <img src="{{asset('images/Saturn.png')}}" alt="">
                                                                            <br>
                                                                            Saturn
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Orbits</td>
                                                                        <td id="orbits_mercury">
    {{--                                                                        <b style="color: yellow;">4</b>y,--}}
    {{--                                                                        <b style="color: yellow;">14</b>d--}}
                                                                        </td>
                                                                        <td id="orbits_venus">
    {{--                                                                        <b style="color: yellow;">1</b>y,--}}
    {{--                                                                        <b style="color: yellow;">141</b>d--}}
                                                                        </td>
                                                                        <td id="orbits_earth">
    {{--                                                                        <b style="color: lightblue;">1</b>y,--}}
    {{--                                                                        <b style="color: lightblue;">0</b>d--}}
                                                                        </td>
                                                                        <td id="orbits_mars">
    {{--                                                                        <b style="color: yellow;">320</b>d left--}}
                                                                        </td>
                                                                        <td id="orbits_jupiter">
    {{--                                                                        <b style="color: yellow;">3966</b>d left--}}
                                                                        </td>
                                                                        <td id="orbits_saturn">
    {{--                                                                        <b style="color: yellow;">10393</b>d left--}}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Planet days</td>
                                                                        <td id="planet_days_mercury">
    {{--                                                                        <b style="color: yellow;">2</b>--}}
                                                                        </td>
                                                                        <td id="planet_days_venus">
    {{--                                                                        <b style="color: yellow;">3</b>--}}
                                                                        </td>
                                                                        <td id="planet_days_earth">
    {{--                                                                        <b style="color: lightblue;">366</b>--}}
                                                                        </td>
                                                                        <td id="planet_days_mars">
    {{--                                                                        <b style="color: yellow;">356</b>--}}
                                                                        </td>
                                                                        <td id="planet_days_jupiter">
    {{--                                                                        <b style="color: yellow;">884</b>--}}
                                                                        </td>
                                                                        <td id="planet_days_saturn">
    {{--                                                                        <b style="color: yellow;">833</b>--}}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div id="ClassicTableSpot">
                                                <center id="center_number_properties" hidden>
                                                    <div id="MiscSpot">
                                                        <button class="buttonFunction" onclick="Build_HistoryTable()">
                                                            Show
                                                            History
                                                        </button>
                                                        <br>
                                                        <object id="numberProperty" type="text/html"
                                                                data="tools/number-properties-inline/index.php?number=18#numPropAnchor">

                                                            <div id="numPropAnchor">
                                                                <div id="numPropContainer">
                                                                    <center>
                                                                        <h2 style="text-transform: uppercase;">Number
                                                                            Properties of:
                                                                        </h2>
                                                                        <div id="HTMLSpot">
                                                                            <table id="TopTable">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td id="TopNumber"
                                                                                        style="font-size: 40px !important;"></td>
                                                                                </tr>
                                                                                {{--                                                                    <tr>--}}
                                                                                {{--                                                                        <td id="PrimeString" colspan="3">2 ×--}}
                                                                                {{--                                                                            3<sup>2</sup>--}}
                                                                                {{--                                                                        </td>--}}
                                                                                {{--                                                                    </tr>--}}
                                                                                </tbody>
                                                                            </table>
                                                                            <div id="belowSpecials">
                                                                                <div id="DivisorTableDiv"><span
                                                                                            class="titles">Divisors</span>
                                                                                    <table id="DivisorTable">
                                                                                        <tbody>
                                                                                        <tr></tr>
                                                                                        <tr>
                                                                                            <td>Count:</td>
                                                                                            <td>List:</td>
                                                                                            <td>Sum:</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td style="vertical-align: top">
                                                                                                <b class="Linkable"
                                                                                                   id="count"></b></td>
                                                                                            <td id="divisors_list">
                                                                                                {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(1)">1</a></b>,--}}
                                                                                                {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(2)">2</a></b>,--}}
                                                                                                {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(3)">3</a></b>,--}}
                                                                                                {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(6)">6</a></b>,--}}
                                                                                                {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(9)">9</a></b>,--}}
                                                                                                {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(18)">18</a></b>--}}
                                                                                                {{--                                                                                    <br>--}}
                                                                                                {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(10)">10</a></b>th--}}
                                                                                                {{--                                                                                    Composite #--}}
                                                                                            </td>
                                                                                            <td style="vertical-align: top">
                                                                                                <b class="Linkable"
                                                                                                   id="sum"></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div id="RelationTableDiv">
                                                                                    <h2 id="number_with_suffix"></h2>
                                                                                    <table id="RelationTable">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Prime #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_prime"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Composite #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_composite"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Fibonacci #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_fibonacci"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Triangular #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_triangular"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Square #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="square"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Cube #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="cube"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Tetrahedral
                                                                                                #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_tetrahedral"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Square Pyramidal #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_sq_pyramidal"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Star #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_star"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="RelativeClass">
                                                                                                Pentagonal #:
                                                                                                &nbsp;
                                                                                            </td>
                                                                                            <td class="RelativeNum"><b
                                                                                                        class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="nth_pentagonal"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                                <div id="ConversionsTableDiv"><span
                                                                                            class="titles">Conversions</span>
                                                                                    <table id="ConversionTable">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            {{--                                                                                <td>From:</td>--}}
                                                                                            <td class="conversionMiddle">
                                                                                                Numeral
                                                                                                system:
                                                                                            </td>
                                                                                            <td>To:</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            {{--                                                                                <td>-</td>--}}
                                                                                            <td>Octal</td>
                                                                                            <td><b class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="octal"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            {{--                                                                                <td><b class="Linkable"><a href="javascript:void(0);">20</a></b></td>--}}
                                                                                            <td>Duodecimal</td>
                                                                                            <td><b class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="duodecimal"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            {{--                                                                                <td><b class="Linkable"><a href="javascript:void(0);">24</a></b></td>--}}
                                                                                            <td>Hexadecimal</td>
                                                                                            <td><b class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="hexadecimal"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            {{--                                                                                <td>-</td>--}}
                                                                                            <td>Binary</td>
                                                                                            <td><b class="Linkable"><a
                                                                                                            href="javascript:void(0);"
                                                                                                            class="target_number"
                                                                                                            id="binary"></a></b>
                                                                                            </td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input tabindex="0" id="input_get_properties"
                                                                               autofocus="" type="number"
                                                                               placeholder="Enter #">
                                                                        <br><br>
                                                                        <button tabindex="1" id="btn_get_properties"
                                                                                class="buttonFunction">Get Properties
                                                                        </button>
                                                                        <br><br>
                                                                    </center>
                                                                </div>
                                                            </div>

                                                        </object>
                                                    </div>

                                                </center>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="PlanetDiv">
                                                <table id="MoonTable">
                                                    <tbody>
                                                    <tr>
                                                        <td rowspan="4"><a class="durLink"
                                                                           href="javascript:ShowPlanetGrid(0)"><img
                                                                        src="tools/date-calculator-advanced/img/Moon.png"><br>Moon</a>
                                                        </td>
                                                        <td><a class="durLink"
                                                               href="javascript:ChangePlanetCalc(2, 0)">Phases
                                                                (Synodic):</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="P0S"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a class="durLink"
                                                               href="javascript:ChangePlanetCalc(1, 0)">Orbits
                                                                (Sidereal):</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="P0O"></td>
                                                    </tr>
                                                    </tbody>
                                                </table>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div id="PlanetTableDiv">
                                                    <table id="PlanetTable">
                                                        <tbody>
                                                        <tr>
                                                            <td></td>
                                                            <td class="Planet1"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(1)"><img
                                                                            src="tools/date-calculator-advanced/img/Mercury.png"
                                                                            width="45&quot;"><br>Mercury</a></td>
                                                            <td class="Planet2"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(2)"><img
                                                                            src="tools/date-calculator-advanced/img/Venus.png"
                                                                            width="45&quot;"><br>Venus</a></td>
                                                            <td class="Planet3"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(3)"><img
                                                                            src="tools/date-calculator-advanced/img/Earth.png"
                                                                            width="45&quot;"><br>Earth</a></td>
                                                            <td class="Planet4"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(4)"><img
                                                                            src="tools/date-calculator-advanced/img/Mars.png"
                                                                            width="45&quot;"><br>Mars</a></td>
                                                            <td class="Planet5"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(5)"><img
                                                                            src="tools/date-calculator-advanced/img/Jupiter.png"
                                                                            width="45&quot;"><br>Jupiter</a></td>
                                                            <td class="Planet6"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(6)"><img
                                                                            src="tools/date-calculator-advanced/img/Saturn.png"
                                                                            width="45&quot;"><br>Saturn</a></td>
                                                            <td class="Planet7"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(7)"><img
                                                                            src="tools/date-calculator-advanced/img/Uranus.png"
                                                                            width="45&quot;"><br>Uranus</a></td>
                                                            <td class="Planet8"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(8)"><img
                                                                            src="tools/date-calculator-advanced/img/Neptune.png"
                                                                            width="45&quot;"><br>Neptune</a></td>
                                                            <td class="Planet9"><a class="durLink"
                                                                                   href="javascript:ShowPlanetGrid(9)"><img
                                                                            src="tools/date-calculator-advanced/img/Pluto.png"
                                                                            width="45&quot;"><br>Pluto</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a class="durLink"
                                                                   href="javascript:ChangePlanetCalc(1)">Orbits:</a>
                                                            </td>
                                                            <td class="Planet1" id="P1O"></td>
                                                            <td class="Planet2" id="P2O"></td>
                                                            <td class="Planet3" id="P3O"></td>
                                                            <td class="Planet4" id="P4O"></td>
                                                            <td class="Planet5" id="P5O"></td>
                                                            <td class="Planet6" id="P6O"></td>
                                                            <td class="Planet7" id="P7O"></td>
                                                            <td class="Planet8" id="P8O"></td>
                                                            <td class="Planet9" id="P9O"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><a class="durLink"
                                                                   href="javascript:ChangePlanetCalc(3)">Planet
                                                                    Days:</a></td>
                                                            <td class="Planet1" id="P1D"></td>
                                                            <td class="Planet2" id="P2D"></td>
                                                            <td class="Planet3" id="P3D"></td>
                                                            <td class="Planet4" id="P4D"></td>
                                                            <td class="Planet5" id="P5D"></td>
                                                            <td class="Planet6" id="P6D"></td>
                                                            <td class="Planet7" id="P7D"></td>
                                                            <td class="Planet8" id="P8D"></td>
                                                            <td class="Planet9" id="P9D"></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table></table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>

                                        <div id="MiscSpot"></div>


                                    </div>
                                    <!--<div class="TableLink"><a href="javascript:BuildEclipseTable()">View Eclipse Table</a></div>
    <div class="TableLink"><a href="javascript:PopDateTable()">View Date Grid</a></div>
    <div class="TableLink"><a href="javascript:Build_PlanetTable()">View Planetary Counts</a></div><BR>
    <div class="TableLink"><a href="javascript:DefaultDates()">Refresh Selections</a></div>-->

                                    <!--Search: <input tabindex=20 style="font-size: 100%; width: 100px" class="u_Inp" id="MeasurementSearch" maxlength=10></input>&nbsp
    <button tabindex=21 style="font-size: 100%" id="MSearch" onclick="SearchThroughArray()" value="Search"><B>Search!</B></button><BR>
    <input tabindex=22 type="checkbox" id="Check_Crap" value="Day" onclick="Change_Options()">Include Crap</input>
    <div id="MatchedDates"></div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ./page-content -->

        <!-- END Main -->
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/date-calculator.js') }}"></script>

    @if($planetary_table)
        <script>
            $('#Month1, #Day1, #Year1, #Month2, #Day2, #Year2').on('keyup change', function () {
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
                ) { return false; }

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
                    venus: 117.84,   // Adjusted value for Venus
                    earth: 1,        // Earth day
                    mars: 1.03,      // Mars day (accurate)
                    jupiter: 0.4137, // Adjusted value for Jupiter
                    saturn: 0.439    // Adjusted value for Saturn
                };

                for (let planet in orbitalPeriods) {
                    let totalOrbits = Math.floor(diffInDays / orbitalPeriods[planet]);
                    let remainingDays = diffInDays % orbitalPeriods[planet];

                    // orbits_jupiter
                    // planet_days_jupiter
                    if (totalOrbits > 0) {
                        // output.orbits[planet] = `${totalOrbits}y, ${remainingDays}d`;
                        $('#orbits_' + planet).html(`<b style="color: `+planet_colors[planet]+`;">`+parseInt(totalOrbits)+`</b>y,
                                        <b style="color: `+planet_colors[planet]+`;">`+parseInt(remainingDays)+`</b>d`);
                    } else {
                        let daysLeft = orbitalPeriods[planet] - remainingDays;
                        // output.orbits[planet] = `${daysLeft}d left`; // Display days left until completing the first orbit
                        $('#orbits_' + planet).html(`<b style="color: `+planet_colors[planet]+`;">`+parseInt(daysLeft)+`</b>d left`)
                    }

                    let planetDays = Math.floor(diffInDays / dayLengths[planet]);
                    // output.planet_days[planet] = remainingDays; // Example for calculating "planet days"
                    $('#planet_days_' + planet).html(`<b style="color: `+planet_colors[planet]+`;">`+parseInt(planetDays)+`</b>`);
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

                $('#phases_moon').html(`<b style="color: yellow;">`+synodicMonths+`</b>m,
                                        <b style="color: yellow;">`+synodicRemainingDays+`</b>d`);
                $('#orbits_moon').html(`<b style="color: yellow;">`+siderealMonths+`</b>m,
                                        <b style="color: yellow;">`+siderealRemainingDays+`</b>d`);
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#Month1').trigger('change');
            });
        </script>
    @endif

    <script>
        // Greek alphabet mapping for Isopsephy values
        const greekAlphabet = {
            'Α': 1, 'Β': 2, 'Γ': 3, 'Δ': 4, 'Ε': 5, 'Ϝ': 6, 'Ζ': 7, 'Η': 8, 'Θ': 9,
            'Ι': 10, 'Κ': 20, 'Λ': 30, 'Μ': 40, 'Ν': 50, 'Ξ': 60, 'Ο': 70, 'Π': 80, 'Ϙ': 90,
            'Ρ': 100, 'Σ': 200, 'Τ': 300, 'Υ': 400, 'Φ': 500, 'Χ': 600, 'Ψ': 700, 'Ω': 800, 'ϡ': 900
        };

        // Greek alphabet mapping for Ordinal values (A=1 to Ω=24)
        const greekOrdinalAlphabet = {
            'Α': 1, 'Β': 2, 'Γ': 3, 'Δ': 4, 'Ε': 5, 'Ϝ': 6, 'Ζ': 7, 'Η': 8, 'Θ': 9,
            'Ι': 10, 'Κ': 11, 'Λ': 12, 'Μ': 13, 'Ν': 14, 'Ξ': 15, 'Ο': 16, 'Π': 17, 'Ϙ': 18,
            'Ρ': 19, 'Σ': 20, 'Τ': 21, 'Υ': 22, 'Φ': 23, 'Χ': 24, 'Ψ': 25, 'Ω': 26, 'ϡ': 27
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
            let count = 0;  // Counter for composite numbers
            let current = 4;  // Start from 4 because 4 is the first composite number

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
                octal: n.toString(8),           // Octal
                duodecimal: n.toString(12),     // Duodecimal
                hexadecimal: n.toString(16),     // Hexadecimal
                binary: n.toString(2)            // Binary
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
                string += '<b class="Linkable"><a href="javascript:void(0);" class="target_number">' + item + '</a></b>' + (count === return_body.divisors.length ? '' : ',&nbsp;');
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
        $(document).ready(function () {
            $('#EntryField').on('keyup', function () {
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

            $('#isopsephy').on('click', function () {
                number_properties($(this).text());
            });
            $('#ordinal').on('click', function () {
                number_properties($(this).text());
            });
            $('#reduction').on('click', function () {
                number_properties($(this).text());
            });

            $('#btn_get_properties').on('click', function () {
                let val = $('#input_get_properties').val();

                if (val < 1 || val == '') {
                    return false;
                }

                number_properties(val);
            });

            $('body').on('click', '.target_number', function () {
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


