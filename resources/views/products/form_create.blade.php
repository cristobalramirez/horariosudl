<setion class="content-header"><h1>
            Productos
            <small>Panel de Control</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class=""><a href="/products">Productos</a> </li>
            <li class="active">Editar</li>
          </ol>


        </section>

        <section class="content">
        <div class="row">
        <div class="col-md-12">

          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Agregar Productos</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form name="ProductCreateForm" role="form" novalidate>
                  <div class="box-body">
                  <div class="callout callout-danger" ng-show="errors">
                                                  <ul>
                                              <li ng-repeat="row in errors track by $index"><strong >@{{row}}</strong></li>
                                              </ul>
                                            </div>
                    
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group" >
                        <label for="nombres">Nombre</label>
                        <input type="text" style="text-transform: uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" class="form-control" name="nombre" placeholder="Nombre" ng-model="product.nombre" ng-blur="validaNombre2(product.nombre)" typeahead-on-select="validarNombre()" typeahead="product as product.proNombre for product in products | filter:$viewValue | limitTo:8" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group" ng-class="{true: 'has-error'}[ productCreateForm.codigo.$error.required && productCreateForm.$submitted || productCreateForm.codigo.$dirty && productCreateForm.codigo.$invalid]">
                        <label for="codigo">Código de Producto</label>
                        <input type="text" class="form-control" style="text-transform: uppercase" onkeyup="javascript:this.value=this.value.toUpperCase();" name="codigo" placeholder="1000" ng-model="product.codigo" ng-keyup="duplicateCodProveedor()" required>
                        <label ng-show="productCreateForm.$submitted || productCreateForm.codigo.$dirty && productCreateForm.codigo.$invalid">
                          <span ng-show="productCreateForm.codigo.$error.required"><i class="fa fa-times-circle-o"></i>Requerido.</span>
                        </label>
                        <span class="text-info"> <em> Identificador único para este producto.</em></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Marca <a class="btn btn-xs btn-info btn-flat" ng-click="addBrand()">+</a></label>
                        <select name="brand" style="text-transform: uppercase" class="form-control" ng-model="product.brand_id" ng-options="k as v for (k, v) in brands">
                          <option value="">--Elige Marca--</option>
                          <option value="">+Agrega Marca</option>
                        </select>
                      </div>
                    </div>
                  </div>


                   <div class="form-group" ng-class="{true: 'has-error'}[ ProductCreateForm.nombre.$error.required && ProductCreateForm.$submitted || ProductCreateForm.nombre.$dirty && ProductCreateForm.nombre.$invalid]">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" ng-blur="validanomStacion()"placeholder="Nombre" ng-model="product.nombre" required>
                      <label ng-show="ProductCreateForm.$submitted || ProductCreateForm.nombre.$dirty && ProductCreateForm.nombre.$invalid">
                        <span ng-show="ProductCreateForm.nombre.$error.required"><i class="fa fa-times-circle-o"></i>Requerido.</span>
                      </label>
                    </div>
                    <div class="form-group" ng-class="{true: 'has-error'}[ ProductCreateForm.shortname.$error.required && ProductCreateForm.$submitted || ProductCreateForm.shortname.$dirty && ProductCreateForm.shortname.$invalid]">
                      <label for="shortname">ShortName</label>
                      <input type="text" class="form-control" name="shortname" placeholder="ShortName" ng-model="product.shortname" required>
                      <label ng-show="ProductCreateForm.$submitted || ProductCreateForm.shortname.$dirty && ProductCreateForm.shortname.$invalid">
                        <span ng-show="ProductCreateForm.shortname.$error.required"><i class="fa fa-times-circle-o"></i>Requerido.</span>
                      </label>
                    </div>
                    <div class="form-group" >
                      <label for="notas">Descripcion</label>
                      <textarea type="notas" class="form-control" name="notas" placeholder="Descripcion"
                      ng-model="product.descripcion" rows="4" cols="50"></textarea>
                     </div>

                </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" ng-click="createProduct()">Crear</button>
                    <a href="/products" class="btn btn-danger">Cancelar</a>
                  </div>
                </form>
              </div><!-- /.box -->

              </div>
              </div><!-- /.row -->
              </section><!-- /.content -->