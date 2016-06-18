<?php
namespace Salesfly\Salesfly\Managers;
class PlanEstudiantilManager extends BaseManager {

    public function getRules()
    {
        $rules = [  
        	'semestreInicio_id'=>'required',
        	'semestreFin_id'=>'',         
            ];
        return $rules;
    }}
planestudiantil