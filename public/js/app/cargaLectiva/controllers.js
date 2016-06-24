(function(){
    angular.module('cargaLectiva.controllers',[])
        .controller('CargaLectivaController',['$scope', '$routeParams','$location','crudService','socketService' ,'$filter','$route','$log',
            function($scope, $routeParams,$location,crudService,socket,$filter,$route,$log){
                $scope.cargasLectivas = {};
                $scope.cargaLectiva = {};
                $scope.cursos = [];
                $scope.otrosCursos = [];
                $scope.todoscursos = [];
                $scope.cargaAsignada = [];
                $scope.curso = {};
                $scope.cursosAsignados = [];
                $scope.cursoAsignado = {};
                $scope.errors = null;
                $scope.success;
                $scope.query = '';
                $scope.banderaAgregarCarga=false;
                $scope.curso = {};
                $scope.banderaCurso;
                $scope.grupo='A'
                $scope.semestre_id;
                $scope.plan_id;
                $scope.ciclo='I';
                $scope.planEstudiantil={};
                $scope.semestres={};
                $scope.nombreSemestre;
                $scope.plan_id=0;
                $scope.cursosSeparados={};
                $scope.idcurso;
                $scope.bandera=true;
                $scope.id=[];
                /*$scope.cambiarCarga = function (Row) {
                    $scope.idcurso=Row.curso_id;
                    crudService.search('carga',Row.curso_id,1).then(function (data) {
                        $scope.cursosSeparados = data.data;
                    });
                    $scope.banderaAgregarCarga = true;
                };*/
                $scope.cancelar = function (Row) {
                    $scope.banderaAgregarCarga = false;
                }
                $scope.asignarDocente = function (Row) {
                    $scope.banderaAgregarCarga = true;
                    crudService.byId(Row.id,'carga').then(function (data) {
                        $scope.bandera=false;
                        $scope.cargaLectiva = data;
                        crudService.byId($scope.cargaLectiva.curso_id,'curso').then(function (data) {
                            $scope.curso = data;
                        });
                    });
                };

                $scope.selectPlan2 = function(){
                    $scope.otrosCursos=[];
                    $scope.cargaAsignada=[];
                    $scope.cursos=[];
                    $scope.id=[];

                    crudService.searchCurso('cursoall',$scope.ciclo,$scope.plan_id,1).then(function (data){
                        $scope.otrosCursos=data.data;
                        crudService.searchCurso('cargasemestre',$scope.ciclo,$scope.plan_id,$scope.semestre_id).then(function (data){
                        $scope.cargaAsignada=data.data;
                        var contador=0;
                        var contador1=0;
                        for (var i = 0; i < $scope.cargaAsignada.length; i++) {
                            for (var j = 0; j < $scope.cargaAsignada.length; j++) {
                                if (i!=j) {
                                    if ($scope.cargaAsignada[i].curso_id==$scope.cargaAsignada[j].curso_id) {
                                        
                                        $scope.id[contador1]=$scope.cargaAsignada[i].curso_id;
                                        contador1++;
                                    }
                                }
                            }
                        } 
                            for (var k = 0; k < $scope.cargaAsignada.length; k++) {
                                $scope.ban=false;
                                if ($scope.cargaAsignada[k].grupo!=$scope.grupo) {

                                    for (var j = 0; j < $scope.id.length; j++) {
                                        if ($scope.id[j]==$scope.cargaAsignada[k].curso_id) {
                                          $scope.ban=true; 
                                        }
                                    }
                                    if (!$scope.ban) {
                                         
                                        $scope.cursos[contador]=  $scope.cargaAsignada[k];
                                        contador++;
                                    }
                                }
                            }
                            for (var i = 0; i < $scope.otrosCursos.length; i++) {
                                $scope.ban1=false;
                                for (var k = 0; k < $scope.cargaAsignada.length; k++) {
                                    if ($scope.otrosCursos[i].id==$scope.cargaAsignada[k].curso_id) {
                                        $scope.ban1=true;
                                    }
                                }
                                if (!$scope.ban1) {                                       
                                        $scope.cursos[contador]=  $scope.otrosCursos[i];
                                        contador++;
                                    }
                            }
                        });
                    });

                    if ($scope.otrosCursos.length>0&&$scope.cursos.length==0) {
                            alert("Ya se agrego todos los cursos para este grupo")
                    }
                }
                var id = $routeParams.id;
                if(id)
                {
                    crudService.byId(id,'carga').then(function (data) {
                        $scope.cargaLectiva = data;
                    });
                }else{

                    crudService.searchCurso('curso',$scope.ciclo,$scope.plan_id,1).then(function (data){
                        $scope.cursos = data.data;
                    });
                    crudService.select('planestudiantil','select').then(function (data) {                        
                        $scope.planEstudiantil = data;
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
                    crudService.searchCurso('carga',$scope.ciclo,$scope.plan_id,1).then(function (data){
                        $scope.cargasLectivas = data.data;
                    });
                }

                $scope.selectPlan1 = function(){
                    crudService.searchCurso('carga',$scope.ciclo,$scope.plan_id,$scope.semestre_id).then(function (data){
                        $scope.cargasLectivas = data.data;
                        $log.log($scope.cargasLectivas);
                    });
                }

                

                socket.on('cargaLectiva.update', function (data) {
                    $scope.cargasLectivas=JSON.parse(data);
                });


                $scope.createAsignacionCarga = function(){
                        $scope.cargasLectivas={};
                        $scope.cargasLectivas.cursos=$scope.cursosAsignados;
                        $log.log($scope.cargasLectivas);
                        //xcvb

                        if ($scope.cargasLectivas.cursos.length>0) {
                            crudService.create($scope.cargasLectivas, 'carga').then(function (data) {
                                if (data['estado'] == true) {
                                alert('Grabado Correctamente');
                                   $route.reload();
                                } else {
                                    $scope.errors = data;
                                }
                            });
                        }else{
                            alert('Seleccione Cursos');   
                        }
                }

                $scope.updateCarga = function(){
                    if ($scope.cargaLectiva.id!=undefined) {
                        if ($scope.docenteSelected!=undefined&&$scope.docenteSelected.id!=undefined) {
                            $scope.cargaLectiva.docente_id=$scope.docenteSelected.id;
                            crudService.update($scope.cargaLectiva,'carga').then(function(data)
                            {
                                if(data['estado'] == true){
                                    alert('Asignado correctamente');
                                    crudService.search('carga',$scope.idcurso,1).then(function (data) {
                                        $scope.cursosSeparados = data.data;
                                    });
                                    crudService.searchCurso('carga',$scope.ciclo,$scope.plan_id,$scope.semestre_id).then(function (data){
                                        $scope.cargasLectivas = data.data;
                                    });
                                    $scope.docenteSelected=undefined;
                                    $scope.cargaLectiva={};
                                    $scope.curso={};
                                    $scope.banderaAgregarCarga = false; 
                                }else{
                                   $scope.errors =data;
                                }
                            });
                        }else{
                            alert("Selecione Correctamente el Docente");
                        }
                    }else{
                        alert("Selecione Curso");
                    }
                };

                $scope.destroyCategory = function(){
                    if(confirm("Esta segura de querer eliminar este pago!!!") == true){
                        crudService.destroy($scope.cargaLectiva,'carga').then(function(data)
                        {
                            if(data['estado'] == true){
                                $scope.success = data['nombre'];
                                $scope.cargaLectiva = {};
                                alert('Eliminado Correctamente');
                                crudService.search('carga',$scope.idcurso,1).then(function (data) {
                                    $scope.cursosSeparados = data.data;
                                });
                                crudService.searchCurso('carga',$scope.ciclo,$scope.plan_id,$scope.semestre_id).then(function (data){
                                    $scope.cargasLectivas = data.data;
                                });
                                //if ($scope.cursosSeparados.length==1) {
                                    $scope.banderaAgregarCarga = false; 
                                //}
                                $scope.docenteSelected=undefined;
                                $scope.cargaLectiva={};
                                $scope.curso={};

                            }else{
                                $scope.errors = data;
                            }
                        });
                    }
                    
                }
                //------Servicios buscar Docente--------
                $scope.docenteSelected=undefined;
                $scope.getDocente = function(val) {
                  return crudService.search('decenteCarga',val,1).then(function(response){
                    return response.data.map(function(item){
                      return item;
                    });
                  });
                };
                $scope.asignarCurso  = function(Row) {
                    $log.log($scope.cursos);
                    //$log.log(Row.curso_id);
                    //$log.log($scope.grupo);
                    //$log.log(Row);
                    if (Row.curso_id==undefined) {
                        $scope.cursoAsignado.curso_id=Row.id;
                    }else{
                        $scope.cursoAsignado.curso_id=Row.curso_id;
                    }
                    $log.log($scope.cursoAsignado.curso_id);
                    
                    $scope.cursoAsignado.grupo=$scope.grupo;
                    $scope.cursoAsignado.semestre_id=$scope.semestre_id;
                    if (Row.bandera) {
                        $scope.cursosAsignados.push($scope.cursoAsignado);
                        $scope.cursoAsignado={};
                    }else{
                        for (i = 0; i < $scope.cursosAsignados.length; i++) { 
                            if ($scope.cursosAsignados[i].curso_id==$scope.cursoAsignado.curso_id) {
                                $scope.cursosAsignados.splice(i,1);
                                $scope.cursoAsignado={};   
                            }
                        }
                        
                    }
                    $log.log($scope.cursosAsignados);
                }
            }]);
})();
