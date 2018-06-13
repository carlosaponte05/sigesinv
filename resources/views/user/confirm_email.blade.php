<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SysTest1 | Recuperar Contraseña</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11/plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="AdminLTE-2.3.11/index2.html"><b>Sys</b>Test1</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Recuperar Contraseña</p>

      <form action="{{ url('user/forgot') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group has-feedback">
          <input type="email" name="Email" class="form-control" placeholder="Ingrese el Correo para confirmar"  required>
          @if($errors->has("Email"))
          <span class="text-danger">{{ $errors->first("Email")}}</span>  
          @endif
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.register-box -->

      <!-- jQuery 2.2.3 -->
      <script src="{{ asset('AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="{{ asset('AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js') }}"></script>
      <!-- iCheck -->
      <script src="{{ asset('AdminLTE-2.3.11/plugins/iCheck/icheck.min.js') }}"></script>
      <script>
        $(function () {
          $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
        });
      </script>
      <script src="{{ asset('js/sweetalert.min.js') }}"></script>
      @include('sweet::alert')
    </body>
    </html>
