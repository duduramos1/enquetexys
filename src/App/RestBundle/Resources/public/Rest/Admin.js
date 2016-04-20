angular.module('enqueteApp', ['ngRoute', 'ngResource', 'enqueteService'])
    .config(function ($routeProvider, $interpolateProvider) {

        $routeProvider.when('/rest',{
            assets: ["AppRest"],
            templateUrl: 'view/index.html',
            controller: 'IndexController'
        });


        $interpolateProvider.startSymbol('[[').endSymbol(']]');
    })
;