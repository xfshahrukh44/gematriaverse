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
                        <form method="POST" action="{{ route('register') }}">
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
                                    name="password" id="signup-password" required>
                                @if ($errors->registerForm->has('password'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->registerForm->first('password') }}</small>
                                @endif
                            </div>

                            <button class="btn proceed_button3 btn-primary" type="submit">Sign Up</button>

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
                            <button class="btn proceed_button3 btn-primary" type="submit">Login</button>
                        </form>
                    </div>

                </div>

            </div>

            <br><br><br><br>

        </div>
    </section>
@endsection

@section('js')
    <script>
        $("#phone").on("keypress keyup blur", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
    </script>
@endsection
