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
            post: function (url, dataRequest) {
                var request = $http({method: 'POST', url: url, data: dataRequest})
                    .success(function (data, status, headers, config) {
                        return data;
                    })
                    .error(function (data) {
                        console.log(data.detail);
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
                        console.log(data.detail);
                    })
                    ;
                return request;
            },
            delete: function (url) {
                var request = $http({method: 'DELETE', url: url})
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
        service.cadastrar = function (enquete) {
            //return $q(function (resolve, reject) {

                //if(foto._id) {
                //    recursoFoto.update({fotoId: foto._id}, foto, function() {
                //        resolve({
                //            mensagem: 'Foto ' + foto.titulo + ' atualizada com sucesso',
                //            inclusao: false
                //        });
                //    }, function(erro) {
                //        console.log(erro);
                //        reject({
                //            mensagem: 'Não foi possível atualizar a foto ' + foto.titulo
                //        });
                //    });
                //
                //} else {

                api.post('/admin/save', enquete)
                    .success(function (data) {
                        console.log('success');
                    })
                    .error(function () {
                        console.log('error');
                    });
                //    }
            //});
        };
        return service;
    });