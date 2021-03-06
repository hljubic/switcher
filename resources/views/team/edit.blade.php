@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('taskuser')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodijeli studentu zadatak</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('taskuser_edit')}}/{{$taskuser->id}}" method="POST">
                    {{ method_field("PATCH") }}
                    {{ csrf_field() }}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Stanje zadatka</label>
                            <div class="col-lg-10">
                                <select class="form-control noborder" id="select" name="status">
                                    <option value="in progress" {{ ($taskuser->status == "in progress") ? 'selected' : ''}}>
                                        U
                                        izradi
                                    </option>
                                    <option value="finished" {{ ($taskuser->status == "finished") ? 'selected' : ''}}>
                                        Završeno
                                    </option>
                                    <option value="not finished" {{ ($taskuser->status == "not finished") ? 'selected' : ''}}>
                                        Nije završeno
                                    </option>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Zadatak</label>
                            <div class="col-lg-10">
                                @if(count($tasks)>0)
                                    <select class="form-control noborder" id="select" name="task_id">
                                        @foreach($tasks as $task)
                                            <option value="{{ $task->id }}" {{ ($taskuser->task_id == $task->id) ? 'selected' : '' }}>{{ $task->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte zadatak.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Student</label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ ($taskuser->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte studenta.</label>
                                @endif
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
        </div>
    </div>
@endsection