<?php
include('../../app/config/config.php');
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Delivery</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Site Icons -->
    <!-- <link rel="shortcut icon" href="<?php //echo $URL;?>/public/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php //echo $URL;?>/public/apple-touch-icon.png"> -->
</head>
<body class="hold-transition login-page" style="background: #ffffff">
<div class="login-box">
    <div class="login-logo">
        <center>
            <!-- <img src="<?php //echo $URL;?>/public/icono.png" width="100px" alt=""><br> -->
            <img src="https://img.freepik.com/vector-gratis/servicio-entrega-concepto-mascaras_23-2148497067.jpg?w=996&t=st=1668575624~exp=1668576224~hmac=43358c75b8a12fb5e410cc7d4793066906ba59f5fde3259e5504368c8747b714"
                 width="300px" alt=""> <br>
            <b>Delivery</b>
        </center>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Crea tu cuenta</p>

            <form action="registro_final.php" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre completo">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="ci" placeholder="Carnet de identidad">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" name="celular" placeholder="Celular">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="correo" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_user" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-8">
                         <div class="icheck-primary">
                             <input type="checkbox" id="remember">
                             <label for="remember">
                                 Remember Me
                             </label>
                         </div>
                     </div>-->
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning btn-block">Crear cuenta</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- <div class="social-auth-links text-center mb-3">
                 <p>- OR -</p>
                 <a href="#" class="btn btn-block btn-primary">
                     <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                 </a>
                 <a href="#" class="btn btn-block btn-danger">
                     <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                 </a>
             </div>-->
            <!-- /.social-auth-links -->

            <!--  <p class="mb-1">
                  <a href="forgot-password.html">I forgot my password</a>
              </p>
              <p class="mb-0">
                  <a href="register.html" class="text-center">Register a new membership</a>
              </p>
              -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>
