@section('title', 'Register')
@extends('layouts.app')
@section('css')
    <style>
    </style>
@endsection


@section('content')
    @include('layouts.front.css')




    <section class="heading-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-headings">
                        <h2> USER ACCOUNT SECTION </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="account">
        <div class="container" id="from-wrapper">

            <br><br><br><br>

            <div class="row">

                <div class="col-md-6">

                    <div class="form-container sign-up-container">
                        <form method="POST" action="{{ route('register') }}" id="order-place">
                            @csrf
                            <h1>Sign Up</h1>
                            <div class="form-group">
                                <label>Username*</label>
                                <input type="text"
                                    class="form-control {{ $errors->registerForm->has('name') ? ' is-invalid' : '' }}"
                                    name="name" id="name"required>
                                @if ($errors->registerForm->has('name'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->registerForm->first('name') }}</small>
                                @endif
                            </div>



                            <div class="form-group">
                                <label>Email Address*</label>
                                <input type="email"
                                    class="form-control {{ $errors->registerForm->has('email') ? ' is-invalid' : '' }}"
                                    name="email" id="signup-email" required>
                                @if ($errors->registerForm->has('email'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->first('email') }}</small>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password"
                                    class="form-control {{ $errors->registerForm->has('password') ? ' is-invalid' : '' }}"
                                    name="password" id="signup-password" autocomplete="new-password" required>
                                @if ($errors->registerForm->has('password'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->first('password') }}</small>
                                @endif
                            </div>
                            @if($plan)
                                <input type="hidden" name="plan" id="plan" value="{{ $plan }}">
                                <input type="hidden" name="price" id="price" value="{{ $price ?? 0 }}">
                                <div class="card form-group">
                                    <div class="card-body">
                                    <div class="stripe-form-wrapper require-validation" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" data-cc-on-file="false">
                                        <div id="card-element"></div>
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    </div>
                                </div>
                                <button class="btn custom-btn" type="submit" id="stripe-submit">Sign Up ${{ $price ?? 0 }}</button>
                            @else
                                <input type="hidden" name="plan" id="plan" value="free">
                                <button class="btn custom-btn" type="submit">Sign Up</button>
                            @endif

                        </form>
                    </div>


                </div>

                <div class="col-md-6">

                    <div class="form-container sign-in-container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h1>Login</h1>
                            <div class="form-group">
                                <label>Username or email address*</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password*</label>
                                <input type="password"
                                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password">
                                @if ($errors->has('password'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                            <button class="btn custom-btn" type="submit">Login</button>
                            <div class="form-group mt-2">
                                <a href="{{route('forgot.password')}}">Forgot your password?</a>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <br><br><br><br>

        </div>
    </section>
@endsection

@section('js')
@if($plan)
    <script src="https://js.stripe.com/v3/"></script>
    <script>

        $('.bttn').on('change', function() {
            var count = 0;
            if($(this).prop("checked") == true){
            if($('#name').val()== "") {
                $('.name').text('first name is required field');
            } else {
                $('.name').text("");
                count++;
            }

            if(count == 2) {
                // $('#paypal-button-container-popup').show();
            } else {
                $(this).prop("checked",false);

                $.toast({
                    heading: 'Alert!',
                    position: 'bottom-right',
                    text:  'Please fill the required fields before proceeding to pay',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 5000,
                    stack: 6
                });

                return false;

            }

            } else {
            // $('#paypal-button-container-popup').hide();
            // $('.btn').show();
            }

            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
            //$(this).siblings('input[type="checkbox"]').prop('checked', false);
        });

        var stripe = Stripe('{{ env("STRIPE_KEY") }}');

        // Create an instance of Elements.
        var elements = stripe.elements();
        var style = {
            base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
            },
            invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {style: style});
        card.mount('#card-element');

        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
            $(displayError).show();
            displayError.textContent = event.error.message;
            } else {
            $(displayError).hide();
            displayError.textContent = '';
            }
        });

        var form = document.getElementById('order-place');

        $('#stripe-submit').click(function(){
            stripe.createToken(card).then(function(result) {
            var errorCount = checkEmptyFileds();
            if ((result.error) || (errorCount == 1)) {
                // Inform the user if there was an error.
                if(result.error){
                var errorElement = document.getElementById('card-errors');
                $(errorElement).show();
                errorElement.textContent = result.error.message;
                }else{
                $.toast({
                    heading: 'Alert!',
                    position: 'bottom-right',
                    text:  'Please fill the required fields before proceeding to pay',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 5000,
                    stack: 6
                });
                }
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
            });
        });

        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('order-place');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }


        function checkEmptyFileds(){
            var errorCount = 0;
            $('form#order-place').find('.form-control').each(function(){
            if($(this).prop('required')){
                if( !$(this).val() ) {
                $(this).parent().find('.invalid-feedback').addClass('d-block');
                $(this).parent().find('.invalid-feedback strong').html('Field is Required');
                errorCount = 1;
                }
            }
            });
            return errorCount;
        }
    </script>
@endif
@endsection
