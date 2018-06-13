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


  <!-- Main content -->
  <section class="content">
   <div class="row">
     <div class="col-lg-12">
      <div class="box box-info">
        <div class="box-header with-border" >
         <h3 class="box-title">
           Mi Perfil.
           
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
              <label class="control-label col-sm-2">Apellido</label>
              <div class="col-sm-10">
                <strong class="form-control no-border">{{$user->last_name}}</strong>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2">Pregunta secreta</label>
              <div class="col-sm-10">
                <strong class="form-control no-border">{{$user->secret_question}}</strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Roles</label>
              <div class="col-sm-10">
                <h3 class="form-control no-border no-margin">
                  @foreach ($roles as $role)
                  {{-- @if ($user->inRole($role->slug)) --}}
                  <span class="label label-info">{{$role->name}}</span>
                  {{-- @endif --}}
                  @endforeach
                </h3>
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