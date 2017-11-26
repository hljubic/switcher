@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px;">
        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News feed</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>

                            <ul class="pager">
                                <li><a href="{{route('post_create')}}"><i class="fa fa-plus-circle"
                                                                          aria-hidden="true"></i></a></li>
                            </ul>

                            <div class="modal-dialog">
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
                                                            <input class="form-control" style="margin-bottom: 5px;" id="focusedInput" type="text"
                                                                   placeholder="Napisi komentar...">
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <button type="button" class="btn btn-primary">Komentiraj</button>
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
        </div>
    </div>
@endsection