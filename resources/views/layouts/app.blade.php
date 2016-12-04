<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>healthhabitcoach.com - @yield('title')</title>

        <link rel="stylesheet" href="/css/app.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="/js/app.js"></script>

    </head>
    <body>
        <div class="header">
            <h3>
                healthhabitcoach.com
            </h3>
            <p>Tips for healthy living by Certified Health Coach, Justin King</p>
        </div>

        <div class="navigation">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hhc-nav">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
                    </div>
                    <div class="collapse navbar-collapse" id="hhc-nav">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ $url = route('about') }}">about</a></li>
                            <li><a href="{{ $url = route('philosophy') }}">health philosophy</a></li>
                            <li><a href="{{ $url = route('contact') }}">contact</a></li>
                            <li><a href="/blog">blog</a></li>
                            <li><a href="/resources">resources</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

        <div class="container">
            @if(Auth::check())
                <form method="POST" action="/logout">
                    {{ csrf_field() }}
                    <button class="btn hhc-btn" type="submit">Logout</button>
                </form>
            @endif

            @yield('content')

        </div>

        {{--<div class="footer">--}}

            {{--<div class="footer-box">--}}
                {{--<ul class="footer-list">--}}
                    {{--<li>--}}
                        {{--<a href="{{ $url = route('home') }}">home</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ $url = route('about') }}">about</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ $url = route('philosophy') }}">philosophy</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}

            {{--</div>--}}
            {{--<div class="footer-box">--}}
                {{--<ul class="footer-list">--}}

                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ $url = route('contact') }}">contact</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/resources">resources</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/blog">blog</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}

            {{--</div>--}}


        {{--</div>--}}
        <div class="imprint">

            &copy;2016 healthhabitcoach.com

        </div>

        <script>
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>

    </body>
</html>