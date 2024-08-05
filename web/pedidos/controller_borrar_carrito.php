<?php
include('../../app/config/config.php');

$id_carrito = $_GET['id'];

date_default_timezone_set("America/Caracas");
$fechaHora =date("Y-m-d h:i:s");
$estado = '0';

$sentencia = $pdo->prepare("UPDATE tb_carrito SET estado='$estado', fyh_actualizacion='$fechaHora' WHERE id='$id_carrito' ");
if($sentencia->execute()){
    header("Location: ".$URL."/web/pedidos/create");
}else{
//echo "No se pudo actualizar ";
echo "no se puede eliminar el objetivo, comuniquese con el encargado del sistema. Gracias";
}
