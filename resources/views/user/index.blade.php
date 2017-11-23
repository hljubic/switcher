@extends('layouts.app')

@section('content')
    <h1>Pregled korisnika <a href="{{route('user_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ime i prezime</th>
            <th>E-mail</th>
            <th>Broj indeksa</th>
            <th>Titula</th>
            <th>Broj telefona</th>
            <th>Tip korisnika</th>
            <th>Aktivnost</th>
            <th>Studij</th>
            <th>Uredi</th>
            <th>Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->index_number}}</td>
                <td>{{$user->title}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->type}}</td>
                <td>{{$user->is_active}}</td>
                <td>{{$user->study->name}}</td>
                <td><a href="{{route('user_edit')}}/{{$user->id}}" class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('user_delete')}}/{{$user->id}}" class="btn btn-danger btn-xs">Izbriši</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
