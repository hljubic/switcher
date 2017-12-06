@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-lg-offset-2">
                <div class="panel">
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>

                            <ul class="pager">
                                <li><a href="{{route('posts_create')}}"><i class="fa fa-plus-circle"
                                                                          aria-hidden="true"></i></a></li>
                            </ul>

                            <div class="modal-dialog" style="width: 100%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title">Objava </h4>

                                    </div>
                                    @foreach($posts as $post)
                                        <div class="modal-body">
                                            <p>{{$post->content}}</p>
                                            <small><i class="fa fa-user"
                                                      aria-hidden="true"></i> {{$post->user->name}}</small>
                                            <br>
                                            <small><i class="fa fa-clock-o"
                                                      aria-hidden="true"></i> {{$post->created_at}}</small>
                                            <div class="modal-footer">
                                                <form class="form-horizontal">
                                                    <div class="row">
                                                        <div class="col-lg-9">
                                                            <input class="form-control" style="margin-bottom: 5px;"
                                                                   id="focusedInput" type="text"
                                                                   placeholder="Napisi komentar...">
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button type="button" class="btn btn-primary">Komentiraj
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3" style="margin-top: 100px;">
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
                                                <li class="list-group-item" style="border-left: solid #d9534f; margin-bottom: 3px; height: 55px;">
                                                   <h6>{{$collegium->name}}</h6>
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
                                                <li class="list-group-item" style="border-left: solid #ec971f; margin-bottom: 3px;">
                                                    <div class="row">
                                                        <div class="col-lg-3" style="border-right: solid; border-color:#ecf0f1;">
                                                            <h5>{{ \Carbon\Carbon::parse($task->deadline)->format('d.m')}} </h5>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <h6>{{$task->name}}</h6>
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
                                                <li class="list-group-item" style="border-left: solid #18bc9c; margin-bottom: 3px; height: 55px;">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <h6>{{$friend->user->name}}</h6>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <a style="color: #18bc9c;" class="glyphicon glyphicon-comment btn" href="{{route('users')}}/{{$friend->user->id}}"></a>
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