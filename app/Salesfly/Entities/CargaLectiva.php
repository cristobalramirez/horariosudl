<?php
namespace Salesfly\Salesfly\Entities;

class CargaLectiva extends \Eloquent {

	protected $table = 'cargaLectiva';
    
    protected $fillable = ['grupo','docente_id','curso_id','semestre_id'];

}