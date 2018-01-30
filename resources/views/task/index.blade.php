@extends ('layouts.app')

@section('content')
    @if(count($tasks) > 0)
        <div class="col-md-8 col-md-offset-2">
            <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
                <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
                    <li><a href="#table_view" data-toggle="tab">Zadaci</a></li>
                    <li><a href="{{route('tasks_create')}}" class="btn">Dodaj</a></li>
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
                                    @if(count($task->collegium) > 0 )
                                        <td>{{$task->collegium->name}}</td>
                                    @endif
                                    <td>{{$task->created_at}}</td>

                                    <td><a href="{{route('tasks')}}/{{$task->id}}"
                                           class="btn noborder btn-warning btn-xs">Prikaz</a>
                                    </td>
                                    <td><a href="{{route('tasks_edit')}}/{{$task->id}}"
                                           class="btn swt-button-prim btn-xs">Uredi</a></td>
                                    <td><a href="{{route('tasks_delete')}}/{{$task->id}}"
                                           class="btn noborder btn-danger btn-xs">Izbriši</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-lg-8 col-md-offset-2">
            <div class="panel panel-default" style="margin-top: 50px;">
                <div class="panel-body">
                    <div id="page-content-wrapper">

                        <p style="font-size: 20px; padding-bottom: 30px; font-family: 'Raleway', sans-serif;
                          font-weight: 100; color: #636b6f; text-align: center;">Tablica "tasks" nema nikakvih
                            podataka</p>
                        <div class="row">
                            <a href="{{route('tasks_create')}}"
                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj zadatak</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
