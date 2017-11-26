@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div id="page-content-wrapper">
            <ul class="nav nav-pills nav-justified" style=" border: 3px;">
                <li><a href="#table_view" data-toggle="tab">Pregled poruka</a></li>
                <li><a href="{{route('message_create')}}" class="btn">Dodaj</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Sadržaj poruke</th>
                            <th>Datum i vrijeme</th>
                            <th>Razgovor</th>
                            <th>Ime i prezime pošiljatelja</th>
                            <th>Uredi</th>
                            <th>Izbriši</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{$message->id}}</td>
                                <td>{{$message->content}}</td>
                                <td>{{$message->created_at}}</td>
                                <td>{{$message->conversation->title}}</td>
                                <td>{{$message->user->name}}</td>
                                <td><a href="{{route('message_edit')}}/{{$message->id}}" class="btn btn-primary btn-xs">Uredi</a>
                                </td>
                                <td><a href="{{route('message_delete')}}/{{$message->id}}"
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
