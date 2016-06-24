<?php
namespace Salesfly\Salesfly\Entities;

class Horario extends \Eloquent {

	protected $table = 'horario';
    
    protected $fillable = ['dia','cargaLectiva_id','ambiente_id','semestre_id'];

}