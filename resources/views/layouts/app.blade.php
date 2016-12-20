<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="healthhabitcoach.com,health,fitness,Health Coach,diet,exercise">

        <title>healthhabitcoach.com - @yield('title')</title>

        <link rel="stylesheet" href="/css/app.css"/>

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
            <nav class="navbar navbar-inverse hhc-navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#hhc-nav">

                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        {{--<a class="navbar-brand" href="#">WebSiteName</a>--}}
                    </div>
                    <div class="collapse navbar-collapse" id="hhc-nav">
                        <ul class="nav navbar-nav">

                            <li><a href="{{ route('about') }}">about</a></li>
                            <li><a href="{{ route('philosophy') }}">health philosophy</a></li>
                            <li><a href="{{ route('contact') }}">contact</a></li>
                            <li><a href="/blog">blog</a></li>
                            <li><a href="/resources">resources</a></li>


                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

        <div id="app" class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
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