@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="col-lg-4 col-lg-offset-4" style="padding-bottom: 40px;" >
                            <img  style="width:170px;" src="{{ asset('/images/switcher_logoL.png') }}">
                        </div>

                        <!-- ime i prezime-->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-user" style="font-size: 17px;"></i></span>
                                    <input id="name" type="text" class="form-control swt-input" name="name" value="{{ old('name') }}" required autofocus placeholder="Ime i prezime" >

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- email-->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-envelope" style="font-size: 17px;"></i></span>
                                    <input id="email" type="email" class="form-control swt-input" name="email" value="{{ old('email') }}" required placeholder="Email">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- password-->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-unlock-alt" style="font-size: 17px;"></i></span>
                                    <input id="password" type="password" class="form-control swt-input" name="password" required placeholder="Lozinka" >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--potvrdite lozinku-->
                        <div class="form-group">

                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-unlock-alt" style="font-size: 17px;"></i></span>
                                    <input id="password-confirm" type="password" class="form-control swt-input" name="password_confirmation" required placeholder="Potvrdite lozinku" >

                                </div>
                            </div>
                        </div>
                        <!-- broj indeksa-->
                        <div class="form-group">
                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-book" style="font-size: 17px;"></i></span>
                                    <input type="text" class="form-control swt-input" id="inputIndex_number" name="index_number" placeholder="Broj indeksa">

                                </div>
                            </div>
                        </div>
                        <!-- broj telefona-->
                        <div class="form-group">
                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-phone" style="font-size: 17px;"></i></span>
                                    <input type="text" class="form-control swt-input" id="inputPhone" name="phone" placeholder="Broj telefona" >

                                </div>
                            </div>
                        </div>
                        <!-- studiji-->
                        <div class="form-group">


                                <div class="col-md-8 col-lg-offset-2">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-university" style="font-size: 17px;"></i></span>
                                        <select class="form-control col-md-10 swt-input" id="select" name="study_id">
                                            @foreach($studies as $study)
                                                <option value="{{ $study->id }}">{{ $study->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                        </div>

                        <div class="form-group" style="padding-top: 25px;">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-success btn-block btn-sm">
                                    Registracija
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
