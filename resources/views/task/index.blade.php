@extends ('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#table_view" data-toggle="tab">Zadaci</a></li>
            <li><a href="{{route('task_create')}}" class="btn btn-success">Dodaj</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Krajnji rok</th>
                        <th>Opis</th>
                        <th>Vrsta zadatka</th>
                        <th>Kolegij</th>
                        <th>Datum i vrijeme</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->name}}</td>
                            <td>{{$task->deadline}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->type}}</td>
                            <td>{{$task->collegium->name}}</td>
                            <td>{{$task->created_at}}</td>

                            <td><a href="{{route('task_edit')}}/{{$task->id}}" class="btn btn-primary btn-xs">Uredi</a>
                            </td>
                            <td><a href="{{route('task_delete')}}/{{$task->id}}"
                                   class="btn btn-danger btn-xs">Izbriši</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
