<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\Semestre;

class SemestreRepo extends BaseRepo{
    
    public function getModel()
    { 
        return new Semestre;
    }

    public function search($q)
    {
        $semestre =Semestre::where('nombre','like', $q.'%')
                    ->paginate(15);
        return $semestre;
    }
    public function all(){
        $semestre = Semestre::all();
        return $semestre;
    }
} 