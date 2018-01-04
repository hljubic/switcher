@extends ('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-body">
                <div id="page-content-wrapper">

                    <legend style="">{{$faculties->name}}</legend>
                    <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
                        <li><a href="#general-data" data-toggle="tab">Osnovni podaci</a></li>
                        <li><a href="#studies-data" data-toggle="tab">Studiji</a></li>
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
                                            <i class="fa fa-university" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                           <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$faculties->name}}</p>
                                        </div>
                                    </div>
                                </div>

                            </blockquote>
                            <hr>
                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-bars" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$faculties->short_name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                            <hr>
                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-map-marker" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$faculties->address}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                            <hr>
                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-window-restore" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$faculties->web}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                            <hr>
                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-envelope" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$faculties->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                            <hr>
                            <blockquote>
                                <div class="list-group-item" style="border:none; align-content: center;">
                                    <div class="row">
                                        <div class="col-lg-1" style="margin:0px;">
                                            <i class="fa fa-phone" aria-hidden="true" style="margin:6px; font-size: 25px;"></i>
                                            <br>
                                        </div>
                                        <div class="col-lg-11" style="padding-top: 8px;">
                                            <p>{{$faculties->phone}}</p>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>


                        </div>
                        <!-- studies on faculzty-->
                        <div class="tab-pane fade" id="studies-data" style="padding-top:15px">
                            @foreach($faculties->studies as $study)
                                <div class="list-group-item" style="margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h3 class="header" style="margin-bottom: 20px;">{{$study->name}}</h3>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{route('studies')}}/{{$study->id}}"
                                               class="btn  noborder btn-sm btn-success btn-block"
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
