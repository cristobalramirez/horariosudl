<?php
namespace Salesfly\Salesfly\Managers;
class ProductManager extends BaseManager {

    public function getRules()
    {
        $rules = [              
            'nombre'=> 'required',
            'codigo'=> 'required',
            'marca'=> '',
            'modelo'=> '',
            'descripcion'=> '',
            'estado'=> 'required',
            'image'=> '',
            'stock'=> '',
            'stockAlmacen'=> '',
            'stockTecnico'=> '',
            'category_id'=> 'required'
        ];
        return $rules;
    }}