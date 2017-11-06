@extends('layouts.app')

@section('content')
    <h1>Pregled tip nastave i kolegij <a href="{{route('classe_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tip</th>
            <th>Kolegij</th>
            <th>Uredi</th>
            <th>Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classes as $classe)
            <tr>
                <td>{{$classe->id}}</td>
                <td>{{$classe->type}}</td>
                <td>{{$classe->collegium->name}}</td>
                <td><a href="{{route('classe_edit')}}/{{$classe->id}}"
                       class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('classe_delete')}}/{{$classe->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
