@extends('layouts.app')

@section('content')

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

@endsection

@push('scripts')
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://172.25.20.172:3000/socket.io/socket.io.js"></script>


    <script>
        $(function () {
            var socket = io('172.25.20.172:3000');

            $('form').submit(function () {
                var msg = $('#message').val();
                var date = new Date();

                socket.emit('send_message', '{{ Auth::user()->name }} at ' + date.getHours() + ':' + date.getMinutes() + ' sent : <strong>' + msg + '</strong>');

                $('#message').val('');

                return false;
            });

            socket.on('receive_message', function (msg) {
                $('#messages').append($('<li>').html(msg));
            });
        });
    </script>
@endpush