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
        <?php //include('../../layout/head.php');?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
                        Sección de Pedidos
                        <br><br>
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <?php
                                $contar_pedido = 1;
                                $query_pedido = $pdo->prepare("SELECT * FROM tb_pedidos WHERE estado ='1'");
                                $query_pedido->execute();
                                $pedidos = $query_pedido->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($pedidos as $pedido) {
                                    $contar_pedido = $contar_pedido + 1;
                                }
                                ?>
                                <h3 class="card-title">
                                    <span class="fa fa-store"></span>
                                    Pedido <input type="text" style="text-align: center;width: 150px" value="<?php echo $contar_pedido;?>" disabled>
                                    <input type="text" id="id_pedido" value="<?php echo $contar_pedido;?>" hidden>
                                </h3>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="">Carrito - Delivery</label>
                                                <button class="btn btn-info btn-sm" id="btn_limpiar_carrito"><i class="fa fa-trash"></i> Limpiar carrito</button>
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                                    <span class="fa fa-plus"></span> Agregar Carrito
                                                </button>
                                                <div id="respuesta">

                                                </div>
                                                <table class="table table-sm table-bordered" id="tabla_carrito1">
                                                    <th style="background: rgba(214,214,214,0.55)"><b><center>Nro</center></b></th>
                                                    <th style="background: rgba(214,214,214,0.55)"><b>Producto</b></th>
                                                    <th style="background: rgba(214,214,214,0.55)"><b>Detalle</b></th>
                                                    <th style="background: rgba(214,214,214,0.55)"><b><center>Cantidad</center></b></th>
                                                    <th style="background: rgba(214,214,214,0.55)"><b><center>Precio Unitario</center></b></th>
                                                    <th style="background: rgba(214,214,214,0.55)"><b><center>Precio Total</center></b></th>
                                                    <th style="background: rgba(214,214,214,0.55)"><b><center>Acciones</center></b></th>
                                                    <?php
                                                    $contador_carrito = 0;
                                                    $total_cantidades = 0.0;
                                                    $total_precio_unitario = 0.0;
                                                    $total_precio_total = 0.0;
                                                    $query_carrito = $pdo->prepare("SELECT * FROM tb_carrito WHERE id_pedido = '$contar_pedido' AND estado ='1'");
                                                    $query_carrito->execute();
                                                    $carritos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach ($carritos as $carrito) {
                                                        $contador_carrito = $contador_carrito + 1;
                                                        $id_carrito = $carrito['id'];
                                                        $producto = $carrito['producto'];
                                                        $detalle = $carrito['detalle'];
                                                        $cantidad = $carrito['cantidad'];
                                                        $precio_u = $carrito['precio_unitario'];
                                                        $precio_t = $carrito['precio_total'];

                                                        $total_cantidades = $total_cantidades + $cantidad;
                                                        $total_precio_unitario = $total_precio_unitario + $precio_u;
                                                        $total_precio_total = $total_precio_total + $precio_t;

                                                        ?>
                                                        <tr>
                                                            <td><center><?php echo $contador_carrito;?></center></td>
                                                            <td><?php echo $producto;?></td>
                                                            <td><?php echo $detalle;?></td>
                                                            <td><center><?php echo $cantidad;?></center></td>
                                                            <td><center><?php echo $precio_u;?></center></td>
                                                            <td><center><?php echo $precio_t;?></center></td>
                                                            <td>
                                                                <center>
                                                                    <a href="controller_borrar_carrito.php?id=<?php echo $id_carrito;?>"
                                                                       class="btn btn-danger btn-sm">
                                                                        <span class="fa fa-trash"></span> Borrar
                                                                    </a>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td style="background: rgba(214,214,214,0.55)" colspan="3" align="right"><b>Total</b></td>
                                                        <td style="background: rgba(214,214,214,0.55)"><center><b><?php echo $total_cantidades;?></b></center></td>
                                                        <td style="background: rgba(214,214,214,0.55)"><center><b><?php echo $total_precio_unitario;?></b></center></td>
                                                        <td style="background: rgba(214,214,214,0.55)">
                                                            <center>
                                                                <b><?php echo $total_precio_total;?></b>
                                                                <input type="text" id="conto_total_bd" value="<?php echo $total_precio_total;?>" hidden>
                                                            </center></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>





                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <i class="fa fa-users"></i> Clientes de Camba Moto
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#exampleModal_cliente">
                                    <span class="fa fa-plus"></span> Agregar Cliente
                                </button>
                            </div> <!-- /.card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-condensed table-bordered table-sm">
                                            <thead>
                                            <tr>
                                                <th style="background: #c0c0c0"><b>Nombre Completo</b></th>
                                                <th style="background: #c0c0c0"><b>CI / NIT</b></th>
                                                <th style="background: #c0c0c0"><b>Celular</b></th>
                                                <th style="background: #c0c0c0" colspan="2"><b>Email</b></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" id="nombre_p_2"></td>
                                                <td><input type="text" class="form-control" id="ci_p_2"></td>
                                                <td><input type="text" class="form-control" id="celular_p_2"></td>
                                                <td colspan="2"><input type="text" class="form-control" id="email_p_2"></td>
                                            </tr>
                                            <tr>
                                                <th style="background: #c0c0c0" colspan="2">Dirección </th>
                                                <th style="background: #c0c0c0">Celular de Referencia </th>
                                                <th style="background: #c0c0c0">Costo del Delivery</th>
                                                <th style="background: #c0c0c0">Obs.</th>
                                            </tr>
                                            <tr>
                                               <td colspan="2">
                                                   <input type="text" id="direccion_p_2" class="form-control">
                                                   <input type="text" id="id_direccion_p_2" hidden>
                                               </td>
                                                <td>
                                                    <input type="text" class="form-control" id="nro_referencia">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="costo_delivery">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="obs">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>


                        <button class="btn btn-primary btn-lg" id="btn_registrar_pedido">
                            Registrar Pedido
                        </button>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include('../../layout/footer.php');?>
    </div>
    <?php //include('../../layout/footer_link.php');?>
    <!-- jQuery -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo $URL;?>/app/templeates/AdminLTE-3.0.5/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable( {
                "responsive": true,
                "autoWidth": false,
                "pageLength": 5,
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                    "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Clientes",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador de Clientes:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    </body>
    </html>
    <?php
}else{
    header("Location: $URL/login");
}
?>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Producto</label>
                    <input type="text" class="form-control" id="producto">
                </div>
                <div class="form-group">
                    <label for="">Detalle</label>
                    <textarea name="" id="detalle" cols="10" rows="3" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Cantidad</label>
                            <input type="text" class="form-control suma" id="cantidad" >
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Precio Unitario</label>
                            <input type="text" class="form-control suma" id="precio_u">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Precio Total</label>
                            <input type="text" class="form-control " id="precio_t" disabled>
                            <input type="text" class="form-control " id="precio_t2" hidden>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_agregar_carrito">Agregar</button>
            </div>
        </div>
    </div>
</div>
<script>

    $('#precio_u').keyup(function(event) {
        if (event.keyCode == 188) {
            event.preventDefault();
            alert('para decimales procure utilizar punto. Ej: 2.5');
            $('#precio_u').val('');
        }else{
            var total = 0;
            var cantidad = $('#cantidad').val();
            var precio_u = $('#precio_u').val();
            var precio_t = $('#precio_t').val();

            if(isNaN(parseFloat(cantidad))){
                total = 0;
            }else if(isNaN(parseFloat(precio_u))){
                total = 0;
            }else{
                total = cantidad * precio_u;
            }
            $('#precio_t').val(total);
            $('#precio_t2').val(total);

        }
    });

    $('#cantidad').keyup(function(event) {
            var total = 0;
            var cantidad = $('#cantidad').val();
            var precio_u = $('#precio_u').val();
            var precio_t = $('#precio_t').val();

            if(isNaN(parseFloat(cantidad))){
                total = 0;
            }else if(isNaN(parseFloat(precio_u))){
                total = 0;
            }else{
                total = cantidad * precio_u;
            }
            $('#precio_t').val(total);
            $('#precio_t2').val(total);

    });
</script>

<script>
    $('#btn_agregar_carrito').click(function () {
        // alert(valor);
        var id_pedido = $('#id_pedido').val();
        var producto = $('#producto').val();
        var detalle = $('#detalle').val();
        var cantidad = $('#cantidad').val();
        var precio_u = $('#precio_u').val();
        var precio_t = $('#precio_t').val();

        if( producto == ""){
            alert("Debe de llenar los campos");
        }else if( cantidad == ""){
            alert("Debe de llenar los campos");
        }else if( precio_u == ""){
            alert("Debe de llenar los campos");
        }else{
            $.post('controller_carrito_ajax.php', {
                id_pedido:id_pedido,
                producto:producto,
                detalle:detalle,
                cantidad:cantidad,
                precio_u:precio_u,
                precio_t:precio_t
            }, function (datos) {
                $('#tabla_carrito1').css('display','none');
                $('#respuesta').html(datos);

                $('#producto').val('');
                $('#detalle').val('');
                $('#cantidad').val('');
                $('#precio_u').val('');
                $('#precio_t').val('');
            });
        }
    });
</script>


<script>
    //funcion para limpiar carrito de pedidos
    $('#btn_limpiar_carrito').click(function () {
        var id_pedido = $('#id_pedido').val();
        if (confirm('Esta seguro de eliminar todo el carrito de pedidos')) {
            //alert(id_pedido);
            $.post('controller_limpiar_carrito.php', {
                id_pedido:id_pedido
            }, function (datos) {
                $('#tabla_carrito1').css('display','none');
                $('#respuesta').html(datos);
            });
        } else {

        }
    });
</script>

<div class="modal fade" id="exampleModal_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar cliente al Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th style=""><b>Nro</b></th>
                                        <th style=""><b>Nombre Completo</b></th>
                                        <th style=""><b>Ci</b></th>
                                        <th style=""><b>Celular</b></th>
                                        <th style=""><b>Email</b></th>
                                        <th style=""><b>Direcciones</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador_cliente = 0;
                                    $query_cliente = $pdo->prepare("SELECT * FROM tb_usuarios WHERE cargo = 'CLIENTE' AND estado ='1'");
                                    $query_cliente->execute();
                                    $clientes = $query_cliente->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($clientes as $cliente) {
                                        $id_cliente = $cliente['id'];
                                        $ap_paterno = $cliente['ap_paterno'];
                                        $ap_materno = $cliente['ap_materno'];
                                        $nombres = $cliente['nombres'];
                                        $ci = $cliente['ci'];
                                        $genero = $cliente['genero'];
                                        $celular = $cliente['celular'];
                                        $email = $cliente['email'];
                                        $fecha_nacimiento = $cliente['fecha_nacimiento'];
                                        $cargo = $cliente['cargo'];
                                        $foto_perfil = $cliente['foto_perfil'];
                                        $contador_cliente = $contador_cliente + 1;
                                        ?>
                                        <tr>
                                            <td><?php echo $contador_cliente;?></td>
                                            <td>
                                                <button class="btn btn-warning btn-xs" id="datos_cliente<?php echo $id_cliente;?>">
                                                   <?php echo $nombres." ".$ap_paterno." ".$ap_materno;?>
                                                </button>
                                                <script>
                                                    $('#datos_cliente<?php echo $id_cliente;?>').click(function () {
                                                        var nombre_cliente = '<?php echo $nombres." ".$ap_paterno." ".$ap_materno;?>';
                                                        var ci_cliente = '<?php echo $ci;?>';
                                                        var celular_cliente = '<?php echo $celular;?>';
                                                        var email_cliente = '<?php echo $email;?>';

                                                        $('#nombre_p').val(nombre_cliente);
                                                        $('#ci_p').val(ci_cliente);
                                                        $('#celular_p').val(celular_cliente);
                                                        $('#email_p').val(email_cliente);

                                                    });
                                                </script>
                                            </td>
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
                                                            <b><?php echo $nombre_direccion;?></b>
                                                        </h6>
                                                        <p style="margin-left: 10px">
                                                            <button class="btn btn-sm btn-info" id="datos_direccion<?php echo $id_dire;?>">
                                                                <i class="fa fa-map-marked-alt"></i></button>
                                                                 <?php echo $direccion;?> <br>
                                                            <span style="margin-top: 5px;color: #bc32ee">Ref. <?php echo $referencia;?></span>
                                                            <span style="text-align: right;color: #0f2d54"> - Dirección <?php echo $contador_de_direciones;?></span>
                                                        </p>
                                                    </div>
                                                    <script>
                                                        $('#datos_direccion<?php echo $id_dire;?>').click(function () {
                                                            var direccion_p = '<?php echo $direccion;?>';
                                                            var id_direccion_p = '<?php echo $id_dire;?>';
                                                            $('#direccion_p').val(direccion_p);
                                                            $('#id_direccion_p').val(id_direccion_p);
                                                        });
                                                    </script>

                                                    <?php
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <!-- <tfoot>
                                         <tr>
                                             <th>Rendering engine</th>
                                             <th>Browser</th>
                                             <th>Platform(s)</th>
                                             <th>Engine version</th>
                                             <th>CSS grade</th>
                                         </tr>
                                     </tfoot>-->
                                </table>
                            </div>
                        </div>
                    </div><!-- /.card-body -->
                </div>

                <hr>

                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th style=""><b>Nombre Completo</b></th>
                        <th style=""><b>Ci</b></th>
                        <th style=""><b>Celular</b></th>
                        <th style=""><b>Email</b></th>
                        <th style=""><b>Dirección</b></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" id="nombre_p"></td>
                        <td><input type="text" id="ci_p"></td>
                        <td><input type="text" id="celular_p"></td>
                        <td><input type="text" id="email_p"></td>
                        <td>
                            <input type="text" id="direccion_p">
                            <input type="text" id="id_direccion_p" hidden>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn_agregar_cliente">Agregar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#btn_agregar_cliente').click(function () {
        //alert('asdf');
        var nombre = $('#nombre_p').val();
        var ci = $('#ci_p').val();
        var celular = $('#celular_p').val();
        var email = $('#email_p').val();
        var direccion = $('#direccion_p').val();
        var id_direccion = $('#id_direccion_p').val();

        $('#nombre_p_2').val(nombre);
        $('#ci_p_2').val(ci);
        $('#celular_p_2').val(celular);
        $('#email_p_2').val(email);
        $('#direccion_p_2').val(direccion);
        $('#id_direccion_p_2').val(id_direccion);
    });
</script>


<script>
    $('#btn_registrar_pedido').click(function () {

        if (confirm('Esta seguro de guardar el pedido')) {

            var nombre_cliente = $('#nombre_p_2').val();
            var ci_cliente = $('#ci_p_2').val();
            var celular_cliente = $('#celular_p_2').val();
            var celular_referencia_cliente = $('#nro_referencia').val();
            var email_cliente = $('#email_p_2').val();
            var direccion_cliente = $('#direccion_p_2').val();
            var id_direccion_cliente = $('#id_direccion_p_2').val();
            var costo_pedido = $('#conto_total_bd').val();
            var costo_delivery = $('#costo_delivery').val();
            var obs = $('#obs').val();
            var id_carrito = '<?php echo $contar_pedido;?>';

            //alert( nombre_cliente + " - "+ci_cliente+" - "+celular_cliente+" - "+celular_referencia_cliente+" - "+email_cliente+" - "+direccion_cliente+" - "+id_direccion_cliente+" - "+costo_pedido+" - "+costo_delivery+" - "+obs+" - "+id_carrito);

            $.post('controller_registrar_pedido.php', {
                nombre_cliente:nombre_cliente,
                ci_cliente:ci_cliente,
                celular_cliente:celular_cliente,
                celular_referencia_cliente:celular_referencia_cliente,
                email_cliente:email_cliente,
                direccion_cliente:direccion_cliente,
                id_direccion_cliente:id_direccion_cliente,
                costo_pedido:costo_pedido,
                costo_delivery:costo_delivery,
                obs:obs,
                id_carrito:id_carrito
            }, function (datos) {
                location.href ="index.php";
            });

        } else {

        }

    });
</script>
