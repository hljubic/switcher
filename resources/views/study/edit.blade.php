@extends('layouts.app')
@section('content')

    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('studies')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodaj novi fakultet</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('studies_edit') }}/{{$studies->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small">Naziv studija</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputName" name="name"
                                       placeholder="Naziv studija"
                                       value="{{$studies->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label small" >Opis</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputDescription" name="description"
                                       placeholder="Opis" value="{{$studies->description}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Fakulteti</label>
                            <div class="col-lg-10">
                                <select class="form-control noborder" id="select" name="faculty_id">
                                    @foreach($faculties as $faculty)
                                        <option value="{{$faculty->id}}" {{$studies -> faculty_id == $faculty->id ? 'selected' : ''}}>{{$faculty->name}}</option>
                                    @endforeach
                                </select>
                            </div>
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