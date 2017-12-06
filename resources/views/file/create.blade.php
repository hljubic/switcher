@extends('layouts.app')

@section('content')
    <div class="col col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{ route('files_create') }}" method="POST">

            {{ csrf_field() }}
            <fieldset>
                <legend>Dodaj rad</legend>
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
                                <option value="{{ $post->id }}">{{ $post->content }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Task</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="task_id">
                            @foreach($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection