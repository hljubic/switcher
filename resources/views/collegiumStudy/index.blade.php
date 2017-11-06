@extends('layouts.app')

@section('content')
    <h1>Pregled kolegija i studija <a href="{{route('collegium_study_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Kolegij</th>
            <th>Studij</th>
            <th>Uredi</th>
            <th>Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($collegium_study as $collegium_study)
            <tr>
                <td>{{$collegium_study->id}}</td>
                <td>{{$collegium_study->collegium->name}}</td>
                <td>{{$collegium_study->study->name}}</td>
                <td><a href="{{route('collegium_study_edit')}}/{{$collegium_study->id}}"
                       class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('collegium_study_delete')}}/{{$collegium_study->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
