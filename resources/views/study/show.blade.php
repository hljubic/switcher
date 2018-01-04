@extends ('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-body">
                <div id="page-content-wrapper">

                    <legend style="">{{$studies->name}}</legend>
                    <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
                        <li><a href="#general-data" data-toggle="tab">Osnovni podaci</a></li>
                        <li><a href="#studies-data" data-toggle="tab">Kolegiji</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">

                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="general-data" style="padding-top:15px">

                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-bars" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$studies->name}}</p>
                                        </div>
                                    </div>
                                </div>

                            </blockquote>
                            <hr>
                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-university" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$studies->faculty->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                            <hr>
                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-align-center" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$studies->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <div class="tab-pane fade" id="studies-data" style="padding-top:15px">
                            @foreach($studies->collegiums as $collegium)
                                <div class="list-group-item" style="margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h3 class="header" style="margin-bottom: 20px;">{{$collegium->name}}</h3>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{route('collegiums')}}/{{$collegium->id}}"
                                               class="btn btn-sm btn-success btn-block noborder"
                                               style="align-self: flex-start;margin-top: 15px;">Više</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
