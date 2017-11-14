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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('stylesheets')

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Pretraga">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></button>
                        </form>

                        <li><a href="#"><i class="fa fa-university" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-exclamation" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i><span
                                        class="badge">3</span></a></li>
                        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-address-book" aria-hidden="true"></i></a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false" aria-haspopup="true">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">{{Auth::user()->name}}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @include('layouts.messages')
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{asset('js/app.js') }}"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
</script>

@stack('scripts')
</body>
</html>