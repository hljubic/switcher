@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
            <ul class="nav nav-pills nav-justified" style=" border: 3px;">
                <li><a href="#table_view" data-toggle="tab">Pregled kolegija na studiju</a></li>
                <li><a href="{{route('collegium_study_create')}}" class="btn">Dodaj</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kolegij</th>
                            <th>Studij</th>
                            <th>Uredi</th>
                            <th>Izbriši</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($collegium_study as $collegium_study)
                            <tr>
                                <td>{{$collegium_study->id}}</td>
                                <td>{{$collegium_study->collegium->name}}</td>
                                <td>{{$collegium_study->study->name}}</td>
                                <td><a href="{{route('collegium_study_edit')}}/{{$collegium_study->id}}"
                                       class="btn btn-primary btn-xs">Uredi</a></td>
                                <td><a href="{{route('collegium_study_delete')}}/{{$collegium_study->id}}"
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
