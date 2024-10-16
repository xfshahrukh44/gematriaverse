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
            border-radius: 10px;
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

                        {{--                        </form> --}}

                        <div class="anagrams-text mt-4" id="result_wrapper" hidden>
                            <h4 id="h4_result">Anagrams of "asaas"</h4>

                            <ul class="pb-4" id="ul_result">
                                {{--                                <li>AS Asa</li> --}}
                                {{--                                <li>AS SAA</li> --}}
                                {{--                                <li>Asa as</li> --}}
                                {{--                                <li>Asa sa</li> --}}
                                {{--                                <li>aa ass</li> --}}
                                {{--                                <li>as SAA</li> --}}
                                {{--                                <li>SAA sa</li> --}}
                            </ul>
                            <div class="anagrame_data">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="data_show">
                                                <p>silent</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="data_show">
                                                <p>tinsel</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="data_show">
                                                <p>enlist
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="data_show">
                                                <p>listen</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="#">
                                            <div class="data_show">
                                                <p>silent</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section-1 -->
@endsection

@section('js')
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
    </script>
    <script>
        $('#btn_calculate_anagrams').on('click', function() {
            let string = $('#input_anagram_query').val();
            if (string === '') {
                return false;
            }

            $('#h4_result').html(`Anagrams of "` + string + `"`);

            let max_anagrams = $('#input_max_anagrams').val();
            let min_length = $('#input_min_length').val();
            let max_length = $('#input_max_length').val();

            let spaceless_string = string.replaceAll(' ', '');

            if (!dictionary_words.length) {
                alert('Dictionary not loaded yet.');
                return;
            }

            let anagrams = dictionary_words.filter(word => {
                let spaceless_word = word.replaceAll(' ', '');
                return areAnagrams(spaceless_string, spaceless_word);
            });

            //problem: this always returns empty array
            console.log(anagrams);


            if (max_anagrams && max_anagrams < anagrams.length) {
                anagrams = anagrams.slice(0, max_anagrams);
            }

            if (min_length) {
                anagrams = anagrams.filter((item) => item.length >= min_length);
            }

            if (max_length) {
                anagrams = anagrams.filter((item) => item.length <= max_length);
            }

            $('#ul_result').html('');
            if (anagrams.length > 0) {
                for (const item of anagrams) {
                    $('#ul_result').append('<li>' + item + '</li>');
                }

                $('#result_wrapper').prop('hidden', false);

                return true;
            } else {
                $('#result_wrapper').prop('hidden', false);
                $('#h4_result').html(`No anagrams of "` + string + `" found.`);

                return false;
            }
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

            $('#ul_result').html('');
            if (possibleWords.length > 0) {
                for (const item of possibleWords) {
                    $('#ul_result').append('<li>' + item + '</li>');
                }

                $('#result_wrapper').prop('hidden', false);

                return true;
            } else {
                $('#result_wrapper').prop('hidden', false);
                $('#h4_result').html(`No words of "` + string + `" found.`);

                return false;
            }
        });
    </script>
@endsection
