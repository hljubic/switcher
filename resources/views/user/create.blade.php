@extends('layouts.app')

@section('content')
<div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('users')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodaj novog korisnika</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('users_create') }}" method="POST">
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                        <label for="inputName" class="col-lg-2 control-label small">Ime i prezime</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control noborder" id="inputName" name="name" placeholder="Ime i prezime">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label small">Email</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control noborder" id="inputEmail" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label small">Lozinka</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control noborder" id="inputPassword" name="password"
                                   placeholder="Lozinka">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputIndex" class="col-lg-2 control-label small">Broj indeksa</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control noborder" id="inputIndex" name="index_number"
                                   placeholder="Broj indeksa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label small">Titula</label>
                        <div class="col-lg-10">
                            <select class="form-control noborder" id="select" name="title">
                                <option value="dr.">dr.</option>
                                <option value="mr.">mr.</option>
                                <option value="prof.">prof.</option>
                                <option value="nema titule">Nema titule</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone" class="col-lg-2 control-label small">Broj telefona</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control noborder" id="inputPhone" name="phone"
                                   placeholder="Broj telefona">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label small">Tip korisnika</label>
                        <div class="col-lg-10">
                            <select class="form-control noborder" id="select" name="type">
                                <option value="admin">Admin</option>
                                <option value="professor">Profesor</option>
                                <option value="student">Student</option>
                                <option value="moderator">Moderator</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label small">Aktivan</label>
                        <div class="col-lg-10">
                            <select class="form-control noborder" id="select" name="is_active">
                                <option value="1">Aktivan</option>
                                <option value="0">Neaktivan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label small">Studij</label>
                        <div class="col-lg-10">
                            <select class="form-control noborder" id="select" name="study_id">
                                @foreach($studies as $study)
                                    <option value="{{ $study->id }}">{{ $study->name }}</option>
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