@extends ('layouts.app')

@section('content')
    <div class="well col-lg-6 col-lg-offset-2" style="margin-top: 50px; background-color: #fff;">
        <div class="list-group">
            <div class="list-group-item" style="border-left: solid #18BC9C;">
                <div class="row">
                    <div class="col-lg-2" style="border-right:solid #ecf0f1; text-align: center;">
                        <h3 style="padding-top: 20px;">{{\Carbon\Carbon::parse($tasks->deadline)->format('d.m')}}</h3>
                        <p style="padding-top: 15px;"></p>
                    </div>
                    <div class="col-lg-7">
                        <h3 class="header" style="margin-top: 25px;">{{$tasks->name}}</h3>
                        <p>{{$tasks->type}}</p>
                    </div>
                    <div class="col-lg-2" style="border-left:solid #ecf0f1;"></div>
                </div>
            </div>
            <div class="list-group-item">
                <div class="row">
                    <div class="col-lg-6" style="border-right:solid #ecf0f1; margin-bottom: 25px; margin-top: 15px;">
                        <div class="row">
                            <div class="col-lg-3">
                                <h4 style="padding-left: 30px; padding-top: 13px;"><i class="fa fa-align-center"></i>
                                </h4>
                            </div>
                            <div class="col-lg-9">
                                <p style="padding-top: 20px;">{{$tasks->description}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h4 style="padding-left: 30px; padding-top: 13px;"><i class="fa fa-paperclip"></i></h4>
                            </div>
                            <div class="col-lg-9">
                                <p style="padding-top: 20px;">{{$tasks->collegium->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="col-lg-12 "><i class="fa fa-users" aria-hidden="true"
                                                  style="padding-top: 20px;"></i>
                            Sudionici</h4>
                        @foreach($tasks->user as $user)
                            <div class="col-lg-12 " style="margin-top: 10px;">
                                <div class="list-group-item" style="margin-bottom: 3px;">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <p style="padding-top: 13px;">{{$user->name}}</p>
                                        </div>
                                        <div class="col-lg-3">
                                            <a style="color: #18bc9c;" class="glyphicon glyphicon-comment btn"
                                               href="#"></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="list-group-item nopadding">
                <div class="nav nav-pills nav-justified ">
                    <div class="col-lg-4 nopadding">


                        @if($followButton == true)
                            <button type="submit" class="btn btn-block disabled"
                                    data-toggle="tooltip" data-placement="bottom" title="Vec ste dodijeljeni na zadatak"
                                    style="border-radius: 0px; background-color: #128770; color: #fff;">
                                <i class="fa fa-user-circle" aria-hidden="true"></i></button>
                        @else
                            <form class="form-horizontal"
                                  action="{{route('followTask')}}/{{$tasks->id}}"
                                  method="POST">
                                {{csrf_field()}}
                                <fieldset>
                                    <button type="submit" class="btn btn-block"
                                            data-toggle="tooltip" data-placement="bottom" title="Dodijeli mi zadatak"
                                            style="border-radius: 0px; background-color: #128770; color: #fff;">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i></button>
                                </fieldset>
                            </form>
                        @endif
                    </div>
                    <div class="col-lg-4 nopadding">

                        <button type="button" class="btn btn-secondary btn-block "
                                data-toggle="tooltip" data-placement="bottom" title="Dodaj datoteku"
                                style="border-radius: 0px; background-color: #18BC9C; color: #fff;">
                            <i class="fa fa-paperclip" aria-hidden="true"></i>

                        </button>
                    </div>
                    <div class="col-lg-4 nopadding">

                            <button type="button" class="btn btn-secondary btn-block " data-container="body"
                                    data-toggle="popover" data-content="status"
                                    style="border-radius: 0px; background-color: rgba(24, 188, 156,0.4); color: #fff;">
                                <i class="fa fa-spinner" aria-hidden="true"></i>
                            </button>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" style="margin-top: 70px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" class="btn btn-xs"
                                           style="font-size: 16px; color:#18BC9C;" href="#collapseOne"><span
                                                    class="glyphicon glyphicon-pushpin"></span>Datoteke</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <ul class="list-group">
                                        @foreach($tasks->files as $file)
                                            <li class="list-group-item"
                                                style="border-left: solid #18BC9C; margin-bottom: 3px;">
                                                <div class="row">

                                                    <div class="col-lg-8">
                                                        <h5> {{$file->name}}</h5>
                                                        <h6>{{$file->created_at}}</h6>
                                                    </div>
                                                </div>


                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection