<?php
namespace Salesfly\Salesfly\Repositories;
use Salesfly\Salesfly\Entities\Hora;

class HoraRepo extends BaseRepo{
    
    public function getModel()
    { 
        return new Hora;
    }

    public function search($q)
    {
        $Horas =Hora::join('disponibilidadDocente','disponibilidadDocente.horaInicio_id','=','hora.id')        ->select('hora.*','disponibilidadDocente.*')
                    ->where('docente_id','=', $q)
                    //->orwhere('disponibilidadDocente.id','=', 'null')
                    ->orderBy('orden', 'asc')
                    ->paginate(10000);
        return $Horas;  
    }
    public function searchHora($a,$b,$c)
    { 
        $Horas =Hora::join('disponibilidadDocente','disponibilidadDocente.horaInicio_id','=','hora.id')        ->select('hora.*','disponibilidadDocente.*')
                    ->where('docente_id','=', $a)
                    ->where('semestre_id','=', $b)
                    //->orwhere('disponibilidadDocente.id','=', 'null')
                    ->orderBy('orden', 'asc')
                    ->paginate(10000);
        return $Horas;                    
    }
} 