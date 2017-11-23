@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="panel panel-success" style="margin-bottom: 2%">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$user->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}
                        <br><br>
                        <i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone}}
                        <br><br>
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$user->type}}
                        <br><br>
                        <i class="fa fa-book" aria-hidden="true"></i> {{$user->index_number}}
                        <br><br>
                        <i class="fa fa-university" aria-hidden="true"></i> {{$user->study->name}}

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-6" style="text-align: center; font-weight: bold;">Followers</div>
                            <div class="col-lg-6" style="text-align: center; font-weight: bold;">Following</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6" style="text-align: center; ">{{$followers}}</div>
                            <div class="col-lg-6" style="text-align: center">{{$following}}</div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->id == $user->id)
                    <a href="{{route('user_edit')}}/{{$user->id}}" class="btn btn-success btn-sm" style="width: 100%;">Uredi</a></td>
                @elseif($followButton == true)
                    <a href="{{route('unfollow')}}/{{Auth::user()->id}}" class="btn btn-success btn-sm"
                       style="width: 100%;">Unfollow</a>
                @else
                    <form class="form-horizontal" action="{{route('follow')}}/{{$user->id}}" method="POST">
                        {{csrf_field()}}
                        <fieldset>
                            <button type="submit" class="btn btn-success btn-sm" style="width: 100%;">Follow</button>
                        </fieldset>
                    </form>
                @endif
            </div>
            <div class="col-lg-9">
                <div class="panel panel-success" style="height: 370px;">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kolegiji">Kolegiji</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#objave">Objave</a>
                        </li>
                    </ul>
                    <div class="panel-body">
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade in active show" id="kolegiji">
                                @foreach($collegiums as $collegium)
                                    {{$collegium->name}}
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="objave">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection