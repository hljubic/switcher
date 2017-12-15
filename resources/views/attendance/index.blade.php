@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
            <ul class="nav nav-pills nav-justified" style=" border: 3px;">
                <li><a href="#table_view" data-toggle="tab">Prisutnost</a></li>
                <li><a href="{{route('attendances_create')}}" class="btn">Dodaj</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nastava</th>
                            <th>Korisnik</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td>{{$attendance->id}}</td>
                                <td>{{$attendance->classe->type}}</td>
                                <td>{{$attendance->user->name}}</td>
                                <td><a href="{{route('attendances')}}/{{$attendance->id}}" class="btn btn-warning btn-xs">Prikaz</a>
                                </td>
                                <td><a href="{{route('attendances_edit')}}/{{$attendance->id}}"
                                       class="btn btn-primary btn-xs">Uredi</a></td>
                                <td><a href="{{route('attendances_delete')}}/{{$attendance->id}}" class="btn btn-danger btn-xs">Izbriši</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection