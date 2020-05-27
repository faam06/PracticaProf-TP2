<?php
  session_start();
  require 'database.php';
  
  if (!empty($_POST['email']) && !empty($_POST['contrasena'])) {
    $records = $conn->prepare('SELECT id_usr, email, contrasena FROM usuario WHERE email = :email');
    $records->bindParam(':email',$_POST['email']);
    $records->bindParam(':contrasena',$_POST['contrasena']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
  
    $message = '';
  
    if (count($results) > 0){ #&& (password_verify($_POST['contrasena'],$results['contrasena']))) {
      $_SESSION['id'] = $results['id_usr'];
      $_SESSION['email'] = $results['email'];
      $_SESSION['nombre_usr'] = $results['nombre_usr'];
      $_SESSION['apellido_usr'] = $results['apellido_usr'];
      $_SESSION['tipo_usr'] = $results['tipo_usr'];
  
      if ($_SESSION['tipo_usr'] == 1){
        header('Location: indexAuditor.php');
      }
      else{
        if ($_SESSION['tipo_usr'] == 2){
          header('Location: indexVendedor.php');
        }
        else{
            if ($_SESSION['tipo_usr'] == 3){
              header('Location: indexAdmin.php');
            }
            else{
              header('Location: indexSAdmin.php');
            }
        }
      }
  
    } else {
      $message = 'El correo o la contraseña son incorrectos';
    }
  
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cooperativa S.A. | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Viyagua</b> Corp.</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicia sesión para comenzar</p>

      <form action="index.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name= "email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name= "contrasena" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recordar Contraseña
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">¿Te Olvidaste la contraseña?</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Registrarme</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
