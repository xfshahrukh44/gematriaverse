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
                                                                <div id="cipherName"><span>Name your custom cipher
                                                                        below:</span></div><input class="u_Inp"
                                                                    id="NameField" oninput="javascript:Verify_CipherName()"
                                                                    maxlength="25"><br>
                                                                <table id="MainTable">
                                                                    <tbody>
                                                                        <tr id="lower1">
                                                                            <td class="LetterBox">a<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox0"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">b<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox1"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">c<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox2"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">d<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox3"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">e<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox4"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">f<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox5"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">g<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox6"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">h<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox7"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">i<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox8"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">j<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox9"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">k<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox10"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">l<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox11"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">m<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox12"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                        </tr>
                                                                        <tr id="lower2">
                                                                            <td class="LetterBox">n<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox13"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">o<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox14"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">p<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox15"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">q<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox16"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">r<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox17"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">s<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox18"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">t<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox19"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">u<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox20"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">v<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox21"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">w<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox22"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">x<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox23"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">y<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox24"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBox">z<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CharBox25"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
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
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox0"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">B<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox1"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">C<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox2"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">D<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox3"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">E<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox4"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">F<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox5"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">G<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox6"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">H<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox7"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">I<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox8"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">J<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox9"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">K<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox10"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">L<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox11"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">M<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox12"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                        </tr>
                                                                        <tr id="caps2" style="display: block;">
                                                                            <td class="LetterBoxCaps">N<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox13"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">O<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox14"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">P<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox15"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">Q<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox16"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">R<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox17"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">S<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox18"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">T<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox19"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">U<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox20"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">V<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox21"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">W<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox22"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">X<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox23"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">Y<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox24"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                            <td class="LetterBoxCaps">Z<br><input
                                                                                    oninput="javascript:Define_ActiveArray()"
                                                                                    class="CharBox" id="CapBox25"
                                                                                    type="number" min="0"
                                                                                    max="9999"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td colspan="13">
                                                                                <div id="colorSection"><span
                                                                                        id="rgbText">Color of Cipher (in
                                                                                        RGB): </span><input
                                                                                        class="ColorBox" id="RedBox"
                                                                                        oninput="javascript:Change_Color()"
                                                                                        type="number" min="0"
                                                                                        max="255"
                                                                                        value="255">&nbsp;&nbsp;&nbsp;<input
                                                                                        class="ColorBox" id="GreenBox"
                                                                                        oninput="javascript:Change_Color()"
                                                                                        type="number" min="0"
                                                                                        max="255"
                                                                                        value="255">&nbsp;&nbsp;&nbsp;<input
                                                                                        class="ColorBox" id="BlueBox"
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
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div id="ButtonSpot"><button class="buttonFunction"
                                                                    onclick="Send_NewCipher()" value="AddCipher">Add
                                                                    Cipher</button>&nbsp;&nbsp;&nbsp;<button
                                                                    class="buttonFunction" onclick="List_Ciphers()"
                                                                    value="CancelCipher">Cancel</button></div>
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
    <script src="{{ asset('js/customciphers.js') }}"></script>
    <script src="{{ asset('js/load.js') }}"></script>
    <script>
        var maxCiphers = 7
    </script>
@endsection
