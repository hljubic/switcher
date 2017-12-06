@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{route('messages_edit')}}/{{$message->id}}" method="POST">
            {{ method_field("PATCH") }}
            {{ csrf_field() }}
            <fieldset>
                <legend>Uredi poruku</legend>
                <div class="form-group">
                    <label for="inputContent" class="col-lg-2 control-label">Sadržaj</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputContent" name="content" placeholder="Sadržaj"
                               value="{{$message->content}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDate" class="col-lg-2 control-label">Datum i vrijeme</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control datepicker" id="inputDate" name="created_at"
                               placeholder="Datum i vrijeme" value="{{$message->created_at}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Razgovor</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="conversation_id">
                            @foreach($conversations as $conversation)
                                <option value="{{ $conversation->id }}" {{ ($message->conversation_id == $conversation->id) ? 'selected' : '' }}>{{ $conversation->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Ime pošiljatelja</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="sender_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ ($message->sender_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
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