@extends ('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
            <ul class="nav nav-pills nav-justified" style=" border: 3px;">
                <li><a href="#table_view" data-toggle="tab">Kolegiji</a></li>
                <li><a href="{{route('collegiums_create')}}" class="btn">Dodaj</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Opis</th>
                            <th>Nositelj kolegija</th>
                            <th>Asistent</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($collegiums as $collegium)
                            <tr>
                                <td>{{$collegium->id}}</td>
                                <td>{{$collegium->name}}</td>
                                <td>{{$collegium->description}}</td>
                                <td>{{$collegium->professor->name}}</td>
                                <td>{{$collegium->assistent->name}}</td>

                                <td><a href="{{route('collegiums')}}/{{$collegium->id}}" class="btn btn-warning btn-xs">Prikaz</a>
                                </td>
                                <td><a href="{{route('collegiums_edit')}}/{{$collegium->id}}"
                                       class="btn btn-primary btn-xs">Uredi</a></td>
                                <td><a href="{{route('collegiums_delete')}}/{{$collegium->id}}"
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
