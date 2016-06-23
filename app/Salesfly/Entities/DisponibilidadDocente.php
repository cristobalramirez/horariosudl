<?php
namespace Salesfly\Salesfly\Entities;

class DisponibilidadDocente extends \Eloquent {

	protected $table = 'disponibilidadDocente';
    
    protected $fillable = ['dia','horaInicio_id','docente_id','semestre_id'];

}