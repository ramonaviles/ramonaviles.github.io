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
        $ap_materno_s= $usuario['ap_materno'];
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
        <title>Delivery | La Paz Xpress</title>
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
                                <h3 class="card-title"><span class="fa fa-users"></span> Creación de un nuevo motoquero</h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <form action="controller_create.php" method="post">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Nombres</label>
                                                <input type="text" class="form-control" name="nombres">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Apellido Materno</label>
                                                <input type="text" class="form-control" name="ap_materno">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" name="fecha_nacimiento">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Celular</label>
                                                <input type="text" class="form-control" name="celular">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Placa</label>
                                                <input type="text" class="form-control" name="placa">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="text" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">Apellido Paterno</label>
                                                <input type="text" class="form-control" name="ap_paterno">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Ci</label>
                                                <input type="text" class="form-control" name="ci">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Genero</label>
                                                <select name="genero" id="" CLASS="form-control">
                                                    <option value="HOMBRE">HOMBRE</option>
                                                    <option value="MUJER">MUJER</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Cargo</label>
                                                <select name="cargo" id="" CLASS="form-control">
                                                    <option value="MOTOQUERO">MOTOQUERO</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Correo Electronico</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <a href="<?php echo $URL;?>/web/usuarios" class="btn btn-default btn-lg">Cancelar</a>
                                    <input type="submit" class="btn btn-primary btn-lg" value="Registrar Motoquero">
                                </form>
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