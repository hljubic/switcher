@extends('layouts.app')

@section('content')
    <div class="col-md-5 col-md-offset-4">
        <div class="panel panel-default" style="margin-top: 50px;">
            <div class="panel-heading">
                <a href="{{route('messages')}}"><i class="fa fa-chevron-left"></i></a>
                <h5 class="panel-title" style="text-align: center;">Uredi poruku</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('messages_edit')}}/{{$message->id}}" method="POST">
                    {{method_field("PATCH")}}
                    {{csrf_field()}}
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <label for="inputContent" class="col-lg-2 control-label small">Sadržaj</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control noborder" id="inputContent" name="content"
                                       placeholder="Sadržaj"
                                       value="{{$message->content}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDate" class="col-lg-2 control-label small">Datum i vrijeme</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control datepicker noborder" id="inputDate"
                                       name="created_at"
                                       placeholder="Datum i vrijeme" value="{{$message->created_at}}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Razgovor</label>
                            <div class="col-lg-10">
                                @if(count($conversations)>0)
                                    <select class="form-control noborder" id="select" name="conversation_id">
                                        @foreach($conversations as $conversation)
                                            <option value="{{ $conversation->id }}" {{ ($message->conversation_id == $conversation->id) ? 'selected' : '' }}>{{ $conversation->title }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <label>Prvo dodajte razgovor.</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label small">Ime pošiljatelja </label>
                            <div class="col-lg-10">
                                @if(count($users)>0)
                                    <select class="form-control noborder" id="select" name="sender_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ ($message->sender_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
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
                                    <button type="reset" class="btn swt-button-default btn-sm btn-block">Odustani
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn swt-button-prim btn-sm btn-block">Spremi</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

@endsection