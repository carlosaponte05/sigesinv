@extends('admin.layouts.master')

@section('title')
<title>Proveedores | Escritorio</title>
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
          Actualizando Proveedor!
            <small> Para anexar al registro del proveedor.</small>
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="row">
           <div class="col-lg-12">
            <form role="form" action="{{ route('proveedores.update',$proveedor->id) }}" class="form-horizontal" method="PUT">

              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('razon_social') ? ' has-error' : '' }}">
                <label for="razon_social" class="control-label col-sm-2">Razón Social</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Razón Social del Proveedor" name="razon_social" value="{{ $proveedor->razon_social }}" id="razon_social" required>
                  @if ($errors->has('razon_social'))
                  <span class="help-block">
                    <strong>{{ $errors->first('razon_social') }}</strong>
                  </span>
                  @endif 
                </div>
              </div>
              <hr>
              <div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
                <label for="rif" class="control-label col-sm-2">RIF</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="RIF del Proveedor" name="rif" value="{{ $proveedor->rif }}" id="rif" >
                  @if ($errors->has('rif'))
                  <span class="help-block">
                    <strong>{{ $errors->first('rif') }}</strong>
                  </span>
                  @endif 
                </div>
              </div>
              <hr>

              <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                <label class="control-label col-sm-2" for="telefono">Teléfono</label>
                <div class="col-sm-10">
                  <input name="telefono" value="{{ $proveedor->telefono}}" type="text" class="form-control" placeholder="Teléfono del Proveedor">
                  @if($errors->has("telefono"))
                  <span class="text-danger">{{ $errors->first("telefono")}}</span>  
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
