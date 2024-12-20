@extends('layouts.app')

@section('title', 'Greek calculator')

@php
    if (!session()->has('greek_selected_ciphers')) {
        session()->put('greek_selected_ciphers', [
            'Greek Isopsephy',
            'Greek Ordinal',
            'Greek Reduction'
        ]);
    }
@endphp

@section('css')
    <link rel="stylesheet" href="{{asset('css/numberstyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/advcalcstyles-1-00012.css')}}">
    <style>
        .modal-backdrop.show {
            opacity: 0 !important;
        }

        .calculator-data-show {
            margin: 40px 0;
            /* padding: 20px 20px; */
            /* border: 2px solid orange; */
            border-radius: 5px;
            padding-bottom: 5px;
            text-align: center;
            margin-bottom: 10px;
        }

        .data-ciphers {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column-reverse;
            gap: 10px;
            height: 100px;
            border: 2px solid #7fbe00;
            padding: 10px 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .chiphers-info h5 {
            margin: 0;
            color: white;
            font-size: 12px;
            /* font-family: "Lato"; */
            /* font-weight: 700; */
        }

        .chiphers-data-number p {
            margin: 0;
            color: white;
            font-size: 25px;
            /* font-family: "Lato"; */
            /* font-weight: 600;*/
        }

        .calculator-data-show .row {
            justify-content: center;
        }

        .calcMenuItem {
            color: #64e2e2 !important;
            font-size: 25px;
        }

        #EntryDiv #EntryField {
            height: 50px;
            padding: 0 15px;
            outline: none !important;
            border: 2px solid #7fbe00;
            width: 50%;
            margin-bottom: 10px;
        }

        #EntryDiv #EntryField::placeholder {
            color: white;
            text-transform: uppercase;
            font-size: 18px;
        }
    </style>
@endsection

@section('content')
    <section class="calculator-meter">
        <div class="container">
            <div class="row">
                {{--new boxes--}}
                <div class="col-lg-12">
                    <div class="calculator-data-show">
                        <div class="row" id="row_new_cipher_boxes">

                        </div>
                    </div>
                </div>
            </div>

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

            <div class="row mb-2 text-center">
                <div class="col-lg-12">
                    <div id="EntryDiv">
                        <!-- <button id="arrowDown" class="mo"><i class="fa fa-arrow-circle-left" style="font-size:38px"></i></button> -->
                        {{-- <input id="EntryField" class="" autofocus="" type="text" autocomplete="off" oninput="FieldChange(EntryValue())" onkeydown="navHistTable(event)" ondrop="BuildFromText(event)" ondragenter="ShowDropTarget()" ondragleave="RemoveDropTarget()" ondragexit="RemoveDropTarget()" placeholder="Enter Word, Phrase, or #(s):"> --}}
                        <input id="EntryField" class="" autofocus="" type="text" autocomplete="off" placeholder="Enter Word, Phrase, or #(s):">
                        <!-- <button id="arrowDown" class="mo"><i class="fa fa-arrow-circle-right" style="font-size:38px"></i></button> -->
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div style="display:table; margin: auto; max-width: 1331px; margin-top:3px">
                    <div id="printBreakTable" style="display:table-cell; width: 100%;">
                        <div id="watermarkBreakGuy" style="display:none;"><img decoding="async" src="/tools/calculator-advanced/img/gem-guy-flip.png" alt="gematrinator" width="28" style="margin-top: 10px; margin-right:0px; float:right; opacity:.25;">
                        </div>
                        <center id="center_printBreakTable">
                            <input type="hidden" name="cipher_id" id="cipher_id" value="D0">
                            <table id="breakdownCipherLabel" style="width:100%; display: inline;">
                                <tbody>
                                    <tr class="text-center">
                                        <td id="tr_cipher_queue">

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <table id="breakdownCipherLabel" style="width:100%; display: inline;">
                                <tbody>
                                    <tr class="text-center">
                                        <td id="td_cipher_queues_wrapper">
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

                        @if($breakdown_screenshot == true)
                            <center>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="#" id="btn_breakdown_screenshot" hidden>Screenshot</a>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        @endif
                        <span id="watermarkBreakText" style="display:none; float: right; margin-right: 0px; margin-top: -18px;opacity:.25;position: relative; "><img decoding="async" src="/tools/calculator-advanced/img/gematrinator-just-text-200px.png" alt="gematrinator logo" width="85"></span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="WordLetterCount text-center">
                    <div class="WordLetterCount para white text-center" id="div_words_and_letters">(0 words, 0 letters)</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="ChartSpot">
                    <table style="border-radius: 5px; padding: 20px;">
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
                    <center id="center_number_properties" hidden>
                        <div id="MiscSpot"><button class="buttonFunction" onclick="Build_HistoryTable()">Show
                                History</button><br>
                            <object id="numberProperty" type="text/html" data="tools/number-properties-inline/index.php?number=18#numPropAnchor">

                                <div id="numPropAnchor">
                                    <div id="numPropContainer">
                                        <center>
                                            <h2 style="text-transform: uppercase;">Number Properties of:
                                            </h2>
                                            <div id="HTMLSpot">
                                                <table id="TopTable">
                                                    <tbody>
                                                    <tr>
                                                        <td id="TopNumber" style="font-size: 40px !important;"></td>
                                                    </tr>
                                                    {{--                                                                    <tr>--}}
                                                    {{--                                                                        <td id="PrimeString" colspan="3">2 ×--}}
                                                    {{--                                                                            3<sup>2</sup>--}}
                                                    {{--                                                                        </td>--}}
                                                    {{--                                                                    </tr>--}}
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
                                                                <td style="vertical-align: top"><b class="Linkable" id="count"></b></td>
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
                                                                <td style="vertical-align: top"><b class="Linkable" id="sum"></b>
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
                                                                <td class="RelativeClass"> Prime #:
                                                                    &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_prime"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Composite #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_composite"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Fibonacci #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_fibonacci"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Triangular #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_triangular"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Square #:
                                                                    &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="square"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Cube #:
                                                                    &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="cube"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Tetrahedral
                                                                    #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_tetrahedral"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Square Pyramidal #: &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_sq_pyramidal"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Star #:
                                                                    &nbsp;
                                                                </td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_star"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="RelativeClass"> Pentagonal #:
                                                                    &nbsp;</td>
                                                                <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="nth_pentagonal"></a></b>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ConversionsTableDiv"><span class="titles">Conversions</span>
                                                        <table id="ConversionTable">
                                                            <tbody>
                                                            <tr>
                                                                {{--                                                                                <td>From:</td>--}}
                                                                <td class="conversionMiddle">Numeral
                                                                    system:
                                                                </td>
                                                                <td>To:</td>
                                                            </tr>
                                                            <tr>
                                                                {{--                                                                                <td>-</td>--}}
                                                                <td>Octal</td>
                                                                <td><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="octal"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                {{--                                                                                <td><b class="Linkable"><a href="javascript:void(0);">20</a></b></td>--}}
                                                                <td>Duodecimal</td>
                                                                <td><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="duodecimal"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                {{--                                                                                <td><b class="Linkable"><a href="javascript:void(0);">24</a></b></td>--}}
                                                                <td>Hexadecimal</td>
                                                                <td><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="hexadecimal"></a></b>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                {{--                                                                                <td>-</td>--}}
                                                                <td>Binary</td>
                                                                <td><b class="Linkable"><a href="javascript:void(0);" class="target_number" id="binary"></a></b>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <input tabindex="0" id="input_get_properties" autofocus="" type="number" placeholder="Enter #">
                                            <br><br>
                                            <button tabindex="1" id="btn_get_properties" class="buttonFunction">Get Properties</button>
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
    <div id="ciphMod" class="ciphMod fancybox-content" style="display: none; margin-bottom: 6px; background-color: black !important;">
        <center>
            <h2 id="toph2">Ciphers</h2>
{{--            <span id="cipherHelpText">Can't find a cipher? <a--}}
{{--                        href="{{route('faq')}}">See the FAQ</a> or <a--}}
{{--                        href="{{route('home')}}">Ciphers</a> page.</span>--}}
            <br><br class="no-mo">
            <div class="row">
                <div class="col-md-12">
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
        trackTimeSpent('greek_calculator', "{{ route('log.time.spent') }}", "{{ csrf_token() }}");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btn_breakdown_screenshot').on('click', function() {
                if ($('#td_cipher_queues_wrapper').html() == '') {
                    return false;
                }

                html2canvas(document.querySelector('#center_printBreakTable'), {
                    backgroundColor: '#000' // Set the background color to black
                }).then(function(canvas) {
                    // Convert canvas to a data URL (base64 image)
                    var imageURL = canvas.toDataURL("image/png");

                    // Create a temporary link element for downloading
                    var link = document.createElement('a');
                    link.href = imageURL;
                    link.download = 'capture.png'; // Specify the download file name

                    // Trigger the download by simulating a click on the link
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });
            });
        });
    </script>

    <script>
        let ciphers = {};

        ciphers['Greek Isopsephy'] = {
            'Α': 1,  'Β': 2,  'Γ': 3,  'Δ': 4,  'Ε': 5,  'Ϝ': 6,  'Ζ': 7,  'Η': 8,  'Θ': 9,
            'Ι': 10, 'Κ': 20, 'Λ': 30, 'Μ': 40, 'Ν': 50, 'Ξ': 60, 'Ο': 70, 'Π': 80, 'Ϙ': 90,
            'Ρ': 100, 'Σ': 200, 'Τ': 300, 'Υ': 400, 'Φ': 500, 'Χ': 600, 'Ψ': 700, 'Ω': 800, 'ϡ': 900,
            '0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9
        };
        ciphers['Greek Ordinal'] = {
            'Α': 1,  'Β': 2,  'Γ': 3,  'Δ': 4,  'Ε': 5,  'Ϝ': 6,  'Ζ': 7,  'Η': 8,  'Θ': 9,
            'Ι': 10, 'Κ': 11, 'Λ': 12, 'Μ': 13, 'Ν': 14, 'Ξ': 15, 'Ο': 16, 'Π': 17, 'Ϙ': 18,
            'Ρ': 19, 'Σ': 20, 'Τ': 21, 'Υ': 22, 'Φ': 23, 'Χ': 24, 'Ψ': 25, 'Ω': 26, 'ϡ': 27,
            '0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9
        };
        ciphers['Greek Reduction'] = {
            'Α': 1,  'Β': 2,  'Γ': 3,  'Δ': 4,  'Ε': 5,  'Ϝ': 6,  'Ζ': 7,  'Η': 8,  'Θ': 9,
            'Ι': 1, 'Κ': 2, 'Λ': 3, 'Μ': 4, 'Ν': 5, 'Ξ': 6, 'Ο': 7, 'Π': 8, 'Ϙ': 9,
            'Ρ': 1, 'Σ': 2, 'Τ': 3, 'Υ': 4, 'Φ': 5, 'Χ': 6, 'Ψ': 7, 'Ω': 8, 'ϡ': 9,
            '0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9
        };
        ciphers['Greek Primes'] = {
            'Α': 2,  'Β': 3,  'Γ': 5,  'Δ': 7,  'Ε': 11,  'Ϝ': 13,  'Ζ': 17,  'Η': 19,  'Θ': 23,
            'Ι': 29, 'Κ': 31, 'Λ': 37, 'Μ': 41, 'Ν': 43, 'Ξ': 47, 'Ο': 53, 'Π': 59, 'Ϙ': 61,
            'Ρ': 67, 'Σ': 71, 'Τ': 73, 'Υ': 79, 'Φ': 83, 'Χ': 89, 'Ψ': 97, 'Ω': 101, 'ϡ': 103,
            '0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9
        };
        ciphers['Greek Trigonal'] = {
            'Α': 1,  'Β': 3,  'Γ': 6,  'Δ': 10,  'Ε': 15,  'Ϝ': 21,  'Ζ': 28,  'Η': 36,  'Θ': 45,
            'Ι': 55, 'Κ': 66, 'Λ': 78, 'Μ': 91, 'Ν': 105, 'Ξ': 120, 'Ο': 136, 'Π': 153, 'Ϙ': 171,
            'Ρ': 190, 'Σ': 210, 'Τ': 231, 'Υ': 253, 'Φ': 276, 'Χ': 300, 'Ψ': 325, 'Ω': 351, 'ϡ': 378,
            '0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9
        };
        ciphers['Greek Squares'] = {
            'Α': 1,  'Β': 4,  'Γ': 9,  'Δ': 16,  'Ε': 25,  'Ϝ': 36,  'Ζ': 49,  'Η': 64,  'Θ': 81,
            'Ι': 100, 'Κ': 121, 'Λ': 144, 'Μ': 169, 'Ν': 196, 'Ξ': 225, 'Ο': 256, 'Π': 289, 'Ϙ': 324,
            'Ρ': 361, 'Σ': 400, 'Τ': 441, 'Υ': 484, 'Φ': 529, 'Χ': 576, 'Ψ': 625, 'Ω': 676, 'ϡ': 729,
            '0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9
        };
        ciphers['Greek Mirrors'] = {
            'Α': 1,  'Β': 2,  'Γ': 3,  'Δ': 4,  'Ε': 5,  'Ϝ': 6,  'Ζ': 7,  'Η': 8,  'Θ': 9,
            'Ι': 1, 'Κ': 11, 'Λ': 21, 'Μ': 31, 'Ν': 41, 'Ξ': 51, 'Ο': 61, 'Π': 71, 'Ϙ': 81,
            'Ρ': 91, 'Σ': 2, 'Τ': 12, 'Υ': 22, 'Φ': 32, 'Χ': 42, 'Ψ': 52, 'Ω': 62, 'ϡ': 72,
            '0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9
        };

        let active_cipher = 'Greek Ordinal';

        let selected_ciphers = JSON.parse('@json(session()->get('greek_selected_ciphers'))');

        let cipher_colors = {
            'Greek Isopsephy': '#83bf9a',
            'Greek Ordinal': '#8dbe83',
            'Greek Reduction': '#93bfa1',
            'Greek Primes': '#c8c8ff',
            'Greek Trigonal': '#c8c8ff',
            'Greek Squares': '#c8c8ff',
            'Greek Mirrors': '#c8c8ff',
        };

        function calculate_cipher (string, cipher_mapping) {
            let total = 0;
            for (const char of string) {
                total += (cipher_mapping[char] ?? 0);
            }

            return total;
        }

        function generate_cipher_table () {
            $('#row_new_cipher_boxes').html('');
            for (const cipher of selected_ciphers) {
                let final_string = `<div class="col-lg-1 col-4 col-md-3 pl-1 pr-1">
                                        <div class="data-ciphers" style="border-color: `+cipher_colors[cipher]+`;" data-name="`+cipher+`">
                                            <div class="chiphers-info">
                                                <h5 class="justfont" style="color: `+cipher_colors[cipher]+`;  cursor: pointer;" data-name="`+cipher+`">`+cipher+`</h5>
                                            </div>
                                            <div class="chiphers-data-number">
                                                <p class="target_number justnumber" style="color: `+cipher_colors[cipher]+`; cursor: pointer;" data-name="`+cipher+`">0</p>
                                            </div>
                                        </div>
                                    </div>`

                $('#row_new_cipher_boxes').append(final_string);
            }
        }

        function generate_word_queue (word, is_last_word = false, grand_total = 0, total_word_count) {
            let total = 0;
            let characters_string = ``;
            let values_string = ``;

            for (const char of word) {
                let res = ciphers[active_cipher][char];
                if (res) {
                    total += res;
                    characters_string += `<td class="BreakCharNG">`+char+`</td>`;
                    values_string += `<td class="BreakValue">`+res+`</td>`;
                }
            }

            if (total > 0 && total_word_count > 1) {
                characters_string += `<td class="BreakSum target_number" rowspan="2" style="cursor: pointer;">
                                            <font style="color: `+cipher_colors[active_cipher]+`;">
                                                <div class="NumberClass" style="cursor: pointer;">`+total+`</div>
                                            </font>
                                        </td>`;
            }


            if (is_last_word) {
                characters_string += `<td class="BreakTotal target_number" rowspan="2" style="cursor: pointer;">
                                            <font style="color: `+cipher_colors[active_cipher]+`;">
                                                <div class="NumberClass view-number target_number" style="cursor: pointer;">`+grand_total+`</div>
                                            </font>
                                        </td>`;
            }

            characters_string = `<tr>`+characters_string+`</tr>`;
            values_string = `<tr style="font-size: 12px;">`+values_string+`</tr>`;

            return `<table class="BreakTable">
                                    <tbody>
                                        `+characters_string+`
                                        `+values_string+`
                                    </tbody>
                                </table>`;
        }

        function generate_cipher_queue (string) {
            let total = 0;
            for (const char of string) {
                let res = ciphers[active_cipher][char];
                if (res) {
                    total += res;
                }
            }

            $('#td_cipher_queues_wrapper').html('');
            $('#tr_cipher_queue').html('');
            $('#btn_breakdown_screenshot').prop('hidden', true);

            let words_array = string.split(/\s+/);
            let queue_html = ``;

            words_array.forEach((word, i) => {
                queue_html += generate_word_queue(word, ((i + 1) === words_array.length), ((i + 1) === words_array.length ? total : 0), words_array.length);
            });

            if (total > 0) {

                $('#btn_breakdown_screenshot').prop('hidden', false);
                $('#td_cipher_queues_wrapper').html(queue_html);
                $('#tr_cipher_queue').html(`<span class="nextGenText">"`+string+`" =
                                                <font style="color: `+cipher_colors[active_cipher]+`;">
                                                    <div class="NumberClass view-number target_number" style="cursor: pointer;">`+total+`</div>
                                                </font>
                                                <font style="color: `+cipher_colors[active_cipher]+`;">(`+active_cipher+`)</font>
                                            </span>
                                            <br>`);
            }

            return true;
        }

        function countWordsAndLetters(str) {
            // Remove extra spaces and split the string by spaces to count words
            const words = str.trim().split(/\s+/);

            // Filter out empty words in case the string has extra spaces
            const wordCount = words.filter(word => word !== "").length;

            // Remove all spaces to count letters only
            const letterCount = str.replace(/\s+/g, '').length;

            $('#div_words_and_letters').text('('+wordCount+' word'+ ((wordCount > 1 || wordCount == 0) ? 's' : '') +', '+letterCount+' letter'+ ((letterCount > 1 || letterCount == 0) ? 's' : '') +')');
        }

        function generate_cipher_alphabet () {
            $('#tr_alphabet_keys').html('');
            $('#tr_alphabet_values').html('');

            for (const alphabet of Object.keys(ciphers[active_cipher]).slice(10)) {
                $('#tr_alphabet_keys').append(`<td class="chartChar">`+alphabet+`</td>`);
            }

            for (const value of Object.values(ciphers[active_cipher]).slice(10)) {
                $('#tr_alphabet_values').append(`<td class="chartVal">`+value+`</td>`);
            }

            $('#tr_cipher_name').html(`<font id="cipherTitleFont" style="color: `+cipher_colors[active_cipher]+`;">`+active_cipher+`</font>`);

            $('#ChartSpot').find('table').css('border', '2px solid ' + cipher_colors[active_cipher]);
        }

        function activate_cipher (cipher_name) {
            active_cipher = cipher_name;

            $('.data-ciphers').each((i, item) => {
                $(item).css('box-shadow', 'none');
                $(item).css('text-shadow', 'none');
            });

            $('.data-ciphers[data-name="'+active_cipher+'"]').css('box-shadow', cipher_colors[active_cipher]+' 0 0 8px 1px');
            $('.data-ciphers[data-name="'+active_cipher+'"]').css('text-shadow', cipher_colors[active_cipher]+' 0 0 8px');

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

                $(`.justnumber[data-name="${selected_cipher}"]`).text(cipher_res);
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
            activate_cipher(active_cipher);

            $('#EntryField').on('keyup', function () {
                let val = $(this).val();

                countWordsAndLetters(val);
                generate_cipher_queue(val);
                calculateGematria(val);

                return true;
            });

            let temp_cipher = '';
            $('body').on('click', '.justfont', function () {
                temp_cipher = $(this).data('name');
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
                        key: 'greek_selected_ciphers',
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

            $('body').on('mouseenter', '.data-ciphers', function () {
                temp_cipher = active_cipher;
                activate_cipher($(this).data('name'));
            });

            $('body').on('mouseleave', '.data-ciphers', function () {
                activate_cipher(temp_cipher);
            });
        });
    </script>
@endsection


