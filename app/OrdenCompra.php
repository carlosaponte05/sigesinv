<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    protected $table='orden_compra';

    protected $fillable=['fecha','id_proveedor','codigo','estado'];

    public function proveedores()
    {
    	return $this->belongsTo('App\Proveedores','id_proveedor');
    }

    public function materialescompra()
    {
    	return $this->hasMany('App\MaterialesCompra','id_ordenc','id');
    }
    
}
