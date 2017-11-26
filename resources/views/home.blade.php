@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                                            <p>Autor: </p>
                                            <div class="modal-footer">
                                                <input class="form-control" id="focusedInput" type="text"
                                                       placeholder="Napisi komentar...">
                                                <button type="button" class="btn btn-primary">Komentiraj</button>
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
@endsection