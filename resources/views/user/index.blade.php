@extends('layouts.app')

@section('content')
    @if(count($users) > 0)
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
                                    @if(count($user->study) > 0 )
                                        <td>{{$user->study->name}}</td>
                                    @endif


                                    <td><a href="{{route('users')}}/{{$user->id}}"
                                           class="btn noborder btn-warning btn-xs">Prikaz</a></td>
                                    <td><a href="{{route('users_edit')}}/{{$user->id}}"
                                           class="btn swt-button-prim btn-xs">Uredi</a></td>
                                    <td><a href="{{route('users_delete')}}/{{$user->id}}"
                                           class="btn noborder btn-danger btn-xs">Izbriši</a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 50px;">
                <div class="panel-body">
                    <div id="page-content-wrapper">

                        <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Tablica "users" nema nikakvih
                            podataka</p>
                        <div class="row">
                            <a href="{{route('users_create')}}"
                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj kolegij</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
