<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{asset('css/star-rating.min.css')}}" rel="stylesheet">


</head>
<body>
    <div id="app">
        @include('includes.nav')
        <div class="container">
            @include('includes.messages')
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/star-rating.min.js') }}"></script>
    @include('flashy::message')
</body>
</html>
