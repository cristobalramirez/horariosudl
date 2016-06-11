<?php
namespace Salesfly\Salesfly\Entities;

class Product extends \Eloquent {

	protected $table = 'products';
    
    protected $fillable = ['nombre',
    						'codigo',
    						'marca',
    						'modelo',
    						'descripcion',
    						'estado',
    						'image',
    						'stock',
    						'stockAlmacen',
    						'stockTecnico',
    						'category_id'
                        ];
    public function category()
    {
        return $this->belongsTo('\Salesfly\Salesfly\Entities\Category');
    }
}