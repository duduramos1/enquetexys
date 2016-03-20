angular.module('enqueteApp', ['ngRoute', 'enqueteService'])
    //.config(function ($routeProvider) {
    //    'use strict';
    //
    //$routeProvider.when('/', {
    //    controller: 'AdminIndexController',
    //    templateUrl: ''
    //}).when('/admin/create', {
    //    controller: 'AdminCreateController',
    //    templateUrl: '../views/dmin/create.html.twig'
    //}).otherwise({
    //    redirectTo: '/'
    //});
    //
    //})
    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[').endSymbol(']]');
    })
;