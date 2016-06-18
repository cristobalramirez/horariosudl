(function(){
    var app = angular.module('cargaLectiva',[
        'ngRoute',
        'btford.socket-io',
        'ngSanitize',
        'cargaLectiva.controllers',
        'crud.services',
        'routes',
        'ui.bootstrap'
    ]);
})();