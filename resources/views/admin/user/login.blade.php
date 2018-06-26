@extends('admin.layouts.login')

@section('content')
  <div class="login-box">
    <div class="login-logo">
      <a href="AdminLTE-2.3.11/index2.html"><b>SIGES</b>INV</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
    
      <p class="login-box-msg">Accede para iniciar sesión</p>

      <form action="{{ url('admin/login') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group has-feedback">
        <input name="Email" type="text" class="form-control" placeholder="Correo/Nombre de Usuario" value="{{ old('Email') }}">
        @if($errors->has("Email"))
        <span class="text-danger">{{ $errors->first("Email")}}</span>  
         @endif
         <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
       </div>
       <div class="form-group has-feedback">
         <input name="password" type="password" class="form-control" placeholder="Contraseña">
         @if($errors->has("password"))
         <span class="text-danger">{{ $errors->first("password")}}</span>  
         @endif
         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
       </div>
       <div class="row">
         <div class="col-xs-8">
           <div class="checkbox">
             <label>
               <input name="cbRemember" type="checkbox"> Recordarme
             </label>
           </div>
         </div>
         <!-- /.col -->
         <div class="col-xs-4">
           <button type="submit" class="btn btn-primary btn-block btn-flat">Accede</button>
         </div>
         <!-- /.col -->
       </div>
     </form>
<!-- 
      <div class="social-auth-links text-center">
      <p>- O -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Accede usando
        Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Accede usando
          Google+</a>
      </div> --> 
        <!-- /.social-auth-links -->

        <a href="{{ url('user/confirm_email') }}">Olvidé mi clave</a><br>
        <a href="{{ url('user/register') }}" class="text-center">Registrar nuevo usuario</a>

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection

