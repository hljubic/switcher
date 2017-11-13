@extends ('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#table_view" data-toggle="tab">Zadaci</a></li>
            <li><a href="{{route('taskuser_create')}}" class="btn btn-success">Dodaj</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Zadatak</th>
                        <th>Student</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{$team->id}}</td>
                            <td>{{$team->status}}</td>
                            <td>{{$team->task->name}}</td>
                            <td>{{$team->user->name}}</td>


                            <td><a href="{{route('taskuser_edit')}}/{{$team->id}}"
                                   class="btn btn-primary btn-xs">Uredi</a></td>
                            <td><a href="{{route('taskuser_delete')}}/{{$team->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
