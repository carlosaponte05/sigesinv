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
     Aquí es donde haces click.<small>Cree una nueva función personalizada y establezca permisos para ella.</small>
   </h1> --}}
   {{--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agregar nuevos usuarios</li>
    </ol> 
  </section> --}}

  <!-- Main content -->
  <section class="content">
   <div class="row">
     <div class="col-lg-12">
      <div class="box box-info">
        <div class="box-header with-border" >
          <h3 class="box-title">Actualizar</h3>
          <div class="box-tools pull-right">
            <form class="form frmDelete" id="Form" role="form" method="POST" 
            action="{{ url('admin/user/'. $user->id) }}">
            <input type="hidden" name="_method" value="delete">
            {{ csrf_field() }}
            <button class="btn btn-danger btnDelete btn-sm">
             Eliminar <i class="fa fa-remove"></i>
           </button>
         </form>
              {{-- <a class="btn btn-box-tool" title="Click to Edit" href="/admin/role/{{$role->id}}/edit">
                Eliminar
              </a> --}}
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div class="row">
             <div class="col-lg-12">
              <form role="form" action="{{ url('admin/user/'.$user->id) }}" class="form-horizontal" method="POST">

                <input type="hidden" name="_method" value="patch">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('Username') ? ' has-error' : '' }}">
                  <label for="Username" class="control-label col-sm-2">Nombre de Usuario</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Nombre de usuario" name="Username" value="{{ $user->first_name }}" id="Username" required>
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
                  <input type="text" class="form-control" placeholder="Apellido de Usuario" name="Lastname" value="{{ $user->last_name }}" id="Lastname" >
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
                    <input type="text" class="form-control" placeholder="example@mail.com" name="Email" value="{{ $user->email }}" id="Email" required>
                    @if ($errors->has('Email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('Email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <hr>
                <div class="form-group{{ $errors->has('Secret_question') ? ' has-error' : '' }}">

                  <label class="control-label col-sm-2" for="Secret_question">Pregunta Secreta</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nombre de mi perro" name="Secret_question" value="{{ $user->secret_question }}"  id="Secret_question" required>
                    @if ($errors->has('Secret_question'))
                    <span class="help-block">
                      <strong>{{ $errors->first('Secret_question') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <hr>
                <div class="form-group{{ $errors->has('Secret_answer') ? ' has-error' : '' }}">

                  <label class="control-label col-sm-2" for="Secret_answer">Respuesta Secreta</label>
                  <div class="col-sm-10">
                  <input type="checkbox" name="cambiar" id="cambiar" value="cambiar"><strong> Cambiar</strong>
                    <input type="password" class="form-control" placeholder="Ingrese la respuesta secreta" name="Secret_answer"  disabled="disabled" id="Secret_answer" required>
                    @if ($errors->has('Secret_answer'))
                    <span class="help-block">
                      <strong>{{ $errors->first('Secret_answer') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <hr>
                <div class="form-group{{ $errors->has('Secret_answer') ? ' has-error' : '' }}">

                  <label class="control-label col-sm-2" for="password">Contraseña</label>
                  <div class="col-sm-10">
                  <input type="checkbox" name="cambiar_password" id="cambiar_password" value="cambiar_password"><strong> Cambiar</strong>
                    <input type="password" class="form-control" placeholder="Ingrese la nueva contraña" name="Cambiar_password"  disabled="disabled" id="Cambiar_password" required>
                    @if ($errors->has('Cambiar_password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('Cambiar_password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <hr>

                <div class="form-group">
                 <label for="Roles" class="col-sm-2 control-label">Roles</label>
                 <div class="col-sm-10">
                    @foreach ($roles as $role)
                      {{-- {{dd($user->inRole($role->slug))}} --}}
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="Roles[]" value="{{$role->slug}}" {{ ($user->inRole($role->slug)) ? 'checked' : '' }}>{{$role->name}}
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
                  <label class="control-label col-sm-2" for="Email">Último acceso</label>
                  <div class="col-sm-10">
                    <strong class="form-control no-border">{{ date('d-m-Y', strtotime($user->last_login)) }}</strong>
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="Email">Miembro desde</label>
                  <div class="col-sm-10">
                    <strong class="form-control no-border">{{ date('d-m-Y', strtotime($user->created_at)) }}</strong>
                  </div>
                </div>

                <hr>

                <div class="form-group">
                  <label class="control-label col-sm-2" for="Email">Última actualización</label>
                  <div class="col-sm-10">
                    <strong class="form-control no-border">{{ date('d-m-Y', strtotime($user->updated_at)) }}</strong>
                  </div>
                </div>

                <div class="form-group">
                 <label for="activate" class="col-sm-2 control-label"></label>
                 <div class="col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="activate" value="activate"
                        @if($activado==1) checked="checked" @endif 
                      > Activar este Usuario
                    </label>
                  </div>
                </div>
              </div>
               <div class="box-footer">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-flat btn-primary">Guardar cambios</button>
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
@section('script')
<script>
  $('#cambiar').on('change',function () {
    if ($('#cambiar').prop('checked')) {
      
      $('#Secret_answer').attr('disabled',false);
    }else{
      $('#Secret_answer').attr('disabled',true);
    }
  });
  $('#cambiar_password').on('change',function () {
    if ($('#cambiar_password').prop('checked')) {
      
      $('#Cambiar_password').attr('disabled',false);
    }else{
      $('#Cambiar_password').attr('disabled',true);
    }
  });
  $('button.btnDelete').on('click', function(e){
    e.preventDefault();
    // "Bubbling from parent onclick event" Start Here!
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
    // "Bubbling from parent onclick event" End Here! 
    var self = $(this);
    swal({
      title             : "Estas seguro que quieres borrarlo?",
      text              : "No podrá recuperar este usuario y los datos relacionados!",
      type              : "warning",
      showCancelButton  : true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText : "Sí, Elimínalo!",
      cancelButtonText  : "No, Cancelar Eliminación!",
      closeOnConfirm    : false,
      closeOnCancel     : false
    },
    function(isConfirm){
      if(isConfirm){
        swal("Eliminado!","El usuario ha sido Eliminado", "success");
        setTimeout(function() {
          self.parents(".frmDelete").submit();
          }, 1000); //1 second delay (1000 milliseconds = 1 seconds)
      }
      else{
        swal("Cancelado!","Usuario seguro", "error");
      }
    });
  });
</script>
@endsection