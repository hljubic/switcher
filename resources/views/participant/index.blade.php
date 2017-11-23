@extends('layouts.app')

@section('content')
    <h1>Pregled sudionika u razgovoru <a href="{{route('participant_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Razgovor</th>
            <th>Ime i prezime korisnika</th>
            <th>Uredi</th>
            <th>Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($participants as $participant)
            <tr>
                <td>{{$participant->id}}</td>
                <td>{{$participant->conversation->title}}</td>
                <td>{{$participant->user->name}}</td>
                <td><a href="{{route('participant_edit')}}/{{$participant->id}}" class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('participant_delete')}}/{{$participant->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
