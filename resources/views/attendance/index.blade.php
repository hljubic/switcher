@extends('layouts.app')

@section('content')
    <h1>Pregled predmeta i korisnika <a href="{{route('attendances_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nastava</th>
            <th>Korisnik</th>
            <th>Uredi</th>
            <th>Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($attendances as $attendance)
            <tr>
                <td>{{$attendance->id}}</td>
                <td>{{$attendance->classe->type}}</td>
                <td>{{$attendance->user->name}}</td>
                <td><a href="{{route('attendances_edit')}}/{{$attendance->id}}"
                       class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('attendances_delete')}}/{{$attendance->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection