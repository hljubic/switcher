@extends('layouts.app')

@section('content')
  <div class="col-md-4 col-md-offset-4">
          <div class="panel panel-default" style="margin-top: 50px;">
              <div class="panel-heading">

                  <a href="{{route('users')}}/{{$user->id}}"><i class="fa fa-chevron-left"></i></a>
                  <h5 class="panel-title" style="text-align: center;">Uredi korisnika</h5>
              </div>
              <div class="panel-body">
                  <form class="form-horizontal" action="{{route('users_edit')}}/{{$user->id}}" method="POST">
                      {{method_field("PATCH")}}
                      {{csrf_field()}}
                      <fieldset>
                          <legend></legend>
                          <div class="form-group">
                              <label for="inputName" class="col-lg-2 control-label small">Ime i prezime</label>
                              <div class="col-lg-10">
                                  <input type="text" class="form-control noborder" id="inputName" name="name" value="{{$user->name}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputEmail" class="col-lg-2 control-label small">Email</label>
                              <div class="col-lg-10">
                                  <input type="email" class="form-control noborder" id="inputEmail" name="email" value="{{$user->email}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputPassword" class="col-lg-2 control-label small">Lozinka</label>
                              <div class="col-lg-10">
                                  <input type="password" class="form-control noborder" id="inputPassword" name="password">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputIndex" class="col-lg-2 control-label small">Broj indeksa</label>
                              <div class="col-lg-10">
                                  <input type="text" class="form-control noborder" id="inputIndex" name="index_number"
                                         value="{{$user->index_number}}">
                              </div>
                          </div>

                          <div class="form-group">
                              <label for="select" class="col-lg-2 control-label small">Titula</label>
                              <div class="col-lg-10">
                                  <select class="form-control noborder" id="select" name="title">
                                      <option value="dr." {{ ($user->title == "dr.") ? 'selected' : ''}}>dr.</option>
                                      <option value="mr." {{ ($user->title == "mr.") ? 'selected' : ''}}>mr.</option>
                                      <option value="prof." {{ ($user->title == "prof.") ? 'selected' : ''}}>prof.</option>
                                      <option value="nema titule" {{ ($user->title == "nema titule") ? 'selected' : ''}}>Nema
                                          titule
                                      </option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="inputPhone" class="col-lg-2 control-label small">Broj telefona</label>
                              <div class="col-lg-10">
                                  <input type="text" class="form-control noborder" id="inputPhone" name="phone" value="{{$user->phone}}">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="select" class="col-lg-2 control-label small">Tip korisnika</label>
                              <div class="col-lg-10">
                                  <select class="form-control noborder" id="select" name="type">
                                      <option value="admin" {{ ($user->type == "admin") ? 'selected' : ''}}>Admin</option>
                                      <option value="professor" {{ ($user->type == "professor") ? 'selected' : ''}}>Profesor
                                      </option>
                                      <option value="student" {{ ($user->type == "student") ? 'selected' : ''}}>Student</option>
                                      <option value="moderator" {{ ($user->type == "moderator") ? 'selected' : ''}}>Moderator
                                      </option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="select" class="col-lg-2 control-label small">Aktivan</label>
                              <div class="col-lg-10">
                                  <select class="form-control noborder" id="select" name="is_active">
                                      <option value="1" {{ ($user->is_active == 1) ? 'selected' : ''}}>Aktivan</option>
                                      <option value="0" {{ ($user->is_active == 0) ? 'selected' : ''}}>Neaktivan</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="select" class="col-lg-2 control-label small">Studij</label>
                              <div class="col-lg-10">
                                  <select class="form-control noborder" id="select" name="study_id">
                                      @foreach($studies as $study)
                                          <option value="{{ $study->id }}" {{ ($user->study_id == $study->id) ? 'selected' : '' }}>{{ $study->name }}</option>
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