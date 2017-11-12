@extends('layouts.app')

@section('content')
    <h1>Pregled pratitelja <a href="{{route('follower_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

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
                <td><a href="{{route('follower_edit')}}/{{$follower->id}}" class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('follower_delete')}}/{{$follower->id}}" class="btn btn-danger btn-xs">Izbriši</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
