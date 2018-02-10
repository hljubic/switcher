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
                        <div class="col-lg-3 text-right" style="padding-bottom: 10px; padding-top:17px; text-align: center;">
                            <a type="button" data-toggle="modal" data-target="#newConversation" title="Novi razgovor" class="btn">
                                <i class="fa fa-edit" style="color:#18BC9C; font-size:25px;"></i>
                            </a>
                        </div>
                    </div>
                    <hr class="nopadding">
                    <div class="list-group-item">
                        <div class="input-group input-group-sm ">
                            <input type="text" class="form-control" placeholder="Search conversation"
                                   style="border-radius: 2px; background-color:rgba(179, 179, 179,0.3); border:none; color:#000000; width: 390px"
                                   ng-model="searchText1">
                        </div>
                    </div>
                    <div id="lista_razgovora" class="list-group">
                        <div ng-repeat="conv in conversations" >
                            <ul href="#" class="list-group-item swt-nav-item"
                                ng-click="selectConversation(conv)"
                                ng-class="{'selected-conversation':conv.id == selectedConversation.id}"
                                ng-repeat="par in conv.participants | filter: searchText1">

                                <li style="list-style-type: none;">
                                    <h4 class="list-group-item-heading" style="padding-bottom:5px; color:#20c997;" ng-if="par.id != {{Auth::user()->id}}"><% par.name %></h4>
                                    <p class="list-group-item-text" style="padding-bottom:5px; color: lightslategray;"
                                       ng-if="par.id != {{Auth::user()->id}}" >
                                        <% conv.title %>
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <br/>
                    <br/>
                </div> <!-- swt-sidebar -->

                <div class="col-lg-6 nopadding">
                    <div class="swt-chat-window ">
                        <div class="col-lg-12 " style="padding-bottom: 16px; padding-top:20px; text-align: center; border-bottom: solid 2px #18BC9C;" >
                            <h4>Messages with
                                <span class="swt-current-conversation-contact" ng-repeat="par in selectedConversation.participants">
                                    <% par.name %></span>
                            </h4>
                        </div>

                        <div id = "message-content" class="swt-chat-messages-area swt-users-messages" style="padding-top: 10px; overflow: scroll;" scroll-bottom="bottom">
                            <div ng-repeat="msg in messages">
                                <div ng-if="msg.sender_id != {{Auth::user()->id}}">
                                    <div class="row" style="margin-left: 10px">
                                        <div style="position: relative; bottom: 0px; margin-left: 10px">
                                            <div ng-repeat="user in users">
                                                <p style="color: lightslategray; font-size: small" ng-if="msg.sender_id == user.id">
                                                    <%msg.created_at %>  @<%user.name%></p></div>
                                        </div>
                                        <div class=" col-lg-4 swt-msg-wrapper swt-others-msg" style="margin-bottom: 3px;">
                                            <% msg.content %>
                                        </div>
                                        <div class="col-lg-8"></div>
                                    </div>
                                </div>

                                <div ng-if="msg.sender_id == {{Auth::user()->id}}">
                                    <div class="row">

                                        <div class="col-xs-4 col-lg-offset-8">
                                            <div style="position: relative; bottom: 0px">
                                                <p style="color: lightslategray; font-size: small; text-align: right"><%msg.created_at %></p>
                                            </div>
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
                        <div class="col-lg-10 " >
                            <input type="text"
                                   class="form-control"
                                   placeholder="Enter new message"
                                   ng-model="newMessage" ng-submit="sendNewMessage()">
                        </div>
                        <div class="col-lg-2 nopadding">
                            <button class="btn  btn-block btn-success"
                                    ng-click="sendNewMessage()" >
                                Send
                            </button>
                        </div>
                    </div><!-- swt-chat-window -->
                </div>

                <div class="col-lg-3 swt-sidebar" >
                    <div class="row">
                        <div class="col-lg-12 " style="padding-bottom: 16px; padding-top:20px; text-align: center; border-bottom: solid 2px #18BC9C;" >
                            <h4>Participants of the conversation</h4>
                        </div>
                    </div>
                    <div class="list-group">
                        <div ng-repeat="par in selectedConversation.participants">
                            <ul href="#" class="list-group-item swt-nav-item">
                                <li  style="list-style-type: none; height: 50px" >
                                    <div class="col-lg-8">
                                        <h4 class="list-group-item-heading" style=" color:#20c997;"

                                            ng-model="select_user(par.id)" ng-if="par.id != {{Auth::user()->id}}">
                                            <% par.name %></h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <a href="{{route('users')}}/<%selected_user%>" class="btn btn-success" type="button">Profile</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newConversation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Novi razgovor</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <input placeholder="User name" type="text" class="form-control"  name="browser"
                                   style="border-radius:0px; background-color:rgba(179, 179, 179,0.3); border:none; color:#000000;" ng-model="searchText2">
                            <datalist id="browsers">
                                <option ng-repeat="user in users | filter: searchText2"
                                        value="<%user.name%>"  ng-model="select_user(user.id)">
                            </datalist>
                        </div>
                    </form>
                    <p style="visibility: hidden; position: fixed" value="<%selected_user%>"></p>
                </div>
                <div class="modal-footer">
                    {{--<div ng-repeat="pr in provjera" ng-model="select(pr)"></div>--}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"

                            {{--ng-model = "radi()"--}}
                            ng-click="addNewConversation()" data-dismiss="modal">Save changes</button>
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

    {{--<script src="//bootstrap/dist/js/bootstrap.min.js"></script>--}}

    <script>
        var API_CONVERSATIONS = '{{route('conversations1')}}';
        var API_NEW_CONVERSATON = '{{route('create_conversation1')}}';
        var API_NEW_MESSAGE = '{{route('create_message')}}';
        (function(){
            angular.module("swtSearchApp", [])
                .config(['$interpolateProvider', function($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                }])
                .controller("swtSearchMainController", function($scope, $http){
                    var API_MESSAGES
                    var element = document.getElementById("message-content");
                    $scope.selectConversation = function (con) {
                        $scope.selectedConversation = con;
                        $scope.searchText1 = "";
                        API_MESSAGES = '{{ route('messages1','')}}' + '/' +  $scope.selectedConversation.id
                        $scope.getMessages();
                    }
                    $scope.init = function () {
                        // Ulazna točka aplikacije
                        $scope.getMessages();
                        $scope.getConversations();
                        $scope.getUsers();
                        setInterval(function(){ $scope.getMessages(); }, 3000);
//                        $scope.reload();
//                        $timeout($scope.getMessages(), 3000)
                        console.log('pozvanInit')
                    };
                    $scope.select_user = function (usr) {
                        $scope.selected_user = usr;
                    }
                    //dodavanje novog razgovora
                    $scope.addNewConversation = function(){
                        var date = new Date().toLocaleString('en-US',{hour12:false}).split(" ");
                        //razdvajanje na datum i vrijeme
                        var time = date[1];
                        var mdy = date[0];
                        // korigiranje dijelova za spremanje u bazu
                        mdy = mdy.split('/');
                        var month = parseInt(mdy[0]);
                        var day = parseInt(mdy[1]);
                        var year = parseInt(mdy[2]);
                        var formattedDate = year + '/' + month + '/' + day + ' ' + time;
                        $new_conversation = {'user_id': $scope.selected_user, 'created_at': formattedDate};
                        $http({
                            method: 'POST',
                            url: API_NEW_CONVERSATON,
                            data: JSON.stringify($new_conversation)
                        }).then(function successCallback(response) {
                            $scope.conversations = response.data;
//                            console.log(response.data[0].id);
                            if($scope.conversations != $scope.selected_user){
//                                alert("Razgovor već postoji")
                                $scope.selectedConversation = response.data[0];
                                API_MESSAGES = '{{ route('messages1','')}}' + '/' +  response.data[0].id;
                                $scope.getMessages();
                                $scope.getConversations();
                            }
                        }, function errorCallback(response) {
                            console.log("greška prilokom kreiranja razgvora!")
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                        $scope.searchText2 = ""
                    };
                    $scope.sendNewMessage = function() {
                        var date = new Date().toLocaleString('en-US',{hour12:false}).split(" ");
                        //razdvajanje na datum i vrijeme
                        var time = date[1];
                        var mdy = date[0];
                        // korigiranje dijelova za spremanje u bazu
                        mdy = mdy.split('/');
                        var month = parseInt(mdy[0]);
                        var day = parseInt(mdy[1]);
                        var year = parseInt(mdy[2]);
                        var formattedDate = year + '/' + month + '/' + day + ' ' + time;
//                        console.log(formattedDate);
                        $newMessage = {'content_msg': $scope.newMessage, 'conversation_id': $scope.selectedConversation.id,
                            'created_at': formattedDate};
                        $http({
                            method: 'POST',
                            url: API_NEW_MESSAGE,
                            data: JSON.stringify($newMessage)
                        }).then(function successCallback(response) {
                            $scope.messages = response.data;
                            setTimeout(function () {
                                element.scrollTop = element.scrollHeight;
                            }, 100)
                        }, function errorCallback(response) {
                            console.log("greška prilokom slanja poruke!")
                            if ($scope.newMessage == ""){
                                alert("Morate unijeti poruku!")
                            }
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                        $scope.newMessage = "";
                    };
                    $scope.getConversations = function () {
                        $http({
                            method: 'GET',
                            url: API_CONVERSATIONS
                        }).then(function successCallback(response) {
                            $scope.conversations = response.data;
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
                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                        setTimeout(function () {
                            element.scrollTop = element.scrollHeight;
                        }, 100)
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