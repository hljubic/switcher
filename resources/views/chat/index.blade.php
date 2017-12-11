@extends('layouts.app')

@section('content')
    <div  ng-cloak>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xs-3 swt-sidebar">
                    <ul class="nav nav-pills">

                        <h2 class="swt-conversations-label">Conversations</h2>

                        {{--<a  ng-click="getMessages()">TEST</a>--}}

                        {{--<li class="nav-item active">--}}
                        {{--<% current_conv %>--}}
                        {{--</li>--}}
                        {{--<div ng-repeat="participant in participants">--}}
                        {{--<li class="nav-item"  ng-repeat="user in users"--}}
                        {{--ng-if="participant.user_id == user.id" >--}}
                        {{--<% user.name %>--}}
                        {{--</li>--}}
                        {{--</div>--}}
                        <li class="nav-item" ng-repeat="conv in conversations" ng-click="selectConversation(conv)">
                            <% conv.title %>
                        </li>

                    </ul>
                    <br/>
                    <br/>
                </div> <!-- swt-sidebar -->

                <div class="col-xs-9 swt-chat-window">
                    <h3>Messages with <span class="swt-current-conversation-contact"><% selectedConversation.title %></span></h3>
                    <hr>

                    <div class="swt-chat-messages-area swt-users-messages">
                        <div ng-repeat="msg in messages">


                            <div ng-if="msg.sender_id != {{Auth::user()->id}}">
                                <div>
                                    <p>
                                    <div class="swt-msg-wrapper swt-others-msg">
                                        <% msg.content %>

                                    </div>
                                    </p>

                                </div>
                            </div>

                            <div ng-if="msg.sender_id == {{Auth::user()->id}}">
                                <div class="row">
                                    <div class="col-xs-8 swt-remove-padding"></div>
                                    <div class="col-xs-4 swt-remove-padding">

                                        <p class="text-right">
                                        <div class="swt-msg-wrapper swt-my-msg">
                                            <% msg.content %>

                                        </div>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swt-input-messager">

                        <input type="text"
                               class="form-control"
                               placeholder="Enter new message"
                               ng-model="newMessage">

                        <button class="btn swt-btn"
                                ng-click="sendNewMessage()">
                            Send
                        </button>

                    </div>


                </div> <!-- swt-chat-window -->
                <div class="swt-send-messages-area">


                </div>

            </div>
        </div>
    </div>

    {{--<div class="container-fluid" ng-controller="MainCtrl">--}}
        {{--<div class="row">--}}
            {{--<nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">--}}
                {{--<ul class="nav nav-pills flex-column">--}}

                    {{--<h3 class="conversations-label">Conversations</h3>--}}

                    {{--<li class="nav-item">--}}
                        {{--<!-- dodaje klasu active -->--}}
                        {{--<a class="nav-link active" href="#"><% current_conv %><span class="sr-only">(current)</span></a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item" ng-repeat="user in users track by $index">--}}
                        {{--<a class="nav-link" href="#" ng-click="change_conv()"><% user %></a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</nav>--}}

            {{--<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">--}}
                {{--<h3>Dashboard</h3>--}}
                {{--<hr>--}}



                {{--<div class="media mb-3" ng-repeat="message in messages track by $index">--}}

                    {{--<div class="media-body" ng-if="message.creator_id == 2 && message.conversation_id == current">--}}
                        {{--<img class="mr-4 swt-no-break-img" src="https://cdn.jsdelivr.net/emojione/assets/png/1f439.png" alt="Generic placeholder image">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-3 bg-dark text-white swt-message-rounded">--}}

                                {{--<p class="font-weight-bold"><% message.content %></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


                    {{--<div class="media-body" ng-if="message.sender_id != 2 && message.conversation_id == current">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-8"></div>--}}
                            {{--<div class="col-3 bg-info text-white swt-message-rounded">--}}
                                {{--<p class="font-weight-bold text-right"><% message.content %></p>--}}
                            {{--</div>--}}
                            {{--<div class="col-1">--}}
                                {{--<img class="align-self-start mr-4" src="https://cdn.jsdelivr.net/emojione/assets/png/1f439.png" alt="Generic placeholder image">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</main>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="{{asset('https://code.jquery.com/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>


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
    <script>
        {{--var API_MESSAGES = '{{ route('messages', 1) }}'--}}
        var API_PARTICIPANTS = '{{route('participants', 3)}}';
        var API_CONVERSATIONS = '{{route('conversations')}}';
        var API_NEW_MESSAGE = '{{route('create_message')}}';

        (function(){

            angular.module("swtSearchApp", [])

                .config(['$interpolateProvider', function($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                }])

                .controller("swtSearchMainController", function($scope, $http){
                    var API_MESSAGES
                    $scope.selectConversation = function (con) {
                        $scope.selectedConversation = con;
                        console.log($scope.selectedConversation.id)
                        API_MESSAGES = '{{ route('messages','')}}' + '/' +  $scope.selectedConversation.id
                        console.log(API_MESSAGES)
                        $scope.getMessages();
                        //console.log($scope.selectedConversation)
                    }

                    $scope.init = function () {

                        // Ulazna točka aplikacije

                        $scope.getMessages();
                        $scope.getParticipants();
                        $scope.getConversations();
                        $scope.getUsers();
//                        $scope.reload = function () {
//                            $http.get('http://localhost/switcher/public/chat').
//                            success(function (data) {
//                                $scope.todos = data.todos;
//                                console.log("radi")
//                            });
//                        };
                        setInterval(function(){ $scope.getMessages(); }, 2000);
                        $scope.reload();
//                        $timeout($scope.getMessages(), 3000)
                        console.log('pozvanInit')
                    };

                    $scope.sendNewMessage = function() {

                        $newMessage = {'content_msg' :$scope.newMessage, 'conversation_id': $scope.selectedConversation.id};

                        $http({
                            method: 'POST',
                            url: API_NEW_MESSAGE,
                            data: JSON.stringify($newMessage)
                        }).then(function successCallback(response) {
                            $scope.messages = response.data;

                        }, function errorCallback(response) {
                            console.log("greška prilokom slanj poruke!")
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });

                        $scope.newMessage = "";
                    };

                    console.log($scope.newMessage)
                    $scope.getParticipants = function () {

                        $http({
                            method: 'GET',
                            url: API_PARTICIPANTS
                        }).then(function successCallback(response) {
                            $scope.participants = response.data;
                            console.log($scope.participants)
                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                    }
                    $scope.getConversations = function () {

                        $http({
                            method: 'GET',
                            url: API_CONVERSATIONS
                        }).then(function successCallback(response) {
                            $scope.conversations = response.data;
                            //console.log($scope.conversations);
                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                    }
                    $scope.getMessages = function () {

                        $http({
                            method: 'GET',
                            url: API_MESSAGES
                        }).then(function successCallback(response) {
                            $scope.messages = response.data;
                            console.log($scope.messages)
                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                    }
                    $scope.getUsers = function () {

                        $http({
                            method: 'GET',
                            url: API_USERS
                        }).then(function successCallback(response) {
                            $scope.users = response.data;
                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                    }

                })
        })();
    </script>
@endpush