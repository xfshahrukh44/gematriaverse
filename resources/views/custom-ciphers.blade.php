@extends('layouts.app')

@section('title', 'Custom ciphers')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cipherstyle.css') }}">
    <style>
        #MainTable tbody>tr> :nth-child(1) {
            text-align: center;
            width: auto;
        }

        #MainTable td {
            /* padding: 0; */
            border: 0;
            /* font-weight: 0; */
            font-size: 1em;
        }

        #ColorDivEdit {
            display: inline;
            width: 100px;
            height: 30px;
            border-radius: 2px;
            padding: 5px;
            color: black;
            font-weight: bold;
        }

        @font-face {
            font-family: dealerplate-california;
            src: url(../fonts/dealerplate-california.ttf);
        }

        tr#lower1 {
            font-family: dealerplate-california !important;
            font-size: 20px;
        }

        tr#lower2 {
            font-family: dealerplate-california !important;
            font-size: 20px;
        }

        textarea#description {
            width: 100%;
            height: 120px;
        }

        textarea#editDescription {
            width: 100%;
            height: 120px;
        }

        div#descSection {
            width: 100%;
            display: flex;
            margin-top: 10px;
        }

        td.text-area {
            width: 100%;
            display: flex;
        }

    </style>
@endsection

@section('content')
    <section class="empty-sec py">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="main-content-area full-width-template">
                            <div class="page-content clearfix">
                                <div class="wpb-content-wrapper">
                                    <div id="wbc-66f5bd5c94e8e" class="vc_row wpb_row  full-width-section"
                                        style="padding-top: 60px;padding-bottom: 30px;">
                                        <div class="wpb_column vc_column_container vc_col-sm-12 text-center">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="current-user">Username: <span
                                                            class="user-name">Mersdecodes</span><br>User ID: <span
                                                            class="user-id">9727</span><br>Membership level: <span
                                                            class="membership-level">Enthusiast</span>
                                                    </div>
                                                    <div class="tool-wrapper">

                                                        <div id="MainTableDiv">
                                                            <h2>Your Ciphers</h2>
                                                            <div id="ConfirmDiv"></div>
                                                            <div id="CipherMenu">
                                                                <div id="cipherList">
                                                                    <!-- The list will be populated here -->
                                                                    <div id="cipherContainer"></div>
                                                                    <div class="CipherSelection">
                                                                        <button class="buttonFunction"
                                                                            id="createCipherBtn">Create New</button>
                                                                    </div>
                                                                </div>

                                                                <div id="cipherAddForm" style="display: none;">
                                                                    <div id="cipherName"><span>Name your custom cipher
                                                                            below:</span></div>
                                                                    <input class="u_Inp" id="NameField"
                                                                        oninput="javascript:Verify_CipherName()"
                                                                        maxlength="25"><br>
                                                                    <table id="MainTable">
                                                                        <tbody>
                                                                            <tr id="lower1">
                                                                                <td class="LetterBox">a<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox0" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">b<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox1" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">c<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox2" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">d<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox3" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">e<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox4" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">f<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox5" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">g<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox6" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">h<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox7" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">i<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox8" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">j<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox9" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">k<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox10" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">l<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox11" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">m<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox12" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                            </tr>
                                                                            <tr id="lower2">
                                                                                <td class="LetterBox">n<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox13" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">o<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox14" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">p<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox15" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">q<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox16" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">r<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox17" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">s<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox18" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">t<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox19" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">u<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox20" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">v<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox21" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">w<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox22" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">x<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox23" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">y<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox24" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">z<br><input
                                                                                        class="CharBox lowerCheck"
                                                                                        id="CharBox25" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="13">
                                                                                    <div id="uniqueCapsText"><input
                                                                                            id="Cap_Check" type="checkbox"
                                                                                            value="CapsOn"
                                                                                            onclick="Check_CapBox()">&nbsp;
                                                                                        Unique Capital Values</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr id="caps1" style="display: block;">
                                                                                <td class="LetterBoxCaps">A<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox0" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">B<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox1" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">C<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox2" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">D<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox3" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">E<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox4" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">F<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox5" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">G<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox6" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">H<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox7" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">I<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox8" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">J<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox9" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">K<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox10" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">L<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox11" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">M<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox12" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                            </tr>
                                                                            <tr id="caps2" style="display: block;">
                                                                                <td class="LetterBoxCaps">N<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox13" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">O<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox14" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">P<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox15" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">Q<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox16" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">R<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox17" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">S<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox18" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">T<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox19" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">U<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox20" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">V<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox21" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">W<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox22" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">X<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox23" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">Y<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox24" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">Z<br><input
                                                                                        class="CharBox capCheck"
                                                                                        id="CapBox25" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td colspan="13">
                                                                                    <div id="colorSection"><span
                                                                                            id="rgbText">Color of Cipher
                                                                                            (in
                                                                                            RGB): </span><input
                                                                                            class="ColorBox"
                                                                                            id="RedBox"
                                                                                            oninput="javascript:Change_Color()"
                                                                                            type="number" min="0"
                                                                                            max="255"
                                                                                            value="255">&nbsp;&nbsp;&nbsp;<input
                                                                                            class="ColorBox"
                                                                                            id="GreenBox"
                                                                                            oninput="javascript:Change_Color()"
                                                                                            type="number" min="0"
                                                                                            max="255"
                                                                                            value="255">&nbsp;&nbsp;&nbsp;<input
                                                                                            class="ColorBox"
                                                                                            id="BlueBox"
                                                                                            oninput="javascript:Change_Color()"
                                                                                            type="number" min="0"
                                                                                            max="255"
                                                                                            value="255">&nbsp;&nbsp;&nbsp;
                                                                                        <div id="ColorDiv"
                                                                                            style="color: rgb(255, 255, 255);">
                                                                                            <br class="mo"><br
                                                                                                class="mo">Cipher Color
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="100" class="text-area">
                                                                                    <div id="descSection"><span id="rgbText">Description:</span><textarea name="description" id="description"></textarea>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div id="ButtonSpot"><button class="buttonFunction"
                                                                            id="submitCipherBtn" value="AddCipher">Add
                                                                            Cipher</button>&nbsp;&nbsp;&nbsp;<button
                                                                            class="buttonFunction cancelCipherBtn"
                                                                            value="CancelCipher"
                                                                            id="">Cancel</button></div>
                                                                </div>
                                                                <div id="cipherEditForm" style="display: none;">
                                                                    <div id="editCipherName"><span>Edit your custom cipher
                                                                            below:</span></div>
                                                                    <input type="hidden" name="cipher_id"
                                                                        id="cipher_id">
                                                                    <input class="u_Inp" id="editNameField"
                                                                        oninput="javascript:Verify_CipherName()"
                                                                        maxlength="25"><br>
                                                                    <table id="MainTable">
                                                                        <tbody>
                                                                            <tr id="lower1">
                                                                                <td class="LetterBox">a<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox0" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">b<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox1" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">c<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox2" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">d<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox3" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">e<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox4" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">f<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox5" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">g<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox6" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">h<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox7" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">i<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox8" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">j<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox9" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">k<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox10" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">l<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox11" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">m<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox12" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                            </tr>
                                                                            <tr id="lower2">
                                                                                <td class="LetterBox">n<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox13" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">o<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox14" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">p<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox15" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">q<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox16" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">r<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox17" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">s<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox18" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">t<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox19" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">u<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox20" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">v<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox21" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">w<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox22" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">x<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox23" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">y<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox24" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                                <td class="LetterBox">z<br><input
                                                                                        class="CharBox lowerCheckEdit"
                                                                                        id="EditCharBox25" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="13">
                                                                                    <div id="uniqueCapsText"><input
                                                                                            id="Cap_Check" type="checkbox"
                                                                                            value="CapsOn"
                                                                                            onclick="Check_CapBox()">&nbsp;
                                                                                        Unique Capital Values</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr id="caps1" style="display: block;">
                                                                                <td class="LetterBoxCaps">A<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox0" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">B<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox1" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">C<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox2" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">D<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox3" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">E<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox4" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">F<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox5" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">G<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox6" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">H<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox7" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">I<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox8" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">J<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox9" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">K<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox10" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">L<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox11" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">M<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox12" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                            </tr>
                                                                            <tr id="caps2" style="display: block;">
                                                                                <td class="LetterBoxCaps">N<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox13" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">O<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox14" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">P<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox15" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">Q<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox16" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">R<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox17" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">S<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox18" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">T<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox19" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">U<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox20" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">V<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox21" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">W<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox22" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">X<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox23" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">Y<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox24" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                                <td class="LetterBoxCaps">Z<br><input
                                                                                        class="CharBox capCheckEdit"
                                                                                        id="EditCapBox25" type="number"
                                                                                        min="0" max="9999"
                                                                                        value="0" disabled></td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td colspan="13">
                                                                                    <div id="colorSection"><span
                                                                                            id="rgbText">Color of Cipher
                                                                                            (in
                                                                                            RGB): </span><input
                                                                                            class="ColorBox"
                                                                                            id="RedBoxEdit"
                                                                                            oninput="javascript:Change_Color_Edit()"
                                                                                            type="number" min="0"
                                                                                            max="255"
                                                                                            value="255">&nbsp;&nbsp;&nbsp;<input
                                                                                            class="ColorBox"
                                                                                            id="GreenBoxEdit"
                                                                                            oninput="javascript:Change_Color_Edit()"
                                                                                            type="number" min="0"
                                                                                            max="255"
                                                                                            value="255">&nbsp;&nbsp;&nbsp;<input
                                                                                            class="ColorBox"
                                                                                            id="BlueBoxEdit"
                                                                                            oninput="javascript:Change_Color_Edit()"
                                                                                            type="number" min="0"
                                                                                            max="255"
                                                                                            value="255">&nbsp;&nbsp;&nbsp;
                                                                                        <div id="ColorDivEdit"
                                                                                            style="color: rgb(255, 255, 255);">
                                                                                            <br class="mo"><br
                                                                                                class="mo">Cipher Color
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="100" class="text-area">
                                                                                    <div id="descSection"><span id="rgbText">Description:</span><textarea name="description" id="editDescription"></textarea>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <div id="ButtonSpot"><button class="buttonFunction"
                                                                            id="submitEditBtn" value="EditCipher">Edit
                                                                            Cipher</button>&nbsp;&nbsp;&nbsp;<button
                                                                            class="buttonFunction cancelCipherBtn"
                                                                            value="CancelCipher"
                                                                            id="">Cancel</button></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    {{-- <script src="{{ asset('js/customciphers.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/load.js') }}"></script> --}}
    <script>
        function Check_CapBox() {
            var checkbox = document.getElementById('Cap_Check');
            var inputFields = document.querySelectorAll('.capCheck');
            inputFields.forEach(function(input) {
                if (checkbox.checked) {
                    input.removeAttribute('disabled');
                } else {
                    input.setAttribute('disabled', true);
                }
            });
        }

        function Change_Color() {
            var red = document.getElementById("RedBox").value;
            var green = document.getElementById("GreenBox").value;
            var blue = document.getElementById("BlueBox").value;
            var rgbColor = "rgb(" + red + ", " + green + ", " + blue + ")";
            document.getElementById("ColorDiv").style.color = rgbColor;
        }

        function Change_Color_Edit() {
            var red = document.getElementById("RedBoxEdit").value;
            var green = document.getElementById("GreenBoxEdit").value;
            var blue = document.getElementById("BlueBoxEdit").value;
            var rgbColor = "rgb(" + red + ", " + green + ", " + blue + ")";
            console.log(rgbColor);
            document.getElementById("ColorDivEdit").style.color = rgbColor;
        }

        $(document).ready(function() {

            $('#createCipherBtn').click(function() {
                $('#cipherList').hide();
                $('#cipherAddForm').show();
            });

            $('.cancelCipherBtn').click(function() {
                location.reload();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function addCipher() {
                var cipherName = $('#NameField').val();
                var description = $('#description').text();

                // Initialize objects for small and capital alphabets
                var smallAlphabet = {};
                var capitalAlphabet = {};

                $('.lowerCheck').each(function(index) {
                    smallAlphabet[String.fromCharCode(97 + index)] = $(this).val() ||
                        0; // 'a' is 97 in ASCII
                });

                $('.capCheck').each(function(index) {
                    capitalAlphabet[String.fromCharCode(65 + index)] = $(this).val() ||
                        0; // 'A' is 65 in ASCII
                });

                var red = $('#RedBox').val() || 0;
                var green = $('#GreenBox').val() || 0;
                var blue = $('#BlueBox').val() || 0;
                var color = {
                    red: red,
                    green: green,
                    blue: blue
                };

                var cipherData = {
                    name: cipherName,
                    small_alphabet: smallAlphabet,
                    capital_alphabet: capitalAlphabet,
                    rgb_values: color,
                    description: description
                };

                $.ajax({
                    url: "{{ route('ciphers.store') }}",
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(cipherData),
                    success: function(response) {
                        if (response.success) {
                            swal("Success!", response.message, "success");
                        }
                    },
                    error: function(jqXHR) {
                        var response = jqXHR.responseJSON;
                        if (response.error) {
                            swal("Error!", response.message, "error");
                        } else {
                            swal("Error!", "Failed to add cipher. Please try again.", "error");
                        }
                    }
                });
            }

            $('button[value="AddCipher"]').click(function(e) {
                e.preventDefault();
                addCipher();
            });


            $.ajax({
                url: "{{ route('ciphers.index') }}",
                type: 'GET',
                success: function(response) {
                    $('#cipherContainer').empty();

                    $.each(response, function(index, cipher) {
                        $('#cipherContainer').append(`
                            <div class="CipherSelection ActiveCipher">
                                ${cipher.name} -
                                <a href="javascript:void(0)" class="move-up" data-id="${cipher.id}">Move Up</a> -
                                <a href="javascript:void(0)" class="edit_cipher" data-id="${cipher.id}">Edit</a> -
                                <a href="javascript:void(0)" class="delete_cipher" data-id="${cipher.id}">Remove</a>
                            </div>
                        `);
                    });
                },
                error: function(error) {
                    console.error('Error fetching ciphers:', error);
                    $('#cipherContainer').html(
                        '<p>Failed to load ciphers. Please try again later.</p>');
                }
            });


            $(document).on('click', '.move-up', function() {
                const cipherId = $(this).data('id');

                $.ajax({
                    url: "{{ route('ciphers.move') }}",
                    type: 'POST',
                    data: {
                        id: cipherId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#ConfirmDiv').html('<p>Cipher moved up successfully!</p>');
                            location.reload();
                        } else {
                            $('#ConfirmDiv').html('<p>' + response.message + '</p>');
                        }
                    },
                    error: function(error) {

                        $('#ConfirmDiv').html(
                            '<p>Failed to move cipher. Please try again.</p>');
                    }
                });
            });

            $(document).on('click', '.edit_cipher', function() {
                // Make an AJAX call to fetch the cipher details
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ url('ciphers') }}/" + id,
                    type: 'GET',
                    success: function(response) {
                        if (response.success) {
                            $('#editNameField').val(response.cipher.name);
                            $('#editDescription').text(response.cipher.description);
                            $('#cipher_id').val(id);

                            const smallAlphabet = response.cipher.small_alphabet;
                            for (let i = 0; i < 26; i++) {
                                const letter = String.fromCharCode(97 + i);
                                const value = smallAlphabet[letter] || 0;
                                $('#EditCharBox' + i).val(value);
                            }

                            const capitalAlphabet = response.cipher.capital_alphabet;
                            for (let i = 0; i < 26; i++) {
                                const letter = String.fromCharCode(65 + i);
                                const value = capitalAlphabet[letter] || 0;
                                $('#EditCapBox' + i).val(value).prop('disabled', false);
                            }

                            const rgbValues = response.cipher.rgb_values;
                            $('#RedBoxEdit').val(rgbValues.red || 255);
                            $('#GreenBoxEdit').val(rgbValues.green || 255);
                            $('#BlueBoxEdit').val(rgbValues.blue || 255);

                            Change_Color_Edit();

                            $('#cipherEditForm').show();
                            $('#cipherList').hide();
                        } else {
                            alert('Error fetching cipher details. Please try again.');
                        }
                    },
                    error: function() {
                        alert('Error fetching cipher details. Please try again.');
                    }
                });
            });


            $('#submitEditBtn').click(function() {
                var id = $('#cipher_id').val();

                var editedCipherData = {
                    name: $('#editNameField').val(),

                    small_alphabet: (function() {
                        var smallAlphabet = {};
                        for (let i = 0; i < 26; i++) {
                            var letter = String.fromCharCode(97 + i);
                            var value = $('#EditCharBox' + i).val();
                            smallAlphabet[letter] = value || 0;
                        }
                        return smallAlphabet;
                    })(),

                    capital_alphabet: (function() {
                        var capitalAlphabet = {};
                        for (let i = 0; i < 26; i++) {
                            var letter = String.fromCharCode(65 + i);
                            var value = $('#EditCapBox' + i).val();
                            capitalAlphabet[letter] = value || 0;
                        }
                        return capitalAlphabet;
                    })(),

                    rgb_values: {
                        red: $('#RedBoxEdit').val() || 255,
                        green: $('#GreenBoxEdit').val() || 255,
                        blue: $('#BlueBoxEdit').val() || 255
                    },

                    description: $('#editDescription').val(),
                };

                // Send an AJAX request to update the cipher
                $.ajax({
                    url: "{{ url('ciphers') }}/" + id + "/edit",
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(editedCipherData),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Success!",
                                text: response.message,
                                icon: "success"
                            });
                            // loadCiphers();
                            // $('#cipherEditForm').hide();
                            // $('#cipherList').show();
                        } else if (response.error) {
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error"
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Could not update cipher",
                                icon: "error"
                            });
                        }
                    },
                    error: function(jqXHR) {
                        var response = jqXHR.responseJSON;
                        if (response.error) {
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error"
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Failed to update cipher. Please try again.",
                                icon: "error"
                            });
                        }
                    }
                });
            });

            $(document).on('click', '.delete_cipher', function() {
                let id = $(this).data('id');

                // Confirmation dialog using SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this cipher!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545', // Bootstrap danger button color
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true // Optional: reverses the order of buttons
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, send AJAX request to delete the cipher
                        $.ajax({
                            url: "{{ url('ciphers') }}/" + id + "/destroy", // URL for deleting the cipher
                            type: 'POST', // Use POST or DELETE request method
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire(
                                        'Deleted!',
                                        response.message,
                                        'success'
                                    );
                                    location.reload(); // Reload the page or update the list of ciphers
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'Failed to delete cipher. Please try again.',
                                        'error'
                                    );
                                }
                            },
                            error: function(jqXHR) {
                                var response = jqXHR.responseJSON;
                                if (response && response.error) {
                                    Swal.fire(
                                        'Error!',
                                        response.message,
                                        'error'
                                    );
                                } else {
                                    Swal.fire(
                                        'Error!',
                                        'Failed to delete cipher. Please try again.',
                                        'error'
                                    );
                                }
                            }
                        });
                    } else {
                        Swal.fire(
                            'Cancelled',
                            'Your cipher is safe :)',
                            'info'
                        );
                    }
                });
            });


        });
    </script>
@endsection
