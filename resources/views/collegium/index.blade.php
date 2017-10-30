@extends ('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3">
    <h1>Kolegiji </h1>

        @foreach($collegiums as $collegium)
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="{{route('collegium_show',$collegium->id)}}">{{$collegium->name}}</a></h3>
                </div>
                <div class="panel-body">
                    {{$collegium->description}}

                </div>
            </div>
        @endforeach
    </div>
@endsection
