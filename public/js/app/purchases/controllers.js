(function(){
    angular.module('purchases.controllers',[])
        .controller('PurchaseController',['$scope','$http' ,'$routeParams','$location','crudOPurchase','socketService' ,'$filter','$route','$log',
            function($scope,$http, $routeParams,$location,crudOPurchase,socket,$filter,$route,$log){
                $scope.purchases = [];
                $scope.purchase = {};
                $scope.payments=[];
                $scope.payment={};
                $scope.supplier={};
                $scope.methodPayments=[];
                $scope.methodPayment={};
                $scope.detPayment={};
                $scope.inputStocks=[];
                $scope.inputStock={};
                $scope.headInputStocks=[];
                headInputStock={};
                $scope.products=[];
                $scope.product={};
                $scope.pendientAccounts=[];
                $scope.pendientAccount={};
                $scope.cashHeaders=[];
                $scope.cashHeader={};
                //$scope.idProvicional;
                 $scope.totAnterior;
                $scope.errors = null;
                $scope.success;
                $scope.query = '';
                $scope.stores;
                $scope.purchase.store_id='1';
                $scope.date=new Date();
                //------------------------------------------------
            
                //-------------------------------------------------

                $scope.toggle = function () {
                    $scope.show = !$scope.show;
                };
                $scope.pagechan3=function(){
                    alert(idobcional);
                    crudOPurchase.byId(idobcional,'detPayments',$scope.currentPage).then(function (data) {
                            $scope.detPayments = data.data;
                        });
                }
                $scope.pagechan2=function(){
                    crudOPurchase.paginate('inputStocks',$scope.currentPage).then(function (data) {
                            $scope.headInputStocks = data.data;
                        });
                }
                $scope.pageChanged = function() {
                    if ($scope.query.length > 0) {
                        crudOPurchase.search('purchases',$scope.query,$scope.currentPage).then(function (data){
                        $scope.purchases = data.data;
                    });
                    }else{
                        crudOPurchase.paginate('purchases',$scope.currentPage).then(function (data) {
                            $scope.purchases = data.data;
                        });
                    }
                };


                var id = $routeParams.id;
                var idobcional;

                if(id)
                {
                    if($location.path() == '/purchases/edit/'+$routeParams.id) {
                    crudOPurchase.byId(id,'purchases').then(function (data) {
                        //$scope.purchases = data;

                       if(data.fechaEntrega != null) {
                            if (data.fechaEntrega.length > 0) {
                                $scope.purchases.fechaEntrega = new Date(data.fechaEntrega);
                                //alert(data.fechaPrevista);
                            }
                        }
                        $scope.purchases = data;
                        alert( $scope.purchases.orderPurchase_id);
                        $scope.purchase.montoBruto=parseFloat(data.montoBruto);
                        $scope.purchase.montoTotal=parseFloat(data.montoTotal);
                        $scope.purchase.descuento=parseFloat(data.descuento); 

                       crudOPurchase.paginateDPedido(data.id,'detailPurchases').then(function (data) {
                        $scope.detailPurchases = data.data;
                        //$scope.detailPurchase.unidades=parseFloat(data.cantidad);
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;
                       
                    });});
                     };
                    if($location.path() == '/purchases/show/'+$routeParams.id) {
                        //alert('ok');

                        crudOPurchase.select2('payments',id).then(function (data){
                            $scope.payment = data;
                             $scope.idProvicional=data.id;
                              $scope.totAnterior=data.Acuenta;
                              if(Number($scope.payment.Acuenta)>0){
                              $scope.payment.PorPagado=((Number($scope.payment.Acuenta)*100)/(Number($scope.payment.MontoTotal))).toFixed(2);
                             }else{$scope.payment.PorPagado=0;}
                             $scope.random();
                             idobcional=$scope.payment.id;
                          //alert($scope.payment.id);
                        crudOPurchase.byId($scope.payment.id,'detPayments',1).then(function (data) {
                        $scope.detPayments = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 5;

                    });
                        });
                        crudOPurchase.byId(id,'purchases').then(function (data) {
                            $scope.purchase=data;
                            $scope.payment.purchase_id=data.id;
                        crudOPurchase.byId(data.supplier_id,'suppliers').then(function (data) {
                            $scope.supplier=data;
                            $scope.payment.supplier_id=data.id;
                            //alert($scope.supplier.empresa);
                        });
                        });
                        crudOPurchase.paginate('methodPayments',1).then(function (data) {
                        $scope.methodPayments = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;

                    });
                         crudOPurchase.listaCashes('cashHeaders').then(function (data) {
                        $scope.cashHeaders = data;
                        
                    });

                      $scope.detPayment.fecha=new Date();
                    };
                }else{
                    crudOPurchase.paginate('purchases',1).then(function (data) {
                        $scope.purchases = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;

                    });
                    
                   
                }

                socket.on('purchase.update', function (data) {
                    $scope.purchases=JSON.parse(data);
                });
                $scope.estado;

             /*   $scope.searchEstados=function(){
                    alert($scope.estado);
                    crudOPurchase.all('detailOrderPurchases',$scope.estado).then(function (data) {
                        $scope.purchases = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;

                    });methodPayments
                }*/

                crudOPurchase.paginate('suppliers',1).then(function (data) {
                        $scope.suppliers = data.data;
                        //$scope.maxSize = 5;
                        //$scope.totalItems = data.total;
                        //$scope.currentPage = data.current_page;
                        //$scope.itemsperPage = 15;
                       
                    });

                $scope.limpiarStocks=function(){
                    $scope.inputStocks=[];
                }

                $scope.editCompra = function(row){
                    $location.path('/purchases/edit/'+row.id);
                };
                 $scope.verOrden= function(row){
                    $location.path('/orderPurchases/edit/'+row.orderPurchase_id);
                };
                $scope.searchPurchase = function(){
                if ($scope.query.length > 0) {
                    crudOPurchase.search('purchases',$scope.query,1).then(function (data){
                        $scope.purchases = data.data;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                    });
                }else{
                    crudOPurchase.paginate('purchases',1).then(function (data) {
                        $scope.purchases = data.data;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                    });
                }
                    
                };
                if($location.path() == '/purchases/showD') {
                crudOPurchase.paginate('pendientAccounts',1).then(function (data) {
                        $scope.pendientAccounts = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;

                    });
            }
                if($location.path() == '/purchases/create') {
                crudOPurchase.paginate('inputStocks',1).then(function (data) {
                        $scope.headInputStocks = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 15;

                    });
                crudOPurchase.select('warehouses','select').then(function(data){
                        $scope.warehouses = data;
                    });
                crudOPurchase.autocomplit2('products',1).then(function (data) {
                        $scope.products = data.data;
                    });
                $scope.purchase.fecha=new Date();
                $scope.purchase.tipo="Entrada";
               }
               $scope.mostrarCreate=false;
               $scope.ver=function(){
                   if ($scope.inputStocksCreateForm.$valid) {
                   $scope.mostrarCreate=!$scope.mostrarCreate;
                   }else{
                    alert("Complete Todos los Campos");
                   }
               }

                $scope.ListarinputStocks=function(row){
                
                crudOPurchase.byId(row.id,'inputStocks').then(function (data){
                            $scope.inputStocks=data.data;
                });
                }
               $scope.verStockActual=function(){
                if($scope.purchase.tipo=="Salida"){
                   crudOPurchase.StockActual('stocks',$scope.product.proId.varid,$scope.purchase.warehouses_id).then(function (data){
                            $scope.stock=data;
                            if(data.stockActual<$scope.inputStock.cantidad_llegado || $scope.inputStock.cantidad_llegado<0){
                                 alert("error esta cantidad es incorrecta no existe en stock");
                                 $scope.inputStock.cantidad_llegado=0;
                            }
                   });
                }
               }
               //$scope.orderPurchase.eliminar=0;
               $scope.verEdicion=false;
               $scope.canselarEditDeudas=function(){
                $scope.verEdicion=false;
                   $scope.indexPirata=-1;
               }
               $scope.EditarDeudas=function(index){
                    $scope.indexPirata=index;
                    $scope.verEdicion=true;
               }
               $scope.ActualizarSaldo=function(row,nuevoSaldo){
                    if(Number(row.Saldo) >= nuevoSaldo){
                      row.Saldo=row.Saldo-nuevoSaldo;
                      if(row.Saldo==0){
                        row.estado=1;
                      }
                    }else{
                        alert("ERROR: el Monto ingresado no debe superar la deuda");
                    }
               }
               $scope.CuentasAFavor=function(row){

                crudOPurchase.update(row, 'pendientAccounts').then(function (data) {
                         
                            if (data['estado'] == true) {
                                alert('Cuenta Editada Correctamente');
                                $scope.verEdicion=false;
                                $scope.indexPirata=-1;
                                //$location.path('/purchases/create');
                            } else {
                                $scope.errors = data;

                            }
                        });
               }
               $scope.sacarRowStock=function(index){
                   $scope.inputStocks.splice(index,1);
               }
               $scope.verEntradasEstock=function(){
                     $scope.purchase.eliminar=1;
                     //$scope.inputStock.eliminar=1;
                     if ($scope.inputStocksBodyCreateForm.$valid) {
                     if(parseInt($scope.inputStock.warehouses_id)!=parseInt($scope.inputStock.warehouDestino_id)){
                     $scope.inputStock.variant_id=$scope.product.proId.varid;
                     $scope.inputStock.codigo=$scope.product.proId.varCodigo;
                     crudOPurchase.select('detpres',$scope.product.proId.varid).then(function (data) {
                                    $scope.inputStock.esbase=data.esbase;
                                    $scope.inputStock.detPres_id=data.detpresen_id;
                                    crudOPurchase.byId($scope.inputStock.warehouses_id,'warehouses').then(function (data) {
                                     $scope.inputStock.nombre=data.nombre;

                                   }); 
                    // alert($scope.inputStock.nombre);
                     
                     $scope.inputStocks.push($scope.inputStock);
                     $scope.inputStock={};
                     $scope.product.proId='';
                    
                    });
                 }else{
                    alert("Error no se Puede Seleccionar dos Almacenes Iguales")
                 }
                    }else{alert("complete los campos");}
                 }

                $scope.searchSkuEstock=function(sku){
                     $scope.purchase.eliminar=1;
                      crudOPurchase.autocomplitVar('variants',sku).then(function (data) {
                        $scope.product.proId = data;
                        alert(data.varCodigo);
            /*if($scope.product.proId.varCodigo!=null){
                     //$scope.inputStock.eliminar=1;
                     if(parseInt($scope.inputStock.warehouses_id)!=parseInt($scope.inputStock.warehouDestino_id)){
                     $scope.inputStock.variant_id=$scope.product.proId.varid;
                     $scope.inputStock.codigo=$scope.product.proId.varCodigo;
                     crudOPurchase.select('detpres',$scope.product.proId.varid).then(function (data) {
                                    $scope.inputStock.esbase=data.esbase;
                                    $scope.inputStock.detPres_id=data.detpresen_id;
                                    crudOPurchase.byId($scope.inputStock.warehouses_id,'warehouses').then(function (data) {
                                     $scope.inputStock.nombre=data.nombre;

                                   }); 
                    // alert($scope.inputStock.nombre);
                     
                     //$scope.inputStocks.push($scope.inputStock);
                     //$scope.inputStock={};
                     //$scope.product.proId='';
                    
                    });
                 }else{
                    alert("Error no se Puede Seleccionar dos Almacenes Iguales")
                 }}*/});
                    
                 }
                $scope.nuevo=function(){
                    $scope.mostrarCreate=false;
                     $scope.purchase.tipo="Entrada";
                    $scope.purchase.warehouses_id=''; 
                    $scope.purchase.warehouDestino_id='';
                    $scope.inputStock.cantidad_llegado='';
                    $scope.product.proId='';
                    $scope.inputStock.descripcion='';
                    $scope.inputStocks=[];
                }
                
                $scope.crearEntradasEstock=function(){
                    $scope.purchase.detailOrderPurchases=$scope.inputStocks;
                    $scope.mostrarCreate=!$scope.mostrarCreate;
                     alert("sobre");
                    crudOPurchase.create($scope.purchase, 'inputStocks').then(function (data) {
                         alert("debajo");
                            if (data['estado'] == true) {
                                alert('Movimiento Registrado');
                                $scope.purchase.warehouses_id=''; 
                                $scope.purchase.warehouDestino_id='';  
                                $scope.inputStocks=[];                             
                                $scope.mostrarCreate=false;
                                $scope
                                $location.path('/purchases/create');
                            } else {
                                $scope.errors = data;

                            }
                        });
                }
                $scope.traerPayments=function(row){
                    alert(row.id);

                    crudOPurchase.byId(row.id,'payments').then(function (data) {
                        $scope.payment=data;
                        alert($scope.payment.montoTotal);
                    });
                    $location.path('/purchases/create');
                }
        ///caja no es mia XD -------------------------------------------------------------------
                $scope.cajas={};
                $scope.TraerSales=function(id){
                    alert("hola"+id);
                     crudOPurchase.byId(id,'cashes').then(function (data) {
                       $scope.cajas=data;
                        alert(data.id);
                    });
                }
                $scope.createmovCaja = function(tipo){
                    $scope.detCash={};
                   // $scope.mostrarAlmacenCaja();
                   
                    $scope.detCash.cash_id=$scope.cashfinal.id; 
                    $scope.detCash.fecha=$scope.date.getFullYear()+'-'+($scope.date.getMonth()+1)+'-'+$scope.date.getDate();
                    $scope.detCash.hora=$scope.date.getHours()+':'+$scope.date.getMinutes()+':'+$scope.date.getSeconds();
                    $scope.detCash.montoCaja=$scope.cashfinal.montoBruto;
                    
                    $scope.detCash.montoMovimientoTarjeta=0;
                    $scope.detCash.montoMovimientoEfectivo=Number($scope.pago.cash);
                    $scope.detCash.montoFinal=Number($scope.detCash.montoCaja)+$scope.detCash.montoMovimientoTarjeta+$scope.detCash.montoMovimientoEfectivo;
                    $scope.detCash.estado='1'; 
                    //alert(tipo);
                    if(tipo=='credito'){
                        $scope.detCash.cashMotive_id='14';    
                    }else if(tipo=='contado'){
                        $scope.detCash.cashMotive_id='1';   
                    }
                    

                    $scope.cashfinal.ingresos=Number($scope.cashfinal.ingresos)+Number($scope.detCash.montoMovimientoTarjeta)+Number($scope.detCash.montoMovimientoEfectivo); 
                    $scope.cashfinal.montoBruto=$scope.detCash.montoFinal;
                    //////////////////////////////////////////////

                    $scope.sale.fechaPedido=$scope.date.getFullYear()+'-'+($scope.date.getMonth()+1)+'-'+$scope.date.getDate()+' '+$scope.date.getHours()+':'+$scope.date.getMinutes()+':'+$scope.date.getSeconds();
                    $scope.sale.detOrders=$scope.compras;
                    $scope.sale.movimiento=$scope.detCash; 
                    $scope.sale.caja=$scope.cashfinal;
                }

    ///---------------------------------------------------------------------------------

                $scope.recalPayments=function(){
                    //alert($scope.payment.MontoTotal);
                if(Number($scope.payment.MontoTotal)>=Number($scope.detPayment.montoPagado)){
                    if($scope.payment.detpId>0){
                          $scope.payment.Acuenta=Number($scope.totAnterior)-Number($scope.PagoAnterior);
                          alert($scope.payment.Acuenta);
                          $scope.payment.Acuenta=Number($scope.payment.Acuenta)+Number($scope.detPayment.montoPagado);
                          $scope.payment.Saldo=(Number($scope.payment.MontoTotal)-Number($scope.payment.Acuenta)).toFixed(2);
                          $scope.payment.PorPagado=((Number($scope.payment.Acuenta)*100)/(Number($scope.payment.MontoTotal))).toFixed(2);
                          $scope.random();
                    }else{
                        alert($scope.totAnterior);
                          $scope.payment.Acuenta=Number($scope.totAnterior)+Number($scope.detPayment.montoPagado);
                          $scope.payment.Saldo=(Number($scope.payment.MontoTotal)-Number($scope.payment.Acuenta)).toFixed(2);
                          $scope.payment.PorPagado=((Number($scope.payment.Acuenta)*100)/(Number($scope.payment.MontoTotal))).toFixed(2);
                          $scope.random();
                   }
                   }else{
                    alert('!!Error Usted Solo Puede Ingresar una cantidad menor o igual al total!!');
                }
                }
               $scope.addMethodPaiment=function(){
                 $scope.detPayment=$scope.idProvicional;
                 $scope.detPayments.push($scope.detPayment);
                 $scope.detPayment={};
               }

                $scope.createdetPayment = function(){
                    //$scope.atribut.estado = 1;
                    $scope.detPayment.payment_id=$scope.idProvicional;
                    $scope.payment.detPayments=$scope.detPayment;
                    //alert($scope.payment.id);
                    //if ($scope.TtypeCreateForm.$valid) {
                        //if ($scope.paymentCreateForm.$valid){
                        crudOPurchase.create($scope.payment, 'detPayments').then(function (data) {
                          
                            if (data['estado'] == true) {
                                
                                alert('grabado correctamente');
                               // $scope.detPayments={};
                               $scope.totAnterior=$scope.payment.Acuenta;
                               $scope.detPayment={};
                               $scope.detPayment.fecha=new Date();
                               //$scope.detPayment.montoPagado='';
                                $scope.paginateDetPay();
                                //$location.path('/types');

                            } else {
                                $scope.errors = data;

                            }
                        });//}
                   // }else{
                    //    alert("error");
                    //}*/
                }
                $scope.paginateDetPay=function(){
                      crudOPurchase.byId($scope.idProvicional,'detPayments').then(function (data) {
                        $scope.detPayments = data.data;
                        $scope.maxSize = 5;
                        $scope.totalItems = data.total;
                        $scope.currentPage = data.current_page;
                        $scope.itemsperPage = 5;

                    });
                }
                $scope.destroyPay = function(row){
                    $scope.payment.detpId=row.id;
                    crudOPurchase.destroy($scope.payment,'payments').then(function(data)
                    {
                        if(data['estado'] == true){
                            $scope.success = data['nombre'];
                            //$scope.Ttype = {};
                            //alert('hola');
                            $route.reload();

                        }else{
                            $scope.errors = data;
                        }
                    });
                }
                $scope.PagoAnterior;
                $scope.mostrarBtnGEd=false;
                $scope.editDetpayment=function(row){
                    $scope.payment.detpId=row.id;
                    $scope.PagoAnterior=row.montoPagado;
                    $scope.detPayment.fecha=new Date(row.fecha);
                    $scope.detPayment.methodPayment_id=row.methodPayment_id;
                    $scope.detPayment.montoPagado=(parseFloat(row.montoPagado));
                    $scope.mostrarBtnGEd=true;
                }
                
                $scope.editPayment = function(){
                    $scope.payment.detPayments=$scope.detPayment;
                    
                    crudOPurchase.update($scope.payment,'payments').then(function(data)
                    {
                        if(data['estado'] == true){
                            $scope.success = data['nombre'];
                            //$scope.Ttype = {};
                            //alert('hola');
                            $route.reload();

                        }else{
                            $scope.errors = data;
                        }
                    });
                }
$scope.random = function() {
    var type;

    if ($scope.payment.PorPagado < 25) {
      type = 'info';
    } else if ($scope.payment.PorPagado < 50) {
      type = 'success';
    } else if ($scope.payment.PorPagado < 75) {
      type = 'warning';
    } else {
      type = 'danger';
    }

    $scope.type = type;
  };

              
            }]);
})();
