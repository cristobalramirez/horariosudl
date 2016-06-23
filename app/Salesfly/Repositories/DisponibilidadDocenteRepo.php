<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\DisponibilidadDocente;

class DisponibilidadDocenteRepo extends BaseRepo{
    
    public function getModel()
    { 
        return new DisponibilidadDocente;
    }

    /*public function search($q)
    {
        $disponibilidadDocente =DisponibilidadDocente::where('nombre','like', $q.'%')
                    ->paginate(15);
        return $disponibilidadDocente;
    }*/
    public function all(){
        $disponibilidadDocente = DisponibilidadDocente::all();
        return $disponibilidadDocente;
    }
}  