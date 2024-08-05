<?php
/**
 * Created by PhpStorm.
 * User: DELL-SYSTEM
 * Date: 16/07/2020
 * Time: 12:07
 */

include('../../app/config/config.php');

$nombre_cliente = $_POST['nombre_cliente'];
$ci_cliente = $_POST['ci_cliente'];
$celular_cliente = $_POST['celular_cliente'];
$celular_referencia_cliente = $_POST['celular_referencia_cliente'];
$email_cliente = $_POST['email_cliente'];
$direccion_cliente = $_POST['direccion_cliente'];
$id_direccion_cliente = $_POST['id_direccion_cliente'];
$costo_pedido = $_POST['costo_pedido'];
$costo_delivery = $_POST['costo_delivery'];
$obs = $_POST['obs'];
$id_carrito = $_POST['id_carrito'];

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = "1";;


    $sentencia = $pdo->prepare("INSERT INTO tb_pedidos 
      ( nombre_cliente, ci_cliente, celular_cliente, celular_referencia_cliente, email_cliente, direccion_cliente, id_direccion_cliente, costo_pedido, costo_delivery, obs, id_carrito, fyh_creacion, estado) 
VALUES(:nombre_cliente,:ci_cliente,:celular_cliente,:celular_referencia_cliente,:email_cliente,:direccion_cliente,:id_direccion_cliente,:costo_pedido,:costo_delivery,:obs,:id_carrito,:fyh_creacion,:estado)");

    $sentencia->bindParam(':nombre_cliente',$nombre_cliente);
    $sentencia->bindParam(':ci_cliente',$ci_cliente);
    $sentencia->bindParam(':celular_cliente',$celular_cliente);
    $sentencia->bindParam(':celular_referencia_cliente',$celular_referencia_cliente);
    $sentencia->bindParam(':email_cliente',$email_cliente);
    $sentencia->bindParam(':direccion_cliente',$direccion_cliente);
    $sentencia->bindParam(':id_direccion_cliente',$id_direccion_cliente);
    $sentencia->bindParam(':costo_pedido',$costo_pedido);
    $sentencia->bindParam(':costo_delivery',$costo_delivery);
    $sentencia->bindParam(':obs',$obs);
    $sentencia->bindParam(':id_carrito',$id_carrito);

    $sentencia->bindParam(':fyh_creacion',$fechaHora);
    $sentencia->bindParam(':estado',$estado);

    if($sentencia->execute()){
        header("Location:".$URL."/web/pedidos");
        ?>
        <script></script>
        <?php
    }else{
        echo "No se pudo registrar";
    }
