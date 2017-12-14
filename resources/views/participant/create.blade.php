@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <h3 class="panel-title">Dodaj korisnika u razgovor</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('participants_create')}}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
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
                            <label for="inputShortName" class="col-lg-2 control-label">Ime korisnika</label>
                            <div class="col-lg-10">
                             <select class="form-control" id="select" name="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
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