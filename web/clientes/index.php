<?php include('../../app/config/config.php');

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
        <?php include('../../layout/head.php');?>
        <title>Delivery</title>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('../../layout/menu.php');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="container">
                        <br>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><span class="fa fa-users"></span> Listado de Clientes</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-sm">
                                            <th style="background: #c0c0c0"><b>Nro</b></th>
                                            <th style="background: #c0c0c0"><b>Nombre Completo</b></th>
                                            <th style="background: #c0c0c0"><b>Ci</b></th>
                                            <th style="background: #c0c0c0"><b>Celular</b></th>
                                            <th style="background: #c0c0c0"><b>Email</b></th>
                                            <th style="background: #c0c0c0"><b>Direcciones</b></th>

                                            <?php
                                            $contador = 0;
                                            $query2 = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo = 'CLIENTE' AND estado ='1'");
                                            $query2->execute();
                                            $usuarios2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($usuarios2 as $usuario2) {
                                                $id_usuario = $usuario2['id'];
                                                $ap_paterno = $usuario2['ap_paterno'];
                                                $ap_materno = $usuario2['ap_materno'];
                                                $nombres = $usuario2['nombres'];
                                                $ci = $usuario2['ci'];
                                                $genero = $usuario2['genero'];
                                                $celular = $usuario2['celular'];
                                                $email = $usuario2['email'];
                                                $fecha_nacimiento = $usuario2['fecha_nacimiento'];
                                                $cargo = $usuario2['cargo'];
                                                $foto_perfil = $usuario2['foto_perfil'];
                                                $contador = $contador + 1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $contador;?></td>
                                                    <td><?php echo $nombres." ".$ap_paterno." ".$ap_materno;?></td>
                                                    <td><?php echo $ci;?></td>
                                                    <td>
                                                        <a href="<?php echo "https://api.whatsapp.com/send?phone=591".$celular  ;?>"
                                                         class="btn btn-success btn-xs" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                            <?php echo $celular;?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $email;?></td>

                                                    <td>
                                                        <?php
                                                        $contador_de_direciones = 0;
                                                        $query3 = $pdo->prepare("SELECT * FROM tb_mis_direcciones WHERE email = '$email' AND estado ='1'");
                                                        $query3->execute();
                                                        $dires = $query3->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($dires as $dire) {
                                                            $id_dire = $dire['id'];
                                                            $nombre_direccion = $dire['nombre_direccion'];
                                                            $direccion = $dire['direccion'];
                                                            $referencia = $dire['referencia'];
                                                            $contador_de_direciones = $contador_de_direciones + 1;
                                                            ?>
                                                            <div class=""
                                                                 style="font-size: 12px;
                                                                 background: rgba(40,145,238,0.22);border-radius: 10px">
                                                                <h6 class="alert-heading" style="
                                                                margin-left: 10px;margin-right: 10px">
                                                                   <i class="fa fa-map-marked-alt"></i> <b><?php echo $nombre_direccion;?></b>
                                                                </h6>
                                                                <p style="margin-left: 10px">
                                                                    <?php echo $direccion;?> <br>
                                                                    <span style="margin-top: 5px;color: #bc32ee">Ref. <?php echo $referencia;?></span>
                                                                    <span style="text-align: right;color: #0f2d54"> - Dirección <?php echo $contador_de_direciones;?></span>
                                                                </p>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                                <?php
                                            }
                                            ?>
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
        <?php include('../../layout/footer.php');?>
    </div>
    <?php include('../../layout/footer_link.php');?>
    </body>
    </html>
    <?php
}else{
    header("Location: $URL/login");
}
?>