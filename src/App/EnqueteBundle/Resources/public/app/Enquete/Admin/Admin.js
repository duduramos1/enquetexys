angular.module('enqueteApp', ['ngRoute', 'ngResource', 'enqueteService'])
    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[').endSymbol(']]');
    })
;