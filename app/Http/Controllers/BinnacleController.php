<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BinnacleController extends Controller
{
	

    public function index()
    {
    	$user = \Sentinel::getUser();

    	
        $binnacles = \DB::table('binnacle')->get();

        $row_number=1;
        //dd($binnacles);
        return view('admin.binnacle.index', compact('binnacles','row_number'));
    }

    
}