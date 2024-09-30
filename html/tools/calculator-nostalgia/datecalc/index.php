<?php include '../../../include/header.php' ?>

<script src="js/DateCalc-207.js"></script>
<link rel="stylesheet" type="text/css" href="css/DateDurations-201.css">
<?php include '../../../include/menu.php' ?>

<section class="calculator-meter py">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <body onload="Page_Launch()">
                    <center><img src="images/logo-2.png" width="44%"></center>



                    <center>
                        <p id="DateSpot">

                        </p><br>
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="FullDateString">
                                        <div id="FDS1">Tue Sep 26 2023</div>
                                    </td>
                                    <td></td>
                                    <td colspan="2" class="FullDateString">
                                        <div id="FDS2">Thu Sep 26 2024</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="u_Entry" colspan="2">
                                        <center>
                                        </center>
                                        <table class="InputCells">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Month:<br><input tabindex="1" type="number" max="13" min="0"
                                                            class="u_Inp" id="Month1" oninput="Set_Dates(1, 'm')"><br>
                                                        <!--Hour:<BR><input tabindex=7 type="number" max="23" min="1" class="u_Inp2" id="Hour1" oninput="Set_Dates()"></input>-->
                                                    </td>
                                                    <td>
                                                        Day:<br><input tabindex="2" type="number" max="32" min="0"
                                                            class="u_Inp" id="Day1" oninput="Set_Dates(1, 'd')"><br>
                                                        <!--Minute:<BR><input tabindex=8 type="number" max="59" min="1" class="u_Inp2" id="Min1" oninput="Set_Dates()"></input>-->
                                                    </td>
                                                    <td>
                                                        Year:<br><input tabindex="3" type="number" max="10000" min="0"
                                                            class="u_Inp" id="Year1" oninput="Set_Dates(1, 'y')"><br>
                                                        <!--Second:<BR><input tabindex=9 type="number" max="59" min="1" class="u_Inp2" id="Sec1" oninput="Set_Dates()"></input>-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <div id="AddSubLink" class="DropLink"><a
                                                                href="javascript:DropCells()">Add/Subtract</a></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="Filler"></td>
                                    <td class="u_Entry" colspan="2">
                                        <center>
                                        </center>
                                        <table class="InputCells">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Month:<br><input tabindex="4" type="number" max="13" min="0"
                                                            class="u_Inp" id="Month2" oninput="Set_Dates(2, 'm')"><br>
                                                        <!--Hour:<BR><input tabindex=10 type="number" max="23" min="1" class="u_Inp2" id="Hour2" oninput="Set_Dates()"></input>-->
                                                    </td>
                                                    <td>
                                                        Day:<br><input tabindex="5" type="number" max="32" min="0"
                                                            class="u_Inp" id="Day2" oninput="Set_Dates(2, 'd')"><br>
                                                        <!--Minute:<BR><input tabindex=11 type="number" max="59" min="1" class="u_Inp2" id="Min2" oninput="Set_Dates()"></input>-->
                                                    </td>
                                                    <td>
                                                        Year:<br><input tabindex="6" type="number" max="9999" min="0"
                                                            class="u_Inp" id="Year2" oninput="Set_Dates(2, 'y')"><br>
                                                        <!--Second:<BR><input tabindex=12 type="number" max="59" min="1" class="u_Inp2" id="Sec2" oninput="Set_Dates()"></input>-->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div id="AddSubBoxes">
                                            <center></center>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <br>
                                        <div class="DurHead">Time Between
                                            Dates:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                        <center><input tabindex="13" type="checkbox" value="EndIncluded" id="Check_End"
                                                onclick="Change_Options()">Include End
                                            Date?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <table style="width: 700px">
                                                <tbody>
                                                    <tr>
                                                        <td valign="center" width="125px">
                                                            <div id="CheckBoxSpot"><input tabindex="14" type="checkbox"
                                                                    id="Check_Year" value="Year"
                                                                    onclick="Change_Options()" checked="">Year<br><input
                                                                    tabindex="15" type="checkbox" id="Check_Month"
                                                                    value="Month" onclick="Change_Options()"
                                                                    checked="">Month<br><input tabindex="16"
                                                                    type="checkbox" id="Check_Week" value="Week"
                                                                    onclick="Change_Options()" checked="">Week<br><input
                                                                    tabindex="17" type="checkbox" id="Check_Day"
                                                                    value="Day" onclick="Change_Options()"
                                                                    checked="">Day<br></div>
                                                        </td>
                                                        <td valign="top">
                                                            <div id="DurationSpot">
                                                                <table id="DurTable">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td
                                                                                style="background: rgb(25,25,25); width: 100px">
                                                                                From <font class="DurationString">Tue
                                                                                    Sep 26 2023</font><br>to <font
                                                                                    class="DurationString">Thu Sep 26
                                                                                    2024</font> is:</td>
                                                                            <th class="TotalHead">Total in Each</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td valign="top"
                                                                                style="background: rgb(25,25,25); width: 380px">
                                                                                <font style="font-size: 115%">
                                                                                    <font class="DurNum">1</font>
                                                                                    Year,<br>
                                                                                    <font class="DurNum">0</font>
                                                                                    Months,<br>
                                                                                    <font class="DurNum">0</font>
                                                                                    Weeks,<br>
                                                                                    <font class="DurNum">1</font> Day
                                                                                </font>
                                                                            </td>
                                                                            <td valign="top" style="width: 220px">
                                                                                <font style="color: RGB(222, 222, 222)">
                                                                                    <font class="">1</font> Year, <font
                                                                                        class="">1</font> Day<br>
                                                                                    <font class="">12</font> Months,
                                                                                    <font class="">1</font> Day<br>
                                                                                    <font class="">52</font> Weeks,
                                                                                    <font class="">3</font> Days<br>
                                                                                    <font class="">367</font> Days<br>
                                                                                </font>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </center>
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="5">
                                        <div class="DurHead">Date Numerologies</div>
                                        <div id="NumerologySpot">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" class="FullDateString">
                                                            <div id="FDS3"> Sep 26 2023</div>
                                                        </td>
                                                        <td class="Filler"></td>
                                                        <td colspan="2" class="FullDateString">
                                                            <div id="FDS4"> Sep 26 2024</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot1" class="NumString">(9) + (26) + (20) + (23)
                                                        </td>
                                                        <td id="Date1Sum1" class="SumString">78</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot1" class="NumString">(9) + (26) + (20) + (24)
                                                        </td>
                                                        <td id="Date2Sum1" class="SumString">79</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot2" class="NumString">(9) + (26) + 2+0+2+3</td>
                                                        <td id="Date1Sum2" class="SumString">42</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot2" class="NumString">(9) + (26) + 2+0+2+4</td>
                                                        <td id="Date2Sum2" class="SumString">43</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot3" class="NumString">9 + 2+6 + 2+0+2+3</td>
                                                        <td id="Date1Sum3" class="SumString">24</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot3" class="NumString">9 + 2+6 + 2+0+2+4</td>
                                                        <td id="Date2Sum3" class="SumString">25</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot4" class="NumString">(9) + (26) + (23)</td>
                                                        <td id="Date1Sum4" class="SumString">58</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot4" class="NumString">(9) + (26) + (24)</td>
                                                        <td id="Date2Sum4" class="SumString">59</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot5" class="NumString">9 + 2+6 + 2+3</td>
                                                        <td id="Date1Sum5" class="SumString">22</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot5" class="NumString">9 + 2+6 + 2+4</td>
                                                        <td id="Date2Sum5" class="SumString">23</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot6" class="NumString">Day of Year: (Sep-26)</td>
                                                        <td id="Date1Sum6" class="SumString">
                                                            <font style="color: yellow">269</font>
                                                        </td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot6" class="NumString">Day of Year: (Sep-26)</td>
                                                        <td id="Date2Sum6" class="SumString">
                                                            <font style="color: orange">270</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot7" class="NumString">Days Left in Year:
                                                            (Sep-26)</td>
                                                        <td id="Date1Sum7" class="SumString">
                                                            <font style="color: yellow">96</font>
                                                        </td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot7" class="NumString">Days Left in Year:
                                                            (Sep-26)</td>
                                                        <td id="Date2Sum7" class="SumString">
                                                            <font style="color: yellow">96</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot8" class="NumString">(9) + (26)</td>
                                                        <td id="Date1Sum8" class="SumString">35</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot8" class="NumString">(9) + (26)</td>
                                                        <td id="Date2Sum8" class="SumString">35</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot9" class="NumString">9 + 2+6 + (20) + (23)</td>
                                                        <td id="Date1Sum9" class="SumString">60</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot9" class="NumString">9 + 2+6 + (20) + (24)</td>
                                                        <td id="Date2Sum9" class="SumString">61</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot10" class="NumString">(9) + (26) + 2+3</td>
                                                        <td id="Date1Sum10" class="SumString">40</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot10" class="NumString">(9) + (26) + 2+4</td>
                                                        <td id="Date2Sum10" class="SumString">41</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot11" class="NumString">9 + 2+6 + (23)</td>
                                                        <td id="Date1Sum11" class="SumString">40</td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot11" class="NumString">9 + 2+6 + (24)</td>
                                                        <td id="Date2Sum11" class="SumString">41</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot12" class="NumString">9 × 2 × 6 × 2 × 2 × 3
                                                        </td>
                                                        <td id="Date1Sum12" class="SumString">
                                                            <font style="color:RGB(179,218,255)">1296</font>
                                                        </td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot12" class="NumString">9 × 2 × 6 × 2 × 2 × 4
                                                        </td>
                                                        <td id="Date2Sum12" class="SumString">
                                                            <font style="color:RGB(179,218,255)">1728</font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td id="Date1Spot13" class="NumString">9 × 2 × 6 × 2 × 3</td>
                                                        <td id="Date1Sum13" class="SumString">
                                                            <font style="color:RGB(179,218,255)">648</font>
                                                        </td>
                                                        <td class="Filler"></td>
                                                        <td id="Date2Spot13" class="NumString">9 × 2 × 6 × 2 × 4</td>
                                                        <td id="Date2Sum13" class="SumString">
                                                            <font style="color:RGB(179,218,255)">864</font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <p></p>
                        <p>&nbsp;</p>

                        <div id="PageFooter">
                        </div>
                    </center>



                </body>

            </div>
        </div>
    </div>
</section>

<?php include '../../../include/footer.php' ?>