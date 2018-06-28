@extends('admin.layouts.master')

@section('title')
<title>Orden de Compra | Escritorio</title>
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
          Creación de Orden de Compra!
            <small> Para aprobar.</small>
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="row">
           <div class="col-lg-12">
            <form role="form" action="{{ url('admin/orden_compra/materiales') }}" class="form-horizontal" method="POST">

              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                <label for="codigo" class="control-label col-sm-2">Código</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Ingrese el código de la orden de compra" name="codigo" value="{{ old('codigo') }}" id="codigo" required>
                  @if ($errors->has('codigo'))
                  <span class="help-block">
                    <strong>{{ $errors->first('codigo') }}</strong>
                  </span>
                  @endif 
                </div>
              </div>
              <hr>
              
              <div class="form-group{{ $errors->has('id_proveedor') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="id_proveedor">Proveedor</label>
                <div class="col-sm-10">
                  <select name="id_proveedor" class="form-control select2" title="Seleccione un Proveedor">
                  @foreach($proveedores as $key)
                    <option value="{{$key->id}}">{{$key->razon_social}}</option>
                  @endforeach
                  </select>
                  @if($errors->has("id_proveedor"))
                  <span class="text-danger">{{ $errors->first("id_proveedor")}}</span>  
                  @endif
                </div>
              </div>
              
              <hr>
              <div class="form-group{{ $errors->has('materiales') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="id_proveedor">Materiales</label>
                <div class="col-sm-10">
                  <select name="materiales[]" class="form-control select2" multiple="multiple" title="Seleccione los Materiales">
                  @foreach($materiales as $key)
                    <option value="{{$key->id}}">{{$key->nombre}}</option>
                  @endforeach
                  </select>
                  @if($errors->has("materiales"))
                  <span class="text-danger">{{ $errors->first("materiales")}}</span>  
                  @endif
                </div>
              </div>
              
              <hr>


              <div class="box-footer">
                <div class="col-sm-offset-2">
                  <button type="submit" class="btn btn-flat btn-primary">Crear</button>`
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
