(function(){
    angular.module('purchases.controllers',[])
        .controller('PurchaseController',['$scope', '$routeParams','$location','crudPurchase','socketService' ,'$filter','$route','$log',
            function($scope, $routeParams,$location,crudPurchase,socket,$filter,$route,$log){
                $scope.purchases = [];
                $scope.purchase = {};
                $scope.errors = null;
                $scope.success;
                $scope.query = '';
                $scope.warehouses;
                $scope.suppliers;
                $scope.supplier ;
                $scope.purchase.suppliers_id;

                $scope.toggle = function () {
                    $scope.show = !$scope.show;
                };

                $scope.pageChanged = function() {
                    if ($scope.query.length > 0) {
                        crudPurchase.search('purchases',$scope.query,$scope.currentPage).then(function (data){
                        $scope.purchases = data.data;
                    });
                    }else{
                        crudPurchase.paginate('purchases',$scope.currentPage).then(function (data) {
                            $scope.purchases = data.data;
                        });
                    }
                };


                var id = $routeParams.id;

                if(id)
                {
                    crudPurchase.byId(id,'purchases').then(function (data) {
                        $scope.purchase = data;
                    });
                }else{
                    crudPurchase.paginate('purchases',1).then(function (data) {
                        $scope.purchases = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;

                    });
                   
                    crudPurchase.select('warehouses','select').then(function(data){
                        $scope.warehouses = data;
                    });
                     
                }

                socket.on('purchase.update', function (data) {
                    $scope.purchases=JSON.parse(data);
                });
                $scope.asignarEmpresa=function(row){
                    $scope.purchase.suppliers_id=row.id;
                    $scope.purchase.empresa=row.empresa;
                }
                $scope.searchsupplier=function(){
                 crudPurchase.paginate('suppliers',1).then(function (data) {
                        $scope.suppliers = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;
                       
                    });
                    }

                $scope.searchPurchase = function(){
                if ($scope.query.length > 0) {
                    crudPurchase.search('purchases',$scope.query,1).then(function (data){
                        $scope.purchases = data.data;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                    });
                }else{
                    crudPurchase.paginate('purchases',1).then(function (data) {
                        $scope.purchases = data.data;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                    });
                }
                    
                };

                $scope.createPurchase = function(){
                    //$scope.atribut.estado = 1;
                    alert("este es el id" + $scope.purchase.suppliers_id);

                    if ($scope.purchaseCreateForm.$valid) {
                        crudPurchase.create($scope.purchase, 'purchases').then(function (data) {
                          
                            if (data['estado'] == true) {
                                $scope.success = data['nombres'];
                                alert('grabado correctamente');
                                $location.path('/purchases');

                            } else {
                                $scope.errors = data;

                            }
                        });
                    }
                }


                $scope.editPurchase= function(row){
                    $location.path('/purchases/edit/'+row.id);
                };

                $scope.updatePurchase = function(){

                    if ($scope.purchaseCreateForm.$valid) {
                        crudPurchase.update($scope.purchase,'purchases').then(function(data)
                        {
                            if(data['estado'] == true){
                                $scope.success = data['nombres'];
                                alert('editado correctamente');
                                $location.path('/purchases');
                            }else{
                                $scope.errors =data;
                            }
                        });
                    }
                };

                $scope.deletePurchase = function(row){
                    $scope.purchase = row;
                }

                $scope.cancelPurchase = function(){
                    $scope.purchase = {};
                }

                $scope.destroyPurchase = function(){
                    crudPurchase.destroy($scope.purchase,'purchases').then(function(data)
                    {
                        if(data['estado'] == true){
                            $scope.success = data['nombre'];
                            $scope.purchase = {};
                            //alert('hola');
                            $route.reload();

                        }else{
                            $scope.errors = data;
                        }
                    });
                }
            }]);
})();
