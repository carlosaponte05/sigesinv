<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table='proveedores';

    protected $fillable=['razon_social','rif','telefono'];

    public function ordencompra()
    {
    	return $this->hasMany('App\OrdenCompra','id_proveedor','id');
    }

    
}
