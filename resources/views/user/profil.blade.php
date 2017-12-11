@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="margin-top: 50px;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="item">
                                    <div id="profile">{{substr($user->name,0,1)}}</div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <h4 id="storename">{{$user->name}}</h4>

                                <div class="row">
                                    <div class="col-lg-3" style="text-align: center; font-weight: bold;">
                                        <small>Pratitelji</small>
                                        <h5>{{$followers}}</h5>
                                    </div>
                                    <div class="col-lg-5" style="text-align: center; font-weight: bold;">
                                        <small>Pratim</small>
                                        <h5>{{$following}}</h5>
                                    </div>
                                    <div class="col-lg-3" style="text-align: center; font-weight: bold;">
                                        <small>Objave</small>
                                        <h5>{{$user->posts->count()}}</h5>
                                    </div>
                                </div>
                                <br>
                                @if(Auth::user()->id == $user->id)
                                    <a href="{{route('users_edit')}}/{{$user->id}}" class="btn btn-success btn-sm"
                                       style="width: 100%;">
                                        Uredi</a></td>
                                @elseif($followButton == true)
                                    <div class="row">
                                        <a href="{{route('unfollow')}}/{{$user->id}}"
                                           class="btn btn-success btn-sm col-lg-6"
                                           style="width: 120px; margin-left: 16px;">
                                            Unfollow</a>
                                        <a href="#" class="btn btn-success disabled btn-sm col-lg-6"
                                           style="width: 120px; margin-left: 20px;">Poruka</a>
                                    </div>
                                @else
                                    <div class="row">
                                        <form class="form-horizontal col-lg-6"
                                              action="{{route('follow')}}/{{$user->id}}"
                                              method="POST">
                                            {{csrf_field()}}
                                            <fieldset>
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        style="width: 120px;">
                                                    Follow
                                                </button>
                                            </fieldset>
                                        </form>
                                        <a href="#" class="btn btn-success disabled btn-sm col-lg-4"
                                           style="width: 120px;">Poruka</a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <blockquote>
                                    <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$user->type}}</h5>
                                    <h5><i class="fa fa-envelope" aria-hidden="true"></i> {{$user->email}}</h5>
                                    <h5><i class="fa fa-phone" aria-hidden="true"></i> {{$user->phone}}</h5>
                                    <h5><i class="fa fa-book" aria-hidden="true"></i> {{$user->index_number}}</h5>
                                    <h5><i class="fa fa-university" aria-hidden="true"></i> {{$user->study->name}}</h5>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" style="margin-top: 20px;">
                <div class="panel">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#objave">Objave</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kolegiji">Kolegiji</a>
                        </li>
                    </ul>
                    <div class="panel-body">
                        <div id="myTabContent" class="tab-content">
                            <!-- objave -->
                            <div class="tab-pane fade active in" id="objave">
                                <div class="list-group col-lg-10 col-lg-offset-1">
                                    @foreach($user->posts as $post)
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
                                                                      aria-hidden="true"></i> {{$post->user->name}}
                                                            </small>
                                                            <br>
                                                            <small><i class="fa fa-clock-o"
                                                                      aria-hidden="true"></i> {{$post->created_at}}
                                                            </small>
                                                        </div>
                                                        <div class="col-lg-6"
                                                             style="text-align: right; margin-top: 10px;">
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
                                                                                           aria-hidden="true"></a>
                                                                                    </small>
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
                            <!-- kolegiji -->
                            <div class="tab-pane fade" id="kolegiji" style="margin-bottom: 100px;">
                                @foreach($collegiums as $collegium)
                                    <li class="list-group-item">
                                        <a href="{{route('collegiums')}}/{{$collegium->id}}"
                                           style="color:#303030;">{{$collegium->name}}</a>
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
@endsection