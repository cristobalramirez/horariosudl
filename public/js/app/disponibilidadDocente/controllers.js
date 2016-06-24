(function(){
    angular.module('disponibilidadDocente.controllers',[])
        .controller('DisponibilidadDocenteController',['$scope', '$routeParams','$location','crudService','socketService' ,'$log',
            function($scope, $routeParams,$location,crudService,socket,$log){
                $scope.disponibilidadDocentes = [];
                $scope.disponibilidadDocente={};
                $scope.horas = [];
                $scope.horasAsignadas = [];
                $scope.errors = null;
                $scope.success;
                $scope.query = '';
                $scope.semestre_id;
                $scope.nombreSemestre;
                $scope.bandera=false;
                $scope.banderaAgregar=false;
                $scope.hora_inicio;
                $scope.toggle = function () {
                    $scope.show = !$scope.show;
                };

                $scope.pageChanged = function() {
                    if ($scope.query.length > 0) {
                        crudService.search('disponibilidadDocente',$scope.query,$scope.currentPage).then(function (data){
                        $scope.disponibilidadDocentes = data.data;
                    });
                    }else{
                        crudService.paginate('disponibilidadDocente',$scope.currentPage).then(function (data) {
                            $scope.disponibilidadDocentes = data.data;
                        });
                    }
                };
                $scope.docenteSelected=undefined;
                 $scope.getDocente = function(val) {
                  return crudService.search('decenteCarga',val,1).then(function(response){
                    return response.data.map(function(item){

                      return item;
                    });
                  });

                };
                
                $scope.verFila = function(row,dia,estado,idasignada){

                    if ($scope.docenteSelected!=undefined) {
                        if ($scope.docenteSelected.id!=undefined) {
                                $scope.disponibilidadDocente.id=idasignada;
                                $scope.disponibilidadDocente.dia=dia;
                                $scope.disponibilidadDocente.horaInicio_id=row.id;
                                $scope.disponibilidadDocente.horaFin_id=row.id;
                                $scope.disponibilidadDocente.docente_id=$scope.docenteSelected.id;
                                $scope.disponibilidadDocente.semestre_id=$scope.semestre_id;
                            if (!estado) {
                                
                                $scope.createAdignacionDocente();
                            }else{
                                $scope.destroyAsignacionDocente();
                            }
                            $scope.generarHorario();

                        }else{
                        
                        alert("Selecione Docente");
                        $scope.docenteSelected=undefined
                        
                        }
                    }else{
                        alert("Selecione Docente Correctamente");
                        $scope.docenteSelected=undefined
                    }
                }
                $scope.generarHorario = function(){
                    if ($scope.docenteSelected!=undefined) {
                    crudService.searchCurso('hora',$scope.docenteSelected.id,$scope.semestre_id,1).then(function (data){
                        $scope.horasAsignadas = data.data;

                    crudService.all('hora').then(function (data){
                        $scope.horas = data.data;
                        for (var i = 0; i < $scope.horas.length; i++) {
                            $scope.horas[i].banderaLunes=false;
                            $scope.horas[i].banderaMartes=false;
                            $scope.horas[i].banderaMiercoles=false;
                            $scope.horas[i].banderaJueves=false;
                            $scope.horas[i].banderaViernes=false;
                            $scope.horas[i].banderaSabado=false;
                            $scope.horas[i].banderaDomingo=false;

                            $scope.horas[i].idLunes=0;
                            $scope.horas[i].idMartes=0;
                            $scope.horas[i].idMiercoles=0;
                            $scope.horas[i].idJueves=0;
                            $scope.horas[i].idViernes=0;
                            $scope.horas[i].idSabado=0;
                            $scope.horas[i].idDomingo=0;
                        }
                        for (var j = 0; j < $scope.horasAsignadas.length; j++) {
                                for (var i = 0; i < $scope.horas.length; i++) {

                                    if ($scope.horas[i].id==$scope.horasAsignadas[j].horaInicio_id) {
                                         //$scope.horas[i].iddisponibilidad=$scope.horasAsignadas[j].id;
                                    if ($scope.horasAsignadas[j].dia.toUpperCase()=='LUNES') {
                                        $scope.horas[i].banderaLunes=true;
                                        $scope.horas[i].idLunes=$scope.horasAsignadas[j].id;
                                    }else if ($scope.horasAsignadas[j].dia.toUpperCase()=='MARTES') {
                                        $scope.horas[i].banderaMartes=true;
                                        $scope.horas[i].idMartes=$scope.horasAsignadas[j].id;
                                    }else if ($scope.horasAsignadas[j].dia.toUpperCase()=='MIERCOLES') {
                                        $scope.horas[i].banderaMiercoles=true;
                                        $scope.horas[i].idMiercoles=$scope.horasAsignadas[j].id;
                                    }else if ($scope.horasAsignadas[j].dia.toUpperCase()=='JUEVES') {
                                        $scope.horas[i].banderaJueves=true;
                                        $scope.horas[i].idJueves=$scope.horasAsignadas[j].id;
                                    }else if ($scope.horasAsignadas[j].dia.toUpperCase()=='VIERNES') {
                                        $scope.horas[i].banderaViernes=true;
                                        $scope.horas[i].idViernes=$scope.horasAsignadas[j].id;
                                    }else if ($scope.horasAsignadas[j].dia.toUpperCase()=='SABADO') {
                                        $scope.horas[i].banderaSabado=true;
                                        $scope.horas[i].idSabado=$scope.horasAsignadas[j].id;
                                    }else if ($scope.horasAsignadas[j].dia.toUpperCase()=='DOMINGO') {
                                        $scope.horas[i].banderaDomingo=true;
                                        $scope.horas[i].idDomingo=$scope.horasAsignadas[j].id;
                                    }
                                }
                            } 
                        }
                    });
                    });
                    }else{
                        alert("Selecione Docente Correctamente");
                    }
                }
                
                $scope.click = function(val) {
                    if ($scope.docenteSelected!=undefined) {
                        if ($scope.docenteSelected.id!=undefined) {
                        $scope.generarHorario();
                        $scope.bandera=true;
                    }else{
                        
                        $scope.bandera=false;
                        $scope.banderaAgregar=false;
                        crudService.all('hora').then(function (data){
                        $scope.horas = data.data;
                        for (var i = 0; i < $scope.horas.length; i++) {
                            $scope.horas[i].banderaLunes=false;
                            $scope.horas[i].banderaMartes=false;
                            $scope.horas[i].banderaMiercoles=false;
                            $scope.horas[i].banderaJueves=false;
                            $scope.horas[i].banderaViernes=false;
                            $scope.horas[i].banderaSabado=false;
                            $scope.horas[i].banderaDomingo=false;
                        }
                        alert("Selecione Docente Correctamente");
                        $scope.docenteSelected=undefined
                        });
                    }
                    }else{
                        alert("Selecione Docente Correctamente");
                        $scope.bandera=false;
                        $scope.banderaAgregar=false;
                    }
                }

                var id = $routeParams.id;

                if(id)
                {
                    crudService.byId(id,'disponibilidadDocente').then(function (data) {
                        $scope.disponibilidadDocente = data;
                    });
                }else{
                    
                    crudService.all('hora').then(function (data){
                        $scope.horas = data.data;
                        for (var i = 0; i < $scope.horas.length; i++) {
                            $scope.horas[i].banderaLunes=false;
                            $scope.horas[i].banderaMartes=false;
                            $scope.horas[i].banderaMiercoles=false;
                            $scope.horas[i].banderaJueves=false;
                            $scope.horas[i].banderaViernes=false;
                            $scope.horas[i].banderaSabado=false;
                            $scope.horas[i].banderaDomingo=false;
                        }
                        
                    });

                    crudService.select('semestre','select').then(function (data) {                        
                        $scope.semestres = data;
                        for (i = 0; i < $scope.semestres.length; i++) { 
                            if ($scope.semestres[i].estado==1) {
                                $scope.semestre_id=$scope.semestres[i].id;
                                $scope.nombreSemestre=$scope.semestres[i].codigo;
                            }
                        }
                    });
                }
               

                socket.on('disponibilidadDocente.update', function (data) {
                    $scope.disponibilidadDocentes=JSON.parse(data);
                });

                $scope.searchPerson = function(){
                if ($scope.query.length > 0) {
                    crudService.search('disponibilidadDocente',$scope.query,1).then(function (data){
                        $scope.disponibilidadDocentes = data.data;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                    });
                }else{
                    crudService.paginate('disponibilidadDocente',1).then(function (data) {
                        $scope.disponibilidadDocentes = data.data;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                    });
                }
                    
                };

                $scope.createAdignacionDocente= function(){
                    crudService.create($scope.disponibilidadDocente,'disponibilidadDocente').then(function(data){
                        if(data['estado'] == true){
                            $scope.generarHorario();
                            $scope.disponibilidadDocente={};
                            $scope.banderaAgregar=false;
                        }else{
                            $scope.errors =data['error'];
                        }
                    });
                }

                $scope.editPerson = function(row){
                    $location.path('/disponibilidadDocente/edit/'+row.id);
                };

                $scope.updatePerson = function(){
                    if ($scope.personCreateForm.$valid) {
                        crudService.update($scope.disponibilidadDocente,'disponibilidadDocente').then(function(data)
                        {
                            if(data['estado'] == true){
                                $scope.success = data['nombre'];
                                $location.path('/disponibilidadDocente');
                            }else{
                                $scope.errors =data;
                            }
                        });
                    }
                };

                $scope.deletePerson = function(row){
                    $scope.disponibilidadDocente = row;
                }

                $scope.cancelPerson = function(){
                    $scope.disponibilidadDocente = {};
                }

                $scope.destroyAsignacionDocente = function(){
                    crudService.destroy($scope.disponibilidadDocente,'disponibilidadDocente').then(function(data)
                    {
                        if(data['estado'] == true){
                            $scope.disponibilidadDocente = {};
                        }else{
                            $scope.errors =data['error'];
                        }
                    });
                }
            }]);
})();
