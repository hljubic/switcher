@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <h3 class="panel-title">Uredi zadatak</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('tasks_edit')}}/{{$task->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Naziv zadatka</label>
                            <div class="col-lg-10">
                                 <input type="text" class="form-control" id="inputName" name="name" value="{{$task->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label">Krajnji rok</label>
                            <div class="col-lg-10">
                             <input type="text" class="form-control datepicker" id="inputDate" name="deadline"
                              placeholder="Krajnji rok" value="{{$task->deadline}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Opis</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" id="textArea" name="description"
                                          value="{{$task->description}}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                                            <label for="select" class="col-lg-2 control-label">Tip zadatka</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" id="select" name="type">
                                                    <option value="seminar paper" {{ ($task->type == "seminar paper") ? 'selected' : ''}}>
                                                        Seminarski rad
                                                    </option>
                                                    <option value="homework" {{ ($task->type == "homework") ? 'selected' : ''}}>Zadaća</option>
                                                    <option value="project" {{ ($task->type == "project") ? 'selected' : ''}}>Projekt</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDate" class="col-lg-2 control-label">Datum i vrijeme</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control datepicker" id="inputDate" name="created_at"
                                                       placeholder="Datum i vrijeme" value="{{$task->created_at}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="select" class="col-lg-2 control-label">Kolegij</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" id="select" name="collegium_id">
                                                    @foreach($collegiums as $collegium)
                                                        <option value="{{ $collegium->id }}" {{ ($task->collegium_id == $collegium->id) ? 'selected' : '' }}>{{ $collegium->name }}</option>
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