<?php

namespace Salesfly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Salesfly\Salesfly\Repositories\ProductRepo;
use Salesfly\Salesfly\Managers\ProductManager;

class ProductsController extends Controller {

    protected $productRepo;

    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        return View('products.index');
    }

    public function all()
    {
        $products = $this->productRepo->paginaterepo(15);
        return response()->json($products);
        //var_dump($products);
    }

    public function paginatep(){
        $products = $this->productRepo->paginaterepo(15);
        return response()->json($products);
    }


    public function form_create()
    {
        return View('products.form_create');
    }

    public function form_edit()
    {
        return View('products.form_edit');
    }

    public function create(Request $request)
    {
        $products = $this->productRepo->getModel();
        //var_dump($request->all());
        //die();
        $manager = new ProductManager($products,$request->all());
        //print_r($manager); die();
        $manager->save();
        //Event::fire('update.product',$product->all());

        return response()->json(['estado'=>true, 'nombre'=>$products->nombre]);
    }

    public function find($id)
    {
        $product = $this->productRepo->find($id);
        return response()->json($product);
    }

    public function edit(Request $request)
    {
        $product = $this->productRepo->find($request->id);

        $manager = new ProductManager($product,$request->all());
        $manager->save();

        return response()->json(['estado'=>true, 'nombre'=>$product->nombre]);
    }

    public function destroy(Request $request)
    {
        $product= $this->productRepo->find($request->id);
        $product->delete();
        //Event::fire('update.product',$product->all());
        return response()->json(['estado'=>true, 'nombre'=>$product->nombre]);
    }

    public function search($q)
    {
        //$q = Input::get('q');
        $products = $this->productRepo->search($q);

        return response()->json($products);
    }
}