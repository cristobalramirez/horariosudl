(function(){
    var app = angular.module('disponibilidadDocente',[
        'ngRoute',
        'btford.socket-io',
        'ngSanitize',
        'disponibilidadDocente.controllers',
        'crud.services',
        'routes',
        'ui.bootstrap'
    ]);
})();