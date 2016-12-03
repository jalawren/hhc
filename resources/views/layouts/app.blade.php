<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>healthhabitcoach.com - @yield('title')</title>

    <link rel="stylesheet" href="css/app.css"/>

</head>
<body>
    <div id="header">
        healthhabitcoach.com

    </div>


    <div class="container">

        @yield('content')

    </div>

    <div id="footer">
        <ul>
            <li>
                <a href="{{ $url = route('home') }}">home</a>
            </li>
            <li>
                <a href="{{ $url = route('about') }}">about</a>
            </li>
            <li>
                <a href="{{ $url = route('philosophy') }}">philosophy</a>
            </li>
            <li>
                <a href="{{ $url = route('contact') }}">contact</a>
            </li>
            <li>
                <a href="{{ $url = route('links') }}">links</a>
            </li>

        </ul>

        &copy;2016 healthhabitcoach.com
    </div>
</body>
</html>