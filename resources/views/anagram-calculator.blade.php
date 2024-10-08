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
    .gematriaverse-section-from .form-btn{
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
    .gematriaverse-section-from .form-btn.full-width{
        width: 48%;
        margin-top: 30px;
    }
    .gematriaverse-section-from  .btn:not(:disabled):not(.disabled).active{
        color: black !important;
    }
    .gematriaverse-section-from  .btn:not(:disabled):not(.disabled):active{
        color: black !important;
    }
    .max-number{
        padding: 10px 0;
    }
    .gematriaverse-section-from .form-control{
        padding: 10px 20px;
        margin-bottom: 20px;
    }
    .gematriaverse-section-from  .input-group .form-control{
        margin-bottom: 0;
    }
    .gematriaverse-section-from  select.form-control:not([size]):not([multiple]){
        height: auto;
    }
    /* gematriaverse-section-from */
</style>
@endsection

@section('content')
    <!-- section-1 -->
    <section class="gematriaverse-section" style="height: 60vh !important;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 py-5">
                    <div class="gematriaverse-section-from">
                        <h2>Anagram Generator</h2>
{{--                        <form>--}}
                            <div class="form-row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="input_anagram_query" placeholder="Text" required>
                                </div>
                                <div class="max-number">
                                    <a class="form-btn collapsed" data-toggle="collapse" href="#multiCollapseExample1"
                                       role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
                                        <i class="fas fa-chevron-right"></i>  Options</a>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                <div class="row card card-body">

                                                    <div class="col-md-12 p-0">
                                                        <label for="validationDefault02">Max number of anagrams</label>
                                                        <input type="number" class="form-control"
                                                               id="input_max_anagrams" placeholder="" value="10000"
                                                               aria-describedby="inputGroupPrepend2" required>
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
                                                            <input type="number" class="form-control"
                                                                   id="input_min_length" placeholder=""
                                                                   aria-describedby="inputGroupPrepend2" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                            <span class="input-group-text"
                                                                  id="inputGroupPrepend2">Max</span>
                                                            </div>
                                                            <input type="number" class="form-control"
                                                                   id="input_max_length" placeholder=""
                                                                   aria-describedby="inputGroupPrepend2" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <button id="btn_calculate_anagrams" class="btn form-btn full-width" type="submit" style="width: 100% !important;">Anagrams</button>
                                </div>
{{--                                <button class="btn form-btn full-width" type="submit">Words</button>--}}
                            </div>

{{--                        </form>--}}

                        <div class="anagrams-text mt-4" id="result_wrapper" hidden>
                            <h4 id="h4_result">Anagrams of "asaas"</h4>

                            <ul class="pb-4" id="ul_result">
{{--                                <li>AS Asa</li>--}}
{{--                                <li>AS SAA</li>--}}
{{--                                <li>Asa as</li>--}}
{{--                                <li>Asa sa</li>--}}
{{--                                <li>aa ass</li>--}}
{{--                                <li>as SAA</li>--}}
{{--                                <li>SAA sa</li>--}}
                            </ul>
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
        $('#btn_calculate_anagrams').on('click', function () {
            let string = $('#input_anagram_query').val();
            if (string === '') {
                return false;
            }

            $('#h4_result').html(`Anagrams of "`+string+`"`);

            let max_anagrams = $('#input_max_anagrams').val();
            let min_length = $('#input_min_length').val();
            let max_length = $('#input_max_length').val();

            $.ajax({
                url: '{{route("get-anagrams")}}',
                method: 'GET',
                data: {
                    string: string.replaceAll(' ', '')
                },
                success: (data) => {
                    data = JSON.parse(data).all;

                    $('#ul_result').html('');

                    //max number of anagrams
                    if (max_anagrams && max_anagrams < data.length) {
                        data.length = max_anagrams;
                    }

                    if (min_length) {
                        data = data.filter((item) => item.length >= min_length);
                    }

                    if (max_length) {
                        data = data.filter((item) => item.length <= max_length);
                    }

                    for (const item of data) {
                        $('#ul_result').append('<li>'+item+'</li>');
                    }


                    $('#result_wrapper').prop('hidden', false);

                    return true;
                },
                error: (error) => {
                    $('#result_wrapper').prop('hidden', true);

                    return false;
                },
            });

            $('#result_wrapper').prop('hidden', true);

            return false;
        });
    </script>
@endsection


