@extends('layouts.app')

@section('title', 'Acronym Finder')

@section('css')
    <style>
        /* gematriaverse-section-from */
        .gematriaverse-section-from .card {
            width: 100%;
            padding: 0;
            flex-direction: row;
            margin: 20px 0 0 5px;
            border: none;
        }

        .form-btn.collapsed i {
            transform: rotate(0);
            transition: 0.3s ease-in-out;
        }

        .form-btn i {
            transform: rotate(91deg);
            transition: 0.3s ease-in-out;
            margin-right: 5px;
        }

        .gematriaverse-section-from .form-btn {
            font-size: 16px;
            color: #ffffff !important;
            border-radius: 50px;
            background: linear-gradient(45deg, #317009, #7fbe00);
            border-color: #7fbe00;
            padding: 8px 30px;
            font-weight: 400;
            letter-spacing: 2px;
            box-shadow: 0 0 20px #7fbe00;
        }

        .gematriaverse-section-from .form-btn.full-width {
            width: 48%;
            margin-top: 30px;
        }

        .gematriaverse-section-from .btn:not(:disabled):not(.disabled).active {
            color: black !important;
        }

        .gematriaverse-section-from .btn:not(:disabled):not(.disabled):active {
            color: black !important;
        }

        .max-number {
            padding: 10px 0;
        }

        .gematriaverse-section-from .form-control {
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        .gematriaverse-section-from .input-group .form-control {
            margin-bottom: 0;
        }

        .gematriaverse-section-from select.form-control:not([size]):not([multiple]) {
            height: auto;
        }

        .data_show {
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid black;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: all ease 0.5s;
        }

        .data_show p {
            margin: 0;
            color: black !important;
            font-weight: 500;
            transition: all ease 0.5s;
        }

        .data_show:hover {
            border: 2px solid #7fbe00;
            transition: all ease 0.5s;
        }

        .data_show:hover p {
            color: #7fbe00 !important;
            transition: all ease 0.5s;
        }

        .open-box {
            display: none;
            background-color: #e6e6e6 !important;
            position: absolute;
            z-index: 1;
            top: 10px;
            padding: 20px 20px;
            left: 50px;
            background: white;
            /* width: 200px; */
            text-align: center;
            /*border: 2px solid black;*/
            border: none;
            border-radius: 5px;
            padding-bottom: 10px;
        }

        .box-main {
            cursor: pointer;
            position: relative;
            z-index: 0;
        }

        .open-box a {
            font-size: 10px;
            padding: 8px 40px;
            margin-bottom: 8px;
            border-radius: 5px;
            background: linear-gradient(45deg, #317009, #7fbe00) !important;
            border-color: #7fbe00;
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

        /* gematriaverse-section-from */
    </style>
@endsection

@section('content')
    <!-- section-1 -->
    <section class="gematriaverse-section" style="padding: 120px 0px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 py-5">
                    <div class="gematriaverse-section-from">
                        <h2>Acronym Finder</h2>
                        @php
                            $saved_anagrams = auth()->user()->saved_anagrams;
                        @endphp
{{--                        <h6 style="font-size: 12px !important;" id="h6_view_saved_anagrams" {!! count($saved_anagrams) ? '' : 'hidden' !!}>--}}
{{--                            <a href="#" id="anchor_view_saved_anagrams">--}}
{{--                                <i class="fas fa-floppy-disk"></i>--}}
{{--                                View saved anagrams--}}
{{--                            </a>--}}
{{--                        </h6>--}}
                        {{--                        <form> --}}
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="input_acronym"
                                    placeholder="Enter acronym" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <button id="btn_search_acronym" class="btn form-btn full-width" type="submit"
                                    style="width: 100% !important;">Search acronym</button>
                            </div>
                        </div>

                        {{--                        </form> --}}

                        <div class="anagrams-text mt-4" id="result_wrapper" hidden>
                            <h4 id="h4_result" class="pb-2">Anagrams of "asaas"</h4>

                            <div class="anagrame_data">
                                <div class="row" id="row_result">
                                    {{-- <div class="col-3">
                                        <div class="box-main">
                                            <div class="click-box">
                                                <div class="data_show">
                                                    <p>silent</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="open-box">
                                            <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                            <a href="#" class="btn custom-btn">Action 1</a>
                                            <a href="#" class="btn custom-btn">Action 2</a>
                                            <a href="#" class="btn custom-btn">Action 3</a>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box-main">
                                            <div class="click-box">
                                                <div class="data_show">
                                                    <p>tinsel</p>
                                                </div>
                                            </div>
                                            <div class="open-box">
                                                <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                                <a href="#" class="btn custom-btn">Action 1</a>
                                                <a href="#" class="btn custom-btn">Action 2</a>
                                                <a href="#" class="btn custom-btn">Action 3</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box-main">
                                            <div class="click-box">
                                                <div class="data_show">
                                                    <p>enlist</p>
                                                </div>
                                            </div>
                                            <div class="open-box">
                                                <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                                <a href="#" class="btn custom-btn">Action 1</a>
                                                <a href="#" class="btn custom-btn">Action 2</a>
                                                <a href="#" class="btn custom-btn">Action 3</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box-main">
                                            <div class="click-box">
                                                <div class="data_show">
                                                    <p>listen</p>
                                                </div>
                                            </div>
                                            <div class="open-box">
                                                <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                                <a href="#" class="btn custom-btn">Action 1</a>
                                                <a href="#" class="btn custom-btn">Action 2</a>
                                                <a href="#" class="btn custom-btn">Action 3</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="box-main">
                                            <div class="click-box">
                                                <div class="data_show">
                                                    <p>silent</p>
                                                </div>
                                            </div>
                                            <div class="open-box">
                                                <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                                <a href="#" class="btn custom-btn">Action 1</a>
                                                <a href="#" class="btn custom-btn">Action 2</a>
                                                <a href="#" class="btn custom-btn">Action 3</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">

                    <div class="form-row mt-4" id="error_wrapper" hidden>
                        <div class="col-md-12 text-center">
                            <h6>No matches found.</h6>
                        </div>
                    </div>

                    <div class="form-row mt-4" id="table_wrapper" hidden>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="font-size: 14px;">
                                <thead>
                                <tr>
                                    <th>Term</th>
                                    <th>Definition</th>
                                    <th>Category</th>
                                    <th>Parent Category</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-1 -->

    <div class="modal fade" id="modal_saved_anagrams" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <i class="fas fa-floppy-disk"></i>
                        Saved anagrams
                    </h5>
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Anagram</th>
                                <th>Original word</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_saved_anagrams">
                            @foreach($saved_anagrams as $saved_anagram)
                                <tr>
                                    <td>{{$saved_anagram->anagram}}</td>
                                    <td>{{$saved_anagram->source_word}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function save_anagram(anagram, source_word) {
            let auth_check = "{{auth()->check()}}";
            if (auth_check !== "1") {
                toastr.error('You need to log in to proceed.');
                return false;
            }

            $.ajax({
                url: '{{route("save.anagram")}}',
                method: 'POST',
                data: {
                    "_token": '{{csrf_token()}}',
                    "anagram": anagram,
                    "source_word": source_word
                },
                success: (data) => {
                    if (!data.success) {
                        toastr.error(data.message);
                        return false;
                    }

                    $('#h6_view_saved_anagrams').prop('hidden', false);

                    //your code here
                    $('#tbody_saved_anagrams').append(`<tr>
                                                            <td>`+anagram+`</td>
                                                            <td>`+source_word+`</td>
                                                        </tr>`);

                    toastr.success(data.message);

                    return true;
                },
                error: (error) => {
                    toastr.error(error);
                    return false;
                },
            });
        }
    </script>
    <script>
        $('#btn_search_acronym').on('click', function() {
            let val = $('#input_acronym').val();

            if (!val) {
                return false;
            }



            $('#error_wrapper').prop('hidden', true);
            $('#table_wrapper').prop('hidden', true);
            $('#tbody').html('');

            $.ajax({
                url: "{{route('search.acronyms')}}",
                data: {
                    _token: '{{csrf_token()}}',
                    term: val
                },
                method: 'POST',
                success: (data) => {
                    data = JSON.parse(data);
                    if (data && data.result && data.result.length > 0) {
                        for (const item of data.result) {
                            $('#tbody').append(`<tr>
                                                    <td>`+item.term+`</td>
                                                    <td>`+item.definition+`</td>
                                                    <td>`+item.categoryname+`</td>
                                                    <td>`+item.parentcategoryname+`</td>
                                                </tr>`);
                            $('#table_wrapper').prop('hidden', false);
                        }
                    } else {
                        $('#error_wrapper').prop('hidden', false);
                    }
                },
            })
        });
    </script>
@endsection