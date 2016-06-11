<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\Product;

class ProductRepo extends BaseRepo{
    
    public function getModel()
    {
        
        return new Product;
    }

    public function search($q)
    {
        $Products =Product::where('nombre','like', $q.'%')
                    ->paginate(15);
        return $Products;
    }
    public function validarNoRepit($text){
        $product =Product::where('nombre','=', $text)
                    ->orWhere('codigo','=', $text)
                    ->first();
        return $product;
    }
    public function paginaterepo($c){
        $products = Product::with('category')->paginate($c);
        $products = Product::with(array('category'=>function($query){
            $query->select('id','nombre');
        }))->paginate($c);
        return $products;
    }
} 