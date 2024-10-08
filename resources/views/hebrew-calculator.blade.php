@extends('layouts.app')

@section('title', 'Hebrew calculator')

@php
    if (!session()->has('hebrew_selected_ciphers')) {
        session()->put('hebrew_selected_ciphers', [
            'Hebrew Standard',
            'Hebrew Ordinal',
            'Hebrew Reduction'
        ]);
    }
@endphp

@section('css')
    <link rel="stylesheet" href="{{asset('css/numberstyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/advcalcstyles-1-00012.css')}}">
@endsection

@section('content')
    <section class="bread-crums">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="menu-dynamic">
                        <div id="calc-menu">
                            <a id="ciphModBtn" class="MenuLink" onclick="javascript:void(0)" data-fancybox="dialog" data-src="#ciphMod"><span class="calcMenuItem">Ciphers&nbsp;</span></a>
{{--                            <span>|</span>--}}
{{--                            <a id="optionsBtn" class="MenuLink" onclick="javascript:Open_Options()" data-fancybox="dialog" data-src="#optionsMod"><span class="calcMenuItem">Options&nbsp;</span></a><span>|</span>--}}
{{--                            <a id="shortcutsBtn" class="MenuLink" data-fancybox="shortcuts" data-src="#shortcutsMod"><span class="calcMenuItem">Shortcuts</span></a>--}}
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
                               aria-label="Username" aria-describedby="basic-addon1" id="EntryField">
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
                                        <tr id="tr_cipher_names">
{{--                                            <td class="GemTableHeader">--}}
{{--                                                <div class="GemTableHeader" onclick="javascript:MoveCipherClick(0, event)">--}}
{{--                                                    <font style="color: RGB(255, 227, 93)">Hebrew Standard</font>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="GemTableHeader">--}}
{{--                                                <div class="GemTableHeader" onclick="javascript:MoveCipherClick(1, event)">--}}
{{--                                                    <font style="color: RGB(255, 209, 36)">Hebrew Ordinal</font>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="GemTableHeader">--}}
{{--                                                <div class="GemTableHeader" onclick="javascript:MoveCipherClick(2, event)">--}}
{{--                                                    <font style="color: RGB(255, 189, 2)">Hebrew Reduction</font>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
                                        </tr>
                                        <tr></tr>
                                        <tr id="tr_cipher_values">
{{--                                            <td class="GemTableValue" id="TableValue_Hebrew_Standard">--}}
{{--                                                <font style="color: RGB(255, 227, 93);">--}}
{{--                                                    <div class="NumberClass">--}}
{{--                                                        <b id="standard" class="justnumber" onclick="javascript:void(0)">0</b>--}}
{{--                                                    </div>--}}
{{--                                                </font>--}}
{{--                                            </td>--}}
{{--                                            <td class="GemTableValue" id="TableValue_Hebrew_Ordinal">--}}
{{--                                                <font style="color: RGB(255, 209, 36);">--}}
{{--                                                    <div class="NumberClass">--}}
{{--                                                        <b id="ordinal" class="justnumber" onclick="javascript:void(0)">0</b>--}}
{{--                                                    </div>--}}
{{--                                                </font>--}}
{{--                                            </td>--}}
{{--                                            <td class="GemTableValue" id="TableValue_Hebrew_Reduction">--}}
{{--                                                <font style="color: RGB(255, 189, 2);">--}}
{{--                                                    <div class="NumberClass">--}}
{{--                                                        <b id="reduction" class="justnumber" onclick="javascript:void(0)">0</b>--}}
{{--                                                    </div>--}}
{{--                                                </font>--}}
{{--                                            </td>--}}
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div style="display:table; margin: auto; max-width: 1331px; margin-top:3px">
                    <div id="printBreakTable" style="display:table-cell; width: 100%;">
                        <div id="watermarkBreakGuy" style="display:none;"><img decoding="async" src="/tools/calculator-advanced/img/gem-guy-flip.png" alt="gematrinator" width="28" style="margin-top: 10px; margin-right:0px; float:right; opacity:.25;">
                        </div>
                        <center>
                            <input type="hidden" name="cipher_id" id="cipher_id" value="D0">
                            <table id="breakdownCipherLabel" style="width:100%; display: inline;">
                                <tbody>
                                <tr>
                                    <td>
                                        <table class="BreakTable">
                                            <tbody id="tbody_cipher_queue">
                                            {{--                                                <tr>--}}
                                            {{--                                                    <td class="BreakCharNG">t</td>--}}
                                            {{--                                                    <td class="BreakCharNG">e</td>--}}
                                            {{--                                                    <td class="BreakCharNG">s</td>--}}
                                            {{--                                                    <td class="BreakCharNG">t</td>--}}
                                            {{--                                                    <td class="BreakTotal" rowspan="2">--}}
                                            {{--                                                        <font style="color: rgb(0, 186, 0);">--}}
                                            {{--                                                            <div class="NumberClass view-number">64</div>--}}
                                            {{--                                                        </font>--}}
                                            {{--                                                    </td>--}}
                                            {{--                                                </tr>--}}
                                            {{--                                                <tr>--}}
                                            {{--                                                    <td class="BreakValue">20</td>--}}
                                            {{--                                                    <td class="BreakValue">5</td>--}}
                                            {{--                                                    <td class="BreakValue">19</td>--}}
                                            {{--                                                    <td class="BreakValue">20</td>--}}
                                            {{--                                                </tr>--}}
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </center>
                        <span id="watermarkBreakText" style="display:none; float: right; margin-right: 0px; margin-top: -18px;opacity:.25;position: relative; "><img decoding="async" src="/tools/calculator-advanced/img/gematrinator-just-text-200px.png" alt="gematrinator logo" width="85"></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="WordLetterCount text-center">
                    <div class="WordLetterCount para white" id="div_words_and_letters">(0 words, 0 letters)</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="ChartSpot">
                    <table>
                        <tbody>
                        <tr></tr>

                        <tr id="tr_alphabet_keys">
                            {{--                                <td class="chartChar">a</td>--}}
                            {{--                                <td class="chartChar">b</td>--}}
                            {{--                                <td class="chartChar">c</td>--}}
                            {{--                                <td class="chartChar">d</td>--}}
                            {{--                                <td class="chartChar">e</td>--}}
                            {{--                                <td class="chartChar">f</td>--}}
                            {{--                                <td class="chartChar">g</td>--}}
                            {{--                                <td class="chartChar">h</td>--}}
                            {{--                                <td class="chartChar">i</td>--}}
                            {{--                                <td class="chartChar">j</td>--}}
                            {{--                                <td class="chartChar">k</td>--}}
                            {{--                                <td class="chartChar">l</td>--}}
                            {{--                                <td class="chartChar">m</td>--}}
                            {{--                                <td class="chartChar">n</td>--}}
                            {{--                                <td class="chartChar">o</td>--}}
                            {{--                                <td class="chartChar">p</td>--}}
                            {{--                                <td class="chartChar">q</td>--}}
                            {{--                                <td class="chartChar">r</td>--}}
                            {{--                                <td class="chartChar">s</td>--}}
                            {{--                                <td class="chartChar">t</td>--}}
                            {{--                                <td class="chartChar">u</td>--}}
                            {{--                                <td class="chartChar">v</td>--}}
                            {{--                                <td class="chartChar">w</td>--}}
                            {{--                                <td class="chartChar">x</td>--}}
                            {{--                                <td class="chartChar">y</td>--}}
                            {{--                                <td class="chartChar">z</td>--}}
                        </tr>

                        <tr id="tr_alphabet_values">
                            {{--                                <td class="chartVal">1</td>--}}
                            {{--                                <td class="chartVal">2</td>--}}
                            {{--                                <td class="chartVal">3</td>--}}
                            {{--                                <td class="chartVal">4</td>--}}
                            {{--                                <td class="chartVal">5</td>--}}
                            {{--                                <td class="chartVal">6</td>--}}
                            {{--                                <td class="chartVal">7</td>--}}
                            {{--                                <td class="chartVal">8</td>--}}
                            {{--                                <td class="chartVal">9</td>--}}
                            {{--                                <td class="chartVal">10</td>--}}
                            {{--                                <td class="chartVal">11</td>--}}
                            {{--                                <td class="chartVal">12</td>--}}
                            {{--                                <td class="chartVal">13</td>--}}
                            {{--                                <td class="chartVal">14</td>--}}
                            {{--                                <td class="chartVal">15</td>--}}
                            {{--                                <td class="chartVal">16</td>--}}
                            {{--                                <td class="chartVal">17</td>--}}
                            {{--                                <td class="chartVal">18</td>--}}
                            {{--                                <td class="chartVal">19</td>--}}
                            {{--                                <td class="chartVal">20</td>--}}
                            {{--                                <td class="chartVal">21</td>--}}
                            {{--                                <td class="chartVal">22</td>--}}
                            {{--                                <td class="chartVal">23</td>--}}
                            {{--                                <td class="chartVal">24</td>--}}
                            {{--                                <td class="chartVal">25</td>--}}
                            {{--                                <td class="chartVal">26</td>--}}
                        </tr>

                        <tr>
                            <td id="tr_cipher_name" class="text-center" colspan="50">
                                {{--                                    <font id="cipherTitleFont" style="color: rgb(0, 186, 0)">Ordinal</font>--}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="calculator-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tool-wrapper">
                        <!-- <script src="js/numberproperties.js"></script>
                        <script src="js/newfunctions.js"></script>
                        <script src="js/buildfunctions.js"></script>
                        <script src="js/matchfunctions.js"></script>
                        <script src="js/historyfunctions.js"></script>
                        <script src="js/ss.js"></script> -->
                        <script type="text/javascript">
                            const maxHistory = 1000,
                                HistoryEnabled = true,
                                TablesEnabled = true
                        </script>
                        <link rel="stylesheet" type="text/css" href="css/advcalcstyles-1-00012.css">
                        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                        <script src="js/cipherbuilder.js"></script>
                        <script src="js/html2canvas.min.js"></script>
                        <script src="js/load.js"></script> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CIPHER MODAL -->
    <div id="ciphMod" class="ciphMod fancybox-content" style="display: none; margin-bottom: 6px; background-color: black !important;">
        <center>
            <h2 id="toph2">Ciphers</h2>
            <span id="cipherHelpText">Can't find a cipher? <a
                        href="{{route('faq')}}">See the FAQ</a> or <a
                        href="{{route('home')}}">Ciphers</a> page.</span>
            <br><br class="no-mo">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="row" id="row_cipher_modal">
                        {{--                        <div class="col-md-3">--}}
                        {{--                            <input type="checkbox" id="Cipher0" checked="">--}}
                        {{--                            <font style="color: RGB(0, 186, 0)">Ordinal</font>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            {{--            <ul id="">--}}
            {{--                <li><input type="checkbox" id="Cipher0" checked="">--}}
            {{--                    <font style="color: RGB(0, 186, 0)">Ordinal</font>--}}
            {{--                </li>--}}
            {{--            </ul>--}}
        </center>
        {{--        <div id="cipherSelectsContainer">--}}
        {{--            <div class="cipherSelects"><button class="buttonFunctionCiphers"--}}
        {{--                                               id="SelectBaseCiphersBtn" onclick="javascript:SelBaseCiphers()">Select--}}
        {{--                    Base</button></div>--}}
        {{--            <div class="cipherSelects"><button class="buttonFunctionCiphers"--}}
        {{--                                               id="SelectAllCiphersBtn" onclick="javascript:SelAllCiphers(true)">Select--}}
        {{--                    All</button></div>--}}
        {{--            <div class="cipherSelects"><button class="buttonFunctionCiphers" id="ClearAllCiphersBtn"--}}
        {{--                                               onclick="javascript:SelAllCiphers(false)">Clear All</button></div>--}}
        {{--        </div>--}}
        <div id="cipherUpdateCancelContainer">
            {{--            <button class="buttonFunctionCiphers" id="SaveCiphers"--}}
            {{--                    onclick="javascript:Close_Ciphers(); jQuery.fancybox.close();">--}}
            {{--                <!--<img decoding="async" src="tools/calculator-advanced/img/save-icon.png" class="imgTop" width="16">-->Update--}}
            {{--            </button>--}}
            <button class="buttonFunctionCiphers" data-fancybox-close="" id="btn_close_cipher_modal">Close</button>
        </div>
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
@endsection

@section('js')
    <script>
        let ciphers = {};

        ciphers['Hebrew Standard'] = {
            'א': 1, 'ב': 2, 'ג': 3, 'ד': 4, 'ה': 5, 'ו': 6, 'ז': 7, 'ח': 8, 'ט': 9, 'י': 10, 'כ': 20,
            'ל': 30, 'מ': 40, 'נ': 50, 'ס': 60, 'ע': 70, 'פ': 80, 'צ': 90, 'ק': 100, 'ר': 200, 'ש': 300, 'ת': 400
        };
        ciphers['Hebrew Ordinal'] = {
            'א': 1, 'ב': 2, 'ג': 3, 'ד': 4, 'ה': 5, 'ו': 6, 'ז': 7, 'ח': 8, 'ט': 9, 'י': 10, 'כ': 11,
            'ל': 12, 'מ': 13, 'נ': 14, 'ס': 15, 'ע': 16, 'פ': 17, 'צ': 18, 'ק': 19, 'ר': 20, 'ש': 21, 'ת': 22
        };
        ciphers['Hebrew Reduction'] = {
            'א': 1, 'ב': 2, 'ג': 3, 'ד': 4, 'ה': 5, 'ו': 6, 'ז': 7, 'ח': 8, 'ט': 9, 'י': 1, 'כ': 2,
            'ל': 3, 'מ': 4, 'נ': 5, 'ס': 6, 'ע': 7, 'פ': 8, 'צ': 9, 'ק': 1, 'ר': 2, 'ש': 3, 'ת': 4
        };
        ciphers['Hebrew Primes'] = {
            'א': 2, 'ב': 3, 'ג': 5, 'ד': 7, 'ה': 11, 'ו': 13, 'ז': 17, 'ח': 19, 'ט': 23, 'י': 29, 'כ': 31,
            'ל': 37, 'מ': 41, 'נ': 43, 'ס': 47, 'ע': 53, 'פ': 59, 'צ': 61, 'ק': 67, 'ר': 71, 'ש': 73, 'ת': 79
        };
        ciphers['Hebrew Trigonal'] = {
            'א': 1, 'ב': 3, 'ג': 6, 'ד': 10, 'ה': 15, 'ו': 21, 'ז': 28, 'ח': 36, 'ט': 45, 'י': 55, 'כ': 66,
            'ל': 78, 'מ': 91, 'נ': 105, 'ס': 120, 'ע': 136, 'פ': 153, 'צ': 171, 'ק': 190, 'ר': 210, 'ש': 231, 'ת': 253
        };
        ciphers['Hebrew Squares'] = {
            'א': 1, 'ב': 4, 'ג': 9, 'ד': 16, 'ה': 25, 'ו': 36, 'ז': 49, 'ח': 64, 'ט': 81, 'י': 100, 'כ': 121,
            'ל': 144, 'מ': 169, 'נ': 196, 'ס': 225, 'ע': 256, 'פ': 289, 'צ': 324, 'ק': 361, 'ר': 400, 'ש': 441, 'ת': 484
        };
        ciphers['Hebrew Mirrors'] = {
            'א': 1, 'ב': 2, 'ג': 3, 'ד': 4, 'ה': 5, 'ו': 6, 'ז': 7, 'ח': 8, 'ט': 9, 'י': 1, 'כ': 11,
            'ל': 21, 'מ': 31, 'נ': 41, 'ס': 51, 'ע': 61, 'פ': 71, 'צ': 81, 'ק': 91, 'ר': 2, 'ש': 12, 'ת': 22
        };
        ciphers['Mispar Gadol'] = {
            'א': 111, 'ב': 412, 'ג': 83, 'ד': 434, 'ה': 6, 'ו': 12, 'ז': 67, 'ח': 418, 'ט': 419, 'י': 20, 'כ': 100,
            'ל': 74, 'מ': 80, 'נ': 106, 'ס': 120, 'ע': 130, 'פ': 81, 'צ': 104, 'ק': 186, 'ר': 510, 'ש': 350, 'ת': 406
        };
        ciphers['AtBash'] = {
            'א': 400, 'ב': 300, 'ג': 200, 'ד': 100, 'ה': 90, 'ו': 80, 'ז': 70, 'ח': 60, 'ט': 50, 'י': 40, 'כ': 30,
            'ל': 20, 'מ': 10, 'נ': 9, 'ס': 8, 'ע': 7, 'פ': 6, 'צ': 5, 'ק': 4, 'ר': 3, 'ש': 2, 'ת': 1
        };
        ciphers['AlBam'] = {
            'א': 30, 'ב': 40, 'ג': 50, 'ד': 60, 'ה': 70, 'ו': 80, 'ז': 90, 'ח': 100, 'ט': 200, 'י': 300, 'כ': 400,
            'ל': 1, 'מ': 2, 'נ': 3, 'ס': 4, 'ע': 5, 'פ': 6, 'צ': 7, 'ק': 8, 'ר': 9, 'ש': 10, 'ת': 20
        };
        ciphers['Mispar Kidmi'] = {
            'א': 1, 'ב': 3, 'ג': 6, 'ד': 10, 'ה': 15, 'ו': 21, 'ז': 28, 'ח': 36, 'ט': 45, 'י': 55, 'כ': 75,
            'ל': 105, 'מ': 145, 'נ': 195, 'ס': 255, 'ע': 325, 'פ': 405, 'צ': 495, 'ק': 595, 'ר': 795, 'ש': 1095, 'ת': 1495
        };
        ciphers['Mispar Neelam'] = {
            'א': 110, 'ב': 410, 'ג': 80, 'ד': 430, 'ה': 1, 'ו': 6, 'ז': 60, 'ח': 418, 'ט': 410, 'י': 10, 'כ': 80,
            'ל': 44, 'מ': 40, 'נ': 56, 'ס': 60, 'ע': 60, 'פ': 1, 'צ': 14, 'ק': 86, 'ר': 310, 'ש': 50, 'ת': 6
        };
        ciphers['Mispar Mispari'] = {
            'א': 13, 'ב': 760, 'ג': 636, 'ד': 273, 'ה': 348, 'ו': 600, 'ז': 372, 'ח': 401, 'ט': 770, 'י': 570, 'כ': 620,
            'ל': 686, 'מ': 323, 'נ': 408, 'ס': 660, 'ע': 422, 'פ': 446, 'צ': 820, 'ק': 46, 'ר': 501, 'ש': 1083, 'ת': 720
        };
        ciphers['Mispar Katan Mispari'] = {
            'א': 4, 'ב': 4, 'ג': 6, 'ד': 3, 'ה': 6, 'ו': 6, 'ז': 3, 'ח': 5, 'ט': 5, 'י': 3, 'כ': 8,
            'ל': 2, 'מ': 8, 'נ': 13, 'ס': 13, 'ע': 8, 'פ': 5, 'צ': 1, 'ק': 1, 'ר': 6, 'ש': 3, 'ת': 9
        };
        ciphers['AchBi'] = {
            'א': 20, 'ב': 10, 'ג': 9, 'ד': 8, 'ה': 7, 'ו': 8, 'ז': 5, 'ח': 4, 'ט': 3, 'י': 2, 'כ': 1,
            'ל': 400, 'מ': 300, 'נ': 200, 'ס': 100, 'ע': 90, 'פ': 80, 'צ': 70, 'ק': 60, 'ר': 50, 'ש': 40, 'ת': 30
        };
        ciphers['Ofanim'] = {
            'א': 80, 'ב': 400, 'ג': 30, 'ד': 400, 'ה': 1, 'ו': 6, 'ז': 50, 'ח': 400, 'ט': 400, 'י': 4, 'כ': 80,
            'ל': 4, 'מ': 40, 'נ': 50, 'ס': 20, 'ע': 50, 'פ': 1, 'צ': 10, 'ק': 80, 'ר': 300, 'ש': 50, 'ת': 6
        };
        ciphers['Avgad'] = {
            'א': 2, 'ב': 3, 'ג': 4, 'ד': 5, 'ה': 6, 'ו': 7, 'ז': 8, 'ח': 9, 'ט': 10, 'י': 20, 'כ': 30,
            'ל': 40, 'מ': 50, 'נ': 60, 'ס': 70, 'ע': 80, 'פ': 90, 'צ': 100, 'ק': 200, 'ר': 300, 'ש': 400, 'ת': 1
        };
        ciphers['Reverse Avgad'] = {
            'א': 400, 'ב': 1, 'ג': 2, 'ד': 3, 'ה': 4, 'ו': 5, 'ז': 6, 'ח': 7, 'ט': 8, 'י': 9, 'כ': 10,
            'ל': 20, 'מ': 30, 'נ': 40, 'ס': 50, 'ע': 60, 'פ': 70, 'צ': 80, 'ק': 90, 'ר': 100, 'ש': 200, 'ת': 300
        };

        let active_cipher = 'Hebrew Standard';

        let selected_ciphers = JSON.parse('@json(session()->get('hebrew_selected_ciphers'))');

        let cipher_colors = {
            'Hebrew Standard': '#ffe35d',
            'Hebrew Ordinal': '#ffd124',
            'Hebrew Reduction': '#f7bd02',
            'Hebrew Primes': '#f7bd02',
            'Hebrew Trigonal': '#f7bd02',
            'Hebrew Squares': '#f7bd02',
            'Hebrew Mirrors': '#f7bd02',
            'Mispar Gadol': '#f7bd02',
            'AtBash': '#f7bd02',
            'AlBam': '#f7bd02',
            'Mispar Kidmi': '#f7bd02',
            'Mispar Neelam': '#f7bd02',
            'Mispar Mispari': '#f7bd02',
            'Mispar Katan Mispari': '#f7bd02',
            'AchBi': '#f7bd02',
            'Ofanim': '#f7bd02',
            'Avgad': '#f7bd02',
            'Reverse Avgad': '#f7bd02',
        };

        function calculate_cipher (string, cipher_mapping) {
            let total = 0;
            for (const char of string) {
                total += (cipher_mapping[char] ?? 0);
            }

            return total;
        }

        function generate_cipher_table () {
            $('#tr_cipher_names').html('');
            $('#tr_cipher_values').html('');
            for (const cipher of selected_ciphers) {
                $('#tr_cipher_names').append(`<td class="GemTableHeader">
                                                <div class="GemTableHeader">
                                                    <font class="justfont" style="color: `+cipher_colors[cipher]+`" data-name="`+cipher+`">`+cipher+`</font>
                                                </div>
                                            </td>`);

                $('#tr_cipher_values').append(`<td class="GemTableValue InSeqList">
                                                    <font style="color: `+cipher_colors[cipher]+`;">
                                                        <div class="NumberClass"><b class="justnumber target_number" data-name="`+cipher+`">0</b></div>
                                                    </font>
                                                </td>`);
            }
        }

        function generate_cipher_queue (string) {
            let total = 0;
            let cipher_queue = [];
            for (const char of string) {
                let res = ciphers[active_cipher][char];
                if (res) {
                    total += res;
                    cipher_queue.push({
                        key: char,
                        value: res,
                    });
                }
            }

            $('#tbody_cipher_queue').html('');
            let first_string = '';
            let second_string = '';
            if (total > 0) {
                for(const item of cipher_queue) {
                    first_string += `<td class="BreakCharNG">`+item.key+`</td>`;
                    second_string += `<td class="BreakValue">`+item.value+`</td>`;
                }
                first_string += `<td class="BreakTotal" rowspan="2">
                                        <font style="color: `+cipher_colors[active_cipher]+`;">
                                            <div class="NumberClass view-number">`+total+`</div>
                                        </font>
                                    </td>`;
                first_string = `<tr>`+first_string+`</tr>`;
                second_string = `<tr>`+second_string+`</tr>`;
            }
            $('#tbody_cipher_queue').append(first_string);
            $('#tbody_cipher_queue').append(second_string);

            return true;
        }

        function countWordsAndLetters(str) {
            // Remove extra spaces and split the string by spaces to count words
            const words = str.trim().split(/\s+/);

            // Filter out empty words in case the string has extra spaces
            const wordCount = words.filter(word => word !== "").length;

            // Remove all spaces to count letters only
            const letterCount = str.replace(/\s+/g, '').length;

            $('#div_words_and_letters').text('('+wordCount+' word'+ ((wordCount > 1) ? 's' : '') +', '+letterCount+' letter'+ ((letterCount > 1) ? 's' : '') +')');
        }

        function generate_cipher_alphabet () {
            $('#tr_alphabet_keys').html('');
            $('#tr_alphabet_values').html('');

            for (const alphabet of Object.keys(ciphers[active_cipher])) {
                $('#tr_alphabet_keys').append(`<td class="chartChar">`+alphabet+`</td>`);
            }

            for (const value of Object.values(ciphers[active_cipher])) {
                $('#tr_alphabet_values').append(`<td class="chartVal">`+value+`</td>`);
            }

            $('#tr_cipher_name').html(`<font id="cipherTitleFont" style="color: `+cipher_colors[active_cipher]+`;">`+active_cipher+`</font>`);
        }

        function activate_cipher (cipher_name) {
            active_cipher = cipher_name;

            generate_cipher_queue($('#EntryField').val());

            generate_cipher_alphabet();
        }

        function populate_cipher_modal() {
            // row_cipher_modal
            $('#row_cipher_modal').html('');
            for (const cipher_name of Object.keys(ciphers)) {
                let checked_string = (selected_ciphers.includes(cipher_name)) ? `checked` : ``;

                $('#row_cipher_modal').append(`<div class="col-md-3">
                                                    <input type="checkbox" class="input_select_cipher" `+checked_string+` data-name="`+cipher_name+`">
                                                    <font style="color: `+cipher_colors[cipher_name]+`;">`+cipher_name+`</font>
                                                </div>`);
            }
        }

        // Main function to calculate all values
        function calculateGematria(word) {
            for (const selected_cipher of selected_ciphers) {
                let cipher_res =  calculate_cipher(word, ciphers[selected_cipher]);

                $('.justnumber').each((i, item) => {
                    if ($(item).data('name') == selected_cipher) {
                        $(item).text(cipher_res);
                    }
                });
            }
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

        function number_properties (number) {
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
                string += '<b class="Linkable"><a href="javascript:void(0);" class="target_number">'+item+'</a></b>' + (count === return_body.divisors.length ? '' : ',&nbsp;');
            }
            if (return_body.composite != '') {
                string += '<br>';
                string += '<b class="Linkable">'+return_body.composite+'</b>';
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
            populate_cipher_modal();
            generate_cipher_table();
            generate_cipher_alphabet();

            $('#EntryField').on('keyup', function () {
                let val = $(this).val();

                countWordsAndLetters(val);
                generate_cipher_queue(val);
                calculateGematria(val);

                return true;
            });

            $('body').on('click', '.justfont', function () {
                activate_cipher($(this).data('name'));
            })

            $('.input_select_cipher').on('click', function () {
                let new_selected_ciphers = [];

                $('.input_select_cipher').each((i, item) => {
                    if ($(item).is(':checked')) {
                        new_selected_ciphers.push($(item).data('name'));
                    }
                });

                //ajax call
                $.ajax({
                    url: '{{route("mutate-session")}}',
                    method: 'GET',
                    data: {
                        key: 'hebrew_selected_ciphers',
                        value: new_selected_ciphers,
                    },
                    success: (data) => {

                    }
                });

                selected_ciphers = new_selected_ciphers;
                generate_cipher_table();
                generate_cipher_alphabet();
                calculateGematria( $('#EntryField').val());
                let ac = $(this).is(':checked') ? $(this).data('name') : new_selected_ciphers[0];
                activate_cipher(ac);
            });

            $('#btn_get_properties').on('click', function () {
                let val = $('#input_get_properties').val();

                if (val < 1 || val == '') {
                    return false;
                }

                number_properties(val);
            });

            $('body').on('click', '.target_number', function () {
                number_properties($(this).text());
            });
        });
    </script>
@endsection


