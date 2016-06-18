<?php
namespace Salesfly\Salesfly\Entities;

class Docente extends \Eloquent {

	protected $table = 'docente';
    
    protected $fillable = ['nombres','apellidos','dni','fechanacimiento','fechaAlta','fechabaja','direccion','ubigeo_id','escuela_id'];

}