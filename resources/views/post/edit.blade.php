@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('posts')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Uredi objavu</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('posts_edit')}}/{{$post->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputContent" class="col-lg-2 control-label small">Sadržaj</label>
                            <div class="col-lg-10">
                             <input type="text" class="form-control noborder" id="inputContent" name="content" placeholder="Sadržaj"
                               value="{{$post->content}}">
                            </div>
                        </div>


                       <div class="form-group">
                    <label for="inputDate" class="col-lg-2 control-label small">Datum i vrijeme</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control datepicker noborder" id="inputDate" name="created_at"
                               placeholder="Datum i vrijeme" value="{{$post->created_at}}">
                    </div>
                </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-sm swt-button-default  btn-block">Cancel</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-sm swt-button-prim btn-block">Submit</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection