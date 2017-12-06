@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{route('conversations_create')}}" method="POST">
            {{ csrf_field() }}
            <fieldset>
                <legend>Kreiraj razgovor</legend>
                <div class="form-group">
                    <label for="inputTitle" class="col-lg-2 control-label">Naziv</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Naziv">
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Ime kreatora</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="creator_id">
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