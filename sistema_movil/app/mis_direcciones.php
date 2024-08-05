<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 17/07/2020
 * Time: 23:42
 */
include('../../app/config/config.php');

$email = $_GET['email'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Delivery</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini" style="background: #ffffff">
<!--<a href="https://api.whatsapp.com/send?phone=59175657007&text=Hola">enviar</a>-->
<div class="wrapper">


        <div class="card-footer" style="margin-top: 0px;background: #ffffff">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <span class="fa fa-plus"></span> Agregar dirección
            </button>
            <br><br>
            <div class="row" style="margin-top: -15px">
                <?php
                $contador = 0;
                $query = $pdo->prepare("SELECT * FROM tb_mis_direcciones WHERE email = '$email' AND estado ='1'");
                $query->execute();
                $direcciones = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($direcciones as $direccione) {
                    $id_direccion = $direccione['id'];
                    $nombre_direccion= $direccione['nombre_direccion'];
                    $direccion= $direccione['direccion'];
                    $referencia= $direccione['referencia'];
                    $contador = $contador + 1;
                    ?>
                    <div class="info-box" style="border: 1px solid #c0c0c0">
                        <span class="info-box-icon bg-info"><i class="fa fa-map-marked-alt"></i></span>
                        <div class="info-box-content" style="margin-top: 7px">
                            <span class="info-box-text"><b><?php echo $nombre_direccion;?></b></span>
                            <span><?php echo $direccion;?></span>
                            <span style="margin-top: 5px;color: #00558F">Ref. <?php echo $referencia;?></span>
                            <span class="info-box-number text-right" style="color: mediumvioletred">Dirección <?php echo $contador;?></span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- /.row -->
        </div>




</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/demo.js"></script>
</body>
</html>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva dirección</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="controller_mis_direcciones.php" method="post">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre_direccion"
                               placeholder="Ej: Casa de Papá | Oficina | Trabajo">
                    </div>
                    <div class="form-group">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" name="direccion"
                               placeholder="Ej: Av. Litoral Calle Mario Calvo # 123">
                    </div>
                    <div class="form-group">
                        <label for="">Referencia</label>
                        <input type="text" class="form-control" name="referencia"
                               placeholder="Ej: Frente a la cancha | Garaje rojo | Casa de 3 pisos">
                    </div>
            </div>
                <input type="text" name="email" value="<?php echo $email;?>" hidden>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" value="Guardar Dirección"/>
            </div>
            </form>
        </div>
    </div>
</div>