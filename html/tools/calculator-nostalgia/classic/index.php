<?php include '../../../include/header.php' ?>

<script src="js/calculator-3.js"></script>
<script src="js/jQuery-3-1.js"></script>
<link rel="stylesheet" type="text/css" href="css/calculator-v402.css">

<?php include '../../../include/menu.php' ?>

<body onload="Start_Up()">
    
    
    <section class="py mt-5">
        <center><img src="images/logo.png" width="44%"></center>
    <center class="">
        <table>
            <tbody>
                <tr>
                    <td style="text-align: center">
                        <font style="font-size: 125%"><b>Enter Word, Phrase, or Number(s):</b></font><br>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle">

                        <input id="SearchField" autofocus="" type="text" oninput="Populate_Sums()" style="width: 500px; font-size: 150%" onkeydown="navHistory(event.keyCode);">
                    </td>

                    <td>

                        <p>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>

        <div id="GematriaSpot">
            <table class="GTable">
                <tbody>
                    <tr>
                        <td class="Gem_Head" style="color: RGB(68,114,196)"><a onmouseover="javascript:Populate_Breakdown('Full Reduction', false)" onmouseout="Populate_Breakdown()" href="javascript:Populate_Breakdown('Full Reduction', true)">Full Reduction</a></td>
                        <td class="Gem_Head" style="color: RGB(100,226,226)"><a onmouseover="javascript:Populate_Breakdown('Reverse Full Reduction', false)" onmouseout="Populate_Breakdown()" href="javascript:Populate_Breakdown('Reverse Full Reduction', true)">Reverse Full Reduction</a></td>
                        <td class="Gem_Head" style="color: RGB(0,153,0)"><a onmouseover="javascript:Populate_Breakdown('English Ordinal', false)" onmouseout="Populate_Breakdown()" href="javascript:Populate_Breakdown('English Ordinal', true)">English Ordinal</a></td>
                        <td class="Gem_Head" style="color: RGB(80,225,20)"><a onmouseover="javascript:Populate_Breakdown('Reverse Ordinal', false)" onmouseout="Populate_Breakdown()" href="javascript:Populate_Breakdown('Reverse Ordinal', true)">Reverse Ordinal</a></td>
                    </tr>
                    <tr>
                        <td id="Full_Reduction_Sum" class="Gem_Sum" style="color: RGB(68,114,196)">12</td>
                        <td id="Reverse_Full_Reduction_Sum" class="Gem_Sum" style="color: RGB(100,226,226)">12</td>
                        <td id="English_Ordinal_Sum" class="Gem_Sum" style="color: RGB(0,153,0)">12</td>
                        <td id="Reverse_Ordinal_Sum" class="Gem_Sum" style="color: RGB(80,225,20)">12</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p>
        <table style="width: 800px">
            <tbody>
                <tr>
                    <td>
                        <div id="BreakdownSpot">
                            <font style="font-size: 100%; color: RGB(255, 255, 255);">12</font>
                            <font class="BreakEq"> = = </font>
                            <font style="font-size: 110%; color: RGB(255, 255, 255);"><b>0</b></font>
                            <font style="font-size: 75%; color: RGB(68,114,196);">(Full Reduction)</font>
                            <div class="CountDiv">(0 letters, 1 word)</div>
                            <p></p>
                            <center><button class="MoveCipher" onclick="slide_Cipher('up')">Move cipher Left/Up</button>&nbsp;<button class="MoveCipher" onclick="slide_Cipher('down')">Move cipher Right/Down</button><br>
                                <font style="font-size: 66%; color: #ffffff">View Chart: </font>
                                <font style="color: #00ffff"><a href="javascript:Open_Chart()">Full Reduction</a>
                                    <font></font>
                                </font>
                            </center>
                        </div>
                        <p>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
        </p>
        <div id="OptionsSpot">
            <table id="OptionsTable">
                <tbody>
                    <tr>
                        <td class="noSel"><a href="javascript:Open_History2()"><b>History</b></a></td>
                        <td class="mSel"><a href="javascript:Open_Ciphers()"><b>Ciphers</b></a></td>
                        <td class="noSel"><a href="javascript:Open_Options()"><b>Options</b></a></td>
                        <td class="noSel"><a href="javascript:Open_Help()"><b>Help</b></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="MatchSpot">
            <table>
                <tbody>
                    <tr>
                        <td colspan="7">Select Group: <select id="Cipher_Drop" onchange="set_Cipher_Cat()">
                                <option value="Custom" selected="selected">Custom</option>
                                <option value="Reduced/Ordinal/Reverse">Reduced/Ordinal/Reverse</option>
                                <option value="Gematrinator's Picks">Gematrinator's Picks</option>
                                <option value="Small Numbers">Small Numbers</option>
                                <option value="Medium Numbers">Medium Numbers</option>
                                <option value="Big Numbers">Big Numbers</option>
                                <option value="Experimental">Experimental</option>
                                <option value="All">All</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td valign="top" style="padding: 3px">
                            <font style="color: orange"><b><u>Pythagorean:</u></b></font><br><input type="checkbox" id="Full_Reduction_Box" onclick="set_Ciphers()" value="Full_Reduction" checked="">
                            <font style="color: RGB(68,114,196)">Full Reduction<br><input type="checkbox" id="Single_Reduction_Box" onclick="set_Ciphers()" value="Single_Reduction" unchecked="">
                                <font style="color: RGB(142,169,219)">Single Reduction<br><input type="checkbox" id="Reverse_Full_Reduction_Box" onclick="set_Ciphers()" value="Reverse_Full_Reduction" checked="">
                                    <font style="color: RGB(100,226,226)">Reverse Full Reduction<br><input type="checkbox" id="Reverse_Single_Reduction_Box" onclick="set_Ciphers()" value="Reverse_Single_Reduction" unchecked="">
                                        <font style="color: RGB(80,199,199)">Reverse Single Reduction</font>
                                    </font>
                                </font>
                            </font>
                        </td>
                        <td valign="top" style="padding: 3px">
                            <font style="color: orange"><b><u>Alphabetic Order:</u></b></font><br><input type="checkbox" id="English_Ordinal_Box" onclick="set_Ciphers()" value="English_Ordinal" checked="">
                            <font style="color: RGB(0,153,0)">English Ordinal<br><input type="checkbox" id="Reverse_Ordinal_Box" onclick="set_Ciphers()" value="Reverse_Ordinal" checked="">
                                <font style="color: RGB(80,225,20)">Reverse Ordinal<br><input type="checkbox" id="Francis_Bacon_Box" onclick="set_Ciphers()" value="Francis_Bacon" unchecked="">
                                    <font style="color: RGB(150,244,2)">Francis Bacon<br><input type="checkbox" id="English_Extended_Box" onclick="set_Ciphers()" value="English_Extended" unchecked="">
                                        <font style="color: RGB(255,255,0)">English Extended<br><input type="checkbox" id="Franc_Baconis_Box" onclick="set_Ciphers()" value="Franc_Baconis" unchecked="">
                                            <font style="color: RGB(93,156,88)">Franc Baconis<br><input type="checkbox" id="Sumerian_Box" onclick="set_Ciphers()" value="Sumerian" unchecked="">
                                                <font style="color: RGB(169,208,142)">Sumerian<br><input type="checkbox" id="Reverse_Sumerian_Box" onclick="set_Ciphers()" value="Reverse_Sumerian" unchecked="">
                                                    <font style="color: RGB(220,208,148)">Reverse Sumerian<br><input type="checkbox" id="Satanic_Box" onclick="set_Ciphers()" value="Satanic" unchecked="">
                                                        <font style="color: RGB(255,0,0)">Satanic</font>
                                                    </font>
                                                </font>
                                            </font>
                                        </font>
                                    </font>
                                </font>
                            </font>
                        </td>
                        <td valign="top" style="padding: 3px">
                            <font style="color: orange"><b><u>Jewish:</u></b></font><br><input type="checkbox" id="Jewish_Reduced_Box" onclick="set_Ciphers()" value="Jewish_Reduced" unchecked="">
                            <font style="color: RGB(153,102,255)">Jewish Reduced<br><input type="checkbox" id="Jewish_Ordinal_Box" onclick="set_Ciphers()" value="Jewish_Ordinal" unchecked="">
                                <font style="color: RGB(153,102,255)">Jewish Ordinal<br><input type="checkbox" id="Jewish_Box" onclick="set_Ciphers()" value="Jewish" unchecked="">
                                    <font style="color: RGB(153,102,255)">Jewish</font>
                                </font>
                            </font>
                        </td>
                        <td valign="top" style="padding: 3px">
                            <font style="color: orange"><b><u>Kabbalah:</u></b></font><br><input type="checkbox" id="ALW_Kabbalah_Box" onclick="set_Ciphers()" value="ALW_Kabbalah" unchecked="">
                            <font style="color: RGB(255,64,0)">ALW Kabbalah<br><input type="checkbox" id="KFW_Kabbalah_Box" onclick="set_Ciphers()" value="KFW_Kabbalah" unchecked="">
                                <font style="color: RGB(255,64,0)">KFW Kabbalah<br><input type="checkbox" id="LCH_Kabbalah_Box" onclick="set_Ciphers()" value="LCH_Kabbalah" unchecked="">
                                    <font style="color: RGB(255,64,0)">LCH Kabbalah</font>
                                </font>
                            </font>
                        </td>
                        <td valign="top" style="padding: 3px">
                            <font style="color: orange"><b><u>Mathematical:</u></b></font><br><input type="checkbox" id="Primes_Box" onclick="set_Ciphers()" value="Primes" unchecked="">
                            <font style="color: RGB(255,204,111)">Primes<br><input type="checkbox" id="Trigonal_Box" onclick="set_Ciphers()" value="Trigonal" unchecked="">
                                <font style="color: RGB(231,180,113)">Trigonal<br><input type="checkbox" id="Squares_Box" onclick="set_Ciphers()" value="Squares" unchecked="">
                                    <font style="color: RGB(228,216,96)">Squares</font>
                                </font>
                            </font>
                        </td>
                        <td valign="top" style="padding: 3px">
                            <font style="color: orange"><b><u>Other:</u></b></font><br><input type="checkbox" id="Septenary_Box" onclick="set_Ciphers()" value="Septenary" unchecked="">
                            <font style="color: RGB(255,153,0)">Septenary<br><input type="checkbox" id="Chaldean_Box" onclick="set_Ciphers()" value="Chaldean" unchecked="">
                                <font style="color: RGB(166,166,18)">Chaldean</font>
                            </font>
                        </td>
                        <td valign="top" style="padding: 3px">
                            <font style="color: orange"><b><u>Exception:</u></b></font><br><input type="checkbox" id="Full_Reduction_KV_Box" onclick="set_Ciphers()" value="Full_Reduction_KV" unchecked="">
                            <font style="color: RGB(0,176,240)">Full Reduction KV<br><input type="checkbox" id="Single_Reduction_KV_Box" onclick="set_Ciphers()" value="Single_Reduction_KV" unchecked="">
                                <font style="color: RGB(0,176,240)">Single Reduction KV<br><input type="checkbox" id="Reverse_Full_Reduction_EP_Box" onclick="set_Ciphers()" value="Reverse_Full_Reduction_EP" unchecked="">
                                    <font style="color: RGB(110,226,156)">Reverse Full Reduction EP<br><input type="checkbox" id="Reverse_Single_Reduction_EP_Box" onclick="set_Ciphers()" value="Reverse_Single_Reduction_EP" unchecked="">
                                        <font style="color: RGB(110,226,156)">Reverse Single Reduction EP<br><input type="checkbox" id="Hebrew_Reduction_Box" onclick="set_Ciphers()" value="Hebrew_Reduction" unchecked="">
                                            <font style="color: RGB(255,189,2)">Hebrew Reduction<br><input type="checkbox" id="Hebrew_Ordinal_Box" onclick="set_Ciphers()" value="Hebrew_Ordinal" unchecked="">
                                                <font style="color: RGB(255,209,36)">Hebrew Ordinal<br><input type="checkbox" id="Hebrew_Gematria_Box" onclick="set_Ciphers()" value="Hebrew_Gematria" unchecked="">
                                                    <font style="color: RGB(255,227,93)">Hebrew Gematria<br><input type="checkbox" id="Hebrew_Soffits_Box" onclick="set_Ciphers()" value="Hebrew_Soffits" unchecked="">
                                                        <font style="color: RGB(255,251,156)">Hebrew Soffits</font>
                                                    </font>
                                                </font>
                                            </font>
                                        </font>
                                    </font>
                                </font>
                            </font>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p>&nbsp;</p>

        <div id="PageFooter" style="background-color: RGB(0, 0, 8);">
        </div>

    </center>
    </section>





</body>

<?php include '../../../include/footer.php' ?>