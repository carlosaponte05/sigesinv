@extends('admin.layouts.master')

@section('title')
<title>Admin | Escritorio</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 {{--  <section class="content-header">
    <h1>
     Aquí es donde hizo Click.<small>Cree una nueva función personalizada y establezca permisos para ella.</small>
    </h1> --}}
   {{--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agregar un nuevo usuario</li>
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
              action="{{ url('admin/role/'. $role->id) }}">
                <input type="hidden" name="_method" value="delete">
                  {{ csrf_field() }}
              {{-- <button class="btn btn-danger btnDelete btn-sm">
                 Delete <i class="fa fa-remove"></i>
                </button> --}}
              </form>
              {{-- <a class="btn btn-box-tool" title="Click para eliminar" href="/admin/role/{{$role->id}}/edit">
                Eliminar
              </a> --}}
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
             <div class="row">
               <div class="col-lg-12">
                <form role="form" action="{{ url('admin/role/'.$role->id) }}" method="POST">

                  <input type="hidden" name="_method" value="patch">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('RoleName') ? ' has-error' : '' }} row">
                    <div class="col-md-6">
                      <label class="control-label">Nombre del Rol</label>
                      <input type="text" class="form-control" placeholder="Nombre del rol" name="RoleName" value="{{ $role->name }}" required>
                      @if ($errors->has('RoleName'))
                        <span class="help-block">
                          <strong>{{ $errors->first('RoleName') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <hr>

                  <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }} row">
                    <div class="col-md-12">
                      <label class="control-label">Descripción</label>
                      <textarea maxlength="200" rows="2" class="form-control" id="Description" name="Descripción" placeholder="Ingrese alguna información" value="{{ old('Description') }}" required>{{$role->description}}</textarea>
                      @if ($errors->has('Description'))
                        <span class="help-block">
                          <strong>{{ $errors->first('Description') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <hr>

                  <div class="form-group row">
                   <div class="col-md-12">
                     <label class="control-label">Permisos</label>
                     <div class="container mg-top-10">
                       {{editPermissions($role->permissions, 'user')}}
                       {{-- {{editPermissions($role->permissions, 'post')}} --}}
                     </div>
                   </div>
                  </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-flat btn-primary">Guardar Cambios</button>
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
<script src="{{ asset('AdminLTE-2.3.11/plugins/iCheck/icheck.min.js') }}"></script>
 <script>
  // $(function () {
  //     //$(".textarea").wysihtml5();
  //    $('input').iCheck({
  //      checkboxClass: 'icheckbox_square-blue',
  //      radioClass: 'iradio_square-blue',
  //      increaseArea: '20%' // optional
  //    });
  // });
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