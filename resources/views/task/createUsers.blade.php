@extends ('layouts.app')

@section('content')
    <div class="well col-lg-6 col-lg-offset-3" style="margin-top: 50px; background-color: #fff;">
        <form class="form-horizontal" action="{{route('task_user')}}/create/{{$task->id}}" method="POST">

            {{ csrf_field() }}
            <fieldset>
                <div class="row">
                    @if($task->type =='seminar paper')
                        <div class="list-group-item"
                             style="margin-bottom: 10px; border-left:solid #18BC9C 6px;">
                            <div class="row">
                                <div class="col-lg-2"
                                     style="border-right: solid #ecf0f1; text-align: center;">
                                    <h4 class="header"
                                        style="padding-top:20px;">{{\Carbon\Carbon::parse($task->deadline)->format('d.m')}}</h4>
                                    <p style="padding-top:20px;"></p>
                                </div>

                                <div class="col-lg-8">
                                    <h4 class="header" style="padding-top: 15px;">{{$task->name}}</h4>
                                    <p>{{$task->type}}</p>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit"
                                            class="btn btn-success btn-block btn-sm"
                                            style="align-self: flex-start; margin-top: 30px;">Spremi
                                    </button>
                                </div>
                            </div>
                        </div>
                    @elseif($task->type =='project')
                        <div class="list-group-item"
                             style="margin-bottom: 10px; border-left:solid #ec971f 6px;">
                            <div class="row">
                                <div class="col-lg-2"
                                     style="border-right: solid #ecf0f1; text-align: center;">
                                    <h4 class="header"
                                        style="padding-top:25px;">{{\Carbon\Carbon::parse($task->deadline)->format('d.m')}}</h4>
                                    <p style="padding-top:20px;"></p>
                                </div>
                                <div class="col-lg-8">
                                    <h4 class="header" style="margin-top: 25px;">{{$task->name}}</h4>
                                    <p>{{$task->type}}</p>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit"
                                            class=" btn btn-warning btn-block btn-sm"
                                            style="align-self: flex-start; margin-top: 30px;">Spremi
                                    </button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="list-group-item"
                             style="margin-bottom: 10px; border-left:solid  #d9534f 6px;">
                            <div class="row">
                                <div class="col-lg-2"
                                     style="border-right: solid #ecf0f1; text-align: center;">
                                    <h4 class="header"
                                        style="padding-top:20px;">{{\Carbon\Carbon::parse($task->deadline)->format('d.m')}}</h4>
                                    <p style="padding-top:20px;"></p>
                                </div>
                                <div class="col-lg-8">
                                    <h4 class="header" style="padding-top: 15px;">{{$task->name}}</h4>
                                    <p>{{$task->type}}</p>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit"
                                            class="btn btn-danger btn-block btn-sm"
                                            style="align-self: flex-start; margin-top: 30px;">Spremi
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <br>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>Student</th>
                        <th>Broj indeksa</th>
                        <th>Studij</th>
                        <th>Dodaj</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($taskusers)>0)
                        @foreach($task->collegium->user as  $key => $user)
                            @if(isset($task->user[$key]))
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->index_number}}</td>
                                    <td>{{$user->study->name}}</td>
                                    <td><small><i class="fa fa-check" aria-hidden="true"></i></small></td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->index_number}}</td>
                                    <td>{{$user->study->name}}</td>
                                    <td><input class="field" type="checkbox" name="users[]" value="{{$user->id}}"></td>
                                    <td><input class="hidden" name="task_id" value="{{$task->id}}"></td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        @foreach($task->collegium->user as  $key => $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->index_number}}</td>
                                    <td>{{$user->study->name}}</td>
                                    <td><input class="field" type="checkbox" name="users[]" value="{{$user->id}}"></td>
                                    <td><input class="hidden" name="task_id" value="{{$task->id}}"></td>
                                </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </fieldset>
        </form>
    </div>
@endsection