@extends('layouts.app')

@section('content')
    <div  ng-cloak >
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-3 swt-sidebar" >
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3" style="padding-bottom: 10px; padding-top:20px; text-align: center;">
                            <h4>Conversations</h4>
                        </div>
                        <div class="col-lg-3" style="padding-bottom: 10px; padding-top:17px; text-align: center;">
                            <a href="" data-toggle="tooltip" data-placement="bottom" title="Novi razgovor" class="btn"><i class="fa fa-edit" style="color:#18BC9C; font-size:25px;"></i></a>
                        </div>
                    </div>
                    <hr class="nopadding">
                    <div class="list-group-item">

                        <div class="input-group input-group-sm ">
                            <input type="text" class="form-control" placeholder="Search " list="browsers" name="browser"
                                   style="border-radius:0px; background-color:rgba(179, 179, 179,0.3); border:none; color:#fff;">
                            <datalist id="browsers">
                                <option ng-repeat="user in users" value="<%user.name%>">

                            </datalist>
                            <span class="input-group-btn">
                                     <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                        </div>

                    </div>
                    <div class="list-group">
                        <div ng-repeat="conv in conversations">
                            <div ng-repeat="par in conv.participants">
                                <ul href="#" class="list-group-item swt-nav-item"
                                    ng-click="selectConversation(conv)"
                                    ng-class="{'selected-conversation':conv.id == selectedConversation.id}"
                                >

                                    <li  style="list-style-type: none;" >
                                        <h4 class="list-group-item-heading" style="padding-bottom:5px;"><% conv.title %></h4>
                                        <p class="list-group-item-text" style="padding-bottom:5px; color:#20c997;"
                                           ng-if="par.id != {{Auth::user()->id}}">
                                            <%par.name%></p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                </div> <!-- swt-sidebar -->

                <div class="col-lg-6 nopadding">
                    <div class="swt-chat-window ">
                        <div class="col-lg-12 " style="padding-bottom: 16px; padding-top:20px; text-align: center; border-bottom: solid 2px #18BC9C;">
                            <h4>Messages with <span class="swt-current-conversation-contact"><% selectedConversation.title %></span></h4>
                        </div>


                        <div id = "message-content" class="swt-chat-messages-area swt-users-messages" style="padding-top: 10px;">
                            <div ng-repeat="msg in messages">


                                <div ng-if="msg.sender_id != {{Auth::user()->id}}">
                                    <div>

                                        <div class=" col-lg-4 swt-msg-wrapper swt-others-msg">
                                            <% msg.content %>

                                        </div>
                                        <div class="col-lg-8"></div>

                                    </div>
                                </div>

                                <div ng-if="msg.sender_id == {{Auth::user()->id}}">
                                    <div class="row ">

                                        <div class="col-xs-4 col-lg-offset-8">

                                            <div class="swt-msg-wrapper swt-my-msg" style="margin-bottom: 3px;" >
                                                <% msg.content %>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row col-lg-10 col-lg-offset-1 createMessage">
                        <div class="col-lg-10 ">
                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter new message"
                                   ng-model="newMessage">
                        </div>
                        <div class="col-lg-2 nopadding">
                            <button class="btn  btn-block btn-success"
                                    ng-click="sendNewMessage()">
                                Send
                            </button>
                        </div>
                    </div><!-- swt-chat-window -->
                </div>

                <div class="col-lg-3 swt-sidebar" >

                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="{{asset('https://code.jquery.com/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    <script>
                {{--var API_MESSAGES = '{{ route('messages', 1) }}'--}}
                {{--var API_PARTICIPANTS = '{{route('participants', 3)}}';--}}
        var API_CONVERSATIONS = '{{route('conversations1')}}';
        var API_NEW_MESSAGE = '{{route('create_message')}}';
        (function(){
            angular.module("swtSearchApp", [])
                .config(['$interpolateProvider', function($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                }])
                .controller("swtSearchMainController", function($scope, $http){
                    var API_MESSAGES
//                    var API_PARTICIPANTS
                    var element = document.getElementById("message-content");
                    $scope.selectConversation = function (con) {
                        $scope.selectedConversation = con;
//                        console.log($scope.selectedConversation.id)
                        API_MESSAGES = '{{ route('messages1','')}}' + '/' +  $scope.selectedConversation.id
                        element.scrollTop = element.scrollHeight;
                        $scope.getMessages();
                    }
                    $scope.init = function () {
                        // Ulazna točka aplikacije
                        $scope.getMessages();
//                        $scope.getParticipants();
                        $scope.getConversations();
                        $scope.getUsers();
                        {{--API_PARTICIPANTS = '{{route('participants', '')}}' + '/' +  $scope.selectedConversation.id--}}
                        //                        $scope.reload = function () {
                        //                            $http.get('http://localhost/switcher/public/chat').
                        //                            success(function (data) {
                        //                                $scope.todos = data.todos;
                        //                                console.log("radi")
                        //                            });
                        //                        };
                        setInterval(function(){ $scope.getMessages(); }, 2000);
//                        $scope.reload();
//                        $timeout($scope.getMessages(), 3000)
                        console.log('pozvanInit')
                    };
                    {{--API_PARTICIPANTS = '{{route('participants', '')}}' + '/' +  {'nesto': $scope.conv.id}--}}
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
                        element.scrollTop = element.scrollHeight;
                    };
                    console.log($scope.newMessage)
//                    $scope.getParticipants = function () {
//
//                        $http({
//                            method: 'GET',
//                            url: API_PARTICIPANTS
//                        }).then(function successCallback(response) {
//                            $scope.participants = response.data;
//                            console.log($scope.participants)
//                        }, function errorCallback(response) {
//                            // called asynchronously if an error occurs
//                            // or server returns response with an error status.
//                        });
//                    }
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
                            //console.log($scope.messages)
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