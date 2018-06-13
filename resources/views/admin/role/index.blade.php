@extends('admin.index')

@section('sub-title')
<title>Admin | Escritorio</title>
@endsection

@section('css')
@endsection

@section('sub-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Esto son los roles registrados <small>acerca de los roles para administrar los niveles de acceso.</small>
    </h1>
   {{--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agregar nuevo usuario</li>
    </ol> --}}
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Lista de todos los Roles</h3><small>  Click aquí para más información.</small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th class="col-md-1">#
                    {{-- <div class="checkbox icheck" style="margin: 0">
                      <label>
                        <input type="checkbox">
                      </label>
                    </div> --}}
                  </th>
                  <th class="col-md-3">Nombre del Rol</th>
                  <th class="col-md-5">Descripción</th>
                  <th class="text-center col-md-3">
                    <p>Acción</p>
                  </th>
                </tr>
              </thead>

              <tbody>
                @foreach ($roles as $role)

                <tr class="btn-table-row" onclick="location.href='{{ url('admin/role/'.$role->id.'/show') }}'" 
                title="Click to see more">
                  <th class="col-md-1" scope="row">{{ $row_number }}.</th>
                  <td class="col-md-3">{{ $role->name }}</td>
                  <td class="col-md-6">{{ $role->description }}</td>
                  <td class="text-center col-md-2" style="display: inline;">
                    <div class="form-inline">
                      <div class="form-group">
                        <a class="btn btn-circle btn-primary" href='{{ url('/admin/role/'.$role->id.'/edit') }}'" title="Edit">
                          <i class="fa fa-edit"></i>
                        </a>
                      </div>
                      <div class="form-group">
                        <form class="form frmDelete" id="Form" role="form" method="POST" 
                        action="{{ url('admin/role/'. $role->id) }}">
                          <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}
                          <button class="btn btn-circle btn-danger btnDelete" title="Delete">
                            <i class="fa fa-remove"></i>
                          </button>
                        </form>
                      </div>
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
<script src="{{ asset('AdminLTE-2.3.11/plugins/iCheck/icheck.min.js') }}"></script>
 <script>
  $(function () {
      //$(".textarea").wysihtml5();
     $('input').iCheck({
       checkboxClass: 'icheckbox_square-blue',
       radioClass: 'iradio_square-blue',
       increaseArea: '20%' // optional
     });
  });
  $('button.btnDelete').on('click', function(e){
    e.preventDefault();
    // "Bubbling from parent onclick event" Start Here!
    if (!e) var e = window.event;
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
    // "Bubbling from parent onclick event" End Here! 
    var self = $(this);
    swal({
          title             : "Estas seguro que quieres borrarlo?",
          text              : "No podrá recuperar esta función y sus permisos!",
          type              : "warning",
          showCancelButton  : true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText : "Sí, Elimínalo!",
          cancelButtonText  : "No, Cancelar Eliminación!",
          closeOnConfirm    : false,
          closeOnCancel     : false
         },
    function(isConfirm){
        if(isConfirm){
          swal("Eliminado!","El usuario ha sido Eliminado", "success");
          setTimeout(function() {
              self.parents(".frmDelete").submit();
          }, 1000); //1 second delay (1000 milliseconds = 1 seconds)
        }
        else{
          swal("Cancelado!","Usuario seguro", "error");
        }
    });
  });
</script>
@endsection