<?php
namespace Salesfly\Salesfly\Managers;
class DocenteManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'nombres'=>'required',
            'apellidos'=>'required',
            'dni'=>'',
            'fechanacimiento'=>'',
            'fechaAlta'=>'',
            'fechabaja'=>'',
            'direccion'=>'',
            'ubigeo_id'=>'',
            'escuela_id'=>''           
            ];
        return $rules;
    }}