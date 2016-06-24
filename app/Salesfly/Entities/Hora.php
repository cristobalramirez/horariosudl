<?php
namespace Salesfly\Salesfly\Entities;

class Hora extends \Eloquent {

	protected $table = 'hora';
    
    protected $fillable = ['hora','horaFin',
							'orden'];

}