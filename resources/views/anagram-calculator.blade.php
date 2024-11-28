@extends('layouts.app')

@section('title', 'Anagram generator')

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

        .loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .main-loder-flex .loder-inner {
            display: flex;
            justify-content: center;
            margin-top: 30px;
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
                        <h2>Anagram Generator</h2>
                        @if ($save_to_database)
                            @php
                                $saved_anagrams = auth()->user()->saved_anagrams ?? [];
                            @endphp
                            <h6 style="font-size: 12px !important;" id="h6_view_saved_anagrams" {!! count($saved_anagrams) ? '' : 'hidden' !!}>
                                <a href="#" id="anchor_view_saved_anagrams">
                                    <i class="fas fa-floppy-disk"></i>
                                    View saved anagrams
                                </a>
                            </h6>
                        @endif
                        {{--                        <form> --}}
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="input_anagram_query"
                                    placeholder="Enter word or phrase" required>
                            </div>
                            <div class="max-number">
                                <a class="form-btn collapsed" data-toggle="collapse" href="#multiCollapseExample1"
                                    role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                    <i class="fas fa-chevron-right"></i> Options</a>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="row card card-body">

                                                <div class="col-md-12 p-0">
                                                    <label for="validationDefault02">Max number of anagrams</label>
                                                    <input type="number" class="form-control" id="input_max_anagrams"
                                                        placeholder="" value="10000" aria-describedby="inputGroupPrepend2"
                                                        required>
                                                </div>
                                                <div class="col-md-12 p-0">
                                                    <label for="validationDefault02">Number of words in anagrams</label>
                                                </div>
                                                <div class="col-md-6 pl-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                id="inputGroupPrepend2">Min</span>
                                                        </div>
                                                        <input type="number" class="form-control" id="input_min_length"
                                                            placeholder="" aria-describedby="inputGroupPrepend2" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pr-0">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                id="inputGroupPrepend2">Max</span>
                                                        </div>
                                                        <input type="number" class="form-control" id="input_max_length"
                                                            placeholder="" aria-describedby="inputGroupPrepend2" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <button id="btn_calculate_anagrams" class="btn form-btn full-width" type="submit"
                                    style="width: 100% !important;">Anagrams</button>
                            </div>
                            <div class="col-md-6">
                                <button id="btn_calculate_words" class="btn form-btn full-width" type="submit"
                                    style="width: 100% !important;">Words</button>
                            </div>
                            {{--                                <button class="btn form-btn full-width" type="submit">Words</button> --}}
                        </div>

                        <div class="form-row main-loder-flex" id="data-load" hidden>
                            <div class="col-md-12 loder-inner">
                                <div class="loader"></div>
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
            </div>
        </div>
    </section>
    <!-- section-1 -->

    <div class="modal fade" id="modal_saved_anagrams" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <i class="fas fa-floppy-disk"></i>
                        Saved anagrams
                    </h5>
                    {{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> --}}
                    {{--                        <span aria-hidden="true">&times;</span> --}}
                    {{--                    </button> --}}
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
                            @foreach ($saved_anagrams as $saved_anagram)
                                <tr>
                                    <td>{{ $saved_anagram->anagram }}</td>
                                    <td>{{ $saved_anagram->source_word }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{--                <div class="modal-footer"> --}}
                {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                {{--                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                {{--                </div> --}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        trackTimeSpent('anagram_calculator', "{{ route('log.time.spent') }}", "{{ csrf_token() }}");
    </script>
    <script>
        let dictionary_words = [];
        fetch('{{ url('/english-dictionary-words.json') }}')
            .then(res => res.json())
            .then((data) => {
                dictionary_words = data.words;
            });

        function areAnagrams(str1, str2) {
            return str1.toLowerCase().split('').sort().join('') === str2.toLowerCase().split('').sort().join('');
        }

        function canFormWord(word, availableLetters) {
            let letterCount = availableLetters.split('').reduce((count, letter) => {
                count[letter] = (count[letter] || 0) + 1;
                return count;
            }, {});

            for (let char of word) {
                if (!letterCount[char]) return false;
                letterCount[char]--;
            }
            return true;
        }

        function save_anagram(anagram, source_word) {
            let auth_check = "{{ auth()->check() }}";
            if (auth_check !== "1") {
                toastr.error('You need to log in to proceed.');
                return false;
            }

            $.ajax({
                url: '{{ route('save.anagram') }}',
                method: 'POST',
                data: {
                    "_token": '{{ csrf_token() }}',
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
                                                            <td>` + anagram + `</td>
                                                            <td>` + source_word + `</td>
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
        $('#btn_calculate_anagrams').on('click', function() {
            let string = $('#input_anagram_query').val();
            if (string === '') {
                return false;
            }
            $("#btn_calculate_anagrams").prop('disabled', true);
            $("#data-load").prop('hidden', false);

            $('#h4_result').prop('hidden', true);
            $('#row_result').html('');
            // $('#h4_result').html(`Anagrams of "` + string + `"`);

            let max_anagrams = $('#input_max_anagrams').val();
            let min_length = $('#input_min_length').val();
            let max_length = $('#input_max_length').val();

            let spaceless_string = string.replaceAll(' ', '');

            // if (!dictionary_words.length) {
            //     alert('Dictionary not loaded yet.');
            //     return;
            // }
            //
            // let anagrams = dictionary_words.filter(word => {
            //     let spaceless_word = word.replaceAll(' ', '');
            //     return areAnagrams(spaceless_string, spaceless_word);
            // });

            let anagrams = [];
            $.ajax({
                url: "{{ route('search.anagrams') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    term: string
                },
                method: 'POST',
                success: (data) => {
                    $("#btn_calculate_anagrams").prop('disabled', false);
                    $("#data-load").prop('hidden', true);
                    data = JSON.parse(data);
                    // if (!data || !data.result || data.result.length == 0) {
                    //     $('#h4_result').html(`No anagrams of "` + string + `" found.`);
                    //     $('#h4_result').prop('hidden', false);
                    //     $('#result_wrapper').prop('hidden', false);
                    //
                    //     return false;
                    // }

                    anagrams = data.result ?? [];

                    function generateAnagrams(input, maxAnagrams = 7000) {
                        const results = [];

                        function permute(arr, memo = '') {
                            if (results.length >= maxAnagrams) {
                                return;
                            }
                            if (arr.length === 0) {
                                const result = memo.trim(); // Trim to avoid trailing spaces
                                if (!results.includes(result)) {
                                    results.push(result); // Ensure uniqueness
                                }
                            } else {
                                for (let i = 0; i < arr.length; i++) {
                                    if (i > 0 && arr[i] === arr[i - 1]) {
                                        continue; // Skip duplicates
                                    }

                                    const current = arr.slice();
                                    const next = current.splice(i, 1);

                                    // Randomly decide whether to add a space
                                    const shouldAddSpace = Math.random() < 0.5;

                                    permute(current, memo + next + (shouldAddSpace ? ' ' : ''));
                                }
                            }
                        }

                        permute(input.split(''));

                        // Ensure at least maxAnagrams by filling with random permutations if necessary
                        while (results.length < maxAnagrams) {
                            const randomIndex = Math.floor(Math.random() * results.length);
                            const randomAnagram = results[randomIndex];
                            const newAnagram = randomAnagram.split('').sort(() => Math.random() - 0.5)
                                .join('');
                            results.push(newAnagram);
                        }

                        return results;
                    }

                    function getAnagramsArray(word) {
                        const temp_anagrams = generateAnagrams(word.replace(/\s+/g, '').toLowerCase());
                        return temp_anagrams;
                    }

                    // Example usage
                    const word = string;
                    const random_anagrams = getAnagramsArray(word.replace(/\s+/g, '').toLowerCase());


                    for (const item of random_anagrams) {
                        anagrams.push({
                            anagram: item
                        });
                    }


                    //dont un-comment !!!
                    // let spaceless_string = string.replaceAll(' ', '');
                    // let possibleWords = dictionary_words.filter(word => {
                    //     let spaceless_word = word.replaceAll(' ', ''); // Remove spaces if any
                    //     return canFormWord(spaceless_word, spaceless_string);
                    // });
                    // possibleWords.sort((a, b) => b.length - a.length);
                    //
                    // for (const item of possibleWords) {
                    //     anagrams.push({
                    //         anagram: item
                    //     })
                    // }
                    //
                    // anagrams = [
                    //     ...anagrams,
                    //     ...anagrams,
                    // ]

                    if (max_anagrams && max_anagrams < anagrams.length) {
                        anagrams = anagrams.slice(0, max_anagrams);
                    }

                    if (min_length) {
                        anagrams = anagrams.filter((item) => item.length >= min_length);
                    }

                    if (max_length) {
                        anagrams = anagrams.filter((item) => item.length <= max_length);
                    }

                    if (anagrams.length > 0) {
                        for (const item of anagrams) {
                            $('#row_result').append(`<div class="col-12">
                                            <div class="box-main">
                                                <div class="click-box">
                                                    <div class="data_show">
                                                        <p>` + item.anagram + `</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="open-box">
                                                <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                                <h6>` + item.anagram + `</h6>
                                                <a href="#" class="btn custom-btn" onclick="save_anagram('` + item
                                .anagram + `', '` + string + `')">
                                                    <i class="fas fa-floppy-disk"></i>
                                                    Save anagram
                                                </a>
                                            </div>
                                        </div>`);
                        }

                        $('#result_wrapper').prop('hidden', false);
                        $('#h4_result').prop('hidden', false);
                        $('#h4_result').html(anagrams.length + ` Anagrams of "` + string + `"`);


                        return true;
                    } else {
                        $('#h4_result').html(`No anagrams of "` + string + `" found.`);
                        $('#h4_result').prop('hidden', false);
                        $('#result_wrapper').prop('hidden', false);

                        return false;
                    }
                },
                error: (e) => {
                    $('#h4_result').html(`No anagrams of "` + string + `" found.`);
                    $('#h4_result').prop('hidden', false);
                }
            })
        });

        $('#btn_calculate_words').on('click', function() {
            let string = $('#input_anagram_query').val();
            if (string === '') {
                return false;
            }

            $('#h4_result').html(`Words of "` + string + `"`);

            let max_anagrams = $('#input_max_anagrams').val();
            let min_length = $('#input_min_length').val();
            let max_length = $('#input_max_length').val();

            let spaceless_string = string.replaceAll(' ', '');

            if (!dictionary_words.length) {
                alert('Dictionary not loaded yet.');
                return;
            }

            let possibleWords = dictionary_words.filter(word => {
                let spaceless_word = word.replaceAll(' ', ''); // Remove spaces if any
                return canFormWord(spaceless_word, spaceless_string);
            });

            if (max_anagrams && max_anagrams < possibleWords.length) {
                possibleWords = possibleWords.slice(0, max_anagrams);
            }

            if (min_length) {
                possibleWords = possibleWords.filter(word => word.length >= min_length);
            }

            if (max_length) {
                possibleWords = possibleWords.filter(word => word.length <= max_length);
            }

            possibleWords.sort((a, b) => b.length - a.length);

            console.log(possibleWords);

            $('#row_result').html('');
            if (possibleWords.length > 0) {
                for (const item of possibleWords) {
                    $('#row_result').append(`<div class="col-3">
                                                <div class="box-main">
                                                    <div class="click-box">
                                                        <div class="data_show">
                                                            <p>` + item + `</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`);
                }

                $('#result_wrapper').prop('hidden', false);

                return true;
            } else {
                $('#result_wrapper').prop('hidden', false);
                $('#h4_result').html(`No anagrams of "` + string + `" found.`);

                return false;
            }
        });

        $('#anchor_view_saved_anagrams').on('click', function() {
            $('#modal_saved_anagrams').modal('show');
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle click to show the pop-up
            @if ($save_to_database)
                $('body').on('click', '.click-box', function() {
                    console.log("Clicked!");

                    $('.open-box').each((i, item) => {
                        $(item).fadeOut('slow');
                    });

                    $(this).parent().parent().find('.open-box').fadeIn('fast');
                });

                // Close the pop-up when the close button is clicked
                $('body').on('click', '.close-btn', function() {
                    $(this).closest('.open-box').fadeOut('fast');
                });

                // Close the pop-up if the user clicks outside the modal content
                $(document).mouseup(function(e) {
                    var container = $(".modal-content");
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.closest('.open-box').fadeOut('fast');
                    }
                });
            @endif
        });
    </script>
@endsection
