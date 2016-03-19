angular.module('enqueteApp', ['ngRoute'])
    .config(function ($routeProvider) {
        'use strict';

        $routeProvider.when('/', {
            controller: 'AdminIndexController',
            templateUrl: ''
        }).when('/create', {
            controller: 'AdminCreateController',
            templateUrl: 'create'
        }).otherwise({
            redirectTo: '/'
        });

    })
    .config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
    })
;