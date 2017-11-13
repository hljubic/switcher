@extends ('layouts.app')

@section('content')

    <div class="container">
        <h3><i class="fa fa-address-book-o" aria-hidden="true"></i>  Imenik</h3>
        <br>
        <div class="row">
            <form class="navbar-form navbar-left" role="search" method="GET">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" style="height: 35px">
                </div>
                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <br>
        <div class="row">
            @foreach($users as $user)
                <div class="col-lg-3">
                    <div class="panel panel-success">
                        <div class="panel-body" style="height: 125px;">
                            <h4>{{$user->title}} {{$user->name}}</h4>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i> {{$user->email}}
                            <br>
                            <i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone}}
                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-success btn-sm" >View profile</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$users->links()}}
    </div>
@endsection