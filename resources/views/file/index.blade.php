@extends('layouts.app')

@section('content')
    <h1>Pregled radova <a href="{{route('file_create')}}" class="btn btn-success">Dodaj</a></h1>
    <br>

    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Rad</th>
            <th>Opis</th>
            <th>Post</th>
            <th>Naziv</th>
        </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <td>{{$file->id}}</td>
                <td>{{$file->name}}</td>
                <td>{{$file->description}}</td>
                <td>{{$file->post->content}}</td>
                <td>{{$file->task->name}}</td>
                <td><a href="{{route('file_edit')}}/{{$file->id}}"
                       class="btn btn-primary btn-xs">Uredi</a></td>
                <td><a href="{{route('file_delete')}}/{{$file->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
