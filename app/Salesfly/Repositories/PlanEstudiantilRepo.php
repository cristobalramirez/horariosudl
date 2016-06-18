<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\PlanEstudiantil;

class PlanEstudiantilRepo extends BaseRepo{
    
    public function getModel()
    { 
        return new PlanEstudiantil;
    }

    public function search($q)
    {
        $planestudiantil =PlanEstudiantil::where('nombre','like', $q.'%')
                    ->paginate(15);
        return $planestudiantil;
    }
    public function all(){
        $planestudiantil = PlanEstudiantil::join('semestre','semestre.id','=','planestudiantil.semestreInicio_id')
            ->select('planestudiantil.*','semestre.id as idsemestre','semestre.codigo as codigo')
            ->get();
        return $planestudiantil;

        //$planestudiantil = PlanEstudiantil::with('semestre');
        //$planestudiantil = PlanEstudiantil::with(array('semestre'=>function($query){
          //  $query->select('id','codigo');
        //}));
        //return $planestudiantil;
    }
} 