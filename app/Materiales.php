<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
    protected $table='materiales';

    protected $fillable=['nombre','caracteristica','existencia','unidad','precio_ind','precio_und','stock_min','stock_max'];

	public function ordencompra()
	    {
	    	return $this->hasMany('App\MaterialesCompra','id_material','id');
	    }    
}
