@extends('admin.index')

@section('sub-title')
<title>Orden de Pedido | Escritorio</title>
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
      Acerca de las Órdenes de Pedido para administrar.
    </h1>
 
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Lista de todos las Órdenes de Pedido</h3><small>  Click para ver más información.</small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-2">Fecha</th>
                    <th class="col-md-2">Código</th>
                    <th class="col-md-2">Estado</th>
                    <th class="text-center col-md-3">
                      <p>Acción</p>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($ordenp as $key)

                  <tr class="btn-table-row" onclick="location.href='{{ url('admin/orden_pedido/'.$key->id.'/show') }}'" 
                    title="Click to see more">
                    <th class="col-md-1" scope="row">{{ $row_number }}.</th>
                    <td class="col-md-2">{{ $key->fecha}} 
                    </td>
                    <td class="col-md-2">{{ $key->codigo }}</td>
                    <td class="col-md-2">{{ $key->estado }}<br>
                    @if(\Sentinel::getUser()->roles()->first()->hasAccess(['orden_pedido.aprobar'])==1 && $key->estado=="Sin Aprobar")
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                  <a class="btn btn-circle btn-success" title="Presione aquí para aprobar la Orden de Pedido" href='{{ url('/admin/orden_pedido/'.$key->id.'/aprobar') }}'" title="Ver">
                                    <i class="fa fa-check" ></i>
                                  </a>
                                </div>
                          @endif
                      @if(\Sentinel::getUser()->roles()->first()->hasAccess(['orden_pedido.ejecutar'])==1 && $key->estado=="Aprobada")
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                  <a class="btn btn-circle btn-warning" title="Presione para cambiar a ejecutada la Orden de Pedido" href='{{ url('/admin/orden_pedido/'.$key->id.'/ejecutar') }}'" title="Ver">
                                    <i class="fa fa-check-circle" ></i>
                                  </a>
                                  <a href="{{ url('/admin/orden_pedido/pdf/reporte/'.$key->id) }}" class="btn btn-circle btn-info">
                                    <i class="fa fa-file-pdf-o"></i>
                                  </a>
                                </div>
                          @endif
                    </td>
                    <td class="text-center col-md-3" style="display: inline;">
                        <div class="form-inline">
                          @if (\Sentinel::getUser()->roles()->first()->hasAccess(['orden_pedido.update'])==1)
                          <div class="form-group">
                            <a class="btn btn-circle btn-primary" href='{{ url('/admin/orden_pedido/'.$key->id.'/edit') }}'" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>
                          </div>
                          @endif
                          

                              <br>
                              @if(\Sentinel::getUser()->roles()->first()->hasAccess(['orden_pedido.view'])==1)
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                  <a class="btn btn-circle btn-info" href='{{ url('/admin/orden_pedido/'.$key->id.'/show') }}'" title="Ver">
                                    <i class="fa fa-eye"></i>
                                  </a>
                                </div>
                          @endif

                          @if (\Sentinel::getUser()->roles()->first()->hasAccess(['orden_pedido.delete'])==1 && $key->estado=="Sin Aprobar")
                          <button class="btn btn-circle btn-danger btnDelete" title="Delete">
                                  <i class="fa fa-remove"></i>
                                </button>
                            <div class="form-group">
                              <form class="form frmDelete" id="Form" role="form" method="POST" 
                              action="{{ url('admin/orden_pedido/'. $key->id) }}">
                                <input type="hidden" name="_method" value="delete">
                              </form>
                              @endif
                      </div>
                    </td>
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

@section('script')
<script>
       $('button.btnDelete').on('click', function(e){
    e.preventDefault();
    // "Bubbling from parent onclick event" Start Here!
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
    // "Bubbling from parent onclick event" End Here! 
    var self = $(this);
    swal({
      title             : "Estas seguro que quieres Cancelar?",
      text              : "No podrá activar esta Órden de Pedido y los datos relacionados!",
      type              : "warning",
      showCancelButton  : true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText : "Sí, Cancela!",
      cancelButtonText  : "No, detener la Cancelación!",
      closeOnConfirm    : false,
      closeOnCancel     : false
    },
    function(isConfirm){
      if(isConfirm){
        //console.log(inputValue);
        //$("#clave").val(inputValue);
        swal("Seguro desea cancelar la orden de pedido?!","No podrá recuperar los datos", "warning");
        setTimeout(function() {
          
          self.parents(".frmDelete").submit();
          }, 1000); //1 second delay (1000 milliseconds = 1 seconds)
      }
    
      else{
        swal("No Cancelada!","Orden de Pedido seguro", "error");
      }
    });
  });
</script>
@endsection