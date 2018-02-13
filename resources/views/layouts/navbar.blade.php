@if($user=Auth::user())
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0;  background-color: #3C3F41;">

        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <a class="navbar-brand" href="{{ url('/home') }}" title="Početna stranica">
                    {{ config('app.name', 'Laravel') }}
                </a>

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li>
                        <!-- search in navbar-->
                        <form class="navbar-form navbar-left col-lg-12" role="search">
                            <div class=" form-group">
                                <div class="input-group input-group-sm " style="padding-top:5px; width: 350px; ">
                                    <input type="text" class="form-control" placeholder="Pretraži..." list="browsers"
                                           name="browser"
                                           style="border-radius:0px; background-color:rgba(179, 179, 179,0.3); border:none; color:#fff;"
                                           ng-model="searchText">
                                    <datalist id="browsers">
                                        <option ng-repeat="user in users | filter: searchText"
                                                value="<%user.name%>" ng-model="select_user(user.id)">
                                    </datalist>
                                    <span class="input-group-btn">
                                            <a href="{{route('users')}}/<%selected_user%>" class="btn btn-secondary"
                                               type="button"
                                               style="background-color:rgba(179, 179, 179,0.3); border-radius:0px;"><i
                                                        class="fa fa-search" style="color: white;"></i>
                                            </a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </li>

                    <!-- sidebar button -->
                    <li><a href="#menu-toggle" class="btn " id="menu-toggle" title="Sveučilišni podaci">
                            <i class="fa fa-graduation-cap"></i>
                        </a>
                    </li>

                    <!-- chat route-->
                    <li><a href="{{route('chat')}}"><i class="fa fa-comments" aria-hidden="true" title="Poruke"></i>
                            </a></li>
                    <!-- imenik route -->
                    <li><a href="{{route('imenik')}}"><i class="fa fa-address-book" aria-hidden="true" title="Imenik profesora"></i></a>
                </ul>

                <!-- Right Side Of Navbar -->
                <div class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                        <!-- notification-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true" title="Obavijesti">
                                    <i class="fa fa-globe" style="font-size: 20px;"></i>

                                    <!-- ako nema novih notifikacija nema ni oznake-->
                                    @if(auth()->user()->unreadNotifications->count())
                                        <span class="badge" style="background-color: #d9534f; color:#fff;">
                                            {{count(auth()->user()->unreadNotifications)}}
                                        </span>
                                    @endif
                                </a>
                                <!-- notification body-->
                                <ul class="dropdown-menu nopadding" style="min-width: 420px;">
                                    <li>
                                        <div class="panel panel-heading panel-default noborder"
                                             style="margin-bottom: 5px;">
                                            <div class="row" style="font-size: 14px;">
                                                <div class="col-lg-6">Obavijesti</div>
                                                <div class="col-lg-6"><a href="{{route('markRead')}}" class="pull-right">
                                                        Označi sve kao pročitano</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body nopadding noborder">
                                            @forelse(auth()->user()->unreadNotifications as $notification)
                                                @include('layouts.notifications.'.snake_case(class_basename($notification->type)))
                                            @empty
                                                <div class="list-group col-lg-12"
                                                     style="margin-bottom: 3px !important;">
                                                    <br><div class="d-flex w-100 justify-content-between" style="text-align: center;">
                                                        Nema novih obavijesti.
                                                    </div><br>
                                                </div>
                                            @endforelse
                                        </div>
                                        <div class="panel-footer"></div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" >
                                    <li>
                                        <a href="{{route('users')}}/{{Auth::user()->id}}" title="Profil" >{{Auth::user()->name}}</a>
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
                                    @if($user->type=='admin')
                                        <li>
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>@endif
                                </ul>
                            </li>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
@endif