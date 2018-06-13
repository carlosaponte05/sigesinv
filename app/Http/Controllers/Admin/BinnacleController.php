<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Binnacle;
class BinnacleController extends Controller
{
	public function __construct(){
        $this->middleware('sentinelauth');
    }

    public function index()
    {
    	$user = \Sentinel::getUser();

    	$this->logsCreate($user->id, 'Historial', 'Revisión de Historial');
        $binnacles = \DB::table('binnacle')->get();

        $row_number=1;
        //dd($binnacles);
        return view('admin.binnacle.index', compact('binnacles','row_number'));
    }

    
}