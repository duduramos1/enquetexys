angular.module('enqueteService', [])
    .factory('api', ['$http', function ($http) {
        var sdo = {
            get: function (url) {
                var request = $http({method: 'GET', url: url})
                    .success(function (data, status, headers, config) {
                        return data;
                    })
                    .error(function (data) {
                        if (data && data.detail) {
                            console.log(data.detail);
                        }
                    })
                    ;
                return request;
            },
            getId: function (url, dataRequest) {
                var request = $http({method: 'POST', url: url, data: dataRequest})
                    .success(function (data, status, headers, config) {
                        return data;
                    })
                    .error(function (data) {
                        if (data && data.detail) {
                            console.log(data.detail);
                        }
                    })
                    ;
                return request;
            },
            post: function (url, dataRequest) {
                var request = $http({method: 'POST', url: url, data: dataRequest})
                    .success(function (data, status, headers, config) {
                        return data;
                    })
                    .error(function (data) {
                        return data;
                    })
                    ;
                return request;
            },
            put: function (url, dataRequest) {
                var request = $http({method: 'PUT', url: url, data: dataRequest})
                    .success(function (data, status, headers, config) {
                        return data;
                    })
                    .error(function (data) {
                        return data;
                    })
                    ;
                return request;
            },
            delete: function (url, dataRequest) {
                var request = $http({method: 'DELETE', url: url, data: dataRequest})
                    .success(function (data, status, headers, config) {
                        return data;
                    })
                    .error(function (data) {
                        console.log(data.detail);
                    })
                    ;
                return request;
            }
        };
        return sdo;
    }])
    .factory("cadastroDeEnquete", function (api, $q) {
        var service = {};
        service.cadastrar = function (enquete, itens) {
            return $q(function (resolve, reject) {

                if (enquete.id) {
                    api.put('/admin/save', enquete)
                        .success(function () {
                            resolve({
                                mensagem: 'Enquete ' + enquete.titulo + ' atualizada com sucesso',
                                inclusao: true
                            });
                        })
                        .error(function () {
                            reject({
                                mensagem: 'Não foi possível atualizar a enquete ' + enquete.titulo
                            });
                        });

                } else {
                    enquete.opcaoResposta = itens;

                    api.post('/admin/save', enquete)
                        .success(function () {
                            resolve({
                                mensagem: 'Enquete ' + enquete.titulo + ' foi incluida com sucesso',
                                inclusao: true
                            });
                        })
                        .error(function () {
                            reject({
                                mensagem: 'Não foi possível atualizar a enquete ' + enquete.titulo
                            });
                        });
                }
            });
        };
        return service;
    });