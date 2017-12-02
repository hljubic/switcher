@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2" class="panel-default" style="margin-top: 50px;">
        <div id="page-content-wrapper">
            <ul class="nav nav-pills nav-justified" style=" border: 3px;">
                <li><a href="#table_view" data-toggle="tab">Pregled pratitelja</a></li>
                <li><a href="{{route('follower_create')}}" class="btn">Dodaj</a></li>
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
                                <td>{{$follower-> user->name}}</td>
                                <td>{{$follower-> follower -> name}}</td>
                                <td><a href="{{route('follower_edit')}}/{{$follower->id}}"
                                       class="btn btn-primary btn-xs">Uredi</a></td>
                                <td><a href="{{route('follower_delete')}}/{{$follower->id}}"
                                       class="btn btn-danger btn-xs">Izbriši</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
