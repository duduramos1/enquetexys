angular.module('enqueteApp').controller('AdminIndexController', function ($scope, api) {
    'use strict';

    $scope.porcentagem = {};

    /**
     * resgata os dados do banco e lista na grid
     */
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
                    socket.emit("deletarEnquete");
                })
                .error(function (error) {
                    console.log(error);
                });
        }
    };

    $scope.relatorio = function (item) {
        if (item) {
            $scope.itemEnquete = item;
            socket.emit("getEnquete")
        }
    };

    socket.on("relatorioEnquete", function () {
        api.getId('/admin/getenqueteid', $scope.itemEnquete.id)
            .success(function (data) {
                $scope.porcentagem = data.porcentagem;
                $scope.tituloEnquete = $scope.itemEnquete.nomeEnquete;
            })
            .error(function (error) {
                console.log(error);
            });
    });
});