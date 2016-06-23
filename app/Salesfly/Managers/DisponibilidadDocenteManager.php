<?php
namespace Salesfly\Salesfly\Managers;
class DisponibilidadDocenteManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'dia'=>'required',
            'horaInicio_id'=>'required',
            'docente_id'=>'required', 
            'semestre_id'=>'required'           
            ];
        return $rules;
    }}