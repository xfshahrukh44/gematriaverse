<?php include 'include/header.php' ?>
<link rel="stylesheet" href="css/numberstyle.css">
<link rel="stylesheet" type="text/css" href="css/advcalcstyles-1-00012.css">
<?php include 'include/menu.php' ?>

<section class="bread-crums">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="menu-dynamic">
                    <div id="calc-menu">
                        <a id="ciphModBtn" class="MenuLink" onclick="javascript:Open_Ciphers()" data-fancybox="ciphers" data-src="#ciphMod"><span class="calcMenuItem">Ciphers&nbsp;</span></a><span>|</span>
                        <a id="optionsBtn" class="MenuLink" onclick="javascript:Open_Options()" data-fancybox="dialog" data-src="#optionsMod"><span class="calcMenuItem">Options&nbsp;</span></a><span>|</span>
                        <a id="shortcutsBtn" class="MenuLink" data-fancybox="shortcuts" data-src="#shortcutsMod"><span class="calcMenuItem">Shortcuts</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bread-crums">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Word, Phrase, or #(s):"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="calculator-meter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="MainTableRow">
                    <div id="MainTable">
                        <div id="Gematria_Table">
                            <table id="GemTable">
                                <tbody>
                                    <tr>
                                        <td class="GemTableHeader">
                                            <div class="GemTableHeader" onclick="javascript:MoveCipherClick(0, event)">
                                                <font style="color: RGB(139, 200, 163)">Greek Isopsephy</font>
                                            </div>
                                        </td>
                                        <td class="GemTableHeader">
                                            <div class="GemTableHeader" onclick="javascript:MoveCipherClick(1, event)">
                                                <font style="color: RGB(149, 199, 139)">Greek Ordinal</font>
                                            </div>
                                        </td>
                                        <td class="GemTableHeader">
                                            <div class="GemTableHeader" onclick="javascript:MoveCipherClick(2, event)">
                                                <font style="color: RGB(156, 201, 171)">Greek Reduction</font>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td class="GemTableValue InSeqList" id="TableValue_Greek_Isopsephy">
                                            <font style="color: RGB(139, 200, 163);">
                                                <div class="NumberClass"><b id="finalBreakNum" class="justnumber" onclick="javascript:Open_Properties(22)">22</b></div>
                                            </font>
                                        </td>
                                        <td class="GemTableValue InSeqList" id="TableValue_Greek_Ordinal">
                                            <font style="color: RGB(149, 199, 139);">
                                                <div class="NumberClass"><b id="finalBreakNum" class="justnumber" onclick="javascript:Open_Properties(22)">22</b></div>
                                            </font>
                                        </td>
                                        <td class="GemTableValue InSeqList" id="TableValue_Greek_Reduction">
                                            <font style="color: RGB(156, 201, 171);">
                                                <div class="NumberClass"><b id="finalBreakNum" class="justnumber" onclick="javascript:Open_Properties(22)">22</b></div>
                                            </font>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div id="WordLetterCount text-center">
                <div class="WordLetterCount para white">(0 words, 0 letters)</div>
            </div>
        </div>
    </div>
</section>

<section class="calculator-table">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="ChartSpot">
                    <table>
                        <tbody>
                            <tr></tr>
                            <tr>
                                <td class="chartChar">Α</td>
                                <td class="chartChar">Β</td>
                                <td class="chartChar">Γ</td>
                                <td class="chartChar">Δ</td>
                                <td class="chartChar">Ε</td>
                                <td class="chartChar">Ϝ</td>
                                <td class="chartChar">Ζ</td>
                                <td class="chartChar">Η</td>
                                <td class="chartChar">Θ</td>
                                <td class="chartChar">Ι</td>
                                <td class="chartChar">Κ</td>
                                <td class="chartChar">Λ</td>
                                <td class="chartChar">Μ</td>
                                <td class="chartChar">Ν</td>
                            </tr>
                            <tr>
                                <td class="chartVal">1</td>
                                <td class="chartVal">2</td>
                                <td class="chartVal">3</td>
                                <td class="chartVal">4</td>
                                <td class="chartVal">5</td>
                                <td class="chartVal">6</td>
                                <td class="chartVal">7</td>
                                <td class="chartVal">8</td>
                                <td class="chartVal">9</td>
                                <td class="chartVal">10</td>
                                <td class="chartVal">20</td>
                                <td class="chartVal">30</td>
                                <td class="chartVal">40</td>
                                <td class="chartVal">50</td>
                            </tr>
                            <tr>
                                <td class="chartChar">Ξ</td>
                                <td class="chartChar">Ο</td>
                                <td class="chartChar">Π</td>
                                <td class="chartChar">Ϙ</td>
                                <td class="chartChar">Ρ</td>
                                <td class="chartChar">Σ</td>
                                <td class="chartChar">Τ</td>
                                <td class="chartChar">Υ</td>
                                <td class="chartChar">Φ</td>
                                <td class="chartChar">Χ</td>
                                <td class="chartChar">Ψ</td>
                                <td class="chartChar">Ω</td>
                                <td class="chartChar">ϡ</td>
                            </tr>
                            <tr>
                                <td class="chartVal">60</td>
                                <td class="chartVal">70</td>
                                <td class="chartVal">80</td>
                                <td class="chartVal">90</td>
                                <td class="chartVal">100</td>
                                <td class="chartVal">200</td>
                                <td class="chartVal">300</td>
                                <td class="chartVal">400</td>
                                <td class="chartVal">500</td>
                                <td class="chartVal">600</td>
                                <td class="chartVal">700</td>
                                <td class="chartVal">800</td>
                                <td class="chartVal">900</td>
                            </tr>
                            <tr>
                                <td id="cipherChartTitle" colspan="14"><span id="moveCipherUp" class="moveCipher" onclick="javascript:MoveCipher(undefined, 1)"><i class="fas fa-chevron-circle-up"></i></span>
                                    <font style="color: RGB(139, 200, 163)">Greek Isopsephy</font> <span id="moveCipherDown" class="moveCipher" onclick="javascript:MoveCipher(undefined, 2)"><i class="fas fa-chevron-circle-down"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <center>
                    <div id="MiscSpot"><button class="buttonFunction" onclick="Build_HistoryTable()">Show
                            History</button><br>
                        <object id="numberProperty" type="text/html" data="tools/number-properties-inline/index.php?number=18#numPropAnchor">

                            <div id="numPropAnchor">
                                <div id="numPropContainer">
                                    <center>
                                        <h2 style="text-transform: uppercase;">Number Properties of:</h2>
                                        <div id="HTMLSpot">
                                            <table id="TopTable">
                                                <tbody>
                                                    <tr>
                                                        <td><a class="RegularLink" href="javascript:Open_Properties(17)">17</a>
                                                        </td>
                                                        <td id="TopNumber">18</td>
                                                        <td><a class="RegularLink" href="javascript:Open_Properties(19)">19</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td id="PrimeString" colspan="3">2 × 3<sup>2</sup>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div id="belowSpecials">
                                                <div id="DivisorTableDiv"><span class="titles">Divisors</span>
                                                    <table id="DivisorTable">
                                                        <tbody>
                                                            <tr></tr>
                                                            <tr>
                                                                <td>Count:</td>
                                                                <td>List:</td>
                                                                <td>Sum:</td>
                                                            </tr>
                                                            <tr>
                                                                <td style="vertical-align: top"><b class="Linkable"><a href="javascript:Open_Properties(6)">6</a></b>
                                                                </td>
                                                                <td id="FullDivisorList"><b class="Linkable"><a href="javascript:Open_Properties(1)">1</a></b>,
                                                                    <b class="Linkable"><a href="javascript:Open_Properties(2)">2</a></b>,
                                                                    <b class="Linkable"><a href="javascript:Open_Properties(3)">3</a></b>,
                                                                    <b class="Linkable"><a href="javascript:Open_Properties(6)">6</a></b>,
                                                                    <b class="Linkable"><a href="javascript:Open_Properties(9)">9</a></b>,
                                                                    <b class="Linkable"><a href="javascript:Open_Properties(18)">18</a></b><br><b class="Linkable"><a href="javascript:Open_Properties(10)">10</a></b>th
                                                                    Composite #
                                                                </td>
                                                                <td style="vertical-align: top"><b class="Linkable"><a href="javascript:Open_Properties(39)">39</a></b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="RelationTableDiv">
                                                    <h2>18th</h2>
                                                    <table id="RelationTable">
                                                        <tbody>
                                                            <tr>
                                                                <td class="RelativeClass"> Prime #: &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(61)">61</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Composite #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(28)">28</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Fibonacci #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(2584)">2584</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Triangular #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(171)">171</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Square #: &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(324)">324</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Cube #: &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(5832)">5832</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Tetrahedral #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(1140)">1140</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Square Pyramidal
                                                                    #: &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(2109)">2109</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Star #: &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(1837)">1837</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Pentagonal #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:Open_Properties(477)">477</a></b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="ConversionsTableDiv"><span class="titles">Conversions</span>
                                                    <table id="ConversionTable">
                                                        <tbody>
                                                            <tr>
                                                                <td>From:</td>
                                                                <td class="conversionMiddle">Numeral system:
                                                                </td>
                                                                <td>To:</td>
                                                            </tr>
                                                            <tr>
                                                                <td>-</td>
                                                                <td>Octal</td>
                                                                <td><b class="Linkable"><a href="javascript:Open_Properties(22)">22</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b class="Linkable"><a href="javascript:Open_Properties(20)">20</a></b>
                                                                </td>
                                                                <td>Duodecimal</td>
                                                                <td><b class="Linkable"><a href="javascript:Open_Properties(16)">16</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><b class="Linkable"><a href="javascript:Open_Properties(24)">24</a></b>
                                                                </td>
                                                                <td>Hexadecimal</td>
                                                                <td><b class="Linkable"><a href="javascript:Open_Properties(12)">12</a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>-</td>
                                                                <td>Binary</td>
                                                                <td><b class="Linkable"><a href="javascript:Open_Properties(10010)">10010</a></b>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <input tabindex="0" id="NumberField" autofocus="" onkeydown="CheckEnter(event)" type="number" placeholder="Enter #">
                                        <br><br>
                                        <button tabindex="1" id="NumberButton" class="buttonFunction" onclick="NavNumber()">Get Properties</button>
                                        <br><br>
                                    </center>
                                </div>
                            </div>

                        </object>
                    </div>

                </center>
            </div>
        </div>
    </div>
</section>

<!-- CIPHER MODAL -->
<div id="ciphMod" class="ciphMod fancybox-content" style="display: none; margin-bottom: 6px;">
    <center>
        <h2 id="toph2">Ciphers</h2>
        <span id="cipherHelpText">Can't find a cipher? <a
                href="{{route('faq')}}">See the FAQ</a> or <a
                href="{{route('home')}}">Ciphers</a> page.</span>
        <br><br class="no-mo">
        <ul id="cipherBox">
            <li><input type="checkbox" id="Cipher0" checked="">
                <font style="color: RGB(0, 186, 0)">Ordinal</font>
            </li>
            <li><input type="checkbox" id="Cipher1" checked="">
                <font style="color: RGB(88, 125, 254)">Reduction</font>
            </li>
            <li><input type="checkbox" id="Cipher2" checked="">
                <font style="color: RGB(80, 235, 21)">Reverse</font>
            </li>
            <li><input type="checkbox" id="Cipher3" checked="">
                <font style="color: RGB(100, 226, 226)">Reverse Reduction</font>
            </li>
            <li><input type="checkbox" id="Cipher4" checked="">
                <font style="color: RGB(218, 226, 0)">Standard</font>
            </li>
            <li><input type="checkbox" id="Cipher5" checked="">
                <font style="color: RGB(153, 102, 255)">Latin</font>
            </li>
            <li><input type="checkbox" id="Cipher6" checked="">
                <font style="color: RGB(169, 208, 142)">Sumerian</font>
            </li>
            <li><input type="checkbox" id="Cipher7" checked="">
                <font style="color: RGB(220, 208, 148)">Reverse Sumerian</font>
            </li>
            <li><input type="checkbox" id="Cipher8" checked="">
                <font style="color: RGB(93, 187, 88)">Capitals Mixed</font>
            </li>
            <li><input type="checkbox" id="Cipher9" checked="">
                <font style="color: RGB(150, 244, 77)">Capitals Added</font>
            </li>
            <li><input type="checkbox" id="Cipher10" checked="">
                <font style="color: RGB(111, 193, 121)">Reverse Caps Mixed</font>
            </li>
            <li><input type="checkbox" id="Cipher11" checked="">
                <font style="color: RGB(163, 255, 88)">Reverse Caps Added</font>
            </li>
            <li><input type="checkbox" id="Cipher12" checked="">
                <font style="color: RGB(253, 255, 119)">Reverse Standard</font>
            </li>
            <li><input type="checkbox" id="Cipher13" checked="">
                <font style="color: RGB(255, 0, 0)">Satanic</font>
            </li>
            <li><input type="checkbox" id="Cipher14" checked="">
                <font style="color: RGB(255, 0, 0)">Reverse Satanic</font>
            </li>
            <li><input type="checkbox" id="Cipher15" checked="">
                <font style="color: RGB(140, 171, 227)">Single Reduction</font>
            </li>
            <li><input type="checkbox" id="Cipher16" checked="">
                <font style="color: RGB(97, 195, 244)">KV Exception</font>
            </li>
            <li><input type="checkbox" id="Cipher17" checked="">
                <font style="color: RGB(70, 175, 244)">SKV Exception</font>
            </li>
            <li><input type="checkbox" id="Cipher18" checked="">
                <font style="color: RGB(100, 216, 209)">Reverse Single Reduction</font>
            </li>
            <li><input type="checkbox" id="Cipher19" checked="">
                <font style="color: RGB(101, 224, 194)">EP Exception</font>
            </li>
            <li><input type="checkbox" id="Cipher20" checked="">
                <font style="color: RGB(110, 226, 156)">EHP Exception</font>
            </li>
            <li><input type="checkbox" id="Cipher21" checked="">
                <font style="color: RGB(154, 121, 227)">Latin Ordinal</font>
            </li>
            <li><input type="checkbox" id="Cipher22" checked="">
                <font style="color: RGB(159, 99, 197)">Latin Reduction</font>
            </li>
            <li><input type="checkbox" id="Cipher23" checked="">
                <font style="color: RGB(255, 204, 111)">Primes</font>
            </li>
            <li><input type="checkbox" id="Cipher24" checked="">
                <font style="color: RGB(231, 180, 113)">Trigonal</font>
            </li>
            <li><input type="checkbox" id="Cipher25" checked="">
                <font style="color: RGB(228, 216, 96)">Squares</font>
            </li>
            <li><input type="checkbox" id="Cipher26" checked="">
                <font style="color: RGB(233, 202, 148)">Fibonacci</font>
            </li>
            <li><input type="checkbox" id="Cipher27" checked="">
                <font style="color: RGB(255, 209, 145)">Reverse Primes</font>
            </li>
            <li><input type="checkbox" id="Cipher28" checked="">
                <font style="color: RGB(238, 191, 112)">Reverse Trigonal</font>
            </li>
            <li><input type="checkbox" id="Cipher29" checked="">
                <font style="color: RGB(240, 225, 112)">Reverse Squares</font>
            </li>
            <li><input type="checkbox" id="Cipher30" checked="">
                <font style="color: RGB(166, 166, 99)">Chaldean</font>
            </li>
            <li><input type="checkbox" id="Cipher31" checked="">
                <font style="color: RGB(255, 153, 77)">Septenary</font>
            </li>
            <li><input type="checkbox" id="Cipher32" checked="">
                <font style="color: RGB(255, 126, 255)">Keypad</font>
            </li>
            <li><input type="checkbox" id="Cipher33" checked="">
                <font style="color: RGB(255, 64, 0)">English Qaballa</font>
            </li>
            <li><input type="checkbox" id="Cipher34" checked="">
                <font style="color: RGB(255, 88, 0)">Cipher X</font>
            </li>
            <li><input type="checkbox" id="Cipher35" checked="">
                <font style="color: RGB(255, 93, 73)">Trigrammaton Qabalah</font>
            </li>
            <li><input type="checkbox" id="Cipher36" checked="">
                <font style="color: RGB(191, 195, 127)">Alphanumeric Qabbala</font>
            </li>
            <li><input type="checkbox" id="Cipher37" checked="">
                <font style="color: RGB(239, 154, 174)">Alphanumeric Satanic</font>
            </li>
            <li><input type="checkbox" id="Cipher38" checked="">
                <font style="color: RGB(255, 255, 255)">test</font>
            </li>
            <li><input type="checkbox" id="Cipher39" checked="">
                <font style="color: RGB(255, 255, 255)">joan</font>
            </li>
            <li><input type="checkbox" id="Cipher40" checked="">
                <font style="color: RGB(255, 255, 255)"></font>
            </li>
            <li><input type="checkbox" id="Cipher41" checked="">
                <font style="color: RGB(2, 28999, 255)">Chaos </font>
            </li>
            <li><input type="checkbox" id="Cipher42" checked="">
                <font style="color: RGB(255, 255, 255)">Pi</font>
            </li>
        </ul>
    </center>
    <div id="cipherSelectsContainer">
        <div class="cipherSelects"><button class="buttonFunctionCiphers"
                id="SelectBaseCiphersBtn" onclick="javascript:SelBaseCiphers()">Select
                Base</button></div>
        <div class="cipherSelects"><button class="buttonFunctionCiphers"
                id="SelectAllCiphersBtn" onclick="javascript:SelAllCiphers(true)">Select
                All</button></div>
        <div class="cipherSelects"><button class="buttonFunctionCiphers" id="ClearAllCiphersBtn"
                onclick="javascript:SelAllCiphers(false)">Clear All</button></div>
    </div>
    <div id="cipherUpdateCancelContainer">
        <button class="buttonFunctionCiphers" id="SaveCiphers"
            onclick="javascript:Close_Ciphers(); jQuery.fancybox.close();">
            <!--<img decoding="async" src="tools/calculator-advanced/img/save-icon.png" class="imgTop" width="16">-->Update
        </button>
        <button class="buttonFunctionCiphers" id="CancelCiphers"
            onclick="javascript:Cancel_Ciphers()">Cancel</button>
    </div>
    <center>
        <div id="cipherPresets">
            <h2>Cipher Presets</h2>
            <span>The checked ciphers above will save as your: </span><select name="SavePresets"
                id="PresetDropdown">
                <option>Default</option>
                <option>Preset 1</option>
            </select> <button class="buttonFunctionCiphers" id="SaveCiphers"
                onclick="javascript:Update_Ciphers(), jQuery.fancybox.close();">
                <div
                    decoding="async" class="imgTop" width="16">Close/Save
            </button><br><br>
            <span>Select previous Preset to load: <br class="mo"><select name="LoadPresets"
                    id="PresetDropdown2">
                    <option>Default</option>
                </select> <button class="buttonFunctionCiphers" id="LoadCiphers"
                    onclick="javascript:Load_Preset()">Load</button><br><br>
            </span>
        </div>
    </center>
    <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small"
        title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
            <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
        </svg></button>
</div>
<!-- END CIPHER MODAL -->

<!-- OPTIONS MODAL -->
<div id="optionsMod" class="optionsMod">
    <div id="optionsMod" class="optionsMod fancybox-content" style="display: block; margin-bottom: 6px;">
        <div id="OptionSpot">
            <div><label>Number Calculation</label><br><select name="NumCalcSel" id="NumCalcSel">
                    <option value="Smart">Smart</option>
                    <option value="Reduced">Reduced</option>
                    <option value="Full">Full</option>
                    <option value="Off">Off</option>
                </select><br><label>Ciphers per Row</label><br><select name="CiphersPerSel" id="CiphersPerSel">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select><br><label>Sequence Notifications</label><br><select name="NumSeqSel" id="NumSeqSel">
                    <option value="Off">Off</option>
                    <option value="Regular">Regular</option>
                    <option value="All">All</option>
                </select><br><br><input type="checkbox" id="ReductionCheck" value="ReductionCheck">&nbsp; Display Reduction Value<br><input type="checkbox" id="CipherNamesCheck" value="CipherNamesCheck">&nbsp; Display Cipher Names<br><br><input type="checkbox" id="LetterWordCheck" value="LetterWordCheck">&nbsp; Display Letter/Word Count<br><input type="checkbox" id="SimpleResultCheck" value="SimpleResultCheck">&nbsp; Display Simple Result<br><input type="checkbox" id="ChartCheck" value="ChartCheck">&nbsp; Show Cipher Chart<br><input type="checkbox" id="BreakdownCheck" onclick="javascript:modBreakList()" value="BreakdownCheck">&nbsp; Show Breakdown<br><label>Breakdown Chart Style</label><br><select name="BreakdownSel" id="BreakdownSel">
                    <option value="Chart">Chart</option>
                    <option value="NextGen">NextGen</option>
                    <option value="Classic">Classic</option>
                </select><br><br><input type="checkbox" id="DiacriticCheck" value="DiacriticCheck">&nbsp; Remove Diacritics<br><input type="checkbox" id="ShortcutsCheck" value="ShortcutsCheck">&nbsp; Keyboard Shortcuts On<br><br><input type="checkbox" id="CompactCheck" value="CompactCheck">&nbsp; Compact History Table<br><input type="checkbox" id="NonMatchCheck" value="NonMatchCheck">&nbsp; Ignore Non-Matches<br><input type="checkbox" id="ContributeCheck" value="ContributeCheck">&nbsp; Contribute to Match DB<br></div><br><button class="buttonFunctionOptions" type="button" data-fancybox-close="" id="OptionClose" onclick="javascript:Close_Options(''),Update_Options(),jQuery.fancybox.close();" value="Close_Options">Close/Save</button>
        </div>
        <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
                <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
            </svg></button>
    </div>
</div>
<!-- END OPTIONS MODAL -->

<!-- SHORTCUTS MODAL -->
<div id="shortcutsMod" class="shortcutsMod row auto">
    <div id="cipher-list-colored" style="display:none;">
        <i id="exitCipherListColored" class="fas fa-times"
            onclick="javascript:closeCipherShortcuts()"></i>
        <br>
        <img decoding="async" src="/tools/calculator-advanced/img/cipher-list-colored.png"
            alt="gematrinator, gematria, cipher list">
    </div>
    <h2>SHORTCUTS</h2>
    <h3>CIPHER DISPLAY</h3>
    <table>
        <tbody>
            <tr>
                <td class="scLeft">Turn cipher on/off:</td>
                <td class="scRight">s; + cipher shortcut (<span class="seeCipherShortcuts"
                        onclick="javascript:openCipherShortcuts()">see list</span>)</td>
            </tr>
            <tr>
                <td class="scLeft">Move active cipher UP:</td>
                <td class="scRight">m;u</td>
            </tr>
            <tr>
                <td class="scLeft">Move active cipher DOWN:</td>
                <td class="scRight">m;d</td>
            </tr>
            <tr>
                <td class="scLeft">Change active cipher:</td>
                <td class="scRight">c; + cipher shortcut (<span class="seeCipherShortcuts"
                        onclick="javascript:openCipherShortcuts()">see list</span>)</td>
            </tr>
            <tr>
                <td class="scLeft">Show only one cipher:</td>
                <td class="scRight">o; + cipher shortcut (<span class="seeCipherShortcuts"
                        onclick="javascript:openCipherShortcuts()">see list</span>)</td>
            </tr>
            <tr>
                <td class="scLeft">Back to previous table:</td>
                <td class="scRight">b;</td>
            </tr>
        </tbody>
    </table>
    <h3>OPTIONS + FUNCTIONS</h3>
    <table>
        <tbody>
            <tr>
                <td class="scLeft">Load user default ciphers:</td>
                <td class="scRight">p;d</td>
            </tr>
            <tr>
                <td class="scLeft">Load cipher presets:</td>
                <td class="scRight">p;1 - p;4</td>
            </tr>
            <tr>
                <td class="scLeft">Ciphers per row:</td>
                <td class="scRight">r;2 - r;8</td>
            </tr>
            <tr>
                <td class="scLeft">View User Table:</td>
                <td class="scRight">t;1 - t;6</td>
            </tr>
            <tr>
                <td class="scLeft">View history table:</td>
                <td class="scRight">t;h</td>
            </tr>
            <tr>
                <td class="scLeft">View session table:</td>
                <td class="scRight">t;s</td>
            </tr>
            <tr>
                <td class="scLeft">Display Breakdown:</td>
                <td class="scRight">d;b</td>
            </tr>
            <tr>
                <td class="scLeft">Display Cipher Chart:</td>
                <td class="scRight">d;c</td>
            </tr>
            <tr>
                <td class="scLeft">Find Matches in User Tables:</td>
                <td class="scRight">Shift + Enter in search field</td>
            </tr>
            <tr>
                <td class="scLeft">Show History Table</td>
                <td class="scRight">Ctrl + Enter in search field</td>
            </tr>
        </tbody>
    </table>
    <h3>HISTORY</h3>
    <span>Applied to an Entry Phrase in the History Table unless otherwise specified.</span>
    <table>
        <tbody>
            <tr>
                <td class="scLeft">Load entry to search field:</td>
                <td class="scRight">(Click)</td>
            </tr>
            <tr>
                <td class="scLeft">Find Matches in User Tables:</td>
                <td class="scRight">(Shift + Click)</td>
            </tr>
            <tr>
                <td class="scLeft">Move entry up:</td>
                <td class="scRight">(Ctrl + Click)</td>
            </tr>
            <tr>
                <td class="scLeft">Move entry down:</td>
                <td class="scRight">(Alt + Click)</td>
            </tr>
            <tr>
                <td class="scLeft">Move entry to top:</td>
                <td class="scRight">(Shift + Ctrl + Click)</td>
            </tr>
            <tr>
                <td class="scLeft">Move entry to bottom:</td>
                <td class="scRight">(Shift + Alt + Click)</td>
            </tr>
            <tr>
                <td class="scLeft">Remove Cipher:</td>
                <td class="scRight">(Ctrl + Alt + Click) on Cipher Name</td>
            </tr>
            <tr>
                <td class="scLeft">Remove "Matched Entries" row:</td>
                <td class="scRight">(Ctrl + Alt + Click) on "Matched Entries" row</td>
            </tr>
            <tr>
                <td class="scLeft">Hide Number:</td>
                <td class="scRight">(Right Click) on number in History Table</td>
            </tr>
            <tr>
                <td class="scLeft">Delete Entries in Current Table:</td>
                <td class="scRight">(Ctrl + Del)</td>
            </tr>
        </tbody>
    </table>
</div> <!-- END SHORTCUTS MODAL -->

<?php include 'include/footer.php' ?>