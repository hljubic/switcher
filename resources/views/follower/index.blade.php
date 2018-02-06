@extends('layouts.app')

@section('content')
    @if($followers)
        <div class="col-md-8 col-md-offset-2" class="panel-default" style="margin-top: 50px;">
            <div id="page-content-wrapper">
                <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
                    <li><a href="#table_view" data-toggle="tab">Pregled pratitelja</a></li>
                    <li><a href="{{route('followers_create')}}" class="btn">Dodaj</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ime korisnika</th>
                                <th>Ime pratitelja</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($followers as $follower)
                                <tr>
                                    <td>{{$follower->id}}</td>
                                    @if($follower->user)
                                        <td>{{$follower->user->name}}</td>
                                    @endif
                                    @if($follower->follower)
                                        <td>{{$follower->follower->name}}</td>
                                    @endif


                                    <td><a href="{{route('followers_edit')}}/{{$follower->id}}"
                                           class="btn swt-button-prim btn-xs">Uredi</a></td>
                                    <td><a href="{{route('followers_delete')}}/{{$follower->id}}"
                                           class="btn noborder btn-danger btn-xs">Izbriši</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 50px;">
                <div class="panel-body">
                    <div id="page-content-wrapper">

                        <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Tablica "follower_user" nema nikakvih
                            podataka</p>
                        <div class="row">
                            <a href="{{route('followers_create')}}"
                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj pratitelje</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
