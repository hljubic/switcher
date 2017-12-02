@extends ('layouts.app')

@section('content')
    <div class="well col-lg-7 col-lg-offset-2" style="margin-top: 50px; background-color: #fff;">
        <div class="list-group">
            <div class="list-group-item" style="border-left: solid #18BC9C;">
                <div class="row">
                    <div class="col-lg-3" style="border-right:solid #ecf0f1;">
                        <h3 style="padding-top: 20px; padding-left: 16px;">{{\Carbon\Carbon::parse($tasks->deadline)->format('d.m')}}</h3>
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
                                <h3 style="padding-left: 30px;"><i class="fa fa-align-center"></i></h3>
                            </div>
                            <div class="col-lg-9">
                                <p style="padding-top: 20px;">{{$tasks->description}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <h3 style="padding-left: 30px;"><i class="fa fa-paperclip"></i></h3>
                            </div>
                            <div class="col-lg-9">
                                <p style="padding-top: 20px;">{{$tasks->collegium->name}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3>Sudionici</h3>
                        @foreach($tasks->user as $user)
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="list-group-item" style="margin-bottom: 3px;">
                                    <p>{{$user->name}}</p>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

            </div>
            <div class="btn-group btn-group-justified" style="border-radius: 0px;">
                <a href="#" class="btn btn-warning" style="border-radius: 0px;"><i class="fa fa-spinner"
                                                                                   aria-hidden="true"></i>U izradi</a>
                <a href="#" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>Završeno</a>
                <a href="#" class="btn btn-danger" style="border-radius: 0px;"><i class="fa fa-times"
                                                                                  aria-hidden="true"></i>Nije
                    završeno</a>
            </div>
        </div>

    </div>
@endsection