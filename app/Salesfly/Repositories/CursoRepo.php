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
        $categories =Curso::where('ciclo','=', $a)
                    ->where('planEstudiantil_id','=', $b)
                    ->where('escuela_id','=', auth()->user()->escuela_id)
                    ->paginate(10000);
        return $categories;
        /*if($c==0){
            $c='%%';
        }
        if($b!=0 && $a!=0){
            $CashMonthlys =CashMonthly::with('expenseMonthly')
                    ->whereBetween('fecha', [$a,$b])
                    ->where('expenseMonthlys_id','like',$c)  
                    ->paginate(15); 
            return $CashMonthlys;
        }else{
            $CashMonthlys =CashMonthly::with('expenseMonthly')
                    ->where('expenseMonthlys_id','like',$c)  
                    ->paginate(15); 
            return $CashMonthlys;        
        }*/
        
            
    }
} 