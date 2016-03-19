angular.module('enqueteApp').controller('AdminCreateController', function ($scope, cadastroDeEnquete, $routeParams, $filter, $q) {
    'use strict';

    $scope.inputCounter = 0;
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

            console.log('dffd');
        }

    };
});