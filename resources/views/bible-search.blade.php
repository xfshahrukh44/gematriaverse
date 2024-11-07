@extends('layouts.app')

@section('title', 'Bible search')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/bibletool.css')}}">
    <style>
        #DropHere {
            overflow-x: scroll;
        }
    </style>
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
                                                                                        data-fancybox=""
                                                                                        data-src="#ciphMod">Ciphers</a>
                                                                            </button>
                                                                            <!-- CIPHER MODAL -->
                                                                            <div id="ciphMod" class="ciphMod">
                                                                                <center>
                                                                                    <h2 id="toph2">Ciphers</h2>
                                                                                    {{-- @if (Auth::check()) --}}
                                                                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                                                                    {{-- @else --}}
                                                                                        {{-- @php
                                                                                            if (!session()->has('temp_id')) {
                                                                                                session(['temp_id' => uniqid('temp_', true)]);
                                                                                            }
                                                                                        @endphp
                                                                                        <input type="hidden" name="user_id" id="user_id" value="{{ session('temp_id') }}">
                                                                                    @endif --}}
                                                                                    <ul id="cipherBox">
                                                                                        @foreach ($ciphersAll as $item)
                                                                                            @php
                                                                                                $rgb = json_decode($item['rgb_values'], true);
                                                                                                $red = $rgb['red'] ?? 0;
                                                                                                $green = $rgb['green'] ?? 0;
                                                                                                $blue = $rgb['blue'] ?? 0;
                                                                                                $status = $item['ci_settings']['status'] ?? null; // Use null if not set
                                                                                            @endphp
                                                                                            @if ($user_id == '')
                                                                                                <li>
                                                                                                    <input type="checkbox" id="Cipher{{ $item['id'] }}" value="Verses" data-id="{{ $item['id'] }}" onclick="Change_Ciphers('{{ $item['id'] }}')" checked disabled>
                                                                                                    <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">{{ $item['name'] }}</font>
                                                                                                </li>
                                                                                            @else
                                                                                                <li>
                                                                                                    <input type="checkbox" id="Cipher{{ $item['id'] }}" value="Verses" data-id="{{ $item['id'] }}" onclick="Change_Ciphers('{{ $item['id'] }}')" {{ $status == 1 ? 'checked' : '' }}>
                                                                                                    <font style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">{{ $item['name'] }}</font>
                                                                                                </li>
                                                                                            @endif
                                                                                        @endforeach

                                                                                    </ul>
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
                                                                                <div id="bookDataBox">
                                                                                    <table id="bookDatTable" class="table">
                                                                                        <thead>
                                                                                           <tr>
                                                                                              <td>Book</td>
                                                                                              <td>Number</td>
                                                                                              <td>Verses</td>
                                                                                              <td>Chapters</td>
                                                                                              <td>Longest Chapter</td>
                                                                                           </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                           <tr>
                                                                                              <td>1 Chronicles</td>
                                                                                              <td>1</td>
                                                                                              <td>942</td>
                                                                                              <td>29</td>
                                                                                              <td>81</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>1 Corinthians</td>
                                                                                              <td>2</td>
                                                                                              <td>437</td>
                                                                                              <td>16</td>
                                                                                              <td>58</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>1 John</td>
                                                                                              <td>3</td>
                                                                                              <td>105</td>
                                                                                              <td>5</td>
                                                                                              <td>29</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>1 Kings</td>
                                                                                              <td>4</td>
                                                                                              <td>816</td>
                                                                                              <td>22</td>
                                                                                              <td>66</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>1 Peter</td>
                                                                                              <td>5</td>
                                                                                              <td>105</td>
                                                                                              <td>5</td>
                                                                                              <td>25</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>1 Samuel</td>
                                                                                              <td>6</td>
                                                                                              <td>810</td>
                                                                                              <td>31</td>
                                                                                              <td>58</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>1 Thessalonians</td>
                                                                                              <td>7</td>
                                                                                              <td>89</td>
                                                                                              <td>5</td>
                                                                                              <td>28</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>1 Timothy</td>
                                                                                              <td>8</td>
                                                                                              <td>113</td>
                                                                                              <td>6</td>
                                                                                              <td>25</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 Chronicles</td>
                                                                                              <td>9</td>
                                                                                              <td>822</td>
                                                                                              <td>36</td>
                                                                                              <td>42</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 Corinthians</td>
                                                                                              <td>10</td>
                                                                                              <td>257</td>
                                                                                              <td>13</td>
                                                                                              <td>33</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 John</td>
                                                                                              <td>11</td>
                                                                                              <td>13</td>
                                                                                              <td>1</td>
                                                                                              <td>13</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 Kings</td>
                                                                                              <td>12</td>
                                                                                              <td>719</td>
                                                                                              <td>25</td>
                                                                                              <td>44</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 Peter</td>
                                                                                              <td>13</td>
                                                                                              <td>61</td>
                                                                                              <td>3</td>
                                                                                              <td>22</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 Samuel</td>
                                                                                              <td>14</td>
                                                                                              <td>695</td>
                                                                                              <td>24</td>
                                                                                              <td>51</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 Thessalonians</td>
                                                                                              <td>15</td>
                                                                                              <td>47</td>
                                                                                              <td>3</td>
                                                                                              <td>12</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>2 Timothy</td>
                                                                                              <td>16</td>
                                                                                              <td>83</td>
                                                                                              <td>4</td>
                                                                                              <td>26</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>3 John</td>
                                                                                              <td>17</td>
                                                                                              <td>14</td>
                                                                                              <td>1</td>
                                                                                              <td>14</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Acts</td>
                                                                                              <td>18</td>
                                                                                              <td>1007</td>
                                                                                              <td>28</td>
                                                                                              <td>60</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Amos</td>
                                                                                              <td>19</td>
                                                                                              <td>146</td>
                                                                                              <td>9</td>
                                                                                              <td>27</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Colossians</td>
                                                                                              <td>20</td>
                                                                                              <td>95</td>
                                                                                              <td>4</td>
                                                                                              <td>29</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Daniel</td>
                                                                                              <td>21</td>
                                                                                              <td>357</td>
                                                                                              <td>12</td>
                                                                                              <td>49</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Deuteronomy</td>
                                                                                              <td>22</td>
                                                                                              <td>959</td>
                                                                                              <td>34</td>
                                                                                              <td>68</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Ecclesiastes</td>
                                                                                              <td>23</td>
                                                                                              <td>222</td>
                                                                                              <td>12</td>
                                                                                              <td>29</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Ephesians</td>
                                                                                              <td>24</td>
                                                                                              <td>155</td>
                                                                                              <td>6</td>
                                                                                              <td>33</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Esther</td>
                                                                                              <td>25</td>
                                                                                              <td>167</td>
                                                                                              <td>10</td>
                                                                                              <td>32</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Exodus</td>
                                                                                              <td>26</td>
                                                                                              <td>1213</td>
                                                                                              <td>40</td>
                                                                                              <td>51</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Ezekiel</td>
                                                                                              <td>27</td>
                                                                                              <td>1273</td>
                                                                                              <td>48</td>
                                                                                              <td>63</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Ezra</td>
                                                                                              <td>28</td>
                                                                                              <td>280</td>
                                                                                              <td>10</td>
                                                                                              <td>70</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Galatians</td>
                                                                                              <td>29</td>
                                                                                              <td>149</td>
                                                                                              <td>6</td>
                                                                                              <td>31</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Genesis</td>
                                                                                              <td>30</td>
                                                                                              <td>1533</td>
                                                                                              <td>50</td>
                                                                                              <td>67</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Habakkuk</td>
                                                                                              <td>31</td>
                                                                                              <td>56</td>
                                                                                              <td>3</td>
                                                                                              <td>20</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Haggai</td>
                                                                                              <td>32</td>
                                                                                              <td>38</td>
                                                                                              <td>2</td>
                                                                                              <td>23</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Hebrews</td>
                                                                                              <td>33</td>
                                                                                              <td>303</td>
                                                                                              <td>13</td>
                                                                                              <td>40</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Hosea</td>
                                                                                              <td>34</td>
                                                                                              <td>197</td>
                                                                                              <td>14</td>
                                                                                              <td>23</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Isaiah</td>
                                                                                              <td>35</td>
                                                                                              <td>1292</td>
                                                                                              <td>66</td>
                                                                                              <td>38</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>James</td>
                                                                                              <td>36</td>
                                                                                              <td>108</td>
                                                                                              <td>5</td>
                                                                                              <td>27</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Jeremiah</td>
                                                                                              <td>37</td>
                                                                                              <td>1364</td>
                                                                                              <td>52</td>
                                                                                              <td>64</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Job</td>
                                                                                              <td>38</td>
                                                                                              <td>1070</td>
                                                                                              <td>42</td>
                                                                                              <td>41</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Joel</td>
                                                                                              <td>39</td>
                                                                                              <td>73</td>
                                                                                              <td>3</td>
                                                                                              <td>32</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>John</td>
                                                                                              <td>40</td>
                                                                                              <td>879</td>
                                                                                              <td>21</td>
                                                                                              <td>71</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Jonah</td>
                                                                                              <td>41</td>
                                                                                              <td>48</td>
                                                                                              <td>4</td>
                                                                                              <td>17</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Joshua</td>
                                                                                              <td>42</td>
                                                                                              <td>658</td>
                                                                                              <td>24</td>
                                                                                              <td>63</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Jude</td>
                                                                                              <td>43</td>
                                                                                              <td>25</td>
                                                                                              <td>1</td>
                                                                                              <td>25</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Judges</td>
                                                                                              <td>44</td>
                                                                                              <td>618</td>
                                                                                              <td>21</td>
                                                                                              <td>57</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Lamentations</td>
                                                                                              <td>45</td>
                                                                                              <td>154</td>
                                                                                              <td>5</td>
                                                                                              <td>66</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Leviticus</td>
                                                                                              <td>46</td>
                                                                                              <td>859</td>
                                                                                              <td>27</td>
                                                                                              <td>59</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Luke</td>
                                                                                              <td>47</td>
                                                                                              <td>1151</td>
                                                                                              <td>24</td>
                                                                                              <td>80</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Malachi</td>
                                                                                              <td>48</td>
                                                                                              <td>55</td>
                                                                                              <td>4</td>
                                                                                              <td>18</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Mark</td>
                                                                                              <td>49</td>
                                                                                              <td>678</td>
                                                                                              <td>16</td>
                                                                                              <td>72</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Matthew</td>
                                                                                              <td>50</td>
                                                                                              <td>1071</td>
                                                                                              <td>28</td>
                                                                                              <td>75</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Micah</td>
                                                                                              <td>51</td>
                                                                                              <td>105</td>
                                                                                              <td>7</td>
                                                                                              <td>20</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Nahum</td>
                                                                                              <td>52</td>
                                                                                              <td>47</td>
                                                                                              <td>3</td>
                                                                                              <td>19</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Nehemiah</td>
                                                                                              <td>53</td>
                                                                                              <td>406</td>
                                                                                              <td>13</td>
                                                                                              <td>73</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Numbers</td>
                                                                                              <td>54</td>
                                                                                              <td>1288</td>
                                                                                              <td>36</td>
                                                                                              <td>89</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Obadiah</td>
                                                                                              <td>55</td>
                                                                                              <td>21</td>
                                                                                              <td>1</td>
                                                                                              <td>21</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Philemon</td>
                                                                                              <td>56</td>
                                                                                              <td>25</td>
                                                                                              <td>1</td>
                                                                                              <td>25</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Philippians</td>
                                                                                              <td>57</td>
                                                                                              <td>104</td>
                                                                                              <td>4</td>
                                                                                              <td>30</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Proverbs</td>
                                                                                              <td>58</td>
                                                                                              <td>915</td>
                                                                                              <td>31</td>
                                                                                              <td>36</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Psalms</td>
                                                                                              <td>59</td>
                                                                                              <td>2461</td>
                                                                                              <td>150</td>
                                                                                              <td>176</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Revelation</td>
                                                                                              <td>60</td>
                                                                                              <td>404</td>
                                                                                              <td>22</td>
                                                                                              <td>29</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Romans</td>
                                                                                              <td>61</td>
                                                                                              <td>433</td>
                                                                                              <td>16</td>
                                                                                              <td>39</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Ruth</td>
                                                                                              <td>62</td>
                                                                                              <td>85</td>
                                                                                              <td>4</td>
                                                                                              <td>23</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Song of Solomon</td>
                                                                                              <td>63</td>
                                                                                              <td>117</td>
                                                                                              <td>8</td>
                                                                                              <td>17</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Titus</td>
                                                                                              <td>64</td>
                                                                                              <td>46</td>
                                                                                              <td>3</td>
                                                                                              <td>16</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Zechariah</td>
                                                                                              <td>65</td>
                                                                                              <td>211</td>
                                                                                              <td>14</td>
                                                                                              <td>23</td>
                                                                                           </tr>
                                                                                           <tr>
                                                                                              <td>Zephaniah</td>
                                                                                              <td>66</td>
                                                                                              <td>53</td>
                                                                                              <td>3</td>
                                                                                              <td>20</td>
                                                                                           </tr>
                                                                                        </tbody>
                                                                                     </table>
                                                                                </div>
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
                                                                        <input type="hidden" name="chapterId" id="chapterId">
                                                                        <input type="hidden" name="selectedVerse" id="selectedVerse">
                                                                        <div id="DropHere" class="col-xs-12">
                                                                            <table id="MainTableVerse" class="table">

                                                                            </table>
                                                                            <table id="MainTableDefault" class="table">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Verse</th>
                                                                                    {{-- <th>Ordinal</th>
                                                                                    <th>Reduction</th>
                                                                                    <th>Reverse</th>
                                                                                    <th>Reverse Reduction</th> --}}
                                                                                    @foreach ($ciphers as $cipher)
                                                                                    <th>{{ $cipher['name'] }}</th>
                                                                                    @endforeach
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody id="cipher-body">
                                                                                    <!-- Rows will be dynamically inserted here by JavaScript -->
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
        trackTimeSpent('bible_search', "{{ route('log.time.spent') }}", "{{ csrf_token() }}");
    </script>
    <script>
        let savedHTML, saveQuery;
        function Change_Ciphers(cipherId) {
            let userId = $('#user_id').val();
            let isChecked = document.getElementById('Cipher' + cipherId).checked;
            let status = isChecked ? 1 : 0;

            $.ajax({
                url: "{{ route('ciphers.change') }}", // Laravel route to update the status
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    user_id: userId,
                    cipher_id: cipherId,
                    status: status
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Cipher status updated successfully');
                    } else {
                        console.log('Failed to update cipher status');
                    }
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        function Cancel_Ciphers() {
            location.reload();
        }

        function OpenDetails(impVal){
            savedHTML = $('#MainTableDefault').length ? $('#MainTableDefault').html() : $('#MainTable').html();
            // console.log(savedHTML);
            // Parse the saved HTML to extract the <thead>
            let parser = new DOMParser();
            let doc = parser.parseFromString('<table>' + savedHTML + '</table>', 'text/html');
            // console.log(doc);
            let thead = doc.querySelector('thead');  // Extract <thead>

            // console.log(thead ? thead.outerHTML : 'No <thead> found');
            //Activated when a user clicks on the name of a Bible verse
            dropSpot = document.getElementById("DropHere")
            dropSpot.innerHTML = 'Loading...<p><button class="btn btn-primary" onclick="BuildResultTable()">Go Back</button>'
            lastRetrieve = impVal
            RetrieveDetails(impVal, savedHTML, thead)
        }

        function RetrieveDetails(impVal, html, thead) {
            var resArr, tArr;
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/verses/" + impVal, true);
            xhttp.setRequestHeader('accept', 'application/json');
            xhttp.setRequestHeader('api-key', 'b2b1fcabd2cedd206131d848c2a7c759');

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = JSON.parse(xhttp.responseText);
                    if (response.data) {
                        resArr = response.data;
                        BuildVerseTable(resArr, html, thead);
                    }
                }
            };

            xhttp.send();
        }

        function BuildVerseTable(OpenVerse, html, thead) {

            if (!OpenVerse) {
                return;
            }

            const verseData = OpenVerse.content;
            const verseTitle = OpenVerse.reference;
            const nextVerse = OpenVerse.next.id;
            let prevVerse;
            if (OpenVerse.previous && Object.keys(OpenVerse.previous).length > 0) {
                prevVerse = `<td><button class="buttonFunction width137" onclick="OpenDetails('${OpenVerse.previous.id}')">${OpenVerse.previous.id} <span><i style="font-size:1em;" class="fa"></i></span></button></td>`;
            } else {
                prevVerse = '<td></td>';
            }


            const verseDataClean = stripTagsAndExtras1(OpenVerse.content);
            const analyzeSentences = analyzeSentence(verseDataClean);

            let splitString = OpenVerse.id.split('.');

            // Update the table with the verse information
            let tableHTML = `
            <table id="MainTableVerse" class="table">
                <tbody>
                    <tr>
                        <td colspan="5"><button id="backToResultsBtn" class="buttonFunction" onclick="RunLastQuery()">BACK TO RESULTS</button></td>
                    </tr>
                    <tr>
                        <th>Characters:</th>
                        <th>Letters:</th>
                        <th>Words:</th>
                    </tr>
                    <tr>
                        <td>${analyzeSentences.totalCharacters}</td>
                        <td>${analyzeSentences.totalLetters}</td>
                        <td>${analyzeSentences.totalWords}</td>
                    </tr>
                    <tr>
                        ${prevVerse}
                        <td></td>
                        <td><button class="buttonFunction width137" onclick="OpenDetails('${nextVerse}')">${nextVerse} <span><i style="font-size:1em;" class="fa"></i></span></button></td>
                    </tr>
                    <tr>
                        <th colspan="3"><span class="verseTitle">${verseTitle}</span></th>
                    </tr>
                    <tr>
                        <td colspan="3"><span class="verseText">${verseDataClean}</span></td>
                    </tr>
                    <tr></tr>
                </tbody>
            </table>
            <table id="MainTable" class="table">
                <thead>
                    ${thead.innerHTML}
                </thead>
                <tbody id="cipher-body">
                </tbody>
            </table>
            `;


            // Find the target table and insert the HTML
            const tableBody = document.getElementById("DropHere");

            if (tableBody) {
                tableBody.innerHTML = tableHTML;
                let selected_chapter = OpenVerse.chapterId;
                let selected_verse = OpenVerse.id;
                fetchVersesBySelected(selected_chapter, selected_verse);
            } else {
                console.error('Element with id "DropHere" not found in the DOM');
            }
        }

        $(window).on('load', function() {
            fetchVersesBySelected('GEN.1', '');
        });

        function fetchVersesBySelected(selected_chapter, selected_verse) {
            if (selected_chapter === '') {
                return false;
            }

            let url = (selected_verse === '') ?
                'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/chapters/' + selected_chapter + '/verses' :
                'https://api.scripture.api.bible/v1/bibles/de4e12af7f28f599-01/verses/' + selected_verse;

            let xhttp = new XMLHttpRequest();
            xhttp.open("GET", url, true);

            for (let key in headers) {
                xhttp.setRequestHeader(key, headers[key]);
            }

            xhttp.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    let data = JSON.parse(this.responseText);
                    let result = [];

                    if (selected_verse === '') {
                        $('#cipher-body').html('');

                        for (const item of data.data) {
                            get_verse_detail(item.id).then(res => {
                                result.push(res);

                                if (data.data.length === result.length) {
                                    result = result.sort((a, b) => {
                                        const numA = parseInt(a.id.split('.').pop());
                                        const numB = parseInt(b.id.split('.').pop());
                                        return numA - numB;
                                    });

                                    submit_verses(result);
                                }
                            });
                        }
                    } else {
                        $('#cipher-body').html('');
                        submit_verses([data.data]);
                    }
                } else if (this.readyState === 4 && this.status !== 200) {
                    submit_verses([]);
                }
            };

            xhttp.send();
        }

        function RunLastQuery() {
            let newHtml = `
                <table id="MainTableVerse" class="table">

                </table>
                <table id="MainTableDefault" class="table">
                    ${savedHTML}
                </table>
            `;
            $('#DropHere').html(newHtml);
        }

        function analyzeSentence(sentence) {
            let trimmedSentence = sentence.trim();
            let totalCharacters = trimmedSentence.length;
            let totalLetters = (trimmedSentence.match(/[a-zA-Z]/g) || []).length;
            let totalWords = (trimmedSentence.match(/\S+/g) || []).length;

            return {
                totalCharacters: totalCharacters,
                totalLetters: totalLetters,
                totalWords: totalWords
            };
        }

        function stripTagsAndExtras1(input) {
            let stripped = input.replace(/<\/?[^>]+(>|$)/g, "");
            stripped = stripped.replace(/\\+/g, "");
            stripped = stripped.replace(/\d+/g, "");

            return stripped.trim();
        }

        // $(document).ready(() => {
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
                        if (data.data.verses && data.data.verses.length > 0) {
                            return submit_verses(data.data.verses);
                        } else {
                            $('#cipher-body').html('<tr><td colspan="999" style=" text-align: center; ">Not Results found</td></tr>'); // Show not found message
                            return submit_verses([]);
                        }
                    },
                    error: (error) => {
                        $('#cipher-body').html('<tr><td colspan="999" style=" text-align: center; ">Not Results found</td></tr>');
                        return submit_verses([]);
                    },
                });
            }

            const submit_verses = (verses) => {
                verses.forEach((response) => {
                    if(response == ''){
                        return false;
                    }

                    let resp_content = (!response.content) ? response.text : response.content;

                    let content = stripTagsAndExtras(resp_content);
                    let data = calculateGematria(content);
                    const mergedResponse = {
                        ...response,
                        gematriaData: data
                    };

                    appendGematriaDataToTable([mergedResponse]);
                });
            };

            const appendGematriaDataToTable = (responses) => {
                const tableBody = document.querySelector('#MainTable tbody');
                const tableBodyDefault = document.querySelector('#MainTableDefault tbody');

                responses.forEach(response => {
                    const { id } = response;
                    const gematriaData = response.gematriaData;

                    const newRow = document.createElement('tr');

                    const verseCell = document.createElement('td');
                    const verseLink = document.createElement('a');
                    verseLink.className = 'verLink';
                    verseLink.href = `javascript:OpenDetails('${id}')`;
                    verseLink.textContent = response.reference;
                    verseCell.appendChild(verseLink);
                    newRow.appendChild(verseCell);

                    gematriaData.forEach(data => {
                        const key = Object.keys(data)[0]; // Get the cipher key (D0, D1, etc.)
                        const value = data[key].value; // Get the value
                        const rgb = data[key].rgb; // Get the RGB values

                        // Create a new table cell
                        const valueCell = document.createElement('td');
                        const fontElement = document.createElement('font');
                        fontElement.style.color = `RGB(${rgb.red}, ${rgb.green}, ${rgb.blue})`; // Set font color
                        fontElement.textContent = value; // Set the text content to the value
                        valueCell.appendChild(fontElement); // Append the font element to the cell
                        newRow.appendChild(valueCell); // Append the cell to the row
                    });

                    // Append the new row to the table body
                    if(tableBody){
                        tableBody.appendChild(newRow);
                    }
                    if(tableBodyDefault){
                        tableBodyDefault.appendChild(newRow);
                    }
                });
            };



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
                        $('#chapterId').val(selected_chapter);
                        $('#selectedVerse').val(selected_verse);
                        if (selected_verse === '') {
                            $('#select_chapter').val('').change();
                            $('#select_verse').val('').change();
                            $('#input_query').val('')
                            $('#MainTableVerse').html(``);
                            $('#cipher-body').html(``);

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
                            $('#select_chapter').val('').change();
                            $('#select_verse').val('').change();
                            $('#input_query').val('');
                            $('#MainTableVerse').html(``);
                            $('#cipher-body').html(``);
                            submit_verses([data.data]);
                        }
                    },
                    error: (error) => {
                        submit_verses([]);
                    },
                });

            });

            $('#btn_search_by_query').on('click', function () {
                $('#cipher-body').html(``);
                let val = $('#input_query').val();
                if (val === '') {
                    return false;
                }

                return search_verses(val);
            });

            get_books();

            function stripTagsAndExtras(input) {
                // Step 1: Remove HTML tags
                let stripped = input.replace(/<\/?[^>]+(>|$)/g, "");

                // Step 2: Remove encoded slashes (like \")
                stripped = stripped.replace(/\\+/g, "");

                // Step 3: Remove numeric values
                stripped = stripped.replace(/\d+/g, "");

                return stripped.trim();
            }


            let alphabet = @json($D0);
            let alphabet1 = @json($D1);
            let alphabet2 = @json($D2);
            let alphabet3 = @json($D3);

            var small_alphabets = {};

            @foreach ($ciphers as $cipher)
                var cipherId = "{{ $cipher['id'] }}";

                if (cipherId != 'D0' && cipherId != 'D1' && cipherId != 'D2' && cipherId != 'D3') {
                    var alphabetData = @json(json_decode($cipher['small_alphabet']));
                    small_alphabets[cipherId] = alphabetData;
                }
            @endforeach

            function calculateOrdinalCiphers(input, cipherId) {
                return [...input].reduce((sum, char) => {
                    var alphabetData = small_alphabets[cipherId];

                    // Ensure alphabetData is an object
                    if (alphabetData && typeof alphabetData === 'object') {
                        var charValue = alphabetData[char.toLowerCase()];

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
            function calculateGematria(word, id = '') {
                const ordinal = calculateOrdinal(word);
                const reduction = calculateReduction(word);
                const reverse = calculateReverseOrdinal(word);
                const reverseReduction = calculateReverseReduction(word);
                var cipherResults = {};
                var d0Exists = false;
                var d1Exists = false;
                var d2Exists = false;
                var d3Exists = false;

                const rgbValues = {
                    'D0': { red: "0", green: "186", blue: "0" },
                    'D1': { red: "88", green: "125", blue: "245" },
                    'D2': { red: "80", green: "235", blue: "21" },
                    'D3': { red: "100", green: "226", blue: "226" }
                };

                @foreach ($ciphers as $cipher)
                    var id = "{{ $cipher['id'] }}";

                    if (id == 'D0') {
                        d0Exists = true;
                    }
                    if (id == 'D1') {
                        d1Exists = true;
                    }
                    if (id == 'D2') {
                        d2Exists = true;
                    }
                    if (id == 'D3') {
                        d3Exists = true;
                    }

                    if (id != 'D0' && id != 'D1' && id != 'D2' && id != 'D3') {
                        var name = "{{ $cipher['name'] }}";
                        var rgb_values = @json($cipher['rgb_values']);
                        var red = rgb_values.red;
                        var green = rgb_values.green;
                        var blue = rgb_values.blue;
                        var cipher_name = "{{ $cipher['name'] }}";
                        var ordinalCiphers = calculateOrdinalCiphers(word, id);

                        cipherResults[`${id}`] = {
                            value: ordinalCiphers,
                            rgb: { red, green, blue },
                            name: name
                        };
                    }
                @endforeach

                let finalArr = [];

                if (d0Exists) {
                    finalArr.push({ 'D0': { value: ordinal, rgb: rgbValues['D0'], name: 'Ordinal' } });
                }
                if(d1Exists){
                    finalArr.push({ 'D1': { value: reduction, rgb: rgbValues['D1'], name: 'Reduction' } });
                }
                if(d2Exists){
                    finalArr.push({ 'D2': { value: reverse, rgb: rgbValues['D2'], name: 'Reverse' } });
                }
                if(d3Exists){
                    finalArr.push({ 'D3': { value: reverseReduction, rgb: rgbValues['D3'], name: 'Reverse Reduction' } });
                }

                finalArr.push(
                    ...Object.entries(cipherResults).map(([key, { value, rgb, name }]) => ({
                        [key]: { value, rgb, name }
                    }))
                );
                return finalArr;
            }

        // });
    </script>
@endsection


