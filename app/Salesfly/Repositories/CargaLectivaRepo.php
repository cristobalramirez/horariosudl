<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\CargaLectiva;

class CargaLectivaRepo extends BaseRepo{
    
    public function getModel()
    { 
        return new CargaLectiva;
    }
   
    public function search($q)
    {
        $categories =CargaLectiva::join('curso','curso.id','=','cargaLectiva.curso_id')
                    ->leftjoin('docente','docente.id','=','cargaLectiva.docente_id')
                    ->select('cargaLectiva.*','curso.planEstudiantil_id','curso.ciclo','curso.nombre','curso.codigo','curso.creditos','curso.horasTeoricas','curso.horasPracticas','curso.escuela_id','docente.nombres','docente.apellidos')
                    ->where('curso_id','=', $q)
                    ->paginate(10000);
        return $categories;
    }
    public function searchCarga($a,$b,$c)
    { 
        $categories =CargaLectiva::join('curso','curso.id','=','cargaLectiva.curso_id')
                    ->select('cargaLectiva.*','curso.planEstudiantil_id','curso.ciclo','curso.nombre','curso.codigo','curso.creditos','curso.horasTeoricas','curso.horasPracticas','curso.escuela_id')
                    ->where('ciclo','=', $a)
                    ->where('planEstudiantil_id','=', $b)
                    ->where('escuela_id','=', auth()->user()->escuela_id)
                    ->groupby('cargaLectiva.curso_id')->paginate(10000);
        return $categories;

            
    }
} 