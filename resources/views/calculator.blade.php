@extends('layouts.app')

@section('title', 'Calculator')

@section('css')
<style>
    .WordLetterCount {
        color: #e9e0e0;
        font-size: 22px;
        font-weight: 100;
    }
</style>
@endsection

@section('content')
    <link rel="stylesheet" href="{{asset('css/numberstyle.css')}}">

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
                            const maxHistory = 1000,
                                HistoryEnabled = true,
                                TablesEnabled = true
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
{{--                                    <span id="cipherHelpText">Can't find a cipher? <a href="faq.php">See the FAQ</a> or <a href="ciphers.php">Ciphers</a> page.</span>--}}
                                    <br><br class="no-mo">
                                    <ul id="cipherBox">
                                        {{-- <li><input type="checkbox" id="CipherD0" checked=""><font style="color: RGB(0, 186, 0)">Ordinal</font></li>
                                        <li><input type="checkbox" id="CipherD1" checked=""><font style="color: RGB(88, 125, 254)">Reduction</font></li>
                                        <li><input type="checkbox" id="CipherD2" checked=""><font style="color: RGB(80, 235, 21)">Reverse</font></li>
                                        <li><input type="checkbox" id="CipherD3" checked=""><font style="color: RGB(100, 226, 226)">Reverse Reduction</font></li> --}}
                                        @foreach ($ciphersAll as $item)
                                            {{-- <li>
                                                <input type="checkbox" id="Cipher{{ $item['id'] }}" {{ $item['ci_settings']['status'] == 1 ? 'checked' : '' }}> --}}
                                                @php
                                                    $rgb = json_decode($item['rgb_values'], true);
                                                    $red = $rgb['red'] ?? 0;
                                                    $green = $rgb['green'] ?? 0;
                                                    $blue = $rgb['blue'] ?? 0;
                                                    $status = $item['ci_settings']['status'] ?? null;
                                                @endphp
                                                {{-- <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                    {{ $item['name'] }}
                                                </font> --}}
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
                                            {{-- </li> --}}
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

                                {{-- <center>
                                    <div id="cipherPresets">
                                        <h2>Cipher Presets</h2>
                                        <span>The checked ciphers above will save as your: </span><select name="SavePresets" id="PresetDropdown">
                                            <option>Default</option>
                                            <option>Preset 1</option>
                                        </select> <button class="buttonFunctionCiphers" id="SaveCiphers" onclick="javascript:Update_Ciphers(), jQuery.fancybox.close();">
                                            <div decoding="async" class="imgTop" width="16">Close/Save
                                            </div></button><br><br>
                                        <span>Select previous Preset to load: <br class="mo"><select name="LoadPresets" id="PresetDropdown2">
                                            <option>Default</option>
                                        </select> <button class="buttonFunctionCiphers" id="LoadCiphers" onclick="javascript:Load_Preset()">Load</button><br><br>
                                    </span>
                                    </div>
                                </center> --}}
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
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        let temp_ciphers = [];
        $(document).ready(function () {
            $('#btn_breakdown_screenshot').on('click', function() {
                if ($('#breakdownCipherLabel').html() == '') {
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

        $(document).ready(function () {
            window.updateCipherDetails = function (val = '', new_list = '') {
                if (val != '') {
                    let cipherList;
                    if(new_list.length == 0){
                        cipherList = @json($ciphers);
                    }else{
                        cipherList = new_list;
                    }
                    let inputVal = val.trim();
                    let getId = $('#cipher_id').val();

                    let data = calculateGematria(val);
                    var small_alphabets = generateSmallAlphabets(cipherList);
                    if (inputVal) {
                        const cipher = cipherList.find(function (cipher) {
                            return cipher.id == getId;
                        });

                        if (cipher) {
                            if (typeof cipher.rgb_values !== "object") {
                                cipher.rgb_values = JSON.parse(cipher.rgb_values);
                            }
                            var red = cipher.rgb_values.red;
                            var green = cipher.rgb_values.green;
                            var blue = cipher.rgb_values.blue;
                        }

                        let totalSum = 0;
                        let fullHtml = '';

                        // Split input by spaces to handle each word separately
                        const words = inputVal.trim().split(/\s+/);

                        words.forEach((word, index) => {
                            let charValuesRow1 = [];
                            let charValuesRow2 = [];
                            let wordSum = 0;
                            let cipher_small_alphabet;

                            for (let i = 0; i < word.length; i++) {
                                let char = word[i].toLowerCase();

                                if (typeof cipher.small_alphabet !== "object") {
                                    cipher_small_alphabet = JSON.parse(cipher.small_alphabet);
                                }

                                if (cipher_small_alphabet[char]) {
                                    charValuesRow1.push(`<td class="BreakCharNG">${char}</td>`);
                                    const value = cipher_small_alphabet[char];
                                    charValuesRow2.push(`<td class="BreakValue">${value}</td>`);
                                    wordSum += parseInt(value, 10);
                                }
                            }

                            totalSum += wordSum;

                            let row1Html = `<tr>${charValuesRow1.join('')}
                                <td class="BreakSum" rowspan="2">
                                    <font style="color: rgb(${red}, ${green}, ${blue});">
                                        <div class="NumberClass">${wordSum}</div>
                                    </font>
                                </td>`;

                                // Add BreakTotal only to the last word's table
                                if (index === words.length - 1) {
                                    row1Html += `
                                        <td class="BreakTotal" rowspan="2">
                                            <font style="color: rgb(${red}, ${green}, ${blue});">
                                                <div class="NumberClass">${totalSum}</div>
                                            </font>
                                        </td>`;
                                }

                                row1Html += `</tr>`;

                            let row2Html = `<tr>${charValuesRow2.join('')}</tr>`;

                            fullHtml += `
                                <table class="BreakTable">
                                    <tbody>
                                        ${row1Html + row2Html}
                                    </tbody>
                                </table>`;
                        });

                        // Final HTML with the total sum across all words
                        let resultHtml = `
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="nextGenText">"${inputVal}" =
                                            <font style="color: rgb(${red}, ${green}, ${blue});">
                                                <div class="NumberClass">${totalSum}</div>
                                            </font>
                                            <font style="color: rgb(${red}, ${green}, ${blue});">
                                                (${cipher.name})
                                            </font>
                                        </span><br>
                                        ${fullHtml}
                                    </td>
                                </tr>
                            </tbody>`;

                        $('#breakdownCipherLabel').html(resultHtml);

                        // Handling specific cipher cases for displaying appropriate values
                        if (cipher.id == 'D0') {
                            $('.view-number').text(data.ordinal);
                        } else if (cipher.id == 'D1') {
                            $('.view-number').text(data.reduction);
                        } else if (cipher.id == 'D2') {
                            $('.view-number').text(data.reverse);
                        } else if (cipher.id == 'D3') {
                            $('.view-number').text(data.reverseReduction);
                        } else {
                            let data1 = calculateGematria(val, cipher.id, small_alphabets);
                            $('.view-number').text(data1.ordinalCiphers);
                        }
                    }

                } else {
                    $('#breakdownCipherLabel').html(``);
                    return false;
                }
            };

            window.getVal = function (val, cipher_list) {

                let wordCount = val ? val.split(/\s+/).length : 0;

                let letterCount = val.replace(/[^a-zA-Z]/g, '').length;

                $('#WordLetterCount .WordLetterCount').text('(' + wordCount + ' word' + (wordCount !== 1 ? 's' : '') + ', ' + letterCount + ' letter' + (letterCount !== 1 ? 's' : '') + ')');

                if (val == "") {
                    cipher_list.forEach((cipher) => {
                        let cipherId = cipher.id;

                        if (cipherId === 'D0') {
                            $('#ordinal').text('0');
                        } else if (cipherId === 'D1') {
                            $('#reduction').text('0');
                        } else if (cipherId === 'D2') {
                            $('#reverse').text('0');
                        } else if (cipherId === 'D3') {
                            $('#reverse_reduction').text('0');
                        } else {
                            $('#cipher_' + cipherId).text('0');
                        }
                    });
                }

                let data = calculateGematria(val);
                var small_alphabets = generateSmallAlphabets(cipher_list);

                cipher_list.forEach((cipher) => {
                    let cipherId = cipher.id;

                    if (cipherId === 'D0') {
                        $('#ordinal').text(data.ordinal);
                    } else if (cipherId === 'D1') {
                        $('#reduction').text(data.reduction);
                    } else if (cipherId === 'D2') {
                        $('#reverse').text(data.reverse);
                    } else if (cipherId === 'D3') {
                        $('#reverse_reduction').text(data.reverseReduction);
                    } else {
                        let data1 = calculateGematria(val, cipherId, small_alphabets);
                        $('#cipher_' + cipherId).text(data1.ordinalCiphers);
                    }
                });
            };
        });
    </script>

    <script>

        function SelBaseCiphers() {
            // Select base ciphers by checking specific IDs
            document.getElementById('CipherD0').checked = true;
            document.getElementById('CipherD1').checked = true;
            document.getElementById('CipherD2').checked = true;
            document.getElementById('CipherD3').checked = true;

            var checkboxes = document.querySelectorAll('#cipherBox input[type="checkbox"]');

            checkboxes.forEach(function(checkbox) {
                if (!['CipherD0', 'CipherD1', 'CipherD2', 'CipherD3'].includes(checkbox.id)) {
                    checkbox.checked = false;
                }
            });
        }

        // Function to select or clear all ciphers
        function SelAllCiphers(selectAll) {
            // Get all checkbox elements in the cipher list
            var checkboxes = document.querySelectorAll('#cipherBox input[type="checkbox"]');

            checkboxes.forEach(function(checkbox) {
                checkbox.checked = selectAll;
            });
        }

        function saveCiphers() {
            var userId = $('#user_id').val();
            var ciphersStatus = [];
            var checkboxes = document.querySelectorAll('#cipherBox input[type="checkbox"]');

            checkboxes.forEach(function(checkbox) {
                var cipherId = checkbox.id.replace('Cipher', '');
                var status = checkbox.checked ? 1 : 0;

                ciphersStatus.push({
                    cipher_id: cipherId,
                    status: status
                });
            });

            var data = {
                user_id: userId,
                ciphers: ciphersStatus
            };

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('ciphers.saveciphers') }}",
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    if (response.success) {
                        // swal("Success!", "Cipher settings saved successfully!", "success");
                        jQuery.fancybox.close();
                        $.ajax({
                            url: "{{ route('calculator') }}",
                            type: 'POST',
                            dataType: 'json',
                            contentType: 'application/json',
                            data: JSON.stringify(data),
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function(response) {
                                if (response.success) {
                                    $('#GemTable').html(response.gem_table);

                                    let val = $('#EntryField').val();

                                    temp_ciphers.length = 0
                                    temp_ciphers.push(...response.ciphers);
                                    console.log(temp_ciphers);

                                    getVal(val, response.ciphers);

                                    // updateCipherDetails($('#EntryField').val(), response.ciphers);
                                    // updateCipherCount($('#EntryField').val(), response.ciphers);

                                } else {
                                    console.log("No data found");
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("An error occurred");
                            }
                        });
                    } else {
                        swal("Error!", "Error saving cipher settings", "error");
                    }
                },
                error: function(xhr, status, error) {
                    swal("Error!", "An error occurred while saving the cipher settings.", "error");
                }
            });
        }

        document.getElementById('SaveCiphers').addEventListener('click', function() {
            saveCiphers();
        });

        function Cancel_Ciphers() {
            location.reload();
        }

        function MoveCipherClick(cipherId, event) {
            const ciphers = @json($ciphers);
            const selectedCipher = ciphers.find(cipher => cipher.id == cipherId);

            if (selectedCipher) {
                const smallAlphabet = JSON.parse(selectedCipher.small_alphabet);
                const capitalAlphabet = JSON.parse(selectedCipher.capital_alphabet);
                const rgbValues = JSON.parse(selectedCipher.rgb_values);

                const alphabetToShow = smallAlphabet;

                const alphabetKeys = Object.keys(alphabetToShow);
                const alphabetValues = Object.values(alphabetToShow);

                document.getElementById('alphabetRow').innerHTML = '';
                document.getElementById('valueRow').innerHTML = '';

                alphabetKeys.forEach((char, index) => {
                    const charCell = document.createElement('td');
                    charCell.classList.add('chartChar');
                    charCell.textContent = char;
                    document.getElementById('alphabetRow').appendChild(charCell);

                    const valueCell = document.createElement('td');
                    valueCell.classList.add('chartVal');
                    valueCell.textContent = alphabetValues[index];
                    document.getElementById('valueRow').appendChild(valueCell);
                });

                const cipherTitle = selectedCipher.name;
                document.getElementById('cipherChartTitle').innerHTML = `
                    <font id="cipherTitleFont" style="color: rgb(${rgbValues.red}, ${rgbValues.green}, ${rgbValues.blue})">${cipherTitle}</font>
                `;
            }
        }

        window.onload = function() {

            const firstCipherId = "{{ $first_ciphers['id'] }}";
            MoveCipherClick(firstCipherId, event);

            var firstDataId = $('div.change-cipher').first().data('id');
            $('#cipher_id').val(firstDataId);
        };

        // Gematria mapping for English alphabet
        const alphabet123 = {
            a: 1,  b: 2,  c: 3,  d: 4,  e: 5,  f: 6,  g: 7,  h: 8,  i: 9,  j: 10,
            k: 11, l: 12, m: 13, n: 14, o: 15, p: 16, q: 17, r: 18, s: 19, t: 20,
            u: 21, v: 22, w: 23, x: 24, y: 25, z: 26
        };

        let alphabet = @json($D0);
        let alphabet1 = @json($D1);
        let alphabet2 = @json($D2);
        let alphabet3 = @json($D3);

        // var ciphers = @json($ciphers);

        function generateSmallAlphabets(ciphers) {
            let small_alphabets = {};

            ciphers.forEach(cipher => {
                let cipherId = cipher['id'];

                if (!['D0', 'D1', 'D2', 'D3'].includes(cipherId)) {
                    let alphabetData = JSON.parse(cipher['small_alphabet']);
                    small_alphabets[cipherId] = alphabetData;
                }
            });

            return small_alphabets;
        }

        function calculateOrdinalCiphers(input, cipherId, small_alphabets) {
            return [...input].reduce((sum, char) => {
                var alphabetData = small_alphabets[cipherId];

                // Ensure alphabetData is an object
                if (alphabetData && typeof alphabetData === 'object') {
                    var charValue = alphabetData[char] || alphabetData[char.toLowerCase()];

                    // If a value exists for the character, add it to the sum (parse it as an integer)
                    return sum + (charValue !== undefined ? parseInt(charValue, 10) : 0);
                }

                return sum;
            }, 0);
        }

        // Function to calculate Ordinal value
        function calculateOrdinal(input) {
            return [...input].reduce((sum, char) => sum + (alphabet[char.toLowerCase()] || 0), 0);
        }

        // Function to calculate Reduction value (also known as Pythagorean)
        function calculateReduction(input) {
            return [...input].reduce((sum, char) => {
                let value = alphabet1[char.toLowerCase()] || 0;
                return sum + (value ? (value > 9 ? value - 9 : value) : 0);
            }, 0);
        }

        // Function to calculate Reverse Ordinal value
        function calculateReverseOrdinal(input) {
            return [...input].reduce((sum, char) => {
                let reverseValue = 27 - (alphabet2[char.toLowerCase()] || 0);
                return sum + (reverseValue > 0 ? reverseValue : 0);
            }, 0);
        }

        // Function to calculate Reverse Reduction value
        function calculateReverseReduction(input) {
            return [...input].reduce((sum, char) => {
                let reverseValue = 27 - (alphabet3[char.toLowerCase()] || 0);
                reverseValue = reverseValue > 9 ? reverseValue - 9 : reverseValue;
                return sum + (reverseValue > 0 ? reverseValue : 0);
            }, 0);
        }

        // Main function to calculate all values
        function calculateGematria(word, id = '', small_alphabets = '') {
            const ordinal = calculateOrdinal(word);
            const reduction = calculateReduction(word);
            const reverse = calculateReverseOrdinal(word);
            const reverseReduction = calculateReverseReduction(word);
            const ordinalCiphers = calculateOrdinalCiphers(word, id, small_alphabets);

            return {
                ordinal: ordinal,
                reduction: reduction,
                reverse: reverse,
                reverseReduction: reverseReduction,
                ordinalCiphers: ordinalCiphers
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
            $('#EntryField').on('keyup', function () {
                let val = $(this).val();

                if (temp_ciphers.length === 0) {
                    temp_ciphers_val = @json($ciphers);  // Assign the data directly
                }else{
                    temp_ciphers_val = temp_ciphers;
                }

                getVal(val, temp_ciphers_val);

                updateCipherDetails($(this).val(), temp_ciphers_val);

                return true;
            });

            $('#ordinal').on('click', function () {
                number_properties($(this).text());
            });
            $('#reduction').on('click', function () {
                number_properties($(this).text());
            });
            $('#reverse').on('click', function () {
                number_properties($(this).text());
            });
            $('#reverse_reduction').on('click', function () {
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
                number_properties($(this).text());
            });

            $('body').on('click', '.change-cipher', function() {
                // console.log($(this).data('id'));
                var id = $(this).data('id');
                // console.log(id, temp_ciphers.length, temp_ciphers);

                if (temp_ciphers.length === 0) {
                    temp_ciphers_update = @json($ciphers);  // Assign the data directly
                }else{
                    temp_ciphers_update = temp_ciphers;
                }

                let selected_cipher = temp_ciphers_update.find(cipher => cipher.id == id);

                // Update the cipher ID input field
                $('#cipher_id').val(selected_cipher.id);

                // Run the main logic to update the cipher details
                let tempVal = $('#EntryField').val();
                updateCipherDetails(tempVal, temp_ciphers_update);
            });

            // function updateCipherDetails(val = '') {
            //     if(val != ''){
            //         const cipherList = @json($ciphers);
            //         let inputVal = val.trim();
            //         let getId = $('#cipher_id').val();

            //         let data = calculateGematria(val);
            //         if (inputVal) {
            //             const cipher = cipherList.find(function (cipher) {
            //                 return cipher.id == getId;
            //             });

            //             if (cipher) {
            //                 cipher.small_alphabet = JSON.parse(cipher.small_alphabet);
            //                 cipher.rgb_values = JSON.parse(cipher.rgb_values);
            //                 var red = cipher.rgb_values.red;
            //                 var green = cipher.rgb_values.green;
            //                 var blue = cipher.rgb_values.blue;
            //             }

            //             let charValuesRow1 = [];
            //             let charValuesRow2 = [];

            //             for (let i = 0; i < inputVal.length; i++) {
            //                 let char = inputVal[i].toLowerCase();
            //                 if (cipher.small_alphabet[char]) {
            //                     charValuesRow1.push(`<td class="BreakCharNG">${char}</td>`);
            //                     charValuesRow2.push(`<td class="BreakValue">${cipher.small_alphabet[char]}</td>`);
            //                 }
            //             }

            //             let row1Html = `<tr>${charValuesRow1.join('')}
            //                 <td class="BreakTotal" rowspan="2">
            //                     <font style="color: rgb(${red}, ${green}, ${blue});">
            //                         <div class="NumberClass view-number"></div>
            //                     </font>
            //                 </td>
            //                 </tr>`;
            //             let row2Html = `<tr>${charValuesRow2.join('')}</tr>`;

            //             let fullHtml = row1Html + row2Html;

            //             $('#breakdownCipherLabel').html(`
            //                 <tbody>
            //                     <tr>
            //                         <td>
            //                             <span class="nextGenText">"${inputVal}" =
            //                                 <font style="color: rgb(${red}, ${green}, ${blue});">
            //                                     <div class="NumberClass view-number"></div>
            //                                 </font>
            //                                 <font style="color: rgb(${red}, ${green}, ${blue});">(${cipher.name})</font>
            //                             </span><br>
            //                             <table class="BreakTable">
            //                                 <tbody>
            //                                     ${fullHtml}
            //                                 </tbody>
            //                             </table>
            //                         </td>
            //                     </tr>
            //                 </tbody>
            //             `);

            //             if (cipher.id == 'D0') {
            //                 $('.view-number').text(data.ordinal);
            //             } else if (cipher.id == 'D1') {
            //                 $('.view-number').text(data.reduction);
            //             } else if (cipher.id == 'D2') {
            //                 $('.view-number').text(data.reverse);
            //             } else if (cipher.id == 'D3') {
            //                 $('.view-number').text(data.reverseReduction);
            //             } else {
            //                 let data1 = calculateGematria(val, cipher.id);
            //                 $('.view-number').text(data1.ordinalCiphers);
            //             }
            //         }
            //     }else{
            //         $('#breakdownCipherLabel').html(``);
            //         return false
            //     }
            // }

        });
    </script>
@endsection


