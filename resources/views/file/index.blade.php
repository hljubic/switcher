@extends('layouts.app')

@section('content')
    @if(count($files) > 0)
        <div class="col-md-8 col-md-offset-2">
            <div id="page-content-wrapper" class="panel-default" style="margin-top: 50px;">
                <ul class="nav swt-nav-pills nav-justified" style=" border: 3px;">
                    <li><a href="#table_view" data-toggle="tab">Pregled datoteka</a></li>
                    <li><a href="{{route('files_create')}}" class="btn">Dodaj</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rad</th>
                                <th>Veličina</th>
                                <th>Opis</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{$file->id}}</td>
                                    <td>{{$file->name}}</td>
                                    <td>{{$file->size}}</td>
                                    <td>{{$file->description}}</td>
                                    <td><a href="{{route('files_edit')}}/{{$file->id}}"
                                           class="btn swt-button-prim btn-xs">Uredi</a></td>
                                    <td><a href="{{route('files_delete')}}/{{$file->id}}"
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
                          font-weight: 100; color: #636b6f; text-align: center;">Tablica "files" nema nikakvih
                            podataka</p>
                        <div class="row">
                            <a href="{{route('files_create')}}"
                               class="btn btn-success noborder col-lg-offset-5 col-lg-2">Dodaj datoteku</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection
