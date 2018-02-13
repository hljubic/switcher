@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">

                <div class="panel-body" style="align-content: center;">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="col-lg-4 col-lg-offset-4" style="padding-bottom: 40px;" >
                            <img  style="width:170px;" src="{{ asset('/images/switcher_logoL.png') }}">
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 2px; border-radius: 0px; background-color: white;"><i class="fa fa-envelope" style="font-size: 17px;"></i></span>
                                    <input id="email" type="email" class="form-control swt-input" name="email"  placeholder="Email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-lg-offset-2">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1" style=" border:none; border-bottom: solid 1px; border-radius: 0px; background-color: white;"><i class="fa fa-unlock-alt" style="font-size: 20px;"></i></span>
                                    <input id="password" type="password" class="form-control swt-input" name="password"  placeholder="Lozinka"  required >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                        </div>

                        <div class="form-group small">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="checkbox">
                                    <label class="small">
                                        <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Zapamti moju prijavu
                                    </label>
                                    <label class="small">
                                        <a class="btn btn-link " href="{{ route('password.request') }}">
                                            Zaboravili ste lozinku?
                                        </a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="padding-top: 15px;">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-success btn-block btn-sm">
                                    Prijava
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
