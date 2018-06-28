<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPedido extends Model
{
    protected $table='orden_pedido';

    protected $fillable=['fecha','codigo','estado'];


    public function materialespedido()
    {
    	return $this->hasMany('App\MaterialesPedidos','id_ordenp','id');
    }
}
