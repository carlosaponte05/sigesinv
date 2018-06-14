<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\User;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'UserName'  => 'required|min:4',
            'Email'     => 'required|email',
            'password'  => 'required|min:4|confirmed',
            'password_confirmation' => 'same:password',
            'secret_question' => 'required',
            'secret_answer' => 'required'
            ]);

        $credentials = [
        'first_name'    => $request->input("UserName"),
        'email'         => $request->input("Email"),
        'password'      => $request->input("password")
        ];
        //dd($credentials);
        $user = \Sentinel::register($credentials);

        $activation = \Activation::create($user);
        $user2 = \Sentinel::findUserById($user->id);
        $user2->secret_question=$request->input("secret_question");
        $user2->secret_answer=$request->input("secret_answer");
        $user2->save();
        Alert::success('Cuenta creada ahora necesita ser activada!', 'Inicio')->persistent("éxito");
        return redirect()->to("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirm_email()
    {
        return view('user.confirm_email');
    }
    public function forgot_password(Request $request)
    {
        
        $user=User::where('email',$request->Email)->first();
        
        $pregunta=$user->secret_question;
        $user_id=$user->id;
        return view('user.forgot',compact('pregunta','user_id'));
    }

    public function confirmar(Request $request)
    {
        $user=User::find($request->user_id);
        if($user->secret_answer==$request->secret_answer){
            //generando clave aleatoria
             $key = '';
             $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
             $max = strlen($pattern)-1;
             for($i=0;$i < 10;$i++) $key .= $pattern{mt_rand(0,$max)};
             
        $user2 = \Sentinel::findUserById($request->user_id);
        // dd($user2);
        $clave_nueva=$key;
        $credentials=[
            'password' => $clave_nueva
        ];
        $user2 = \Sentinel::update($user2, $credentials);
        //-----registrando en el historial----
        $this->logsOther($user2->id, "Usuarios","Cambio de contraseña", "Satisfactoria");
        //-------------------------
            Alert::success('Contraseña Cambiada', $clave_nueva)->persistent("Éxito");
        return redirect()->to("/");
        }else{
            //-----registrando en el historial----
        $this->logsOther($user->id, "Usuarios","Cambio de contraseña", "error");
        //-------------------------
            Alert::success('Respuesta secreta incorrecta', 'verifique la pregunta secreta')->persistent("Error");        }
    }
}
