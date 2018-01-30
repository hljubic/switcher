@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('tasks')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Kreiraj zadatak</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route ('tasks_create')}}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small">Naslov</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputName" name="name"
                                       placeholder="Naslov" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDate" class="col-lg-2 control-label small">Krajnji rok</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control datepicker noborder" id="inputDate"
                                       name="deadline"
                                       placeholder="Datum i vrijeme" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label small">Opis</label>
                            <div class="col-lg-10">
                                     <textarea class="form-control noborder" rows="3" id="textArea" name="description"
                                               placeholder="Opis zadatka" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Vrsta zadatka</label>
                            <div class="col-lg-10">
                                <select class="form-control noborder" id="select" name="type">
                                    <option value="seminar paper">Seminarski rad</option>
                                    <option value="homework">Zadaća</option>
                                    <option value="project">Projektni zadatak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Kolegij</label>
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
                            <label for="inputDate" class="col-lg-2 control-label small">Datum i vrijeme</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control datepicker noborder" id="inputDate"
                                       name="created_at"
                                       placeholder="Datum i vrijeme" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-sm swt-button-default  btn-block">Odustani
                                    </button>
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