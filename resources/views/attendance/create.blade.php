         @extends('layouts.app')

         @section('content')
             <div class="col col-md-8 col-md-offset-2">
             <form class="form-horizontal" action="{{ route('attendance_create') }}" method="POST">
                 {{ csrf_field() }}
                  <fieldset>
                    <legend>Dodaj nesto</legend>
                                <div class="form-group">
                                <label for="select" class="col-lg-2 control-label">Tip nastave</label>
                                 <div class="col-lg-10">
                                     <select class="form-control" id="select" name="class_id">
                                         @foreach($classes as $classe)
                                         <option value="{{ $classe->id }}">{{ $classe->type }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                </div>
                             <div class="form-group">
                                  <label for="select" class="col-lg-2 control-label">Korisnik</label>
                                  <div class="col-lg-10">
                                  <select class="form-control" id="select" name="user_id">
                                   @foreach($users as $user)
                                   <option value="{{ $user->id }}">{{ $user->name }}</option>
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
