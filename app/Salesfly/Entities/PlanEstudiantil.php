<?php
namespace Salesfly\Salesfly\Entities;

class PlanEstudiantil extends \Eloquent {

	protected $table = 'planestudiantil';
    
    protected $fillable = ['semestreInicio_id','semestreFin_id'];

    public function semestre()
    {
        return $this->belongsTo('\Salesfly\Salesfly\Entities\Semestre');
    }

}