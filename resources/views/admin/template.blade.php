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
      Escritorio<small></small>
    </h1>
   {{--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agragar Nuevo usuario</li>
    </ol> --}}
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
				  <div class="box-header with-border">
            <h3 class="box-title">{{-- title --}}</h3><small>{{-- a little more --}}</small>
          </div>

          <div class="box-body">
            {{-- content here --}}
          </div>
        </div>
        <!-- /.box -->
        
      </div>
    </div>
  </section>
  <!-- content -->
</div>
<!-- content-wrapper -->
@endsection