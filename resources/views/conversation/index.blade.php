@extends('layouts.app')

@section('content')
    <h1>Pregled razgovora <a href="{{route('conversation_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Naslov</th>
            <th>Ime i prezime kreatora</th>
            <th>Uredi</th>
            <th>Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($conversations as $conversation)
            <tr>
                <td>{{$conversation->id}}</td>
                <td>{{$conversation->title}}</td>
                <td>{{$conversation->user->name}}</td>
                <td><a href="{{route('conversation_edit')}}/{{$conversation->id}}"
                       class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('conversation_delete')}}/{{$conversation->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
