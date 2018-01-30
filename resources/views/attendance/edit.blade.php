@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('attendances')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title " style="text-align: center;">Uredi prisutnost korisnika</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('attendances_edit')}}/{{$attendances->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label small">Naziv nastave</label>
                            <div class="col-lg-10">
                                @if(count($classes)>0)
                                    <select class="form-control noborder" id="select" name="class_id">
                                        @foreach($classes as $classe)
                                            <option value="{{ $classe->id }}" {{($attendances->class_id == $classe->id) ? 'selected' : ''}}>{{ $classe->type }}
                                                , {{$classe->created_at}}, {{$classe->collegium->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte nastavu.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputShortName" class="col-lg-2 control-label small">Korsinik</label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="user_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ ($attendances->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
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