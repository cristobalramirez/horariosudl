(function(){
    angular.module('routes',[])
        .config(['$routeProvider','$locationProvider', function ($routeProvider,$locationProvider) {
            $routeProvider
            // ------------------------------------------------------
            
                //---------------------------------------------------

           // ------------------------------------------------------
                           
                .when('/persons', {
                    templateUrl: '/js/app/persons/views/index.html',
                    controller: 'PersonController'
                })
                .when('/persons/create',{
                    templateUrl:'/persons/form-create',
                    controller: 'PersonController'
                })
                .when('/persons/edit/:id',{
                    templateUrl:'/persons/form-edit',
                    controller: 'PersonController'
                })
                .when('/users', {
                    templateUrl: '/js/app/users/views/index.html',
                    controller: 'UserController'
                })
                .when('/users/create',{
                    templateUrl:'/users/form-create',
                    controller: 'UserController'
                })
                .when('/users/edit/:id',{
                    templateUrl:'/users/form-edit',
                    controller: 'UserController'
                })
  

                //------------------
                 //RUTES CARGA LECTIVA
                .when('/carga', {
                    templateUrl: '/js/app/cargaLectiva/views/index.html',
                    controller: 'CargaLectivaController'
                })
                .when('/asignarcarga', {
                    templateUrl: '/js/app/cargaLectiva/views/asignarcarga.html',
                    controller: 'CargaLectivaController'
                })
                .when('/carga/create',{
                    templateUrl:'/cargaLectiva/form-create',
                    controller: 'CargaLectivaController'
                })
                .when('/carga/edit/:id',{
                    templateUrl:'/cargaLectiva/form-edit',
                    controller: 'CargaLectivaController'
                }) 
                //------------------
                //RUTES CARGA LECTIVA
                .when('/disponibilidadDocente', {
                    templateUrl: '/js/app/disponibilidadDocente/views/index.html',
                    controller: 'DisponibilidadDocenteController'
                })
                .when('/disponibilidadDocente/create',{
                    templateUrl:'/disponibilidadDocente/form-create',
                    controller: 'DisponibilidadDocenteController'
                })
                .when('/disponibilidadDocente/edit/:id',{
                    templateUrl:'/disponibilidadDocente/form-edit',
                    controller: 'DisponibilidadDocenteController'
                }) 
                //------------------
                .otherwise({
                    redirectTo: '/'
                });
                
            $locationProvider.html5Mode(true);
        }]);

})();
