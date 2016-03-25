var express = require("express")
    , app = express()
    , http = require("http").Server(app)
    , io = require("socket.io")(http);

io.on('connection', function (socket) {
    socket.on("enqueteResposta", function () {
        socket.broadcast.emit("relatorioEnquete");
    });

    socket.on("getEnquete", function () {
        socket.emit("relatorioEnquete");
    });

    socket.on("deletarEnquete", function () {
        socket.broadcast.emit("deletarEnqueteIndex");
    });

    socket.on("getEnqueteIndex", function () {
        socket.emit("deletarEnqueteIndex");
    });
});

http.listen("3000", function () {
    console.log("servidor node na porta 3000");
});