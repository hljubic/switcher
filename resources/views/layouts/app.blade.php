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
    <!--style for datepicker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
    <!-- icons -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- style for sidebar -->
    <link href="{{asset('css/simple-sidebar.css') }}" rel="stylesheet">

    @stack('stylesheets')

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
        <div class="container">
            <div class="navbar-header">

                <!-- sidebar button -->
                <a href="#menu-toggle" class="btn navbar-btn" id="menu-toggle">
                    <i class="glyphicon glyphicon-align-left"></i></a>

                <div class="btn-group">
                    <a href="#" class="btn navbar-btn  dropdown-toggle" data-toggle="dropdown">Student</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('faculties')}}">Fakulteti</a></li>
                        <li><a href="{{route('studies')}}">Studijske grupe</a></li>
                        <li><a href="{{route('collegiums')}}">Kolegiji</a></li>
                    </ul>
                </div>
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
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
    </nav>

    @include('inc.sidebar',array(['faculties',$faculties],['studies',$studies],['collegiums',$collegiums]))

    @include('layouts.messages')

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>

<script>
    //datepicker
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });

    //sidebar toggle function
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    //pills

</script>

    @stack('scripts')
</body>
</html>
