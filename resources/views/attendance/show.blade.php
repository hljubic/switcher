@extends ('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
            <form class="form-horizontal" action="{{ route('class_user') }}" method="POST">
                {{ csrf_field() }}
                <fieldset>
                    <div class="row">
                        @if($classe->type == 'lecture')
                            <div class="col-lg-9" style="color: #18BC9C;">
                                <h4>Predavanje</h4>
                                <small><i class="fa fa-calendar"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}
                                </small>
                                <small><i class="fa fa-clock-o"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                    h
                                </small>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <br>
                                    <button type="submit" class="col-lg-4 btn btn-success btn-sm">Spremi
                                    </button>
                                    <div class="col-lg-1"></div>
                                    @if(count($attendances)>0)
                                        <a class="col-lg-4 btn btn-default btn-sm"
                                           href="{{route('download')}}/{{$classe->id}}">Preuzmi</a>
                                    @endif
                                </div>
                            </div>
                        @elseif($classe->type == 'exercises')
                            <div class="col-lg-9" style="color: #ec971f;">
                                <h4>Vježbe</h4>
                                <small><i class="fa fa-calendar"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}
                                </small>
                                <small><i class="fa fa-clock-o"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                    h
                                </small>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <br>
                                    <button type="submit" class="col-lg-4 btn btn-warning btn-sm">Spremi
                                    </button>
                                    <div class="col-lg-1"></div>
                                    @if(count($attendances)>0)
                                        <a class="col-lg-4 btn btn-default btn-sm" href="{{route('download')}}/{{$classe->id}}">Preuzmi</a>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="col-lg-9" style="color: #d9534f;">
                                <h4>Laboratorijske vježbe</h4>
                                <small><i class="fa fa-calendar"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}
                                </small>
                                <small><i class="fa fa-clock-o"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                    h
                                </small>
                            </div>

                            <div class="col-lg-3">
                                <div class="row">
                                    <br>
                                    <button type="submit" class="col-lg-4 btn btn-danger btn-sm">Spremi</button>
                                    <div class="col-lg-1"></div>
                                    @if(count($attendances)>0)
                                        <a class="col-lg-4 btn btn-default btn-sm"
                                           href="{{route('download')}}/{{$classe->id}}">Preuzmi</a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                    <br><br>
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Ime i prezime</th>
                            <th>Broj indeksa</th>
                            <th>Studij</th>
                            <th>Prisutan</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($attendances)>0)
                            @foreach($collegiums->user as $key => $user)
                                @if(isset($attendances[$key]->user))
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->index_number}}</td>
                                        <td>{{$user->study->name}}</td>
                                        <td>
                                            <small><i class="fa fa-check" aria-hidden="true"></i></small>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->index_number}}</td>
                                        <td>{{$user->study->name}}</td>
                                        <td><input class="field" type="checkbox" name="users[]" value="{{$user->id}}">
                                        </td>
                                        <td><input class="hidden" name="class_id" value="{{$classe->id}}"></td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            @foreach($collegiums->user as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->index_number}}</td>
                                    <td>{{$user->study->name}}</td>
                                    <td><input class="field" type="checkbox" name="users[]" value="{{$user->id}}"></td>
                                    <td><input class="hidden" name="class_id" value="{{$classe->id}}"></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <input class="hidden" name="collegium_id" value="{{$collegiums->id}}">
                </fieldset>
            </form>
        </div>
    </div>
@endsection