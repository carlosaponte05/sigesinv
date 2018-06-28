@extends('admin.layouts.master')

@section('title')
<title>Admin | Escritorio</title>
@endsection

@section('css')
<style>
  .form-group{
    margin-bottom: 30px;
  }
</style>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 {{--  <section class="content-header">
    <h1>
     Aquí haces click.<small>para agregar roles  permisos personalizados.</small></small>
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
           Aquí, puedes obtener toda la información de {{$user->first_name}}.
           <small>No tengas miedo de editar haciendo clic en el botón Editar a la derecha! <i class="fa fa-hand-o-right"></i></small>
         </h3>
          @if ($user->hasAccess(['user.update']))
            <div class="box-tools pull-right">
              <a class="btn btn-box-tool btn-flat" title="Click para actualizar" href="/admin/user/{{$user->id}}/edit">
                <i class="fa fa-edit text-primary" ></i>
              </a>
            </div>
          @endif
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col-lg-12">
          <div class="well form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2">Nombre de Usuario</label>
              <div class="col-sm-10">
                <strong class="form-control no-border">{{$user->first_name}}</strong>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Correo</label>
              <div class="col-sm-10">
                <strong class="form-control no-border">{{$user->email}}</strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Roles</label>
              <div class="col-sm-10">
                <h3 class="form-control no-border no-margin">
                  @foreach ($roles as $role)
                   @if ($user->inRole($role->slug)) 
                  <span class="label label-info">{{$role->name}}</span>
                  @endif 
                  @endforeach
                </h3>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Último acceso</label>
              <div class="col-sm-10">
                <strong class="form-control no-border">{{ date('d-m-Y', strtotime($user->last_login)) }}</strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Miembro desde</label>
              <div class="col-sm-10">
                <strong class="form-control no-border">{{ date('d-m-Y', strtotime($user->created_at)) }}</strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Última actulización </label>
            <div class="col-sm-10">
                <strong class="form-control no-border">{{ date('d-m-Y', strtotime($user->updated_at)) }}</strong>
              </div>
            </div>
          </div>
        </div>
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

@endsection