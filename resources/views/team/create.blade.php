@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{route ('taskuser_create')}}" method="POST">
            {{ csrf_field() }}

            <fieldset>
                <legend>Dodijeli studentu zadatak</legend>

                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Stanje zadatka</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="type">
                            <option value="in progress">U izradi</option>
                            <option value="finished">Dovršeno</option>
                            <option value="not finished">Nije dovršeno</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Zadatak</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="task_id">
                            @foreach($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->name }}, {{ $task->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Student</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="user_id">
                            @foreach($users as $user)
                                @if($user->type == 'student')
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
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