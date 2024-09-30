<?php include 'include/header.php' ?>
<?php include 'include/menu.php' ?>

<div class="main-content-area full-width-template">

    <div class="page-content clearfix py">
        <div class="wpb-content-wrapper">
            <div id="wbc-66f74052c36b9" class="vc_row wpb_row  full-width-section"
                style="padding-top: 10px;padding-bottom: 30px;">
                <div class="wpb_column vc_column_container vc_col-sm-12 text-center">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="current-user">Username: <span class="user-name">Mersdecodes</span><br>User ID:
                                <span class="user-id">9727</span><br>Membership level: <span
                                    class="membership-level">Enthusiast</span></div>
                            <div class="tool-wrapper">
                                <script src="js/datecalcadv.js"></script>
                                <script src="js/basic/datecalcbuilders.js"></script>
                                <script src="js/planets-1.js"></script>
                                <script src="js/planets-2.js"></script>
                                <script src="js/ss.js"></script>
                                <script>
                                var maxDates = 100;
                                var subLevel = 4
                                </script>
                                <script src="js/datenumerology.js"></script>
                                <script src="js/eclipses.js"></script>
                                <script src="js/datematches.js"></script>
                                <script src="js/load.js"></script>
                                <script src="js/html2canvas.min.js"></script>
                                <script src="js/jquery.min.js"></script>

                                <link rel="stylesheet" type="text/css"
                                    href="css/datecalcadv.css">
                                <div id="containerDateAdv">
                                    <div id="dateRows">
                                        <div id="firstDate">
                                            <div id="mdy1">
                                                <span class="topIcons"
                                                    title="Click to view Lunar/Zodiac info for selected dates"
                                                    onclick="javascript:toggleLunation()"><i
                                                        class="far fa-moon"></i></span>&nbsp;&nbsp;<span
                                                    id="DateHeader1">Thu Sep 28 2023</span>&nbsp;&nbsp;<span
                                                    title="Click to name this date and store it on the left sidebar."
                                                    class="topIcons" onclick="javascript:toggleGridListTitle()"><i
                                                        class="far fa-address-book"></i></span>
                                                <div id="Date1Inputs" class="row">
                                                    <div class="mdyDiv">
                                                        <span class="monthTitle">Month:</span><br>
                                                        <input tabindex="1" type="number" max="13" min="0" class="u_Inp"
                                                            id="Month1" oninput="Confirm_Dates('m')">
                                                    </div>
                                                    <div class="mdyDiv">
                                                        Day:<br>
                                                        <input tabindex="2" type="number" max="32" min="0" class="u_Inp"
                                                            id="Day1" oninput="Confirm_Dates('d')">
                                                    </div>
                                                    <div class="mdyDiv">
                                                        Year:<br>
                                                        <input tabindex="3" type="number" max="9999" min="0"
                                                            class="u_Inp" id="Year1" oninput="Confirm_Dates('y')">
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
                                                                        class="eclipseNextPrev">Last</a></td>
                                                                <td><span title="Brown Lunation Number" id="LunaSpot1">
                                                                        <font>1246</font>
                                                                    </span><br><span id="MoonSpot1"><img title="NewMoon"
                                                                            id="NewMoon1"
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
                                                                        <div class="SignDropdown"><button
                                                                                onclick="OpenSignDropdown(0)"
                                                                                class="SignButton">Libra</button>
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
                                                        <input tabindex="4" class="u_Inp" id="DateTitle1" maxlength="15"
                                                            oninput="Confirm_Title(1)">
                                                    </div>
                                                    <div class="dateTitleLess">
                                                        <button tabindex="6" id="AddDate1" class="AddToList"
                                                            onclick="AddNewDate()" value="Add Date">Add to List</button>
                                                    </div>
                                                </div>
                                                <div id="DateStr1Show" style="display: block;">
                                                    <div id="printDateStr1">
                                                        <span id="DateStr1">(9) + (28) + (20) + (23)</span><span> =
                                                        </span><span id="DateNum1" style="color: white;"><a
                                                                href="javascript:Open_NumberProperties(80)">80</a></span>
                                                    </div>
                                                    <div id="DateNums1">
                                                        <div><span class="dateNumSpan">
                                                                <font color="#1862cf">80</font>
                                                            </span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 1)">
                                                                    <font color="white">44</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 2)">
                                                                    <font color="white">26</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 3)">
                                                                    <font color="white">60</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 4)">
                                                                    <font color="white">24</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 5)">
                                                                    <font color="yellow">271</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 6)">
                                                                    <font color="yellow">94</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 11)">
                                                                    <font color="lightblue">1728</font>
                                                                </a></span><span class="dateNumSpan"><a
                                                                    href="javascript:Change_DateNum(0, 12)">
                                                                    <font color="lightblue">864</font>
                                                                </a></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="secondDate">
                                            <div id="mdy2">
                                                <span id="DateHeader2">Sat Sep 28 2024</span>
                                                <div id="Date2Inputs" class="row">
                                                    <div class="mdyDiv">
                                                        <span class="monthTitle">Month:</span><br>
                                                        <input tabindex="7" type="number" max="13" min="0" class="u_Inp"
                                                            id="Month2" oninput="Confirm_Dates('m', 2)">
                                                    </div>
                                                    <div class="mdyDiv">
                                                        Day:<br>
                                                        <input tabindex="8" type="number" max="32" min="0" class="u_Inp"
                                                            id="Day2" oninput="Confirm_Dates('d', 2)">
                                                    </div>
                                                    <div class="mdyDiv">
                                                        Year:<br>
                                                        <input tabindex="9" type="number" max="9999" min="0"
                                                            class="u_Inp" id="Year2" oninput="Confirm_Dates('y', 2)">
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
                                                                    </span><br><span id="MoonSpot2"><img title="NewMoon"
                                                                            id="NewMoon2"
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
                                                                        <div class="SignDropdown"><button
                                                                                onclick="OpenSignDropdown(1)"
                                                                                class="SignButton">Libra</button>
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
                                                            List</button>
                                                    </div>
                                                </div>
                                                <!--<div class="row"></div>-->
                                                <div id="DateStr2Show" style="display: block;">
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
                                                    class="u_Inp" id="YearAdd" value="0" oninput="SetDatesAlt()"></div>
                                            <div class="mdyDiv">Months:<br><input type="number" max="24000" min="0"
                                                    class="u_Inp" id="MonthAdd" value="0" oninput="SetDatesAlt()"></div>
                                            <div class="mdyDiv">Weeks:<br><input type="number" max="100000" min="0"
                                                    class="u_Inp" id="WeekAdd" value="0" oninput="SetDatesAlt()"></div>
                                            <div class="mdyDiv">Days:<br><input type="number" max="700000" min="0"
                                                    class="u_Inp" id="DayAdd" value="0" oninput="SetDatesAlt()"></div>
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
                                                <input tabindex="14" class="opt_check" type="checkbox" id="Check_End"
                                                    value="End" onclick="Change_Options()"><span>&nbsp;Include End
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
                                                <input tabindex="15" class="opt_check" type="checkbox" id="Check_Year"
                                                    value="Year"
                                                    onclick="Change_Options()"><span>&nbsp;Year&nbsp;&nbsp;</span><br>
                                                <input tabindex="16" class="opt_check" type="checkbox" id="Check_Month"
                                                    value="Month"
                                                    onclick="Change_Options()"><span>&nbsp;Month&nbsp;&nbsp;</span><br>
                                                <input tabindex="17" class="opt_check" type="checkbox" id="Check_Week"
                                                    value="Week"
                                                    onclick="Change_Options()"><span>&nbsp;Week&nbsp;&nbsp;</span><br>
                                                <input tabindex="18" class="opt_check" type="checkbox" id="Check_Day"
                                                    value="Day" onclick="Change_Options()"
                                                    checked=""><span>&nbsp;Day&nbsp;&nbsp;</span>
                                            </div>
                                        </div>
                                        <div id="DurationContainer">
                                            <div id="DurationSection">
                                                <div id="DurationDetails">
                                                    <div id="DurationDetailsInner">From <font
                                                            class="DurationStringMain">Thu Sep 28 2023</font><br
                                                            class="mo"> to <font class="DurationStringMain">Sat Sep 28
                                                            2024</font> is:<br>
                                                        <font style="size: 115%"><a
                                                                href="javascript:Open_NumberProperties(366)">
                                                                <font class="DurNumMain">366</font>
                                                            </a> Days</font>
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
                                                <div id="YearTable"><span><a href="javascript:Open_NumberProperties(1)">
                                                            <font class="DurNum">1</font>
                                                        </a> Year, </span><span><a
                                                            href="javascript:Open_NumberProperties(0)">
                                                            <font class="DurNum">0</font>
                                                        </a> Days</span><br><span><a
                                                            href="javascript:Open_NumberProperties(1)">
                                                            <font class="DurNum">1</font>
                                                        </a> Year, </span><span><a
                                                            href="javascript:Open_NumberProperties(0)">
                                                            <font class="DurNum">0</font>
                                                        </a> Months, <a href="javascript:Open_NumberProperties(0)">
                                                            <font class="DurNum">0</font>
                                                        </a> Days</span><br><span><a
                                                            href="javascript:Open_NumberProperties(1)">
                                                            <font class="DurNum">1</font>
                                                        </a> Year, </span><span><a
                                                            href="javascript:Open_NumberProperties(0)">
                                                            <font class="DurNum">0</font>
                                                        </a> Weeks, <a href="javascript:Open_NumberProperties(0)">
                                                            <font class="DurNum">0</font>
                                                        </a> Days</span><br><span><a
                                                            href="javascript:Open_NumberProperties(12)">
                                                            <font class="DurNum">12</font>
                                                        </a> Months, <a href="javascript:Open_NumberProperties(0)">
                                                            <font class="DurNum">0</font>
                                                        </a> Days</span><br><span><a
                                                            href="javascript:Open_NumberProperties(52)">
                                                            <font class="DurNum">52</font>
                                                        </a> Weeks, <a href="javascript:Open_NumberProperties(2)">
                                                            <font class="DurNum">2</font>
                                                        </a> Days</span><br><span><a
                                                            href="javascript:Open_NumberProperties(366)">
                                                            <font class="DurNum">366</font>
                                                        </a> Days</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 	<div id="planetsRow">
		<div id="planetsCheckBox">
			<input tabindex=19 class="opt_check" type="checkbox" id="Check_Planets" value="ShowPlanets" onclick="Toggle_Planets()"><span>&nbsp; Show Planets</span>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<input tabindex=19 class="opt_check" type="checkbox" id="Check_DateTable" value="ShowDateTable" onclick="Set_Options()"><span>&nbsp; Show Classic Date Table</span>
		</div>	
	</div> -->
                                    <div class="row">
                                        <div id="ClassicTableSpot"></div>
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

<?php include 'include/footer.php' ?>