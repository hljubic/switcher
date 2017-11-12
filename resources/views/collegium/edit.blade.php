@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{route('collegium_edit')}}/{{$collegium->id}}" method="POST">
            {{ method_field("PATCH") }}
            {{ csrf_field() }}
            <fieldset>
                <legend>Uredi kolegij</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Naziv kolegija</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="{{$collegium->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Opis</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" rows="3" id="textArea" name="description" value="{{$collegium->description}}"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Nositelj kolegija</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="prof_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ ($collegium->prof_id == $user->id) ? 'selected' : '' }}>{{$user->title}} {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Asistent</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="assist_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ ($collegium->assist_id == $user->id) ? 'selected' : '' }}>{{$user->title}} {{ $user->name }}</option>
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