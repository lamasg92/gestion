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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">


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


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"></script>


<script>$('div.alert').not('.alert-important').delay(3000).fadeOut(350);</script>

</body>
</html>
