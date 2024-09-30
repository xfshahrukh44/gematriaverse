@extends('layouts.app')

@section('title', 'Nextgen nostalgia calculator')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/icssNGG.css')}}">
@endsection

@section('content')
    <section class="calculator-meter py">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <body onload="Page_Launch()">
                    <center><img src="{{asset('images/logo-2.png')}}" width="44%"></center>



                    <p>
                    </p>
                    <center>

                        <div id="MenuSpot">
                            <center>
                                <table id="CipherChart">
                                    <tbody>
                                    <tr>
                                        <td class="CategoryList"><a href="javascript:Open_Ciphers('English')"
                                                                    onmouseover="javascript:Open_Ciphers('English')">English</a>
                                            <p>
                                                <font style="color: RGB(255, 255, 0)">Reverse</font>
                                            </p>
                                            <p><a href="javascript:Open_Ciphers('Jewish')"
                                                  onmouseover="javascript:Open_Ciphers('Jewish')">Jewish</a></p>
                                            <p><a href="javascript:Open_Ciphers('Kabbalah')"
                                                  onmouseover="javascript:Open_Ciphers('Kabbalah')">Kabbalah</a>
                                            </p>
                                            <p><a href="javascript:Open_Ciphers('Mathematical')"
                                                  onmouseover="javascript:Open_Ciphers('Mathematical')">Mathematical</a>
                                            </p>
                                            <p><a href="javascript:Open_Ciphers('Other')"
                                                  onmouseover="javascript:Open_Ciphers('Other')">Other</a></p>
                                            <p><a href="javascript:Open_Ciphers('Foreign')"
                                                  onmouseover="javascript:Open_Ciphers('Foreign')">Foreign</a></p>
                                            <p></p>
                                        </td>
                                        <td class="CategoryList2"><a href="javascript:Toggle_All()">Toggle All</a>
                                            <div class="BottomDweller"><a href="javascript:Populate_MenuBar()">Close
                                                    Ciphers</a></div>
                                            <p><input type="checkbox" id="ReverseOrdinal_Box"
                                                      onclick="set_Ciphers()" value="Reverse Ordinal" checked="">
                                                <font style="color: RGB(80,235,21)">Reverse Ordinal</font><br><input
                                                        type="checkbox" id="ReverseFullReduction_Box"
                                                        onclick="set_Ciphers()" value="Reverse Full Reduction"
                                                        checked="">
                                                <font style="color: RGB(100,226,226)">Reverse Full Reduction</font>
                                                <br><input type="checkbox" id="ReverseSingleReduction_Box"
                                                           onclick="set_Ciphers()" value="Reverse Single Reduction"
                                                           unchecked="">
                                                <font style="color: RGB(100,216,209)">Reverse Single Reduction
                                                </font><br><input type="checkbox" id="ReverseFullReductionEP_Box"
                                                                  onclick="set_Ciphers()" value="Reverse Full Reduction EP"
                                                                  unchecked="">
                                                <font style="color: RGB(101,224,194)">Reverse Full Reduction EP
                                                </font><br><input type="checkbox" id="ReverseSingleReductionEP_Box"
                                                                  onclick="set_Ciphers()" value="Reverse Single Reduction EP"
                                                                  unchecked="">
                                                <font style="color: RGB(110,226,156)">Reverse Single Reduction EP
                                                </font><br><input type="checkbox" id="ReverseExtended_Box"
                                                                  onclick="set_Ciphers()" value="Reverse Extended" unchecked="">
                                                <font style="color: RGB(253,255,119)">Reverse Extended</font>
                                                <br><input type="checkbox" id="ReverseFrancisBacon_Box"
                                                           onclick="set_Ciphers()" value="Reverse Francis Bacon"
                                                           unchecked="">
                                                <font style="color: RGB(163,255,88)">Reverse Francis Bacon</font>
                                                <br><input type="checkbox" id="ReverseFrancBaconis_Box"
                                                           onclick="set_Ciphers()" value="Reverse Franc Baconis"
                                                           unchecked="">
                                                <font style="color: RGB(111,193,121)">Reverse Franc Baconis</font>
                                                <br><input type="checkbox" id="ReverseSatanic_Box"
                                                           onclick="set_Ciphers()" value="Reverse Satanic" unchecked="">
                                                <font style="color: RGB(255,51,51)">Reverse Satanic</font><br>
                                            </p>
                                            <div class="ButtonSection"><button class="CipherButton"
                                                                               onclick="Add_BaseCiphers(true)" value="BaseCiphers"><b>Base
                                                        Ciphers</b></button><button class="CipherButton"
                                                                                    onclick="Add_AllCiphers(true)" value="AllCiphers"><b>All
                                                        Ciphers</b></button><br></div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </center>
                        </div><br>

                        <div id="MainTable">
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        <center>
                                            <h3>Enter Word, Phrase, or Number(s):</h3>
                                        </center>
                                    </td>

                                </tr>
                                <tr>

                                    <td>
                                        <center><input id="SearchField" autofocus="" type="text"
                                                       oninput="FieldChange(sVal())" style="width: 500px; font-size: 125%"
                                                       onkeydown="navHistory(event.keyCode);">
                                            <p>
                                            </p>
                                        </center>
                                        <p>

                                        </p>
                                        <div id="Gematria_Table">
                                            <center>
                                                <table id="GemTable">
                                                    <tbody>
                                                    <tr>
                                                        <td class="GemHead" id="English Ordinal_Head"
                                                            style="color: RGB(0,186,0)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('English Ordinal', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('English Ordinal', true)">English
                                                                Ordinal</a></td>
                                                        <td class="GemHead" id="Full Reduction_Head"
                                                            style="color: RGB(88,125,254)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Full Reduction', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Full Reduction', true)">Full
                                                                Reduction</a></td>
                                                        <td class="GemHead" id="Reverse Ordinal_Head"
                                                            style="color: RGB(80,235,21)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Ordinal', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Ordinal', true)">Reverse
                                                                Ordinal</a></td>
                                                        <td class="GemHead" id="Reverse Full Reduction_Head"
                                                            style="color: RGB(100,226,226)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Full Reduction', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Full Reduction', true)">Reverse
                                                                Full Reduction</a></td>
                                                        <td class="GemHead" id="Reverse Single Reduction_Head"
                                                            style="color: RGB(100,216,209)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Single Reduction', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Single Reduction', true)">Reverse
                                                                Single Reduction</a></td>
                                                        <td class="GemHead" id="Reverse Full Reduction EP_Head"
                                                            style="color: RGB(101,224,194)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Full Reduction EP', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Full Reduction EP', true)">Reverse
                                                                Full Reduction EP</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemVal" id="English Ordinal_Sum"
                                                            style="color: RGB(0,186,0)">0</td>
                                                        <td class="GemVal" id="Full Reduction_Sum"
                                                            style="color: RGB(88,125,254)">0</td>
                                                        <td class="GemVal" id="Reverse Ordinal_Sum"
                                                            style="color: RGB(80,235,21)">0</td>
                                                        <td class="GemVal" id="Reverse Full Reduction_Sum"
                                                            style="color: RGB(100,226,226)">0</td>
                                                        <td class="GemVal" id="Reverse Single Reduction_Sum"
                                                            style="color: RGB(100,216,209)">0</td>
                                                        <td class="GemVal" id="Reverse Full Reduction EP_Sum"
                                                            style="color: RGB(101,224,194)">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemHead"
                                                            id="Reverse Single Reduction EP_Head"
                                                            style="color: RGB(110,226,156)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Single Reduction EP', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Single Reduction EP', true)">Reverse
                                                                Single Reduction EP</a></td>
                                                        <td class="GemHead" id="Reverse Extended_Head"
                                                            style="color: RGB(253,255,119)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Extended', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Extended', true)">Reverse
                                                                Extended</a></td>
                                                        <td class="GemHead" id="Reverse Francis Bacon_Head"
                                                            style="color: RGB(163,255,88)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Francis Bacon', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Francis Bacon', true)">Reverse
                                                                Francis Bacon</a></td>
                                                        <td class="GemHead" id="Reverse Franc Baconis_Head"
                                                            style="color: RGB(111,193,121)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Franc Baconis', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Franc Baconis', true)">Reverse
                                                                Franc Baconis</a></td>
                                                        <td class="GemHead" id="Reverse Satanic_Head"
                                                            style="color: RGB(255,51,51)"><a
                                                                    onmouseover="javascript:cipherHead_mouseOver('Reverse Satanic', false)"
                                                                    onmouseout="Populate_Breakdown()"
                                                                    href="javascript:cipherHead_click('Reverse Satanic', true)">Reverse
                                                                Satanic</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemVal" id="Reverse Single Reduction EP_Sum"
                                                            style="color: RGB(110,226,156)">0</td>
                                                        <td class="GemVal" id="Reverse Extended_Sum"
                                                            style="color: RGB(253,255,119)">0</td>
                                                        <td class="GemVal" id="Reverse Francis Bacon_Sum"
                                                            style="color: RGB(163,255,88)">0</td>
                                                        <td class="GemVal" id="Reverse Franc Baconis_Sum"
                                                            style="color: RGB(111,193,121)">0</td>
                                                        <td class="GemVal" id="Reverse Satanic_Sum"
                                                            style="color: RGB(255,51,51)">0</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </center>
                                        </div>
                                        <div id="BreakdownSpot"></div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <p>
                        </p>
                        <center>
                            <div id="ChartSpot" style="min-height: 182px;">
                                <table id="ChartTable">
                                    <tbody>
                                    <tr>
                                        <td colspan="26"><button id="MoveUp" class="CipherButton"
                                                                 onclick="Slide_Cipher('up')" value="Move Up"
                                                                 style="float: left"><b>Move Up</b></button><b>
                                                <font style="font-size: 150%; color: RGB(0,186,0)">English Ordinal
                                                </font>
                                            </b><button id="MoveDown" class="CipherButton"
                                                        onclick="Slide_Cipher('down')" value="Move Down"
                                                        style="float: right"><b>Move Down</b></button></td>
                                    </tr>
                                    <tr>
                                        <td class="ChartChar">a</td>
                                        <td class="ChartChar">b</td>
                                        <td class="ChartChar">c</td>
                                        <td class="ChartChar">d</td>
                                        <td class="ChartChar">e</td>
                                        <td class="ChartChar">f</td>
                                        <td class="ChartChar">g</td>
                                        <td class="ChartChar">h</td>
                                        <td class="ChartChar">i</td>
                                        <td class="ChartChar">j</td>
                                        <td class="ChartChar">k</td>
                                        <td class="ChartChar">l</td>
                                        <td class="ChartChar">m</td>
                                    </tr>
                                    <tr>
                                        <td class="ChartVal">1</td>
                                        <td class="ChartVal">2</td>
                                        <td class="ChartVal">3</td>
                                        <td class="ChartVal">4</td>
                                        <td class="ChartVal">5</td>
                                        <td class="ChartVal">6</td>
                                        <td class="ChartVal">7</td>
                                        <td class="ChartVal">8</td>
                                        <td class="ChartVal">9</td>
                                        <td class="ChartVal">10</td>
                                        <td class="ChartVal">11</td>
                                        <td class="ChartVal">12</td>
                                        <td class="ChartVal">13</td>
                                    </tr>
                                    <tr>
                                        <td class="ChartChar">n</td>
                                        <td class="ChartChar">o</td>
                                        <td class="ChartChar">p</td>
                                        <td class="ChartChar">q</td>
                                        <td class="ChartChar">r</td>
                                        <td class="ChartChar">s</td>
                                        <td class="ChartChar">t</td>
                                        <td class="ChartChar">u</td>
                                        <td class="ChartChar">v</td>
                                        <td class="ChartChar">w</td>
                                        <td class="ChartChar">x</td>
                                        <td class="ChartChar">y</td>
                                        <td class="ChartChar">z</td>
                                    </tr>
                                    <tr>
                                        <td class="ChartVal">14</td>
                                        <td class="ChartVal">15</td>
                                        <td class="ChartVal">16</td>
                                        <td class="ChartVal">17</td>
                                        <td class="ChartVal">18</td>
                                        <td class="ChartVal">19</td>
                                        <td class="ChartVal">20</td>
                                        <td class="ChartVal">21</td>
                                        <td class="ChartVal">22</td>
                                        <td class="ChartVal">23</td>
                                        <td class="ChartVal">24</td>
                                        <td class="ChartVal">25</td>
                                        <td class="ChartVal">26</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                        <p>
                        </p>
                        <div id="MiscSpot"></div>

                        <p>&nbsp;</p>

                    </center>

                    </body>
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="WordLetterCount text-center">
                    <div class="WordLetterCount para white">(0 words, 0 letters)</div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('js/gematriaNGG-3.js')}}"></script>
    <script src="{{asset('js/ijavaNGG.js')}}"></script>
@endsection


