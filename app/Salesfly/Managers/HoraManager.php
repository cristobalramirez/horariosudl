<?php
namespace Salesfly\Salesfly\Managers;
class HoraManager extends BaseManager {

    public function getRules()
    {
        $rules = [              
            'hora' => 'required',
            'horaFin'=> 'required',
			'orden' =>'required'
            ];
        return $rules;
    }}