<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialesPedidos extends Model
{
    protected $table='materiales_pedidos';

    protected $fillable=['id_ordenp','id_material','cantidad'];

    public function ordenpedido()
    {
    	return $this->belongsTo('App\OrdenPedido','id_ordenp');
    }

    public function materiales()
    {
    	return $this->belongsTo('App\Materiales','id_material');
    }
}
