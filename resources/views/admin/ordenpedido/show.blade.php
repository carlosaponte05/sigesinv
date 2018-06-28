@extends('admin.layouts.master')

@section('title')
<title>Orden de Pedido | Escritorio</title>
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
           Aquí, Se puede observar los detalles de la Orden de pedido con código <strong>{{$ordenp->codigo}}</strong>.
           
         </h3>
          
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <div class="row">
        <div class="col-lg-12">
          <div class="well form-horizontal">
            
            <div class="form-group">
              <label class="control-label col-sm-2">Fecha</label>
              <div class="col-sm-10">
                <strong class="form-control no-border">{{$ordenp->fecha}}</strong>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Estado</label>
              <div class="col-sm-10">
                <h3 class="form-control no-border no-margin">
                  
                  <span class="label label-info">{{$ordenp->estado}}</span>
                  
                </h3>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-6 control-label">Materiales</label>
              
            </div>
            @foreach($ordenp->materialespedido as $key)
              <div class="form-group">
              <label class="col-sm-6 control-label">{{$key->materiales->nombre}}</label>
              <div class="col-sm-6">
                <h3 class="form-control no-border no-margin">
                  
                  <span class="label label-info">{{$key->cantidad}}</span>
                  
                </h3>
              </div>
            </div>
            @endforeach
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
