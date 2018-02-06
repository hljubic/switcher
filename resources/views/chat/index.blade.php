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
                            <button type="button" data-toggle="modal" data-target="#newConversation" title="Novi razgovor" class="btn">
                                <i class="fa fa-edit" style="color:#18BC9C; font-size:25px;"></i>
                            </button>
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
                    <div id="lista_razgovora" class="list-group">
                        <div ng-repeat="conv in conversations" >
                        <ul href="#" class="list-group-item swt-nav-item"
                            ng-click="selectConversation(conv)"
                            ng-class="{'selected-conversation':conv.id == selectedConversation.id}"
                            ng-repeat="par in conv.participants">

                            <li  style="list-style-type: none;" >
                                <h4 class="list-group-item-heading" style="padding-bottom:5px;" ng-if="par.id != {{Auth::user()->id}}"><% par.name %></h4>
                                <p class="list-group-item-text" style="padding-bottom:5px; color:#20c997;"
                                   ng-if="par.id != {{Auth::user()->id}}">
                                    <%par.name%></p>
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
                            <h4>Messages with <span class="swt-current-conversation-contact">
                                    <% selectedConversation.title %></span></h4>
                        </div>


                        <div id = "message-content" class="swt-chat-messages-area swt-users-messages"
                             style="padding-top: 10px; overflow: scroll;" scroll-bottom="bottom">
                            <div ng-repeat="msg in messages">


                                <div ng-if="msg.sender_id != {{Auth::user()->id}}">
                                    <div class="row" style="margin-left: 10px">
                                        <div style="position: relative; bottom: 0px; margin-left: 10px">
                                            <p style="color: lightslategray; font-size: small"><%msg.created_at %></p>
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
                            {{--<input placeholder="User name" type="text" class="form-control" ng-model="new_conversation">--}}

                            <input placeholder="User name" type="text" class="form-control"  name="browser"
                                   style="border-radius:0px; background-color:rgba(179, 179, 179,0.3); border:none; color:#000000;"
                                   ng-model="searchText">
                            <datalist id="browsers">
                                <option ng-repeat="user in users | filter: searchText"
                                        value="<%user.name%>"  ng-model="select_user(user.id)">
                            </datalist>
                        </div>
                    </form>
                    <p style="visibility: hidden; position: fixed" value="<%selected_user%>"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" ng-click="addNewConversation()" data-dismiss="modal">Save changes</button>
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
        {{--var API_MESSAGES = '{{ route('messages', 1) }}'--}}
        {{--var API_PARTICIPANTS = '{{route('participants', 3)}}';--}}
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
//                    var API_PARTICIPANTS
                    var element = document.getElementById("message-content");
                    $scope.selectConversation = function (con) {
                        $scope.selectedConversation = con;
                        console.log($scope.selectedConversation)
                        $scope.slectedName = function () {
                            angular.forEach($scope.selectedConversation, function(value, key){
                                if(value.participants.name != '{{Auth::user()->name}}'){
                                    return value.participants.name;
                                }
                            });
                        }
                        API_MESSAGES = '{{ route('messages1','')}}' + '/' +  $scope.selectedConversation.id


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

                        $new_conversation = {'user_id': $scope.selected_user};
                        $http({
                            method: 'POST',
                            url: API_NEW_CONVERSATON,
                            data: JSON.stringify($new_conversation)
                        }).then(function successCallback(response) {
                            $scope.conversations = response.data;

                        }, function errorCallback(response) {
                            console.log("greška prilokom kreiranja razgvora!")
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                        //console.log( $scope.selected_user)
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
                        console.log(formattedDate);

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