@extends ('layouts.app')

@section('content')
    @if($collegiums)
        <div class="col-lg-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 50px;">
                <div class="panel-body">
                    <div id="page-content-wrapper">
                        <div class="row">
                            <div class="col-lg-9">
                                <h3>{{$collegiums->name}}</h3>
                            </div>
                            <div class="col-lg-3">
                                <form class="form-horizontal"
                                      action="{{route('followCollegium')}}/{{$collegiums->id}}"

                                      method="POST">
                                    {{csrf_field()}}
                                    <div class="row">

                                        @can('create',App\Conversation::class)

                                            <a href="#" class="btn btn-sm noborder btn-success">Dodaj u razgovor</a>
                                        @endcan

                                        <div class="col-lg-offset-5 col-lg-4 ">
                                            @if($followButton == true)
                                                @can('prikazi',$collegiums)
                                                    <a href="{{route('unfollowCollegium')}}/{{$collegiums->id}}"
                                                       class="btn btn-success noborder btn-sm">Prestani pratiti</a>@endcan
                                            @else

                                                @can('prikazi',$collegiums)
                                                    <button type="submit" class="btn btn-success noborder btn-sm">Prati kolegij
                                                    </button>@endcan


                                            @endif
                                        </div>



                                    </div>
                                </form>

                            </div>
                        </div>
                        @php

                            $numuser = count($collegiums->user);

                        @endphp

                        <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
                            <li><a href="#general-data" data-toggle="tab">Osnovni podaci</a></li>
                            <li><a href="#studies-data" data-toggle="tab">Studiji</a></li>
                            <li><a href="#posts-data" data-toggle="tab">Obavijesti</a></li>
                            <li><a href="#tasks-data" data-toggle="tab">Zadaci</a></li>
                            <li><a href="#classes-data" data-toggle="tab">Predavanja / Vježbe </a></li>
                            <li><a href="#student-data" data-toggle="tab">Studenti
                                    @if($collegiums->user) <span class="badge"
                                                                 style="background-color:#18BC9C; font-size: 15px; width: 27px;"> {{$numuser}} </span> @endif
                                </a>
                            </li>
                            <li><a href="#file-data" data-toggle="tab">Datoteke</a></li>

                        </ul>

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
                                @if($collegiums)
                                    @foreach($collegiums->studies as $study)
                                        <div class="list-group-item" style="margin-bottom: 10px;">
                                            <div class="row">
                                                <div class="col-lg-10">
                                                    <h3 class="header"
                                                        style="margin-bottom: 20px;">{{$study->name}}</h3>
                                                </div>
                                                <div class="col-lg-2">
                                                    <a href="{{route('studies')}}/{{$study->id}}"
                                                       class="btn btn-success btn-sm noborder btn-block"
                                                       style="align-self: flex-start; margin-top: 13px;">Više</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-lg-10 col-md-offset-1">
                                        <div class="panel panel-default" style="margin-top: 50px;">
                                            <div class="panel-body">
                                                <div id="page-content-wrapper">

                                                    <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Trenutno kolegij nije dodijeljen
                                                        studiju</p>
                                                    <div class="row">
                                                        @can('create', App\Task::class)
                                                            <a href="{{route('collegium_study_create')}}"
                                                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj
                                                                kolegij</a>
                                                        @endcan
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- prikaz postova za neki kolegij-->
                            <div class="tab-pane fade" id="posts-data" style="padding-top:15px;">
                                <!-- create new post -->
                                <div class="list-group col-lg-10 col-lg-offset-1">
                                    <div class="list-group-item ">
                                        <div class="panel-default" style="width: 100%;">
                                            <form class="form-horizontal" action="{{route ('posts_create')}}"
                                                  method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <fieldset>
                                                    <div class="panel-body">
                                                                <textarea class="form-control" rows="2"
                                                                          id="content-body" name="content"
                                                                          placeholder="Napišite objavu"
                                                                          style="margin-bottom: 0px; border:none;" required></textarea>
                                                        <input type="hidden" name="created_at" id="inputDate"
                                                               value="{{ date('y-m-d h:i:s') }}">
                                                        <input type="hidden" name="collegium_id"
                                                               value="{{$collegiums->id}}">
                                                    </div>
                                                    <div class="panel-footer" style="">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <a href="#" class="btn btn-sm btn-block"
                                                                   data-toggle="collapse" data-target="#collapseFile3"
                                                                   style="border-radius:50px;"><i class="fa fa-link"
                                                                                                  style="font-size:23px;"></i>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-9"></div>
                                                            <div class="col-md-2"
                                                                 style="margin-bottom: 0px; max-height:100%;">
                                                                <button type="submit"
                                                                        class="btn btn-sm  noborder btn-success btn-block ">
                                                                    <i class="fa fa-check" style="font-size:21px;"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collapse" id="collapseFile3">
                                                        <input type="file" name="file"
                                                               class="form-control nopadding success input-sm">

                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                                <!-- end create post-->
                                <!-- prikaz postova na kolegiju -->
                                <div class="list-group col-lg-10 col-lg-offset-1">
                                    @foreach($collegiums->posts as $post)
                                        <div class="list-group-item" style="margin-bottom: 10px;">
                                            <div class="panel panel-default ">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <p>{{$post->content}}</p>
                                                            @if($post->file)
                                                                <a style="color: #18bc9c; font-size:17px;"
                                                                   target="_blank"
                                                                   href="{{ asset('uploaded_files/' . $post->file->name) }}">{{$post->file->name}}</a>
                                                            @endif
                                                        </div>

                                                        <div class="col-lg-6" style="text-align: right;">
                                                            @can('delete',$post)
                                                                <small><a href="{{route('posts_delete')}}/{{$post->id}}"
                                                                          style="color: #ecf0f1;;"
                                                                          class="btn btn-xs fa fa-times"
                                                                          aria-hidden="true"></a></small>@endcan
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <small><i class="fa fa-user"
                                                                      aria-hidden="true"></i> {{$post->user->name}}
                                                            </small>
                                                            <br>
                                                            <small><i class="fa fa-clock-o"
                                                                      aria-hidden="true"></i>{{\Carbon\Carbon::parse($post->created_at)->format('d.m.y h:m:s')}}
                                                            </small>
                                                        </div>
                                                        @php
                                                            $comments = \App\Message::where('conversation_id','=', $post->conversation_id)->get();
                                                            $numcomments = count($comments);
                                                        @endphp
                                                        <div class="col-lg-6"
                                                             style="text-align: right; margin-top: 10px;">
                                                            <button type="button"
                                                                    class="btn noborder btn-default btn-xs"
                                                                    data-toggle="collapse" data-target="#{{$post->id}}">
                                                                Komentari <span class="badge"
                                                                                style=" font-size: 12px; width: 20px;"> {{$numcomments}}</span>
                                                            </button>
                                                        </div>

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
                                                                                    @can('delete', $comment)

                                                                                        <small>
                                                                                            <a href="{{route('messages_delete')}}/{{$comment->id}}"
                                                                                               style="color: #ecf0f1;"
                                                                                               class="btn btn-xs fa fa-times"
                                                                                               aria-hidden="true"></a>
                                                                                        </small>

                                                                                    @endcan
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
                                                                                              aria-hidden="true"></i> {{\Carbon\Carbon::parse($comment->created_at)->format('d.m.y h:m:s')}}
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
                                                                   value="{{date('y-m-d h:m:s')}}">
                                                            <input type="hidden" name="conversation_id"
                                                                   value="{{$post->conversation_id}}">
                                                            <div class="col-lg-2">
                                                                <button type="submit"
                                                                        class="btn noborder btn-success btn-sm">
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
                                @if($collegiums)
                                    @can('create', App\Task::class)


                                        <button type="button" class="btn btn-sm btn-success noborder"
                                                data-toggle="collapse" data-target="#collapseExample">Novi zadatak
                                        </button>

                                    @endcan
                                    <div class="collapse" id="collapseExample">
                                        <div class="container col-lg-12" style="padding-top: 35px;">
                                            <div class="card card-body">
                                                <div class="row">
                                                    <div class="panel panel-deafult col-lg-12">

                                                        <form class="form-horizontal"
                                                              action="{{ route('tasks_create') }}"
                                                              method="POST">
                                                            {{ csrf_field() }}
                                                            <fieldset>
                                                                <div class="row">
                                                                    <div class="row col-lg-12"
                                                                         style="padding-bottom:10px;">
                                                                        <div class="col-lg-6">
                                                                            <input type="text"
                                                                                   class="form-control noborder"
                                                                                   id="inputName" name="name"
                                                                                   placeholder="Naslov">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <input type="text"
                                                                                   class="form-control datepicker noborder"
                                                                                   id="inputDate"
                                                                                   name="deadline"
                                                                                   placeholder="Datum i vrijeme">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row col-lg-12 "
                                                                         style="padding-bottom:10px;">
                                                                        <div class="col-lg-6">
                                             <textarea class="form-control noborder" rows="3" id="textArea"
                                                       name="description"
                                                       placeholder="Opis zadatka"></textarea>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <select class="form-control noborder"
                                                                                    id="select"
                                                                                    name="type">
                                                                                <option value="seminar paper">Seminarski
                                                                                    rad
                                                                                </option>
                                                                                <option value="homework">Zadaća</option>
                                                                                <option value="project">Projektni
                                                                                    zadatak
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row col-lg-12">
                                                                        <div class="col-lg-10"
                                                                             style="align-content: flex-start;">
                                                                            <input type="hidden" name="collegium_id"
                                                                                   value="{{$collegiums->id}}">
                                                                            <input type="hidden" name="created_at"
                                                                                   value="{{ date('y-m-d h:i:s') }}">
                                                                        </div>
                                                                        <div class="col-lg-2">
                                                                            <button type="submit"
                                                                                    class="btn swt-button-prim btn-sm btn-block">
                                                                                Spremi
                                                                            </button>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <!-- seminraski radovi -->
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
                                                        <h4 class="header"
                                                            style="padding-top: 15px;">{{$task->name}}</h4>
                                                        <p>{{$task->type}}</p>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <a href="{{route('tasks')}}/{{$task->id}}" data-toggle="tooltip"
                                                           data-placement="bottom" title="Pregledaj zadatak"
                                                           class=" btn  noborder btn-success btn-block btn-sm"
                                                           style="align-self: flex-start; margin-top: 25px;">Više </a>

                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach
                                <!-- projekti -->
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
                                                        <h4 class="header"
                                                            style="margin-top: 25px;">{{$task->name}}</h4>
                                                        <p>{{$task->type}}</p>
                                                    </div>
                                                    <div class="col-lg-2">

                                                        <a href="{{route('tasks')}}/{{$task->id}}" data-toggle="tooltip"
                                                           data-placement="bottom" title="Pregledaj zadatak"
                                                           class=" btn noborder btn-warning btn-block btn-sm"
                                                           style="align-self: flex-start; margin-top: 25px;">Više</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                <!--zadaće -->
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
                                                        <h4 class="header"
                                                            style="padding-top: 15px;">{{$task->name}}</h4>
                                                        <p>{{$task->type}}</p>
                                                    </div>
                                                    <div class="col-lg-2">

                                                        <a href="{{route('tasks')}}/{{$task->id}}" data-toggle="tooltip"
                                                           data-placement="bottom" title="Pregledaj zadatak"
                                                           class=" btn noborder btn-danger btn-block btn-sm"
                                                           style="align-self: flex-start; margin-top: 25px;">Više</a>


                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="col-lg-10 col-md-offset-1">
                                        <div class="panel panel-default" style="margin-top: 50px;">
                                            <div class="panel-body">
                                                <div id="page-content-wrapper">

                                                    <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Trenutno nema zadataka na kolegiju
                                                        podataka</p>
                                                    <div class="row">
                                                        @can('create', App\Task::class)
                                                            <a href="{{route('tasks_create')}}"
                                                               class="btn btn-success noborder col-lg-offset-4 col-lg-3">Dodaj
                                                                zadatak</a>@endcan
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- classes -->
                            <div class="tab-pane fade" id="classes-data" style="padding-top:15px">
                                @if($collegiums)
                                    <form class="form-horizontal" action="{{ route('classes_create') }}" method="POST">
                                        {{ csrf_field() }}
                                        <fieldset>
                                            <div class="row">
                                                @can('create',App\Classe::class)
                                                    <div class="col-lg-4">
                                                        <select class="form-control noborder" id="select" name="type">
                                                            <option value="lecture">Predavanja</option>
                                                            <option value="exercises">Vježbe</option>
                                                            <option value="laboratory exercises">Laboratorijske vježbe
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="collegium_id"
                                                           value="{{$collegiums->id}}">
                                                    <input type="hidden" name="created_at"
                                                           value="{{ date('y-m-d h:i:s') }}">
                                                    <div class="col-lg-6">
                                                        <button type="submit" class="btn swt-button-prim">Dodaj</button>
                                                    </div>
                                                @endcan
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
                                                        <p>{{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                                            h</p>
                                                        <p style="padding-top: 15px;"></p>
                                                    </div>
                                                    <div class="col-lg-8">

                                                        <h4 class="header" style="margin-top: 50px;">Predavanje</h4>
                                                    </div>
                                                    <div class="col-lg-2" style="margin-top: 15px;">
                                                        @can('store',$classe)

                                                            <a href="{{route('attendances')}}/{{$classe->id}}"
                                                               class="btn btn-sm noborder btn-success btn-block"
                                                               style="align-self: flex-start; margin-top: 32px;">Prisutnost</a>@endcan
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
                                                        <p>{{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                                            h</p>
                                                        <p style="padding-top: 15px;"></p>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h4 class="header"
                                                            style="margin-top: 50px; vertical-align: middle;">
                                                            Vježbe</h4>
                                                    </div>
                                                    <div class="col-lg-2" style="margin-top: 15px;">
                                                        @can('store',$classe)

                                                            <a href="{{route('attendances')}}/{{$classe->id}}"
                                                               class="btn btn-sm noborder btn-warning btn-block"
                                                               style="align-self: flex-start; margin-top: 32px;">Prisutnost</a>@endcan
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
                                                        <p>{{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                                            h</p>
                                                        <p style="padding-top: 15px;"></p>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h4 class="header"
                                                            style="margin-top: 50px; vertical-align: middle;">
                                                            Laboratorijske vježbe</h4>
                                                    </div>
                                                    <div class="col-lg-2" style="margin-top: 15px;">
                                                        @can('store',$classe)
                                                            <a href="{{route('attendances')}}/{{$classe->id}}"
                                                               class="btn btn-sm btn-danger noborder btn-block"
                                                               style="align-self: flex-start; margin-top: 32px;">Prisutnost</a>@endcan
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="col-lg-10 col-md-offset-1">
                                        <div class="panel panel-default" style="margin-top: 50px;">
                                            <div class="panel-body">
                                                <div id="page-content-wrapper">

                                                    <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Trenutno nema predavanja na
                                                        kolegiju</p>
                                                    <div class="row">
                                                        @can('create', App\Task::class)
                                                            <a href="{{route('classes_create')}}"
                                                               class="btn btn-success noborder col-lg-offset-4 col-lg-3">Dodaj
                                                                predavanje</a>@endcan
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- lista studenata na kolegiju-->
                            <div class="tab-pane fade" id="student-data" style="padding-top:15px">
                                @if($collegiums)
                                    @foreach($collegiums->user as $user)
                                        @php
                                            $classes = App\Classe::with('collegium')->where('collegium_id','=',$collegiums->id)->get(['classes.id'])->count();
                                            $class = App\Classe::with('collegium')->leftJoin('attendances','attendances.class_id','=','classes.id')->where('collegium_id','=',$collegiums->id)->where('user_id','=',$user->id)->get(['classes.id'])->count();

                                            if($classes > 0){

                                                $percentage = ($class / $classes) * 100;
                                            }
                                        @endphp
                                        <div class="list-group-item"
                                             style="margin-bottom: 10px; border-left:solid  #ecf0f1 6px;">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="item">
                                                        <div id="profileCol">{{substr($user->name,0,1)}}</div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <h4 class="header" id="storename"
                                                        style="padding-top: 30px; padding-left: 15px;">{{$user->name}}</h4>
                                                </div>
                                                <!-- postotak prisutnosti-->
                                                <div class="col-lg-2">
                                                    @if($classes > 0)
                                                        <div class="flex-wrapper" data-toggle="tooltip "
                                                             title=" Prisutnost za  {{$collegiums->name}}"
                                                             style="padding-top: 12px;">
                                                            @if($percentage >= 0 and $percentage < 50)
                                                                <div class="single-chart">
                                                                    <svg viewbox="0 0 36 36" class="circular-chart red">
                                                                        <path class="circle-bg"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <path class="circle"
                                                                              stroke-dasharray="30, 100"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <text x="18" y="20.35"
                                                                              class="percentage">{{ number_format((float)$percentage, 2, '.', '')}}
                                                                            %
                                                                        </text>
                                                                    </svg>
                                                                </div>
                                                            @elseif($percentage >= 50 and $percentage < 75)
                                                                <div class="single-chart">
                                                                    <svg viewbox="0 0 36 36"
                                                                         class="circular-chart yellow">
                                                                        <path class="circle-bg"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <path class="circle"
                                                                              stroke-dasharray="60, 100"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <text x="18" y="20.35"
                                                                              class="percentage">{{ number_format((float)$percentage, 2, '.', '')}}
                                                                            %
                                                                        </text>
                                                                    </svg>
                                                                </div>
                                                            @elseif($percentage >= 75 and $percentage < 99)
                                                                <div class="single-chart">
                                                                    <svg viewbox="0 0 36 36"
                                                                         class="circular-chart green">
                                                                        <path class="circle-bg"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <path class="circle"
                                                                              stroke-dasharray="90, 100"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <text x="18" y="20.35"
                                                                              class="percentage">{{ number_format((float)$percentage, 2, '.', '')}}
                                                                            %
                                                                        </text>
                                                                    </svg>
                                                                </div>
                                                            @else
                                                                <div class="single-chart">
                                                                    <svg viewbox="0 0 36 36"
                                                                         class="circular-chart green">
                                                                        <path class="circle-bg"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <path class="circle"
                                                                              stroke-dasharray="100, 100"
                                                                              d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
                                                                        />
                                                                        <text x="18" y="20.35"
                                                                              class="percentage">{{ number_format((float)$percentage, 2, '.', '')}}
                                                                            %
                                                                        </text>
                                                                    </svg>
                                                                </div>
                                                            @endif

                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-lg-10 col-md-offset-1">
                                        <div class="panel panel-default" style="margin-top: 50px;">
                                            <div class="panel-body">
                                                <div id="page-content-wrapper">

                                                    <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Trenutno nema upisanih studenata na
                                                        kolegiju</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- datoteke na kolegiju-->
                            <div class="tab-pane fade" id="file-data" style="padding-top:15px">
                                @if($collegiums)
                                    @foreach($collegiums->posts as $post)
                                        @if($post->file)
                                            <div class="list-group-item"
                                                 style="margin-bottom: 10px; border-left:solid  #ecf0f1 6px;">
                                                <a style="color: #18bc9c; font-size:17px;" target="_blank"
                                                   href="{{ asset('uploaded_files/' . $post->file->name) }}">{{$post->file->name}}</a>
                                                <br>
                                                <small>{{$post->user->name}}</small>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="col-lg-10 col-md-offset-1">
                                        <div class="panel panel-default" style="margin-top: 50px;">
                                            <div class="panel-body">
                                                <div id="page-content-wrapper">

                                                    <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Trenutno nema datoteka na kolegiju</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-12 ">
            <div class="panel panel-default" style="margin-top: 50px;">
                <div class="panel-body">
                    <div id="page-content-wrapper">

                        <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Ne postoji kolegij</p>
                        <div class="row">
                            <a href="{{route('collegiums_create')}}"
                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj kolegij</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @endif
    <script>
        $(document).ready(function () {
            var storename = $('#storename').text();
            var intials = $('#storename').text().charAt(0);
            var profile = $('#profileCol').text(intials);
        });

        $(document).ready(function () {
            $('[data-toggle="collapse"]').collapse({});
        });
    </script>
    @stack('scripts')
@endsection
