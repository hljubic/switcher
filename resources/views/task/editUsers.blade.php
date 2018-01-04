@extends ('layouts.app')

@section('content')
    <div class="well col-lg-6 col-lg-offset-3" style="margin-top: 50px; background-color: #fff;">
        <form class="form-horizontal" action="{{route('task_user')}}/edit/{{$task->id}}" method="POST">
            {{ method_field("PATCH") }}
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
                                       class="btn noborder btn-success btn-block btn-sm"
                                       style="align-self: flex-start; margin-top: 30px;">Spremi</button>
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
                                       class=" btn noborder btn-warning btn-block btn-sm"
                                       style="align-self: flex-start; margin-top: 30px;">Spremi</button>
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
                                       class="btn noborder btn-danger btn-block btn-sm"
                                       style="align-self: flex-start; margin-top: 30px;">Spremi</button>
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
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taskusers as $taskuser)
                        <tr>
                            <td>
                                <p></p>
                                <p>{{$taskuser->user->name}}</p>
                                <input type="hidden" name="users[]" value="{{$taskuser->user->id}}">
                            </td>
                            <td width="50%">
                                <select class="form-control" id="select" name="statuses[]">
                                    <option value="in progress" {{ ($taskuser->status == "in progress") ? 'selected' : ''}}>
                                        U
                                        izradi
                                    </option>
                                    <option value="finished" {{ ($taskuser->status == "finished") ? 'selected' : ''}}>
                                        Završeno
                                    </option>
                                    <option value="not finished" {{ ($taskuser->status == "not finished") ? 'selected' : ''}}>
                                        Nije završeno
                                    </option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </fieldset>
        </form>
    </div>
@endsection