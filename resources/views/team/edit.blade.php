@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <h3 class="panel-title">Uredi tim</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('taskuser_edit')}}/{{$taskuser->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                         <div class="form-group">
                            <label for="select" class="col-lg-2 control-label">Stanje zadatka</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="select" name="status">
                                    <option value="in progress" {{ ($taskuser->status == "in progress") ? 'selected' : ''}}>U
                                        izradi
                                    </option>
                                    <option value="finished" {{ ($taskuser->status == "finished") ? 'selected' : ''}}>Završeno
                                    </option>
                                    <option value="not finished" {{ ($taskuser->status == "not finished") ? 'selected' : ''}}>
                                        Nije završeno
                                    </option>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Zadatak</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="select" name="task_id">
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}" {{ ($taskuser->task_id == $task->id) ? 'selected' : '' }}>{{ $task->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label">Nositelj kolegija</label>
                            <div class="col-lg-10">
                             <select class="form-control" id="select" name="user_id">
                                 @foreach($users as $user)
                                     <option value="{{ $user->id }}" {{ ($taskuser->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
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