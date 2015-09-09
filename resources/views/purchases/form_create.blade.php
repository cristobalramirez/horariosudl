


        <!--================================================================================-->
        <section class="content-header">
          <h1>
            Orden de Compras
            <small>Panel de Control</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="/stores">Orden de Compras</li>
            <li class="active">Crear</li>
          </ol>

          
        </section>
<!--===========================================================================================-->
<section class="content">

<div class="row">
<div class="col-md-12">

<div class="box box-primary" >
                             <div class="box-header with-border">
                                   <h3 class="box-title">Crear Pedido de Compras</h3>
                             </div><!-- /.box-header -->
                <!-- form start -->
 <form name="inputStocksCreateForm" role="form" novalidate>
            <div class="box-body" >
                  <div class="callout callout-danger" ng-show="errors">
                                                  <ul>
                                              <li ng-repeat="row in errors track by $index"><strong >@{{row}}</strong></li>
                                              </ul>
                 </div>
  <div class="box-body"> 
  <div class="row">
          <div class="col-md-1">
          </div>
          <div  class="col-md-1">
                    <button data-toggle="modal" ng-click="limpiarStocks()" data-target="#miventana1" class="btn btn-success btn-xs">Registrar Nuevo</button>
           </div>
  </div>          
    </br>
      
      <div class="row">
          <div class="col-md-1">
          </div>
         
          <div class="col-md-10">
            <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Fecha</th>
                      <th>Tipo</th>
                      <th>Numero de Orden</th>
                      <th>Numero de Compra</th>
                      <th>Usuario</th>
                      <th style="width: 200px">Almacen</th>
                      <th>Detalles</th>
                    </tr>
                    
                    <tr ng-repeat="row in headInputStocks">
                      <td>@{{$index + 1}}</td>
                      <td >@{{row.Fecha}}</td>
                      <td ng-if="row.tipo=='Entrada'"><span class="badge bg-red">Entrada</span></td> 
                      <td ng-if="row.tipo=='Transferencia'"><span class="badge bg-yellow">Transferencia</span></td> 
                      <td ng-if="row.tipo=='Salida'"><span class="badge bg-green">Salida</span></td> 
                      <td >@{{row.orderPurchase_id}}</td>
                      <td>@{{row.purchase_id}}</td>
                      <td>@{{row.nombreUser}}
                      <td ng-if="row.tipo!='Transferencia'">@{{row.nombre}}</td>  
                      <td ng-if="row.tipo=='Transferencia'">@{{row.nombre+"->"+row.nomAlmacen2}}</td>
                      <td><button data-toggle="modal" ng-click="ListarinputStocks(row)" data-target="#ventanalista" class="btn btn-success btn-xs">Ver Detalles</button>
                      </td>
                    </tr>
                    
                    
                  </table>
                </div>
            </div>
        <div class="row">
        <div class="col-md-1">
        </div>
          <div class="col-md-1">
                    <a href="/purchases" class="btn btn-danger">Salir</a>
        </div>
          <div class="col-md-9">
            <div class="box-footer clearfix">
                  <pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" 
                  class="pagination-sm no-margin pull-right" items-per-page="itemsperPage" 
                  boundary-links="true" rotate="false" num-pages="numPages" 
                  ng-change="pagechan2()"></pagination>
               </div> 
           </div>
        <div class="col-md-1">
        </div>
        
      </div>
 
             <!--   <div ng-app>
                         <a ng-click="purchase.$show()" ng-show="!purchase.$visible" ediable-text="userxx.name">@{{ userxx.name }}</a>
                </div>-->
            </div>
            <!--===================================================================================-->
            
        
 
<!--===============================================================================================-->
     
                  </div>
      </div>
   </div>   
</form>
</div><!-- /.box -->

</div>

</div>
</div>
  <!-- ==========================================================================================-->
  </div>
        </form>
  </div>
</div>
</div>

</section>


<!--================Ventana Emergente Crear=================================-->
        <div class="container"  style="margin-top: 60px;">
           <div  class="modal fade" id="miventana1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="ngenabled">
             <div  class="modal-dialog modal-lg">
               <div style="border-radius: 5px" class="modal-content">
                 <div class="modal-header" style="border-radius: 5px" >
                   <button type="button"  class="close" data-dismiss="modal" aria-hidden="ngenabled"> &times; </button>
                   <h4><b>Registrando Movimiento de Almacen</b></h4>
                   </div>
                   <div class="modal-body">
    <form name="inputStocksCreateForm" role="form" novalidate>
            <div class="row">
            <div class="col-md-1">
            </div>
          
          </div>          
          <div  class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-4">
           <div  class="form-group" ng-class="{true: 'has-error'}[ inputStocksCreateForm.fechaPedido.$error.required && inputStocksCreateForm.$submitted || inputStocksCreateForm.fechaPedido.$dirty && inputStocksCreateForm.fechaPedido.$invalid]">
                                <label for="fechaPedido">Fecha  </label>
                            <div  class="input-group">
                                <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                </div>
                                  <input ng-disabled="mostrarCreate" type="date" class="form-control"  name="fechaPedido" ng-model="purchase.fecha" required>
                            </div>
                            <label ng-show="inputStocksCreateForm.$submitted || inputStocksCreateForm.fechaPedido.$dirty && inputStocksCreateForm.fechaPedido.$invalid">
                            <span ng-show="inputStocksCreateForm.fechaPedido.$invalid"><i class="fa fa-times-circle-o"></i>Fecha Inválida.</span>
                            </label>
                             
                           
                      </div>
          </div>
         
          <div  class="col-md-3">
          <div class="form-group" ng-class="{true: 'has-error'}[ inputStocksCreateForm.warehouse.$error.required && inputStocksCreateForm.$submitted || inputStocksCreateForm.warehouse.$dirty && inputStocksCreateForm.warehouse.$invalid]">
                       <label for="Tienda">Almacen: </label>
                       <select ng-disabled="mostrarCreate" class="form-control" name="warehouse" ng-click="seleccionarWarehouse()" ng-model="purchase.warehouses_id" ng-options="item.id as item.nombre for item in warehouses" required>
                       <option value="">--Elija warehouses_id--</option>
                       </select>
                       <label ng-show="inputStocksCreateForm.$submitted || inputStocksCreateForm.warehouse.$dirty && inputStocksCreateForm.warehouse.$invalid">
                                <span ng-show="inputStocksCreateForm.warehouse.$invalid"><i class="fa fa-times-circle-o"></i>Requerido.</span>
                      </label>
                       
          </div>
           
      </div>
       <div  class="col-md-3">
                <div class="form-group" ng-class="{true: 'has-error'}[ inputStocksCreateForm.warehouse.$error.required && inputStocksCreateForm.$submitted || inputStocksCreateForm.warehouse.$dirty && inputStocksCreateForm.warehouse.$invalid]">
                       <label for="Tienda">Tipo: </label>
                       <select  ng-disabled="mostrarCreate" class="form-control"  name="warehouse"  ng-model="purchase.tipo"  required>
                       <option value="Entrada" >Entrada</option>
                       <option value="Salida">Salida</option>
                       <option value="Transferencia">Transferencia</option>
                       </select>
                       <label ng-show="inputStocksCreateForm.$submitted || inputStocksCreateForm.warehouse.$dirty && inputStocksCreateForm.warehouse.$invalid">
                                <span ng-show="inputStocksCreateForm.warehouse.$invalid"><i class="fa fa-times-circle-o"></i>Requerido.</span>
                      </label>
                       
                    </div>
          </div>
          
     </div>

     <div  ng-hide="mostrarCreate" class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-2">
             <div ng-hide="false" class="col-md-1">
                    <button ng-click="ver()" type="submit" class="btn btn-success btn-xs">Continuar</button>
             </div>
            </div>
    </div>
  </form>
  <form name="inputStocksBodyCreateForm" role="form" novalidate>
     <div  ng-show="mostrarCreate" class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-2">
          <div class="form-group" ng-class="{true: 'has-error'}[ inputStocksBodyCreateForm.nombre.$error.required && inputStocksBodyCreateForm.$submitted || inputStocksBodyCreateForm.nombre.$dirty && inputStocksBodyCreateForm.nombre.$invalid]">
                      <label for="nombre">Cantidad</label>
                      <input type="Number" class="form-control" name="nombre" placeholder="Nombre" ng-blur="verStockActual()" ng-model="inputStock.cantidad_llegado" required>
                      <label ng-show="inputStocksBodyCreateForm.$submitted || inputStocksBodyCreateForm.nombre.$dirty && inputStocksBodyCreateForm.nombre.$invalid">
                        <span ng-show="inputStocksBodyCreateForm.nombre.$error.required"><i class="fa fa-times-circle-o"></i>Requerido.</span>
                      </label>
                    </div>
          </div>
           <div class="col-md-3">
                <div class="input-group">
                <div class="form-group" ng-class="{true: 'has-error'}[ inputStocksBodyCreateForm.empresa.$error.required && inputStocksBodyCreateForm.$submitted || inputStocksBodyCreateForm.empresa.$dirty && inputStocksBodyCreateForm.empresa.$invalid]">
              
              <label>Producto</label>
                
               <input typeahead-on-select="asignarProduc1()" type="text" ng-model="product.proId"  name="empresa" placeholder="Locations loaded via $http" 
               typeahead="product as product.proNombre+'/'+product.BraName+'/'+product.TName+'/'+product.NombreAtributos for product in products | filter:$viewValue | limitTo:8" 
               typeahead-loading="loadingLocations" typeahead-no-results="noResults" class="form-control"
               tooltip="Ingrese caracteres para busacar producto por nombre"
            required >
         
                    <i ng-show="loadingLocations" class="glyphicon glyphicon-refresh"></i>
            <div ng-show="noResults">
                    <i class="glyphicon glyphicon-remove"></i> No Results Found
           </div>
            <label ng-show="inputStocksBodyCreateForm.$submitted || inputStocksBodyCreateForm.empresa.$dirty && inputStocksBodyCreateForm.empresa.$invalid">
                    <span ng-show="inputStocksBodyCreateForm.empresa.$error.required"><i class="fa fa-times-circle-o"></i>Requerido.</span>
          </label>
        </div> 
        </div>
          </div>
          <div class="col-md-5">
                    <div class="form-group" >
                      <label for="notas">Descripcion</label>
                      <textarea type="notas" class="form-control" name="notas" placeholder="Descripcion"
                      ng-model="inputStock.descripcion" rows="2" cols="50"></textarea>
                     </div>
          </div>
      
          
     </div>
     <div ng-show="mostrarCreate" class="row">
        <div class="col-md-1">
        </div>
         <!--<div ng-hide="mostrarAlmacen"class="col-md-4">
               <label for="variantes">¿Mostrar Alamcen Destino?</label>
                      <div   class="form-group" >                            
                            <input ng-disabled="orderPurchase.cancelar" type="checkbox"  name="variantes" ng-model="mostrarAlmacen" />
                            <span class="text-info"> <em> Seleccione enviar a otro almacen.</em></span>
                        </div>
                </div>-->
        <div ng-if="purchase.tipo=='Transferencia'" class="col-md-3">
          <div class="form-group" ng-class="{true: 'has-error'}[ inputStocksCreateForm.warehouse.$error.required && inputStocksCreateForm.$submitted || inputStocksCreateForm.warehouse.$dirty && inputStocksCreateForm.warehouse.$invalid]">
                       <label for="Tienda">Alamcen Destino: </label>
                       <select  class="form-control" name="warehouse" ng-click="seleccionarWarehouse()" ng-model="purchase.warehouDestino_id" ng-options="item.id as item.nombre for item in warehouses" required>
                       <option value="">--Elija warehouses_id--</option>
                       </select>
                       <label ng-show="inputStocksCreateForm.$submitted || inputStocksCreateForm.warehouse.$dirty && inputStocksCreateForm.warehouse.$invalid">
                                <span ng-show="inputStocksCreateForm.warehouse.$invalid"><i class="fa fa-times-circle-o"></i>Requerido.</span>
                      </label>
                       
          </div>
        </div>
        <div ng-show="check" class="col-md-3">
            <label for="Variante">Busca Por Sku</label>
            <div class="form-group">
            <input type="text" ng-keyup="searchSkuEstock(variant.sku)" class="form-control" ng-model="variant.sku">
            </div>
            </div>
            <div class="col-md-3">
               <em>¿POR SKU?</em>
                      <div   class="form-group" >                            
                            <input ng-disabled="orderPurchase.cancelar" type="checkbox"  name="variantes" ng-model="check" />
                            
                        </div>
                </div>
    </div>
      
    <div  ng-show="mostrarCreate" class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-1">
                    <a  type="submit" ng-click="nuevo()" class="btn btn-success btn-xs">Nuevo</a>
           </div>
          <div class="col-md-1">
                    <a  type="submit" type="submit" ng-click="verEntradasEstock()" class="btn btn-success btn-xs">Agregar</a>
           </div>
      </div>
  </form>
      </br>
           <div ng-show="mostrarCreate" class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
              <div  class="well well-lg">
                   <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Descripcion</th>
                      <th>Cantidad</th>
                      <th>Producto</th>
                    </tr>
                    
                    <tr ng-repeat="row in inputStocks">
                      <td>@{{$index + 1}}</td>
                      <td >@{{row.descripcion}}</td>
                      <td >@{{row.cantidad_llegado}}</td>
                      <td>@{{row.codigo}}</td> 
                      <td><button type="button" class="btn btn-danger btn-xs"  ng-click="sacarRowStock($index)">
                        <span class="glyphicon glyphicon-trash"></span></button></td>
                    </tr>
                    
                    
                  </table>
                  <div class="">
                    <a  type="submit" ng-click="crearEntradasEstock()" class="btn btn-success btn-xs">Guardar</a>
                 </div>
              </div>
          </div>
      </div>
                     </div>
                     <div class="modal-footer" style="border-radius: 5px;">
                    <a  class="btn btn-danger" data-dismiss="modal" aria-hidden="ngenabled">Cancelar</a>
                   </div>
                     </form>
                   
                   
               </div>
             </div>
           </div>
        </div>
        </div>
        <!--================Ventana Emergente Crear=================================-->
        <div class="container"  style="margin-top: 60px;">
           <div  class="modal fade" id="ventanalista" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="ngenabled">
             <div  class="modal-dialog">
               <div style="border-radius: 5px" class="modal-content">
                 <div class="modal-header" style="border-radius: 5px" >
                   <button type="button"  class="close" data-dismiss="modal" aria-hidden="ngenabled"> &times; </button>
                   <h4><b>Listado de Detalles</b></h4>
                   </div>
                   <div class="modal-body">
        
      
    
      </br>
           <div class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-10">
              <div  class="well well-lg">
                   <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Descripcion</th>
                      <th>Cantidad</th>
                      <th>Producto</th>
                    </tr>
                    
                    <tr ng-repeat="row in inputStocks">
                      <td>@{{$index + 1}}</td>
                      <td >@{{row.descripcion}}</td>
                      <td >@{{row.cantidad_llegado}}</td>
                      <td>@{{row.codigo}}</td> 
                    </tr>
                    
                    
                  </table>
                  
              </div>
          </div>
      </div>
                     </div>
                     
                     </form>
                   
                    <div class="box-footer">
                    <a href="/purchases" class="btn btn-danger">Salir</a>
                  </div>
               </div>
             </div>
           </div>
        </div>
        </div>