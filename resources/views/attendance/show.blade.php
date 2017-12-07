@extends ('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
            <form class="form-horizontal" action="{{ route('attendance_create') }}" method="POST">
                {{ csrf_field() }}
                <fieldset>
                    <div class="row">
                        @if($classe->type == 'lecture')
                            <div class="col-lg-6" style="color: #18BC9C;">
                                <h4>Predavanje</h4>
                                <small><i class="fa fa-calendar"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}
                                </small>
                                <small><i class="fa fa-clock-o"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                    h
                                </small>
                            </div>
                            @if(count($attendances) == 0)
                                <div class="col-lg-6">
                                    <br>
                                    <button type="submit" class="col-lg-offset-10 btn btn-default btn-sm">Spremi
                                    </button>
                                </div>
                            @endif
                        @elseif($classe->type == 'exercises')
                            <div class="col-lg-6" style="color: #ec971f;">
                                <h4>Vježbe</h4>
                                <small><i class="fa fa-calendar"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}
                                </small>
                                <small><i class="fa fa-clock-o"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                    h
                                </small>
                            </div>
                            @if(count($attendances) == 0)
                                <div class="col-lg-6">
                                    <br>
                                    <button type="submit" class="col-lg-offset-10 btn btn-warning btn-sm">Spremi
                                    </button>
                                </div>
                            @endif
                        @else
                            <div class="col-lg-6" style="color: #d9534f;">
                                <h4>Laboratorijske vježbe</h4>
                                <small><i class="fa fa-calendar"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('d.m.')}}
                                </small>
                                <small><i class="fa fa-clock-o"
                                          aria-hidden="true"></i> {{\Carbon\Carbon::parse($classe->deadline)->format('h:m')}}
                                    h
                                </small>
                            </div>
                            @if(count($attendances) == 0)
                                <div class="col-lg-6">
                                    <br>
                                    <button type="submit" class="col-lg-offset-10 btn btn-danger btn-sm">Spremi</button>
                                </div>
                            @endif
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
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{$attendance->user->name}}</td>
                                    <td>{{$attendance->user->index_number}}</td>
                                    <td>{{$attendance->user->study->name}}</td>
                                    <td>
                                        <small><i class="fa fa-check" aria-hidden="true"></i></small>
                                    </td>
                                </tr>
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
                </fieldset>
            </form>
        </div>
    </div>
@endsection