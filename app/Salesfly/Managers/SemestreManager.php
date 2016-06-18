<?php
namespace Salesfly\Salesfly\Managers;
class SemestreManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'codigo'=>'required',
            'fechainicio'=>'required',
            'fechafin'=>'required',
            'estado'=>'required'            
            ];
        return $rules;
    }}