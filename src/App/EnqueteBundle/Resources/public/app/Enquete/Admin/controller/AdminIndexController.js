angular.module('enqueteApp').controller('AdminIndexController', function ($scope, api) {
    'use strict';

    api.get('/admin/getenquete')
        .success(function (data) {
            $scope.dados = data;
        })
        .error(function (error) {
            console.log(error);
        });
});