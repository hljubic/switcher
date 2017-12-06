@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-lg-offset-2">
        <form class="form-horizontal" action="{{route('posts_edit')}}/{{$post->id}}" method="POST">
            {{ method_field("PATCH") }}
            {{ csrf_field() }}
            <fieldset>
                <legend>Uredi objavu</legend>
                <div class="form-group">
                    <label for="inputContent" class="col-lg-2 control-label">Sadržaj</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputContent" name="content" placeholder="Sadržaj"
                               value="{{$post->content}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDate" class="col-lg-2 control-label">Datum i vrijeme</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control datepicker" id="inputDate" name="created_at"
                               placeholder="Datum i vrijeme" value="{{$post->created_at}}">
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