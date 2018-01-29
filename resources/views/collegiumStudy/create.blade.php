@extends('layouts.app')
@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('collegium_study')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodaj kolegij studiju</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('collegium_study_create') }}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small">Kolegij</label>
                            <div class="col-lg-10">
                                @if(count($collegiums)>0)
                                    <select class="form-control noborder" id="select" name="collegium_id">
                                        @foreach($collegiums as $collegium)
                                            <option value="{{ $collegium->id }}">{{ $collegium->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte kolegij.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label small">Studij</label>
                            <div class="col-lg-10">
                                @if(count($studies)>0)
                                    <select class="form-control noborder" id="select" name="study_id">
                                        @foreach($studies as $study)
                                            <option value="{{ $study->id }}">{{ $study->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte studij.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn swt-button-default btn-sm  btn-block">Odustani
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn swt-button-prim btn-sm btn-block">Spremi</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection