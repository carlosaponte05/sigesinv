@extends('admin.layouts.master')

@section('title')
<title>Materiales | Escritorio</title>
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
          Registro de un Nuevo Material!
            <small> Para anexar al registro del almacén.</small>
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="row">
           <div class="col-lg-12">
            <form role="form" action="{{ url('admin/materiales/') }}" class="form-horizontal" method="POST">

              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="nombre" class="control-label col-sm-2">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Nombre del Material" name="nombre" value="{{ old('nombre') }}" id="nombre" required>
                  @if ($errors->has('nombre'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                  @endif 
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('caracteristica') ? ' has-error' : '' }}">
                <label for="caracteristica" class="control-label col-sm-2">Característica</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Caracteristicas o detalles del Material" name="caracteristica" value="{{ old('caracteristica') }}" id="caracteristica" >
                  @if ($errors->has('caracteristica'))
                  <span class="help-block">
                    <strong>{{ $errors->first('caracteristica') }}</strong>
                  </span>
                  @endif 
                </div>
              </div>
              <hr>
              

              <div class="form-group{{ $errors->has('unidad') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="Email">Unidad</label>
                <div class="col-sm-10">
                  <select name="unidad" id="unidad" title="Seleccione la Unidad de Almacenamiento del Material" class="form-control select2">
                    <option value="Caja">Caja</option>
                    <option value="Bulto">Bulto</option>
                    <option value="Resma">Resma</option>
                    <option value="Paquete">Paquete</option>
                    <option value="Kilo">Kilo</option>
                  </select>
                  @if ($errors->has('unidad'))
                  <span class="help-block">
                    <strong>{{ $errors->first('unidad') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              <hr>

              <div class="form-group{{ $errors->has('precio_ind') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="precio_ind">Precio Individual/Unitario</label>
                <div class="col-sm-10">
                  <input name="precio_ind" type="text" class="form-control" placeholder="Precio Unitario del Material">
                  @if($errors->has("precio_ind"))
                  <span class="text-danger">{{ $errors->first("precio_ind")}}</span>  
                  @endif
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('precio_und') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="precio_und">Precio Unidad de Almacenamiento</label>
                <div class="col-sm-10">
                  <input name="precio_und" type="text" class="form-control" placeholder="Precio por unidad de almacenamiento del Material">
                 @if($errors->has("precio_und"))
                 <span class="text-danger">{{ $errors->first("precio_und")}}</span>  
                 @endif
                </div>
              </div>

              <hr>
              <div class="form-group{{ $errors->has('stock_min') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="stock_min">Stock Mínimo</label>
                <div class="col-sm-10">
                  <input name="stock_min" type="text" class="form-control" placeholder="Stock Mínimo del Material">
                  @if($errors->has("stock_min"))
                  <span class="text-danger">{{ $errors->first("stock_min")}}</span>  
                  @endif
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('stock_max') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="stock_max">Stock Máximo</label>
                <div class="col-sm-10">
                  <input name="stock_max" type="text" class="form-control" placeholder="Stock Máximo del Material">
                  @if($errors->has("stock_max"))
                  <span class="text-danger">{{ $errors->first("stock_max")}}</span>  
                  @endif
                </div>
              </div>
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
