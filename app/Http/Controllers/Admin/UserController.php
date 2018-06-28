<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use DB;
use App\Mail\UserActivation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Alert;
use App\User;
use App\Binnacle;
class UserController extends Controller 
{
    public function __construct(){
        $this->middleware('sentinelauth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bin=new Binnacle();
        $users = \Sentinel::getUserRepository()->get()->sortBy('first_name');
        $roles = \Sentinel::getRoleRepository()->get()->sortBy('name');
        // dd($roles->last()->name);
        $current_user = \Sentinel::check();
        $user=\Sentinel::getUser();
        //-----registrando en el historial----
        $this->logsShow($user->id, "Usuarios", "Satisfactoria");
        //-------------------------
        
        $row_number = 1;
        return view('admin.user.index',compact('users', 'row_number', 'roles', 'current_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$roles = \Sentinel::getRoles()->sortBy('name')->all();
        $roles = \DB::table('roles')->get();
        //dd(count($roles));
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Username' => 'required | min:4',
            'Email' => 'required | email',
            'password'  => 'required|min:4|confirmed',
            'password_confirmation' => 'same:password',
            'Roles' => 'required',
            'secret_question' => 'required',
            'secret_answer' => 'required',
            ]);

        

        $Roles = $request->input("Roles");
        /*$role = \Sentinel::findRoleById($request->Roles);
        dd($role);*/
        $credentials = [
           'first_name'    => $request->input("Username"),
           'email'         => $request->input("Email"),
           'password'      => $request->input("password"),
           'last_name'     => $request->input("last_name"),
           'secret_question' => $request->input("secret_question"),
           'secret_answer' => $request->input("secret_answer"),
       ];

        if($request->input('activate') == 'activate'){
            $user = \Sentinel::registerAndActivate($credentials);
            setUserRoles($user, $Roles);
            //$role->users()->attach($user);

            return redirect()->back()->with('success', 'Nuevo usuario registrado y activado!');

        }else{
            $user = \Sentinel::register($credentials);
            $activation = \Activation::create($user);

            setUserRoles($user, $Roles);
            //$role->users()->attach($user);
            return redirect()->back()->with('success', 'Nuevo usuario registrado!');
        }
       // $user = \Sentinel::register($credentials);
       // $activation = \Activation::create($user);

       //Mail::to($user->email, $user->first_name)->send(new UserActivation($activation->code));
        //-----registrando en el historial----
        $this->logsCreate($user->id, "Usuarios", "Registro");
        //-------------------------
       return redirect()->back()->with('success', 'Registered! Please check email for activation.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Sentinel::getUserRepository()->findById($id);
        $roles = \Sentinel::getRoleRepository($user)->get()->sortBy('name');
        //$roles = \DB::table('role_users','roles')->where('role_users.user_id',$id)->where('roles.id','role_users.role_id')->get();
        //dd($roles);
        //-----registrando en el historial----
        $this->logsShow($user->id, "Usuarios", "Satisfactoria");
        //-------------------------
        return view('admin.user.show', compact('user', 'roles'));
    }

    public function profile($id)
    {
        $user = \Sentinel::getUserRepository()->findById($id);
        $roles = \Sentinel::getRoleRepository($user)->get()->sortBy('name');
        //$roles = \DB::table('role_users','roles')->where('role_users.user_id',$id)->where('roles.id','role_users.role_id')->get();
        //dd($roles);
        //-----registrando en el historial----
        $this->logsShow($user->id, "Usuarios(Perfil)", "Satisfactoria");
        //-------------------------
        return view('admin.user.profile', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Sentinel::findUserById($id);
        $roles = \Sentinel::getRoleRepository($user)->get();
        $activations = \DB::table('activations')->where('user_id',$id)->where('completed',1)->first();
        if(count($activations)>0){
        $activado=$activations->completed;
    }else{
        $activado=0;
        }
        return view('admin.user.edit', compact('user', 'roles','activado'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'Username' => 'required | min:4',
            'Email' => 'required | email',
            'Roles' => 'required'
            ]);
        //verificando que se quiere cambiar la respuesta secreta
        if ($request->cambiar=="cambiar") {
                $this->validate($request, [
            'Secret_answer' => 'required | min:6'
            ]);
                $nueva_clave=$request->Secret_answer;
            } 
        
        /* u_name mean updated/new value to replace as the old. */
        if ($request->last_name=="") {
            $last_name="";
        } else {
            $last_name=$request->last_name;
        }
        

        $Roles = $request->input("Roles");
        $user = \Sentinel::findUserById($id);

        if($user->email == $request->input("Email")){
           $credentials = [
               'first_name' => $request->input("Username"),
               'last_name' => $last_name,
           ];
        }else{
            $credentials = [
               'first_name' => $request->input("Username"),
               'email' => $request->input('Email'),
               'last_name' => $last_name,
           ];
        }
        if ($request->activate=="activate") {
          
        } 
        $user = \Sentinel::update($user, $credentials);
        //verificando que se quiere cambiar la respuesta secreta
        if ($request->cambiar=="cambiar") {
                $this->validate($request, [
            'Secret_answer' => 'required | min:6'
            ]);

                $user2 = User::find($id);
                $nueva_respuesta=$request->Secret_answer;
                $user2->secret_answer=$nueva_respuesta;
                $user2->save();
            }
            //verificando que se quiere cambiar la clave
        if ($request->cambiar_password=="cambiar_password") {
                $this->validate($request, [
            'Cambiar_password' => 'required | min:6'
            ]);

                $user2 = User::find($id);
                $nueva_clave=bcrypt($request->Cambiar_password);
                $user2->password=$nueva_clave;
                $user2->save();
            }

        updateUserRoles($user, $Roles);
        if($request->input('activate') == 'activate')
        {

        $activations=\DB::table('activations')->where('user_id',$id)->first();
        \Activation::complete($user, $activations->code);    
        //-----registrando en el historial----
        $this->logsUpdate($user->id, "Usuarios", "Satisfactoria");
        //-------------------------
        return redirect()->to('admin/user/'.$id.'/show')->with('success', 'Usuario Actualizado y Cuenta Activa!');
        }else{
            //-----registrando en el historial----
        $this->logsUpdate($user->id, "Usuarios", "Satisfactoria");
        //-------------------------
            return redirect()->to('admin/user/'.$id.'/show')->with('success', 'Usuario Actualizado!');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \Sentinel::findUserById($id);

        $user->delete();
        //-----registrando en el historial----
        $this->logsDelete($user->id, "Usuarios", "Satisfactoria");
        //-------------------------
         return redirect()->back();
    }

    

    
}
