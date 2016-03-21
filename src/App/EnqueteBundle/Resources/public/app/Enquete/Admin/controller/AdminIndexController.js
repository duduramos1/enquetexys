angular.module('enqueteApp').controller('AdminIndexController', function ($scope, api) {
    'use strict';

    api.get('/admin/getenquete')
        .success(function (data) {
            $scope.dados = data;
        })
        .error(function (error) {
            console.log(error);
        });

    /**
     * função para deletar enquete
     *
     * @param item
     */
    $scope.deletar = function (item) {

        if (item) {
            api.delete('/admin/delete', item.id)
                .success(function (data) {
                    var indiceItem = $scope.dados.indexOf(item);
                    $scope.dados.splice(indiceItem, 1);
                })
                .error(function (error) {
                    console.log(error);
                });
        }
    }

});