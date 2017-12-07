@extends('layouts.app')

@section('content')

    <div class="container-fluid" ng-controller="MainCtrl">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">

                    <h3 class="conversations-label">Conversations</h3>

                    <li class="nav-item">
                        <!-- dodaje klasu active -->
                        <a class="nav-link active" href="#"><% current_conv %><span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item" ng-repeat="user in users track by $index">
                        <a class="nav-link" href="#" ng-click="change_conv()"><% user %></a>
                    </li>

                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h3>Dashboard</h3>
                <hr>



                <div class="media mb-3" ng-repeat="message in messages track by $index">

                    <div class="media-body" ng-if="message.creator_id == 2 && message.conversation_id == current">
                        <img class="mr-4 swt-no-break-img" src="https://cdn.jsdelivr.net/emojione/assets/png/1f439.png" alt="Generic placeholder image">
                        <div class="row">
                            <div class="col-3 bg-dark text-white swt-message-rounded">

                                <p class="font-weight-bold"><% message.content %></p>
                            </div>
                        </div>
                    </div>


                    <div class="media-body" ng-if="message.sender_id != 2 && message.conversation_id == current">
                        <div class="row">
                            <div class="col-8"></div>
                            <div class="col-3 bg-info text-white swt-message-rounded">
                                <p class="font-weight-bold text-right"><% message.content %></p>
                            </div>
                            <div class="col-1">
                                <img class="align-self-start mr-4" src="https://cdn.jsdelivr.net/emojione/assets/png/1f439.png" alt="Generic placeholder image">
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular.min.js"></script>
    <script src="{{asset('https://code.jquery.com/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="{{asset('js/ang_app.js')}}"></script>
    {{--<script src="http://localhost:3000/socket.io/socket.io.js"></script>--}}


    <script>
        <!-- ANGULAR -->


        <!-- kraj angulara-->

        {{--$(function () {--}}
            {{--var socket = io('localhost:3000');--}}
            {{--$('form').submit(function () {--}}
                {{--socket.emit('send_message', $('#m').val());--}}
                {{--var date = {--}}
                    {{--'content': $('#m').val(),--}}
                    {{--'conversation_id': $('#conversation_id').val(),--}}
                    {{--'sender_id': $('#sender_id').val(),--}}
                    {{--'created_at': $('#created_at').val()--}}
                {{--};--}}
                {{--$.ajax({--}}
                    {{--type: "POST",--}}
                    {{--url: "{{route("message_create")}}",--}}
                    {{--headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
                    {{--data: date--}}
                {{--});--}}
                {{--$('#m').val('');--}}
                {{--//socket.emit('typing', 0);--}}
                {{--return false;--}}
            {{--});--}}
            {{--$('#m').on('keyup', function () {--}}
                {{--if (($('#m').val() === '')) {--}}
                    {{--socket.emit('typing', 0);--}}
                {{--} else {--}}
                    {{--socket.emit('typing', 1);--}}
                {{--}--}}
            {{--});--}}
            {{--socket.on('typing', function (msg) {--}}
                {{--if (msg === 1) {--}}
                    {{--$('#typing').show();--}}
                {{--}--}}
                {{--else {--}}
                    {{--$('#typing').hide();--}}
                {{--}--}}
            {{--});--}}
            {{--socket.on('receive_message', function (msg) {--}}
                {{--var date = new Date();--}}
                {{--var nova_poruka = "<li class=" + 'me' + " id=" + 'id' + " >" +--}}
                    {{--//"<div class=\'message-user1-icon\'></div>"+--}}
                    {{--"<div class='list-group-item' >" + '{{ Auth::user()->name }}' +--}}
                    {{--"<div class=\"message-time help-block\">" + date.getYear() + "-" + date.getMonth() + "-" + date.getDay() + " " + date.getHours() + ':' + date.getMinutes() +--}}
                    {{--"</div>" +--}}
                    {{--"<div  class='messager-right div left'>" + msg +--}}
                    {{--"</div>" +--}}
                    {{--"<div class='clear'></div>" +--}}
                    {{--"</div>" +--}}
                    {{--//'<p>' + msg + '</p>' +--}}
                    {{--"</li>";--}}
                {{--// nova_poruka.find('p').text(msg);--}}
                {{--$('#poruke').append(nova_poruka);--}}
                {{--//$('#poruke').append($('<li>').html('{{ Auth::user()->name }} at ' + date.getHours() + ':' + date.getMinutes() + ' sent : <strong>' + msg + '</strong>'));--}}
            {{--});--}}
        {{--});--}}
    </script>
@endpush