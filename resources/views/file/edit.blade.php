@extends('layouts.app')
@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('files')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Uredi rad</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('files_edit')}}/{{$files->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                         <div class="form-group">
                            <label for="select" class="col-lg-2 control-label">Naziv</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="select" name="name">
                                    <option value="seminarski">seminarski</option>
                                    <option value="zavrsni">zavrsni</option>
                                    <option value="diplomski">diplomski</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="inputPhone" class="col-lg-2 control-label">Path</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="path" name="path" placeholder="Path">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label">Opis</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Opis">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label">size</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="size" name="size" placeholder="size">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Post</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="select" name="post_id">
                                @foreach($posts as $post)
                                    <option value="{{ $post->id }}"{{($files->post_id == $post->id) ? 'selected' : ''}}>{{ $post->content }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Task</label>
                        <div class="col-lg-10">
                            <select class="form-control" id="select" name="task_id">
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}"{{($files->task_id == $task->id) ? 'selected' : ''}}>{{ $task->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-default  btn-block">Cancel</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection