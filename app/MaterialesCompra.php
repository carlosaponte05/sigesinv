<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialesCompra extends Model
{
    protected $table='materiales_compra';

    protected $fillable=['id_ordenc','id_material','cantidad'];

    public function ordencompra()
    {
    	return $this->belongsTo('App\OrdenCompra','id_ordenc');
    }

    public function materiales()
    {
    	return $this->belongsTo('App\Materiales','id_material');
    }
}
