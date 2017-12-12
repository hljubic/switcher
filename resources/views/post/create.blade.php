@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <h3 class="panel-title">Kreiraj objavu </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route ('posts_create')}}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="content-body" class="col-lg-2 control-label">Sadržaj</label>
                            <div class="col-lg-10">
                            <textarea class="form-control" rows="4" id="content-body" name="content"
                              placeholder="Sadržaj objave"></textarea>
                            </div>
                        </div>
                       {{--<div class="form-group">--}}
                                           {{--<label for="inputDate" class="col-lg-2 control-label">Datum i vrijeme</label>--}}
                                           {{--<div class="col-lg-10">--}}
                                               {{--<input type="text" class="form-control datepicker" id="inputDate " name="created_at"--}}
                                                      {{--placeholder="Datum i vrijeme">--}}
                                           {{--</div>--}}
                                       {{--</div>--}}

                                       <div>
                                           <label for="inputDate" class="col-lg-3">Datum i vrijeme</label>
                                           <p name="created_at" id="inputDate">{{ date('d-M-y') }}</p>
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

