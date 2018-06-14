<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

class LoginController extends Controller
{

    public function getLogin(){
        return view('admin.user.login');
    }

    public function postLogin(Request $request){

        $this->validate($request, [
            'Email' => 'required',
            'password'  => 'required|min:4'
            ]);
        
            $ver = substr_count($request->input('Email'),"@");
            if($ver==0){

              $buscar=\DB::table('users')->where('first_name',$request->input('Email'))->first();
              //dd($buscar);
              if (count($buscar)>0) {
                $email=$buscar->email;
              } else {
                
                Alert::error('Error al iniciar sesión!', 'Login')->persistent("Reintentar");
                   return redirect()->to("admin/login");
              }
              
              
            }else{
              $email=$request->input('Email');
            }
        $credentials = [
        'email'    => $email,
        'password' => $request->input("password"),
        ];

        $remember = $request->input("cbRemember");

    try {
           if (empty($remember)) {
               $user = \Sentinel::authenticate($credentials);
               //dd($user);
               
               if(!$user) {
                   Alert::error('Error al iniciar sesión!', 'Login')->persistent("Reintentar");
                   return redirect()->to("admin/login");
               } 

           } else {

            //dd($user);
                $user = \Sentinel::findByCredentials($credentials);
                $login = \Sentinel::loginAndRemember($user);
                if(!$user) {
                   Alert::error('Error al iniciar sesión!', 'Login')->persistent("Reintentar");
                   return redirect()->to("admin/login");
                } 

           }
           

        } catch(NotActivatedException $e) {

            Alert::error('Tu cuenta no ha sido activada', 'Activation')->persistent("Cerrar esto");
            return redirect()->to("admin/login");

        }
        //dd("------");
        return redirect()->to('admin/index');

    }

    public function logout(){
        \Sentinel::logout();
        return redirect()->to("/");
    }

    public function index()
    {
      $user=\Sentinel::getUser();
      $roles=$user->getRoles('user.view');
      //dd($roles);
      
      //dd("----------");
      return view('admin.template');
    }
    
}
