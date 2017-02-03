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
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}


    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

   @yield('styles')

</head>
<body>
<div id="app">


    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">

            @include('partials.navbar.header')

            @include('partials.navbar.menu')
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">

                    @include('flash::message')
                    @yield('content')

                </div>
            </div>
        </div>
    </div>

</div>

<!-- Scripts -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}

<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')

<script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script>

</body>
</html>
