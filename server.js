var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

var port = 3000;

io.on('connection', function (socket) {
    socket.on('send_message', function (msg) {
        io.emit('receive_message', msg);
    });
});

http.listen(port, function () {
    console.log('Server listening on http://localhost:' + port + '/');
});