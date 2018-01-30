@extends ('layouts.app')

@section('content')
    @if(count($collegiums) > 0)
        <div class="col-md-8 col-md-offset-2">
            <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
                <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
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
                                    @if(count($collegium->professor) > 0)
                                        <td>{{$collegium->professor->name}}</td>
                                    @endif
                                    @if(count($collegium->assistent) > 0)
                                        <td>{{$collegium->assistent->name}}</td>
                                    @endif
                                    <td><a href="{{route('collegiums')}}/{{$collegium->id}}"
                                           class="btn btn-warning noborder btn-xs">Prikaz</a></td>
                                    <td><a href="{{route('collegiums_edit')}}/{{$collegium->id}}"
                                           class="btn swt-button-prim btn-xs">Uredi</a></td>
                                    <td><a href="{{route('collegiums_delete')}}/{{$collegium->id}}"
                                           class="btn btn-danger noborder btn-xs">Izbriši</a></td>
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
                          font-weight: 100; color: #636b6f; text-align: center;">Tablica "collegiums" nema nikakvih
                            podataka</p>
                        <div class="row">
                            <a href="{{route('collegiums_create')}}"
                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj kolegij</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
