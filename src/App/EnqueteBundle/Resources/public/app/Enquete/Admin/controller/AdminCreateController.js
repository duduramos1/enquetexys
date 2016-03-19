angular.module('enqueteApp').controller('AdminCreateController', function ($scope, cadastroDeEnquete, $routeParams, $filter, $q) {
    'use strict';

    $scope.inputCounter = 0;
    $scope.enquete = {};
    $scope.itens = [];

    /**
     * Adiciono opções de resposta
     */
    $scope.addResposta = function () {
        $scope.inputTemplate = {
            id: 'input-' + $scope.inputCounter
        };

        $scope.inputCounter += 1;
        $scope.itens.push($scope.inputTemplate);
    };

    /**
     * submeto o formulario para gravar a enquete
     */
    $scope.submeter = function () {
        if ($scope.formulario.$valid) {

            cadastroDeEnquete.cadastrar($scope.enquete)
                .then(function (dados) {
                    $scope.mensagem = dados.mensagem;
                    if (dados.inclusao) $scope.foto = {};
                })
                .catch(function (erro) {
                    $scope.mensagem = erro.mensagem;
                });
        }

    };
});