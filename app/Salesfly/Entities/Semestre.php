<?php
namespace Salesfly\Salesfly\Entities;

class Semestre extends \Eloquent {

	protected $table = 'semestre';
    
    protected $fillable = ['codigo','fechainicio','fechafin','estado'];

}