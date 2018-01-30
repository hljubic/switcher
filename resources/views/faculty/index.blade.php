@extends('layouts.app')

@section('content')
    @if(count($faculties) > 0)
        <div class="col-md-8 col-md-offset-2 ">
            <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
                <ul class="nav swt-nav-pills nav-justified">
                    <li><a href="#table_view" data-toggle="tab">Fakulteti</a></li>
                    <li><a href="{{route('faculties_create')}}">Dodaj</a></li>
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

                                    <td><a href="{{route('faculties')}}/{{$faculty->id}}"
                                           class="btn noborder btn-warning btn-xs">Prikaz</a>
                                    </td>
                                    <td><a href="{{route('faculties_edit')}}/{{$faculty->id}}"
                                           class="btn swt-button-prim btn-xs">Uredi</a>
                                    </td>
                                    <td><a href="{{route('faculties_delete')}}/{{$faculty->id}}"
                                           class="btn noborder btn-danger btn-xs">Izbriši</a></td>
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
                          font-weight: 100; color: #636b6f; text-align: center;">Tablica "faculties" nema nikakvih
                            podataka</p>
                        <div class="row">
                            <a href="{{route('faculties_create')}}"
                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj fakultet</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
