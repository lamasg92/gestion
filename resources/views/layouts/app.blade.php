<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App Tittle -->
    <title>{{ config('app.name', 'Gestion') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--<link href="/css/app.css" rel="stylesheet">--}}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">


        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">

                @include('partials.navbar.header')

                @include('partials.navbar.menu')
            </div>
        </nav>

        <div class="container" xmlns="http://www.w3.org/1999/html">
            @include('flash::message')
            @yield('content')
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script>
    {{--<script src="/js/app.js"></script>--}}
</body>
</html>
