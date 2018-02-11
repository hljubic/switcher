@extends ('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-offset-2">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-body">
                <div id="page-content-wrapper">

                    <h4 style="">{{$posts->user->name}}</h4>

                    <div class="list-group col-lg-12">
                        <div class="list-group-item" style="margin-bottom: 10px;">
                            <div class="panel panel-default ">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p>{{$posts->content}}</p>
                                            @if($posts->file)
                                                <a style="color: #18bc9c; font-size:17px;"
                                                   target="_blank"
                                                   href="{{ asset('uploaded_files/' . $posts->file->name) }}">{{$posts->file->name}}</a>

                                            @endif
                                        </div>
                                        <div class="col-lg-6" style="text-align: right;">
                                            @can('delete',$posts)
                                                <small><a href="{{route('posts_delete')}}/{{$posts->id}}"
                                                          style="color: #ecf0f1;;"
                                                          class="btn btn-xs fa fa-times"
                                                          aria-hidden="true"></a></small>@endcan
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <small><i class="fa fa-user"
                                                      aria-hidden="true"></i> {{$posts->user->name}}</small>
                                            <br>
                                            <small><i class="fa fa-clock-o"
                                                      aria-hidden="true"></i>{{\Carbon\Carbon::parse($posts->created_at)->format('d.m.y h:i:s')}}
                                            </small>
                                        </div>
                                        @php
                                            $comments = \App\Message::where('conversation_id','=', $posts->conversation_id)->get();
                                            $numcomments = count($comments);
                                        @endphp
                                        <div class="col-lg-6" style="text-align: right; margin-top: 10px;">
                                            <button type="button" class="btn noborder btn-default btn-xs"
                                                    data-toggle="collapse" data-target="#{{$posts->id}}">
                                                Komentari <span class="badge"
                                                                style=" font-size: 12px; width: 20px;"> {{$numcomments}}</span>
                                            </button>
                                        </div>

                                        <div class="col-lg-12">
                                            <div id="{{$posts->id}}" class="collapse">
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
                                                                              aria-hidden="true"></i> {{\Carbon\Carbon::parse($comment->created_at)->format('d.m.y h:i:s')}}
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
                                                   value="{{ date('y-m-d h:i:s') }}">
                                            <input type="hidden" name="conversation_id"
                                                   value="{{$posts->conversation_id}}">
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
                    </div>


                </div>
            </div>
        </div>

    </div>

@endsection
