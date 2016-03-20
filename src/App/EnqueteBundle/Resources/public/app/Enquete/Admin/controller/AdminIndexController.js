angular.module('enqueteApp').controller('AdminIndexController', function ($scope, api) {
    'use strict';

    api.get('/admin/getenquete')
        .success(function (data) {
            $scope.dados = data;
        })
        .error(function (error) {
            console.log(error);
        });

    $scope.dados = [
        {
            'nome': 'rear',
            'tel': '24234'
        },
        {
            'nome': 'sadf',
            'tel': '24sdafasdf234'
        }
    ];

});