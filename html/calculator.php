<?php include 'include/header.php' ?>
<link rel="stylesheet" href="css/numberstyle.css">

<?php include 'include/menu.php' ?>

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
                                                <font style="color: RGB(0, 186, 0)">Ordinal</font>
                                            </div>
                                        </td>
                                        <td class="GemTableHeader">
                                            <div class="GemTableHeader" onclick="javascript:MoveCipherClick(1, event)">
                                                <font style="color: RGB(88, 125, 254)">Reduction</font>
                                            </div>
                                        </td>
                                        <td class="GemTableHeader">
                                            <div class="GemTableHeader" onclick="javascript:MoveCipherClick(2, event)">
                                                <font style="color: RGB(80, 235, 21)">Reverse</font>
                                            </div>
                                        </td>
                                        <td class="GemTableHeader">
                                            <div class="GemTableHeader" onclick="javascript:MoveCipherClick(3, event)">
                                                <font style="color: RGB(100, 226, 226)">Reverse Reduction</font>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td class="GemTableValue" id="TableValue_Ordinal">
                                            <font style="color: RGB(0, 186, 0);">
                                                <div class="NumberClass"><b id="finalBreakNum" class="justnumber"
                                                        onclick="javascript:Open_Properties(0)">0</b></div>
                                            </font>
                                        </td>
                                        <td class="GemTableValue" id="TableValue_Reduction">
                                            <font style="color: RGB(88, 125, 254);">
                                                <div class="NumberClass"><b id="finalBreakNum" class="justnumber"
                                                        onclick="javascript:Open_Properties(0)">0</b></div>
                                            </font>
                                        </td>
                                        <td class="GemTableValue" id="TableValue_Reverse">
                                            <font style="color: RGB(80, 235, 21);">
                                                <div class="NumberClass"><b id="finalBreakNum" class="justnumber"
                                                        onclick="javascript:Open_Properties(0)">0</b></div>
                                            </font>
                                        </td>
                                        <td class="GemTableValue" id="TableValue_Reverse_Reduction">
                                            <font style="color: RGB(100, 226, 226);">
                                                <div class="NumberClass"><b id="finalBreakNum" class="justnumber"
                                                        onclick="javascript:Open_Properties(0)">0</b></div>
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

                    <div id="calculator-advanced">
                        <!-- FIRST ROW -->
                        <div id="FirstRow" class="row">
                            <div id="MainCol">
                                <!-- Calculator (Above) 1 -->

                                <!-- MOBILE MENU SECTION -->
                                <div id="menu-dynamic">
                                    <div id="calc-menu">
                                        <!-- <a id="ciphModBtn" class="MenuLink" onclick="javascript:Open_Ciphers()"
                                            data-fancybox="ciphers" data-src="#ciphMod"><span
                                                class="calcMenuItem">Ciphers&nbsp;</span>
                                        </a> -->

                                        <a data-fancybox="port" class="MenuLink" href="#ciphMod">
                                            Ciphers&nbsp;
                                        </a>

                                        <span>|</span>
                                        <a id="optionsBtn" class="MenuLink" onclick="javascript:Open_Options()"
                                            data-fancybox="dialog" data-src="#optionsMod">
                                            <span
                                                class="calcMenuItem">Options&nbsp;</span></a>
                                        <span>|</span>

                                        <a id="shortcutsBtn" class="MenuLink" data-fancybox="shortcuts"
                                            data-src="#shortcutsMod"><span class="calcMenuItem">Shortcuts</span></a>
                                    </div>
                                </div>
                                <!-- END MENU SECTION -->
                                <!-- ENTRY SECTION -->
                                <div id="EntryDiv">
                                    <!-- <button id="arrowDown" class="mo"><i class="fa fa-arrow-circle-left" style="font-size:38px"></i></button> -->
                                    <input id="EntryField" class="" autofocus="" type="text" autocomplete="off"
                                        oninput="FieldChange(EntryValue())" onkeydown="navHistTable(event)"
                                        ondrop="BuildFromText(event)" ondragenter="ShowDropTarget()"
                                        ondragleave="RemoveDropTarget()" ondragexit="RemoveDropTarget()"
                                        placeholder="Enter Word, Phrase, or #(s):">
                                    <!-- <button id="arrowDown" class="mo"><i class="fa fa-arrow-circle-right" style="font-size:38px"></i></button> -->
                                </div>
                                <br>
                                <!-- END ENTRY SECTION -->
                                <!-- MAIN TABLE SECTION -->
                                <div id="MainTableRow">
                                    <div id="MainTable">
                                        <div id="Gematria_Table">
                                            <table id="GemTable">
                                                <tbody>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(0, event)">
                                                                <font style="color: RGB(0, 186, 0)">Ordinal</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(1, event)">
                                                                <font style="color: RGB(88, 125, 254)">Reduction</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(2, event)">
                                                                <font style="color: RGB(80, 235, 21)">Reverse</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(3, event)">
                                                                <font style="color: RGB(100, 226, 226)">Reverse
                                                                    Reduction</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(4, event)">
                                                                <font style="color: RGB(218, 226, 0)">Standard</font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList" id="TableValue_Ordinal">
                                                            <font style="color: RGB(0, 186, 0);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Reduction">
                                                            <font style="color: RGB(88, 125, 254);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Reverse">
                                                            <font style="color: RGB(80, 235, 21);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Reduction">
                                                            <font style="color: RGB(100, 226, 226);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Standard">
                                                            <font style="color: RGB(218, 226, 0);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(5, event)">
                                                                <font style="color: RGB(153, 102, 255)">Latin</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(6, event)">
                                                                <font style="color: RGB(169, 208, 142)">Sumerian</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(7, event)">
                                                                <font style="color: RGB(220, 208, 148)">Reverse Sumerian
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(8, event)">
                                                                <font style="color: RGB(93, 187, 88)">Capitals Mixed
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(9, event)">
                                                                <font style="color: RGB(150, 244, 77)">Capitals Added
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList" id="TableValue_Latin">
                                                            <font style="color: RGB(153, 102, 255);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Sumerian">
                                                            <font style="color: RGB(169, 208, 142);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Sumerian">
                                                            <font style="color: RGB(220, 208, 148);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Capitals_Mixed">
                                                            <font style="color: RGB(93, 187, 88);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Capitals_Added">
                                                            <font style="color: RGB(150, 244, 77);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(10, event)">
                                                                <font style="color: RGB(111, 193, 121)">Reverse Caps
                                                                    Mixed</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(11, event)">
                                                                <font style="color: RGB(163, 255, 88)">Reverse Caps
                                                                    Added</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(12, event)">
                                                                <font style="color: RGB(253, 255, 119)">Reverse Standard
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(13, event)">
                                                                <font style="color: RGB(255, 0, 0)">Satanic</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(14, event)">
                                                                <font style="color: RGB(255, 0, 0)">Reverse Satanic
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Caps_Mixed">
                                                            <font style="color: RGB(111, 193, 121);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Caps_Added">
                                                            <font style="color: RGB(163, 255, 88);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Standard">
                                                            <font style="color: RGB(253, 255, 119);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Satanic">
                                                            <font style="color: RGB(255, 0, 0);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Satanic">
                                                            <font style="color: RGB(255, 0, 0);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(15, event)">
                                                                <font style="color: RGB(140, 171, 227)">Single Reduction
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(16, event)">
                                                                <font style="color: RGB(97, 195, 244)">KV Exception
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(17, event)">
                                                                <font style="color: RGB(70, 175, 244)">SKV Exception
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(18, event)">
                                                                <font style="color: RGB(100, 216, 209)">Reverse Single
                                                                    Reduction</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(19, event)">
                                                                <font style="color: RGB(101, 224, 194)">EP Exception
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Single_Reduction">
                                                            <font style="color: RGB(140, 171, 227);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_KV_Exception">
                                                            <font style="color: RGB(97, 195, 244);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_SKV_Exception">
                                                            <font style="color: RGB(70, 175, 244);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Single_Reduction">
                                                            <font style="color: RGB(100, 216, 209);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_EP_Exception">
                                                            <font style="color: RGB(101, 224, 194);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(20, event)">
                                                                <font style="color: RGB(110, 226, 156)">EHP Exception
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(21, event)">
                                                                <font style="color: RGB(154, 121, 227)">Latin Ordinal
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(22, event)">
                                                                <font style="color: RGB(159, 99, 197)">Latin Reduction
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(23, event)">
                                                                <font style="color: RGB(255, 204, 111)">Primes</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(24, event)">
                                                                <font style="color: RGB(231, 180, 113)">Trigonal</font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_EHP_Exception">
                                                            <font style="color: RGB(110, 226, 156);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Latin_Ordinal">
                                                            <font style="color: RGB(154, 121, 227);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Latin_Reduction">
                                                            <font style="color: RGB(159, 99, 197);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Primes">
                                                            <font style="color: RGB(255, 204, 111);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Trigonal">
                                                            <font style="color: RGB(231, 180, 113);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(25, event)">
                                                                <font style="color: RGB(228, 216, 96)">Squares</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(26, event)">
                                                                <font style="color: RGB(233, 202, 148)">Fibonacci</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(27, event)">
                                                                <font style="color: RGB(255, 209, 145)">Reverse Primes
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(28, event)">
                                                                <font style="color: RGB(238, 191, 112)">Reverse Trigonal
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(29, event)">
                                                                <font style="color: RGB(240, 225, 112)">Reverse Squares
                                                                </font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList" id="TableValue_Squares">
                                                            <font style="color: RGB(228, 216, 96);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Fibonacci">
                                                            <font style="color: RGB(233, 202, 148);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Primes">
                                                            <font style="color: RGB(255, 209, 145);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Trigonal">
                                                            <font style="color: RGB(238, 191, 112);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Reverse_Squares">
                                                            <font style="color: RGB(240, 225, 112);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(30, event)">
                                                                <font style="color: RGB(166, 166, 99)">Chaldean</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(31, event)">
                                                                <font style="color: RGB(255, 153, 77)">Septenary</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(32, event)">
                                                                <font style="color: RGB(255, 126, 255)">Keypad</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(33, event)">
                                                                <font style="color: RGB(255, 64, 0)">English Qaballa
                                                                </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(34, event)">
                                                                <font style="color: RGB(255, 88, 0)">Cipher X</font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList" id="TableValue_Chaldean">
                                                            <font style="color: RGB(166, 166, 99);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Septenary">
                                                            <font style="color: RGB(255, 153, 77);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Keypad">
                                                            <font style="color: RGB(255, 126, 255);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_English_Qaballa">
                                                            <font style="color: RGB(255, 64, 0);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Cipher_X">
                                                            <font style="color: RGB(255, 88, 0);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(35, event)">
                                                                <font style="color: RGB(255, 93, 73)">Trigrammaton
                                                                    Qabalah</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(36, event)">
                                                                <font style="color: RGB(191, 195, 127)">Alphanumeric
                                                                    Qabbala</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(37, event)">
                                                                <font style="color: RGB(239, 154, 174)">Alphanumeric
                                                                    Satanic</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(38, event)">
                                                                <font style="color: RGB(255, 255, 255)">test</font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(39, event)">
                                                                <font style="color: RGB(255, 255, 255)">joan</font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Trigrammaton_Qabalah">
                                                            <font style="color: RGB(255, 93, 73);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Alphanumeric_Qabbala">
                                                            <font style="color: RGB(191, 195, 127);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList"
                                                            id="TableValue_Alphanumeric_Satanic">
                                                            <font style="color: RGB(239, 154, 174);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_test">
                                                            <font style="color: RGB(255, 255, 255);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_joan">
                                                            <font style="color: RGB(255, 255, 255);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(40, event)">
                                                                <font style="color: RGB(255, 255, 255)"></font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(41, event)">
                                                                <font style="color: RGB(2, 28999, 255)">Chaos </font>
                                                            </div>
                                                        </td>
                                                        <td class="GemTableHeader">
                                                            <div class="GemTableHeader"
                                                                onclick="javascript:MoveCipherClick(42, event)">
                                                                <font style="color: RGB(255, 255, 255)">Pi</font>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td class="GemTableValue InFibList" id="TableValue_">
                                                            <font style="color: RGB(255, 255, 255);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Chaos_">
                                                            <font style="color: RGB(2, 28999, 255);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                        <td class="GemTableValue InFibList" id="TableValue_Pi">
                                                            <font style="color: RGB(255, 255, 255);">
                                                                <div class="NumberClass"><b id="finalBreakNum"
                                                                        class="justnumber"
                                                                        onclick="javascript:Open_Properties(34)">34</b>
                                                                </div>
                                                            </font>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MAIN TABLE SECTION -->
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
                                        <table id="breakdownInject" style="display:inline;">
                                            <tbody>
                                                <tr>
                                                    <td><span class="nextGenText">"1212112112asas" = <font
                                                                style="color: RGB(0, 186, 0);">
                                                                <div class="NumberClass">54</div>
                                                            </font>
                                                            <font style="color: RGB(0, 186, 0)">(Ordinal)</font>
                                                        </span><br>
                                                        <table class="BreakTable">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="BreakCharNG">1</td>
                                                                    <td class="BreakCharNG">2</td>
                                                                    <td class="BreakCharNG">1</td>
                                                                    <td class="BreakCharNG">2</td>
                                                                    <td class="BreakCharNG">1</td>
                                                                    <td class="BreakCharNG">1</td>
                                                                    <td class="BreakCharNG">2</td>
                                                                    <td class="BreakCharNG">1</td>
                                                                    <td class="BreakCharNG">1</td>
                                                                    <td class="BreakCharNG">2</td>
                                                                    <td class="BreakCharNG">a</td>
                                                                    <td class="BreakCharNG">s</td>
                                                                    <td class="BreakCharNG">a</td>
                                                                    <td class="BreakCharNG">s</td>
                                                                    <td class="BreakTotal" rowspan="2">
                                                                        <font style="color: RGB(0, 186, 0);">
                                                                            <div class="NumberClass">54</div>
                                                                        </font>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">2</td>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">2</td>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">2</td>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">2</td>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">19</td>
                                                                    <td class="BreakValue">1</td>
                                                                    <td class="BreakValue">19</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="watermarkBreakGuy" style="display:none;"><img decoding="async"
                                                src="/tools/calculator-advanced/img/gem-guy-flip.png" alt="gematrinator"
                                                width="28"
                                                style="margin-top: 10px; margin-right:0px; float:right; opacity:.25;">
                                        </div>
                                        <center>
                                            <table id="breakdownCipherLabel" style="width:100%; display: inline;">
                                                <font style="color: RGB(0, 186, 0)">Ordinal</font>
                                            </table>
                                        </center>
                                        <span id="watermarkBreakText"
                                            style="display:none; float: right; margin-right: 0px; margin-top: -18px;opacity:.25;position: relative; "><img
                                                decoding="async"
                                                src="/tools/calculator-advanced/img/gematrinator-just-text-200px.png"
                                                alt="gematrinator logo" width="85"></span>
                                    </div>
                                </div>
                                <div id="WordLetterCount">
                                    <div class="WordLetterCount">(1 word, 4 letters)</div>
                                </div> <!-- END BREAKDOWN SECTION -->
                                <!-- CIPHER CHART SECTION -->
                                <div id="ChartSpot">
                                    <table>
                                        <tbody>
                                            <tr></tr>
                                            <tr>
                                                <td class="chartChar">a</td>
                                                <td class="chartChar">b</td>
                                                <td class="chartChar">c</td>
                                                <td class="chartChar">d</td>
                                                <td class="chartChar">e</td>
                                                <td class="chartChar">f</td>
                                                <td class="chartChar">g</td>
                                                <td class="chartChar">h</td>
                                                <td class="chartChar">i</td>
                                                <td class="chartChar">j</td>
                                                <td class="chartChar">k</td>
                                                <td class="chartChar">l</td>
                                                <td class="chartChar">m</td>
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
                                                <td class="chartVal">11</td>
                                                <td class="chartVal">12</td>
                                                <td class="chartVal">13</td>
                                            </tr>
                                            <tr>
                                                <td class="chartChar">n</td>
                                                <td class="chartChar">o</td>
                                                <td class="chartChar">p</td>
                                                <td class="chartChar">q</td>
                                                <td class="chartChar">r</td>
                                                <td class="chartChar">s</td>
                                                <td class="chartChar">t</td>
                                                <td class="chartChar">u</td>
                                                <td class="chartChar">v</td>
                                                <td class="chartChar">w</td>
                                                <td class="chartChar">x</td>
                                                <td class="chartChar">y</td>
                                                <td class="chartChar">z</td>
                                            </tr>
                                            <tr>
                                                <td class="chartVal">14</td>
                                                <td class="chartVal">15</td>
                                                <td class="chartVal">16</td>
                                                <td class="chartVal">17</td>
                                                <td class="chartVal">18</td>
                                                <td class="chartVal">19</td>
                                                <td class="chartVal">20</td>
                                                <td class="chartVal">21</td>
                                                <td class="chartVal">22</td>
                                                <td class="chartVal">23</td>
                                                <td class="chartVal">24</td>
                                                <td class="chartVal">25</td>
                                                <td class="chartVal">26</td>
                                            </tr>
                                            <tr>
                                                <td id="cipherChartTitle" colspan="13"><span id="moveCipherUp"
                                                        class="moveCipher"
                                                        onclick="javascript:MoveCipher(undefined, 1)"><i
                                                            class="fas fa-chevron-circle-up"></i></span>
                                                    <font style="color: RGB(0, 186, 0)">Ordinal</font> <span
                                                        id="moveCipherDown" class="moveCipher"
                                                        onclick="javascript:MoveCipher(undefined, 2)"><i
                                                            class="fas fa-chevron-circle-down"></i></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- END CIPHER CHART SECTION -->
                                <!-- HISTORY SECTION -->
                                <center>
                                    <div id="MiscSpot"><button class="buttonFunction"
                                            onclick="Build_HistoryTable()">Show
                                            History</button><br>
                                        <object id="numberProperty" type="text/html"
                                            data="tools/number-properties-inline/index.php?number=18#numPropAnchor">

                                            <div id="numPropAnchor">
                                                <div id="numPropContainer">
                                                    <center>
                                                        <h2 style="text-transform: uppercase;">Number Properties of:
                                                        </h2>
                                                        <div id="HTMLSpot">
                                                            <table id="TopTable">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><a class="RegularLink"
                                                                                href="javascript:Open_Properties(17)">17</a>
                                                                        </td>
                                                                        <td id="TopNumber">18</td>
                                                                        <td><a class="RegularLink"
                                                                                href="javascript:Open_Properties(19)">19</a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td id="PrimeString" colspan="3">2 ×
                                                                            3<sup>2</sup>
                                                                        </td>
                                                                    </tr>
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
                                                                                <td style="vertical-align: top"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(6)">6</a></b>
                                                                                </td>
                                                                                <td id="FullDivisorList"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(1)">1</a></b>,
                                                                                    <b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(2)">2</a></b>,
                                                                                    <b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(3)">3</a></b>,
                                                                                    <b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(6)">6</a></b>,
                                                                                    <b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(9)">9</a></b>,
                                                                                    <b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(18)">18</a></b><br><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(10)">10</a></b>th
                                                                                    Composite #
                                                                                </td>
                                                                                <td style="vertical-align: top"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(39)">39</a></b>
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
                                                                                <td class="RelativeClass"> Prime #:
                                                                                    &nbsp;
                                                                                </td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(61)">61</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Composite #:
                                                                                    &nbsp;</td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(28)">28</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Fibonacci #:
                                                                                    &nbsp;</td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(2584)">2584</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Triangular #:
                                                                                    &nbsp;</td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(171)">171</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Square #:
                                                                                    &nbsp;
                                                                                </td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(324)">324</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Cube #:
                                                                                    &nbsp;
                                                                                </td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(5832)">5832</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Tetrahedral
                                                                                    #:
                                                                                    &nbsp;</td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(1140)">1140</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Square
                                                                                    Pyramidal
                                                                                    #: &nbsp;</td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(2109)">2109</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Star #:
                                                                                    &nbsp;
                                                                                </td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(1837)">1837</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="RelativeClass"> Pentagonal #:
                                                                                    &nbsp;</td>
                                                                                <td class="RelativeNum"><b
                                                                                        class="Linkable"><a
                                                                                            href="javascript:Open_Properties(477)">477</a></b>
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
                                                                                <td>From:</td>
                                                                                <td class="conversionMiddle">Numeral
                                                                                    system:
                                                                                </td>
                                                                                <td>To:</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>-</td>
                                                                                <td>Octal</td>
                                                                                <td><b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(22)">22</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(20)">20</a></b>
                                                                                </td>
                                                                                <td>Duodecimal</td>
                                                                                <td><b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(16)">16</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(24)">24</a></b>
                                                                                </td>
                                                                                <td>Hexadecimal</td>
                                                                                <td><b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(12)">12</a></b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>-</td>
                                                                                <td>Binary</td>
                                                                                <td><b class="Linkable"><a
                                                                                            href="javascript:Open_Properties(10010)">10010</a></b>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input tabindex="0" id="NumberField" autofocus=""
                                                            onkeydown="CheckEnter(event)" type="number"
                                                            placeholder="Enter #">
                                                        <br><br>
                                                        <button tabindex="1" id="NumberButton" class="buttonFunction"
                                                            onclick="NavNumber()">Get Properties</button>
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
                        <div id="membershipText" class="row gads">
                            <span><a href="/memberships">Become a Member</a> for an ad-free experience</span>
                        </div>

                        <div id="NumberSpot"></div>
                        <br><br>
                        <!-- <script src="js/textdropper.js"></script> -->


                        <!-- CIPHER MODAL -->
                        <div id="ciphMod" class="ciphMod fancybox-content" style="display: none; margin-bottom: 6px;">
                            <center>
                                <h2 id="toph2">Ciphers</h2>
                                <span id="cipherHelpText">Can't find a cipher? <a
                                        href="{{route('faq')}}">See the FAQ</a> or <a
                                        href="{{route('custom-ciphers')}}">Ciphers</a> page.</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'include/footer.php' ?>