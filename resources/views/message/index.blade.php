@extends('layouts.app')

@section('content')
    <h1>Pregled poruka <a href="{{route('message_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Sadržaj poruke</th>
            <th>Datum i vrijeme</th>
            <th>Razgovor</th>
            <th>Ime i prezime pošiljatelja</th>
            <th>Uredi</th>
            <th>Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{$message->id}}</td>
                <td>{{$message->content}}</td>
                <td>{{$message->created_at}}</td>
                <td>{{$message->conversation->title}}</td>
                <td>{{$message->user->name}}</td>
                <td><a href="{{route('message_edit')}}/{{$message->id}}" class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('message_delete')}}/{{$message->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
