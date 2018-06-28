@extends('admin.layouts.master')

@section('title')
<title>Orden de Pedido | Escritorio</title>
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
          Orden de Pedido <strong>Código: {{$codigo}}</strong>
            <small> Para agregar cantidades a los materiales.</small>
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="row">
           <div class="col-lg-12">
            <form role="form" action="{{ route('admin.orden_pedido.store') }}" class="form-horizontal" method="POST">

              {{ csrf_field() }}
              <input type="hidden" name="codigo" value="{{$codigo}}">
              
              <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                <label for="mensaje" class="control-label col-sm-6">Ingrese la cantidad a pedir al almacén por cada material</label>
              </div>
              <hr>
              @for($i=0;$i<count($materiales);$i++)
              <div class="form-group">
                <label class="control-label col-sm-2" for="material">{{$nombre_materiales[$i]}}</label>
                <div class="col-sm-10">
                  
                  
              <input type="hidden" name="id_material[]" value="{{$materiales[$i]}}"/>
              <input type="number" name="cantidad[]" class="form-control" value="1">
                  
                  
                </div>
              </div>
              <hr>
              @endfor
              <hr>


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
