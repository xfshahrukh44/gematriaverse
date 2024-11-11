@section('title', 'Register')
@extends('layouts.app')
@section('css')
    <style>
        .main-otp form {
            margin: auto;
            width: 50%;
        }

        .otp-table {
            padding: 100px 0;
        }

        .main-otp h1 {
            color: black;
            font-size: 30px;
            margin-bottom: 18px;
            font-weight: 700;
        }

        .main-otp input#otp {
            height: 55px;
            border: 2px solid black;
            font-size: 20px;
            font-weight: 700;
            color: black;
        }

        .main-otp .custom-btn {
            font-size: 20px;
            font-weight: 700;
            text-transform: uppercase;
            padding: 8px 20px;
        }
    </style>
@endsection


@section('content')
    @include('layouts.front.css')

    <section class="otp-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-otp">
                        <form method="POST" action="{{ route('verifyOtp') }}">
                            @csrf
                            <h1>One Time Password</h1>
                            <div class="form-group">
                                <input type="number" class="form-control" name="otp" id="otp"required>
                                @if ($errors->has('otp'))
                                    <small
                                        class="alert alert-danger w-100 d-block p-2 mt-2">{{ $errors->first('otp') }}</small>
                                @endif
                            </div>
                            <button class="btn custom-btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
