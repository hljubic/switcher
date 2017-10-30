@extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{ route('study_create') }}" method="POST">
            {{csrf_field()}}
            <fieldset>
                <legend>Dodaj studij</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Naziv studija</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Naziv studija">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputShortName" class="col-lg-2 control-label">Opis</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputOpis" name="description"
                               placeholder="Opis">
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Fakulteti</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="faculty_id">
                            @foreach($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
    </div>
    </fieldset>
    </form>
    </div>
@endsection