@extends('layouts.app')
@section('content')

    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <h3 class="panel-title">Dodaj novi fakultet</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('faculties_create') }}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Naziv fakulteta</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputName" name="name"
                                       placeholder="Naziv fakuleta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label">Kratica</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputShortName" name="short_name"
                                       placeholder="Kratica">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAdress" class="col-lg-2 control-label">Adresa</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputAdress" name="address"
                                       placeholder="Adresa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputWeb" class="col-lg-2 control-label">Web</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputWeb" name="web" placeholder="Web">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputIndex" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputEmail" name="email"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="col-lg-2 control-label">Broj telefona</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputPhone" name="phone"
                                       placeholder="Broj telefona">
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