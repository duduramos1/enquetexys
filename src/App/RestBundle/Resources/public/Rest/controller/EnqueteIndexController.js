angular.module('enqueteApp').controller('EnqueteIndexController', function ($scope, api) {
    'use strict';

    $scope.enquete = [];
    $scope.itemResposta = {};
    $scope.mensagem = {};

    socket.emit("getEnqueteIndex");
    socket.on("deletarEnqueteIndex", function () {
        api.get('/enquete/getenquete')
            .success(function (dados) {
                $scope.enquete = angular.fromJson(dados);
            })
            .error(function (error) {

            });
    });

    $scope.responder = function () {
        api.post('/enquete/saveresposta', $scope.itemResposta)
            .success(function (dados) {
                $scope.mensagem = {
                    'texto': 'Operação realizada com sucesso!',
                    'conf': 'alert alert-success'
                };
                socket.emit("enqueteResposta");
            })
            .error(function (error) {
                $scope.mensagem = {
                    'text': 'Operação realizada com sucesso!',
                    'conf': 'alert alert-danger'
                };
                console.log(error);
            });
        $scope.itemResposta = {};
    }

});