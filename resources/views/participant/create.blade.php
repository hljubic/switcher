@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{route('participants_create')}}" method="POST">
            {{ csrf_field() }}
            <fieldset>
                <legend>Dodaj korisnika u razgovor</legend>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Razgovor</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="conversation_id">
                            @foreach($conversations as $conversation)
                                <option value="{{ $conversation->id }}">{{ $conversation->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Ime korisnika</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
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