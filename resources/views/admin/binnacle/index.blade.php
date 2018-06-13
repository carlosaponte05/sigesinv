@extends('admin.index')

@section('sub-title')
<title>Usuarios | Escritorio</title>
@endsection

@section('css')
<style type="text/css">
/*th{
  font-size: 15px;
}*/
</style>
@endsection

@section('sub-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
     Bitácora.
    </h1>
   
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Historial de operaciones</h3><small>  registro de todos los movimientos de los usuarios en el sistema.</small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-2">Nombre de Usuario</th>
                    <th class="col-md-3">Operación</th>
                    
                  </tr>
                </thead>

                <tbody>
                  @foreach ($binnacles as $binnacle)

                  <tr class="btn-table-row"  
                    title="Click to see more">
                    <th class="col-md-1" scope="row">{{ $row_number }}.</th>
                    <td class="col-md-2">{{ $binnacle->id_usuario }}
                    </td>
                    <td class="col-md-3">{{ $binnacle->operacion }}</td>
                    
                      
                  </tr> 

                  @php
                  $row_number++;
                  @endphp 

                  @endforeach
                </tbody>

              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
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

