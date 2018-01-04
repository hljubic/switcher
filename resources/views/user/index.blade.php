@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
            <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
                <li><a href="#table_view" data-toggle="tab">Pregled korisnika</a></li>
                <li><a href="{{route('users_create')}}" class="btn">Dodaj</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ime i prezime</th>
                            <th>E-mail</th>
                            <th>Broj indeksa</th>
                            <th>Titula</th>
                            <th>Broj telefona</th>
                            <th>Tip korisnika</th>
                            <th>Aktivnost</th>
                            <th>Studij</th>
                            <th>Uredi</th>
                            <th>Izbriši</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->index_number}}</td>
                                <td>{{$user->title}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->type}}</td>
                                <td>{{$user->is_active}}</td>
                                <td>{{$user->study->name}}</td>

                                <td><a href="{{route('users')}}/{{$user->id}}"
                                 class="btn noborder btn-warning btn-xs">Prikaz</a></td>
                                <td><a href="{{route('users_edit')}}/{{$user->id}}"
                                       class="btn swt-button-prim btn-xs">Uredi</a></td>
                                <td><a href="{{route('users_delete')}}/{{$user->id}}" class="btn noborder btn-danger btn-xs">Izbriši</a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
