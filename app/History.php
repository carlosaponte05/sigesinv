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

    public function logsRead($user, $modulo, $log)
    {
    	$logs = new Binnacle();
    	$logs->id_usuario = $user;
    	$logs->operacion = 'Operación de registro en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs->save();
    }

    public function logsUpdate($user, $modulo, $log)
    {
    	$logs = new Binnacle();
    	$logs->id_usuario = $user;
    	$logs->operacion = 'Operación de registro en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs->save();
    }

    public function logsDelete($user, $modulo, $log)
    {
    	$logs = new Binnacle();
    	$logs->id_usuario = $user;
    	$logs->operacion = 'Operación de registro en el modulo de '.$modulo.' modo ('.$log.').';
    	$logs->save();
    }
}
