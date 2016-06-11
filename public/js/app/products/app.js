(function(){
    var app = angular.module('products',[
        'ngRoute',
        'btford.socket-io',
        'ngSanitize',
        'products.controllers',
        'crud.services',
        'routes',
        'ui.bootstrap'
    ]);
})();