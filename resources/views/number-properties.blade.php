@extends('layouts.app')

@section('title', 'Number properties')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <section class="table-date-calculator py">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="numPropContainer">
                        <center>
                            <center id="center_number_properties" hidden>
                                <h1 class="white">Number Properties of:</h1>
                                <div id="HTMLSpot">
                                    <table id="TopTable">
                                        <tbody>
                                        <tr>
    {{--                                        <td><a class="RegularLink" href="javascript:void(0)">54</a></td>--}}
                                            <td id="TopNumber"></td>
    {{--                                        <td><a class="RegularLink" href="javascript:void(0)">56</a></td>--}}
                                        </tr>
    {{--                                    <tr>--}}
    {{--                                        <td id="PrimeString" colspan="3">5 × 11</td>--}}
    {{--                                    </tr>--}}
                                        </tbody>
                                    </table>
                                    <div id="">
                                        <table id="SeqTable">
                                            <tbody>
                                            <tr id="td_fibonacci_wrapper" hidden>
                                                <td class="NavSeq"><a class="RegularLink target_action" data-number="" href="#" id="td_fibonacci_prev">Prev</a></td>
                                                <td class="SeqPlace">
                                                    <div class="SeqNum"><b class="Linkable"><a href="javascript:void(0)" id="td_fibonacci"></a></b></div>
                                                </td>
                                                <td class="NavSeq"><a class="RegularLink target_action" data-number="" href="#" id="td_fibonacci_next">Next</a></td>
                                            </tr>
                                            <tr id="td_triangular_wrapper" hidden>
                                                <td class="NavSeq"><a class="RegularLink target_action" data-number="" href="#" id="td_triangular_prev">Prev</a></td>
                                                <td class="SeqPlace">
                                                    <div class="SeqNum"><b class="Linkable"><a href="javascript:void(0)" id="td_triangular"></a></b></div>
                                                </td>
                                                <td class="NavSeq"><a class="RegularLink target_action" data-number="" href="#" id="td_triangular_next">Next</a></td>
                                            </tr>
                                            <tr id="td_sq_pyramidal_wrapper" hidden>
                                                <td class="NavSeq"><a class="RegularLink target_action" data-number="" href="#" id="td_sq_pyramidal_prev">Prev</a></td>
                                                <td class="SeqPlace">
                                                    <div class="SeqNum"><b class="Linkable"><a href="javascript:void(0)" id="td_sq_pyramidal"></a></b></div>
                                                </td>
                                                <td class="NavSeq"><a class="RegularLink target_action" data-number="" href="#" id="td_sq_pyramidal_next">Next</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div id="belowSpecials">
                                            <div id="DivisorTableDiv"><span class="titles">Divisors</span>
                                                <table id="DivisorTable">
                                                    <tbody>
                                                    <tr></tr>
                                                    <tr>
                                                        <td>Count:</td>
                                                        <td>List:</td>
                                                        <td>Sum:</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="vertical-align: top"><b class="Linkable"><a href="javascript:void(0)" id="count" class="target_number"></a></b></td>

                                                        <td id="divisors_list">
    {{--                                                        <b class="Linkable"><a href="javascript:void(0)">1</a></b>,--}}
    {{--                                                        <b class="Linkable"><a href="javascript:void(0)">5</a></b>,--}}
    {{--                                                        <b class="Linkable"><a href="javascript:void(0)">11</a></b>,--}}
    {{--                                                        <b class="Linkable"><a href="javascript:void(0)">55</a></b>--}}
    {{--                                                        <br>--}}
    {{--                                                        <b class="Linkable"><a href="javascript:void(0)">38</a></b>th Composite #--}}
                                                        </td>

                                                        <td style="vertical-align: top"><b class="Linkable"><a href="javascript:void(0)" id="sum" class="target_number"></a></b></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="RelationTableDiv">
                                                <h2 class="white" id="number_with_suffix">55th...</h2>
                                                <table id="RelationTable">
                                                    <tbody>
                                                    <tr>
                                                        <td class="RelativeClass"> Prime #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_prime" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Composite #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_composite" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Fibonacci #: </td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_fibonacci" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Triangular #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_triangular" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Square #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="square" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Cube #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="cube" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Tetrahedral #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_tetrahedral" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Square Pyramidal #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_sq_pyramidal" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Star #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_star" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="RelativeClass"> Pentagonal #: &nbsp;</td>
                                                        <td class="RelativeNum"><b class="Linkable"><a href="javascript:void(0)" id="nth_pentagonal" class="target_number"></a></b></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="mt-2" id="ConversionsTableDiv" style="float: none !important;">
                                                <span class="titles">Conversions</span>
                                                <table id="ConversionTable">
                                                    <tbody>
                                                    <tr>
    {{--                                                    <td>From:</td>--}}
                                                        <td class="conversionMiddle">Numeral system:</td>
                                                        <td>To:</td>
                                                    </tr>
                                                    <tr>
    {{--                                                    <td><b class="Linkable"><a href="javascript:void(0)">45</a></b></td>--}}
                                                        <td>Octal</td>
                                                        <td><b class="Linkable"><a href="javascript:void(0)" id="octal" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
    {{--                                                    <td><b class="Linkable"><a href="javascript:void(0)">65</a></b></td>--}}
                                                        <td>Duodecimal</td>
                                                        <td><b class="Linkable"><a href="javascript:void(0)" id="duodecimal" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
    {{--                                                    <td><b class="Linkable"><a href="javascript:void(0)">85</a></b></td>--}}
                                                        <td>Hexadecimal</td>
                                                        <td><b class="Linkable"><a href="javascript:void(0)" id="hexadecimal" class="target_number"></a></b></td>
                                                    </tr>
                                                    <tr>
    {{--                                                    <td>-</td>--}}
                                                        <td>Binary</td>
                                                        <td><b class="Linkable"><a href="javascript:void(0)" id="binary" class="target_number"></a></b></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <input tabindex="0" id="input_get_properties" autofocus="" type="number" placeholder="Enter #">
                            <br><br>
                            <button tabindex="1" id="btn_get_properties" class="buttonFunction">Get Properties</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function get_divisors(num) {
            let divisors = [];

            for (let i = 1; i <= num; i++) {
                if (num % i === 0) {
                    divisors.push(i);
                }
            }

            return divisors;
        }

        function isPrime(num) {
            if (num < 2) return false;
            for (let i = 2; i <= Math.sqrt(num); i++) {
                if (num % i === 0) {
                    return false;
                }
            }
            return true;
        }

        function getNumberSuffix(n) {
            let lastDigit = n % 10;
            let lastTwoDigits = n % 100;

            if (lastTwoDigits >= 11 && lastTwoDigits <= 13) {
                return `${n}th`;
            }

            switch (lastDigit) {
                case 1:
                    return `${n}st`;
                case 2:
                    return `${n}nd`;
                case 3:
                    return `${n}rd`;
                default:
                    return `${n}th`;
            }
        }

        function getCompositePosition(num) {
            let count = 0;  // Counter for composite numbers
            let current = 4;  // Start from 4 because 4 is the first composite number

            while (current <= num) {
                if (!isPrime(current)) {
                    count++; // Increment the composite count
                }
                current++;
            }

            if (isPrime(num)) {
                return '';
            }

            return `${getNumberSuffix(count)} composite.`;
        }

        function nthPrime(n) {
            let count = 0; // Count of prime numbers found
            let num = 1; // Starting number to check for primes

            while (count < n) {
                num++;
                if (isPrime(num)) {
                    count++;
                }
            }

            return num; // The n-th prime number
        }

        function isComposite(num) {
            if (num <= 1) return false; // 0 and 1 are not composite numbers
            let isPrime = true;

            for (let i = 2; i <= Math.sqrt(num); i++) {
                if (num % i === 0) {
                    isPrime = false; // It is not a prime number
                    break;
                }
            }

            return !isPrime; // Return true if it's composite (not prime)
        }

        function nthComposite(n) {
            let count = 0; // Count of composite numbers found
            let num = 1; // Starting number to check for composites

            while (count < n) {
                num++;
                if (isComposite(num)) {
                    count++;
                }
            }

            return num; // The n-th composite number
        }

        function fibonacci(n) {
            if (n <= 0) return 0; // Return 0 for n = 0
            if (n === 1) return 1; // Return 1 for n = 1

            let a = 0; // First Fibonacci number
            let b = 1; // Second Fibonacci number
            let fib = 1; // Variable to store the current Fibonacci number

            for (let i = 2; i <= n; i++) {
                fib = a + b; // Calculate the next Fibonacci number
                a = b; // Move to the next pair
                b = fib;
            }

            return fib; // Return the n-th Fibonacci number
        }

        function triangular(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (n + 1)) / 2; // Calculate the n-th triangular number
        }

        function tetrahedral(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (n + 1) * (n + 2)) / 6; // Calculate the n-th tetrahedral number
        }

        function squarePyramidal(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (n + 1) * (2 * n + 1)) / 6; // Calculate the n-th square pyramidal number
        }

        function starNumber(n) {
            if (n <= 0) return 1; // Return 1 for n = 0 or negative, as the 0th star number is 1

            return 6 * n * (n - 1) + 1; // Calculate the n-th star number
        }

        function pentagonal(n) {
            if (n <= 0) return 0; // Return 0 for n = 0 or negative

            return (n * (3 * n - 1)) / 2; // Calculate the n-th pentagonal number
        }

        function convertNumeralSystems(n) {
            // Ensure the input is a number
            if (typeof n !== 'number' || n < 0) {
                throw new Error('Input must be a non-negative number.');
            }

            // Conversions
            const conversions = {
                octal: n.toString(8),           // Octal
                duodecimal: n.toString(12),     // Duodecimal
                hexadecimal: n.toString(16),     // Hexadecimal
                binary: n.toString(2)            // Binary
            };

            return conversions;
        }

        function isFibonacci(n) {
            // Helper function to check if a number is a perfect square
            function isPerfectSquare(x) {
                let s = Math.sqrt(x);
                return (s * s === x);
            }

            // Check if n is a Fibonacci number using the property:
            // A number is Fibonacci if and only if one or both of (5*n^2 + 4) or (5*n^2 - 4) is a perfect square.
            function isFibonacciNumber(n) {
                return isPerfectSquare(5 * n * n + 4) || isPerfectSquare(5 * n * n - 4);
            }

            // Generate Fibonacci series until we find n or surpass it
            let fibs = [0, 1];
            let index = 2;

            while (fibs[index - 1] < n) {
                fibs.push(fibs[index - 1] + fibs[index - 2]);
                index++;
            }

            if (fibs.includes(n)) {
                // let position = fibs.indexOf(n) + 1; // 1-based index
                let position = fibs.indexOf(n); // 1-based index
                let previous = fibs[position - 2] || null; // If exists
                let next = fibs[position] || null; // If exists

                return {
                    string: `${getNumberSuffix(position)} Fibonacci!`,
                    previous,
                    next
                };
            } else {
                return {
                    string: ``,
                    previous: ``,
                    next: ``
                };
            }
        }

        function isTriangular(n) {
            // Helper function to check if a number is triangular
            // The n-th triangular number T_n = n * (n + 1) / 2
            // Solving for n, we get: n = (-1 + sqrt(1 + 8 * T)) / 2 (this gives us a valid triangular number)
            function getTriangularPosition(n) {
                let discriminant = 1 + 8 * n;
                let sqrtDisc = Math.sqrt(discriminant);

                if (sqrtDisc % 1 === 0) {
                    let position = (-1 + sqrtDisc) / 2;
                    return Number.isInteger(position) ? position : null;
                }
                return null;
            }

            // Generate triangular numbers and check if n is part of it
            let position = getTriangularPosition(n);

            if (position) {
                position = Math.floor(position);
                let prevPosition = position - 1;
                let nextPosition = position + 1;

                // Previous triangular number formula
                let previous = prevPosition > 0 ? (prevPosition * (prevPosition + 1)) / 2 : null;
                // Next triangular number formula
                let next = (nextPosition * (nextPosition + 1)) / 2;

                return {
                    string: `${getNumberSuffix(position)} Triangular!`,
                    previous,
                    next
                };
            } else {
                return {
                    string: ``,
                    previous: ``,
                    next: ``
                };
            }
        }

        function isSquarePyramidal(n) {
            // Generate Square Pyramidal series until we find n or surpass it
            let pyramidalNumbers = [];
            let index = 1;

            // Formula for the n-th Square Pyramidal number
            function squarePyramidalNumber(index) {
                return (index * (index + 1) * (2 * index + 1)) / 6;
            }

            // Generate pyramidal numbers until the series surpasses 'n'
            let currentPyramidal = squarePyramidalNumber(index);
            while (currentPyramidal <= n) {
                pyramidalNumbers.push(currentPyramidal);
                index++;
                currentPyramidal = squarePyramidalNumber(index);
            }

            // Check if 'n' is in the pyramidal series
            if (pyramidalNumbers.includes(n)) {
                let position = pyramidalNumbers.indexOf(n) + 1; // 1-based index
                let previous = pyramidalNumbers[position - 2] || null; // If exists
                let next = currentPyramidal; // The next pyramidal number (since loop has already incremented it)

                return {
                    string: `${getNumberSuffix(position)} Square Pyramidal!`,
                    previous,
                    next
                };
            } else {
                return {
                    string: ``,
                    previous: ``,
                    next: ``
                };
            }
        }

        function number_properties (number) {
            if (number == '') {
                return false;
            }

            number = parseInt(number);

            if (number == 0) {
                $('#center_number_properties').prop('hidden', true);
                return false;
            }

            let divisors = get_divisors(number);

            let return_body = {
                fibonacci_res: isFibonacci(number),
                triangular_res: isTriangular(number),
                sq_pyramidal_res: isSquarePyramidal(number),
                divisors: divisors,
                count: divisors.length,
                sum: divisors.reduce((acc, current) => acc + current, 0),
                composite: getCompositePosition(number),
                nth_prime: nthPrime(number),
                nth_composite: nthComposite(number),
                nth_fibonacci: fibonacci(number),
                nth_triangular: triangular(number),
                square: number * number,
                cube: number * number * number,
                nth_tetrahedral: tetrahedral(number),
                nth_sq_pyramidal: squarePyramidal(number),
                nth_star: starNumber(number),
                nth_pentagonal: pentagonal(number),
                conversions: convertNumeralSystems(number),
            };
            console.log(return_body.fibonacci_res);
            console.log(return_body.triangular_res);
            console.log(return_body.sq_pyramidal_res);

            $('#TopNumber').text(number);

            $('#td_fibonacci_wrapper').prop('hidden', return_body.fibonacci_res.string === '');
            $('#td_fibonacci').text(return_body.fibonacci_res.string);
            $('#td_fibonacci_prev').attr('data-number', return_body.fibonacci_res.previous);
            $('#td_fibonacci_next').attr('data-number', return_body.fibonacci_res.next);

            $('#td_triangular_wrapper').prop('hidden', return_body.triangular_res.string === '');
            $('#td_triangular').text(return_body.triangular_res.string);
            $('#td_triangular_prev').attr('data-number', return_body.triangular_res.previous);
            $('#td_triangular_next').attr('data-number', return_body.triangular_res.next);

            $('#td_sq_pyramidal_wrapper').prop('hidden', return_body.sq_pyramidal_res.string === '');
            $('#td_sq_pyramidal').text(return_body.sq_pyramidal_res.string);
            $('#td_sq_pyramidal_prev').attr('data-number', return_body.sq_pyramidal_res.previous);
            $('#td_sq_pyramidal_next').attr('data-number', return_body.sq_pyramidal_res.next);

            $('#count').text(return_body.count);
            $('#sum').text(return_body.sum);

            let string = '';
            let count = 0;
            for (const item of return_body.divisors) {
                count += 1;
                string += '<b class="Linkable"><a href="javascript:void(0);" class="target_number">'+item+'</a></b>' + (count === return_body.divisors.length ? '' : ',&nbsp;');
            }
            if (return_body.composite != '') {
                string += '<br>';
                string += '<b class="Linkable">'+return_body.composite+'</b>';
            }
            $('#divisors_list').html(string);


            $('#number_with_suffix').text(getNumberSuffix(number));

            $('#nth_prime').text(return_body.nth_prime);
            $('#nth_composite').text(return_body.nth_composite);
            $('#nth_fibonacci').text(return_body.nth_fibonacci);
            $('#nth_triangular').text(return_body.nth_triangular);
            $('#square').text(return_body.square);
            $('#cube').text(return_body.cube);
            $('#nth_tetrahedral').text(return_body.nth_tetrahedral);
            $('#nth_sq_pyramidal').text(return_body.nth_sq_pyramidal);
            $('#nth_star').text(return_body.nth_star);
            $('#nth_pentagonal').text(return_body.nth_pentagonal);

            $('#octal').text(return_body.conversions.octal);
            $('#duodecimal').text(return_body.conversions.duodecimal);
            $('#hexadecimal').text(return_body.conversions.hexadecimal);
            $('#binary').text(return_body.conversions.binary);

            $('#center_number_properties').prop('hidden', false);
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#btn_get_properties').on('click', function () {
                let val = $('#input_get_properties').val();

                if (val < 1 || val == '') {
                    return false;
                }

                number_properties(val);
            });

            $('body').on('click', '.target_number', function () {
                number_properties($(this).text());
            });

            $('body').on('click', '.target_action', function (e) {
                e.preventDefault();

                let val = $(this).data('number');

                if (val == '') {
                    return false;
                }

                number_properties(val);
            });
        });
    </script>
@endsection


