<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\Docente;

class DocenteRepo extends BaseRepo{
    
    public function getModel()
    { 
        return new Docente;
    }

    public function search($q)
    {
        $docentes =Docente::where('nombres','like', $q.'%')
                    ->paginate(15);
        return $docentes;
    }
    public function searchCarga($q)
    {
        $customers =Docente::select(\DB::raw('id,dni,nombres,apellidos,CONCAT(nombres," ",apellidos) as busqueda'))
                    ->where('nombres','like', $q.'%')
                    ->orWhere('apellidos','like','%'.$q.'%')
                    ->orWhere('dni','like',$q.'%')
                    ->paginate(15);
        return $customers;
    }
} 