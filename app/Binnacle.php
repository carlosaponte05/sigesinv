<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    protected $table='binnacle';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
    	'id','id_usuario','operacion'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','id_usuario');
    }

    

    
}
