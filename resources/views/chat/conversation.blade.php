@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Naziv razgovora: {{$conversation->title}}</h4>
    <h4>Sudionici: </h4>
    @foreach($conversation->participants as $participant)
        {{$participant->name}}
        <br>
    @endforeach
</div>
@endsection