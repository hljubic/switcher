@extends ('layouts.app')

@section('content')
    <div class="col-lg-10 col-lg-offset-2"  >
        <div class="container-fluid">
            <div class="row col-lg-10">
                <h3><i class="fa fa-address-book-o" aria-hidden="true"></i> Imenik</h3>
                <br>
                <form class="navbar-form navbar-left" role="search" method="GET">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" style="height: 35px; width:220px;">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
            <div class="row col-lg-10">
                @foreach($users as $user)
                    <div class="col-lg-4">
                        <div class="panel panel-success">
                            <div class="panel-body" style="height: 125px;">
                                <h4>{{$user->title}} {{$user->name}}</h4>
                                <i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}
                                <br>
                                <i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone}}
                            </div>
                            <div class="panel-footer">
                                <a href="{{route('users')}}/{{$user->id}}" class="btn btn-success btn-sm">Profil</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$users->links()}}
        </div>
    </div>
@endsection