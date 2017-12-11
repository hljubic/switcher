@extends ('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-body">
                <div id="page-content-wrapper">

                    <div class="row">
                        <div class="col-lg-9">
                            <h3 style="">{{$collegiums->name}}</h3>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                                @if($followButton == true)
                                    <a href="{{route('unfollowCollegium')}}/{{$collegiums->id}}"
                                       class="btn btn-success btn-sm">Unfollow</a>
                                @else
                                    <form class="form-horizontal"
                                          action="{{route('followCollegium')}}/{{$collegiums->id}}"
                                          method="POST">
                                        {{csrf_field()}}
                                        <fieldset>
                                            <button type="submit" class="btn btn-success btn-sm">Follow
                                            </button>
                                        </fieldset>
                                    </form>

                                @endif
                                <a href="#" class="btn btn-sm btn-success">Dodaj u razgovor</a>
                            </div>

                        </div>
                    </div>

                    <ul class="nav nav-pills nav-justified" style=" border: 3px; ">
                        <li><a href="#general-data" data-toggle="tab">Osnovni podaci</a></li>
                        <li><a href="#studies-data" data-toggle="tab">Studiji</a></li>
                        <li><a href="#posts-data" data-toggle="tab">Obavijesti</a></li>
                        <li><a href="#tasks-data" data-toggle="tab">Zadaci</a></li>
                        <li><a href="#classes-data" data-toggle="tab">Predavanja / Vježbe </a></li>
                        <li><a href="#student-data" data-toggle="tab">Studenti</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">

                        </div>
                    </div>

                    <div class="tab-content">
                        <!-- prikaz osnovnih podataka  za neki kolegij-->
                        <div class="tab-pane fade active in" id="general-data" style="padding-top:15px">
                            <div class="tab-pane fade active in" id="general-data" style="padding-top:15px">

                                <blockquote>
                                    <div class="list-group-item" style="border:none; align-content: center;">
                                        <div class="row">
                                            <div class="col-lg-1" style="margin:0px;">
                                                <i class="fa fa-paperclip" aria-hidden="true"
                                                   style="margin:6px; font-size: 25px;"></i>
                                                <br>
                                            </div>
                                            <div class="col-lg-11" style="padding-top: 8px;">
                                                <p>{{$collegiums->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                                <hr>
                                <blockquote>
                                    <div class="list-group-item" style="border:none; align-content: center;">
                                        <div class="row">
                                            <div class="col-lg-1" style="margin:0px;">
                                                <i class="fa fa-align-center" aria-hidden="true"
                                                   style="margin:6px; font-size: 25px;"></i>
                                                <br>
                                            </div>
                                            <div class="col-lg-11" style="padding-top: 8px;">
                                                <p>{{$collegiums->description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                                <hr>
                                <blockquote>
                                    <div class="list-group-item" style="border:none; align-content: center;">
                                        <div class="row">
                                            <div class="col-lg-1" style="margin:0px;">
                                                <i class="fa fa-user-circle" aria-hidden="true"
                                                   style="margin:6px; font-size: 25px;"></i>
                                                <br>
                                            </div>
                                            <div class="col-lg-11" style="padding-top: 8px;">
                                                <p>{{$collegiums->professor->title}} {{$collegiums->professor->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                                <hr>
                                <blockquote>
                                    <div class="list-group-item" style="border:none; align-content: center;">
                                        <div class="row">
                                            <div class="col-lg-1" style="margin:0px;">
                                                <i class="fa fa-user-circle" aria-hidden="true"
                                                   style="margin:6px; font-size: 25px;"></i>
                                                <br>
                                            </div>
                                            <div class="col-lg-11" style="padding-top: 8px;">
                                                <p>{{$collegiums->assistent->title}} {{$collegiums->assistent->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>
                        <!-- prikaz studija na kojima se kolegij nalazi-->
                        <div class="tab-pane fade" id="studies-data" style="padding-top:15px">
                            @foreach($collegiums->studies as $study)
                                <div class="list-group-item" style="margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <h3 class="header" style="margin-bottom: 20px;">{{$study->name}}</h3>
                                        </div>
                                        <div class="col-lg-2">
                                            <a href="{{route('studies')}}/{{$study->id}}"
                                               class="btn btn-success btn-block"
                                               style="align-self: flex-start; border-radius: 50px; margin-top: 10px;">Više</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- prikaz postova za neki kolegij-->
                        <div class="tab-pane fade" id="posts-data" style="padding-top:15px;">
                            <!-- create new post -->
                            <div class="list-group col-lg-10 col-lg-offset-1">
                                <div class="list-group-item ">
                                    <div class="panel-default" style="width: 100%;">
                                        <form class="form-horizontal" action="{{route ('posts_create')}}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <fieldset>
                                                <div class="panel-body">
                                                                <textarea class="form-control" rows="2"
                                                                          id="content-body" name="content"
                                                                          placeholder="Napišite objavu"
                                                                          style="margin-bottom: 0px; border:none;"></textarea>
                                                    <input type="hidden" name="created_at" id="inputDate"
                                                           value="{{ date('y-m-d h:i:s') }}">
                                                    <input type="hidden" name="collegium_id"
                                                           value="{{$collegiums->id}}">
                                                </div>
                                                <div class="panel-footer" style="">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <a href="#" class="btn btn-sm btn-block"
                                                               style="border-radius:50px;"><i
                                                                        class="fa fa-link" style="font-size:23px;"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-9"></div>
                                                        <div class="col-md-2"
                                                             style="margin-bottom: 0px; max-height:100%;">
                                                            <button type="submit"
                                                                    class="btn btn-sm btn-success btn-block " [>
                                                                <i class="fa fa-check" style="font-size:21px;"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </fieldset>
                                        </form>
                                    </div>

                                </div>
                            </div>

                            <div class="list-group col-lg-10 col-lg-offset-1">
                                @foreach($collegiums->posts as $post)
                                    <div class="list-group-item" style="margin-bottom: 10px;">
                                        <div class="panel panel-default ">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>{{$post->content}}</p>
                                                    </div>
                                                    <div class="col-lg-6" style="text-align: right;">
                                                        <small><a href="{{route('posts_delete')}}/{{$post->id}}"
                                                                  style="color: #ecf0f1;;"
                                                                  class="btn btn-xs fa fa-times"
                                                                  aria-hidden="true"></a></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <small><i class="fa fa-user"
                                                                  aria-hidden="true"></i> {{$post->user->name}}</small>
                                                        <br>
                                                        <small><i class="fa fa-clock-o"
                                                                  aria-hidden="true"></i> {{$post->created_at}}</small>
                                                    </div>
                                                    <div class="col-lg-6" style="text-align: right; margin-top: 10px;">
                                                        <button type="button" class="btn btn-default btn-xs"
                                                                data-toggle="collapse" data-target="#{{$post->id}}">
                                                            Komentari
                                                        </button>
                                                    </div>
                                                    @php
                                                        $comments = \App\Message::where('conversation_id','=', $post->conversation_id)->get();
                                                    @endphp
                                                    <div class="col-lg-12">
                                                        <div id="{{$post->id}}" class="collapse">
                                                            <br>
                                                            <ul class="list-group">
                                                                @foreach($comments as $comment)
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <h5>{{$comment->content}}</h5>
                                                                            </div>
                                                                            <div class="col-lg-6"
                                                                                 style="text-align: right;">
                                                                                <small>
                                                                                    <a href="{{route('messages_delete')}}/{{$comment->id}}"
                                                                                       style="color: #ecf0f1;"
                                                                                       class="btn btn-xs fa fa-times"
                                                                                       aria-hidden="true"></a></small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <small><i class="fa fa-user"
                                                                                          aria-hidden="true"></i> {{$comment->user->name}}
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-lg-6"
                                                                                 style="text-align: right;">
                                                                                <small><i class="fa fa-clock-o"
                                                                                          aria-hidden="true"></i> {{$comment->created_at}}
                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel-footer">
                                                <form class="form-horizontal"
                                                      action="{{route('messages_create')}}"
                                                      method="POST">
                                                    {{ csrf_field() }}
                                                    <fieldset>
                                                        <div class="col-lg-10" style="height: 35px;">
                                                            <input class="form-control"
                                                                   style="margin-bottom: 5px; height: 37px;"
                                                                   id="focusedInput" type="text" name="content"
                                                                   placeholder="Napisi komentar...">
                                                        </div>
                                                        <input type="hidden" name="created_at"
                                                               value="{{ date('d-m-y') }}">
                                                        <input type="hidden" name="conversation_id"
                                                               value="{{$post->conversation_id}}">
                                                        <div class="col-lg-2">
                                                            <button type="submit"
                                                                    class="btn btn-success btn btn-sm">
                                                                Komentiraj
                                                            </button>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- prikaz taskova na kolegiju -->
                        <div class="tab-pane fade" id="tasks-data" style="padding-top:15px">

                            <h3>Seminarski radovi</h3>
                            <hr>
                            @foreach($collegiums->tasks as $task)
                                @if($task->type =='seminar paper')
                                    <div class="list-group-item"
                                         style="margin-bottom: 10px; border-left:solid #18BC9C 6px;">
                                        <div class="row">
                                            <div class="col-lg-2"
                                                 style="border-right: solid #ecf0f1; text-align: center;">
                                                <h4 class="header"
                                                    style="padding-top:20px;">{{\Carbon\Carbon::parse($task->deadline)->format('d.m')}}</h4>
                                                <p style="padding-top:20px;"></p>
                                            </div>

                                            <div class="col-lg-8">
                                                <h4 class="header" style="padding-top: 15px;">{{$task->name}}</h4>
                                                <p>{{$task->type}}</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <a href="{{route('tasks')}}/{{$task->id}}"
                                                   class="btn btn-success btn-block"
                                                   style="align-self: flex-start; border-radius: 50px; margin-top: 25px;">Više</a>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            @endforeach
                            <h3 style="margin-top: 25px;">Projektni zadaci</h3>
                            <hr>
                            @foreach($collegiums->tasks as $task)
                                @if ($task->type =='project')

                                    <div class="list-group-item"
                                         style="margin-bottom: 10px; border-left:solid #ec971f 6px;">
                                        <div class="row">
                                            <div class="col-lg-2"
                                                 style="border-right: solid #ecf0f1; text-align: center;">
                                                <h4 class="header"
                                                    style="padding-top:25px;">{{\Carbon\Carbon::parse($task->deadline)->format('d.m')}}</h4>
                                                <p style="padding-top:20px;"></p>
                                            </div>
                                            <div class="col-lg-8">
                                                <h4 class="header" style="margin-top: 25px;">{{$task->name}}</h4>
                                                <p>{{$task->type}}</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <a href="{{route('tasks')}}/{{$task->id}}"
                                                   class=" btn btn-warning btn-block"
                                                   style="align-self: flex-start; border-radius: 50px; margin-top: 25px;">Više</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <h3 style="margin-top: 25px;">Zadaća</h3>
                            <hr>
                            @foreach($collegiums->tasks as $task)
                                @if($task->type =='homework')
                                    <div class="list-group-item"
                                         style="margin-bottom: 10px; border-left:solid  #d9534f 6px;">
                                        <div class="row">
                                            <div class="col-lg-2"
                                                 style="border-right: solid #ecf0f1; text-align: center;">
                                                <h4 class="header"
                                                    style="padding-top:20px;">{{\Carbon\Carbon::parse($task->deadline)->format('d.m')}}</h4>
                                                <p style="padding-top:20px;"></p>
                                            </div>
                                            <div class="col-lg-8">
                                                <h4 class="header" style="padding-top: 15px;">{{$task->name}}</h4>
                                                <p>{{$task->type}}</p>
                                            </div>
                                            <div class="col-lg-2">
                                                <a href="{{route('tasks')}}/{{$task->id}}"
                                                   class="btn btn-danger btn-block"
                                                   style="align-self: flex-start; border-radius: 50px; margin-top: 25px;">Više</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- classes -->
                        <div class="tab-pane fade" id="classes-data" style="padding-top:15px">
                            <form class="form-horizontal" action="{{ route('classes_create') }}" method="POST">
                                {{ csrf_field() }}
                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <select class="form-control" id="select" name="type">
                                                <option value="lecture">Predavanja</option>
                                                <option value="exercises">Vježbe</option>
                                                <option value="laboratory exercises">Laboratorijske vježbe</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="collegium_id" value="{{$collegiums->id}}">
                                        <input type="hidden" name="created_at" value="{{ date('y-m-d h:i:s') }}">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-primary">Dodaj</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            <br><br>
                            @foreach($collegiums->classe as $classe)
                                @if($classe->type == 'lecture')
                                    <div class="list-group-item"
                                         style="margin-bottom: 10px; border-left:solid #18BC9C 6px;">
                                        <div class="row">
                                            <div class="col-lg-2"
                                                 style="border-right:solid #ecf0f1; text-align: center;">
                                                <h4 style="margin-top: 35px;">{{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}</h4>
                                                <p>{{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}} h</p>
                                                <p style="padding-top: 15px;"></p>
                                            </div>
                                            <div class="col-lg-8">
                                                <h4 class="header" style="margin-top: 50px;">Predavanje</h4>
                                            </div>
                                            <div class="col-lg-2" style="margin-top: 15px;">
                                                <a href="{{route('attendances')}}/{{$classe->id}}"
                                                   class="btn btn-success btn-block"
                                                   style="align-self: flex-start; border-radius: 50px; margin-top: 25px;">Prisutnost</a>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($classe->type == 'exercises')
                                    <div class="list-group-item"
                                         style="margin-bottom: 10px; border-left:solid #ec971f 6px;">
                                        <div class="row">
                                            <div class="col-lg-2"
                                                 style="border-right:solid #ecf0f1; text-align: center;">
                                                <h4 style="margin-top: 35px;">{{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}</h4>
                                                <p>{{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}} h</p>
                                                <p style="padding-top: 15px;"></p>
                                            </div>
                                            <div class="col-lg-8">
                                                <h4 class="header" style="margin-top: 50px; vertical-align: middle;">
                                                    Vježbe</h4>
                                            </div>
                                            <div class="col-lg-2" style="margin-top: 15px;">
                                                <a href="{{route('attendances')}}/{{$classe->id}}"
                                                   class="btn btn-warning btn-block"
                                                   style="align-self: flex-start; border-radius: 50px; margin-top: 25px;">Prisutnost</a>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="list-group-item"
                                         style="margin-bottom: 10px; border-left:solid #d9534f 6px;">
                                        <div class="row">
                                            <div class="col-lg-2"
                                                 style="border-right:solid #ecf0f1; text-align: center;">
                                                <h4 style="margin-top: 35px;">{{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}</h4>
                                                <p>{{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}} h</p>
                                                <p style="padding-top: 15px;"></p>
                                            </div>
                                            <div class="col-lg-8">
                                                <h4 class="header" style="margin-top: 50px; vertical-align: middle;">
                                                    Laboratorijske vježbe</h4>
                                            </div>
                                            <div class="col-lg-2" style="margin-top: 15px;">
                                                <a href="{{route('attendances')}}/{{$classe->id}}"
                                                   class="btn btn-danger btn-block"
                                                   style="align-self: flex-start; border-radius: 50px; margin-top: 25px;">Prisutnost</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <!-- lista studenata na kolegiju-->
                        <div class="tab-pane fade" id="student-data" style="padding-top:15px">
                            @foreach($collegiums->user as $user)
                                <div class="list-group-item"
                                     style="margin-bottom: 10px; border-left:solid  #d9534f 6px;">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <h4 class="header" style="margin-top: 25px;">{{$user->name}}</h4>
                                        </div>
                                        <div class="col-lg-2">
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
    </div>
    </div>
    </div>
    </div>

@endsection
