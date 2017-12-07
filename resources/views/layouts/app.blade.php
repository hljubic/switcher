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
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0;  background-color: #3C3F41;">

        <div class="container">
            <div class="navbar-header">

                <!-- sidebar button -->
                <a href="#menu-toggle" class="btn navbar-btn" id="menu-toggle">
                    <i class="glyphicon glyphicon-align-left"></i></a>

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <li>
                       <form class="navbar-form navbar-left" role="search">

                           <div class="form-group ">
                               <input type="text" class="form-control input-sm" placeholder="Pretraga"
                                      style="border-radius:50px; background-color:rgba(179, 179, 179,0.3); border:none; color:#fff;">
                               <button type="submit" class="btn btn-default"
                                       style="background-color: #313335; border-color: #313335;"><i
                                           class="fa fa-search"
                                           aria-hidden="true"></i>
                               </button>
                           </div>


                       </form>
                   </li>

                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-graduation-cap"
                                                                                      aria-hidden="true"></i>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('faculties')}}">Fakulteti</a></li>
                                <li><a href="{{route('studies')}}">Studijske grupe</a></li>
                                <li><a href="{{route('collegiums')}}">Kolegiji</a></li>
                            </ul>
                        </a>
                    </li>
                    <li><a href="#"><i class="fa fa-exclamation" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i><span
                                    class="badge">3</span></a></li>
                    <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i></a></li>
                    <li><a href="{{route('imenik')}}"><i class="fa fa-address-book" aria-hidden="true"></i></a>
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
                                        <a href="{{route('users')}}/{{Auth::user()->id}}">{{Auth::user()->name}}</a>
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

    </nav>

    @include('inc.sidebar',['faculties',$faculties],['studies',$studies],['collegiums',$collegiums])
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

    //profile picture
    $(document).ready(function () {
        var storename = $('#storename').text();
        var intials = $('#storename').text().charAt(0);
        var profile = $('#profile').text(intials);
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip(options)
    })

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
            placement : 'bottom'
        });
    });


</script>

@stack('scripts')
</body>
</html>
