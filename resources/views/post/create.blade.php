@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{route ('post_create')}}" method="POST">
            {{ csrf_field() }}

            <fieldset>
                <legend >Kreiraj objavu</legend>

                <div class="form-group">
                    <label for="content-body" class="col-lg-2 control-label">Sadržaj</label>
                    <div class="col-lg-10">
                        <textarea class="form-control"  rows="4" id="content-body" name="content" placeholder="Sadržaj objave" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDate" class="col-lg-2 control-label">Datum i vrijeme</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control datepicker" id="inputDate " name="created_at" placeholder="Datum i vrijeme">
                    </div>
                </div>
                <!--<div class="form-group">
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
                    <label for="select" class="col-lg-2 control-label">Kolegij</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="collegium_id">
                            @foreach($collegiums as $collegium)
                                <option value="{{ $collegium->id }}">{{ $collegium->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>-->
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

