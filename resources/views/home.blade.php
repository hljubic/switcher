@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-lg-offset-2" style="margin-top: 60px;">
                <div class="panel">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <!-- prikaz postova za neki kolegij-->
                            <!-- create new post -->
                            <div class="list-group col-lg-12">
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
                                                                          style="margin-bottom: 0px; border:none;"
                                                                          required></textarea>

                                                    <input type="hidden" name="created_at" id="inputDate"
                                                           value="{{ date('y-m-d h:i:s') }}">
                                                </div>
                                                <div class="panel-footer" style="">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <a href="#" class="btn btn-sm btn-block "
                                                               data-toggle="collapse" data-target="#collapseFile3"
                                                               style="border-radius:50px;"><i class="fa fa-link"
                                                                                              style="font-size:23px;"></i>

                                                            </a>
                                                        </div>
                                                        <div class="col-md-9">

                                                        </div>
                                                        <div class="col-md-2"
                                                             style="margin-bottom: 0px; max-height:100%;">
                                                            <button type="submit"
                                                                    class="btn noborder btn-sm btn-success btn-block ">
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

                            <div class="list-group col-lg-12">
                                @foreach($posts as $post)
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
                                                                  aria-hidden="true"></i> {{$post->user->name}}</small>
                                                        <br>
                                                        <small><i class="fa fa-clock-o"
                                                                  aria-hidden="true"></i>{{\Carbon\Carbon::parse($post->created_at)->format('d.m.y h:m:s')}}
                                                        </small>
                                                    </div>
                                                    @php
                                                        $comments = \App\Message::where('conversation_id','=', $post->conversation_id)->get();
                                                        $numcomments = count($comments);
                                                    @endphp
                                                    <div class="col-lg-6" style="text-align: right; margin-top: 10px;">
                                                        <button type="button" class="btn noborder btn-default btn-xs"
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
                                                                                @can('delete',$comment)
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
                                                        <div class="col-lg-10"
                                                             style="height: 35px; margin-bottom: 10px;">
                                                            <input class="form-control"
                                                                   style="margin-bottom: 5px; height: 37px;"
                                                                   id="focusedInput" type="text" name="content"
                                                                   placeholder="Napisi komentar...">
                                                        </div>
                                                        <input type="hidden" name="created_at"
                                                               value="{{ date('y-m-d h:m:s') }}">
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
                    </div>
                </div>
            </div>

            <!-- padajuci izbornik s desne strane -->
            <div class="col-lg-3" style="margin-top: 75px;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" class="btn btn-xs"
                                               style="font-size: 16px;" href="#collapseOne"><span
                                                        class="glyphicon glyphicon-paperclip">
                    </span>Kolegiji</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <ul class="list-group">
                                            @foreach($collegiums as $collegium)
                                                <li class="list-group-item"
                                                    style="border-left: solid #d9534f; margin-bottom: 3px; height: 55px;">
                                                    <h6><a href="{{route('collegiums')}}/{{$collegium->id}}"
                                                           style="color:#303030;">{{$collegium->name}}</a></h6>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" class="btn btn-xs"
                                               style="font-size: 16px;" href="#collapseFour"><span
                                                        class="glyphicon glyphicon-tasks">
                    </span>Zadaci</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="list-group">
                                            @foreach($tasks as $task)
                                                <li class="list-group-item"
                                                    style="border-left: solid #ec971f; margin-bottom: 3px;">
                                                    <div class="row">
                                                        <div class="col-lg-3"
                                                             style="border-right: solid; border-color:#ecf0f1;">
                                                            <h5>{{ \Carbon\Carbon::parse($task->deadline)->format('d.m')}} </h5>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <h6><a href="{{route('tasks')}}/{{$task->id}}"
                                                                   style="color:#303030;">{{$task->name}}</a></h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" class="btn btn-xs"
                                               style="font-size: 16px;" href="#collapseFive"><span
                                                        class="glyphicon glyphicon-star">
                    </span>Prijatelji</a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="list-group">
                                            @foreach($friends as $friend)
                                                <li class="list-group-item"
                                                    style="border-left: solid #18bc9c; margin-bottom: 3px; height: 55px;">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <h6><a href="{{route('users')}}/{{$friend->user->id}}"
                                                                   style="color:#303030;">{{$friend->user->name}}</a>
                                                            </h6>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <a style="color: #18bc9c;"
                                                               class="glyphicon glyphicon-comment btn"
                                                               href="#"></a>
                                                        </div>
                                                    </div>
                                                </li>
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