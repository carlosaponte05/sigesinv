@extends('admin.index')

@section('sub-title')
<title>Admin | Escritorio</title>
@endsection

@section('css')
@endsection
@section('sub-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     <i class="fa fa-cog fa-spin fa-fw"></i> Ajustes Generales <small>establecer valores predeterminados y más.</small>
    </h1>
   {{--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agregar nuevos usuarios</li>
    </ol> --}}
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        {{-- <div class="box ">
				  <div class="box-header ">
            <h3 class="box-title">Lista de todos los roles</h3><small>  Click para ver más información.</small>
          </div>
          <!-- /.box-header -->
        </div> --}}
        <!-- /.box -->
        <form role="form" action="{{ url('admin/setting/save') }}" class="well form-horizontal" method="POST">
          {{ csrf_field() }}

          @if (isGod($user->id))
            <div class=" form-group">
              <label class="col-sm-offset-1 col-sm-2 control-label">Establecer roles por defecto </label>
              <div class="col-sm-9">
                <h3 class="form-control no-border no-margin">
                  @foreach ($roles as $role)
                    @php
                      $checked = ( ($role->is_default) ? 'checked' : '');
                    @endphp
                    <div class="checkbox checkbox-inline no-padding">
                      <label>
                        <input type="checkbox" name="Roles[]" value="{{$role->slug}}" {{$checked}}>{{$role->name}}
                      </label>
                    </div>
                  @endforeach
                </h3>
              </div>
            </div>
          @endif

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-primary btn-flat">Guardar cambios</button>
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