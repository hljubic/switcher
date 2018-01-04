@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('posts')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Kreiraj objavu </h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route ('posts_create')}}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="content-body" class="col-lg-2 control-label small">Sadržaj</label>
                            <div class="col-lg-10">
                            <textarea class="form-control noborder" rows="4" id="content-body" name="content"
                                      placeholder="Sadržaj objave"></textarea>
                            </div>
                        </div>

                        <div>
                            <label for="inputDate" class="col-lg-3 small">Datum i vrijeme</label>
                            <p name="created_at" id="inputDate">{{ date('d-M-y') }}</p>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-sm swt-button-default  btn-block">Odustani</button>
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

