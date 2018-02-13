@extends('layouts.chatapp')

@section('content')
    <div ng-cloak>
        <div class="container-fluid">
            <div class="row">
                <!-- lista razgovora -->
                <div class="col-lg-3 swt-sidebar" style="border-right: solid 6px #F2F7F7; background-color:#F2F7F7; ">
                    <div class="row" style="background-color: #fff;">

                        <div class="col-lg-2 text-right"
                             style="padding-bottom: 10px; padding-top:17px; text-align: center;">
                            <a type="button" href="{{route('home')}}"
                               class="btn">
                                <i class="fa fa-angle-left" style="color:#18BC9C; font-size:25px;"></i>
                            </a>
                        </div>
                        <div class="col-lg-7" style="text-align: center;">
                            <a href="{{route('users')}}/{{auth()->user()->id}}" type="button"
                               class="btn btn-sm btn-block"
                               style="background-color: transparent; color: #18BC9C; margin: 17px;font-size: 20px;"
                               id="storename">
                                {{auth()->user()->name}}
                            </a>
                        </div>
                        <div class="col-lg-2 text-right"
                             style="padding-bottom: 10px; padding-top:17px; text-align: center;">
                            <a type="button" data-toggle="modal" data-target="#newConversation" title="Novi razgovor"
                               class="btn">
                                <i class="fa fa-edit" style="color:#18BC9C; font-size:23px;"></i>
                            </a>
                        </div>

                    </div>
                    <hr class="nopadding">

                    <ul class="nav swt-chat-nav-pills nav-justified nopadding"
                        style="background-color: #fff; border: 3px; margin-bottom: 0 !important;">
                        <li><a href="#conversation-data" data-toggle="tab">Razgovori</a></li>
                        <li><a href="#following" data-toggle="tab">Prijatelji</a></li>
                    </ul>
                    <hr class="nopadding">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="conversation-data">
                            <!-- search conversations -->
                            <div class="list-group-item " style=" margin-bottom: 3px;">
                                <div class="input-group input-group-sm col-lg-12">
                                    <span class="input-group-addon noborder" id="basic-addon1"
                                          style="background-color:rgba(179, 179, 179,0.3); border:none;color:#ACB9CF; text-align: center;"><i
                                                class="fa fa-search"></i> </span>
                                    <input type="text" class="form-control noborder"
                                           placeholder="Pretraži razgovore"
                                           style="border-radius: 2px; background-color:rgba(179, 179, 179,0.3); border:none; color:#000000;width: inherit; "
                                           ng-model="searchText1">
                                </div>
                            </div>
                            <!-- list of conversations-->
                            <div id="lista_razgovora" class="list-group">
                                <div ng-repeat="conv in conversations | filter : searchText1">
                                    <ul class="list-group-item swt-nav-item" ng-click="selectConversation(conv)"
                                        ng-class="{'selected-conversation':conv.id == selectedConversation.id}"
                                        ng-if="conv.participants.length >1"
                                        style="margin-bottom: 3px;">
                                        <li style="list-style-type: none;">
                                            <h4 class="list-group-item-heading"
                                                style="padding-bottom:5px; color:#20c997;"
                                                ng-if="conv.participants.length > 1"><% conv.title %></h4>
                                            <p class="list-group-item-text"
                                               style="padding-bottom:5px; color: lightslategray;"
                                               ng-if="par.id != {{Auth::user()->id}}">
                                                <% conv.message.content | limitTo: 60 %>
                                            </p>
                                            <p class="list-group-item-text"
                                               style="padding-bottom:5px; color: lightslategray;"
                                               ng-model="covnertDate(conv.last_message_time)">
                                                <%date | date :'EEE,HH:mm'%> </p>
                                        </li>
                                    </ul>
                                    <ul class="list-group-item swt-nav-item"
                                        ng-click="selectConversation(conv)"
                                        ng-class="{'selected-conversation':conv.id == selectedConversation.id}"
                                        ng-repeat="par in conv.participants | filter: searchText1"
                                        ng-if="conv.participants.length == 1"
                                        style="margin-bottom: 3px;">

                                        <li style="list-style-type: none;" ng-if="conv.participants.length == 1">
                                            <h4 class="list-group-item-heading"
                                                style="padding-bottom:5px; color:#20c997;"
                                                ng-if="par.id != {{Auth::user()->id}}"><% par.name %></h4>
                                            <p class="list-group-item-text"
                                               style="padding-bottom:5px; color: lightslategray;"
                                               ng-if="par.id != {{Auth::user()->id}}">
                                                <% conv.message.content | limitTo: 60 %>
                                            </p>
                                            <p class="list-group-item-text"
                                               style="padding-bottom:5px; color: lightslategray;"
                                               ng-model="covnertDate(conv.last_message_time)">
                                                <%date | date :'EEE,HH:mm'%> </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="following">
                            @php
                                $myFollowings = App\FollowerUser::where('follower_id', '=', auth()->user()->id)->get();
                            @endphp
                            @foreach($myFollowings as $myFollowing)

                                <div class="list-group-item list-group-item-action flex-column align-items-start noborder"
                                     style="margin-top: 3px; border-left: 3px solid #18BC9C;">
                                    <div class="d-flex w-100 justify-content-between">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <a href="{{route('users')}}/{{$myFollowing->user->id}}"><p
                                                            style="padding-top: 7px;">{{$myFollowing->user->name}}</p>
                                                </a>
                                            </div>
                                            <div class="col-lg-2" style="text-align: center;">
                                                <form class="form-horizontal"
                                                      action="{{route('create_conversation2')}}"
                                                      method="POST">
                                                    {{csrf_field()}}
                                                    <fieldset>
                                                        <input type="hidden" name="user_id"
                                                               value="{{$myFollowing->user->id}}">
                                                        <input type="hidden" name="created_at"
                                                               value="{{ date('y-m-d H:i:s') }}">
                                                        <button type="submit"
                                                                style="color: #18bc9c; background: transparent;"
                                                                class="glyphicon glyphicon-comment btn btn-sm"></button>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>

                </div> <!-- swt-sidebar -->
                <!-- poruke -->
                <div class="col-lg-6 nopadding">
                    <div class="swt-chat-window " style="border: solid 4px #fff;">
                        <div class="col-lg-12"
                             style="padding-bottom: 16px; padding-top:20px; text-align: left; border-bottom: solid 2px #18BC9C; height:80px; ">
                            <h5>
                                <span class="swt-current-conversation-contact"
                                      ng-repeat="par in selectedConversation.participants">
                                    <% par.name %> ..</span>
                            </h5>
                        </div>

                        <div id="message-content" class="swt-chat-messages-area swt-users-messages"
                             style="padding-top: 10px; overflow: scroll;" scroll-bottom="bottom">
                            <div ng-repeat="msg in messages">
                                <div ng-if="msg.sender_id != {{Auth::user()->id}}">
                                    <div class="row" style="margin-left: 10px">
                                        <div style="position: relative; bottom: 0px; margin-left: 10px">
                                            <div ng-repeat="user in users">
                                                <p style="color: lightslategray; font-size: small" ng-if="msg.sender_id == user.id" ng-model="covnertDate1(msg.created_at)">
                                                    <%date1 | date : 'MMM d, y HH:mm'%>  @<%user.name%></p>
                                            </div>
                                        </div>
                                        <div class=" col-lg-4 swt-msg-wrapper swt-others-msg"
                                             style="margin-bottom: 3px;">
                                            <% msg.content %>
                                        </div>
                                        <div class="col-lg-8"></div>
                                    </div>
                                </div>

                                <div ng-if="msg.sender_id == {{Auth::user()->id}}">
                                    <div class="row">

                                        <div class="col-xs-4 col-lg-offset-8">
                                            <div style="position: relative; bottom: 0px">
                                                <p style="color: lightslategray; font-size: small; text-align: right" ng-model="covnertDate2(msg.created_at)"><%date2 | date : 'MMM d, y HH:mm'%></p>
                                            </div>
                                            <div class="swt-msg-wrapper swt-my-msg" style="margin-bottom: 3px;">
                                                <% msg.content %>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- send message-->
                    <div class="row col-lg-12 createMessage nopadding" style="padding-right: 3px !important;">
                        <div class="col-lg-11 nopadding" style="padding-left: 3px !important;">
                            <input type="text"
                                   class="form-control noborder"
                                   placeholder="Napišite novu poruku"
                                   ng-model="newMessage" ng-submit="sendNewMessage()"
                                   style=""
                                   ng-keypress="checkIfEnterKeyWasPressed($event)">
                        </div>
                        <div class="col-lg-1 nopadding">
                            <button class="btn  btn-block btn-success noborder"
                                    ng-click="sendNewMessage()">
                                <i class="fa fa-send"></i>
                            </button>
                        </div>
                    </div><!-- swt-chat-window -->
                </div>
                <!-- sudionici u razgovoru -->
                <div class="col-lg-3 swt-sidebar">
                    <div class="row">
                        <div class="col-lg-12"
                             style="padding-bottom: 16px; padding-top:20px; text-align: center; border-bottom: solid 2px #18BC9C; height: 83px; background-color: #fff;">
                            <h5>Detalji razgovora</h5>
                        </div>
                    </div>

                    <div class="row"
                         style="text-align: center; background-color: #fff;
                         color: #18BC9C;">
                        <div class="list-group-item">
                            <p>Naziv razgovora</p>
                        </div>
                    </div>
                    <hr class="nopadding">
                    <div class="list-group-item list-group-item-action flex-column align-items-start noborder"
                         style="margin-top:3px; height: 75px;">
                        <div class="d-flex w-100 justify-content-between">
                            <div class="row">
                                <div class="col-lg-10" style="color: #18BC9C; vertical-align: middle;">
                                    <h5><%selectedConversation.title%></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="nopadding">
                    <div class="row"
                         style="text-align: center; background-color: #fff;
                         color: #18BC9C;">
                        <div class="list-group-item">
                            <p>Sudionici</p>
                        </div>
                    </div>
                    <hr class="nopadding">

                    <div class="list-group-item list-group-item-action flex-column align-items-start noborder"
                         style="background-color: transparent; border: none;">
                        <div class="d-flex w-100 justify-content-between">
                            <div class="row">
                                <div ng-repeat="par in selectedConversation.participants">
                                    <ul href="#" class="list-group-item swt-nav-item col-lg-12 noborder"
                                        style="margin-bottom:3px; border-left: 3px solid #18BC9C;">
                                        <li style="list-style-type: none;">
                                            <div class="col-lg-10">
                                                <h5 style=" color: #18BC9C;"
                                                    ng-model="select_user1(par.id)"
                                                    ng-if="par.id != {{Auth::user()->id}}">
                                                    <% par.name %></h5>
                                            </div>
                                            <div class="col-lg-1">
                                                <a href="{{route('users')}}/<%par.id%>"
                                                   class="btn btn-sm btn-block"
                                                   type="button" style="background-color: transparent;">
                                                    <i class="fa fa-user" style="font-size: 18px;"></i> </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newConversation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document" style="width:550px;">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #E3E7E8">
                    <div class="row">
                        <div class="col-lg-11" style="text-align: center;">
                            <h4 class="modal-title" id="exampleModalLabel">Novi razgovor
                            </h4>
                        </div>
                        <div class="col-lg-1 pull-right">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="attireCodeToggleBlock" action="">
                        <div class="demo-section k-content">
                            <div style="margin-bottom: 5px;">
                                <input type="text"
                                       class="form-control noborder"
                                       placeholder="Naziv razgovora"
                                       ng-model="naziv_razgovora"
                                       required
                                >
                                <small style="color: #d9534f;">* Obavezan naziv grupnog razgovora</small>
                            </div>
                            <multiple-autocomplete ng-model="selectedList"
                                                   object-property="name"
                                                   before-select-item="beforeSelectItem"
                                                   suggestions-arr="optionsList"
                            >
                            </multiple-autocomplete>

                        </div>
                    </form>
                    <p style="visibility: hidden; position: fixed" value="<%selected_user2%>"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn swt-button-default btn-sm " data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success btn-sm noborder"
                            ng-click="addNewConversation()" data-dismiss="modal">Spremi
                    </button>
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
        (function () {
            angular.module("swtSearchApp", ['multipleSelect'])
                .config(['$interpolateProvider', function ($interpolateProvider) {
                    $interpolateProvider.startSymbol('<%');
                    $interpolateProvider.endSymbol('%>');
                }])
                .controller("swtSearchMainController", function ($scope, $http) {
                    var API_MESSAGES
                    var element = document.getElementById("message-content");
                    $scope.selectConversation = function (con) {
                        $scope.selectedConversation = con;
                        $scope.searchText1 = "";
                        API_MESSAGES = '{{ route('messages1','')}}' + '/' + $scope.selectedConversation.id
                        $scope.getMessages();
                    }

                    $scope.checkIfEnterKeyWasPressed = function($event){
                        var keyCode = $event.which || $event.keyCode;
                        if (keyCode === 13) {
                            $scope.sendNewMessage();
                        }
                    };
                    $scope.covnertDate = function (dat) {
                        $scope.date = Date.parse(dat)
                    }

                    $scope.covnertDate1 = function (dat) {
                        $scope.date1 = Date.parse(dat)
                    }

                    $scope.covnertDate2 = function (dat) {
                        $scope.date2 = Date.parse(dat)
                    }

                    $scope.init = function () {
                        // Ulazna točka aplikacije
                        $scope.getMessages();
                        $scope.getConversations();
                        $scope.getUsers();
                        setInterval(function () {
                            $scope.getConversations();
                            $scope.getMessages();
                        }, 3000);
//                        $scope.reload();
//                        $timeout($scope.getMessages(), 3000)
                        console.log('pozvanInit')
                    };
                    $scope.select_user = function (usr) {
                        $scope.selected_user = usr;
                    }
                    $scope.select_user1 = function (usr) {
                        $scope.selected_user1 = usr;
                    }
                    $scope.select_user2 = function (usr) {
                        $scope.selected_user2 = usr;
                    }
                    //dodavanje novog razgovora
                    $scope.addNewConversation = function () {
                        var date = new Date().toLocaleString('en-US', {hour12: false}).split(" ");
                        //razdvajanje na datum i vrijeme
                        var time = date[1];
                        var mdy = date[0];
                        // korigiranje dijelova za spremanje u bazu
                        mdy = mdy.split('/');
                        var month = parseInt(mdy[0]);
                        var day = parseInt(mdy[1]);
                        var year = parseInt(mdy[2]);
                        var formattedDate = year + '/' + month + '/' + day + ' ' + time;


                        var result = $scope.selectedList.map(function (item) {
                            return item.id;
                        });

                        var nazivR = $scope.naziv_razgovora;


                        $new_conversation = {'title': nazivR, 'created_at': formattedDate, 'list_user': result};
                        $http({
                            method: 'POST',
                            url: API_NEW_CONVERSATON,
                            data: JSON.stringify($new_conversation)
                        }).then(function successCallback(response) {
                            $scope.conversations = response.data;
                            $scope.selected_user2 = result[0]
                            console.log(result.length);
                            if ($scope.conversations != result[0] && result.length == 1) {
//                                alert("Razgovor već postoji")
                                $scope.selectedConversation = response.data[0];
                                API_MESSAGES = '{{ route('messages1','')}}' + '/' + response.data[0].id;
                                $scope.getMessages();
                                $scope.getConversations();
                            }
                        }, function errorCallback(response) {
                            console.log("greška prilokom kreiranja razgvora!")
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                        $scope.searchText2 = ""
                        $scope.naziv_razgovora = ""
                        $scope.selectedList = []
                    };
                    $scope.sendNewMessage = function () {
                        var date = new Date().toLocaleString('en-US', {hour12: false}).split(" ");
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
                        $newMessage = {
                            'content_msg': $scope.newMessage, 'conversation_id': $scope.selectedConversation.id,
                            'created_at': formattedDate
                        };
                        $http({
                            method: 'POST',
                            url: API_NEW_MESSAGE,
                            data: JSON.stringify($newMessage)
                        }).then(function successCallback(response) {
                            $scope.messages = response.data;
                            $scope.getConversations();
                            setTimeout(function () {
                                element.scrollTop = element.scrollHeight;
                            }, 100)
                        }, function errorCallback(response) {
                            console.log("greška prilokom slanja poruke!")
                            if ($scope.newMessage == "") {
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
                            $scope.optionsList = response.data.filter(function (x) {
                                if (x.id == {{Auth::user()->id}})
                                    return false;

                                return true;
                            })


                        }, function errorCallback(response) {
                            // called asynchronously if an error occurs
                            // or server returns response with an error status.
                        });
                    }
                })
        })();
    </script>
@endpush