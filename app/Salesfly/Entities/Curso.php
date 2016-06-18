<?php
namespace Salesfly\Salesfly\Entities;

class Curso extends \Eloquent {

	protected $table = 'curso';
    
    protected $fillable = ['nombre',
							'creditos',
							'horasTeoricas',
							'horasPracticas',
							'ciclo',
							'escuela_id',
							'planEstudiantil_id'];

}