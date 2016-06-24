<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\Curso;

class CursoRepo extends BaseRepo{
    
    public function getModel()
    { 
        return new Curso;
    }

    public function search($q)
    {
        $categories =Curso::where('ciclo','=', $q)
                    ->paginate(10000);
        return $categories;
    }
    public function searchCurso($a,$b,$c)
    { 
        $categories =Curso::leftjoin('cargaLectiva','cargaLectiva.curso_id','=','curso.id')
                    ->select('curso.*','cargaLectiva.id as idCarga','cargaLectiva.grupo as grupo','cargaLectiva.semestre_id')
                    ->where('ciclo','=', $a)
                    ->where('planEstudiantil_id','=', $b)
                    //->where('semestre_id','=', $c)
                    ->where('escuela_id','=', auth()->user()->escuela_id)
                    ->paginate(10000);
        return $categories;   
            
    }
    public function searchCursoAll($a,$b,$c)
    { 
        $categories =Curso:://leftjoin('cargaLectiva','cargaLectiva.curso_id','=','curso.id')
                    //->select('curso.*','cargaLectiva.id as idCarga','cargaLectiva.grupo as grupo','cargaLectiva.semestre_id')
                    //->
                    where('ciclo','=', $a)
                    ->where('planEstudiantil_id','=', $b)
                    //->where('semestre_id','=', $c)
                    ->where('escuela_id','=', auth()->user()->escuela_id)
                    ->paginate(10000);
        return $categories;   
            
    }
} 