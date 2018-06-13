<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
	public function __construct(){
		// $this->middleware['isGod'];
	}


    public function index(){
    	$user = \Sentinel::check();

    	$roles = ( (isGod($user->id)) ? \Sentinel::getRoles()->sortBy('name') : null );

    	return view('admin.setting.general', compact('user', 'roles'));
    }


    public function save(Request $request){
    	$roles = $request->input('Roles');

    	saveDefaultRoles($roles);
    	return redirect()->back()->with('success', 'Saved Changes!');
    }

    public function validar(Request $request)
    {
        dd($request->all());
        //url('/admin/user/'.$user->id.'/edit')
    }
}
