@extends('layouts.app')

@section('title', 'Holidays')

@section('content')

    <section class="holiday-calendar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-holiday">
                        <table class="top-holiday-calender">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="javascript:;">Sep</a>
                                    </th>
                                    <th>
                                        <h2> October Holidays</h2>
                                    </th>
                                    <th>
                                        <a href="javascript:;">Nov</a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="mid-number">
                                    <td>
                                        <a href="javascript:;"> <span>1</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>2</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>3</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>4</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>5</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>6</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>7</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>8</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>9</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>10</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>11</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>12</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>13</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>14</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>15</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>16</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span class="active">17</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>18</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>19</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>20</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>21</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>22</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>23</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>24</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>25</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>26</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>27</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>28</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>29</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>30</span></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"> <span>31</span></a>
                                    </td>
                                </tr>
                                <tr class="last-row">
                                    <td>
                                        <h5> Date</h5>
                                    </td>
                                    <td>
                                        <h5> Holiday</h5>
                                    </td>
                                    <td>
                                        <h5> Category </h5>
                                    </td>
                                    <td>
                                        <h5> Tags
                                        </h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-holiday">
                        <table class="data-show-event">
                            <thead>
                                <tr class="data-row">
                                    <th>
                                        <a href="javascript:;">
                                            <h3>Oct 1</h3>
                                        </a>
                                    </th>
                                    <th>
                                        <h3>Tuesday
                                        </h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="date-data">
                                    <td>
                                        <a href="javascript:;">
                                            <img src="{{ asset('images/holiday-calendar/calender-1.webp') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <h5>Ancestors' Day</h5>
                                        </a>
                                    </td>
                                    <td class="circle-dot cultural">
                                        <a href="javascript:;">
                                            <h6> Cultural</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <p> Cultural Holidays </p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Ethnic</p>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="date-data">
                                    <td>
                                        <a href="javascript:;">
                                            <img src="{{ asset('images/holiday-calendar/calender-2.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <h5>Balloons Around the World Day</h5>
                                        </a>
                                    </td>
                                    <td class="circle-dot interest">
                                        <a href="javascript:;">
                                            <h6> Special Interest</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <p> Activities </p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Fun</p>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="date-data">
                                    <td>
                                        <a href="javascript:;">
                                            <img src="{{ asset('images/holiday-calendar/calender-3.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <h5>CD Player Day</h5>
                                        </a>
                                    </td>
                                    <td class="circle-dot arts">
                                        <a href="javascript:;">
                                            <h6> Arts & Entertainment</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <p> Music </p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Technology</p>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="date-data">
                                    <td>
                                        <a href="javascript:;">
                                            <img src="{{ asset('images/holiday-calendar/calender-4.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <h5>China National Day</h5>
                                        </a>
                                    </td>
                                    <td class="circle-dot cultural">
                                        <a href="javascript:;">
                                            <h6> Cultural</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <p> Civic </p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Festivities</p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Historical</p>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="data-show-event">
                            <thead>
                                <tr class="data-row">
                                    <th>
                                        <a href="javascript:;">
                                            <h3>Oct 2</h3>
                                        </a>
                                    </th>
                                    <th>
                                        <h3>Wednesday
                                        </h3>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="date-data">
                                    <td>
                                        <a href="javascript:;">
                                            <img src="{{ asset('images/holiday-calendar/calender-2.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <h5>Balloons Around the World Day</h5>
                                        </a>
                                    </td>
                                    <td class="circle-dot interest">
                                        <a href="javascript:;">
                                            <h6> Special Interest</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <p> Activities </p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Fun</p>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="date-data">
                                    <td>
                                        <a href="javascript:;">
                                            <img src="{{ asset('images/holiday-calendar/calender-3.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <h5>CD Player Day</h5>
                                        </a>
                                    </td>
                                    <td class="circle-dot arts">
                                        <a href="javascript:;">
                                            <h6> Arts & Entertainment</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <p> Music </p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Technology</p>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="date-data">
                                    <td>
                                        <a href="javascript:;">
                                            <img src="{{ asset('images/holiday-calendar/calender-4.jpg') }}"
                                                class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <h5>China National Day</h5>
                                        </a>
                                    </td>
                                    <td class="circle-dot cultural">
                                        <a href="javascript:;">
                                            <h6> Cultural</h6>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:;">
                                            <p> Civic </p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Festivities</p>
                                        </a>
                                        <span>,</span>
                                        <a href="javascript:;">
                                            <p> Historical</p>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
