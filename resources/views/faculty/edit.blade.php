@extends('layouts.app')
@section('content')

    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" action="{{ route('faculty_edit') }}/{{$faculties->id}}" method="POST">
            {{method_field("PATCH")}}
            {{csrf_field()}}
            <fieldset>
                <legend>Uredi fakultet</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Naziv fakulteta</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Naziv fakuleta"
                               value="{{$faculties->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputShortName" class="col-lg-2 control-label">Kratica</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputShortName" name="short_name"
                               placeholder="Kratica" value="{{$faculties->short_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAdress" class="col-lg-2 control-label">Adresa</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputAdress" name="address" placeholder="Adresa"
                               value="{{$faculties->address}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputWeb" class="col-lg-2 control-label">Web</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputWeb" name="web" placeholder="Web"
                               value="{{$faculties->web}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputIndex" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email"
                               value="{{$faculties->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone" class="col-lg-2 control-label">Broj telefona</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputPhone" name="phone"
                               placeholder="Broj telefona" value="{{$faculties->phone}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Spremi promjene</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection