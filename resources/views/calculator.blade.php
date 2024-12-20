@extends('layouts.app')

@section('title', 'Calculator')

@section('css')
    <style>
        body {
            padding: 0 !important;
            overflow-x: hidden;
        }

        .WordLetterCount {
            color: #e9e0e0;
            font-size: 22px;
            font-weight: 100;
        }

        .calculator-data-show {
            margin: 40px 0;
            /* padding: 20px 20px; */
            /* border: 2px solid orange; */
            border-radius: 5px;
            padding-bottom: 5px;
            text-align: center;
            margin-bottom: 0;
        }

        .data-ciphers {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column-reverse;
            gap: 10px;
            height: 100px;
            border: 2px solid orange;
            padding: 10px 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .chiphers-info h5 {
            margin: 0;
            color: white;
            font-size: 10px;
            /* font-family: "Lato"; */
            /* font-weight: 700; */
        }

        .chiphers-data-number p {
            margin: 0;
            color: white;
            font-size: 20px;
            /* font-family: "Lato"; */
            /* font-weight: 600;*/
        }

        .calculator-data-show .row {
            justify-content: center;
        }

        #GemTable {
            background-color: unset !important;
            border-radius: unset !important;
            border: none !important;
            padding: unset !important;
            border-collapse: unset !important;
            margin: unset !important;
            font-family: manteka !important;
        }

        #EntryDiv #EntryField {
            height: 50px;
            padding: 0 15px;
            outline: none !important;
            border: 2px solid #7fbe00;
            width: 50%;
            margin-bottom: 10px;
        }

        #calc-menu .MenuLink {
            font-size: 25px;
        }

        div#calc-menu {
            margin-top: 0;
        }

        #EntryDiv #EntryField::placeholder {
            color: white;
            text-transform: uppercase;
            font-size: 18px;
        }

        tr#valueRow td {
            font-size: 14px;
        }

        #ChartSpot tr {
            line-height: 25px !important;
        }

        .modal {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            overflow-y: auto;
            pointer-events: auto;
            padding: 0 !important;
        }

        body .modal-open {
            overflow: auto;
            padding-right: 0 !important;
        }

        .modal.right .modal-dialog {
            position: sticky;
            width: 400px;
            right: 0;
            top: 180px;
            transform: translate3d(0%, 0, 0);
            /* margin-left: 0; */
            margin-right: 0;
        }

        .modal.left .modal-dialog {
            position: sticky;
            width: 400px;
            left: 0;
            top: 180px;
            transform: translate3d(0%, 0, 0);
            margin-left: 0;
            margin-right: 0;
        }

        .modal-content {
            height: 100%;
            overflow-y: auto;
        }

        /* Adjust the modal backdrop to not interfere with both modals */
        .modal-backdrop {
            position: relative;
            z-index: 0;
        }

        .side-arrow {
            position: absolute;
            top: 200px;
            z-index: 1050;
        }

        .right-arrow {
            right: 0;
        }

        .left-arrow {
            left: 0;
        }

        .close {
            position: absolute;
            z-index: 1;
            border: none !important;
            opacity: 1;
            top: 5px;
        }

        .close span {
            color: black;
        }

        #left-side {
            position: absolute;
            z-index: 999999;
            width: 500px;
            left: 0;
            padding: 20px 40px;
            background: black;
            border-radius: 10px;
            transform: translateX(-500px);
            opacity: 0;
            transition: all ease 0.5s;
            top: 150px;

        }

        #right-side {
            position: absolute;
            z-index: 999999;
            width: 500px;
            right: 0;
            padding: 20px 40px;
            background: black;
            border-radius: 10px;
            transform: translateX(500px);
            opacity: 0;
            transition: all ease 0.5s;
            top: 150px;
        }

        .close {
            position: absolute;
            z-index: 0;
            right: 10px;
            top: 5px;
        }

        .user_table {
            text-align: center;
        }

        .user_table h5 {
            color: #1862cf;
            font-size: 18px;
            font-weight: 600;
        }

        .user_table h5 {
            font-size: 18px;
            margin: 20px 0;
        }

        .table_check {
            text-align: center;
        }

        .table_check ul {
            list-style: none;
        }

        .table_check ul li {
            padding: 5px 0;
        }

        .table_check h6 {
            color: white;
            font-size: 14px;
            font-weight: 500;
        }

        .table_check ul li input {
            height: 12px;
            width: 12px;
        }

        .table_check ul li a {
            font-size: 16px;
        }

        .table_check ul li h5 {
            color: whitesmoke;
            font-size: 17px;
        }

        .table_check ul li p {
            margin: 0;
            color: white;
            font-size: 16px;
        }

        .close i {
            color: white;
        }

        #left-side.active {
            width: 500px;
            transform: translateX(0px);
            opacity: 1;
            transition: all ease 0.5s;
        }

        #right-side.active {
            width: 500px;
            transform: translateX(0px);
            opacity: 1;
            transition: all ease 0.5s;
        }

        #right-side .close {
            left: 10px;
        }

        .user_btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        #calculator-advanced {
            padding-bottom: 50px !important;
        }

        .table-all-data label {
            color: white;
            font-size: 17px;
        }

        .table-all-data td {
            color: white;
        }

        .table-all-data .dt-column-order:after {
            opacity: 1 !important;
        }

        .table-all-data .dt-column-order:before {
            opacity: 1 !important;
        }

        .pagination li a {
            background: orange !important;
            color: white !important;
            border: none;
            padding: 10px 16px;
        }

        ul.pagination {
            align-items: center;
        }

        .pagination li {
            border: 1px solid white;
        }

        div#example_info {
            color: white;
        }

        .custom-side-table tr th {
            color: white;
        }

        .custom-side-table .center-td {
            text-align: center;
        }

        .custom-side-table {
            margin: 100px 0;
        }

        .open-box {
            display: none;
            background-color: #e6e6e6 !important;
            position: absolute;
            z-index: 1;
            top: 10px;
            padding: 20px 20px;
            left: 280px !important;
            background: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            padding-bottom: 10px;
        }

        .open-box .close-btn {
            border: none;
            background: none;
            position: absolute;
            z-index: 0;
            top: -5px;
            right: -1px;
            font-size: 20px;
            cursor: pointer;
            color: red;
            border: none;
            outline: none;
        }

        .open-box .close-btn1 {
            border: none;
            background: none;
            position: absolute;
            z-index: 0;
            top: -5px;
            right: -1px;
            font-size: 20px;
            cursor: pointer;
            color: red;
            border: none;
            outline: none;
        }

        .open-box a {
            font-size: 10px;
            padding: 8px 40px;
            margin-bottom: 8px;
            border-radius: 5px;
            background: linear-gradient(45deg, #317009, #7fbe00) !important;
            border-color: #7fbe00;
        }

        .btn-dim {
            opacity: 0.5;
            pointer-events: none;
        }


        .table-all-data #history-saved td {
            position: relative;
        }

        .table-all-data #history-saved td:hover .open-box {
            display: block !important;
            right: -50px;
            /* width: 100%; */
            left: unset !important;
            background: black !important;
            z-index: 5;
            padding-top: 10px;
            border-radius: 10px;
            padding-right: 10px;
            border: 1px solid white;
        }

        .table-all-data #history-saved td .open-box ul {
            list-style: none;
            text-align: end;
            width: 100%;
        }

        .table-all-data #history-saved td .open-box ul li p {
            color: white !important;
            background: none !important;
            padding: 0 !important;
            font-size: 10px;
            margin: 0;
        }

        .table-all-data #history-saved td .open-box ul li a {
            color: white !important;
            background: none !important;
            padding: 0 !important;
            font-size: 10px;
        }

        .table-all-data #history-saved td .open-box ul li {
            padding: 3px 0;
            position: relative;
        }

        .box-info {
            position: absolute;
            z-index: 1;
            background: black !important;
            right: -50px;
            left: 30px !important;
            top: -30px;
            padding: 10px;
            border-radius: 10px;
            display: none;
            border: 1px solid white;
            width: 100px;
        }


        .box-info ul {
            text-align: start !important;
        }

        .table-all-data #history-saved td .open-box ul li:hover .box-info {
            display: block;
        }

        #not-found {
            text-align: center;
            border: none;
        }

        #not-found h3 {
            color: white;
        }

        .btn-add-table {
            padding: 8px 10px;
            font-size: 10px;
            border-radius: 10px;
        }

        #add-user-table label {
            color: #fff;
        }

        @font-face {
            font-family: dealerplate-california;
            src: url(../fonts/dealerplate-california.ttf);
        }

        @font-face {
            font-family: futurama-bold;
            src: url({{asset('fonts/futurama-bold.ttf')}});
        }

        #alphabetRow .chartChar {
            font-family: futurama-bold !important;
            font-size: 33px;
        }

        .BreakTable .BreakCharNG {
            font-family: dealerplate-california !important;
            font-size: 30px;
        }

        .nextGenText {
            font-family: futurama-bold !important;
            font-size: 30px !important;
        }
    </style>
@endsection

@section('content')

    <link rel="stylesheet" href="{{ asset('css/numberstyle.css') }}">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User Table</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="add-user-table">
                    <form id="userTableForm">
                        @csrf
                        <div class="form-group">
                            <label for="user-table-name" class="col-form-label">User Table Name:</label>
                            <input type="text" class="form-control" id="user-table-name" name="name" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="addUserTable">Add</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Left-side arrow to open the left modal -->
    <div class="side-arrow left-arrow">
        <button id="load-tables" type="button" class="btn btn-success">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>


    <div id="left-side" class="sides-modal">
        <div class="close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="user_table">
                    <h5>USER TABLES</h5>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="table_check">
                    <h6>Match</h6>
                    <ul id="table_checkbox">

                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table_check">
                    <h6>Table Name</h6>
                    <ul id="user_tables">

                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="table_check">
                    <h6>Entries</h6>
                    <ul id="data_count">

                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table_check mt-2">
                    <a href="javascript:void(0)" class="custom-btn btn-add-table" data-toggle="modal"
                        data-target="#exampleModal">Add Table</a>

                </div>
            </div>
        </div>
    </div>


    <!-- Right-side arrow to open the right modal -->
    <div class="side-arrow right-arrow">
        <button type="button" class="btn btn-success">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
    </div>

    <div id="right-side" class="sides-modal">
        <div class="close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="user_table">
                    <h5>DISPLAY OPTIONS</h5>
                </div>
                <div class="user_btn">
                    <button class="btn btn-success" id="cipher-chart">Cipher Chart </button>
                    <button class="btn btn-success" id="breakdown">Breakdown </button>
                </div>
                <div class="user_table">
                    <h5>MATCH TO:</h5>
                </div>
                <div class="user_btn">
                    <button class="btn btn-success" id="btn-history">HISTORY </button>
                    {{-- <button class="btn btn-success">HISTORY MOST COMMON </button> --}}
                    <button class="btn btn-success" id="btn-database">DATABASE
                    </button>
                </div>
            </div>
        </div>
    </div>



    <section class="calculator-meter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="MainTableRow">
                        <div id="MainTable">
                            <div id="Gematria_Table">
                                {{-- <table id="GemTable">
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
                                                        <div class="GemTableHeader change-cipher"
                                                            data-id="{{ $cipher['id'] }}"
                                                            onclick="MoveCipherClick('{{ $cipher['id'] }}', event)">
                                                            <font
                                                                style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                                {{ $cipher['name'] }}</font>
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
                                                        <font
                                                            style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                            <div class="NumberClass">
                                                                @if ($cipher['id'] == 'D0')
                                                                    <b id="ordinal" class="justnumber"
                                                                        onclick="Open_Properties(0)">0</b>
                                                                @elseif($cipher['id'] == 'D1')
                                                                    <b id="reduction" class="justnumber"
                                                                        onclick="Open_Properties(1)">0</b>
                                                                @elseif($cipher['id'] == 'D2')
                                                                    <b id="reverse" class="justnumber"
                                                                        onclick="Open_Properties(2)">0</b>
                                                                @elseif($cipher['id'] == 'D3')
                                                                    <b id="reverse_reduction" class="justnumber"
                                                                        onclick="Open_Properties(3)">0</b>
                                                                @else
                                                                    <b id="cipher_{{ $cipher['id'] }}"
                                                                        class="justnumber target_number"
                                                                        onclick="Open_Properties({{ $cipher['id'] }})">0</b>
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
                                    </tbody>
                                </table> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="calculator-data-show">
                        <div class="row" id="GemTable">
                            @foreach ($ciphers as $index => $cipher)
                                @php
                                    $rgb = json_decode($cipher['rgb_values'], true);
                                    $red = $rgb['red'] ?? 0;
                                    $green = $rgb['green'] ?? 0;
                                    $blue = $rgb['blue'] ?? 0;
                                @endphp
                                <div class="col-lg-1 pl-1 pr-1" id="TableValue_{{ $cipher['name'] }}">
                                    <div class="data-ciphers change-cipher" data-id="{{ $cipher['id'] }}"
                                        onclick="MoveCipherClick('{{ $cipher['id'] }}', event)"
                                        style="border-color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                        <div class="chiphers-info">
                                            <h5
                                                style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                {{ $cipher['name'] }}
                                            </h5>
                                        </div>
                                        <div class="chiphers-data-number">
                                            @if ($cipher['id'] == 'D0')
                                                <p id="ordinal" class="justnumber"
                                                    style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                                                    onclick="">0</p>
                                            @elseif($cipher['id'] == 'D1')
                                                <p id="reduction" class="justnumber"
                                                    style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                                                    onclick="">0</p>
                                            @elseif($cipher['id'] == 'D2')
                                                <p id="reverse" class="justnumber"
                                                    style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                                                    onclick="">0</p>
                                            @elseif($cipher['id'] == 'D3')
                                                <p id="reverse_reduction" class="justnumber"
                                                    style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                                                    onclick="">0</p>
                                            @else
                                                <p id="cipher_{{ $cipher['id'] }}" class="justnumber target_number"
                                                    style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})"
                                                    onclick="">0</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{--            <div class="row justify-content-center"> --}}
            {{--                <div id="WordLetterCount text-center"> --}}
            {{--                    <div class="WordLetterCount para white">(0 words, 0 letters)</div> --}}
            {{--                </div> --}}
            {{--            </div> --}}
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
                                    @php
                                        $feature = get_feature('calculator') ?? null;
                                        $all_ciphers = $feature->all_ciphers ?? false;
                                    @endphp
                                    @if($all_ciphers)
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
                                    @endif

                                    <!-- END MENU SECTION -->
                                    <!-- ENTRY SECTION -->
                                    <div id="EntryDiv">
                                        <!-- <button id="arrowDown" class="mo"><i class="fa fa-arrow-circle-left" style="font-size:38px"></i></button> -->
                                        {{-- <input id="EntryField" class="" autofocus="" type="text" autocomplete="off" oninput="FieldChange(EntryValue())" onkeydown="navHistTable(event)" ondrop="BuildFromText(event)" ondragenter="ShowDropTarget()" ondragleave="RemoveDropTarget()" ondragexit="RemoveDropTarget()" placeholder="Enter Word, Phrase, or #(s):"> --}}
                                        <input id="EntryField" class="" autofocus="" type="text"
                                            autocomplete="off" placeholder="Enter Word, Phrase, or #(s):">
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
                                    <div id="breakDownSpot"
                                        style="display:table; margin: auto; max-width: 1331px; margin-top:3px">
                                        <div id="printBreakTable" style="display:table-cell; width: 100%;">
                                            <div id="watermarkBreakGuy" style="display:none;"><img decoding="async"
                                                    src=/tools/calculator-advanced/img/gem-guy-flip.png alt="gematrinator"
                                                    width="28"
                                                    style="margin-top: 10px; margin-right:0px; float:right; opacity:.25;">
                                            </div>
                                            <center id="center_printBreakTable">
                                                <input type="hidden" name="cipher_id" id="cipher_id" value="">
                                                <table id="breakdownCipherLabel" style="width:100%; display: inline;">
                                                </table>
                                            </center>
                                            @if ($breakdown_screenshot == true)
                                                <center>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <a href="#"
                                                                    id="btn_breakdown_screenshot">Screenshot</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            @endif
                                            <span id="watermarkBreakText"
                                                style="display:none; float: right; margin-right: 0px; margin-top: -18px;opacity:.25;position: relative; "><img
                                                    decoding="async"
                                                    src=/tools/calculator-advanced/img/gematrinator-just-text-200px.png
                                                    alt="gematrinator logo" width="85"></span>
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
                                                <tr id="capitalAlphabetRow"></tr>
                                                <tr id="capitalValueRow"></tr>
                                                <tr>
                                                    <td id="cipherChartTitle" colspan="50">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- END CIPHER CHART SECTION -->
                                    <!-- HISTORY SECTION -->
                                    <center id="center_number_properties" hidden>
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
                                                                            <td id="TopNumber"
                                                                                style="font-size: 40px !important;"></td>
                                                                        </tr>
                                                                        {{--                                                                    <tr> --}}
                                                                        {{--                                                                        <td id="PrimeString" colspan="3">2 × --}}
                                                                        {{--                                                                            3<sup>2</sup> --}}
                                                                        {{--                                                                        </td> --}}
                                                                        {{--                                                                    </tr> --}}
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
                                                                                            class="Linkable"
                                                                                            id="count"></b></td>
                                                                                    <td id="divisors_list">
                                                                                        {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(1)">1</a></b>, --}}
                                                                                        {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(2)">2</a></b>, --}}
                                                                                        {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(3)">3</a></b>, --}}
                                                                                        {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(6)">6</a></b>, --}}
                                                                                        {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(9)">9</a></b>, --}}
                                                                                        {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(18)">18</a></b> --}}
                                                                                        {{--                                                                                    <br> --}}
                                                                                        {{--                                                                                    <b class="Linkable"><a href="javascript:Open_Properties(10)">10</a></b>th --}}
                                                                                        {{--                                                                                    Composite # --}}
                                                                                    </td>
                                                                                    <td style="vertical-align: top"><b
                                                                                            class="Linkable"
                                                                                            id="sum"></b>
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
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_prime"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Composite #:
                                                                                        &nbsp;</td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_composite"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Fibonacci #:
                                                                                        &nbsp;</td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_fibonacci"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Triangular
                                                                                        #:
                                                                                        &nbsp;</td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_triangular"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Square #:
                                                                                        &nbsp;
                                                                                    </td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="square"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Cube #:
                                                                                        &nbsp;
                                                                                    </td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="cube"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Tetrahedral
                                                                                        #:
                                                                                        &nbsp;</td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_tetrahedral"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Square
                                                                                        Pyramidal #: &nbsp;</td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_sq_pyramidal"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Star #:
                                                                                        &nbsp;
                                                                                    </td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_star"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="RelativeClass"> Pentagonal
                                                                                        #:
                                                                                        &nbsp;</td>
                                                                                    <td class="RelativeNum"><b
                                                                                            class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="nth_pentagonal"></a></b>
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
                                                                                    {{--                                                                                <td>From:</td> --}}
                                                                                    <td class="conversionMiddle">Numeral
                                                                                        system:
                                                                                    </td>
                                                                                    <td>To:</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    {{--                                                                                <td>-</td> --}}
                                                                                    <td>Octal</td>
                                                                                    <td><b class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="octal"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    {{--                                                                                <td><b class="Linkable"><a href="javascript:void(0);">20</a></b></td> --}}
                                                                                    <td>Duodecimal</td>
                                                                                    <td><b class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="duodecimal"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    {{--                                                                                <td><b class="Linkable"><a href="javascript:void(0);">24</a></b></td> --}}
                                                                                    <td>Hexadecimal</td>
                                                                                    <td><b class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="hexadecimal"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    {{--                                                                                <td>-</td> --}}
                                                                                    <td>Binary</td>
                                                                                    <td><b class="Linkable"><a
                                                                                                href="javascript:void(0);"
                                                                                                class="target_number"
                                                                                                id="binary"></a></b>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input tabindex="0" id="input_get_properties"
                                                                autofocus="" type="number" placeholder="Enter #">
                                                            <br><br>
                                                            <button tabindex="1" id="btn_get_properties"
                                                                class="buttonFunction">Get Properties</button>
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
                            @if (Auth::user()->plan == 'free')
                                <div id="membershipText" class="row gads">
                                    <span><a href="{{ route('memberships') }}">Become a Member</a> for an ad-free
                                        experience</span>
                                </div>
                            @endif

                            <div id="NumberSpot"></div>
                            <br><br>
                            <!-- <script src="js/textdropper.js"></script> -->


                            <!-- CIPHER MODAL -->
                            <div id="ciphMod" class="ciphMod fancybox-content"
                                style="display: none; margin-bottom: 6px;">
                                <center>
                                    <h2 id="toph2">Ciphers</h2>
                                    {{--                                    <span id="cipherHelpText">Can't find a cipher? <a href="faq.php">See the FAQ</a> or <a href="ciphers.php">Ciphers</a> page.</span> --}}
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
                                                    <input type="checkbox" id="Cipher{{ $item['id'] }}" value="Verses"
                                                        data-id="{{ $item['id'] }}" checked disabled>
                                                    <font
                                                        style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                        {{ $item['name'] }}</font>
                                                </li>
                                            @else
                                                <li>
                                                    <input type="checkbox" id="Cipher{{ $item['id'] }}" value="Verses"
                                                        data-id="{{ $item['id'] }}"
                                                        {{ $status == 1 ? 'checked' : '' }}>
                                                    <font
                                                        style="color: rgb({{ $red }}, {{ $green }}, {{ $blue }})">
                                                        {{ $item['name'] }}</font>
                                                </li>
                                            @endif
                                            {{-- </li> --}}
                                        @endforeach
                                    </ul>
                                </center>

                                <div id="cipherSelectsContainer" style="{{ Auth::check() ? '' : 'display: none' }}">
                                    <div class="cipherSelects">
                                        <button class="buttonFunctionCiphers" id="SelectBaseCiphersBtn"
                                            onclick="SelBaseCiphers()">Select Base</button>
                                    </div>
                                    <div class="cipherSelects">
                                        <button class="buttonFunctionCiphers" id="SelectAllCiphersBtn"
                                            onclick="SelAllCiphers(true)">Select All</button>
                                    </div>
                                    <div class="cipherSelects">
                                        <button class="buttonFunctionCiphers" id="ClearAllCiphersBtn"
                                            onclick="SelAllCiphers(false)">Clear All</button>
                                    </div>
                                </div>

                                <div id="cipherUpdateCancelContainer">
                                    @if (Auth::check())
                                        <input type="hidden" name="user_id" id="user_id"
                                            value="{{ Auth::user()->id }}">
                                        <button class="buttonFunctionCiphers" id="SaveCiphers">Update</button>
                                    @else
                                        <button class="buttonFunctionCiphers" id="SaveCiphers" disabled>Update</button>
                                    @endif
                                    <button class="buttonFunctionCiphers" id="CancelCiphers"
                                        onclick="Cancel_Ciphers()">Cancel</button>
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
                                <button type="button" data-fancybox-close=""
                                    class="fancybox-button fancybox-close-small" title="Close"><svg
                                        xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
                                        <path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path>
                                    </svg></button>
                            </div>
                            <!-- END CIPHER MODAL -->

                            <!-- OPTIONS MODAL -->
                            <div id="optionsMod" class="optionsMod">
                                <div id="optionsMod" class="optionsMod fancybox-content"
                                    style="display: block; margin-bottom: 6px;">
                                    <div id="OptionSpot">
                                        <div><label>Number Calculation</label><br><select name="NumCalcSel"
                                                id="NumCalcSel">
                                                <option value="Smart">Smart</option>
                                                <option value="Reduced">Reduced</option>
                                                <option value="Full">Full</option>
                                                <option value="Off">Off</option>
                                            </select><br><label>Ciphers per Row</label><br><select name="CiphersPerSel"
                                                id="CiphersPerSel">
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select><br><label>Sequence Notifications</label><br><select name="NumSeqSel"
                                                id="NumSeqSel">
                                                <option value="Off">Off</option>
                                                <option value="Regular">Regular</option>
                                                <option value="All">All</option>
                                            </select><br><br><input type="checkbox" id="ReductionCheck"
                                                value="ReductionCheck">&nbsp; Display Reduction Value<br><input
                                                type="checkbox" id="CipherNamesCheck" value="CipherNamesCheck">&nbsp;
                                            Display Cipher Names<br><br><input type="checkbox" id="LetterWordCheck"
                                                value="LetterWordCheck">&nbsp; Display Letter/Word Count<br><input
                                                type="checkbox" id="SimpleResultCheck" value="SimpleResultCheck">&nbsp;
                                            Display Simple Result<br><input type="checkbox" id="ChartCheck"
                                                value="ChartCheck">&nbsp; Show Cipher Chart<br><input type="checkbox"
                                                id="BreakdownCheck" onclick="javascript:modBreakList()"
                                                value="BreakdownCheck">&nbsp; Show Breakdown<br><label>Breakdown Chart
                                                Style</label><br><select name="BreakdownSel" id="BreakdownSel">
                                                <option value="Chart">Chart</option>
                                                <option value="NextGen">NextGen</option>
                                                <option value="Classic">Classic</option>
                                            </select><br><br><input type="checkbox" id="DiacriticCheck"
                                                value="DiacriticCheck">&nbsp; Remove Diacritics<br><input type="checkbox"
                                                id="ShortcutsCheck" value="ShortcutsCheck">&nbsp; Keyboard Shortcuts
                                            On<br><br><input type="checkbox" id="CompactCheck"
                                                value="CompactCheck">&nbsp; Compact History Table<br><input
                                                type="checkbox" id="NonMatchCheck" value="NonMatchCheck">&nbsp; Ignore
                                            Non-Matches<br><input type="checkbox" id="ContributeCheck"
                                                value="ContributeCheck">&nbsp; Contribute to Match DB<br></div><br><button
                                            class="buttonFunctionOptions" type="button" data-fancybox-close=""
                                            id="OptionClose"
                                            onclick="javascript:Close_Options(''),Update_Options(),jQuery.fancybox.close();"
                                            value="Close_Options">Close/Save</button>
                                    </div>
                                    <button type="button" data-fancybox-close=""
                                        class="fancybox-button fancybox-close-small" title="Close"><svg
                                            xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24">
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
                                    <img decoding="async" src=/tools/calculator-advanced/img/cipher-list-colored.png
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

                {{-- new side table sart --}}

                {{-- <div class="col-lg-12" id="database-first">
                    <div class="table-all-data">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr id="table-headers"></tr> <!-- Dynamic headers go here -->
                            </thead>

                            <tbody id="database-saved">
                            </tbody>

                            <tfoot>
                                <tr id="table-footers"></tr> <!-- Dynamic footers go here -->
                            </tfoot>
                        </table>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="table-all-data" id="history-first">
                        <table class="table table-striped table-bordered custom-side-table" style="width:100%">
                            <thead>
                                <tr id="table-headers"></tr> <!-- Dynamic headers go here -->
                            </thead>

                            <tbody id="current-saved">
                            </tbody>

                            <tbody id="history-saved">
                            </tbody>

                            <tbody id="database-saved">
                            </tbody>

                            <div id="not-found" style="display: none;">
                                <h3>No Data Found...</h3>
                            </div>

                            <tfoot>
                                <tr id="table-footers"></tr> <!-- Dynamic footers go here -->
                            </tfoot>
                        </table>
                    </div>
                </div>

                {{-- new side table end --}}

            </div>
        </div>

        <div class="open-box" id="openBox" style="display: none;">
            <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
            <h6 id="entry-title"></h6>
            <a href="#" class="btn custom-btn" id="btn-save-entry">
                <i class="fas fa-floppy-disk"></i>
                Save Entry
            </a>
        </div>


    </section>


@endsection

@section('js')
    <script>
        trackTimeSpent('calculator', "{{ route('log.time.spent') }}", "{{ csrf_token() }}");
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        let temp_ciphers = [];
        $(document).ready(function() {

            function fetchUserTables() {
                $.ajax({
                    url: "{{ route('getUserTables') }}", // Laravel route to get tables
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Clear previous data
                        var user_tables = response.user_tables;
                        var cipher_history_count = response.cipher_history_count;
                        $('#table_checkbox').empty();
                        $('#user_tables').empty();
                        $('#data_count').empty();

                        // Append new data to the lists
                        user_tables.forEach(function(table) {
                            $('#table_checkbox').append(
                                `<li><input type="checkbox" id="value${table.id}"></li>`
                            );

                            $('#user_tables').append(
                                `<li><a href="javascript:void(0)" class="btn-user-tables" data-id="${table.id}">${table.name}</a></li>`
                            );

                            $('#data_count').append(
                                `<li><p>(${table.entry_count})</p></li>`
                            );
                        });
                        $('#table_checkbox').append(
                            `<li><input type="checkbox" id="valueh"></li>`
                        );

                        $('#user_tables').append(`
                            <li><a href="javascript:;" id="user-history">User History</a></li>
                        `);

                        $('#data_count').append(`
                            <li><p>(${cipher_history_count})</p></li>
                        `);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching user tables:', error);
                    }
                });
            }

            fetchUserTables();

            let finalCiphersResults = {};
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

            $('#addUserTable').click(function(e) {
                e.preventDefault();
                const tableName = $('#user-table-name').val();

                $.ajax({
                    url: "{{ route('add_user_table') }}",
                    type: 'POST',
                    data: {
                        name: tableName,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Success!",
                            text: 'User table added successfully!',
                            icon: "success",
                        }).then(() => {
                            // Refresh the page
                            location.reload();
                        });


                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        let errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr
                            .responseJSON.message : "Failed to save data.";
                        Swal.fire({
                            title: "Error!",
                            text: errorMessage,
                            icon: "error"
                        });

                    }
                });
            });

            $('#btn-database').on('click', function() {
                $('#not-found').hide();
                if (!$('#database-saved').is(':empty')) {
                    // If it's empty, set the HTML of #database-first to an empty string
                    $('#database-saved').html('');
                }
                if (!$('#current-saved').is(':empty')) {
                    // If it's empty, set the HTML of #database-first to an empty string
                    $('#current-saved').html('');
                }
                if (!$('#history-saved').is(':empty')) {
                    // If it's empty, set the HTML of #database-first to an empty string
                    $('#history-saved').html('');
                }
                let cipherList;
                if (temp_ciphers.length == 0) {
                    cipherList = @json($ciphers);
                } else {
                    cipherList = temp_ciphers;
                }
                let ciphersForTable = @json($ciphersForTableArr);
                let small_alphabets = generateSmallAlphabets(ciphersForTable);
                let inputValue = $('#EntryField').val();
                if (inputValue == "") {
                    $('#not-found').show();
                    return false;
                }

                ciphersForTable.forEach(cipher => {
                    let data;

                    switch (cipher['id']) {
                        case 'D0':
                            data = calculateOrdinal(inputValue);
                            break;
                        case 'D1':
                            data = calculateReduction(inputValue);
                            break;
                        case 'D2':
                            data = calculateReverseOrdinal(inputValue);
                            break;
                        case 'D3':
                            data = calculateReverseReduction(inputValue);
                            break;
                        default:
                            data = calculateOrdinalCiphers(inputValue, cipher['id'],
                                small_alphabets);
                            break;
                    }

                    finalCiphersResults[cipher['id']] = data;
                });

                // console.log(finalCiphersResults);

                let currentCipher = [{
                    entry: inputValue,
                    ciphers: JSON.stringify(finalCiphersResults)
                }];
                // console.log(currentCipher);

                $.ajax({
                    url: "{{ route('cipher_database_get') }}",
                    type: 'GET',
                    success: function(response) {

                        var responsData = response;

                        if (responsData == "") {
                            return false;
                        }

                        $.ajax({
                            url: "{{ route('cipher_database_arrays') }}",
                            type: 'POST',
                            data: {
                                ciphers: JSON.stringify(responsData),
                                currentCipher: currentCipher,
                                cipherList: cipherList,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                // $('#history-first').html('');
                                // console.log(response.matched_data);
                                // console.log(response.current_matched_data);
                                // console.log(response.tempdata);
                                generateTableHeaders(cipherList);
                                const matchedData = response.matched_data;
                                const currentMatchedData = response
                                    .current_matched_data;
                                let tempdata = response.tempdata;
                                // displayCurrentMatchedData(currentMatchedData, cipherList);
                                displayMatchedDatabase(tempdata, currentMatchedData,
                                    cipherList, response.user_tables);
                                // console.log(matchedData);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error saving data:', xhr
                                    .responseText);
                                alert('Failed to retrieve data.');
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        alert('Failed to retrieve data.');
                    }
                });
            });

            $('#btn-history').on('click', function() {
                $('#not-found').hide();

                if (!$('#database-save').is(':empty')) {
                    $('#database-save').html('');
                }
                if (!$('#current-saved').is(':empty')) {
                    $('#current-saved').html('');
                }
                if (!$('#history-saved').is(':empty')) {
                    $('#history-saved').html('');
                }

                let cipherList;

                if (temp_ciphers.length == 0) {
                    cipherList = @json($ciphers);
                } else {
                    cipherList = temp_ciphers;
                }
                let ciphersForTable = @json($ciphersForTableArr);
                let small_alphabets = generateSmallAlphabets(ciphersForTable);
                let inputValue = $('#EntryField').val();
                if (inputValue == "") {
                    $('#not-found').show();
                    return false;
                }

                ciphersForTable.forEach(cipher => {
                    let data;

                    switch (cipher['id']) {
                        case 'D0':
                            data = calculateOrdinal(inputValue);
                            break;
                        case 'D1':
                            data = calculateReduction(inputValue);
                            break;
                        case 'D2':
                            data = calculateReverseOrdinal(inputValue);
                            break;
                        case 'D3':
                            data = calculateReverseReduction(inputValue);
                            break;
                        default:
                            data = calculateOrdinalCiphers(inputValue, cipher['id'],
                                small_alphabets);
                            break;
                    }

                    finalCiphersResults[cipher['id']] = data;
                });

                // console.log(finalCiphersResults);

                let currentCipher = [{
                    entry: inputValue,
                    ciphers: JSON.stringify(finalCiphersResults)
                }];
                // console.log(currentCipher);

                $.ajax({
                    url: "{{ route('cipher_history_get') }}",
                    type: 'GET',
                    success: function(response) {
                        // $('#database-first').html('');
                        // console.log(response);
                        generateTableHeaders(cipherList);
                        const matchedData = matchAndExtractData(response.history, cipherList);
                        const currentMatchedData = matchAndExtractData(currentCipher,
                            cipherList);
                        let tempdata = getMatchingEntriesByScore(currentMatchedData,
                            matchedData);
                        displayCurrentMatchedData(currentMatchedData, cipherList);
                        displayMatchedData(tempdata, currentMatchedData, cipherList, response
                            .user_tables);
                        // console.log(tempdata);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        alert('Failed to retrieve data.');
                    }
                });
            });

            $('body').on('click', '.btn-user-tables', function() {

                $('#not-found').hide();

                if (!$('#database-saved').is(':empty')) {
                    $('#database-saved').html('');
                }
                if (!$('#current-saved').is(':empty')) {
                    $('#current-saved').html('');
                }
                if (!$('#history-saved').is(':empty')) {
                    $('#history-saved').html('');
                }

                let Id = $(this).data("id");
                let cipherList;
                if (temp_ciphers.length == 0) {
                    cipherList = @json($ciphers);
                } else {
                    cipherList = temp_ciphers;
                }
                let ciphersForTable = @json($ciphersForTableArr);
                let small_alphabets = generateSmallAlphabets(ciphersForTable);
                let inputValue = $('#EntryField').val();
                // if (inputValue == "") {
                //     $('#history-first').html(
                //         '<h4 style=" text-align: center; color: white; ">No Data Found...</h4>')
                //     return false;
                // }

                ciphersForTable.forEach(cipher => {
                    let data;

                    switch (cipher['id']) {
                        case 'D0':
                            data = calculateOrdinal(inputValue);
                            break;
                        case 'D1':
                            data = calculateReduction(inputValue);
                            break;
                        case 'D2':
                            data = calculateReverseOrdinal(inputValue);
                            break;
                        case 'D3':
                            data = calculateReverseReduction(inputValue);
                            break;
                        default:
                            data = calculateOrdinalCiphers(inputValue, cipher['id'],
                                small_alphabets);
                            break;
                    }

                    finalCiphersResults[cipher['id']] = data;
                });

                // console.log(finalCiphersResults);

                let currentCipher = [{
                    entry: inputValue,
                    ciphers: JSON.stringify(finalCiphersResults)
                }];
                // console.log(currentCipher);

                $.ajax({
                    url: "{{ url('get-user-tables') }}/" + Id,
                    type: 'GET',
                    success: function(response) {
                        var responsData = response;

                        if (responsData == "") {
                            return false;
                        }

                        $.ajax({
                            url: "{{ route('cipher_database_arrays') }}",
                            type: 'POST',
                            data: {
                                ciphers: JSON.stringify(responsData),
                                currentCipher: currentCipher,
                                cipherList: cipherList,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                generateTableHeaders(cipherList);
                                const matchedData = response.matched_data;
                                displayTableCiphers(matchedData, cipherList,
                                    response.user_tables);
                                // displayMatchedDatabase(tempdata, currentMatchedData, cipherList);
                                // console.log(matchedData);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error saving data:', xhr
                                    .responseText);
                                alert('Failed to retrieve data.');
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        alert('Failed to retrieve data.');
                    }
                });
            });

            $('body').on('click', '#user-history', function() {

                $('#not-found').hide();

                if (!$('#database-saved').is(':empty')) {
                    $('#database-saved').html('');
                }
                if (!$('#current-saved').is(':empty')) {
                    $('#current-saved').html('');
                }
                if (!$('#history-saved').is(':empty')) {
                    $('#history-saved').html('');
                }

                let cipherList;
                if (temp_ciphers.length == 0) {
                    cipherList = @json($ciphers);
                } else {
                    cipherList = temp_ciphers;
                }
                let ciphersForTable = @json($ciphersForTableArr);
                let small_alphabets = generateSmallAlphabets(ciphersForTable);
                let inputValue = $('#EntryField').val();
                // if (inputValue == "") {
                //     $('#history-first').html(
                //         '<h4 style=" text-align: center; color: white; ">No Data Found...</h4>')
                //     return false;
                // }

                ciphersForTable.forEach(cipher => {
                    let data;

                    switch (cipher['id']) {
                        case 'D0':
                            data = calculateOrdinal(inputValue);
                            break;
                        case 'D1':
                            data = calculateReduction(inputValue);
                            break;
                        case 'D2':
                            data = calculateReverseOrdinal(inputValue);
                            break;
                        case 'D3':
                            data = calculateReverseReduction(inputValue);
                            break;
                        default:
                            data = calculateOrdinalCiphers(inputValue, cipher['id'],
                                small_alphabets);
                            break;
                    }

                    finalCiphersResults[cipher['id']] = data;
                });

                // console.log(finalCiphersResults);

                let currentCipher = [{
                    entry: inputValue,
                    ciphers: JSON.stringify(finalCiphersResults)
                }];
                // console.log(currentCipher);

                $.ajax({
                    url: "{{ route('get_user_history') }}",
                    type: 'GET',
                    success: function(response) {
                        var responsData = response;

                        if (responsData == "") {
                            return false;
                        }

                        $.ajax({
                            url: "{{ route('cipher_database_arrays') }}",
                            type: 'POST',
                            data: {
                                ciphers: JSON.stringify(responsData),
                                currentCipher: currentCipher,
                                cipherList: cipherList,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                generateTableHeaders(cipherList);
                                const matchedData = response.matched_data;
                                displayTableCiphers(matchedData, cipherList,
                                    response.user_tables);
                                // displayMatchedDatabase(tempdata, currentMatchedData, cipherList);
                                // console.log(matchedData);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error saving data:', xhr
                                    .responseText);
                                alert('Failed to retrieve data.');
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        alert('Failed to retrieve data.');
                    }
                });
            });

            $('body').on('click', '.find-matches', function() {
                $('#not-found').hide();

                if (!$('#database-save').is(':empty')) {
                    $('#database-save').html('');
                }
                if (!$('#current-saved').is(':empty')) {
                    $('#current-saved').html('');
                }
                if (!$('#history-saved').is(':empty')) {
                    $('#history-saved').html('');
                }

                let cipherList;

                if (temp_ciphers.length == 0) {
                    cipherList = @json($ciphers);
                } else {
                    cipherList = temp_ciphers;
                }
                let ciphersForTable = @json($ciphersForTableArr);
                let small_alphabets = generateSmallAlphabets(ciphersForTable);
                let inputValue = $(this).data("entry");
                $('#EntryField').val(inputValue);
                getVal(inputValue, cipherList);
                updateCipherDetails(inputValue, cipherList);
                if (inputValue == "") {
                    $('#not-found').show();
                    return false;
                }

                ciphersForTable.forEach(cipher => {
                    let data;

                    switch (cipher['id']) {
                        case 'D0':
                            data = calculateOrdinal(inputValue);
                            break;
                        case 'D1':
                            data = calculateReduction(inputValue);
                            break;
                        case 'D2':
                            data = calculateReverseOrdinal(inputValue);
                            break;
                        case 'D3':
                            data = calculateReverseReduction(inputValue);
                            break;
                        default:
                            data = calculateOrdinalCiphers(inputValue, cipher['id'],
                                small_alphabets);
                            break;
                    }

                    finalCiphersResults[cipher['id']] = data;
                });

                // console.log(finalCiphersResults);

                let currentCipher = [{
                    entry: inputValue,
                    ciphers: JSON.stringify(finalCiphersResults)
                }];
                // console.log(currentCipher);

                $.ajax({
                    url: "{{ route('cipher_history_get') }}",
                    type: 'GET',
                    success: function(response) {
                        // $('#database-first').html('');
                        // console.log(response);
                        generateTableHeaders(cipherList);
                        const matchedData = matchAndExtractData(response.history, cipherList);
                        const currentMatchedData = matchAndExtractData(currentCipher,
                            cipherList);
                        let tempdata = getMatchingEntriesByScore(currentMatchedData,
                            matchedData);
                        displayCurrentMatchedData(currentMatchedData, cipherList);
                        displayMatchedData(tempdata, currentMatchedData, cipherList, response
                            .user_tables);
                        // console.log(tempdata);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        alert('Failed to retrieve data.');
                    }
                });
            });


            function matchAndExtractData(ciphersData, cipherInfo) {
                const matchedData = [];
                // console.log(ciphersData);

                ciphersData.forEach(dataEntry => {
                    const entryId = dataEntry.id;
                    const entryName = dataEntry.entry;
                    const scores = JSON.parse(dataEntry.ciphers);

                    Object.entries(scores).forEach(([cipherId, score]) => {
                        const matchedCipher = cipherInfo.find(c => c.id === cipherId);
                        if (matchedCipher) {
                            matchedData.push({
                                entry_id: entryId,
                                entry: entryName,
                                cipher_id: matchedCipher.id,
                                cipher_name: matchedCipher.name,
                                rgb_values: matchedCipher.rgb_values,
                                score: score
                            });
                        }
                    });
                });

                return matchedData;
            }

            function generateTableHeaders(cipherInfo) {
                const headerRow = $('#table-headers');
                const footerRow = $('#table-footers');

                headerRow.empty();
                footerRow.empty();

                headerRow.append('<th>Entry</th>');

                cipherInfo.forEach(cipher => {
                    if (typeof cipher.rgb_values !== "object") {
                        cipher.rgb_values = JSON.parse(cipher.rgb_values);
                    }
                    var red = cipher.rgb_values.red;
                    var green = cipher.rgb_values.green;
                    var blue = cipher.rgb_values.blue;
                    const rgb = `rgb(${red}, ${green}, ${blue})`;
                    const header = `<th style="color: ${rgb};">${cipher.name}</th>`;
                    headerRow.append(header);
                });
            }

            function displayMatchedData(matchedData, currentMatchedData, cipherInfo, user_tables) {
                const matchedScores = currentMatchedData.reduce((acc, entry) => {
                    acc[entry.score] = entry.rgb_values; // Store RGB values by score
                    return acc;
                }, {});
                // console.log(matchedScores);

                const tbody = $('#history-saved');
                tbody.append(`
                    <tr class="center-td">
                        <td colspan="100%">Matched Entries</td>
                    </tr>
                `);
                tbody.find('tr:not(.center-td)').remove();

                const groupedEntries = matchedData.reduce((acc, data) => {
                    if (!acc[data.entry]) acc[data.entry] = {};
                    acc[data.entry][data.cipher_id] = data;
                    return acc;
                }, {});

                let userTablesHtml = '';

                user_tables.forEach(table => {
                    userTablesHtml +=
                        `<li><a href="javascript:void(0)" data-id="${table.id}" class="add-name">${table.name}</a></li>`;
                });


                Object.entries(groupedEntries).forEach(([entry, scores]) => {
                    let entryId = Object.values(scores)[0].entry_id;
                    let row = `<tr><td>${entry}
                        <div class="open-box" id="openBox1">
                            <ul class="data-box">
                                <li class="data-into-data">
                                    <p>Shift Phrase:</p>
                                     <div class="box-info">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="move-up">Move Up</a></li>
                                            <li><a href="javascript:void(0)" class="move-down">Move Down</a></li>
                                            <li><a href="javascript:void(0)" class="move-top">Move to Top</a></li>
                                            <li><a href="javascript:void(0)" class="move-bottom">Move to Bottom</a></li>
                                        </ul>
                                     </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-entry="${entry}" class="find-matches">Find Matches</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-entry-id="${entryId}" class="remove-entry">Remove</a>
                                </li>
                                <li class="data-into-data">
                                    <p>Save to Table:</p>
                                    <div class="box-info">
                                        <ul data-entry-id="${entryId}">
                                            ${userTablesHtml}
                                        </ul>
                                     </div>
                                </li>
                            </ul>
                        </div>
                        </td>`;

                    cipherInfo.forEach(cipher => {
                        const scoreData = scores[cipher.id];
                        let scoreCell = '<td></td>';

                        if (scoreData) {
                            let {
                                score
                            } = scoreData;
                            let rgb_values = matchedScores[score] || {
                                red: 255,
                                green: 255,
                                blue: 255
                            };

                            scoreCell =
                                `<td style="color: rgb(${rgb_values.red}, ${rgb_values.green}, ${rgb_values.blue});">${score}</td>`;
                        }

                        row += scoreCell;
                    });

                    row += '</tr>';
                    tbody.append(row); // Append the row to tbody
                });
            }

            function displayCurrentMatchedData(currentMatchedData, cipherInfo) {
                const matchedScores = currentMatchedData.reduce((acc, entry) => {
                    acc[entry.score] = entry.rgb_values; // Store RGB values by score
                    return acc;
                }, {});

                const currentTbody = $('#current-saved');
                currentTbody.find('tr:not(.center-td)').remove();

                const groupedEntries = currentMatchedData.reduce((acc, data) => {
                    if (!acc[data.entry]) acc[data.entry] = {};
                    acc[data.entry][data.cipher_id] = data;
                    return acc;
                }, {});

                Object.entries(groupedEntries).forEach(([entry, scores]) => {
                    let row = `<tr><td>${entry}</td>`;

                    cipherInfo.forEach(cipher => {
                        const scoreData = scores[cipher.id];
                        let scoreCell = '<td></td>';

                        if (scoreData) {
                            const {
                                score
                            } = scoreData;
                            let rgb_values = matchedScores[score] || {
                                red: 255,
                                green: 255,
                                blue: 255
                            };
                            scoreCell =
                                `<td style="color: rgb(${rgb_values.red}, ${rgb_values.green}, ${rgb_values.blue});">${score}</td>`;
                        }

                        row += scoreCell;
                    });

                    row += '</tr>';
                    currentTbody.append(row);
                });

                currentTbody.insertBefore($('#history-saved'));
            }

            function displayMatchedDatabase(matchedData, currentMatchedData, cipherInfo, user_tables) {
                const matchedScores = currentMatchedData.reduce((acc, entry) => {
                    acc[entry.score] = JSON.parse(entry.rgb_values); // Store RGB values by score
                    return acc;
                }, {});
                // console.log(matchedScores);

                const tbody = $('#database-saved');
                tbody.find('tr:not(.center-td)').remove();

                const groupedEntries = matchedData.reduce((acc, data) => {
                    if (!acc[data.entry]) acc[data.entry] = {};
                    acc[data.entry][data.cipher_id] = data;
                    return acc;
                }, {});

                let userTablesHtml;

                user_tables.forEach(table => {
                    userTablesHtml +=
                        `<li><a href="javascript:void(0)" data-id="${table.id}" class="add-name">${table.name}</a></li>`;
                });

                Object.entries(groupedEntries).forEach(([entry, scores]) => {
                    let entryId = Object.values(scores)[0].entry_id;
                    let row = `<tr><td>${entry}
                        <div class="open-box" id="openBox1">
                            <ul class="data-box">
                                <li class="data-into-data">
                                    <p>Shift Phrase:</p>
                                     <div class="box-info">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="move-up">Move Up</a></li>
                                            <li><a href="javascript:void(0)" class="move-down">Move Down</a></li>
                                            <li><a href="javascript:void(0)" class="move-top">Move to Top</a></li>
                                            <li><a href="javascript:void(0)" class="move-bottom">Move to Bottom</a></li>
                                        </ul>
                                     </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-entry="${entry}" class="find-matches">Find Matches</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-entry-id="${entryId}" class="remove-entry">Remove</a>
                                </li>
                                <li class="data-into-data">
                                    <p>Save to Table:</p>
                                    <div class="box-info">
                                        <ul data-entry-id="${entryId}">
                                            ${userTablesHtml}
                                        </ul>
                                     </div>
                                </li>
                            </ul>
                        </div>
                        </td>`;

                    cipherInfo.forEach(cipher => {
                        const scoreData = scores[cipher.id];
                        let scoreCell = '<td></td>';

                        if (scoreData) {
                            let {
                                score
                            } = scoreData;
                            let rgb_values = matchedScores[score] || {
                                red: 255,
                                green: 255,
                                blue: 255
                            };

                            scoreCell =
                                `<td style="color: rgb(${rgb_values.red}, ${rgb_values.green}, ${rgb_values.blue});">${score}</td>`;
                        }

                        row += scoreCell;
                    });

                    row += '</tr>';
                    tbody.append(row); // Append the row to tbody
                });
            }

            function displayTableCiphers(currentMatchedData, cipherInfo, user_tables) {
                const matchedScores = currentMatchedData.reduce((acc, entry) => {
                    acc[entry.score] = JSON.parse(entry.rgb_values); // Store RGB values by score
                    return acc;
                }, {});
                // console.log(matchedScores);

                const tbody = $('#database-saved');
                tbody.find('tr:not(.center-td)').remove();

                const groupedEntries = currentMatchedData.reduce((acc, data) => {
                    if (!acc[data.entry]) acc[data.entry] = {};
                    acc[data.entry][data.cipher_id] = data;
                    return acc;
                }, {});

                let userTablesHtml;

                user_tables.forEach(table => {
                    userTablesHtml +=
                        `<li><a href="javascript:void(0)" data-id="${table.id}" class="add-name">${table.name}</a></li>`;
                });

                Object.entries(groupedEntries).forEach(([entry, scores]) => {
                    let entryId = Object.values(scores)[0].entry_id;
                    let row = `<tr><td>${entry}
                        <div class="open-box" id="openBox1">
                            <ul class="data-box">
                                <li class="data-into-data">
                                    <p>Shift Phrase:</p>
                                     <div class="box-info">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="move-up">Move Up</a></li>
                                            <li><a href="javascript:void(0)" class="move-down">Move Down</a></li>
                                            <li><a href="javascript:void(0)" class="move-top">Move to Top</a></li>
                                            <li><a href="javascript:void(0)" class="move-bottom">Move to Bottom</a></li>
                                        </ul>
                                     </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-entry="${entry}" class="find-matches">Find Matches</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" data-entry-id="${entryId}" class="remove-entry">Remove</a>
                                </li>
                                <li class="data-into-data">
                                    <p>Save to Table:</p>
                                    <div class="box-info">
                                        <ul data-entry-id="${entryId}">
                                            ${userTablesHtml}
                                        </ul>
                                     </div>
                                </li>
                            </ul>
                        </div>
                        </td>`;

                    cipherInfo.forEach(cipher => {
                        const scoreData = scores[cipher.id];
                        let scoreCell = '<td></td>';

                        if (scoreData) {
                            let {
                                score
                            } = scoreData;
                            let rgb_values = matchedScores[score] || {
                                red: 255,
                                green: 255,
                                blue: 255
                            };

                            scoreCell =
                                `<td style="color: rgb(${rgb_values.red}, ${rgb_values.green}, ${rgb_values.blue});">${score}</td>`;
                        }

                        row += scoreCell;
                    });

                    row += '</tr>';
                    tbody.append(row); // Append the row to tbody
                });
            }

            function getMatchingEntriesByScore(currentMatchedData, matchedData) {
                const currentScores = currentMatchedData.map(entry => entry.score);

                const matchingEntries = new Set(
                    matchedData
                    .filter(item => currentScores.includes(item.score))
                    .map(item => item.entry)
                );

                return matchedData.filter(item => matchingEntries.has(item.entry));
            }

            $('body').on('click', '.add-name', function() {
                const dataId = $(this).data('id');

                const entryId = $(this).closest('ul').data('entry-id');

                console.log(`Data ID: ${dataId}`);
                console.log(`Entry ID: ${entryId}`);

                $.ajax({
                    url: "{{ route('add_entry_name') }}",
                    method: 'POST',
                    data: {
                        id: dataId,
                        entryId: entryId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success"
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        let errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr
                            .responseJSON.message : "Failed to save data.";
                        Swal.fire({
                            title: "Error!",
                            text: errorMessage,
                            icon: "error"
                        });
                    }
                });
            });

            $('body').on('click', '.remove-entry', function() {
                const entryId = $(this).data('entry-id');

                if (confirm(`Are you sure you want to delete entry ${entryId}?`)) {

                    $.ajax({
                        url: "{{ url('remove-entry') }}/" + entryId,
                        method: 'GET',
                        success: function(response) {
                            console.log(`Entry ${entryId} removed successfully!`);
                            // alert(`Entry ${entryId} deleted.`);


                            $(`[data-entry-id=${entryId}]`).closest('tr').remove();
                        },
                        error: function(xhr, status, error) {
                            console.error(`Failed to remove entry ${entryId}:`, error);
                            // alert('Failed to delete entry. Please try again.');
                        }
                    });
                }
            });


            $('#btn-save-entry').on('click', function() {
                let entryTitle = $('#entry-title').text();

                $.ajax({
                    url: "{{ route('cipher_history_store') }}",
                    type: 'POST',
                    data: {
                        entry: entryTitle,
                        ciphers: JSON.stringify(finalCiphersResults),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // console.log(response);
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success"
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', xhr.responseText);
                        let errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr
                            .responseJSON.message : "Failed to save data.";
                        Swal.fire({
                            title: "Error!",
                            text: errorMessage,
                            icon: "error"
                        });
                    }
                });
            });

            $('#current-saved').on('click', 'tr td:first-child', function() {
                const entryName = $(this).text();
                $('#entry-title').text(entryName);

                $('#openBox').css({
                    display: 'block',
                    top: $(this).offset().top + $(this).outerHeight(),
                    left: $(this).offset().left
                });
            });

            $('.close-btn').on('click', function() {
                $('#openBox').hide();
            });

            // Move Up
            $('body').on('click', '.move-up', function() {
                const row = $(this).closest('tr');
                if (!row.prev().hasClass('center-td')) {
                    row.prev().before(row);
                }
            });

            // Move Down
            $('body').on('click', '.move-down', function() {
                const row = $(this).closest('tr');
                if (row.next().length) {
                    row.next().after(row);
                }
            });

            // Move to Top
            $('body').on('click', '.move-top', function() {
                const row = $(this).closest('tr');
                row.insertAfter('.center-td');
            });

            // Move to Bottom
            $('body').on('click', '.move-bottom', function() {
                const row = $(this).closest('tr');
                $('#history-saved').append(row);
                $('#database-saved').append(row);
            });

        });

        $(document).ready(function() {
            window.updateCipherDetails = function(val = '', new_list = '') {
                if (val != '') {
                    let cipherList;
                    if (temp_ciphers.length == 0) {
                        cipherList = @json($ciphers);
                    } else {
                        cipherList = new_list;
                    }
                    let inputVal = val.trim();
                    let getId = $('#cipher_id').val();

                    let data = calculateGematria(val);
                    var small_alphabets = generateSmallAlphabets(cipherList);
                    if (inputVal) {
                        const cipher = cipherList.find(function(cipher) {
                            return cipher.id == getId;
                        }) || cipherList[0];

                        // console.log(cipher);
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
                            let cipherSmallAlphabet, cipherCapitalAlphabet;

                            // Parse small and capital alphabets from the cipher
                            if (typeof cipher.small_alphabet !== "object") {
                                cipherSmallAlphabet = JSON.parse(cipher.small_alphabet);
                            }
                            if (typeof cipher.capital_alphabet !== "object") {
                                cipherCapitalAlphabet = JSON.parse(cipher.capital_alphabet);
                            }

                            // Fallback: if capital alphabet is empty, use the small alphabet
                            if (Object.keys(cipherCapitalAlphabet).length === 0) {
                                cipherCapitalAlphabet = Object.fromEntries(
                                    Object.entries(cipherSmallAlphabet).map(([key, value]) => [key
                                        .toUpperCase(), value
                                    ])
                                );
                            }

                            for (let i = 0; i <= 9; i++) {
                                const numStr = i.toString();
                                if (!cipherSmallAlphabet[numStr]) cipherSmallAlphabet[numStr] = i;
                                if (!cipherCapitalAlphabet[numStr]) cipherCapitalAlphabet[numStr] = i;
                            }

                            for (let i = 0; i < word.length; i++) {
                                let char = word[i];

                                // Select the appropriate value based on character case
                                let value = char == char.toLowerCase() ?
                                    cipherSmallAlphabet[char] || 0 :
                                    cipherCapitalAlphabet[char] || 0;

                                // If value exists, add to charValues and wordSum
                                if (value) {
                                    charValuesRow1.push(`<td class="BreakCharNG">${char}</td>`);
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
                            console.log(data.reverseReduction);
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

            window.getVal = function(val, cipher_list) {

                let cipherList;
                if (temp_ciphers.length == 0) {
                    cipherList = cipher_list;
                } else {
                    cipherList = temp_ciphers;
                }

                let wordCount = val ? val.split(/\s+/).length : 0;

                let letterCount = val.replace(/[^a-zA-Z]/g, '').length;

                $('#WordLetterCount .WordLetterCount').text('(' + wordCount + ' word' + (wordCount !== 1 ? 's' :
                    '') + ', ' + letterCount + ' letter' + (letterCount !== 1 ? 's' : '') + ')');

                if (val == "") {
                    cipherList.forEach((cipher) => {
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
                var small_alphabets = generateSmallAlphabets(cipherList);

                cipherList.forEach((cipher) => {
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

                // updateCipherDetails(val, cipherList);
            };

            window.downloadJSON = function(data, filename) {
                // Convert JSON data to a string
                const jsonStr = JSON.stringify(data, null, 2);

                // Create a Blob from the string
                const blob = new Blob([jsonStr], {
                    type: 'application/json'
                });

                // Create a temporary link element
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = filename;

                // Append the link to the document and trigger the download
                document.body.appendChild(link);
                link.click();

                // Clean up the link element
                document.body.removeChild(link);
            }

        });
    </script>

    <script>
        // Cipher Chart
        const isVisible = sessionStorage.getItem('cipherChartVisible');
        if (isVisible === null) {
            $('#ChartSpot').show();
            sessionStorage.setItem('cipherChartVisible', true);
        } else {
            $('#ChartSpot').toggle(isVisible === 'true');
        }

        $('#cipher-chart').click(function() {
            const isNowVisible = $('#ChartSpot').is(':visible');
            $('#ChartSpot').toggle();
            sessionStorage.setItem('cipherChartVisible', !isNowVisible);
        });

        //Breakdown

        const isVisible1 = sessionStorage.getItem('breadownVisible');
        if (isVisible1 === null) {
            $('#breakDownSpot').show();
            sessionStorage.setItem('breadownVisible', true);
        } else {
            $('#breakDownSpot').toggle(isVisible1 === 'true');
        }

        $('#breakdown').click(function() {
            const isNowVisible1 = $('#breakDownSpot').is(':visible');
            $('#breakDownSpot').toggle();
            sessionStorage.setItem('breadownVisible', !isNowVisible1);
        });


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
                                    // console.log(temp_ciphers);

                                    getVal(val, response.ciphers);

                                    updateCipherDetails(val, response.ciphers);

                                    var dataId = $('#GemTable .data-ciphers').first().data('id');
                                    MoveCipherClick(dataId, event);

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
                        Swal.fire({
                            title: "Error!",
                            text: "Error saving cipher settings",
                            icon: "error"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while saving the cipher settings.",
                        icon: "error"
                    });
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
            let temp_ciphers_click;
            if (temp_ciphers.length === 0) {
                temp_ciphers_click = @json($ciphers);
            } else {
                temp_ciphers_click = temp_ciphers;
            }

            const selectedCipher = temp_ciphers_click.find(cipher => cipher.id == cipherId);

            if (selectedCipher) {
                let smallAlphabet = typeof selectedCipher.small_alphabet !== "object" ?
                    JSON.parse(selectedCipher.small_alphabet) :
                    selectedCipher.small_alphabet;

                let capitalAlphabet = typeof selectedCipher.capital_alphabet !== "object" ?
                    JSON.parse(selectedCipher.capital_alphabet) :
                    selectedCipher.capital_alphabet;

                let rgbValues = typeof selectedCipher.rgb_values !== "object" ?
                    JSON.parse(selectedCipher.rgb_values) :
                    selectedCipher.rgb_values;

                document.getElementById('alphabetRow').innerHTML = '';
                document.getElementById('valueRow').innerHTML = '';
                document.getElementById('capitalAlphabetRow').innerHTML = '';
                document.getElementById('capitalValueRow').innerHTML = '';

                Object.entries(smallAlphabet).forEach(([char, value]) => {
                    const charCell = document.createElement('td');
                    charCell.classList.add('chartChar');
                    charCell.textContent = char;
                    document.getElementById('alphabetRow').appendChild(charCell);

                    const valueCell = document.createElement('td');
                    valueCell.classList.add('chartVal');
                    valueCell.textContent = value;
                    document.getElementById('valueRow').appendChild(valueCell);
                });

                Object.entries(capitalAlphabet).forEach(([char, value]) => {
                    const charCell = document.createElement('td');
                    charCell.classList.add('chartChar');
                    charCell.textContent = char;
                    document.getElementById('capitalAlphabetRow').appendChild(charCell);

                    const valueCell = document.createElement('td');
                    valueCell.classList.add('chartVal');
                    valueCell.textContent = value;
                    document.getElementById('capitalValueRow').appendChild(valueCell);
                });

                const cipherTitle = selectedCipher.name;
                document.getElementById('cipherChartTitle').innerHTML = `
                    <font id="cipherTitleFont" style="color: rgb(${rgbValues.red}, ${rgbValues.green}, ${rgbValues.blue})">
                        ${cipherTitle}
                    </font>
                `;
            }
        }

        window.onload = function() {

            const firstCipherId = "{{ $first_ciphers['id'] }}";
            console.log(firstCipherId);
            MoveCipherClick(firstCipherId, event);

            var firstDataId = $('div.change-cipher').first().data('id');
            $('#cipher_id').val(firstDataId);
        };

        // Gematria mapping for English alphabet

        let alphabet = @json($D0);
        let alphabet1 = @json($D1);
        let alphabet2 = @json($D2);
        let alphabet3 = @json($D3);

        alphabet = addNumbersToAlphabet(alphabet);
        alphabet1 = addNumbersToAlphabet(alphabet1);
        alphabet2 = addNumbersToAlphabet(alphabet2);
        alphabet3 = addNumbersToAlphabet(alphabet3);

        // var ciphers = @json($ciphers);

        function generateSmallAlphabets(ciphers) {
            let small_alphabets = {};

            ciphers.forEach(cipher => {
                let cipherId = cipher['id'];

                if (!['D0', 'D1', 'D2', 'D3'].includes(cipherId)) {
                    let capitalData = JSON.parse(cipher['capital_alphabet']);
                    let smallData = JSON.parse(cipher['small_alphabet']);
                    let hasNumbers = false;

                    for (let i = 0; i <= 9; i++) {
                        const numStr = i.toString();
                        if (smallData[numStr] != undefined || capitalData[numStr] != undefined) {
                            hasNumbers = true;
                            break;
                        }
                    }

                    if (!hasNumbers) {
                        for (let i = 0; i <= 9; i++) {
                            const numStr = i.toString();
                            smallData[numStr] = i;
                        }
                    }

                    small_alphabets[cipherId] = { ...smallData, ...capitalData };
                }
            });

            return small_alphabets;
        }

        function calculateOrdinalCiphers(input, cipherId, small_alphabets) {
            return [...input].reduce((sum, char) => {
                var alphabetData = small_alphabets[cipherId];

                // Ensure alphabetData is an object
                if (alphabetData && typeof alphabetData === 'object') {
                    let charValue = alphabetData[char] || alphabetData[char.toLowerCase()] || alphabetData[char
                        .toUpperCase()];

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
                return sum + (alphabet2[char.toLowerCase()] || 0);
            }, 0);
        }

        // Function to calculate Reverse Reduction value
        function calculateReverseReduction(input) {
            return [...input].reduce((sum, char) => sum + (alphabet3[char.toLowerCase()] || 0), 0);
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

        function addNumbersToAlphabet(alphabet) {
            for (let i = 0; i <= 9; i++) {
                const numStr = i.toString();
                if (!alphabet[numStr]) {
                    alphabet[numStr] = i;  // You can change the value logic if needed
                }
            }
            return alphabet;
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
            let count = 0; // Counter for composite numbers
            let current = 4; // Start from 4 because 4 is the first composite number

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
                octal: n.toString(8), // Octal
                duodecimal: n.toString(12), // Duodecimal
                hexadecimal: n.toString(16), // Hexadecimal
                binary: n.toString(2) // Binary
            };

            return conversions;
        }

        function number_properties(number) {
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
                string += '<b class="Linkable"><a href="javascript:void(0);" class="target_number">' + item + '</a></b>' + (
                    count === return_body.divisors.length ? '' : ',&nbsp;');
            }
            if (return_body.composite != '') {
                string += '<br>';
                string += '<b class="Linkable">' + return_body.composite + '</b>';
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
        $(document).ready(function() {
            $('#EntryField').on('keyup', function() {
                let val = $(this).val();

                if (temp_ciphers.length === 0) {
                    temp_ciphers_val = @json($ciphers); // Assign the data directly
                } else {
                    temp_ciphers_val = temp_ciphers;
                }

                getVal(val, temp_ciphers_val);

                updateCipherDetails($(this).val(), temp_ciphers_val);

                return true;
            });

            $('#ordinal').on('click', function() {
                number_properties($(this).text());
            });
            $('#reduction').on('click', function() {
                number_properties($(this).text());
            });
            $('#reverse').on('click', function() {
                number_properties($(this).text());
            });
            $('#reverse_reduction').on('click', function() {
                number_properties($(this).text());
            });

            $('#btn_get_properties').on('click', function() {
                let val = $('#input_get_properties').val();

                if (val < 1 || val == '') {
                    return false;
                }

                number_properties(val);
            });

            $('body').on('click', '.target_number', function() {
                number_properties($(this).text());
            });

            $('body').on('click', '.change-cipher', function() {
                // console.log($(this).data('id'));
                var id = $(this).data('id');
                // console.log(id, temp_ciphers.length, temp_ciphers);

                if (temp_ciphers.length === 0) {
                    temp_ciphers_update = @json($ciphers); // Assign the data directly
                } else {
                    temp_ciphers_update = temp_ciphers;
                }

                let selected_cipher = temp_ciphers_update.find(cipher => cipher.id == id);

                // Update the cipher ID input field
                $('#cipher_id').val(selected_cipher.id);

                // Run the main logic to update the cipher details
                let tempVal = $('#EntryField').val();
                updateCipherDetails(tempVal, temp_ciphers_update);
            });

        });


        // Ensure both modals can open independently
        var rightModal = new bootstrap.Modal(document.getElementById('right-side'), {
            backdrop: 'static',
            keyboard: false
        });

        var leftModal = new bootstrap.Modal(document.getElementById('left-side'), {
            backdrop: false, // This allows the left modal to open without closing the right modal
            keyboard: false
        });

        $('#right-side').on('shown.bs.modal', function() {
            $('body').removeClass('modal-open');
        });

        $('#left-side').on('shown.bs.modal', function() {
            $('body').removeClass('modal-open');
        });

        $('.left-arrow').on('click', function() {
            $('#left-side').addClass('active');
        })
        $('.right-arrow').on('click', function() {
            $('#right-side').addClass('active');
        })

        $('.close').on('click', function() {
            $(this).closest('.sides-modal').removeClass('active'); // Close the current panel
        });

        new DataTable('#example');
    </script>


@endsection
