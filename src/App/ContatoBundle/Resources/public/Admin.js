angular.module('enqueteApp', ['ngRoute', 'ngResource', 'enqueteService'])
    .config(function ($routeProvider, $interpolateProvider) {
        "use strict";

        $routeProvider.when('/contato',{
            templateUrl: root_path+'/bundles/contato/view/index.html',
            controller: 'IndexController'
        });

        $interpolateProvider.startSymbol('[[').endSymbol(']]');
    })
;