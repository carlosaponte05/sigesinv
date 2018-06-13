 @extends('admin.layouts.master')

 @section('title')
 <title>Admin | Dashboard</title>
 @endsection

 @section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
  {{--  <section class="content-header">
     <h1>
      Here is what you clicked.<small>Create a new custom role and set permissions for it.</small>
     </h1> --}}
    {{--  <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
       <li class="active"><i class="fa fa-user-plus"></i> Add New User</li>
     </ol> 
   </section> --}}

   <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
         <div class="box box-info">
           <div class="box-header with-border" >
            <h3 class="box-title">
              At Here, You Can Get All Informations of {{$role->name}}.
              <small>Don't afraid to edit by clicking the Edit Button at right! <i class="fa fa-hand-o-right"></i></small>
            </h3>
             <div class="box-tools pull-right">
               <a class="btn btn-box-tool" title="Click to Edit" href="/admin/role/{{$role->id}}/edit">
                 <i class="fa fa-edit text-primary" ></i>
               </a>
             </div>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="page-header row mg-top-minus-10 well">
                    <div class="col-md-6 ">
                      <h2> {{$role->name}} </h2>
                      <h3><small>{{$role->description}}</small></h3>
                    </div>
                  </div> {{-- page header --}}
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="page-header row mg-top-minus-10 well">
                        <div class="col-lg-12">
                          <h3>Permissions</h3>
                          <h3>
                            <small>
                              <div class="row">
                                {{showPermissions('user', $role->permissions)}}
                                {{showPermissions('post', $role->permissions)}}
                              </div>
                            </small>
                          </h3> 
                        </div>
                      </div>
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
 @section('script')
 <script>
   // //Skin switcher
   // var current_skin = "skin-blue";
   // $('.btn-box-tool').click(function(e) {
   //   e.preventDefault();
   //   var skinName = $(this).data('skin');
   //   $('body').removeClass(current_skin);
   //   $('body').addClass(skinName);
   //   current_skin = skinName;
   // });
 </script>
 @endsection