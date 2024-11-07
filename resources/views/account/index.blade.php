@extends('layouts.app')
@section('title', 'Account')


@section('css')
    <style>
        .my-cart {
            padding-bottom: 50px;
        }

        .banner {
            padding-top: 50px;
            padding-bottom: 30px;
        }

        .myaccount-tab-menu.nav a {
            display: block;
            padding: 20px;
            font-size: 18px;
            align-items: center;
            width: 100%;
            font-weight: bold;
            color: black;
        }

        .myaccount-tab-menu.nav a i {
            padding-right: 10px;
        }

        .myaccount-tab-menu.nav {
            border: 1px solid;
        }

        .myaccount-tab-menu.nav .active,
        .myaccount-tab-menu.nav a:hover {
            background-color: #7fbe00;
            color: white;
        }

        .account-details-form label.required {
            width: 100%;
            font-weight: 500;
            font-size: 18px;
        }

        .account-details-form input {
            border-width: 1px;
            border-color: white;
            border-style: solid;
            padding-left: 15px;
            color: black;
            width: 100%;
            border-radius: 3px;
            background-color: rgb(255, 255, 255);
            height: 52px;
            padding-left: 15px;
            margin-bottom: 30px;
            color: #000000;
            font-size: 15px;
        }

        .account-details-form legend {
            font-family: CottonCandies;
            font-size: 50px;
        }

        .editable {
            position: relative;
        }

        .editable-wrapper {
            position: absolute;
            right: 0px;
            top: -50px;
        }

        .editable-wrapper a {
            background-color: #17a2b8;
            border-radius: 50px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            line-height: 35px;
            color: white;
            margin-left: 10px;
            font-size: 16px;
        }

        .editable-wrapper a.edit {
            background-color: #007bff;
        }
    </style>
@endsection
@section('content')

    <?php $segment = Request::segments(); ?>

    <section class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-wrapper inner-banner-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="section-heading text-center">
                                    <h1>Account</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <main class="my-cart">
        <div class="my-account-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="myaccount-page-wrapper">
                            <div class="row">
                                @include('account.sidebar')
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad">
                                            <div class="myaccount-content">
                                                <div class="section-heading">
                                                    <h2>Dashboard</h2>

                                                    <div class="welcome">

                                                        <p>Hello, <strong>{{ Auth::user()->name }}</strong> (If Not
                                                            <strong>{{ Auth::user()->name }} !</strong><a
                                                                href="{{ url('logout') }}" class="logout"> Logout</a>)
                                                        </p>
                                                    </div>

                                                    <p class="mb-0">From your account dashboard. you can easily check &
                                                        view your recent orders, manage your shipping and billing addresses
                                                        and edit your password and account details.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->

                                    </div>
                                    @if($activityData)
                                        <div class="container my-5 p-0">
                                            <h2>User Activity</h2>

                                            <!-- Usage Overview -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card mb-4">
                                                        <div class="card-header">Feature Usage Summary</div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Feature</th>
                                                                        <th>Time Spent (mins)</th>
                                                                        <th>Usage Count</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($activityData as $activity)
                                                                        <tr>
                                                                            <td>{{ str_replace('_', ' ', $activity->feature_name) }}</td>
                                                                            <td style="font-family: dealerplate-california; font-weight: 600;">{{ $activity->total_time_spent_td }}</td>
                                                                            <td style="font-family: dealerplate-california; font-weight: 600;">{{ $activity->usage_count }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Chart for Time Spent -->
                                                <div class="col-md-6">
                                                    <div class="card mb-4">
                                                        <div class="card-header">Time Spent on Features</div>
                                                        <div class="card-body">
                                                            <canvas id="timeSpentChart"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div> <!-- My Account Tab Content End -->


                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->


        <!-- main content end -->
    </main>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).on('click', ".btn1", function(e) {
            // alert('it works');
            $('.loginForm').submit();
        });

        const featureNames = @json($activityData->pluck('feature_name')).map(name => name.replace(/_/g, ' '));
        const timeSpentData = @json($activityData->pluck('total_time_spent'));

        const data = {
            labels: featureNames,
            datasets: [{
                label: 'Time Spent (mins)',
                data: timeSpentData,
                backgroundColor: [
                    '#007bff', '#28a745', '#ff6347', '#ffcd56', '#4bc0c0',
                    '#6f42c1', '#fd7e14', '#20c997', '#17a2b8', '#6610f2',
                    '#ffc107', '#dc3545', '#343a40', '#e83e8c', '#198754',
                    '#0dcaf0', '#d63384', '#6c757d', '#adb5bd', '#495057',
                    '#ff7f50', '#87ceeb', '#ffa07a', '#32cd32', '#4682b4',
                    '#d2691e', '#ff69b4', '#8a2be2', '#da70d6', '#ff4500'
                ],
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: (tooltipItem) => `${tooltipItem.label}: ${tooltipItem.raw} mins`
                        }
                    }
                }
            }
        };

        // Render Chart
        const timeSpentChart = new Chart(
            document.getElementById('timeSpentChart'),
            config
        );
    </script>
@endsection
