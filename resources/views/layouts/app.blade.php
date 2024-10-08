<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.11.1/jquery.validate.min.js"></script>
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <style>
        .section {
            position: relative;
            height: 100vh;
        }

        .section .section-center {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        #booking {
            font-family: 'Lato', sans-serif;
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            color: #191a1e;
        }

        .booking-form {
            position: relative;
            background: #fff;
            max-width: 642px;
            height: 300px;
            width: 100%;
            margin: auto;
            padding: 25px 25px 25px 25px;
            border-radius: 4px;
            -webkit-box-shadow: 0px 0px 10px -5px rgba(0, 0, 0, 0.4);
            box-shadow: 0px 0px 10px -5px rgba(0, 0, 0, 0.4);
        }

        .booking-form .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .booking-form .form-control {
            background-color: #fff;
            height: 65px;
            padding: 0px 15px;
            padding-top: 24px;
            color: #191a1e;
            border: 2px solid #dfe5e9;
            font-size: 16px;
            font-weight: 700;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-radius: 4px;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .booking-form .form-control::-webkit-input-placeholder {
            color: #dfe5e9;
        }

        .booking-form .form-control:-ms-input-placeholder {
            color: #dfe5e9;
        }

        .booking-form .form-control::placeholder {
            color: #dfe5e9;
        }

        .booking-form .form-control:focus {
            background: #f9fafb;
        }

        .booking-form input[type="date"].form-control:invalid {
            color: #dfe5e9;
        }

        .booking-form select.form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .booking-form select.form-control+.select-arrow {
            position: absolute;
            right: 6px;
            bottom: 6px;
            width: 32px;
            line-height: 32px;
            height: 32px;
            text-align: center;
            pointer-events: none;
            color: #dfe5e9;
            font-size: 14px;
        }

        .booking-form select.form-control+.select-arrow:after {
            content: '\279C';
            display: block;
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .booking-form .form-label {
            position: absolute;
            top: 6px;
            left: 20px;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 24px;
            height: 24px;
            font-size: 12px;
            color: #98c9ee;
        }

        .booking-form .form-checkbox input {
            position: absolute !important;
            margin-left: -9999px !important;
            visibility: hidden !important;
        }

        .booking-form .form-checkbox label {
            position: relative;
            padding-top: 4px;
            padding-left: 30px;
            font-weight: 700;
            color: #191a1e;
        }

        .booking-form .form-checkbox label+label {
            margin-left: 15px;
        }

        .booking-form .form-checkbox input+span {
            position: absolute;
            left: 2px;
            top: 4px;
            width: 20px;
            height: 20px;
            background: #fff;
            border: 2px solid #dfe5e9;
            border-radius: 50%;
        }

        .booking-form .form-checkbox input+span:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0px;
            height: 0px;
            border-radius: 50%;
            background-color: #4fa3e3;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
        }

        .booking-form .form-checkbox input:not(:checked)+span:after {
            opacity: 0;
        }

        .booking-form .form-checkbox input:checked+span:after {
            opacity: 1;
            width: 10px;
            height: 10px;
        }

        .booking-form .submit-btn {
            color: #fff;
            background-color: #4fa3e3;
            font-weight: 400;
            font-size: 18px;
            border: none;
            width: 30%;
            height: 40px;
            border-radius: 4px;
        }

        .booking-cta {
            margin-top: 45px;
        }

        .booking-cta h1 {
            font-size: 52px;
            text-transform: uppercase;
            color: #4fa3e3;
            font-weight: 400;
        }

        .booking-cta p {
            font-size: 22px;
            color: #191a1e;
        }
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
