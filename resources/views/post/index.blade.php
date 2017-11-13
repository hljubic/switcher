@extends ('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#table_view" data-toggle="tab">Objave</a></li>
            <li><a href="{{route('post_create')}}" class="btn btn-success">Dodaj</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="table_view" style="padding-top:35px">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sadržaj</th>
                        <th>Datum i vrijeme</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->created_at}}</td>

                            <td><a href="{{route('post_edit')}}/{{$post->id}}" class="btn btn-primary btn-xs">Uredi</a>
                            </td>
                            <td><a href="{{route('post_delete')}}/{{$post->id}}"
                                   class="btn btn-danger btn-xs">Izbriši</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
