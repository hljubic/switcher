@extends('layouts.app')

@section('content')

    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#table_view" data-toggle="tab">Fakulteti</a></li>
                <li><a href="{{route('faculty_create')}}" class="btn">Dodaj</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
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

                                <td><a href="{{route('faculties')}}/{{$faculty->id}}" class="btn btn-warning btn-xs">Prikaz</a>
                                </td>
                                <td><a href="{{route('faculty_edit')}}/{{$faculty->id}}" class="btn btn-primary btn-xs">Uredi</a>
                                </td>
                                <td><a href="{{route('faculty_delete')}}/{{$faculty->id}}"
                                       class="btn btn-danger btn-xs">Izbriši</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
