@extends('layouts.app')
@section('content')

    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('faculties')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodaj novi fakultet</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('faculties_create') }}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small ">Naziv fakulteta</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputName" name="name"
                                       placeholder="Naziv fakuleta" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label small ">Kratica</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputShortName" name="short_name"
                                       placeholder="Kratica" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAdress" class="col-lg-2 control-label small ">Adresa</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputAdress" name="address"
                                       placeholder="Adresa" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputWeb" class="col-lg-2 control-label small ">Web</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputWeb" name="web" placeholder="Web" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputIndex" class="col-lg-2 control-label small ">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputEmail" name="email"
                                       placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="col-lg-2 control-label small ">Broj telefona</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputPhone" name="phone"
                                       placeholder="Broj telefona" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn swt-button-default btn-sm  btn-block">Odustani</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn swt-button-prim  btn-sm btn-block">Spremi</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection