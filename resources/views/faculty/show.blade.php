@extends ('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-body">
                <div id="page-content-wrapper">

                    <legend style="">{{$faculties->name}}</legend>
                    <ul class="nav nav-pills" style=" border: 3px;">
                        <li><a href="#general-data" data-toggle="tab">Osnovni podaci</a></li>
                        <li><a href="#studies-data" data-toggle="tab">Studiji {{$faculties->short_name}}-a</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">

                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="general-data" style="padding-top:15px">

                            <blockquote>
                                <p> Naziv:</p>
                                <p>{{$faculties->name}}</p>
                                <hr>
                                <p> Kratica:</p>
                                <p>{{$faculties->short_name}}</p>
                                <hr>
                                <p> Adresa:</p>
                                <p>{{$faculties->address}}</p>
                                <hr>
                                <p> Web stranica:</p>
                                <p>{{$faculties->web}}</p>
                                <hr>
                                <p> Email:</p>
                                <p>{{$faculties->email}}</p>
                                <hr>
                                <p> Broj telefona:</p>
                                <p>{{$faculties->phone}}</p>
                            </blockquote>

                        </div>
                        <div class="tab-pane fade" id="studies-data" style="padding-top:15px">
                            @foreach($studies as $study)
                                <div class="row">
                                    <h3 class="header col-lg-11">{{$study->name}}</h3>
                                    <a href="{{route('studies')}}/{{$study->id}}" class="btn btn-default col-lg-1"
                                       style="align-self: flex-start;">Više</a>

                                </div>
                                <hr>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
