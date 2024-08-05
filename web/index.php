<?php include('../app/config/config.php');

session_start();
if(isset($_SESSION['u_usuario'])) {
    $user = $_SESSION['u_usuario'];
    //echo "session de ".$user; ///////////para comprobar sesion

    $query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$user' AND estado ='1'");
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_s = $usuario['id'];
        $ap_paterno_s = $usuario['ap_paterno'];
        $ap_materno_s = $usuario['ap_materno'];
        $nombres_s = $usuario['nombres'];
        $ci_s = $usuario['ci'];
        $cargo_s = $usuario['cargo'];
        $foto_perfil_s = $usuario['foto_perfil'];
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include('../layout/head.php');?>
        <title>Delivery</title>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('../layout/menu.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="container">
                        <br>
                        Bienvenido
                        <br><br>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-user"></span> Usuario Disponible</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                               <div class="row">
                                   <div class="col-md-6">
                                       <table class="table table-bordered table-sm">
                                           <tr>
                                               <td style="background: #c0c0c0"><b>Nombre:</b></td>
                                               <td><?php echo $nombres_s."  ".$ap_paterno_s." ".$ap_materno_s;?></td>
                                           </tr>
                                           <tr>
                                               <td style="background: #c0c0c0"><b>Ci:</b></td>
                                               <td><?php echo $ci_s;?></td>
                                           </tr>
                                           <tr>
                                               <td style="background: #c0c0c0"><b>Cargo:</b></td>
                                               <td><?php echo $cargo_s;?></td>
                                           </tr>
                                       </table>
                                   </div>
                               </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('../layout/footer.php');?>
    </div>
    <?php include('../layout/footer_link.php');?>
    </body>
    </html>
    <?php
}else{
    header("Location: $URL/login");
}
?>







