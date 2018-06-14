<?php

namespace App\Http\Controllers;

use App\Binnacle;

trait History
{
    public function logsCreate($user, $modulo, $log)
    {
    	$logs = new Binnacle();
    	$logs->id_usuario = $user;
    	$logs->operacion = 'Operación de registro en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs->save();
    }

	public function logsOther($user, $modulo,$activity, $log)
    {
    	$logs = new Binnacle();
    	$logs->id_usuario = $user;
    	$logs->operacion = 'Operación de '.$activity.' en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs->save();
    }
    public function logsShow($user, $modulo, $log)
    {
    	//dd("jsajsja");
    	$operacion = 'Operación de Revisión en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs =Binnacle::create(['id_usuario' => $user,
    							'operacion' => $operacion]);
    	
    }

    public function logsUpdate($user, $modulo, $log)
    {
    	$logs = new Binnacle();
    	$logs->id_usuario = $user;
    	$logs->operacion = 'Operación de actualización en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs->save();
    }

    public function logsDelete($user, $modulo, $log)
    {
    	$logs = new Binnacle();
    	$logs->id_usuario = $user;
    	$logs->operacion = 'Operación de eliminación en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs->save();
    }
}
