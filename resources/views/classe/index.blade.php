@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
            <ul class="nav nav-pills nav-justified" style=" border: 3px;">
                <li><a href="#table_view" data-toggle="tab">Pregled sati</a></li>
                <li><a href="{{route('classes_create')}}" class="btn">Dodaj</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tip</th>
                            <th>Kolegij</th>
                            <th>Uredi</th>
                            <th>Izbriši</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($classes as $classe)
                            <tr>
                                <td>{{$classe->id}}</td>
                                <td>{{$classe->type}}</td>
                                <td>{{$classe->collegium->name}}</td>
                                <td><a href="{{route('classes_edit')}}/{{$classe->id}}"
                                       class="btn btn-primary btn-xs">Uredi</a></td>
                                <td><a href="{{route('classes_delete')}}/{{$classe->id}}"
                                       class="btn btn-danger btn-xs">Izbriši</a>
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
