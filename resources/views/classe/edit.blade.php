@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('classes')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Uredi podatke nastave</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('classes_edit')}}/{{$classes->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small ">Tip nastave</label>
                            <div class="col-lg-10">
                                <select class="form-control noborder" id="select" name="type">
                                    <option value="lecture" {{ ($classes->type == "lecture") ? 'selected' : ''}}>Predavanja</option>
                                    <option value="exercises" {{ ($classes->type == "exercises") ? 'selected' : ''}}>Vježbe</option>
                                    <option value="laboratory exercises" {{ ($classes->type == "laboratory exercises") ? 'selected' : ''}}>Laboratorijske vježbe</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label small">Kolegij</label>
                            <div class="col-lg-10">
                                @if(count($collegiums)>0)
                                    <select class="form-control noborder" id="select" name="collegium_id">
                                        @foreach($collegiums as $collegium)
                                            <option value="{{ $collegium->id }}" {{ ($classes->collegium_id == $collegium->id) ? 'selected' : '' }}>{{ $collegium->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte kolegij.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDate" class="col-lg-2 control-label small">Datum i vrijeme</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control datepicker noborder" id="inputDate"
                                       name="created_at"
                                       placeholder="Datum i vrijeme" value="{{$classes->created_at}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-sm swt-button-default  btn-block">Cancel
                                    </button>
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