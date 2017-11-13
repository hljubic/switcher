@extends('layouts.app')

@section('content')
    <h1>Pregled fakulteta</h1> <a href="{{route('faculty_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Kratica</th>
            <th>Adresa</th>
            <th>Web</th>
            <th>E-mail</th>
            <th>Telefon</th>
        </tr>
        </thead>
        <tbody>
        @foreach($faculties as $faculty)
            <tr>
                <td>{{$faculty->id}}</td>
                <td>{{$faculty->name}}</td>
                <td>{{$faculty->short_name}}</td>
                <td>{{$faculty->address}}</td>
                <td>{{$faculty->web}}</td>
                <td>{{$faculty->email}}</td>
                <td>{{$faculty->phone}}</td>
                <td><a href="{{route('faculty_edit')}}/{{$faculty->id}}" class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('faculty_delete')}}/{{$faculty->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
