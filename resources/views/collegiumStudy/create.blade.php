@extends('layouts.app')
@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <h3 class="panel-title">Dodaj kolegij studiju</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('collegium_study_create') }}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Kolegij</label>
                            <div class="col-lg-10">
                            <select class="form-control" id="select" name="collegium_id">
                            @foreach($collegiums as $collegium)
                            <option value="{{ $collegium->id }}">{{ $collegium->name }}</option>
                            @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label">Studij</label>
                            <div class="col-lg-10">
                             <select class="form-control" id="select" name="study_id">
                             @foreach($studies as $study)
                             <option value="{{ $study->id }}">{{ $study->name }}</option>
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