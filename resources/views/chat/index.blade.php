@extends('layouts.app')

@section('content')
    <div class="lista-razgovora col-lg-3">

        <h2 class="message-list-title">Lista razgovora</h2>
        <div class="message-list-search">
            <input class="search-input" type="text" placeholder="Search">
            <span class="search-icon"></span>
        </div>


        <ul class="message-items">



            @foreach($conversations as $conversation)
                <li class="list-group-item active btn-default">
                    <a href = "{{route("messages",["conversation_id" => $conversation->id])}}">
                        <div class="message-user-icon"></div>
                        <div class="message-user-name">{{ $conversation->user->name }}</div>
                        <br><br>
                        <div class="message-user-status help-block">{{ $conversation->title }}</div>
                    </a>
                </li>
        @endforeach

        <!--
            <li class="list-group-item active btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Slaven Butigan</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>
            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Ivan Kordić</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>
            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Marin Bošnjak</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>

            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Marin Bošnjak</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>

            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Marin Bošnjak</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>
            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Marin Bošnjak</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>
            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Marin Bošnjak</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>
            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Marin Bošnjak</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>
            <li class="list-group-item btn-default">
                <div class="message-user-icon"></div>
                <div class="message-user-name">Marin Bošnjak</div>
                <br><br>
                <div class="message-user-status help-block">Active 2 m ago</div>
            </li>
        -->

        </ul>

    </div>
    <!--
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Conversation</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">

                                <form>

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="message" placeholder="Message">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control">Send</button>
                                    </div>

                                </form>

                            </div>

                            <div class="col-md-6">
                                <ul id="messages">

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="col-lg-7">
        <div class="list-messagers">

            <div class="user-header">
                <div class="user-name"></div>
                <br><br>
                <div class="user-status help-block">Active 2 m ago</div>
            </div>
            <!-- prvi pošiljatelj -->
            <div class="users-messages">
                <ul id="poruke">
                    @foreach($messages as $message)
                        <li class="@if ($message->user->id == Auth::user()->id) {{"me"}} @else {{"you"}}@endif">
                            <div class='list-group-item'>
                                {{ $message->user->name}}
                                <div class="message-time help-block">
                                    {{ $message->created_at }}
                                </div>
                                <div  class="messager-right div @if ($message->user->id == Auth::user()->id) {{"left"}} @else {{"right"}}@endif">
                                    {{ $message->content }}
                                </div>
                                <div class="clear"></div>
                            </div>

                        </li>
                    @endforeach
                </ul>

            </div>

            <p id="typing" style="display:none;">Typing...</p>


            <form>
                {{csrf_field()}}
                <div class="input-messager">
                    <input id="sender_id" type="hidden" value="{{Auth::user()->id}}">
                    <input id="conversation_id" type="hidden" value="{{$conversation_id}}">
                    <input id="m" type="text" name="chat" class="form-control" placeholder="Unesite poruku...."></input>
                    <br><br>
                    <button id="submit" type="submit" class="btn btn-default">SEND</button>
                </div>
            </form>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{asset('https://code.jquery.com/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>


    <script>
        $(function () {
            var socket = io('localhost:3000');

            $('form').submit(function () {
                socket.emit('send_message', $('#m').val());
                var date = {
                    'content': $('#m').val(),
                    'conversation_id': $('#conversation_id').val(),
                    'sender_id': $('#sender_id').val()
                };
                $.ajax({
                    type: "POST",
                    url: "{{route("message.create")}}",
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: date
                });
                $('#m').val('');
                //socket.emit('typing', 0);
                return false;
            });
            $('#m').on('keyup', function () {

                if (($('#m').val() === '')) {
                    socket.emit('typing', 0);
                } else {
                    socket.emit('typing', 1);
                }
            });

            socket.on('typing', function (msg) {
                if (msg === 1) {
                    $('#typing').show();
                }
                else {
                    $('#typing').hide();
                }
            });

            socket.on('receive_message', function (msg) {
                var date = new Date();
                var nova_poruka = "<li class=" + 'me' + " id=" + 'id' + " >" +
                    //"<div class=\'message-user1-icon\'></div>"+
                    "<div class='list-group-item' >" + '{{ Auth::user()->name }}' +
                    "<div class=\"message-time help-block\">"+date.getYear()+"-"+date.getMonth()+"-"+date.getDay()+" "+ date.getHours() + ':' + date.getMinutes() +
                    "</div>" +
                    "<div  class='messager-right div left'>" + msg +
                    "</div>" +
                    "<div class='clear'></div>" +
                    "</div>" +
                    //'<p>' + msg + '</p>' +
                    "</li>";
                // nova_poruka.find('p').text(msg);



                $('#poruke').append(nova_poruka);
                //$('#poruke').append($('<li>').html('{{ Auth::user()->name }} at ' + date.getHours() + ':' + date.getMinutes() + ' sent : <strong>' + msg + '</strong>'));
            });
        });
    </script>
@endpush