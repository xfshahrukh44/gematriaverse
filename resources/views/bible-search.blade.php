@extends('layouts.app')

@section('title', 'Bible search')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/bibletool.css')}}">
@endsection

@section('content')
    <section class="empty-sec py">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- BEGIN MAIN -->

                    <div class="main-content-area full-width-template">

                        <div class="page-content clearfix">
                            <div class="wpb-content-wrapper">
                                <div id="wbc-66f5bfca473d3" class="vc_row wpb_row  full-width-section"
                                     style="padding-top: 60px;padding-bottom: 30px;">
                                    <div class="container">
                                        <div class="-inner">
                                            <div class="wpb_column vc_column_container vc_col-sm-12 text-center">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class="current-user">Username: <span class="user-name">Mersdecodes</span><br>User
                                                            ID: <span class="user-id">9727</span><br>Membership level:
                                                            <span class="membership-level">Enthusiast</span></div>
                                                        <div class="tool-wrapper">
                                                            <link rel="stylesheet" type="text/css"
                                                                  href="tools/bible-search/css/bibletool.css">


                                                            <script src="tools/bible-search/js/bibletool.js"></script>
                                                            <script src="tools/bible-search/js/cipherbuilder.js"></script>
                                                            <script src="tools/bible-search/js/load.js"></script>

                                                            <div class="container-bible">
                                                                <div class="row">
                                                                    <div id="h1holder" class="col-12">
                                                                        <h1>Bible Search Tools (KJV)</h1>
                                                                        <span class="mo-only directions">Tap a search/option to display:</span>
                                                                    </div>
                                                                </div>

                                                                <div id="firstRow" class="row">
                                                                    <div id="bookSelect" class="col-xs-12 col-lg-6">
                                                                        <h3 class="mo-only"
                                                                            onclick="myFunction(this), directSearchShow()">
                                                                            <span> + </span>Direct Search</h3>
                                                                        <h3 class="no-mo">Direct Search</h3>
                                                                        <div id="directSearchSection">
                                                                            <div id="bookSelector">
                                                                                <label>Book</label>
                                                                                <br>
                                                                                <select id="select_book">

                                                                                </select>
                                                                            </div>
                                                                            <div id="chapterSelector">
                                                                                <label>Chapter</label>
                                                                                <br>
                                                                                <select class="form-select form-select-sm" id="select_chapter">

                                                                                </select>
                                                                            </div>
                                                                            <div id="verseSelector">
                                                                                <label>Verse</label>
                                                                                <br>
                                                                                <select class="form-select form-select-sm" id="select_verse">

                                                                                </select>
                                                                            </div>
                                                                            <button class="buttonFunction" type="button" id="btn_search_by_chapter" value="Add Date">
                                                                                SEARCH
                                                                            </button>
                                                                            <div class="mo-only"><br>
                                                                                <script>
                                                                                    function myFunction(x) {
                                                                                        x.classList.toggle("change");
                                                                                    }
                                                                                </script>
                                                                                <script>
                                                                                    function directSearchShow() {
                                                                                        var x = document.getElementById("directSearchSection");
                                                                                        if (x.style.display === "block") {
                                                                                            x.style.display = "none";
                                                                                        } else {
                                                                                            x.style.display = "block";
                                                                                        }
                                                                                    }
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="gemSelect" class="col-xs-12 col-lg-6">
                                                                        <h3 class="mo-only"
                                                                            onclick="myFunction2(this), phraseValueSearchShow()">
                                                                            <span> + </span>Phrase/Value Search</h3>
                                                                        <h3 class="no-mo">Phrase/Value Search</h3>
                                                                        <div id="phraseValueSearchSection">
                                                                            <label>Enter Word, Phrase, or Number</label>
                                                                            <br>
                                                                            <input id="input_query"
                                                                                   class="form-control form-control-sm"
                                                                                   type="text" tabindex="1">
                                                                            <script>
                                                                                // var input = document.getElementById("wordPhraseNumber");
                                                                                // input.addEventListener("keypress", function (event) {
                                                                                //     if (event.key === "Enter") {
                                                                                //         event.preventDefault();
                                                                                //         document.getElementById("WPNSearchButton").click();
                                                                                //     }
                                                                                // });
                                                                            </script>
                                                                            <!----- MOBILE Options Check Boxes ----------->
                                                                            <!--<ul class="mo-only">-->
                                                                            <!--	<li><input tabindex=3 type="checkbox" id="Include_Verses" value="Verses" title="Includes the Verse name in the Gematria calculation.-->

                                                                            <!--	Example: If checked, 'Genesis 1:1' + 'In the beginning God created the heaven and the earth.' -->

                                                                            <!--	instead of just the verse 'In the beginning God created the heaven and the earth.'" onclick="Change_Options()"><span title="Includes the Verse name in the Gematria calculation.-->

                                                                            <!--	Example: If checked, 'Genesis 1:1' + 'In the beginning God created the heaven and the earth.' -->

                                                                            <!--	instead of just the verse 'In the beginning God created the heaven and the earth.'"> Include Verse Name</span></input></li>-->
                                                                            <!--	<li><input tabindex=4 type="checkbox" id="Match_Any" value="Match Any" title="If multiple items are being searched, ANY match will populate in the list below." onclick="Change_Options(0)" checked><span title="If multiple items are being searched, ANY match will populate in the list below."> Match Any</span></input></li>-->
                                                                            <!--	<li><input tabindex=5 type="checkbox" id="Match_All" value="Match All" title="If multiple items are being searched, ALL matches MUST be present to render a result in the list below." onclick="Change_Options(1)"><span title="If multiple items are being searched, ALL matches MUST be present to render a result in the list below."> Match All</span></input></li>-->
                                                                            <!--</ul>-->
                                                                            <button id="btn_search_by_query"
                                                                                    value="SearchNumber">SEARCH
                                                                            </button>
{{--                                                                            <br>--}}
{{--                                                                            <input tabindex="4" type="checkbox"--}}
{{--                                                                                   id="Match_Any" value="Match Any"--}}
{{--                                                                                   title="If multiple items are being searched, ANY match will populate in the list below."--}}
{{--                                                                                   onclick="Change_Options(0)"--}}
{{--                                                                                   checked=""><span--}}
{{--                                                                                    title="If multiple items are being searched, ANY match will populate in the list below."> Match Any</span>--}}
{{--                                                                            <input tabindex="5" type="checkbox"--}}
{{--                                                                                   id="Match_All" value="Match All"--}}
{{--                                                                                   title="If multiple items are being searched, ALL matches MUST be present to render a result in the list below."--}}
{{--                                                                                   onclick="Change_Options(1)"><span--}}
{{--                                                                                    title="If multiple items are being searched, ALL matches MUST be present to render a result in the list below."> Match All</span>--}}
{{--                                                                            <input tabindex="3" type="checkbox"--}}
{{--                                                                                   id="Include_Verses" value="Verses"--}}
{{--                                                                                   title="Includes the Verse name in the Gematria calculation.Example: If checked, 'Genesis 1:1' + 'In the beginning God created the heaven and the earth.'instead of just the verse 'In the beginning God created the heaven and the earth.'"--}}
{{--                                                                                   onclick="Change_Options()"><span--}}
{{--                                                                                    title="Includes the Verse name in the Gematria calculation. Example: If checked, 'Genesis 1:1' + 'In the beginning God created the heaven and the earth.' instead of just the verse 'In the beginning God created the heaven and the earth.'"> Include Verse Name</span>--}}
                                                                            <div class="mo-only"><br>
                                                                                <script>
                                                                                    function myFunction2(x) {
                                                                                        x.classList.toggle("change");
                                                                                    }
                                                                                </script>
                                                                                <script>
                                                                                    function phraseValueSearchShow() {
                                                                                        var x = document.getElementById("phraseValueSearchSection");
                                                                                        if (x.style.display === "block") {
                                                                                            x.style.display = "none";
                                                                                        } else {
                                                                                            x.style.display = "block";
                                                                                        }
                                                                                    }
                                                                                </script>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="secondRow" class="row">
{{--                                                                    <div class="col-xs-12 col-lg-6">--}}
{{--                                                                        <h3 class="mo-only"--}}
{{--                                                                            onclick="myFunction3(this), verseNumberSearchShow()">--}}
{{--                                                                            <span> + </span>Verse Number Search</h3>--}}
{{--                                                                        <h3 class="no-mo">Verse Number Search</h3>--}}
{{--                                                                        <div id="verseNumberSearchSection">--}}
{{--                                                                            <label>Enter Verse Number</label>--}}
{{--                                                                            <br>--}}
{{--                                                                            <input id="verseNumber"--}}
{{--                                                                                   class="form-control form-control-sm"--}}
{{--                                                                                   type="number" tabindex="1">--}}
{{--                                                                            <script>--}}
{{--                                                                                var input = document.getElementById("verseNumber");--}}
{{--                                                                                input.addEventListener("keypress", function (event) {--}}
{{--                                                                                    if (event.key === "Enter") {--}}
{{--                                                                                        event.preventDefault();--}}
{{--                                                                                        document.getElementById("verseSearchButton").click();--}}
{{--                                                                                    }--}}
{{--                                                                                });--}}
{{--                                                                            </script>--}}
{{--                                                                            <button id="verseSearchButton"--}}
{{--                                                                                    class="buttonFunction"--}}
{{--                                                                                    onclick="SearchByVerseNumber()"--}}
{{--                                                                                    value="Search Verse Number">SEARCH--}}
{{--                                                                            </button>--}}
{{--                                                                            <div class="mo-only"><br>--}}
{{--                                                                                <script>--}}
{{--                                                                                    function myFunction3(x) {--}}
{{--                                                                                        x.classList.toggle("change");--}}
{{--                                                                                    }--}}
{{--                                                                                </script>--}}
{{--                                                                                <script>--}}
{{--                                                                                    function verseNumberSearchShow() {--}}
{{--                                                                                        var x = document.getElementById("verseNumberSearchSection");--}}
{{--                                                                                        if (x.style.display === "block") {--}}
{{--                                                                                            x.style.display = "none";--}}
{{--                                                                                        } else {--}}
{{--                                                                                            x.style.display = "block";--}}
{{--                                                                                        }--}}
{{--                                                                                    }--}}
{{--                                                                                </script>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
                                                                    <div id="options" class="col-md-6 offset-md-3 mb-4">
                                                                        <h3 class="mo-only"
                                                                            onclick="myFunction4(this), optionsShow()">
                                                                            <span> + </span>Options</h3>
                                                                        <h3 class="no-mo">Options</h3>
                                                                        <div id="optionsSection">
                                                                            <button class="buttonFunction width150"><a
                                                                                        id="ciphModBtn"
                                                                                        onclick="javascript:Open_Ciphers()"
                                                                                        data-fancybox="ciphers"
                                                                                        data-src="#ciphMod">Ciphers</a>
                                                                            </button>
                                                                            <!-- CIPHER MODAL -->
                                                                            <div id="ciphMod" class="ciphMod">
                                                                                <center>
                                                                                    <h2 id="toph2">Ciphers</h2>
                                                                                    <ul id="cipherBox"></ul>
                                                                                </center>
                                                                                <center>
                                                                                    <!-- <button class="buttonFunctionCiphers" id="SaveCiphers" onclick="javascript:Update_Ciphers(), jQuery.fancybox.close();"><img decoding="async" src="tools/calculator/img/save-icon.png" class="imgTop" width="16">Update</button> -->
                                                                                    <span>After selecting your ciphers, please search again to see the newly selected cipher columns.</span>
                                                                                    <br>
                                                                                    <br>
                                                                                    <button class="buttonFunctionCiphers"
                                                                                            id="CancelCiphers"
                                                                                            onclick="javascript:Cancel_Ciphers()">
                                                                                        Return
                                                                                    </button>
                                                                                    <br>
                                                                                    <br>

                                                                                    <!-- 						<div id="cipherPresets">
                                <h2>Cipher Presets</h2>
                                <span>The checked ciphers above will save as your: </span><select name="SavePresets" id="PresetDropdown"></select> <button class="buttonFunctionCiphers" id="SaveCiphers" onclick="javascript:Update_Ciphers(), jQuery.fancybox.close();"><img decoding="async" src="tools/calculator/img/save-icon.png" class="imgTop" width="16">Close/Save</button><br><br>
                                <span>Select previous Preset to load: <select name="LoadPresets" id="PresetDropdown2"></select> <button class="buttonFunctionCiphers" id="LoadCiphers" onclick="javascript:Load_Preset()">Load</button><br><br>
                            </div> -->
                                                                                </center>
                                                                            </div>
                                                                            <!-- END CIPHER MODAL -->
                                                                            <button id="bookDatBtn"
                                                                                    class="buttonFunction width150"><a
                                                                                        class="verLink"
                                                                                        data-fancybox="bookdata"
                                                                                        data-src="#bookDatMod"
                                                                                        onclick="javascript:BuildBookTable()">BOOK
                                                                                    DATA</a></button>
                                                                            <!-- The Book Data Modal -->
                                                                            <div id="bookDatMod" class="bookDatMod">
                                                                                <div id="bookDataBox"></div>
                                                                            </div>
                                                                            <div class="no-mo"></div>
                                                                            <div class="mo"><br>
                                                                                <script>
                                                                                    function myFunction4(x) {
                                                                                        x.classList.toggle("change");
                                                                                    }
                                                                                </script>
                                                                                <script>
                                                                                    function optionsShow() {
                                                                                        var x = document.getElementById("optionsSection");
                                                                                        if (x.style.display === "block") {
                                                                                            x.style.display = "none";
                                                                                        } else {
                                                                                            x.style.display = "block";
                                                                                        }
                                                                                    }
                                                                                </script>
                                                                            </div>


                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div id="resultsContainer" class="row">
                                                                    <center>
                                                                        <div id="DropHere" class="col-xs-12">
{{--                                                                            31 results for Book 'Genesis: Chapter 1' found--}}
                                                                            <table id="MainTable" class="table">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Verse</th>
                                                                                    <th>Ordinal</th>
                                                                                    <th>Reduction</th>
                                                                                    <th>Reverse</th>
                                                                                    <th>Reverse Reduction</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:1')">Genesis
                                                                                            1:1</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">411</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">222</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">777</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">219</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:2')">Genesis
                                                                                            1:2</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1238</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">509</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1732</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">562</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:3')">Genesis
                                                                                            1:3</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">408</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">192</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">699</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">222</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:4')">Genesis
                                                                                            1:4</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">706</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">310</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1076</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">347</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:5')">Genesis
                                                                                            1:5</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">908</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">431</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1549</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">469</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:6')">Genesis
                                                                                            1:6</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">967</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">400</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1382</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">500</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:7')">Genesis
                                                                                            1:7</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1266</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">564</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1866</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">633</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:8')">Genesis
                                                                                            1:8</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">713</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">344</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1231</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">358</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:9')">Genesis
                                                                                            1:9</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1047</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">435</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1599</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">519</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:10')">Genesis
                                                                                            1:10</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">968</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">419</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1597</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">499</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:11')">Genesis
                                                                                            1:11</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1523</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">677</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2149</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">763</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:12')">Genesis
                                                                                            1:12</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1493</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">656</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2179</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">757</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:13')">Genesis
                                                                                            1:13</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">443</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">218</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">664</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">205</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:14')">Genesis
                                                                                            1:14</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1371</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">606</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2085</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">681</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:15')">Genesis
                                                                                            1:15</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">897</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">384</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1236</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">408</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:16')">Genesis
                                                                                            1:16</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1130</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">464</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1570</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">535</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:17')">Genesis
                                                                                            1:17</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">684</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">306</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">963</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">297</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:18')">Genesis
                                                                                            1:18</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1025</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">422</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1405</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">478</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:19')">Genesis
                                                                                            1:19</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">472</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">220</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">662</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">203</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:20')">Genesis
                                                                                            1:20</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1404</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">594</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2025</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">666</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:21')">Genesis
                                                                                            1:21</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1786</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">751</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2480</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">860</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:22')">Genesis
                                                                                            1:22</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1124</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">431</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1495</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">532</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:23')">Genesis
                                                                                            1:23</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">433</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">217</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">674</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">197</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:24')">Genesis
                                                                                            1:24</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1274</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">581</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2020</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">697</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:25')">Genesis
                                                                                            1:25</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1412</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">620</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2206</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">730</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:26')">Genesis
                                                                                            1:26</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">2149</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">934</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">3089</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">1028</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:27')">Genesis
                                                                                            1:27</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">734</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">392</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1453</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">418</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:28')">Genesis
                                                                                            1:28</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">2128</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">904</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2948</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">977</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:29')">Genesis
                                                                                            1:29</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1642</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">769</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2462</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">797</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:30')">Genesis
                                                                                            1:30</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1676</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">740</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">2239</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">754</font>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><a class="verLink"
                                                                                           href="javascript:OpenDetails('Genesis_1:31')">Genesis
                                                                                            1:31</a></td>
                                                                                    <td>
                                                                                        <font style="color: RGB(0, 186, 0)">1031</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(88, 125, 254)">464</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(80, 235, 21)">1534</font>
                                                                                    </td>
                                                                                    <td>
                                                                                        <font style="color: RGB(100, 226, 226)">472</font>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </center>
                                                                </div>
                                                            </div> <!---END CONTAINER--->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- ./page-content -->

                        <!-- END Main -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
{{--    <script src="{{asset('js/bibletool.js')}}"></script>--}}
{{--    <script src="{{asset('js/cipherbuilder.js')}}"></script>--}}
{{--    <script src="{{asset('js/load.js')}}"></script>--}}
    <script>
        $(document).ready(() => {
            let headers = {
                'accept':'application/json',
                'api-key':'b2b1fcabd2cedd206131d848c2a7c759'
            };

            const get_books = () => {
                $.ajax({
                    url: 'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/books',
                    method: 'GET',
                    headers: headers,
                    success: (data) => {
                        if (data.data) {
                            return set_books(data.data);
                        }

                        return set_books([]);
                    },
                    error: (error) => {
                        return set_books([]);
                    },
                });
            }

            const set_books = (books) => {
                let selector = $('#select_book');
                selector.html('<option value="">Select book</option>');

                for (const book of books) {
                    selector.append('<option value="'+book.id+'">'+book.name+'</option>');
                }
            }

            const get_chapters = (book_id) => {
                $.ajax({
                    url: 'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/books/'+book_id+'/chapters',
                    method: 'GET',
                    headers: headers,
                    success: (data) => {
                        if (data.data) {
                            return set_chapters(data.data);
                        }

                        return set_chapters([]);
                    },
                    error: (error) => {
                        return set_chapters([]);
                    },
                });
            }

            const set_chapters = (chapters) => {
                let selector = $('#select_chapter');
                selector.html('<option value="">Select chapter</option>');

                for (const chapter of chapters) {
                    selector.append('<option value="'+chapter.id+'">'+chapter.number+'</option>');
                }
            }

            const get_verses = (chapter_id) => {
                $.ajax({
                    url: 'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/chapters/'+chapter_id+'/verses',
                    method: 'GET',
                    headers: headers,
                    success: (data) => {
                        if (data.data) {
                            return set_verses(data.data);
                        }

                        return set_verses([]);
                    },
                    error: (error) => {
                        return set_verses([]);
                    },
                });
            }

            const set_verses = (verses) => {
                let selector = $('#select_verse');
                selector.html('<option value="">Select verse</option>');

                let count = 1;
                for (const verse of verses) {
                    selector.append('<option value="'+verse.id+'">'+count+'</option>');
                    count += 1;
                }
            }

            const get_verse_detail = (verse_id) => {
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: 'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/verses/' + verse_id,
                        method: 'GET',
                        headers: headers,
                        success: function(data) {
                            resolve(data.data); // Resolve the Promise with the data
                        },
                        error: function(error) {
                            reject(error); // Handle the error
                        }
                    });
                });
            }

            const search_verses = (query) => {
                if (query === '') {
                    return false;
                }

                $.ajax({
                    url: 'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/search',
                    method: 'GET',
                    headers: headers,
                    data: {
                        query: query,
                        limit: 40
                    },
                    success: (data) => {
                        if (data.data.verses) {
                            return submit_verses(data.data.verses);
                        }

                        return submit_verses([]);
                    },
                    error: (error) => {
                        return submit_verses([]);
                    },
                });
            }

            const submit_verses = (verses) => {
                console.log(verses);

                //your code here
            }

            $('#select_book').on('change', function () {
                $('#select_chapter').val('').trigger('change');

                if ($(this).val() === '') {
                    return false;
                }

                return get_chapters($(this).val());
            });

            $('#select_chapter').on('change', function () {
                $('#select_verse').val('').trigger('change');

                if ($(this).val() === '') {
                    return false;
                }

                return get_verses($(this).val());
            });

            $('#btn_search_by_chapter').on('click', function () {
                let selected_chapter = $('#select_chapter').val();
                let selected_verse = $('#select_verse').val();

                if (selected_chapter === '') {
                    return false;
                }

                let url = (selected_verse === '') ?
                    'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/chapters/'+selected_chapter+'/verses'
                    : 'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/verses/' + selected_verse;

                $.ajax({
                    url: url,
                    method: 'GET',
                    headers: headers,
                    success: (data) => {
                        let result = [];
                        if (selected_verse === '') {
                            for (const item of data.data) {
                                get_verse_detail(item.id).then(res => {
                                    result.push(res);

                                    if (data.data.length === result.length) {
                                        result = result.sort((a, b) => {
                                            const numA = parseInt(a.id.split('.').pop());
                                            const numB = parseInt(b.id.split('.').pop());
                                            if (numA < numB) {
                                                return -1;
                                            }
                                            if (numA > numB) {
                                                return 1;
                                            }
                                            return 0; // equal
                                        });

                                        submit_verses(result);
                                    }
                                });
                            }
                        } else {
                            submit_verses([data.data]);
                        }
                    },
                    error: (error) => {
                        submit_verses([]);
                    },
                });

            });

            $('#btn_search_by_query').on('click', function () {
                let val = $('#input_query').val();
                if (val === '') {
                    return false;
                }

                return search_verses(val);
            });

            get_books();
        });
    </script>
@endsection


