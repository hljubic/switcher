@extends('layouts.app')

@section('content')
    <h1>Pregled korisnika <a href="{{route('study_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Opis</th>
            <th>ID Fakulteta</th>
        </tr>
        </thead>
        <tbody>
        @foreach($studies as $study)
            <tr>
                <td>{{$study->id}}</td>
                <td>{{$study->name}}</td>
                <td>{{$study->description}}</td>
                <td>{{$study->email}}</td>
                <td><a href="{{route('study_edit')}}/{{$study->id}}" class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('study_delete')}}/{{$study->id}}" class="btn btn-danger btn-xs">Izbriši</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
