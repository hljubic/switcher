@extends('layouts.app')
@section('content')

    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('followers')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Uredi podatke kolegija i studija</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('followers_edit') }}/{{$followers->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small">Korisnik</label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{$followers -> user_id == $user -> id ? 'selected' : ''}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte korisnika.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label small">Pratitelj</label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="follower_id">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{$followers -> follower_id == $user -> id ? 'selected' : ''}}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte korisnika.</label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="col-md-6">
                                    <button type="reset" class="btn swt-button-default btn-sm  btn-block">Odustani
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