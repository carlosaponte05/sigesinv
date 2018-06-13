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
      Acerca de los usuarios para administrar.
    </h1>
   {{--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Usuarios</a></li>
      <li class="active"><i class="fa fa-user-plus"></i> Agregar un nuevo usuario</li>
    </ol> --}}
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Lista de todos los Usuarios</h3><small>  Click para ver más información.</small>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-2">Nombre de Usuario</th>
                    <th class="col-md-3">Correo</th>
                    <th class="col-md-3">Roles</th>
                    <th class="text-center col-md-3">
                      <p>Acción</p>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($users as $user)

                  <tr class="btn-table-row" onclick="location.href='{{ url('admin/user/'.$user->id.'/show') }}'" 
                    title="Click to see more">
                    <th class="col-md-1" scope="row">{{ $row_number }}.</th>
                    <td class="col-md-2">{{ $user->first_name}} 
                      @php
                      echo ((isGod($user->id)) ? "<span class='label label-info'> SuperUsuario</label>" : '' );
                      @endphp
                    </td>
                    <td class="col-md-3">{{ $user->email }}</td>
                    <td class="col-md-3">
                      @if (isGod($user->id))
                      <strong><p class="text-info">Este usuario tiene acceso total.</p></strong>
                      @else
                      @foreach ($roles as $role)
                      @if($user->inRole($role->slug))
                      @php $and = (($role->name == $roles->last()->name) ? '' : ' &') @endphp
                      {{ $role->name . $and }}
                      @endif 
                      @endforeach
                      @endif</td>
                      <td class="text-center col-md-3" style="display: inline;">
                        <div class="form-inline">
                          @if ($current_user->getRoles(['user.update']))
                          <div class="form-group">
                            <a class="btn btn-circle btn-primary" href='{{ url('/admin/user/'.$user->id.'/edit') }}'" title="Edit">
                              <i class="fa fa-edit"></i>
                            </a>
                          </div>
                          @endif
                          @if ($current_user->getRoles(['user.delete']))
                            <div class="form-group">
                              <form class="form frmDelete" id="Form" role="form" method="POST" 
                              action="{{ url('admin/user/'. $user->id) }}">
                                <input type="hidden" name="_method" value="delete">

                                {{ csrf_field() }}
                                <button class="btn btn-circle btn-danger btnDelete" title="Delete">
                                  <i class="fa fa-remove"></i>
                                </button>
                                <div class="form-group">
                                  <a class="btn btn-circle btn-info" href='{{ url('/admin/user/'.$user->id.'/show') }}'" title="Ver">
                                    <i class="fa fa-eye"></i>
                                  </a>
                                </div>
                              </form>
                            </div>
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
      title             : "Estas seguro que quieres borrarlo?",
      text              : "No podrá recuperar este usuario y los datos relacionados!",
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
        //console.log(inputValue);
        //$("#clave").val(inputValue);
        swal("Seguro desea eliminar el registro?!","No podrá recuperar los datos", "warning");
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