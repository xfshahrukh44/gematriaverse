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
                                                                                    class="CharBox lowerCheck" id="CharBox0"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">b<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox1"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">c<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox2"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">d<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox3"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">e<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox4"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">f<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox5"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">g<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox6"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">h<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox7"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">i<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox8"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">j<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox9"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">k<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox10"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">l<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox11"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">m<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox12"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                        </tr>
                                                                        <tr id="lower2">
                                                                            <td class="LetterBox">n<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox13"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">o<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox14"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">p<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox15"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">q<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox16"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">r<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox17"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">s<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox18"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">t<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox19"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">u<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox20"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">v<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox21"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">w<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox22"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">x<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox23"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">y<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox24"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
                                                                            <td class="LetterBox">z<br><input
                                                                                    class="CharBox lowerCheck" id="CharBox25"
                                                                                    type="number" min="0"
                                                                                    max="9999" value="0"></td>
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
                                                                    value="AddCipher">Add
                                                                    Cipher</button>&nbsp;&nbsp;&nbsp;<button
                                                                    class="buttonFunction"
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

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function addCipher() {
                var cipherName = $('#NameField').val();
                var lowerCaseValues = [];
                $('.lowerCheck').each(function () {
                    lowerCaseValues.push($(this).val());
                });

                var useCaps = $('#Cap_Check').is(':checked');
                var capsValues = [];
                if (useCaps) {
                    $('.capCheck').each(function () {
                        capsValues.push($(this).val());
                    });
                }

                var red = $('#RedBox').val();
                var green = $('#GreenBox').val();
                var blue = $('#BlueBox').val();
                var color = { red: red, green: green, blue: blue };

                var cipherData = {
                    name: cipherName,
                    lowerCaseValues: lowerCaseValues,
                    useCaps: useCaps,
                    capsValues: capsValues,
                    color: color
                };

                $.ajax({
                    url: "{{ route('add-ciphers') }}",
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify(cipherData),
                    success: function (response) {

                        $('#ConfirmDiv').html('<p>Cipher added successfully!</p>');
                    },
                    error: function (error) {

                        $('#ConfirmDiv').html('<p>Failed to add cipher. Please try again.</p>');
                    }
                });
            }

            $('button[value="AddCipher"]').click(function (e) {
                e.preventDefault();
                addCipher();
            });
        });

    </script>
@endsection
