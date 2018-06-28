@extends('admin.layouts.master')

@section('title')
<title>Admin | Escritorio</title>
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
          Actualización de Material!
            <small> Para actualizar el registro del almacén.</small>
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="row">
           <div class="col-lg-12">
            <form role="form" action="{{ route('materiales.update',$material->id) }}" class="form-horizontal" method="PATCH" name="form">

              {{ csrf_field() }}
              {{ method_field('PUT') }}

              <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                <label for="nombre" class="control-label col-sm-2">Nombre{{$material->id}}</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Nombre de Usuario" name="nombre" value="{{$material->nombre}}" id="nombre" required>
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
                  <input type="text" class="form-control" placeholder="Caracteristicas o detalles del Material" name="caracteristica" value="{{$material->caracteristica}}" id="caracteristica" >
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
                    <option value="Caja" @if($material->unidad=="Caja") selected="selected" @endif>Caja</option>
                    <option value="Bulto" @if($material->unidad=="Bulto") selected="selected" @endif>Bulto</option>
                    <option value="Resma" @if($material->unidad=="Resma") selected="selected" @endif>Resma</option>
                    <option value="Paquete" @if($material->unidad=="Paquete") selected="selected" @endif>Paquete</option>
                    <option value="Kilo" @if($material->unidad=="Kilo") selected="selected" @endif>Kilo</option>
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
                  <input name="precio_ind" type="text" class="form-control" value="{{$material->precio_ind}}" placeholder="Precio Unitario del Material">
                  @if($errors->has("precio_ind"))
                  <span class="text-danger">{{ $errors->first("precio_ind")}}</span>  
                  @endif
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('precio_und') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="precio_und">Precio Unidad de Almacenamiento</label>
                <div class="col-sm-10">
                  <input name="precio_und" type="text" class="form-control" placeholder="Precio por unidad de almacenamiento del Material" value="{{$material->precio_und}}">
                 @if($errors->has("precio_und"))
                 <span class="text-danger">{{ $errors->first("precio_und")}}</span>  
                 @endif
                </div>
              </div>

              <hr>
              <div class="form-group{{ $errors->has('stock_min') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="stock_min">Stock Mínimo</label>
                <div class="col-sm-10">
                  <input name="stock_min" type="text" class="form-control" placeholder="Stock Mínimo del Material" value="{{$material->stock_min}}">
                  @if($errors->has("stock_min"))
                  <span class="text-danger">{{ $errors->first("stock_min")}}</span>  
                  @endif
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('stock_max') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="stock_max">Stock Máximo</label>
                <div class="col-sm-10">
                  <input name="stock_max" type="text" class="form-control" placeholder="Stock Máximo del Material"  value="{{$material->stock_max}}">
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
