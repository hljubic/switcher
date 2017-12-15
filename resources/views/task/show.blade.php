@extends ('layouts.app')

@section('content')
    <div class="well col-lg-6 col-lg-offset-2" style="margin-top: 50px; background-color: #fff;">
        <div class="list-group">
            <div class="list-group-item " style="border-left: solid #18BC9C;">
                <div class="row">
                    <div class="col-lg-3 " style="border-right:solid #ecf0f1; text-align: center;">

                        <div class="card col-lg-12" style="text-align: center;">

                            <h3 id="deadline"
                                style="padding-top: 15px; padding-bottom: 10px;">{{\Carbon\Carbon::parse($tasks->deadline)->format('d.m')}}</h3>
                        </div>

                        <div class="panel panel-default col-lg-12" style="border: solid #d9534f 2px;">
                            <p id="timer" style="padding-top: 10px; "></p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h3 class="header" style="padding-top: 5px;">{{$tasks->name}}</h3>
                        <p>{{$tasks->type}}</p>
                    </div>
                    @php
                        $taskuser = App\TaskUser::where('user_id','=', Auth::user()->id)->where('task_id','=',$tasks->id)->first();
                    @endphp
                    <div class="col-lg-1" style="text-align: center; padding-top: 13px; ">
                        <div class="btn-group btn-block">
                            <a href="#" class="btn btn-sm btn-success btn-block dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa fa-cogs"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('task_user')}}/create/{{$tasks->id}}">Dodaj studente</a></li>
                                <li><a href="{{route('tasks_edit')}}/{{$tasks->id}}">Ažuriraj zadatak</a></li>
                                <li><a href="{{route('task_user')}}/edit/{{$tasks->id}}">Ažuriraj stanje</a></li>

                            </ul>
                        </div>
                    </div>
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
                                        <div class="col-lg-10">
                                            <p style="padding-top: 13px;">{{$user->name}}</p>
                                        </div>
                                        <div class="col-lg-2">
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
                                <i class="fa fa-edit" aria-hidden="true" style="font-size: 20px;"></i></button>
                        @else
                            <form class="form-horizontal"
                                  action="{{route('followTask')}}/{{$tasks->id}}"
                                  method="POST">
                                {{csrf_field()}}
                                <fieldset>
                                    <button type="submit" class="btn btn-block"
                                            data-toggle="tooltip" data-placement="bottom" title="Dodijeli mi zadatak"
                                            style="border-radius: 0px; background-color: #128770; color: #fff;">
                                        <i class="fa fa-edit" aria-hidden="true" style="font-size: 20px;"></i></button>
                                </fieldset>
                            </form>
                        @endif
                    </div>
                    <div class="col-lg-4 nopadding">

                        <button type="button" class="btn btn-secondary btn-block "
                                data-toggle="collapse" data-target="#collapseExample"
                                style="border-radius: 0px; background-color: #18BC9C; color: #fff;">
                            <i class="fa fa-paperclip" aria-hidden="true" style="font-size: 20px;"></i>

                        </button>
                    </div>
                    <!-- status button-->
                    <div class="col-lg-4 nopadding">
                        @if(count($taskuser) > 0 )
                        <button type="button" class="btn btn-secondary btn-block " data-container="body"
                                data-toggle="popover" title="Status Vašeg zadatka ..." data-content="{{$taskuser->status}}"
                                style="border-radius: 0px; background-color: rgba(24, 188, 156,0.4); color: #fff;">
                            <i class="fa fa-spinner" aria-hidden="true" style="font-size: 20px;"></i>
                        </button>
                            @else
                            <button type="button" class="btn btn-secondary btn-block " data-container="body"
                                    data-toggle="popover" title="Status Vašeg zadatka ..." data-content="Niste upisani na zadatak"
                                    style="border-radius: 0px; background-color: rgba(24, 188, 156,0.4); color: #fff;">
                                <i class="fa fa-spinner" aria-hidden="true" style="font-size: 20px;"></i>
                            </button>
                        @endif
                    </div>

                </div>
            </div>
            <!-- upload file form -->
            <div class="collapse" id="collapseExample">
                <div class="container col-lg-12" style="padding-top: 25px;">
                    <div class="card card-body">
                        <div class="row">
                            <div class="panel panel-deafult col-lg-12">
                                <form action="{{route('upload_file')}}" enctype="multipart/form-data" method="post"
                                      class="form-control-file col-lg-7 ">
                                    {{csrf_field()}}
                                    <h4>Učitajte datoteku</h4>
                                    <small></small>
                                    <br>
                                    <input type="file" name="file" class="form-control nopadding success input-sm">
                                    <br>
                                    <input type="text" class="form-control input-sm" id="description" name="description"
                                           placeholder="Postavite opis datoteke...">
                                    <input type="hidden" name="task_id" id="task_id" value="{{$tasks->id}}">
                                    <br>
                                    <div class="col-lg-3 col-lg-offset-9">
                                        <button type="submit" class="btn btn-success btn-block btn-sm"><i
                                                    class="fa fa-cloud-upload" aria-hidden="true"></i>
                                            Upload
                                        </button>
                                        <br><br>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="col-lg-4 " style="margin-top: 70px;">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 ">
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
                                                <div class="col-lg-9">
                                                    <h5> {{$file->name}}</h5>
                                                    <h6>{{$file->created_at}}</h6>
                                                </div>
                                                <div class="col-lg-3">
                                                    <a style="color: #18bc9c; font-size:17px;" class="glyphicon glyphicon-cloud-download btn"
                                                       target="_blank" href="{{ asset('uploaded_files/' . $file->name) }}"></a>
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
    <script>
        //countown
        // Set the date we're counting down to
        var countDownDate = new Date("{{$tasks->deadline}}").getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and tim
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("timer").innerHTML = days + "d  " + hours + "h  "
                + minutes + "m  " + seconds + "s  ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "ZAVRŠENO";
            }
        }, 1000);

        $(document).ready(function () {
            $('[data-toggle="collapse"]').collapse({
            });
        });

        $(document).ready(function () {
            $('[data-toggle="popover"]').popover({
                placement: 'bottom'
            });
        });
    </script>
    @stack('scripts')

@endsection