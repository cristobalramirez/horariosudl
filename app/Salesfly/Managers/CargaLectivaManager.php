<?php
namespace Salesfly\Salesfly\Managers;
class CargaLectivaManager extends BaseManager {

    public function getRules()
    {
        $rules = [  
        	'grupo'=>'required',
        	'docente_id'=>'',
        	'curso_id'=>'required',
        	'semestre_id'=>'required'           
            ];
        return $rules;
    }}