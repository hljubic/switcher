@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('taskuser')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodijeli studentu zadatak</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route ('taskuser_create')}}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Stanje zadatka</label>
                            <div class="col-lg-10">
                                <select class="form-control noborder" id="select" name="type">
                                    <option value="in progress">U izradi</option>
                                    <option value="finished">Dovršeno</option>
                                    <option value="not finished">Nije dovršeno</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small">Zadatak</label>
                            <div class="col-lg-10">
                                @if(count($tasks)>0)
                                    <select class="form-control noborder" id="select" name="task_id">
                                        @foreach($tasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->name }}
                                                , {{ $task->type }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte zadatak.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label small">Student</label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="user_id">
                                        @foreach($users as $user)
                                            @if($user->type == 'student')
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte studenta.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-sm swt-button-default  btn-block">Odustani
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-sm swt-button-prim btn-block">Spremi</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection