angular.module('enqueteApp')
    .controller('AdminCreateController', function ($scope, $window, $location, cadastroDeEnquete, api) {
        'use strict';

        $scope.inputCounter = 0;
        $scope.enquete = {};
        $scope.itens = [];
        $scope.enquete.id = $location.search().id;

        if ($scope.enquete.id) {
            api.getId('/admin/getenqueteid', $scope.enquete.id)
                .success(function (data) {
                    $scope.itens = data.opcaoResposta;
                    $scope.enquete = data;
                })
                .error(function (error) {
                    console.log(error);
                });
        }

        /**
         * Adiciono opções de resposta
         */
        $scope.addResposta = function () {
            $scope.inputTemplate = {
                id: $scope.inputCounter
            };

            $scope.inputCounter += 1;
            $scope.itens.push($scope.inputTemplate);
        };

        /**
         * submeto o formulario para gravar a enquete
         */
        $scope.submeter = function () {
            if ($scope.formulario.$valid) {
                cadastroDeEnquete.cadastrar($scope.enquete, $scope.itens)
                    .then(function (dados) {
                        var url = "http://" + $window.location.host + '/app_dev.php/admin/';
                        $window.location.href = url;
                    })
                    .catch(function (erro) {
                        $scope.mensagem = erro.mensagem;
                    });
            }
        };
    });