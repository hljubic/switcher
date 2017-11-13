@extends('layouts.app')

@section('content')
    <div class="col col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{ route('collegium_study_create') }}" method="POST">
            {{ csrf_field() }}
            <fieldset>
                <legend>Dodaj kolegij studiju</legend>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Kolegij</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="collegium_id">
                            @foreach($collegiums as $collegium)
                                <option value="{{ $collegium->id }}">{{ $collegium->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Studij</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="select" name="study_id">
                            @foreach($studies as $study)
                                <option value="{{ $study->id }}">{{ $study->name }}</option>
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
            </fieldset>
        </form>
    </div>
@endsection