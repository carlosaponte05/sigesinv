@extends('admin.layouts.master')

@section('title')
<title>Admin | Escritorio</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  {{-- <section class="content-header">
    <h1>
      Crearemos un nuevo Rol<small>con nombre único, descripción y permisos cuidadosamente establecidos para ello.</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agregar un nuevo usuario</li>
    </ol>
  </section> --}}

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">
              Creemos un nuevo Rol!
              <small> con nombre único, descripción y permisos cuidadosamente establecidos para ello.</small>
            </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <!-- form start -->
            <form role="form" action="{{ url('admin/role/') }}" method="POST">
              {{ csrf_field() }}
              
              <div class="form-group {{ ($errors->has('RoleName')) ? 'has-error' : ' ' }} row no-margin-bt">
                <div class="col-md-6">
                  <label for="RoleName" class="control-label">Nombre del Rol:</label>
                  <input type="text" class="form-control" id="RoleName" name="RoleName" placeholder="Ingrese le nombre del rol" value="{{ old('RoleName') }}" required>
                  @if($errors->has("RoleName"))
                  <span class="text-danger">{{ $errors->first("RoleName") }}</span>  
                  @else
                  <p class="help-block"><span class="text-info">Ej. Administrator, Moderator, etc.</span></p>
                  @endif
                </div>
              </div> {{-- form-group --}}

              <hr class="mg-tp-bt-10" />

              <div class="form-group {{ ($errors->has('Description')) ? 'has-error' : '' }} row no-margin-bt">
                <div class="col-md-12">
                  <label for="Description" class="control-label">Descripción:</label>
                  <textarea maxlength="200" rows="2" class="form-control" id="Descripción" name="Description" placeholder="Lugar para agregar la información" value="{{ old('Description') }}" required></textarea> 
                  @if($errors->has("Description"))
                  <span class="text-danger">{{ $errors->first("Description") }}</span>  
                  @else
                  <p class="help-block"><span class="text-info">Agrega una pequeÑa información del rol.</span></p>
                  @endif
                </div>
              </div> {{-- form-group --}}

              <hr class="mg-tp-bt-10" />

              <div class="form-group row no-margin-bt">
                <div class="col-md-12">
                  <label class="control-label">Agregue Permisos</label>
                  <div class="container mg-top-10">
                    {{cbPermGetter('user')}}
                    {{-- {{cbPermGetter('post')}} --}}
                    
                  </div>
                  {{-- <div class="panel panel-default" id="cbContainer">
                    <div class="panel-heading" style="margin-top: -5px;"><strong>Para Usuario</strong></div>
                    <div class="panel-body text-right">
                      {{ checkBoxes('user') }}
                    </div>
                    <div class="panel-heading"><strong>Para Producto</strong></div>
                    <div class="panel-body text-right">
                      {{ checkBoxes('post') }}
                      @if($errors->has("post"))
                      <span class="text-danger">{{ $errors->first("post") }}</span>  
                      @else
                      <p class="help-block">No puede estar vacío.</p>
                      @endif
                    </div>
                  </div>  --}}{{-- Panel --}}
                </div>
              </div> {{-- form-group --}}

              {{-- Form Footer --}}
              <div class="box-footer">
                {{-- <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div> --}}
                {{-- <button class="btn btn-lg btn-primary btn-block register-btn" type="submit">Register</button> --}}
                <button type="submit" class="btn btn-flat btn-primary">Guardar todo</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> {{-- row --}}
  </section>
  <!-- content -->
</div>
<!-- content-wrapper -->
@endsection