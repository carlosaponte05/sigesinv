@extends('admin.layouts.master')

@section('title')
<title>Admin | Escritorio</title>
@endsection

{{-- @section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
<script src="{{ asset('js/select2.min.js') }}"></script>
@endsection --}}

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 {{--  <section class="content-header">
    <h1>
     Aquí haces click.<small>para agregar roles  permisos personalizados.</small>
   </h1> --}}
   {{--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agregar nuevo usuario</li>
    </ol> 
  </section> --}}

  <!-- Main content -->
  <section class="content">
   <div class="row">
     <div class="col-lg-12">
      <div class="box box-info">
        <div class="box-header with-border" >
          <h3 class="box-title">
          Crear un Nuevo usuario!
            <small> con un nombre de usuario genial, un correo electrónico único y una contraseña segura para ello.</small>
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="row">
           <div class="col-lg-12">
            <form role="form" action="{{ url('admin/user/') }}" class="form-horizontal" method="POST">

              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('Username') ? ' has-error' : '' }}">
                <label for="Username" class="control-label col-sm-2">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Nombre de Usuario" name="Username" value="{{ old('Username') }}" id="Username" required>
                  @if ($errors->has('Username'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Username') }}</strong>
                  </span>
                  @endif 
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="Lastname" class="control-label col-sm-2">Apellido</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Apellido de Usuario" name="Username" value="{{ old('Lastname') }}" id="Lastname" >
                  @if ($errors->has('Lastname'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Lastname') }}</strong>
                  </span>
                  @endif 
                </div>
              </div>
              <hr>

              <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="Email">Correo</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="example@mail.com" name="Email" value="{{ old('Email') }}" id="Email" required>
                  @if ($errors->has('Email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Email') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <hr>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="password">Contraseña</label>
                <div class="col-sm-10">
                  <input name="password" type="password" class="form-control" placeholder="Contraseña">
                  @if($errors->has("password"))
                  <span class="text-danger">{{ $errors->first("password")}}</span>  
                  @endif
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="password_confirmation">Confirmar Contraseña</label>
                <div class="col-sm-10">
                  <input name="password_confirmation" type="password" class="form-control" placeholder="Repetir Contraseña">
                 @if($errors->has("password_confirmation"))
                 <span class="text-danger">{{ $errors->first("password_confirmation")}}</span>  
                 @endif
                </div>
              </div>

              <hr>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="secret_question">Pregunta Secreta</label>
                <div class="col-sm-10">
                  <input name="secret_question" type="text" class="form-control" placeholder="Pregunta Secreta">
                  @if($errors->has("secret_question"))
                  <span class="text-danger">{{ $errors->first("secret_question")}}</span>  
                  @endif
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="secret_answer">Respuesta Secreta</label>
                <div class="col-sm-10">
                  <input name="secret_answer" type="password" class="form-control" placeholder="Respuesta Secreta">
                  @if($errors->has("secret_answer"))
                  <span class="text-danger">{{ $errors->first("secret_answer")}}</span>  
                  @endif
                </div>
              </div>
              <hr>



              <div class="form-group">
               <label for="Roles" class="col-sm-2 control-label">Dar Roles</label>
               <div class="col-sm-10">
                @foreach ($roles as $role)
                  @php
                    $checked = ( ($role->is_default) ? 'checked' : '' );
                  @endphp
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="Roles[]" value="{{$role->slug}}" {{$checked}}>{{$role->name}}
                  </label>
                </div>
                @endforeach
                  {{-- @if ($errors->has('Roles'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Roles') }}</strong>
                  </span>
                  @endif --}}
                </div>
              </div>

              <hr>
              
              <div class="form-group">
                 <label for="activate" class="col-sm-2 control-label"></label>
                 <div class="col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="activate" value="activate"> Activar este Usuario
                    </label>
                  </div>
                </div>
              </div>

              <div class="box-footer">
                <div class="col-sm-offset-2">
                  <button type="submit" class="btn btn-flat btn-primary">Registrar</button>`
                </div>
              </div>   

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- content -->
</div>
<!-- content-wrapper -->
@endsection
