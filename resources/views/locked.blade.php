@extends('layouts.app')

@section('title', $title)

@section('css')
    <style>

    </style>
@endsection

@section('content')
<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-section-text text-center">
                    <h2 class="heading-2">{{ $title }} </h2>
                    <p class="membership-action-required membership">This tool is only available to paid members. Please purchase a <a href="{{ route('memberships') }}">membership</a> to access this tool!</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script type="text/javascript">
    </script>
@endsection
