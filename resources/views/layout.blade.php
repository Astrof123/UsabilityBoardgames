<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@section('title') Default title @show</title>
</head>
<body>
    @section('header')
        @include('shared.header')
    @show

    <div class=content>
        @yield('content')
    </div>

    @section('footer')
        @include('shared.footer')
    @show
</body>
</html>