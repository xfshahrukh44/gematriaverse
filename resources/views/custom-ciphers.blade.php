@extends('layouts.app')

@section('title', 'Custom ciphers')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/cipherstyle.css')}}">
@endsection

@section('content')
    <section class="empty-sec py">
        <div class="container">
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
                                                                <div class="CipherSelection ActiveCipher"> - <a href="javascript:Prioritize_Cipher(0)">Move Up</a> - <a href="javascript:Edit_Cipher(0)">Edit</a> - <a href="javascript:Delete_Cipher(0)">Remove</a></div>
                                                                <div class="CipherSelection ActiveCipher">Chaos - <a href="javascript:Prioritize_Cipher(1)">Move Up</a> - <a href="javascript:Edit_Cipher(1)">Edit</a> - <a href="javascript:Delete_Cipher(1)">Remove</a></div>
                                                                <div class="CipherSelection ActiveCipher">Pi - <a href="javascript:Prioritize_Cipher(2)">Move Up</a> - <a href="javascript:Edit_Cipher(2)">Edit</a> - <a href="javascript:Delete_Cipher(2)">Remove</a></div>
                                                                <div class="CipherSelection ActiveCipher">joan - <a href="javascript:Prioritize_Cipher(3)">Move Up</a> - <a href="javascript:Edit_Cipher(3)">Edit</a> - <a href="javascript:Delete_Cipher(3)">Remove</a></div>
                                                                <div class="CipherSelection"><button class="buttonFunction" onclick="javascript:New_Cipher()">Create New</button></div>
                                                            </div>
                                                            <div id="ButtonSpot"></div>
                                                            <div id="cipherHelp">
                                                                <span>The cipher(s) highlighted in gray at the top of your list will be imported into your <a href="{{route('calculator')}}">Gematria Calculator</a>.</span>
                                                                <span>The amount of custom ciphers that can be imported to your calculator is dependent upon your membership.</span>
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
    <script src="{{asset('js/customciphers.js')}}"></script>
    <script src="{{asset('js/load.js')}}"></script>
    <script>
        var maxCiphers = 7
    </script>
@endsection


