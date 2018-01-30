@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">

        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('collegiums')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Dodaj novi kolegij</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route ('collegiums_create')}}" method="POST">
                    {{ csrf_field() }}
                    <fieldset>
                        <legend></legend>

                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small">Naziv kolegija</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputName" name="name"
                                       placeholder="Naziv" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-lg-2 control-label small">Opis</label>
                            <div class="col-lg-10">
                                <textarea class="form-control noborder" rows="3" id="textArea" name="description"
                                          placeholder="Opis kolegija" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Nositelj kolegija</label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="prof_id">
                                        @foreach($users as $user)
                                            @if($user->type == 'professor')
                                                <option value="{{ $user->id }}">{{ $user->title }} {{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte korisnika.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Asistent</label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="assist_id">
                                        @foreach($users as $user)
                                            @if($user->type == 'professor')
                                                <option value="{{ $user->id }}">{{ $user->title }} {{ $user->name }}</option>
                                            @endif
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