<?php
namespace Salesfly\Salesfly\Managers;
class CursoManager extends BaseManager {

    public function getRules()
    {
        $rules = [              
            'nombre' => 'required',
			'creditos' =>'required',
			'horasTeoricas' =>'required',
			'horasPracticas' =>'required',
			'ciclo' =>'required',
			'escuela_id' =>'required',
			'planEstudiantil_id'=> 'required'
            ];
        return $rules;
    }}