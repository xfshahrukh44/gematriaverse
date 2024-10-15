<section class="calculator-meter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="MainTableRow">
                    <div id="MainTable">
                        <div id="Gematria_Table">
                            <table id="GemTable">
                                <tbody>
                                    @foreach (array_chunk($ciphers, 5) as $cipherChunk)
                                        <tr>
                                            @foreach ($cipherChunk as $index => $cipher)
                                                @php
                                                    $rgb = json_decode($cipher['rgb_values'], true);
                                                    $red = $rgb['red'] ?? 0;
                                                    $green = $rgb['green'] ?? 0;
                                                    $blue = $rgb['blue'] ?? 0;
                                                @endphp
                                                <td class="GemTableHeader">
                                                    <div class="GemTableHeader change-cipher" data-id="{{ $cipher['id'] }}" onclick="MoveCipherClick('{{ $cipher['id'] }}', event)">
                                                        <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">{{ $cipher['name'] }}</font>
                                                    </div>
                                                </td>
                                            @endforeach

                                            @for ($i = count($cipherChunk); $i < 5; $i++)
                                                <td class="GemTableHeader" style="display: none;">
                                                    <!-- Empty placeholder if fewer than 5 ciphers in this row -->
                                                </td>
                                            @endfor
                                        </tr>

                                        <tr>
                                            @foreach ($cipherChunk as $index => $cipher)
                                                @php
                                                    $rgb = json_decode($cipher['rgb_values'], true);
                                                    $red = $rgb['red'] ?? 0;
                                                    $green = $rgb['green'] ?? 0;
                                                    $blue = $rgb['blue'] ?? 0;
                                                @endphp
                                                <td class="GemTableValue" id="TableValue_{{ $cipher['name'] }}">
                                                    <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                        <div class="NumberClass">
                                                            @if ($cipher['id'] == 'D0')
                                                                <b id="ordinal" class="justnumber" onclick="Open_Properties(0)">0</b>
                                                            @elseif($cipher['id'] == 'D1')
                                                                <b id="reduction" class="justnumber" onclick="Open_Properties(1)">0</b>
                                                            @elseif($cipher['id'] == 'D2')
                                                                <b id="reverse" class="justnumber" onclick="Open_Properties(2)">0</b>
                                                            @elseif($cipher['id'] == 'D3')
                                                                <b id="reverse_reduction" class="justnumber" onclick="Open_Properties(3)">0</b>
                                                            @else
                                                                <b id="cipher_{{ $cipher['id'] }}" class="justnumber target_number" onclick="Open_Properties({{ $cipher['id'] }})">0</b>
                                                            @endif
                                                        </div>
                                                    </font>
                                                </td>
                                            @endforeach

                                            @for ($i = count($cipherChunk); $i < 5; $i++)
                                                <td class="GemTableValue" style="display: none;">
                                                    <!-- Empty placeholder if fewer than 5 values in this row -->
                                                </td>
                                            @endfor
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        @foreach ($ciphers as $cipher)
                                            @php
                                                $rgb = json_decode($cipher['rgb_values'], true);
                                                $red = $rgb['red'] ?? 0;
                                                $green = $rgb['green'] ?? 0;
                                                $blue = $rgb['blue'] ?? 0;
                                            @endphp
                                            <td class="GemTableHeader">
                                                <div class="GemTableHeader change-cipher" data-id="{{ $cipher['id'] }}" onclick="MoveCipherClick('{{ $cipher['id'] }}', event)">
                                                    <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                        {{ $cipher['name'] }}
                                                    </font>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        @foreach ($ciphers as $cipher)
                                            @php
                                                $rgb = json_decode($cipher['rgb_values'], true);
                                                $red = $rgb['red'] ?? 0;
                                                $green = $rgb['green'] ?? 0;
                                                $blue = $rgb['blue'] ?? 0;
                                            @endphp
                                            <td class="GemTableValue" id="TableValue_{{ $cipher['name'] }}">
                                                <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                    <div class="NumberClass">
                                                        @if ($cipher['id'] == 'D0')
                                                            <b id="finalBreakNum" class="justnumber" onclick="Open_Properties(0)">0</b>
                                                        @elseif($cipher['id'] == 'D1')
                                                            <b id="finalBreakNum" class="justnumber" onclick="Open_Properties(1)">0</b>
                                                        @elseif($cipher['id'] == 'D2')
                                                            <b id="finalBreakNum" class="justnumber" onclick="Open_Properties(2)">0</b>
                                                        @elseif($cipher['id'] == 'D3')
                                                            <b id="finalBreakNum" class="justnumber" onclick="Open_Properties(3)">0</b>
                                                        @else
                                                            <b id="cipher_{{ $cipher['id'] }}" class="justnumber target_number" onclick="Open_Properties({{ $cipher['id'] }})">0</b>
                                                        @endif
                                                    </div>
                                                </font>
                                            </td>
                                        @endforeach
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--            <div class="row justify-content-center">--}}
{{--                <div id="WordLetterCount text-center">--}}
{{--                    <div class="WordLetterCount para white">(0 words, 0 letters)</div>--}}
{{--                </div>--}}
{{--            </div>--}}
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
                        // const maxHistory = 1000,
                        //     HistoryEnabled = true,
                        //     TablesEnabled = true
                    </script>
                    <link rel="stylesheet" type="text/css" href="{{ asset('css/advcalcstyles-1-00012.css') }}">
                    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                    <script src="js/cipherbuilder.js"></script>
                    <script src="js/html2canvas.min.js"></script>
                    <script src="js/load.js"></script> -->

                    <div id="calculator-advanced">
                        <!-- FIRST ROW -->
                        <div id="FirstRow" class="row">
                            <div id="MainCol">
                                <!-- Calculator (Above) 1 -->

                                <!-- MOBILE MENU SECTION -->
                                <div id="menu-dynamic">
                                    <div id="calc-menu">
                                        <a data-fancybox="" class="MenuLink" href="#ciphMod">
                                            Ciphers&nbsp;
                                        </a>
                                        {{-- <span>|</span>
                                        <a id="optionsBtn" class="MenuLink" onclick="javascript:Open_Options()" data-fancybox="dialog" data-src="#optionsMod">
                                            <span class="calcMenuItem">Options&nbsp;</span>
                                        </a>
                                        <span>|</span>
                                        <a id="shortcutsBtn" class="MenuLink" data-fancybox="shortcuts" data-src="#shortcutsMod">
                                            <span class="calcMenuItem">Shortcuts</span>
                                        </a> --}}
                                    </div>
                                </div>

                                <!-- END MENU SECTION -->
                                <!-- ENTRY SECTION -->
                                <div id="EntryDiv">
                                    <!-- <button id="arrowDown" class="mo"><i class="fa fa-arrow-circle-left" style="font-size:38px"></i></button> -->
{{--                                        <input id="EntryField" class="" autofocus="" type="text" autocomplete="off" oninput="FieldChange(EntryValue())" onkeydown="navHistTable(event)" ondrop="BuildFromText(event)" ondragenter="ShowDropTarget()" ondragleave="RemoveDropTarget()" ondragexit="RemoveDropTarget()" placeholder="Enter Word, Phrase, or #(s):">--}}
                                    <input id="EntryField" class="" autofocus="" type="text" autocomplete="off" placeholder="Enter Word, Phrase, or #(s):">
                                    <!-- <button id="arrowDown" class="mo"><i class="fa fa-arrow-circle-right" style="font-size:38px"></i></button> -->
                                </div>
                                <br>
                            </div>
                        </div>
                        <!-- END FIRST ROW -->
                        <!-- SECOND ROW -->
                        <div class="row">
                            <div id="breakdownSection" class="col-sm-12">
                                <!-- BREAKDOWN SECTION -->
                                <span id="SimpleSpot" class="nextGenText"></span>
                                <div style="display:table; margin: auto; max-width: 1331px; margin-top:3px">
                                    <div id="printBreakTable" style="display:table-cell; width: 100%;">
                                        <div id="watermarkBreakGuy" style="display:none;"><img decoding="async" src=/tools/calculator-advanced/img/gem-guy-flip.png alt="gematrinator" width="28" style="margin-top: 10px; margin-right:0px; float:right; opacity:.25;">
                                        </div>
                                        <center id="center_printBreakTable">
                                            <input type="hidden" name="cipher_id" id="cipher_id" value="">
                                            <table id="breakdownCipherLabel" style="width:100%; display: inline;"></table>
                                        </center>
                                        @if($breakdown_screenshot == true)
                                            <center>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <a href="#" id="btn_breakdown_screenshot">Screenshot</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>
                                        @endif
                                        <span id="watermarkBreakText" style="display:none; float: right; margin-right: 0px; margin-top: -18px;opacity:.25;position: relative; "><img decoding="async" src=/tools/calculator-advanced/img/gematrinator-just-text-200px.png alt="gematrinator logo" width="85"></span>
                                    </div>
                                </div>
                                <div id="WordLetterCount">
                                    <div class="WordLetterCount">(0 word, 0 letters)</div>
                                </div> <!-- END BREAKDOWN SECTION -->
                                <!-- CIPHER CHART SECTION -->
                                <div id="ChartSpot">
                                    <table>
                                        <tbody>
                                            <tr></tr>
                                            <tr id="alphabetRow"></tr>
                                            <tr id="valueRow"></tr>
                                            <tr>
                                                <td id="cipherChartTitle" colspan="50">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- END CIPHER CHART SECTION -->
                                <!-- HISTORY SECTION -->
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
                                <!-- END HISTORY SECTION -->
                            </div>
                        </div>
                        @if(Auth::user()->plan == "free")
                            <div id="membershipText" class="row gads">
                                <span><a href="{{ route('membership') }}">Become a Member</a> for an ad-free experience</span>
                            </div>
                        @endif

                        <div id="NumberSpot"></div>
                        <br><br>
                        <!-- <script src="js/textdropper.js"></script> -->


                        <!-- CIPHER MODAL -->
                        <div id="ciphMod" class="ciphMod fancybox-content" style="display: none; margin-bottom: 6px;">
                            <center>
                                <h2 id="toph2">Ciphers</h2>
                                <br><br class="no-mo">
                                <ul id="cipherBox">
                                    @foreach ($ciphersAll as $item)
                                            @php
                                                $rgb = json_decode($item['rgb_values'], true);
                                                $red = $rgb['red'] ?? 0;
                                                $green = $rgb['green'] ?? 0;
                                                $blue = $rgb['blue'] ?? 0;
                                                $status = $item['ci_settings']['status'] ?? null;
                                            @endphp
                                            @if ($user_id == '')
                                                <li>
                                                    <input type="checkbox" id="Cipher{{ $item['id'] }}" value="Verses" data-id="{{ $item['id'] }}" checked disabled>
                                                    <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">{{ $item['name'] }}</font>
                                                </li>
                                            @else
                                                <li>
                                                    <input type="checkbox" id="Cipher{{ $item['id'] }}" value="Verses" data-id="{{ $item['id'] }}" {{ $status == 1 ? 'checked' : '' }}>
                                                    <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">{{ $item['name'] }}</font>
                                                </li>
                                            @endif
                                    @endforeach
                                </ul>
                            </center>

                            <div id="cipherSelectsContainer" style="{{ Auth::check() ? '' : 'display: none' }}">
                                <div class="cipherSelects">
                                    <button class="buttonFunctionCiphers" id="SelectBaseCiphersBtn" onclick="SelBaseCiphers()">Select Base</button>
                                </div>
                                <div class="cipherSelects">
                                    <button class="buttonFunctionCiphers" id="SelectAllCiphersBtn" onclick="SelAllCiphers(true)">Select All</button>
                                </div>
                                <div class="cipherSelects">
                                    <button class="buttonFunctionCiphers" id="ClearAllCiphersBtn" onclick="SelAllCiphers(false)">Clear All</button>
                                </div>
                            </div>

                            <div id="cipherUpdateCancelContainer">
                                @if (Auth::check())
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    <button class="buttonFunctionCiphers" id="SaveCiphers">Update</button>
                                @endif
                                <button class="buttonFunctionCiphers" id="CancelCiphers" onclick="Cancel_Ciphers()">Cancel</button>
                            </div>

                            <button type="button" data-fancybox-close="" class="fancybox-button fancybox-close-small" title="Close"><svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
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
                                <i id="exitCipherListColored" class="fas fa-times" onclick="javascript:closeCipherShortcuts()"></i>
                                <br>
                                <img decoding="async" src=/tools/calculator-advanced/img/cipher-list-colored.png alt="gematrinator, gematria, cipher list">
                            </div>
                            <h2>SHORTCUTS</h2>
                            <h3>CIPHER DISPLAY</h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="scLeft">Turn cipher on/off:</td>
                                    <td class="scRight">s; + cipher shortcut (<span class="seeCipherShortcuts" onclick="javascript:openCipherShortcuts()">see list</span>)</td>
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
                                    <td class="scRight">c; + cipher shortcut (<span class="seeCipherShortcuts" onclick="javascript:openCipherShortcuts()">see list</span>)</td>
                                </tr>
                                <tr>
                                    <td class="scLeft">Show only one cipher:</td>
                                    <td class="scRight">o; + cipher shortcut (<span class="seeCipherShortcuts" onclick="javascript:openCipherShortcuts()">see list</span>)</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var json_chipers = @json($ciphers);
    var small_alphabets = {};

    @foreach ($ciphers as $cipher)
        var cipherId = "{{ $cipher['id'] }}";

        if (cipherId != 'D0' && cipherId != 'D1' && cipherId != 'D2' && cipherId != 'D3') {
            var alphabetData = @json(json_decode($cipher['small_alphabet']));
            small_alphabets[cipherId] = alphabetData;
        }
    @endforeach
</script>
